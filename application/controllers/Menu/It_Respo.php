<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class It_Respo extends CI_Controller {

    function __construct() {
		parent::__construct();
        if ($this->session->username == "") {
            redirect('login');
        }
        $this->load->model('Menu/Workload', 'workload');
        $this->load->model('Menu/File_mod_current', 'file_mod');
        $this->load->model('Menu/Deploy_mod', 'deploy');
	}

	public function index()
	{
		$this->load->view('_layouts/header');
		$this->load->view('menu/it_respo');
		$this->load->view('_layouts/footer');

	}

    public function workload_list() {

        $status = $this->input->post('status');
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $order = $this->input->post('order');
        $search_value = $this->input->post('search')['value'];
        $order_column = $order[0]['column'];
        $order_dir = $order[0]['dir'];



        $workload = $this->workload->getWorkloads($status, $start, $length, $order_column, $order_dir, $search_value);
        $data = [];
    
        foreach ($workload as $row) {

            $status_badge = '';
            if ($row['status'] === 'Pending') {
                $status_badge = '<span class="badge rounded-pill bg-warning-subtle text-warning">' . $row['status'] . '</span>';
            } elseif ($row['status'] === 'Ongoing') {
                $status_badge = '<span class="badge rounded-pill bg-info-subtle text-info">' . $row['status'] . '</span>';
            } elseif ($row['status'] === 'Done') {
                $status_badge = '<span class="badge rounded-pill bg-success-subtle text-success">' . $row['status'] . '</span>';
            }

            $emp_data = $this->workload->get_emp($row['emp_id']);
            $sub_mod_name   = !empty($row['sub_mod_name']) ? $row['sub_mod_name'] : '<span class="badge bg-secondary">N/A</span>'; 
            $sub_mod_menu   = !empty($row['sub_mod_menu']) ? $row['sub_mod_menu'] : '<span class="badge bg-secondary">N/A</span>'; 
            $description    = !empty($row['desc']) ? $row['desc'] : '<span class="badge bg-secondary">N/A</span>'; 
            $remarks        = !empty($row['remarks']) ? $row['remarks'] : '<span class="badge bg-secondary">N/A</span>'; 

            $data[] = [
                'team_name' => $row['team_name'],
                'emp_id' => $emp_data['name'],
                'user_type' => $row['user_type'],
                'module' => $row['mod_name'],
                'sub_mod_name' =>  $sub_mod_name,
                'sub_mod_menu' => $sub_mod_menu,
                'description' => $description,
                'remarks' => $remarks,
                'status' => $status_badge,
                'action' => '
                    <div class="hstack gap-1">
                        <button type="button" class="btn btn-soft-secondary btn-label waves-effect waves-light btn-sm" onclick="edit_workload_content(' . $row['id'] . ')" data-bs-toggle="modal" data-bs-target="#edit_workload">
                            <iconify-icon icon="solar:pen-bold-duotone" class="label-icon align-bottom fs-16 me-2"></iconify-icon> Edit
                        </button>
                        <button type="button" class="btn btn-soft-danger btn-label waves-effect waves-light btn-sm" onclick="delete_workload(' . $row['id'] . ')">
                            <iconify-icon icon="solar:trash-bin-minimalistic-bold-duotone" class="label-icon align-bottom fs-16 me-2"></iconify-icon> Delete
                        </button>
                    </div>
                '
            ];
        }
        
        $total_records = $this->workload->getTotalWorkloads($status, $search_value);

        $output = [
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $total_records,
            "recordsFiltered" => $total_records,
            "data" => $data
        ];
        echo json_encode($output);
    }
    public function setup_workload()
    {
        $team_id = $this->input->post('team_id');
        $members = $this->workload->get_members_by_team($team_id);

        foreach ($members as &$member) {
            $emp_data = $this->workload->get_employees($member->emp_id); 
            if (!empty($emp_data) && isset($emp_data[0]->name)) {
                $member->emp_name = $emp_data[0]->name;
                // $member->position = $emp_data[0]->position;
            }
        }
        echo json_encode($members);
    }
    public function setup_module()
    {
        $module = $this->workload->get_module();
        echo json_encode($module);
    }
    public function submit_workload()
    {
        $team_id            = $this->input->post('team_id');
        $emp_id             = $this->input->post('emp_id');
        $emp_name           = $this->input->post('emp_name');
        $position           = $this->input->post('position');
        $module_id          = $this->input->post('module_id');
        $sub_module         = $this->input->post('sub_module');
        $sub_module_menu    = $this->input->post('sub_module_menu');
        $description        = $this->input->post('description');
        $remarks            = $this->input->post('remarks');
        $status             = $this->input->post('status');
        $data = array(
            'team_id'           => $team_id,
            'emp_id'            => $emp_id,
            'user_type'         => $position,
            'module'            => $module_id,
            'sub_mod'           => $sub_module,
            'sub_mod_menu'      => $sub_module_menu,
            'desc'              => $description,
            'remarks'           => $remarks,
            'status'            => $status,
            'date_added'        => date('Y-m-d H:i:s'),
        );
        $this->db->insert('workload', $data);
        $modul = $this->deploy->get_module_name($module_id);
        $module_name = $modul->mod_name;
        $action = '<b>' . $this->session->name. '</b> updated a workload to <b>'.$emp_name.' | '.$module_name.'</b>';

        $data1 = array(
            'emp_id' => $this->session->emp_id,
            'action' => $action,
            'date_added' => date('Y-m-d H:i:s'),
        );
        $this->load->model('Logs', 'logs');
        $this->logs->addLogs($data1);
    }

    public function edit_workload_content() {
        $id = $this->input->post('id');
        $data = $this->workload->get_workload_by_id($id);
        echo json_encode($data);
    }
    public function submit_updated_workload() {
        $id                 = $this->input->post('id');

        $team_id            = $this->input->post('team_id');
        $emp_id             = $this->input->post('emp_id');
        $emp_name           = $this->input->post('emp_name');
        $position           = $this->input->post('position');
        $module_id          = $this->input->post('module_id');
        $sub_module         = $this->input->post('sub_module');
        $sub_module_menu    = $this->input->post('sub_module_menu');
        $description        = $this->input->post('description');
        $remarks            = $this->input->post('remarks');
        $status             = $this->input->post('status');
        $data = array(
            'team_id'           => $team_id,
            'emp_id'            => $emp_id,
            'user_type'         => $position,
            'module'            => $module_id,
            'sub_mod'           => $sub_module,
            'sub_mod_menu'      => $sub_module_menu,
            'desc'              => $description,
            'remarks'           => $remarks,
            'status'            => $status,
            'date_updated'      => date('Y-m-d H:i:s'),
        );
        $this->db->where('id', $id);
        $this->db->update('workload', $data);

        $modul = $this->deploy->get_module_name($module_id);
        $module_name = $modul->mod_name;
        $action = '<b>' . $this->session->name. '</b> updated a workload to <b>'.$emp_name.' | '.$module_name.'</b>';

        $data1 = array(
            'emp_id' => $this->session->emp_id,
            'action' => $action,
            'date_updated' => date('Y-m-d H:i:s'),
        );
        $this->load->model('Logs', 'logs');
        $this->logs->addLogs($data1);
    }
    public function delete_workload() {
        $id = $this->input->post('id');
        $this->db->where('id', $id);
        $this->db->delete('workload');
    }
    
}

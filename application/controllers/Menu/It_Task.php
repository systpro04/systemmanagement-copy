<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class It_Task extends CI_Controller {

    function __construct() {
		parent::__construct();
        if ($this->session->username == "") {
            redirect('login');
        }
        $this->load->model('Menu/Task_mod', 'task');
        $this->load->model('Menu/Workload', 'workload');
	}

	public function index()
	{
		$this->load->view('_layouts/header');
		$this->load->view('menu/it_task');
		$this->load->view('_layouts/footer');

	}
    public function it_task_list() {

        $team = $this->input->post('team');
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $order = $this->input->post('order');
        $search_value = $this->input->post('search')['value'];
        $order_column = $order[0]['column'];
        $order_dir = $order[0]['dir'];


        $task = $this->task->gettasks($team, $start, $length, $order_column, $order_dir, $search_value);
        $data = [];
    
        foreach ($task as $row) {

            $status_badge = '';
            if ($row['task_status'] === 'Pending') {
                $status_badge = '<span class="badge rounded-pill bg-warning-subtle text-warning">' . $row['task_status'] . '</span>';
            } elseif ($row['task_status'] === 'Ongoing') {
                $status_badge = '<span class="badge rounded-pill bg-info-subtle text-info">' . $row['task_status'] . '</span>';
            } elseif ($row['task_status'] === 'Done') {
                $status_badge = '<span class="badge rounded-pill bg-success-subtle text-success">' . $row['task_status'] . '</span>';
            }

            $emp_data = $this->workload->get_emp($row['emp_id']);

            $data[] = [
                'emp_name'          => $emp_data['name'],
                'module'            => $row['mod_name'],
                'sub_mod_name'      => $row['sub_mod_name'],
                'desc'              => $row['desc'],
                'concerns'          => $row['concerns'],
                'remarks'           => $row['remarks'],
                'task_status'       => $status_badge,
                'action' => '
                    <div class="hstack gap-1">
                        <button type="button" class="btn btn-soft-secondary btn-label waves-effect waves-light btn-sm" onclick="edit_task_content(' . $row['task_id'] . ')" data-bs-toggle="modal" data-bs-target="#edit_task">
                            <iconify-icon icon="solar:pen-bold-duotone" class="label-icon align-bottom fs-16 me-2"></iconify-icon> Edit
                        </button>
                        <button type="button" class="btn btn-soft-danger btn-label waves-effect waves-light btn-sm" onclick="delete_task(' . $row['task_id'] . ')">
                            <iconify-icon icon="solar:trash-bin-minimalistic-bold-duotone" class="label-icon align-bottom fs-16 me-2"></iconify-icon> Delete
                        </button>
                    </div>
                '
            ];
        }
        
        $total_records = $this->task->getTotaltasks($team, $search_value);

        $output = [
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $total_records,
            "recordsFiltered" => $total_records,
            "data" => $data
        ];
        echo json_encode($output);
    }
    public function submit_task(){
        $team               = $this->input->post('team');
        $emp_name          = $this->input->post('emp_name');
        $emp_id             = $this->input->post('emp_id');
        $module             = $this->input->post('module');
        $sub_module         = $this->input->post('sub_module');
        $desc               = $this->input->post('desc');
        $concerns           = $this->input->post('concern');
        $remarks            = $this->input->post('remarks');
        $status             = $this->input->post('task_status');
        $data = [];
        $data = [
            'team_id'       => $team,
            'emp_id'        => $emp_id,
            'mod_id'        => $module,
            'sub_mod_id'    => $sub_module,
            'desc'          => $desc,
            'concerns'      => $concerns,
            'remarks'       => $remarks,
            'task_status'   => $status,
            'date_added'    => date('Y-m-d H:i:s')
        ];
        $this->task->add_task($data);
        $action = '<b>' . $this->session->name. '</b> added a task to <b>'.$emp_name.'</b>';

        $data1 = array(
            'emp_id' => $this->session->emp_id,
            'action' => $action,
            'date_added' => date('Y-m-d H:i:s'),
        );
        $this->load->model('Logs', 'logs');
        $this->logs->addLogs($data1);
        
    }

	public function edit_task_content() {
        $id = $this->input->post('task_id');
        $data = $this->task->get_task_data($id);
        echo json_encode($data);
    }
    public function update_task_content(){
        $id                 = $this->input->post('task_id');
        $team               = $this->input->post('team');
        $emp_name           = $this->input->post('emp_name');
        $emp_id             = $this->input->post('emp_id');
        $module             = $this->input->post('module');
        $sub_module         = $this->input->post('sub_module');
        $desc               = $this->input->post('desc');
        $concerns           = $this->input->post('concern');
        $remarks            = $this->input->post('remarks');
        $status             = $this->input->post('task_status');
        $data = [];
        $data = [
            'team_id'       => $team,
            'emp_id'        => $emp_id,
            'mod_id'        => $module,
            'sub_mod_id'    => $sub_module,
            'desc'          => $desc,
            'concerns'      => $concerns,
            'remarks'       => $remarks,
            'task_status'   => $status,
            'date_updated'  => date('Y-m-d H:i:s')
        ];
        $this->task->update_task($data, $id);
        $action = '<b>' . $this->session->name. '</b> updated a task to <b>'.$emp_name.'</b>';

        $data1 = array(
            'emp_id' => $this->session->emp_id,
            'action' => $action,
            'date_updated' => date('Y-m-d H:i:s'),
        );
        $this->load->model('Logs', 'logs');
        $this->logs->addLogs($data1);
    }
    public function delete_task(){
        $id = $this->input->post('task_id');
        $this->task->delete_task($id);
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        if ($this->session->username == "") {
            redirect('login');
        }
        $this->load->model('Admin_mod', 'admin');
        $this->load->model('Menu/Workload', 'workload');
    }
    public function add_user_view(){
        $this->load->view('_layouts/header');
		$this->load->view('admin/add_user');
		$this->load->view('_layouts/footer');
    }
    public function user_list() {
        $filter_team = $this->input->post('filter_team');
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $order = $this->input->post('order');
        $search_value = $this->input->post('search')['value'];
        $order_column = $order[0]['column'];
        $order_dir = $order[0]['dir'];

        $columns = ['team_name', 'name', 'position'];
        $order_by_column = isset($columns[$order_column]) ? $columns[$order_column] : 'team_name';
    
        $userlist = $this->admin->get_user_list($filter_team , $start, $length, $search_value, $order_by_column, $order_dir);
        $total_filtered = $this->admin->get_user_count($filter_team, $search_value);
    
        $result = [
            'draw' => $this->input->post('draw'),
            'recordsTotal' => $total_filtered,
            'recordsFiltered' => $total_filtered,
            'data' => []
        ];
    
        foreach ($userlist as $value) {
            $emp_data = $this->workload->get_emp($value['emp_id']);  
            
            $button = '<button href="#" class="btn btn-sm btn-soft-info waves-effect waves-light" onclick="update_user_content(\'' . $value['id'] . '\')" data-bs-toggle="modal" data-bs-target="#updateUser">
                        <iconify-icon icon="solar:pen-new-round-bold-duotone" class="label-icon align-bottom fs-16 me-2"></iconify-icon> Update</button>
                        <button type="button" class="btn btn-soft-danger waves-effect waves-light btn-sm" onclick="reset_password('.$value['id'].')">
                        <iconify-icon icon="tabler:refresh-alert" class="label-icon align-bottom fs-16 me-2"></iconify-icon> Reset Password
                    </button>';
            $type = '';
            if($value['type'] == 'Parttime') {
                $type = '<span class="badge rounded-pill bg-danger-subtle text-danger">Parttime</span>';
            } else {
                $type = '<span class="badge rounded-pill bg-success-subtle text-success">Fulltime</span>';
            }
            $result['data'][] = [
                'team_name'     => $value['team_name'], 
                'emp_id'        => $value['emp_id'], 
                'name'          => $emp_data['name'],
                'position'      => $emp_data['position'],
                'type'          => $type,
                'action'        => $button
            ];
        }
    
        echo json_encode($result);
    }
    public function search() 
    {
        $search = $this->input->get('query', TRUE);
        $employees = $this->admin->get_employees($search);
        $data = [];
        
        foreach ($employees as $employee) {
            $data[] = [
                'emp_id' => $employee->emp_id,
                'name' => $employee->name,
            ];
        }
        echo json_encode($data);
    }

    public function emp_data()
    {
        $emp_id = $this->input->post('emp_id', TRUE);
        $data = $this->admin->emp_mod($emp_id); 
    
        $result = [
            'emp_id' => $data['emp_id'],
            'name' => $data['name']
        ];
        echo json_encode($result);
    }
    public function add_user(){
        $team           = $this->input->post('team_id');
        $emp_id         = $this->input->post('emp_id');
        $position       = $this->input->post('position');
        $is_parttime    = $this->input->post('is_parttime');
        $type = '';
        if($is_parttime == 'Parttime') {
            $type = 'Parttime';
        }else{
            $type = 'Fulltime';
        }
        $data = [];
        $data = [
            'team_id'       => $team,
            'emp_id'        => $emp_id,
            'username'      => $emp_id,
            'position'      => $position,
            'date_added'    => date('Y-m-d H:i:s'),
            'password'      => md5($emp_id),
            'type'          => $type
        ];
        $this->admin->add_user($data);
    }
    public function update_user_content(){
        $id = $this->input->post('id');
        $user = $this->admin->update_user_content($id);
        echo json_encode($user);
    }
    public function update_user(){
        $id             = $this->input->post('id');
        $team           = $this->input->post('team_id');
        $position       = $this->input->post('position');
        $is_parttime    = $this->input->post('type');
        $data = [];
        $data = [    
            'team_id'       => $team,
            'position'      => $position,
            'type'          => $is_parttime
        ];
        $this->admin->update_user($data, $id);
    }

    public function reset_password(){
        $id = $this->input->post('id');
        $this->admin->reset_password($id); 
    }
    public function get_team()
    {
        $module = $this->admin->get_teams();
        echo json_encode($module);
    }

	public function kpi_view()
	{
		$this->load->view('_layouts/header');
		$this->load->view('admin/kpi_list');
		$this->load->view('_layouts/footer');

	}
    public function kpi_list() {

        $type = $this->input->post('type');
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $order = $this->input->post('order');
        $search_value = $this->input->post('search')['value'];
        $order_column = $order[0]['column'];
        $order_dir = $order[0]['dir'];

        $kpi = $this->admin->getKPI($type, $start, $length, $order_column, $order_dir, $search_value);
        $data = [];
    
        foreach ($kpi as $row) {
            $data[] = [
                'title' => $row['title'],
                'description' => $row['description'],
                'type' => '<span class="badge rounded-pill bg-success-subtle text-success">'.$row['type'].'</span>',
                'action' => '
                    <div class="hstack gap-1">
                        <button type="button" class="btn btn-soft-secondary btn-label waves-effect waves-light btn-sm" onclick="edit_kpi('.$row['id'].') " data-bs-toggle="modal" data-bs-target="#edit_kpi"><iconify-icon icon="solar:pen-bold-duotone" class="label-icon align-bottom fs-16 me-2"></iconify-icon> Edit</button>
                        <button type="button" class="btn btn-soft-danger btn-label waves-effect waves-light btn-sm" onclick="delete_kpi('.$row['id'].')"><iconify-icon icon="solar:trash-bin-minimalistic-bold-duotone" class="label-icon align-bottom fs-16 me-2"></iconify-icon> Delete</button>

                    </div>
                '
                    
            ];
        }
        $total_records = $this->admin->getTotalKPI($type, $search_value);

        $output = [
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $total_records,
            "recordsFiltered" => $total_records,
            "data" => $data
        ];
        echo json_encode($output);
    }

    public function create_kpi() {

        $title = $this->input->post('title');
        $type = $this->input->post('type');
        $description = $this->input->post('description');
    
        $data = [
            'title' => $title,
            'type' => $type,
            'description' => $description,
            'date_added' => date('Y-m-d H:i:s'),
        ];
    
        $this->admin->insertKPI($data);

    }
    public function edit_kpi() {
        $id = $this->input->post('id');
        $row = $this->admin->get_kpi_data($id);
    
        echo '<div class="mb-3">
            <label for="title" class="col-form-label">Title:</label>
                <input type="text" class="form-control" id="ktitle" name="title" value="' . htmlspecialchars($row['title']) . '"/>
            </div>
            <div class="mb-3">
                <label for="type" class="col-form-label">Type:</label>
                <select class="form-select mb-3" name="type" id="type_edit">';
                    $selected = ($row['type']) ? 'selected' : '';
                    echo '<option value="' . htmlspecialchars($row['type']) . '" ' . $selected . '>' . htmlspecialchars($row['type']) . '</option>';
        echo '    </select>
            </div>
            <div class="mb-3">
                <label for="desc" class="col-form-label">Description:</label>
                <textarea class="form-control" id="description" style="height: 210px" name="description">' . htmlspecialchars($row['description']) . '</textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="submiteditedKPI(' . $id . ')">Submit</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>';

    }
    public function update_kpi(){

        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $type = $this->input->post('type');
        $description = $this->input->post('description');
    
        $data = [
            'title' => $title,
            'type' => $type,
            'description' => $description,
            'date_updated' => date('Y-m-d H:i:s'),
        ];
    
        $this->admin->updateKPI($data, $id);
    }

    public function delete_kpi(){
        $id = $this->input->post('id');
        $this->admin->deleteKPI($id);
    }


    public function module_view()
    {
        $this->load->view('_layouts/header');
		$this->load->view('admin/add_module');
		$this->load->view('_layouts/footer');

    }


    public function module_list() 
    {
        $typeofsystem = $this->input->post('typeofsystem');
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $order = $this->input->post('order');
        $search_value = $this->input->post('search')['value'];
        $order_column = $order[0]['column'];
        $order_dir = $order[0]['dir'];
        
        $module = $this->admin->getModule($typeofsystem, $start, $length, $order_column, $order_dir, $search_value);
        $data = [];
        
        foreach ($module as $row) {
            $action = '
                <div class="hstack gap-1 d-flex justify-content-center">
                    <button type="button" class="btn btn-soft-primary waves-effect waves-light btn-sm" onclick="view_submodule('.$row['mod_id'].')" data-bs-toggle="modal" data-bs-target="#submodule">
                        <iconify-icon icon="solar:checklist-minimalistic-bold-duotone" class="label-icon align-bottom fs-16 me-2"></iconify-icon>
                    </button>
                    <button type="button" class="btn btn-soft-info waves-effect waves-light btn-sm" onclick="edit_module('.$row['mod_id'].',\''.$row['requested_to'].'\',\''.$row['bu_name'].'\',\''.$row['date_request'].'\')" data-bs-toggle="modal" data-bs-target="#edit_module">
                        <iconify-icon icon="solar:pen-bold-duotone" class="label-icon align-bottom fs-16 me-2"></iconify-icon>
                    </button>
                    <button type="button" class="btn btn-soft-danger waves-effect waves-light btn-sm" onclick="delete_module('.$row['mod_id'].')">
                        <iconify-icon icon="solar:trash-bin-minimalistic-bold-duotone" class="label-icon align-bottom fs-16 me-2"></iconify-icon>
                    </button>';
            if ($typeofsystem === 'new' && $row['status'] === 'Pending') {
                $action .= '
                    <button type="button" class="btn btn-soft-success waves-effect waves-light btn-sm" onclick="approve_new_module('.$row['mod_id'].')">
                        <iconify-icon icon="ri:thumb-up-fill" class="label-icon align-bottom fs-16 me-2"></iconify-icon>
                    </button>';
            }elseif($typeofsystem === 'new' && $row['status'] === 'Approve') {
                $action .= '
                    <button type="button" class="btn btn-soft-danger waves-effect waves-light btn-sm" onclick="recall_new_module('.$row['mod_id'].')">
                        <iconify-icon icon="tabler:refresh-alert" class="label-icon align-bottom fs-16 me-2"></iconify-icon> 
                    </button>';
            }
        
            $action .= '</div>';
            $status = '';
            $bu_name = '';
            if ($row['status'] === 'Approve') {
                $status = '<span class="badge bg-success">' . $row['status'] . '</span>';
            } elseif ($row['status'] === 'Pending') {
                $status = '<span class="badge bg-warning">' . $row['status'] . '</span>';
            }

            if($typeofsystem === 'new'){
                $bu_name = '<span class="badge bg-info">' . $row['bu_name'] . '</span>';
                if ($row['bu_name'] === null) {
                    $bu_name = '<span class="badge bg-warning">'.$row['bu_name'].'</span>';
                }else{

                }
            }else{
                $bu_name = '<span class="badge bg-info">Implemented</span>';
            }

            $data[] = [
                'mod_name' => $row['mod_name'],
                'status' => $status,
                'bu_name' => $bu_name,
                'date_request' => $row['date_request'],
                'action' => $action
            ];
        }
        
        $total_records = $this->admin->getTotalModule($typeofsystem, $search_value);

        $output = [
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $total_records,
            "recordsFiltered" => $total_records,
            "data" => $data
        ];
        echo json_encode($output);
    }

    public function add_module(){
        $mod_name       = $this->input->post('mod_name');
        $mod_abbr       = $this->input->post('mod_abbr');
        $typeofsystem   = $this->input->post('typeofsystem');
        $date_request   = $this->input->post('date_request');
        $bcode        = $this->input->post('bcode');
        $business_unit  = $this->input->post('business_unit');
    
        if($date_request === "") {
            $date_request = null;
        }
        $data = [
            'mod_name'      => $mod_name,
            'mod_abbr'      => $mod_abbr,
            'typeofsystem'  => $typeofsystem,
            'requested_to'  => $bcode,
            'bu_name'       => $business_unit,
            'date_request'  => $date_request,
            'status'        => 'Approve',
            'date_added'    => date('Y-m-d H:i:s'),
        ];
    
        $this->admin->insertModule($data);
    }

    public function edit_module() {
        $mod_id = $this->input->post('mod_id');
        $row = $this->admin->get_module_data($mod_id);
    
        echo '<div class="mb-3">
            <label for="title" class="col-form-label">Module Name:</label>
                <input type="text" class="form-control" id="edit_mod_name" name="mod_name" value="' . htmlspecialchars($row['mod_name']) . '"/>
                <input type="hidden" class="form-control" id="edit_mod_id" name="mod_id" value="' . htmlspecialchars($mod_id ). '"/>
            </div>
            <div class="mb-3">
            <label for="title" class="col-form-label">Module Abbreviation:</label>
                <input type="text" class="form-control" id="edit_mod_abbr" name="mod_abbr" value="' . htmlspecialchars($row['mod_abbr']) . '"/>
            </div>
            <div class="mb-2">
                <label class="col-form-label">Date Request:</label>
                    <div class="input-group">
                        <input type="date" id="edit_date_request" class="form-control" readonly="" placeholder="Select Date Request" data-provider="flatpickr" value="' . $row['date_request'] . '" />
                        <span class="input-group-text"><i class="ri-calendar-event-line"></i></span>
                    </div>
            </div>

            <div class="mb-2">
                <label for="title" class="col-form-label">Requested To</label>
                <select id="edit_business_unit" class="form-select" aria-label="Team">
                    <option value="'.htmlspecialchars($row['requested_to']) . '">' . $row['bu_name'] . '"></option>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="submiteditedmodule(' . $mod_id . ')">Submit</button>
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>';
            ?>
            <script>
                flatpickr("#edit_date_request", {
                    dateFormat: "F j, Y"
                });
                $('#edit_business_unit').select2({
                    placeholder: "Select Business Unit",
                    allowClear: true,
                    minimumResultsForSearch: Infinity
                });
                load_business_unit();
                function load_business_unit() {
                    $.ajax({
                        url: '<?= base_url('business_unit') ?>',
                        type: 'POST',
                        success: function(response) {
                            const buData = JSON.parse(response);
                            const currentValue = $('#edit_business_unit').val();
                            $('#edit_business_unit').empty().append('<option value=""></option>');

                            buData.forEach(function(bu) {
                                const selected = (bu.bcode === currentValue) ? 'selected' : '';
                                $('#edit_business_unit').append('<option value="' + bu.bcode + '" ' + selected + '>' + bu.business_unit + '</option>');
                            });
                        },
                    });
                }
            </script>
            <?php
    }

    public function update_module(){
        $mod_id         = $this->input->post('mod_id');
        $mod_name       = $this->input->post('mod_name');
        $mod_abbr       = $this->input->post('mod_abbr');
        $bcode          = $this->input->post('bcode');
        $business_unit  = $this->input->post('business_unit');
        $date_request   = $this->input->post('date_request');
    
        if($date_request === "") {
            $date_request = null;
        }else{
            $date_request = date('Y-m-d', strtotime($date_request));
        }
        if($bcode === "") {
            $bcode = null;
        }
        if($business_unit === "") {
            $business_unit = null;
        }

        $data = [
            'mod_name'          => $mod_name,
            'mod_abbr'          => $mod_abbr,
            'requested_to'      => $bcode,
            'bu_name'           => $business_unit,
            'date_request'      => $date_request,
            'date_updated'      => date('Y-m-d H:i:s'),
        ];
    
        $this->admin->updateModule($data, $mod_id);
    }
    public function delete_module(){
        $mod_id = $this->input->post('mod_id');
        $this->admin->deleteModule($mod_id);
    }
    public function approve_new_module(){
        $mod_id = $this->input->post('id');
        $data = [
            'mod_id' => $mod_id,
            'status' => 'Approve'
        ];
        $this->admin->updateModuleStatus($data, $mod_id);
    }
    public function recall_new_module(){
        $mod_id = $this->input->post('id');
        $data = [
            'mod_id' => $mod_id,
            'status' => 'Pending'
        ];
        $this->admin->updateModuleStatus($data, $mod_id);
    }

    public function view_submodule()
    {
        $mod_id = $this->input->post('mod_id');
    
        echo '<div class="d-flex align-items-center float-end mb-3">
                <div class="flex-shrink-0">
                    <div class="d-flex flex-wrap gap-2">
                        <button class="btn btn-primary waves-effect waves-light add-btn" data-bs-toggle="modal"
                            data-bs-target="#add_submodule" onclick="add_submodule_content('.$mod_id.')"><i class="ri-add-line align-bottom me-1"></i> Add Sub
                            Module </button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered" id="submodule_list">
                <thead class="table-primary">
                <tr>
                    <th>Submodule Name</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>';

            ?>
                <script>
                $(document).ready(function(){
                    $('#submodule_list').DataTable({
                        "processing": true,
                        "serverSide": true,
                        'lengthMenu': [[8, 25, 50, 100, 10000], [8, 25, 50, 100, "Max"]],
                        'pageLength': 8,
                        "ajax": {
                            "url": "<?= base_url('submodule_list') ?>",
                            "dataType": "json",
                            "type": "POST",
                            "data": {
                                "mod_id": <?= $mod_id ?>
                            }
                        },
                        "columns": [
                            { "data": 'sub_mod_name' },
                            { "data": 'action' },
                        ],
                        "columnDefs": [
                            { "className": "text-center", "targets": ['_all'] }
                        ],
                        "dom": 
                            "<'row mb-1'<'col-md-12 text-start'B>>" +
                            "<'row mb-1'<'col-md-6'l><'col-md-6 text-end'f>>" +
                            "<'row'<'col-md-12'tr>>" +
                            "<'row mt-1'<'col-md-6'i><'col-md-6 text-end'p>>",
                        "buttons": [
                            {
                                "extend": 'excelHtml5',
                                "title": 'SUB MODULE LIST - Excel Export', 
                                "exportOptions": {
                                    "columns": ':visible:not(:last-child)'
                                }
                            },
                            {
                                "extend": 'pdfHtml5',
                                "title": 'SUB MODULE LIST - PDF Export',
                                "text": 'Generate Report',
                                "exportOptions": {
                                    "columns": ':visible:not(:last-child)'
                                },
                                "customize": function (doc) {
                                    doc.defaultStyle.fontSize = 8;
                                    doc.styles.title.fontSize = 12;
                                    doc.styles.tableHeader.fontSize = 10;
                                    if (!doc.styles.tableBodyOdd) {
                                        doc.styles.tableBodyOdd = {};
                                    }
                                    if (!doc.styles.tableBodyEven) {
                                        doc.styles.tableBodyEven = {};
                                    }
                                    doc.styles.tableBodyOdd.alignment = 'center';
                                    doc.styles.tableBodyEven.alignment = 'center';
                                }
                            },
                            'colvis'
                        ],
                    });
                });
                </script>
            <?php

    }
    public function submodule_list(){
        $mod_id = $this->input->post('mod_id');

        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $order = $this->input->post('order');
        $search_value = $this->input->post('search')['value'];
        $order_column = $order[0]['column'];
        $order_dir = $order[0]['dir'];

        $module = $this->admin->getSubModule($mod_id, $start, $length, $order_column, $order_dir, $search_value);
        $data = [];
    
        foreach ($module as $row) {
            $data[] = [
                'sub_mod_name' => $row['sub_mod_name'],
                'action' => '
                    <div class="hstack gap-1 d-flex justify-content-center">
                        <button class="btn btn-sm btn-info edit-btn" onclick="edit_submodule_modal('.$row['sub_mod_id'].')" data-bs-toggle="modal" data-bs-target="#edit_submodule">
                            <iconify-icon icon="solar:pen-bold-duotone" class="label-icon align-bottom fs-16 me-2"></iconify-icon> Edit
                        </button>
                    </div>'

            ];
        }
        $total_records = $this->admin->getTotalSubModule($mod_id, $search_value);

        $output = [
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $total_records,
            "recordsFiltered" => $total_records,
            "data" => $data
        ];
        echo json_encode($output);

    }

    public function add_submodule_content(){
        $mod_id = $this->input->post('mod_id');

        echo '<div class="mb-3">
                    <label for="title" class="col-form-label">Sub Module Name:</label>
                    <input type="text" class="form-control" id="sub_mod_name">
                    <input type="hidden" class="form-control" id="mod_id" value="'.$mod_id.'">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="add_submodule()">Submit</button>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#submodule">Back To List</button>
                </div>';
    }

    public function insert_submodule(){
        $sub_mod_name = $this->input->post('sub_mod_name');
        $mod_id = $this->input->post('mod_id');
    
        $data = [
            'sub_mod_name' => $sub_mod_name,
            'mod_id' => $mod_id,
            'date_added' => date('Y-m-d H:i:s'),
        ];
    
        $this->admin->insertSubModule($data);
    }

    public function edit_submodule_content(){
        $sub_mod_id = $this->input->post('sub_mod_id');

        $row = $this->admin->get_submodule_data($sub_mod_id);

        echo '<div class="mb-3">
                    <label for="title" class="col-form-label">Sub Module Name:</label>
                    <input type="text" class="form-control" id="sub_mod_name" value="'.htmlspecialchars($row['sub_mod_name']).'">
                    <input type="hidden" class="form-control" id="sub_mod_id" value="'.$row['sub_mod_id'].'">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="submiteditedsubmodule('.$row['sub_mod_id'].')">Submit</button>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#submodule">Back To List</button>
                </div>';

    }
    public function update_submodule(){
        $sub_mod_id = $this->input->post('sub_mod_id');
        $sub_mod_name = $this->input->post('sub_mod_name');

        $data = [
            'sub_mod_name' => $sub_mod_name,
            'date_updated' => date('Y-m-d H:i:s'),
        ];
    
        $this->admin->updateSubModule($data, $sub_mod_id);
    }

    public function request()
	{
		$this->load->view('_layouts/header');
		$this->load->view('admin/request');
		$this->load->view('_layouts/footer');

	}
    

    public function typeofsystem_data() {
        $type = $this->input->post('type');
        $typeofsystem = $this->input->post('system');

        $team = $this->input->post('team');
        $module_id = $this->input->post('module');
        $sub_mod_id = $this->input->post('sub_module');


        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $order = $this->input->post('order');
        $search_value = isset($this->input->post('search')['value']) ? $this->input->post('search')['value'] : '';
    
        $order_column = isset($order[0]['column']) ? $order[0]['column'] : 0;
        $order_dir = isset($order[0]['dir']) ? $order[0]['dir'] : 'asc';
    


        $data = [];
        if ($typeofsystem === 'current') {
            $current = $this->admin->get_current_system_data($team, $module_id, $sub_mod_id, $type, $typeofsystem, $start, $length, $order_column, $order_dir, $search_value);

            foreach ($current as $row) {
                $status = '';
                switch ($type) {
                    case 'ISR':
                        $status = $row['isr_status'];
                        break;
                    case 'ATTENDANCE':
                        $status = $row['att_status'];
                        break;
                    case 'MINUTES':
                        $status = $row['minute_status'];
                        break;
                    case 'WALKTHROUGH':
                        $status = $row['wt_status'];
                        break;
                    case 'FLOWCHART':
                        $status = $row['flowchart_status'];
                        break;
                    case 'DFD':
                        $status = $row['dfd_status'];
                        break;
                    case 'SYSTEM_PROPOSED':
                        $status = $row['proposed_status'];
                        break;
                    case 'GANTT_CHART':
                        $status = $row['gantt_status'];
                        break;
                    case 'LOCAL_TESTING':
                        $status = $row['local_status'];
                        break;
                    case 'UAT':
                        $status = $row['uat_status'];
                        break;
                    case 'LIVE_TESTING':
                        $status = $row['live_status'];
                        break;
                    case 'USER_GUIDE':
                        $status = $row['guide_status'];
                        break;
                    case 'MEMO':
                        $status = $row['memo_status'];
                        break;
                    case 'BUSINESS_ACCEPTANCE':
                        $status = $row['acceptance_status'];
                        break;
                }
                $status_badge = '';
                if ($status === 'Approve') {
                    $status_badge = '<span class="badge bg-success">' . $status . '</span>';
                } elseif ($status === 'Pending') {
                    $status_badge = '<span class="badge bg-warning">' . $status . '</span>';
                }


                $file_info = pathinfo($row['file_name']);
                $extension = strtolower($file_info['extension']);
 
                $file_link = '';

                switch ($extension) {
                    case 'jpg':
                    case 'jpeg':
                    case 'png':
                    case 'gif':
                        $file_link = base_url('open_image/' . $row['uploaded_to'] . '/' . $row['file_name']);
                        break;
                    case 'pdf':
                        $file_link = base_url('open_pdf/' . $row['uploaded_to'] . '/' . $row['file_name']);
                        break;
                    case 'csv':
                    case 'xlsx':
                        $file_link = base_url('open_csv/' . $row['uploaded_to'] . '/' . $row['file_name']);
                        break;
                    case 'txt':
                    case 'docx':
                        $file_link = base_url('open_txt/' . $row['uploaded_to'] . '/' . $row['file_name']);
                        break;
                    case 'mp3':
                    case 'wav':
                    case 'ogg':
                        $file_link = base_url('open_audio/' . $row['uploaded_to'] . '/' . $row['file_name']);
                        break;
                }

                $data[] = [
                    'team_name' => $row['team_name'],
                    'file_name' => '<a href="' . $file_link . '" target="_blank">' . $row['file_name'] . '</a>',
                    'uploaded_to' => $row['uploaded_to'],
                    'status' => $status_badge,
                    'action' => '
                        <div class="hstack gap-1 d-flex justify-content-center">' .
                        ($status === 'Pending' ? 
                            '<button type="button" class="btn btn-soft-primary btn-label waves-effect waves-light btn-sm" onclick="approved(' . $row['file_id'] . ', \'' . $type . '\', \'' . $typeofsystem . '\')">' .
                            '<iconify-icon icon="ri:thumb-up-fill" class="label-icon align-bottom fs-16 me-2"></iconify-icon> Update</button>'
                            : 
                            '<button type="button" class="btn btn-soft-danger btn-label waves-effect waves-light btn-sm" onclick="backtopending(' . $row['file_id'] . ', \'' . $type . '\', \'' . $typeofsystem . '\')">' .
                            '<iconify-icon icon="tabler:refresh-alert" class="label-icon align-bottom fs-16 me-2"></iconify-icon> Recall</button>') .
                        '</div>'
                ];
            }
    
            $total_records = $this->admin->getTotalModuleCurrent($team, $module_id, $sub_mod_id, $search_value, $type);
        }


        if ($typeofsystem === 'new') {
            $new = $this->admin->get_new_system_data($team, $module_id, $sub_mod_id, $type, $typeofsystem, $start, $length, $order_column, $order_dir, $search_value);
            foreach ($new as $row) {
                $status = '';
                switch ($type) {
                    case 'ISR':
                        $status = $row['isr_status'];
                        break;
                    case 'ATTENDANCE':
                        $status = $row['att_status'];
                        break;
                    case 'MINUTES':
                        $status = $row['minute_status'];
                        break;
                    case 'WALKTHROUGH':
                        $status = $row['wt_status'];
                        break;
                    case 'FLOWCHART':
                        $status = $row['flowchart_status'];
                        break;
                    case 'DFD':
                        $status = $row['dfd_status'];
                        break;
                    case 'SYSTEM_PROPOSED':
                        $status = $row['proposed_status'];
                        break;
                    case 'LOCAL_TESTING':
                        $status = $row['local_status'];
                        break;
                    case 'UAT':
                        $status = $row['uat_status'];
                        break;
                    case 'LIVE_TESTING':
                        $status = $row['live_status'];
                        break;
                }

                $status_badge = '';
                if ($status === 'Approve') {
                    $status_badge = '<span class="badge bg-success">' . $status . '</span>';
                } elseif ($status === 'Pending') {
                    $status_badge = '<span class="badge bg-warning">' . $status . '</span>';
                }

                $file_info = pathinfo($row['file_name']);
                $extension = strtolower($file_info['extension']);
 
                $file_link = '';

                switch ($extension) {
                    case 'jpg':
                    case 'jpeg':
                    case 'png':
                    case 'gif':
                        $file_link = base_url('open_new_image/' . $row['uploaded_to'] . '/' . $row['file_name']);
                        break;
                    case 'pdf':
                        $file_link = base_url('open_new_pdf/' . $row['uploaded_to'] . '/' . $row['file_name']);
                        break;
                    case 'csv':
                    case 'xlsx':
                        $file_link = base_url('open_new_csv/' . $row['uploaded_to'] . '/' . $row['file_name']);
                        break;
                    case 'txt':
                    case 'docx':
                        $file_link = base_url('open_new_txt/' . $row['uploaded_to'] . '/' . $row['file_name']);
                        break;
                    case 'mp3':
                    case 'wav':
                    case 'ogg':
                        $file_link = base_url('open_new_audio/' . $row['uploaded_to'] . '/' . $row['file_name']);
                        break;
                }


                $data[] = [
                    'team_name' => $row['team_name'],
                   'file_name' => '<a href="' . $file_link . '" target="_blank">' . $row['file_name'] . '</a>',
                    'uploaded_to' => $row['uploaded_to'],
                    'status' => $status_badge,
                    'action' => '
                        <div class="hstack gap-1 d-flex justify-content-center">' .
                        ($status === 'Pending' ? 
                            '<button type="button" class="btn btn-soft-primary btn-label waves-effect waves-light btn-sm" onclick="approved(' . $row['file_id'] . ', \'' . $type . '\', \'' . $typeofsystem . '\')">' .
                            '<iconify-icon icon="ri:thumb-up-fill" class="label-icon align-bottom fs-16 me-2"></iconify-icon> Update</button>'
                            : 
                            '<button type="button" class="btn btn-soft-danger btn-label waves-effect waves-light btn-sm" onclick="backtopending(' . $row['file_id'] . ', \'' . $type . '\', \'' . $typeofsystem . '\')">' .
                            '<iconify-icon icon="tabler:refresh-alert" class="label-icon align-bottom fs-16 me-2"></iconify-icon> Recall</button>') .
                        '</div>'
                ];
            }
    
            $total_records = $this->admin->getTotalModuleNew($team, $module_id, $sub_mod_id,$search_value, $type);
        }
    
        $output = [
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $total_records,
            "recordsFiltered" => $total_records,
            "data" => $data
        ];
        echo json_encode($output);
    }
    // public function get_directory_counts()
    // {
    //     $directories = ['ISR', 'ATTENDANCE', 'MINUTES', 'WALKTHROUGH', 'FLOWCHART', 'DFD', 'SYSTEM_PROPOSED', 'GANTT_CHART', 'LOCAL_TESTING', 'UAT', 'LIVE_TESTING', 'USER_GUIDE', 'MEMO', 'BUSINESS_ACCEPTANCE'];
    //     $counts = [];
    //     $team       = $this->input->post('team');
    //     $mod_id     = $this->input->post('module');
    //     $sub_mod_id = $this->input->post('sub_module');
    //     $typeofsystem = $this->input->post('typeofsystem');


    //     foreach ($directories as $directory) {
    //         $counts[$directory] = $this->admin->get_file_count_by_directory($directory, $team, $mod_id, $sub_mod_id, $typeofsystem);
    //     }
    //     echo json_encode($counts);
    // }

    public function setup_module()
    {
        $type = $this->input->post('typeofsystem');
        $module = $this->admin->get_module($type);
        echo json_encode($module);
    }

    public function approved() {
        $file_id = $this->input->post('file_id');
        $type = $this->input->post('type');
        $typeofsystem = $this->input->post('typeofsystem');
    
        $status_field = '';
    
        if ($typeofsystem === 'current') {
            switch ($type) {
                case 'ISR':
                    $status_field = 'isr_status';
                    break;
                case 'ATTENDANCE':
                    $status_field = 'att_status';
                    break;
                case 'MINUTES':
                    $status_field = 'minute_status';
                    break;
                case 'WALKTHROUGH':
                    $status_field = 'wt_status';
                    break;
                case 'FLOWCHART':
                    $status_field = 'flowchart_status';
                    break;
                case 'DFD':
                    $status_field = 'dfd_status';
                    break;
                case 'SYSTEM_PROPOSED':
                    $status_field = 'proposed_status';
                    break;
                case 'GANTT_CHART':
                    $status_field = 'gantt_status';
                    break;
                case 'LOCAL_TESTING':
                    $status_field = 'local_status';
                    break;
                case 'UAT':
                    $status_field = 'uat_status';
                    break;
                case 'LIVE_TESTING':
                    $status_field = 'live_status';
                    break;
                case 'USER_GUIDE':
                    $status_field = 'guide_status';
                    break;
                case 'MEMO':
                    $status_field = 'memo_status';
                    break;
                case 'BUSINESS_ACCEPTANCE':
                    $status_field = 'acceptance_status';
                    break;
            }
        }
        if ($typeofsystem === 'new') {
            switch ($type) {
                case 'ISR':
                    $status_field = 'isr_status';
                    break;
                case 'ATTENDANCE':
                    $status_field = 'att_status';
                    break;
                case 'MINUTES':
                    $status_field = 'minute_status';
                    break;
                case 'WALKTHROUGH':
                    $status_field = 'wt_status';
                    break;
                case 'FLOWCHART':
                    $status_field = 'flowchart_status';
                    break;
                case 'DFD':
                    $status_field = 'dfd_status';
                    break;
                case 'SYSTEM_PROPOSED':
                    $status_field = 'proposed_status';
                    break;
                case 'LOCAL_TESTING':
                    $status_field = 'local_status';
                    break;
                case 'UAT':
                    $status_field = 'uat_status';
                    break;
                case 'LIVE_TESTING':
                    $status_field = 'live_status';
                    break;
            }
        }
    
        $update_data = [
            $status_field => 'Approve'
        ];
    
        $this->admin->approved($file_id, $update_data, $typeofsystem);  // Pass typeofsystem to the model
    }

    public function backtopending(){
        $file_id = $this->input->post('file_id');
        $type = $this->input->post('type');
        $typeofsystem = $this->input->post('typeofsystem');
    
        $status_field = '';
    
        if ($typeofsystem === 'current') {
            switch ($type) {
                case 'ISR':
                    $status_field = 'isr_status';
                    break;
                case 'ATTENDANCE':
                    $status_field = 'att_status';
                    break;
                case 'MINUTES':
                    $status_field = 'minute_status';
                    break;
                case 'WALKTHROUGH':
                    $status_field = 'wt_status';
                    break;
                case 'FLOWCHART':
                    $status_field = 'flowchart_status';
                    break;
                case 'DFD':
                    $status_field = 'dfd_status';
                    break;
                case 'SYSTEM_PROPOSED':
                    $status_field = 'proposed_status';
                    break;
                case 'GANTT_CHART':
                    $status_field = 'gantt_status';
                    break;
                case 'LOCAL_TESTING':
                    $status_field = 'local_status';
                    break;
                case 'UAT':
                    $status_field = 'uat_status';
                    break;
                case 'LIVE_TESTING':
                    $status_field = 'live_status';
                    break;
                case 'USER_GUIDE':
                    $status_field = 'guide_status';
                    break;
                case 'MEMO':
                    $status_field = 'memo_status';
                    break;
                case 'BUSINESS_ACCEPTANCE':
                    $status_field = 'acceptance_status';
                    break;
            }
        }
        if ($typeofsystem === 'new') {
            switch ($type) {
                case 'ISR':
                    $status_field = 'isr_status';
                    break;
                case 'ATTENDANCE':
                    $status_field = 'att_status';
                    break;
                case 'MINUTES':
                    $status_field = 'minute_status';
                    break;
                case 'WALKTHROUGH':
                    $status_field = 'wt_status';
                    break;
                case 'FLOWCHART':
                    $status_field = 'flowchart_status';
                    break;
                case 'DFD':
                    $status_field = 'dfd_status';
                    break;
                case 'SYSTEM_PROPOSED':
                    $status_field = 'proposed_status';
                    break;
                case 'LOCAL_TESTING':
                    $status_field = 'local_status';
                    break;
                case 'UAT':
                    $status_field = 'uat_status';
                    break;
                case 'LIVE_TESTING':
                    $status_field = 'live_status';
                    break;
            }
        }
    
        $update_data = [
            $status_field => 'Pending'
        ];
    
        $this->admin->backtopending($file_id, $update_data, $typeofsystem);
    }
    
    public function fetch_notifications()
    {
        $notifications = $this->admin->get_notifications();
        echo json_encode($notifications);
    }
    public function get_notification_count()
    {
        $count = $this->admin->get_pending_notification_count();
        echo json_encode(['count' => $count]); // Return the count as JSON
    }

}



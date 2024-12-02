<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Deployment extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if ($this->session->username == "") {
            redirect('login');
        }
        $this->load->model('Menu/Deploy_mod', 'deploy');
        $this->load->model('Menu/file_mod_new', 'file_mod_new');
        $this->load->model('Menu/file_mod_current', 'file_mod_current');
    }
    public function index()
    {
        $this->load->view('_layouts/header');
        $this->load->view('menu/deployment');
        $this->load->view('_layouts/footer');
    }
    public function for_implementation_list()
    {
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $order = $this->input->post('order');
        $search_value = $this->input->post('search')['value'];
        $order_column = $order[0]['column'];
        $order_dir = $order[0]['dir'];

        $for_implementation = $this->deploy->get_implementation_data($start, $length, $order_column, $order_dir, $search_value);

        $data = [];
        foreach ($for_implementation as $row) {
            $type = ($row['implem_type'] == 0) ? '<span class="badge rounded-pill bg-warning-subtle text-warning">For Implementation</span>' : '';
            $typeofsystem = ($row['typeofsystem'] == 'current') ? '<span class="badge rounded-pill bg-success-subtle text-success">'.$row['typeofsystem'].'</span>' : '<span class="badge rounded-pill bg-info-subtle text-info">'.$row['typeofsystem'].'</span>';
            $uploaded_to = $row['uploaded_to'];
            $data[] = [
                'team_name'     => $row['team_name'],
                'module'        => $row['mod_name'],
                'date_request'  => $row['date_request'],
                'bu_name'       => $row['bu_name'],
                'implem_type'   => $type,
                'typeofsystem'  => $typeofsystem,
                'uploaded_to'   => $uploaded_to,
                'action'        => '
                    <div class="justify-content-center">
                        <button type="button" class="btn btn-soft-secondary btn-label waves-effect waves-light btn-sm" onclick="upload_remaining_files(' . $row['mod_id'] . ', \'' . $row['mod_name'] . '\')" data-bs-toggle="modal" data-bs-target="#upload_remaining_files">
                            <iconify-icon icon="fluent-emoji-flat:file-folder" class="label-icon align-bottom fs-16 me-2"></iconify-icon> Remaining
                        </button>
                    </div>'
            ];
        }

        $total_records = $this->deploy->get_total_implementation_data($search_value);

        $output = [
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $total_records,
            "recordsFiltered" => $total_records,
            "data" => $data
        ];

        echo json_encode($output);
    }

    public function remaining_files_list()
    {
        $mod_id = $this->input->post('mod_id');
        $mod_name = $this->input->post('mod_name');
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $order = $this->input->post('order');
        $search_value = $this->input->post('search')['value'];
        $order_column = $order[0]['column'];
        $order_dir = $order[0]['dir'];

        $remaining_directories = $this->deploy->get_remaining_data($mod_id, $start, $length, $order_column, $order_dir, $search_value);

        $data = [];
        $directory_current = ['ISR', 'ATTENDANCE', 'MINUTES', 'WALKTHROUGH', 'FLOWCHART', 'DFD', 'SYSTEM_PROPOSED', 'GANTT_CHART', 'LOCAL_TESTING', 'UAT', 'LIVE_TESTING', 'USER_GUIDE', 'MEMO', 'BUSINESS_ACCEPTANCE'];
        $directory_new = ['ISR', 'ATTENDANCE', 'MINUTES', 'WALKTHROUGH', 'FLOWCHART', 'DFD', 'SYSTEM_PROPOSED', 'LOCAL_TESTING', 'UAT', 'LIVE_TESTING'];

        foreach ($remaining_directories as $row) {
            $directories = ($row['typeofsystem'] === 'current') ? $directory_current : $directory_new;
            $uploaded_to_list = !empty($row['uploaded_to']) ? array_map('trim', explode(',', $row['uploaded_to'])) : [];
            $filtered_directories = array_filter($directories, function ($dir) use ($uploaded_to_list) {
                return !in_array($dir, $uploaded_to_list, true);
            });

            foreach ($filtered_directories as $directory) {
                $data[] = [
                    'directory' => $directory,
                    'action' => '
                        <div class="justify-content-center">
                            <button type="button" class="btn btn-soft-secondary btn-label waves-effect waves-light btn-sm"  onclick="upload_to_directory(' . $mod_id . ', \'' . $directory . '\', \'' . $row['sub_mod_id'] . '\', \'' . $row['team_id'] . '\', \'' . $row['typeofsystem'] . '\', \'' . $mod_name . '\')">
                                <iconify-icon icon="line-md:cloud-alt-upload-filled-loop" class="label-icon align-bottom fs-16 me-2"></iconify-icon> Upload Files
                            </button>
                        </div>'
                ];
            }
        }

        $total_records = count($data);
        $output = [
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $total_records,
            "recordsFiltered" => $total_records,
            "data" => $data
        ];

        echo json_encode($output);
    }

    private function validate_manager_key($key)
    {
        $valid_key = 'new';
        return $key === $valid_key;
    }

    public function submit_to_directory()
    {
        $team               = $this->input->post('team_id');
        $module             = $this->input->post('mod_id');
        $sub_module         = $this->input->post('sub_mod_id');
        $selected_directory = $this->input->post('directory');
        $moduleName         = $this->input->post('file_mod_name');
        $business_unit      = $this->input->post('business_unit');
        $department         = $this->input->post('department');
        $typeofsystem       = $this->input->post('typeofsystem');

        if ($typeofsystem === 'new') {
            $response = ['success' => false, 'message' => ''];
            // Define the ordered sequence of directories
            $directory_order = [
                "ISR", "ATTENDANCE", "MINUTES", "WALKTHROUGH", "FLOWCHART", "DFD", "SYSTEM_PROPOSED", "LOCAL_TESTING", "UAT", "LIVE_TESTING"
            ];
    
            $selected_directory = $this->input->post('directory');
            $manager_key = $this->input->post('manager_key');
        
            if ($manager_key) {
                if (!$this->validate_manager_key($manager_key)) {
                    $response['message'] = "Invalid manager's key.";
                    echo json_encode($response);
                    return;
                }
            } else {
                $current_index = array_search($selected_directory, $directory_order);
                if ($current_index === false) {
                    $response['message'] = 'Invalid directory selected.';
                    echo json_encode($response);
                    return;
                }
        
                if ($current_index > 0) {
                    $previous_directory = $directory_order[$current_index - 1];
        
                    $pending_files = $this->file_mod_new->get_pending_files($team, $module, $sub_module, $previous_directory);
        
                    if ($pending_files) {
                        $response['message'] = "Approve pending files first in the \"$previous_directory\" directory before proceeding.";
                        echo json_encode($response);
                        return;
                    }
    
                    $previous_files_exist = $this->file_mod_new->check_files_exist($team, $module, $sub_module, $previous_directory);
                    if (!$previous_files_exist) {
                        $response['message'] = "Please upload files to the \"$previous_directory\" directory before proceeding to \"$selected_directory\".";
                        echo json_encode($response);
                        return;
                    }
                }
            }
        
            $folder_path = '\\\\172.16.42.144\\system\\' . $selected_directory;
            $config['upload_path'] = $folder_path;
            $config['allowed_types'] = '*'; 
            $config['max_size'] = 5000000000;
            $this->load->library('upload', $config);
        
            $uploaded_files = $_FILES['file'];
            $files_count = count($uploaded_files['name']);
            $success_count = 0;
        
            for ($i = 0; $i < $files_count; $i++) {
                $original_file_name = $uploaded_files['name'][$i];
                $file_name = $selected_directory . '_' . $moduleName . '_' . date('Y-m-d_his_A') . '_' . $business_unit . '_' . $department . '_' . $original_file_name;
                $file_exists_db = $this->file_mod_new->file_exists_new($file_name, $team, $module, $sub_module, $selected_directory);
        
                $file_path = $folder_path . '\\' . $file_name;
                if ($file_exists_db || file_exists($file_path)) {
                    $response['message'] = "File '{$file_name}' already exists in the directory.";
                    continue;
                }
        
                $_FILES['file']['name'] = $file_name;
                $_FILES['file']['type'] = $uploaded_files['type'][$i];
                $_FILES['file']['tmp_name'] = $uploaded_files['tmp_name'][$i];
                $_FILES['file']['error'] = $uploaded_files['error'][$i];
                $_FILES['file']['size'] = $uploaded_files['size'][$i];
        
                $this->upload->initialize($config);
                if ($this->upload->do_upload('file')) {
                    $success_count++;
        
                    $uploaded_data = $this->upload->data();
    
    
                    $status_fields = [
                        'ISR'             => 'isr_status',
                        'ATTENDANCE'      => 'att_status',
                        'MINUTES'         => 'minute_status',
                        'WALKTHROUGH'     => 'wt_status',
                        'FLOWCHART'       => 'flowchart_status',
                        'DFD'             => 'dfd_status',
                        'SYSTEM_PROPOSED' => 'proposed_status',
                        'LOCAL_TESTING'   => 'local_status',
                        'UAT'             => 'uat_status',
                        'LIVE_TESTING'    => 'live_status',
                    ];
                
                    $statuses = array_fill_keys(array_values($status_fields), null);
                
                    if (empty($manager_key)) {
                        if ($current_index > 0) {
                            for ($i = 0; $i < $current_index; $i++) {
                                $previous_directory = $directory_order[$i];
                                if (isset($status_fields[$previous_directory])) {
                                    $statuses[$status_fields[$previous_directory]] = 'Approve';
                                }
                            }
                        }
                    } 
    
                    if (isset($status_fields[$selected_directory])) {
                        $statuses[$status_fields[$selected_directory]] = 'Pending';
                    }
    
                    
                    $data = array_merge([
                        'team_id'       => $team,
                        'mod_id'        => $module,
                        'sub_mod_id'    => $sub_module,
                        'uploaded_to'   => $selected_directory,
                        'file_name'     => $uploaded_data['file_name'],
                        'date_uploaded' => date('Y-m-d H:i:s'),
                        'typeofsystem'  => 'new',
                        'business_unit' => $business_unit,
                        'department'    => $department,
                    ], $statuses);
        
                    $this->file_mod_new->upload_file($data);
                    $modul = $this->deploy->get_module_name($module);
                    $module_name = $modul->mod_name;
                    $action = '<b>' . $this->session->name. '</b> uploaded a file to <b>'.$selected_directory.' | '.$module_name.' | new</b>';
                    $data1 = array(
                        'emp_id' => $this->session->emp_id,
                        'action' => $action,
                        'date_added' => date('Y-m-d H:i:s'),
                    );
                    $this->load->model('Logs', 'logs');
                    $this->logs->addLogs($data1);
                }
            }
        
            if ($success_count === $files_count) {
                $response['success'] = true;
                $response['message'] = 'Files uploaded successfully.';
            }
            echo json_encode($response);
        } else {
            $directory_order = ['ISR', 'ATTENDANCE', 'MINUTES', 'WALKTHROUGH', 'FLOWCHART', 'DFD','SYSTEM_PROPOSED', 'GANTT_CHART', 'LOCAL_TESTING', 'UAT', 'LIVE_TESTING', 'USER_GUIDE', 'MEMO', 'BUSINESS_ACCEPTANCE'];
    
        $response = ['success' => false, 'message' => ''];
        $current_index = array_search($selected_directory, $directory_order);
        
        if ($current_index === false) {
            $response['message'] = 'Invalid directory selected.';
            echo json_encode($response);
            return;
        }
    
        if ($current_index > 0) {
            $previous_directory = $directory_order[$current_index - 1];

            $this->file_mod_current->approve_directory($team, $module, $sub_module, $previous_directory);
        }
    
        $folder_path = '\\\\172.16.42.144\\system\\' . $selected_directory;
        $config['upload_path'] = $folder_path;
        $config['allowed_types'] = '*';
        $config['max_size'] = 5000000000;
    
        $this->load->library('upload', $config);
    
        $uploaded_files = $_FILES['file'];
        $files_count = count($uploaded_files['name']);
        $success_count = 0;
    
        for ($i = 0; $i < $files_count; $i++) {
            $original_file_name = $uploaded_files['name'][$i];
            $file_name = $selected_directory . '_' . $moduleName . '_' . date('Y-m-d_his_A') . '_' . $business_unit . '_' . $department . '_' . $original_file_name;

            $file_exists_db = $this->file_mod_current->file_exists($file_name, $team, $module, $sub_module, $selected_directory);
    
            $file_path = $folder_path . '\\' . $file_name;
            if ($file_exists_db || file_exists($file_path)) {
                $response['message'] = "File '{$file_name}' already exists in the directory.";
                continue;
            }
    
            $_FILES['file']['name'] = $file_name;
            $_FILES['file']['type'] = $uploaded_files['type'][$i];
            $_FILES['file']['tmp_name'] = $uploaded_files['tmp_name'][$i];
            $_FILES['file']['error'] = $uploaded_files['error'][$i];
            $_FILES['file']['size'] = $uploaded_files['size'][$i];
    
            $this->upload->initialize($config);
            if ($this->upload->do_upload('file')) {
                $success_count++;
    
                $uploaded_data = $this->upload->data();
    
                $status_fields = [
                    'ISR' => 'isr_status',
                    'ATTENDANCE' => 'att_status',
                    'MINUTES' => 'minute_status',
                    'WALKTHROUGH' => 'wt_status',
                    'FLOWCHART' => 'flowchart_status',
                    'DFD' => 'dfd_status',
                    'SYSTEM_PROPOSED' => 'proposed_status',
                    'GANTT_CHART' => 'gantt_status',
                    'LOCAL_TESTING' => 'local_status',
                    'UAT' => 'uat_status',
                    'LIVE_TESTING' => 'live_status',
                    'USER_GUIDE' => 'guide_status',
                    'MEMO' => 'memo_status',
                    'BUSINESS_ACCEPTANCE' => 'acceptance_status'
                ];
    
                $statuses = array_fill_keys(array_values($status_fields), null);
    
                for ($j = 0; $j < $current_index; $j++) {
                    $previous_directory = $directory_order[$j];
                    if (isset($status_fields[$previous_directory])) {
                        $statuses[$status_fields[$previous_directory]] = 'Approve';
                    }
                }
    
                if (isset($status_fields[$selected_directory])) {
                    $statuses[$status_fields[$selected_directory]] = 'Approve';
                }
    
                $data = array_merge([
                    'team_id' => $team,
                    'mod_id' => $module,
                    'sub_mod_id' => $sub_module,
                    'uploaded_to' => $selected_directory,
                    'file_name' => $uploaded_data['file_name'],
                    'date_uploaded' => date('Y-m-d H:i:s'),
                    'typeofsystem' => 'current', 
                    'business_unit' => $business_unit,
                    'department'    => $department,
                ], $statuses);
    
                $this->file_mod_current->upload_file($data);
    
                $modul = $this->deploy->get_module_name($module);
                $module_name = $modul->mod_name;
                $action = '<b>' . $this->session->name . '</b> uploaded a file to <b>' . $selected_directory . ' | ' . $module_name . ' | current</b>';
                $data1 = [
                    'emp_id' => $this->session->emp_id,
                    'action' => $action,
                    'date_added' => date('Y-m-d H:i:s'),
                ];
                $this->load->model('Logs', 'logs');
                $this->logs->addLogs($data1);
            }
        }
        if ($success_count === $files_count) {
            $response['success'] = true;
            $response['message'] = 'Files uploaded successfully.';
        }
        echo json_encode($response);
        }
    }
}
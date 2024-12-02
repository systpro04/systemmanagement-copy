<?php 
class File_mod_current extends CI_Model
{
	function __construct() {
		parent::__construct();
        $this->db2 = $this->load->database('pis', TRUE);
	}
    public function get_file_details($file_name, $team = null, $module = null, $sub_module = null, $business_unit = null, $department = null) {

        $this->db->where('file_name', $file_name);
        if ($team) {
            $this->db->where('team_id', $team);
        }
        if ($module) {
            $this->db->where('mod_id', $module);
        }
        if ($sub_module) {
            $this->db->where('sub_mod_id', $sub_module);
        }
        if($business_unit) {
            $this->db->where('business_unit', $business_unit);
        }
        if($department) {
            $this->db->where('department', $department);
        }
    
        $this->db->where('typeofsystem', 'current');
        $query = $this->db->get('system_files');
        return $query->row();
    }
    public function get_files_by_name($folder_name) {
        $this->db->select('file_name');
        $this->db->from('system_files');
        $this->db->where('uploaded_to', $folder_name);
        $this->db->where('typeofsystem', 'current');
        $query = $this->db->get();
    
        return $query->result_array();
    }
    public function upload_file($data) {
        $this->db->insert('system_files', $data);
    }

    public function file_exists($file_name, $team, $module, $sub_mod_id, $path) {
        $this->db->where('file_name', $file_name);
        $this->db->where('team_id', $team);
        $this->db->where('mod_id', $module);
        $this->db->where('sub_mod_id', $sub_mod_id);
        $this->db->where('uploaded_to', $path);
        $this->db->where('typeofsystem', 'current');
        $query = $this->db->get('system_files');
        
        return $query->num_rows() > 0;
    }


    public function delete_file_record($file_name) {
        $this->db->where('file_name', $file_name);
        $this->db->where('typeofsystem', 'current');
        $this->db->delete('system_files');
    }

    public function get_teams() {
        $this->db->select('*');
        $this->db->from('team');
        $query = $this->db->get();
    
        return $query->result_array();
    }
    public function get_modules() {
        $this->db->select('*');
        $this->db->from('module');
        $this->db->where('active !=', 'Inactive');
        $this->db->where('typeofsystem', 'current');
        $query = $this->db->get();
    
        return $query->result_array();
    }

    public function get_sub_modules() {
        $this->db->select('*');
        $this->db->from('sub_module');
        $this->db->where('status !=', 'Inactive');
        $query = $this->db->get();
    
        return $query->result_array();
    }

    public function get_module_current()
    {
        $this->db->select('m.mod_id, m.mod_name, sb.sub_mod_id, sb.sub_mod_name');
        $this->db->from('module m');
        $this->db->join('sub_module sb', 'm.mod_id = sb.mod_id', 'left');
        $this->db->group_by('m.mod_id');
        $this->db->where('m.typeofsystem', 'current');
        $this->db->where('m.active', 'Active');
        $this->db->where('m.status', 'Approve');
        $modules = $this->db->get()->result();
    
        foreach ($modules as &$module) {
            $this->db->select('sb.sub_mod_id, sb.sub_mod_name');
            $this->db->from('sub_module sb');
            $this->db->where('sb.mod_id', $module->mod_id);
                    $this->db->where('sb.status', 'Active');
            $module->submodules = $this->db->get()->result();
        }
        return $modules;
    }

    public function check_pending_files($team, $module, $sub_mod_id, $previous_directory) {
        $this->db->where('team_id', $team);
        $this->db->where('mod_id', $module);
        $this->db->where('sub_mod_id', $sub_mod_id);
        $this->db->where('uploaded_to', $previous_directory);
        $this->db->group_start();
            $this->db->where('isr_status', 'pending');
            $this->db->or_where('wt_status', 'pending');
            $this->db->or_where('flowchart_status', 'pending');
            $this->db->or_where('dfd_status', 'pending');
            $this->db->or_where('proposed_status', 'pending');
            $this->db->or_where('local_status', 'pending');
            $this->db->or_where('uat_status', 'pending');
            $this->db->or_where('live_status', 'pending');
        $this->db->group_end();
    
        return $this->db->count_all_results('system_files');
    }
    public function check_files_exist($team, $module, $sub_mod_id, $previous_directory) {
        $this->db->where('team_id', $team);
        $this->db->where('mod_id', $module);
        $this->db->where('sub_mod_id', $sub_mod_id);
        $this->db->where('uploaded_to', $previous_directory);
        return $this->db->count_all_results('system_files');
    }
    // public function get_pending_files($team, $module, $sub_mod_id, $previous_directory) {
    //     $this->db->where('team_id', $team);
    //     $this->db->where('mod_id', $module);
    //     $this->db->where('sub_mod_id', $sub_mod_id);
    //     $this->db->where('uploaded_to', $previous_directory);
    //     $this->db->group_start();
    //         $this->db->where('isr_status', 'pending');
    //         $this->db->or_where('wt_status', 'pending');
    //         $this->db->or_where('flowchart_status', 'pending');
    //         $this->db->or_where('dfd_status', 'pending');
    //         $this->db->or_where('proposed_status', 'pending');
    //         $this->db->or_where('local_status', 'pending');
    //         $this->db->or_where('uat_status', 'pending');
    //         $this->db->or_where('live_status', 'pending');
    //     $this->db->group_end();
    //     return $this->db->get('system_files')->result_array();
    // }
    public function get_pending_files($team, $module, $sub_mod_id, $previous_directory) {
        $this->db->where('team_id', $team);
        $this->db->where('mod_id', $module);
        $this->db->where('sub_mod_id', $sub_mod_id);
        $this->db->where('uploaded_to', $previous_directory);
        $status_fields = [
            'ISR'                   => 'isr_status',
            'ATTENDANCE'            => 'att_status',
            'MINUTES'               => 'minute_status',
            'WALKTHROUGH'           => 'wt_status',
            'FLOWCHART'             => 'flowchart_status',
            'DFD'                   => 'dfd_status',
            'SYSTEM_PROPOSED'       => 'proposed_status',
            'GANTT'                 => 'gantt_status',
            'LOCAL_TESTING'         => 'local_status',
            'UAT'                   => 'uat_status',
            'LIVE_TESTING'          => 'live_status',
            'USER_GUIDE'            => 'guide_status',
            'MEMO'                  => 'memo_status',
            'BUSINESS_ACCEPTANCE'   => 'acceptance_status',
        ];
    
        if (isset($status_fields[$previous_directory])) {
            $this->db->where($status_fields[$previous_directory], 'Pending');
        }
    
        return $this->db->get('system_files')->result_array();
    }
    public function approve_directory($team, $module, $sub_mod_id, $previous_directory) {
        $status_fields = [
            'ISR'                   => 'isr_status',
            'ATTENDANCE'            => 'att_status',
            'MINUTES'               => 'minute_status',
            'WALKTHROUGH'           => 'wt_status',
            'FLOWCHART'             => 'flowchart_status',
            'DFD'                   => 'dfd_status',
            'SYSTEM_PROPOSED'       => 'proposed_status',
            'GANTT'                 => 'gantt_status',
            'LOCAL_TESTING'         => 'local_status',
            'UAT'                   => 'uat_status',
            'LIVE_TESTING'          => 'live_status',
            'USER_GUIDE'            => 'guide_status',
            'MEMO'                  => 'memo_status',
            'BUSINESS_ACCEPTANCE'   => 'acceptance_status',
        ];
        if (!isset($status_fields[$previous_directory])) {
            return false;
        }

        $status_column = $status_fields[$previous_directory];
        $this->db->where('team_id', $team)
                 ->where('mod_id', $module)
                 ->where('sub_mod_id', $sub_mod_id)
                 ->where('uploaded_to', $previous_directory)
                 ->set($status_column, 'Approve');
        return $this->db->update('system_files');
    }
    public function get_business_units(){

        $this->db2->select('c.*, b.*');
        $this->db2->from('locate_company c');
        $this->db2->join('locate_business_unit b', 'c.company_code = b.company_code');
        $this->db2->where('c.status', 'active');
        $this->db2->where('b.status', 'active');
        $this->db2->order_by('b.business_unit', 'ASC');
        $this->db2->group_by('b.bcode', 'ASC');
        $business_unit = $this->db2->get()->result();
    
        foreach ($business_unit as &$bu) {
            $this->db2->select('*');
            $this->db2->from('locate_department d');
            $this->db2->where('d.bunit_code', $bu->bunit_code);
            $bu->buData = $this->db2->get()->result();
        }
        return $business_unit;
    }
    public function get_departments($bcode) {
        $this->db2->select('dept.*');
        $this->db2->from('locate_department dept');
        $this->db2->join('locate_business_unit b', 'dept.bunit_code = b.bunit_code');
        $this->db2->where('dept.status', 'active');
        $this->db2->where('CONCAT(dept.company_code, dept.bunit_code) =', $bcode);
        $this->db2->group_by('dept.dcode', 'ASC');
        $query = $this->db2->get();
        return $query->result();
    }


    public function get_isr_requests($requestnumber)
    {
        $this->db3 = $this->load->database('isr', TRUE);

        $this->db3->select('requestnumber');
        $this->db3->from('requests');
        $this->db3->where('typeofrequest', 'ISR');
        $this->db3->where('approvedby !=', 0);
        $this->db3->where('requestnumber', $requestnumber);
        $this->db3->where('status !=', 'Cancelled');
        
        $query = $this->db3->get();
        return $query->result();
    }
    
}
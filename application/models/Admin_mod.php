<?php
class Admin_mod extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->db2 = $this->load->database('pis', TRUE);
    }

    public function get_employees($search)
    {
        $this->db2->select('emp_id, name');
        $this->db2->where('current_status', 'Active');
        $this->db2->group_start();
        $this->db2->like('emp_id', $search);
        $this->db2->or_like('name', $search);
        $this->db2->group_end();
        $this->db2->limit(10);
        $query = $this->db2->get('employee3');
        return $query->result();
    }

    public function emp_mod($emp_id)
    {
        $this->db2->where('emp_id', $emp_id);
        $this->db2->where('current_status', 'Active');
        $data = $this->db2->get('employee3');
        return $data->row_array();
    }
    public function add_user($data)
    {
        $this->db->insert('users', $data);
        return $this->db->affected_rows();
    }

    public function get_user_list($filter_team, $start, $length, $search_value, $order_by_column, $order_dir) {
        $this->db->select('users.*, team.*');
        $this->db->from('users');
        $this->db->join('team', 'users.team_id = team.team_id');
        $this->db->where('users.status', 'Active');
    

        if (!empty($search_value)) {
            $this->db->group_start()
                     ->like('team.team_name', $search_value)
                     ->or_like('users.emp_id', $search_value)
                     ->or_like('users.position', $search_value)
                     ->group_end();
                     $emp_ids = $this->get_emp_ids_by_name_search($search_value);
                     if (!empty($emp_ids)) {
                         $this->db->or_where_in('users.emp_id', $emp_ids);
                     }
        }

        $this->db->order_by($order_by_column, $order_dir);
    
        if ($length != -1) {
            $this->db->limit($length, $start);
        }
    
        if (!empty($filter_team)) {
            $this->db->where('team.team_id', $filter_team);
        }
        $query = $this->db->get();
        return $query->result_array();
    }
    
    public function get_emp_ids_by_name_search($search_value)
	{
		$this->db2->select('emp_id, name');
		$this->db2->from('employee3');
		$this->db2->like('name', $search_value);
		$query = $this->db2->get();
		
		$emp_ids = [];
		foreach ($query->result_array() as $row) {
			$emp_ids[] = $row['emp_id'];
		}

		return $emp_ids;
	}

    public function get_user_count($filter_team,$search_value = null) {
        $this->db->select('users.*, team.*');
        $this->db->from('users');
        $this->db->join('team', 'users.team_id = team.team_id');
        $this->db->where('users.status', 'Active');
    
        if (!empty($search_value)) {
            $this->db->group_start()
                     ->like('team.team_name', $search_value)
                     ->or_like('users.emp_id', $search_value)
                     ->or_like('users.position', $search_value)
                     ->group_end();
                     $emp_ids = $this->get_emp_ids_by_name_search($search_value);
                     if (!empty($emp_ids)) {
                         $this->db->or_where_in('users.emp_id', $emp_ids);
                     }
        }
        if (!empty($filter_team)) {
            $this->db->where('team.team_id', $filter_team);
        }
        return $this->db->count_all_results();
    }

    public function update_user_content($id) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function update_user($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }
    public function reset_password($id) {
        $this->db->where('id', $id);
        $this->db->set('password', md5($this->session->userdata('emp_id')));
        $this->db->update('users');
    }
    // public function get_file_count_by_directory($directory, $mod_id, $sub_mod_id, $team, $typeofsystem)
    // {
    //     $this->db->select('*');
    //     $this->db->from('system_files');
        
    //     if (!empty($typeofsystem)) {
    //         $this->db->where('typeofsystem', $typeofsystem);
    //     }
    //     if (!empty($mod_id)) {
    //         $this->db->where('mod_id', $mod_id);
    //     }
    //     if (!empty($sub_mod_id)) {
    //         $this->db->where('sub_mod_id', $sub_mod_id);
    //     }
    //     if (!empty($team)) {
    //         $this->db->where('team_id', $team);
    //     }
    //     $this->db->where('uploaded_to', $directory);
        
    //     $query = $this->db->get();
        
    //     return $query->num_rows();
    // }
    
    public function get_module($type)
    {
        $this->db->select('m.mod_id, m.mod_name, sb.sub_mod_id, sb.sub_mod_name');
        $this->db->from('module m');
        $this->db->join('sub_module sb', 'm.mod_id = sb.mod_id', 'left');
        $this->db->group_by('m.mod_id');
        $this->db->where('m.typeofsystem', $type);
        $this->db->where('m.active !=', 'Inactive');
        $modules = $this->db->get()->result();
    
        foreach ($modules as &$module) {
            $this->db->select('sb.sub_mod_id, sb.sub_mod_name');
            $this->db->from('sub_module sb');
            $this->db->where('sb.status !=', 'Inactive');

            $this->db->where('sb.mod_id', $module->mod_id);
            $module->submodules = $this->db->get()->result();
        }
        return $modules;
    }
    
    public function get_teams() {
        $this->db->select('*');
        $this->db->from('team');
        $query = $this->db->get();
    
        return $query->result();
    }

    public function getKPI($type, $start, $length, $order_column, $order_dir, $search_value)
    {
        $this->db->select('*');
        $this->db->from('kpi');

        if (!empty($search_value)) {
            $this->db->like('title', $search_value);
            $this->db->or_like('type', $search_value);
        }
        $this->db->where('type', $type);
        $this->db->where('status', 'Active');
        $this->db->order_by($order_column, $order_dir);
        $this->db->limit($length, $start);

        return $this->db->get()->result_array();
    }

    public function getTotalKPI($type, $search_value)
    {
        $this->db->select('*');
        $this->db->from('kpi');

        if (!empty($search_value)) {
            $this->db->like('title', $search_value);
            $this->db->or_like('type', $search_value);

        }
        $this->db->where('type', $type);
        $this->db->where('status', 'Active');
        return $this->db->count_all_results();
    }

    public function get_kpi_data($id)
    {
        $this->db->select('*');
        $this->db->from('kpi');
        $this->db->where('id', $id);
        $this->db->where('status', 'Active');
        return $this->db->get()->row_array();
    }

    public function insertKPI($data)
    {

        $this->db->insert('kpi', $data);
    }

    public function updateKPI($data, $id)
    {

        $this->db->where('id', $id);
        $this->db->update('kpi', $data);
    }

    public function deleteKPI($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kpi');
    }


    public function getModule($typeofsystem, $start, $length, $order_column, $order_dir, $search_value)
    {
        $this->db->select('*');
        $this->db->from('module');
        $this->db->where('active !=', 'Inactive');

        if (!empty($search_value)) {
            $this->db->like('mod_name', $search_value);
            $this->db->or_like('mod_abbr', $search_value);

        }
        $this->db->order_by($order_column, $order_dir);
        $this->db->limit($length, $start);
        $this->db->where('typeofsystem', $typeofsystem);

        return $this->db->get()->result_array();
    }

    public function getTotalModule($typeofsystem, $search_value)
    {
        $this->db->select('*');
        $this->db->from('module');
        $this->db->where('active !=', 'Inactive');
        if (!empty($search_value)) {
            $this->db->like('mod_name', $search_value);
            $this->db->or_like('mod_abbr', $search_value);

        }
        $this->db->where('typeofsystem', $typeofsystem);
        return $this->db->count_all_results();
    }

    public function insertModule($data)
    {
        $this->db->insert('module', $data);
        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            return false;
        }
    }
    public function updateModule($data, $id)
    {
        $this->db->where('mod_id', $id);
        $this->db->update('module', $data);
    }
    public function deleteModule($id) {
        $this->db->trans_start();
        // Delete the module
        $this->db->where('mod_id', $id);
        $this->db->set('active', 'Inactive');
        $this->db->update('module');

        // Delete related data in sub_module
        $this->db->where('mod_id', $id);
        $this->db->set('status', 'Inactive');
        $this->db->update('sub_module');

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            return false;
        }
        return true;
    }
    
    

    public function getSubModule($mod_id, $start, $length, $order_column, $order_dir, $search_value)
    {
        $this->db->select('*');
        $this->db->from('sub_module');
        $this->db->where('status !=', 'Inactive');
        if (!empty($search_value)) {
            $this->db->like('sub_mod_name', $search_value);
        }
        $this->db->order_by($order_column, $order_dir);
        $this->db->limit($length, $start);

        $this->db->where('mod_id', $mod_id);

        return $this->db->get()->result_array();
    }

    public function getTotalSubModule($mod_id, $search_value)
    {
        $this->db->select('*');
        $this->db->from('sub_module');
        $this->db->where('status !=', 'Inactive');
        if (!empty($search_value)) {
            $this->db->like('sub_mod_name', $search_value);
        }

        $this->db->where('mod_id', $mod_id);
        return $this->db->count_all_results();
    }
    public function insertSubModule($data)
    {

        $this->db->insert('sub_module', $data);
    }

    public function get_module_data($id)
    {
        $this->db->select('*');
        $this->db->from('module');
        $this->db->where('active !=', 'Inactive');
        $this->db->where('mod_id', $id);
        return $this->db->get()->row_array();
    }

    public function get_submodule_data($sub_mod_id)
    {
        $this->db->select('*');
        $this->db->from('sub_module');
        $this->db->where('status !=', 'Inactive');
        $this->db->where('sub_mod_id', $sub_mod_id);
        return $this->db->get()->row_array();
    }
    public function updateSubModule($data, $sub_mod_id)
    {
        $this->db->where('sub_mod_id', $sub_mod_id);
        $this->db->update('sub_module', $data);
    }

    public function get_current_system_data($team, $module_id, $sub_mod_id, $type, $typeofsystem, $start, $length, $order_column, $order_dir, $search_value)
    {
        $this->db->select('system_files.*, team.*');
        $this->db->from('system_files');
        $this->db->join('team', 'team.team_id = system_files.team_id');
        $this->db->where('uploaded_to', $type);
        $this->db->where('typeofsystem', $typeofsystem);

        if ($search_value) {
            $this->db->like('team.team_name', $search_value);
            $this->db->or_like('system_files.file_name', $search_value);
        }

        $columns = ['team_name', 'file_name', 'uploaded_to'];
        $order_column_name = isset($columns[$order_column]) ? $columns[$order_column] : $columns[0];
        $this->db->order_by($order_column_name, $order_dir);
        $this->db->limit($length, $start);

        if ($team) {
            $this->db->where('system_files.team_id', $team);
        }
        if ($module_id) {
            $this->db->where('system_files.mod_id', $module_id);
        }
        if ($sub_mod_id) {
            $this->db->where('system_files.sub_mod_id', $sub_mod_id);
        }

        return $this->db->get()->result_array();
    }

    public function get_new_system_data($team, $module_id, $sub_mod_id, $type, $typeofsystem, $start, $length, $order_column, $order_dir, $search_value)
    {
        $this->db->select('system_files.*, team.*');
        $this->db->from('system_files');
        $this->db->join('team', 'team.team_id = system_files.team_id');
        $this->db->where('uploaded_to', $type);
        $this->db->where('typeofsystem', $typeofsystem);

        if ($search_value) {
            $this->db->like('team.team_name', $search_value);
            $this->db->or_like('system_files.file_name', $search_value);
        }

        $columns = ['team_name', 'file_name', 'uploaded_to'];
        $order_column_name = isset($columns[$order_column]) ? $columns[$order_column] : $columns[0];
        $this->db->order_by($order_column_name, $order_dir);

        $this->db->limit($length, $start);
        if ($team) {
            $this->db->where('system_files.team_id', $team);
        }
        if ($module_id) {
            $this->db->where('system_files.mod_id', $module_id);
        }
        if ($sub_mod_id) {
            $this->db->where('system_files.sub_mod_id', $sub_mod_id);
        }
        return $this->db->get()->result_array();
    }



    public function getTotalModuleCurrent($team, $module_id, $sub_mod_id, $search_value = null, $type)
    {
        $this->db->select('COUNT(*) as total, team.*');
        $this->db->from('system_files');
        $this->db->join('team', 'team.team_id = system_files.team_id');
        $this->db->where('uploaded_to', $type);
        $this->db->where('typeofsystem', 'current');

        if ($team) {
            $this->db->where('system_files.team_id', $team);
        }
        if ($module_id) {
            $this->db->where('system_files.mod_id', $module_id);
        }
        if ($sub_mod_id) {
            $this->db->where('system_files.sub_mod_id', $sub_mod_id);
        }

        if ($search_value) {
            $this->db->like('team.team_name', $search_value);
            $this->db->or_like('system_files.file_name', $search_value);
        }

        $query = $this->db->get();
        return $query->row()->total;
    }
    public function getTotalModuleNew($team, $module_id, $sub_mod_id, $search_value = null, $type)
    {
        $this->db->select('COUNT(*) as total, team.*');
        $this->db->from('system_files');
        $this->db->join('team', 'team.team_id = system_files.team_id');
        $this->db->where('uploaded_to', $type);
        $this->db->where('typeofsystem', 'new');
        if ($team) {
            $this->db->where('system_files.team_id', $team);
        }
        if ($module_id) {
            $this->db->where('system_files.mod_id', $module_id);
        }
        if ($sub_mod_id) {
            $this->db->where('system_files.sub_mod_id', $sub_mod_id);
        }

        if ($search_value) {
            $this->db->like('team.team_name', $search_value);
            $this->db->or_like('system_files.file_name', $search_value);
        }

        $query = $this->db->get();
        return $query->row()->total;
    }

    public function updateModuleStatus($data, $mod_id)
    {
        $this->db->where('mod_id', $mod_id);
        $this->db->update('module', $data);

    }

    public function approved($file_id, $data, $typeofsystem)
    {
        if ($typeofsystem === 'current') {
            $this->db->where('file_id', $file_id);
            $this->db->update('system_files', $data);
        } elseif ($typeofsystem === 'new') {
            $this->db->where('file_id', $file_id);
            $this->db->update('system_files', $data);
        }
    }
    public function backtopending($file_id, $data, $typeofsystem)
    {
        if ($typeofsystem === 'current') {
            $this->db->where('file_id', $file_id);
            $this->db->update('system_files', $data);   
        } elseif ($typeofsystem === 'new') {
            $this->db->where('file_id', $file_id);
            $this->db->update('system_files', $data);
        }
    }

    public function get_notifications()
    {
        $this->db->select('system_files.*, team.team_name, m.mod_name');
        $this->db->from('system_files');
        $this->db->join('team', 'team.team_id = system_files.team_id');
        $this->db->join('module m', 'm.mod_id = system_files.mod_id');
        $this->db->order_by('system_files.date_uploaded', 'DESC'); 
        $this->db->where('isr_status', 'pending');
        $this->db->or_where('att_status', 'pending');
        $this->db->or_where('minute_status', 'pending');
        $this->db->or_where('wt_status', 'pending');
        $this->db->or_where('flowchart_status', 'pending');
        $this->db->or_where('dfd_status', 'pending');
        $this->db->or_where('gantt_status', 'pending');
        $this->db->or_where('proposed_status', 'pending');
        $this->db->or_where('local_status', 'pending');
        $this->db->or_where('uat_status', 'pending');
        $this->db->or_where('live_status', 'pending');
        $this->db->or_where('guide_status', 'pending');
        $this->db->or_where('memo_status', 'pending');
        $this->db->or_where('acceptance_status', 'pending');

        return $this->db->get()->result_array();
    }
    public function get_pending_notification_count()
    {
        $this->db->select('system_files.*, team.team_name, m.mod_name');
        $this->db->from('system_files');
        $this->db->join('team', 'team.team_id = system_files.team_id');
        $this->db->join('module m', 'm.mod_id = system_files.mod_id');
        $this->db->order_by('system_files.date_uploaded', 'DESC'); 
        $this->db->where('isr_status', 'pending');
        $this->db->or_where('att_status', 'pending');
        $this->db->or_where('minute_status', 'pending');
        $this->db->or_where('wt_status', 'pending');
        $this->db->or_where('flowchart_status', 'pending');
        $this->db->or_where('dfd_status', 'pending');
        $this->db->or_where('gantt_status', 'pending');
        $this->db->or_where('proposed_status', 'pending');
        $this->db->or_where('local_status', 'pending');
        $this->db->or_where('uat_status', 'pending');
        $this->db->or_where('live_status', 'pending');
        $this->db->or_where('guide_status', 'pending');
        $this->db->or_where('memo_status', 'pending');
        $this->db->or_where('acceptance_status', 'pending');
        return $this->db->count_all_results();
    }

}
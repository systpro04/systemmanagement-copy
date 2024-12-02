<?php 
class Workload extends CI_Model
{
	function __construct() {
		parent::__construct();
        $this->db2 = $this->load->database('pis', TRUE);
	}

    public function getWorkloads($status, $start, $length, $order_column, $order_dir, $search_value) {
        $this->db->select('w.*, m.*, sb.*, t.*, w.status');
        $this->db->from('workload w');
        $this->db->join('module m', 'm.mod_id = w.module', 'LEFT');
        $this->db->join('sub_module sb', 'w.sub_mod = sb.sub_mod_id AND w.module = sb.mod_id', 'LEFT');
        $this->db->join('team t', 't.team_id = w.team_id');

        if (!empty($search_value)) {
            $this->db->group_start();
            $this->db->like('t.team_name', $search_value);
            $this->db->or_like('w.emp_id', $search_value);
            $this->db->or_like('w.user_type', $search_value);
            $this->db->or_like('w.module', $search_value);
            $this->db->or_like('sb.sub_mod_name', $search_value);
            $this->db->or_like('w.sub_mod_menu', $search_value);
            $this->db->group_end();
            $emp_ids = $this->get_emp_ids_by_name_search($search_value);  // Assuming this function fetches emp_ids based on name
			if (!empty($emp_ids)) {
				$this->db->or_where_in('w.emp_id', $emp_ids); // Apply filter on emp_id
			}
        }
        $this->db->where('m.active ', 'Active');
        $this->db->where('w.status', $status);
        $this->db->order_by($order_column, $order_dir);
        $this->db->limit($length, $start);

        return $this->db->get()->result_array();
    }

    public function getTotalWorkloads($status, $search_value) {
        $this->db->select('w.*, m.*, sb.*, t.*, w.status');
        $this->db->from('workload w');
        $this->db->join('module m', 'm.mod_id = w.module', 'LEFT');
        $this->db->join('sub_module sb', 'w.sub_mod = sb.sub_mod_id AND w.module = sb.mod_id', 'LEFT');
        $this->db->join('team t', 't.team_id = w.team_id');
        if (!empty($search_value)) {
            $this->db->like('t.team_name', $search_value);
            $this->db->or_like('w.emp_id', $search_value);
            $this->db->or_like('w.user_type', $search_value);
            $this->db->or_like('w.module', $search_value);
            $this->db->or_like('sb.sub_mod_name', $search_value);
            $this->db->or_like('w.sub_mod_menu', $search_value);
            $emp_ids = $this->get_emp_ids_by_name_search($search_value);  // Assuming this function fetches emp_ids based on name
			if (!empty($emp_ids)) {
				$this->db->or_where_in('w.emp_id', $emp_ids); // Apply filter on emp_id
			}
        }
        $this->db->where('m.active ', 'Active');

        $this->db->where('w.status', $status);
        return $this->db->count_all_results();
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


    public function get_members_by_team($team_id)
    {
        $this->db->select('t.team_name, u.emp_id, u.position');
        $this->db->from('team t');
        $this->db->join('users u', 't.team_id = u.team_id');
        $this->db->where('t.team_id', $team_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_members($team_id)
    {
        $this->db->select('t.team_name, u.emp_id, u.position');
        $this->db->from('team t');
        $this->db->join('users u', 't.team_id = u.team_id');
        $this->db->where('t.team_id', $team_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_employees($emp_id) {
        $this->db2->select('*');
        $this->db2->from('employee3');
        $this->db2->where('emp_id', $emp_id);
        $query = $this->db2->get();
        return $query->result();
    }

    public function get_emp($emp_id) {
        $this->db2->select('*');
        $this->db2->from('employee3');
        $this->db2->where('emp_id', $emp_id);
        $query = $this->db2->get();
        return $query->row_array();
    }

    public function get_module()
    {
        $this->db->select('m.mod_id, m.mod_name, sb.sub_mod_id, sb.sub_mod_name');
        $this->db->from('module m');
        $this->db->join('sub_module sb', 'm.mod_id = sb.mod_id', 'left');
        $this->db->group_by('m.mod_id');
        // $this->db->where('typeofsystem', 'current');
        $this->db->where('m.active !=', 'Inactive');
        $modules = $this->db->get()->result();
    
        foreach ($modules as &$module) {
            $this->db->select('sb.sub_mod_id, sb.sub_mod_name');
            $this->db->from('sub_module sb');
            $this->db->where('sb.mod_id', $module->mod_id);
            $this->db->where('sb.status !=', 'Inactive');
            $module->submodules = $this->db->get()->result();
        }
        return $modules;
    }

    public function get_workload_by_id($id) {
        $this->db->select('w.*, m.*, sb.*, t.*, w.status, m.mod_id');
        $this->db->from('workload w');
        $this->db->join('module m', 'm.mod_id = w.module');
        $this->db->join('sub_module sb', 'w.sub_mod = sb.sub_mod_id', 'LEFT');
        $this->db->join('team t', 't.team_id = w.team_id');
        $this->db->where('w.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
    
}
<?php 
class Deploy_mod extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

    public function get_implementation_data($start, $length, $order_column, $order_dir, $search_value) {
        $this->db->select('m.*, t.team_name, GROUP_CONCAT(DISTINCT s.uploaded_to SEPARATOR ", ") as uploaded_to');
        $this->db->from('module m');
        $this->db->join('system_files s', 's.mod_id = m.mod_id');
        $this->db->join('team t', 's.team_id = t.team_id');
        $this->db->where('m.implem_type', '0');
        $this->db->group_by('m.mod_id');
        $this->db->where('m.active !=', 'Inactive');
        $this->db->where('m.typeofsystem', 'new');
        if (!empty($search_value)) {
            $this->db->group_start(); 
            $this->db->like('m.mod_name', $search_value);
            $this->db->or_like('m.date_request', $search_value);
            $this->db->or_like('m.bu_name', $search_value);
            $this->db->or_like('s.uploaded_to', $search_value);
            $this->db->group_end(); 
        }
    
        $this->db->order_by($order_column, $order_dir);
        $this->db->limit($length, $start);
        return $this->db->get()->result_array();
    }
    

    public function get_total_implementation_data($search_value) {
        $this->db->select('m.*, t.team_name, GROUP_CONCAT(s.uploaded_to SEPARATOR ", ") as uploaded_to');
        $this->db->from('module m');
        $this->db->join('system_files s', 's.mod_id = m.mod_id');
        $this->db->join('team t', 's.team_id = t.team_id');
        $this->db->where('m.implem_type', '0');
        $this->db->group_by('m.mod_id');
        $this->db->where('m.active !=', 'Inactive');
        $this->db->where('m.typeofsystem', 'new');

        if (!empty($search_value)) {
            $this->db->group_start(); 
            $this->db->like('m.mod_name', $search_value);
            $this->db->or_like('m.date_request', $search_value);
            $this->db->or_like('m.bu_name', $search_value);
            $this->db->or_like('s.uploaded_to', $search_value);
            $this->db->group_end(); 
        }

        return $this->db->count_all_results();
    }

    public function get_remaining_data($mod_id, $start, $length, $order_column, $order_dir, $search_value) {
        $this->db->select('s.team_id, s.sub_mod_id,s.typeofsystem, s.mod_id, GROUP_CONCAT(s.uploaded_to SEPARATOR ", ") as uploaded_to');
        $this->db->from('system_files s');
        $this->db->where('s.mod_id', $mod_id);
        $this->db->group_by('s.mod_id');
        
        if (!empty($search_value)) {
            $this->db->like('s.uploaded_to', $search_value);
        }

        $this->db->order_by($order_column, $order_dir);
        $this->db->limit($length, $start);
        return $this->db->get()->result_array();
    }
    public function get_module_name($mod_id) {
        $this->db->select('mod_name');
        $this->db->from('module');
        $this->db->where('mod_id', $mod_id);
        return $this->db->get()->row();
    }
    
}
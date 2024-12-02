<?php 
class Gantt_mod extends CI_Model
{
	function __construct() {
		parent::__construct();
	}
	public function getGanttData($team_id, $start, $length, $order_column, $order_dir, $search_value) {
		$this->db->select('g.*, t.*, m.*, sm.*');
		$this->db->from('gantt g');
		$this->db->join('team t', 'g.team_id = t.team_id', 'left');
		$this->db->join('module m', 'g.mod_id = m.mod_id', 'left');
		$this->db->join('sub_module sm', 'm.mod_id = sm.mod_id and g.sub_mod_id = sm.sub_mod_id', 'left');
		$this->db->where('m.active !=', 'Inactive');
        $this->db->where('sm.status !=', 'Inactive');
		if (!empty($search_value)) {
			$this->db->group_start()
					 ->like('t.team_name', $search_value)
					 ->or_like('g.emp_name', $search_value)
					 ->or_like('m.mod_name', $search_value)
					 ->or_like('sm.sub_mod_name', $search_value)
					 ->group_end();
		}
		if (!empty($team_id)) {
			$this->db->where('g.team_id', $team_id);
		}
		$this->db->order_by($order_column, $order_dir);
		$this->db->limit($length, $start);
		return $this->db->get()->result_array();
	}
	
	public function getTotalGantt($team_id, $search_value) {
		$this->db->from('gantt g');
		$this->db->join('team t', 'g.team_id = t.team_id', 'left');
		$this->db->join('module m', 'g.mod_id = m.mod_id', 'left');
		$this->db->join('sub_module sm', 'm.mod_id = sm.mod_id and g.sub_mod_id = sm.sub_mod_id', 'left');
		$this->db->where('m.active !=', 'Inactive');
        $this->db->where('sm.status !=', 'Inactive');
		if (!empty($search_value)) {
			$this->db->group_start()
					 ->like('t.team_name', $search_value)
					 ->or_like('g.emp_name', $search_value)
					 ->or_like('m.mod_name', $search_value)
					 ->or_like('sm.sub_mod_name', $search_value)
					 ->group_end();
		}
		if (!empty($team_id)) {
			$this->db->where('g.team_id', $team_id);
		}
		return $this->db->count_all_results();
	}
	
	public function submit_gantt($data) {
		$this->db->insert('gantt', $data);
	}
	public function update_gantt($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('gantt', $data);
	}
	public function delete_gantt($id) {
		$this->db->where('id', $id);
		$this->db->delete('gantt');
	}

	public function get_gant_data($id) {
		$this->db->select('g.*');
		$this->db->from('gantt g');
        $this->db->where('g.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
}
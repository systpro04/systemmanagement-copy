<?php 
class Weekly_mod extends CI_Model
{
	function __construct() {
		parent::__construct();
		$this->db2 = $this->load->database('pis', TRUE);
	}
	public function getweekly($date_range, $team, $module, $sub_module, $start, $length, $order_column, $order_dir, $search_value) {
		$this->db->select('wr.*, m.*, sb.*, t.*, wr.weekly_status');
		$this->db->from('weekly_report wr');
		$this->db->join('team t', 't.team_id = wr.team_id');
		$this->db->join('module m', 'm.mod_id = wr.mod_id');
		$this->db->join('sub_module sb', 'wr.sub_mod_id = sb.sub_mod_id');
		$this->db->where('m.active !=', 'Inactive');
        $this->db->where('sb.status !=', 'Inactive');
		if (!empty($search_value)) {
			$this->db->like('t.team_name', $search_value);
			$this->db->or_like('m.mod_name', $search_value);
			$this->db->or_like('sb.sub_mod_name', $search_value);
			$this->db->or_like('wr.task_workload', $search_value);
			$this->db->or_like('wr.remarks', $search_value);
			$emp_ids = $this->get_emp_ids_by_name_search($search_value);  // Assuming this function fetches emp_ids based on name
			if (!empty($emp_ids)) {
				$this->db->or_where_in('wr.emp_id', $emp_ids); // Apply filter on emp_id
			}
		}
	
		if (!empty($date_range)) {
			$dates = explode(' to ', $date_range);
			if (count($dates) === 2) {
				$start_date = date('Y-m-d', strtotime($dates[0]));
				$end_date = date('Y-m-d', strtotime($dates[1]));
				$this->db->where("DATE_FORMAT(STR_TO_DATE(SUBSTRING_INDEX(wr.date_range, ' to ', 1), '%M %d, %Y'), '%Y-%m-%d') <= ", $end_date);
				$this->db->where("DATE_FORMAT(STR_TO_DATE(SUBSTRING_INDEX(wr.date_range, ' to ', -1), '%M %d, %Y'), '%Y-%m-%d') >= ", $start_date);
			}
		}
	
		$this->db->order_by($order_column, $order_dir);
		$this->db->limit($length, $start);
	
		if (!empty($team)) {
			$this->db->where('wr.team_id', $team);
		}
		if (!empty($module)) {
			$this->db->where('wr.mod_id', $module);
		}
		if (!empty($sub_module)) {
			$this->db->where('wr.sub_mod_id', $sub_module);
		}
	
		return $this->db->get()->result_array();
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

	
	public function getTotalweekly($date_range, $team, $module, $sub_module, $search_value) {
		$this->db->select('wr.*, m.*, sb.*, t.*, wr.weekly_status');
		$this->db->from('weekly_report wr');
		$this->db->join('team t', 't.team_id = wr.team_id');
		$this->db->join('module m', 'm.mod_id = wr.mod_id');
		$this->db->join('sub_module sb', 'wr.sub_mod_id = sb.sub_mod_id');
		$this->db->where('m.active !=', 'Inactive');
        $this->db->where('sb.status !=', 'Inactive');
		if (!empty($search_value)) {
			$this->db->like('wr.emp_id', $search_value);
			$this->db->or_like('m.mod_name', $search_value);
			$this->db->or_like('sb.sub_mod_name', $search_value);
		}
	
		if (!empty($date_range)) {
			$dates = explode(' to ', $date_range);
			if (count($dates) === 2) {
				$start_date = date('Y-m-d', strtotime($dates[0]));
				$end_date = date('Y-m-d', strtotime($dates[1]));
				$this->db->where("DATE_FORMAT(STR_TO_DATE(SUBSTRING_INDEX(wr.date_range, ' to ', 1), '%M %d, %Y'), '%Y-%m-%d') <= ", $end_date);
				$this->db->where("DATE_FORMAT(STR_TO_DATE(SUBSTRING_INDEX(wr.date_range, ' to ', -1), '%M %d, %Y'), '%Y-%m-%d') >= ", $start_date);
			}
		}
	
		if (!empty($team)) {
			$this->db->where('wr.team_id', $team);
		}
		if (!empty($module)) {
			$this->db->where('wr.mod_id', $module);
		}
		if (!empty($sub_module)) {
			$this->db->where('wr.sub_mod_id', $sub_module);
		}
	
		return $this->db->count_all_results();
	}
	public function add_weekly($data) {
		$this->db->insert('weekly_report', $data);
	}
	public function edit_weekly_report_content($id){
		$this->db->select('*');
		$this->db->from('weekly_report');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();

	}
	public function update_weekly($data, $id) {
		$this->db->where('id', $id);
		$this->db->update('weekly_report', $data);
	}
	public function delete_weekly($id) {
		$this->db->where('id', $id);
		$this->db->delete('weekly_report');
	}
	
}
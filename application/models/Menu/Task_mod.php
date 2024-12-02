<?php 
class Task_mod extends CI_Model
{
	function __construct() {
		parent::__construct();
        $this->db2 = $this->load->database('pis', TRUE);
	}
	public function gettasks($type, $start, $length, $order_column, $order_dir, $search_value) {
        $this->db->select('dt.*, m.*, sb.*, t.*, dt.task_status');
        $this->db->from('daily_task dt');
		$this->db->join('team t', 't.team_id = dt.team_id');
        $this->db->join('module m', 'm.mod_id = dt.mod_id');
        $this->db->join('sub_module sb', 'dt.sub_mod_id = sb.sub_mod_id');
        $this->db->where('m.active !=', 'Inactive');
        $this->db->where('sb.status !=', 'Inactive');
        if (!empty($search_value)) {
            $this->db->like('dt.emp_id', $search_value);
            $this->db->or_like('m.mod_name', $search_value);
            $this->db->or_like('sb.sub_mod_name', $search_value);
            $emp_ids = $this->get_emp_ids_by_name_search($search_value); 
			if (!empty($emp_ids)) {
				$this->db->or_where_in('dt.emp_id', $emp_ids); 
			}
        }

        $this->db->order_by($order_column, $order_dir);
        $this->db->limit($length, $start);
		if (!empty($type)) {
            $this->db->where('dt.team_id', $type);
        }
        return $this->db->get()->result_array();
    }

    public function getTotaltasks($type, $search_value) {
        $this->db->select('dt.*, m.*, sb.*, t.*, dt.task_status');
        $this->db->from('daily_task dt');
		$this->db->join('team t', 't.team_id = dt.team_id');
        $this->db->join('module m', 'm.mod_id = dt.mod_id');
        $this->db->join('sub_module sb', 'dt.sub_mod_id = sb.sub_mod_id');
        $this->db->where('m.active !=', 'Inactive');
        $this->db->where('sb.status !=', 'Inactive');
        if (!empty($search_value)) {
            $this->db->like('dt.emp_id', $search_value);
            $this->db->or_like('m.mod_name', $search_value);
            $this->db->or_like('sb.sub_mod_name', $search_value);
            $emp_ids = $this->get_emp_ids_by_name_search($search_value); 
			if (!empty($emp_ids)) {
				$this->db->or_where_in('dt.emp_id', $emp_ids); 
            }
        }

		if (!empty($type)) {
            $this->db->where('dt.team_id', $type);
		}
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
	public function add_task($data) {
		$this->db->insert('daily_task', $data);
	}

	public function get_task_data($id) {
		$this->db->select('*');
		$this->db->from('daily_task');
        $this->db->where('task_id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }
	public function update_task($data, $id) {
		$this->db->where('task_id', $id);
		$this->db->update('daily_task', $data);
	}
	public function delete_task($id) {
		$this->db->where('task_id', $id);
		$this->db->delete('daily_task');
	}
}
<?php 
class Meeting_mod extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

    public function fetch_events() {
        $this->db->select('ms.*, t.team_name, m.mod_name, ms.time, t.team_id, m.mod_id, ms.id');
        $this->db->from('meeting_sched ms');
        $this->db->join('team t', 'ms.team_id = t.team_id');
        $this->db->join('module m', 'ms.mod_id = m.mod_id');
        $this->db->where('m.active !=', 'Inactive');
        $query = $this->db->get();
        return $query->result_array();
    }
    

    public function insert_event($data) {
        $this->db->insert('meeting_sched',$data);
    }
    public function update_event($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('meeting_sched',$data);
    }
    public function delete_event($id) {
        $this->db->where('id', $id);
        $this->db->delete('meeting_sched');
    }

    public function get_upcoming_meetings() {
        $this->db->select('ms.*, t.*');
        $this->db->from('meeting_sched ms');
        $this->db->join('team t', 'ms.team_id = t.team_id');
        $this->db->where('ms.date_meeting >= CURDATE()');
        $this->db->order_by('ms.date_meeting', 'ASC');
        $this->db->limit(20);
        return $this->db->get()->result_array();
    }

    

}
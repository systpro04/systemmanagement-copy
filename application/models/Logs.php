<?php 
class Logs extends CI_Model
{
    function __construct() {
        parent::__construct();
    }
    public  function addLogs($data1) {
        $this->db->insert('logs', $data1);
    }
    public function getLogs($type, $start, $length, $order_column, $order_dir, $search_value)
    {
        $this->db->select('*');
        $this->db->from('logs');
        $this->db->order_by('id', 'desc');
        if (!empty($search_value)) {
            $this->db->like('action', $search_value);

        }
        $this->db->order_by($order_column, $order_dir);
        $this->db->limit($length, $start);

        return $this->db->get()->result_array();
    }

    public function getTotalLogs($type, $search_value)
    {
        $this->db->select('*');
        $this->db->from('logs');
        $this->db->order_by('id', 'desc');

        if (!empty($search_value)) {
            $this->db->like('action', $search_value);

        }
        return $this->db->count_all_results();
    }

}
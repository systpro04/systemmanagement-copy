<?php 
class Dashboard_mod extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->db2 = $this->load->database('pis', TRUE);
    }

    public function programmers() {
        $this->db->select('COUNT(*) as total');
        $this->db->from('users');
        $this->db->where('position', 'Programmer');
        $this->db->where('type', 'Fulltime');
        $query = $this->db->get();
    
        $result = $query->row_array();
        return $result['total'];
    }
    
    public function analysts() {
        $this->db->select('COUNT(*) as total');
        $this->db->from('users');
        $this->db->where('position', 'System Analyst');
        $this->db->where('type', 'Fulltime');
        $query = $this->db->get();
    
        $result = $query->row_array();
        return $result['total'];
    }
    
    public function rms() {
        $this->db->select('COUNT(*) as total');
        $this->db->from('users');
        $this->db->where('position', 'RMS');
        $this->db->where('type', 'Fulltime');
        $query = $this->db->get();
    
        $result = $query->row_array();
        return $result['total'];
    }
    

    // public function get_employees_count_by_positions($positions) {
    //     $this->db2->select('COUNT(*) as total');
    //     $this->db2->from('employee3 e');
    //     $this->db2->join('applicant a', 'a.app_id = e.emp_id', 'inner');
    //     $this->db2->where([
    //         'e.company_code' => '01',
    //         'e.bunit_code' => '01',
    //         'e.dept_code' => '13',
    //         'e.section_code' => '02',
    //         'e.current_status' => 'active'
    //     ]);
    //     $this->db2->where_in('e.sub_section_code', ['', '01', '02']);
    //     $this->db2->where_in('e.position', $positions);
    //     $this->db2->where_not_in('e.emp_id', [
    //         '04316-2017', '05137-2022', '25077-2013', 
    //         '28541-2013', '00207-2023', '00203-2023', 
    //         '05011-2023', '04143-2023', '09662-2015', '23188-2013', '01075-2016', '01074-2016'
    //     ]);
    
    //     $this->db2->order_by('e.startdate', 'ASC');
    //     $query = $this->db2->get();
    //     return $query->row_array()['total'];
    // }

    public function get_birthday_list($positions, $month) {
        $this->db2->select('a.birthdate, e.emp_id, a.firstname, a.lastname');
        $this->db2->from('employee3 e');
        $this->db2->join('applicant a', 'a.app_id = e.emp_id', 'inner');
        $this->db2->where([
            'e.company_code' => '01',
            'e.bunit_code' => '01',
            'e.dept_code' => '13',
            'e.section_code' => '02',
            'e.current_status' => 'active'
        ]);
        $this->db2->where_in('e.sub_section_code', ['', '01', '02']);
        $this->db2->where_in('e.position', $positions);
        $this->db2->where_not_in('e.emp_id', [
            '04316-2017', '05137-2022', '25077-2013', 
            '28541-2013', '00207-2023', '00203-2023', 
            '05011-2023', '04143-2023', '09662-2015', '23188-2013', '01075-2016', '01074-2016'
        ]);
        $this->db2->where('MONTH(a.birthdate)', $month);
        $this->db2->order_by('DAY(a.birthdate)', 'asc');
        
        $query = $this->db2->get();
        
        return $query->result_array();
    }
    

    public function update_password($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }
    
    
    
}
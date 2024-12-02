<?php 
class Location_mod extends CI_Model
{
	function __construct() {
		parent::__construct();
        $this->db2 = $this->load->database('pis', TRUE);
	}

    public function module_list_implemented($start, $length, $order_column, $order_dir, $search_value) {
        $this->db->select('sl.*, m.*, sb.*, sl.mod_id')
                 ->from('location_setup sl')
                 ->join('module m', 'm.mod_id = sl.mod_id')
                 ->join('sub_module sb', 'sl.sub_mod_id = sb.sub_mod_id', 'Left')
                 ->where('m.active !=', 'Inactive')
                 ->group_by('sl.mod_id');
        
        if (!empty($search_value)) {
            $this->db->like('m.mod_name', $search_value);
        }
    
        $this->db->order_by($order_column, $order_dir)
                 ->limit($length, $start);
    
        return $this->db->get()->result_array();
    }
    
    public function get_total_module_list_implemented($search_value) {
        // Select fields from location_setup, module, and sub_module tables
        $this->db->select('sl.id AS location_id, m.mod_id, m.mod_name, sb.sub_mod_id, sb.sub_mod_name')
                 ->from('location_setup sl')
                 ->join('module m', 'm.mod_id = sl.mod_id')
                 ->join('sub_module sb', 'sl.sub_mod_id = sb.sub_mod_id')
                 ->where('m.active !=', 'Inactive')
                 ->group_by('sl.mod_id');

        if (!empty($search_value)) {
            $this->db->like('m.mod_name', $search_value);
        }

        return $this->db->count_all_results();
    }
    





















    public function get_location_data($module_id, $start, $length, $order_column, $order_dir, $search_value) {
        $this->db->select('sl.*, m.*, sb.*');
        $this->db->from('location_setup sl');
        $this->db->join('module m', 'm.mod_id = sl.mod_id', 'left');
        $this->db->join('sub_module sb', 'sl.sub_mod_id = sb.sub_mod_id', 'left');
        $this->db->where('m.active !=', 'Inactive');
        // $this->db->where('sb.status !=', 'Inactive');
        $this->db->where('sl.mod_id =', $module_id);
        if (!empty($search_value)) {
            $this->db->like('dt.company', $search_value);
            $this->db->or_like('dt.business_unit', $search_value);
            $this->db->or_like('dt.department', $search_value);
            $this->db->or_like('m.mod_name', $search_value);
            $this->db->or_like('sb.sub_mod_name', $search_value);
        }

        $this->db->order_by($order_column, $order_dir);
        $this->db->limit($length, $start);

        return $this->db->get()->result_array();
    }

    public function get_total_location_data($module_id, $search_value) {
        $this->db->select('sl.*, m.*, sb.*');
        $this->db->from('location_setup sl');
        $this->db->join('module m', 'm.mod_id = sl.mod_id', 'left');
        $this->db->join('sub_module sb', 'sl.sub_mod_id = sb.sub_mod_id', 'left');
        $this->db->where('m.active !=', 'Inactive');
        // $this->db->where('sb.status !=', 'Inactive');
        $this->db->where('sl.mod_id =', $module_id);
        if (!empty($search_value)) {
            $this->db->like('dt.company', $search_value);
            $this->db->or_like('dt.business_unit', $search_value);
            $this->db->or_like('dt.department', $search_value);
            $this->db->or_like('m.mod_name', $search_value);
            $this->db->or_like('sb.sub_mod_name', $search_value);
        }
        return $this->db->count_all_results();
    }

	public function get_setup_location_data($id) {
		$this->db->select('*');
		$this->db->from('location_setup');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function setup_location()
    {
        $this->db2->select('c.*,bu.*, dept.*');
        $this->db2->from('locate_company c');
        $this->db2->join('locate_business_unit bu', 'c.company_code = bu.company_code');
        $this->db2->join('locate_department dept', 'c.company_code = dept.company_code AND bu.bunit_code = dept.bunit_code');
        $this->db2->where('c.status', 'active');
        $this->db2->group_by('c.company_code', 'ASC');
        $location = $this->db2->get()->result();
    
        foreach ($location as &$loc) {
            $this->db2->select('bu.*');
            $this->db2->from('locate_business_unit bu');
            $this->db2->where('bu.company_code', $loc->company_code);
            $this->db2->where('bu.status', 'active');
            $loc->business_unit = $this->db2->get()->result();

            $this->db2->select('dept.*');
            $this->db2->from('locate_department dept');
            $this->db2->where('dept.company_code', $loc->company_code);
            $this->db2->where('dept.status', 'active');
            $loc->department = $this->db2->get()->result();
        }
        return $location;
    }
    public function company($company){
        $this->db2->select('*');
        $this->db2->from('locate_company');
        $this->db2->where('company_code', $company);
        $this->db2->where('status', 'active');
        return $this->db2->get()->row_array();
    }
    public function business_unit($bcode){
        $this->db2->select('*');
        $this->db2->from('locate_business_unit');
        $this->db2->where('bunit_code', $bcode);
        $this->db2->where('status', 'active');
        return $this->db2->get()->row_array();
    }
    public function department($department){
        $this->db2->select('*');
        $this->db2->from('locate_department');
        $this->db2->where('dcode', $department);
        $this->db2->where('status', 'active');
        return $this->db2->get()->row_array();
    }


    public function submit_location($data){
        $this->db->insert('location_setup', $data);
    }
    public function update_location($data, $id){
        $this->db->where('id', $id);
        $this->db->update('location_setup', $data);
    }
    public function delete_setup_location($id){
        $this->db->where('id', $id);
        $this->db->delete('location_setup');
    }
}







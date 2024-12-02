<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logs_ctrl extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        if ($this->session->username == "") {
            redirect('login');
        }
        $this->load->model('Logs', 'logs');
        $this->load->model('Menu/Workload', 'workload');
    }
    public function index(){
        $this->load->view('_layouts/header');
		$this->load->view('admin/logs');
		$this->load->view('_layouts/footer');
    }
    public function logs_list() {

        $type = $this->input->post('type');
        $start = $this->input->post('start');
        $length = $this->input->post('length');
        $order = $this->input->post('order');
        $search_value = $this->input->post('search')['value'];
        $order_column = $order[0]['column'];
        $order_dir = $order[0]['dir'];

        $kpi = $this->logs->getLogs($type, $start, $length, $order_column, $order_dir, $search_value);
        $data = [];
    
        foreach ($kpi as $row) {

            $emp_data = $this->workload->get_emp($row['emp_id']);  


            $data[] = [
                // 'id'      =>  $row['id'],
                'action'        => $row['action'],
                'date_added'    => $row['date_added'],
                'date_updated'  => $row['date_updated'],
            ];
        }
        $total_records = $this->logs->getTotalLogs($type, $search_value);

        $output = [
            "draw" => intval($this->input->post('draw')),
            "recordsTotal" => $total_records,
            "recordsFiltered" => $total_records,
            "data" => $data
        ];
        echo json_encode($output);
    }
}
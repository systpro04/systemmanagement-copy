<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if ($this->session->username == "") {
            redirect('login');
        }
		$this->load->model('Dashboard_mod', 'dashboard');
	}
	public function index(){


		$programmers_count = $this->dashboard->programmers();
		$analysts_count = $this->dashboard->analysts();
		$others_count = $this->dashboard->rms();    

		$data['programmers_count'] = $programmers_count;
		$data['analysts_count'] = $analysts_count;
		$data['others_count'] = $others_count;

		$this->load->view('_layouts/header');
		$this->load->view('dashboard', $data);
		$this->load->view('_layouts/footer');
	}
	// public function index() {
	// 	$programmers_positions = [
	// 		'System Programmer I', 
	// 		'System Programmer II', 
	// 		'System Programmer III'
	// 	];
	// 	$analysts_positions = [
	// 		'System Analyst I', 
	// 		'System Analyst II', 
	// 		'System Analyst III'
	// 	];
	// 	$rms_positions = [
	// 		'Tech Support Technician I', 
	// 		'Tech Support Technician II', 
	// 		'Tech Support Technician III',
	// 		'Office Clerk I'
	// 	];
	
	// 	$programmers_count = $this->dashboard->get_employees_count_by_positions($programmers_positions);
	// 	$analysts_count    = $this->dashboard->get_employees_count_by_positions($analysts_positions);
	// 	$others_count      = $this->dashboard->get_employees_count_by_positions($rms_positions);

	// 	$data['programmers_count'] = $programmers_count;
	// 	$data['analysts_count'] = $analysts_count;
	// 	$data['others_count'] = $others_count;

	// 	$this->load->view('_layouts/header');
	// 	$this->load->view('dashboard', $data);
	// 	$this->load->view('_layouts/footer');
	// }
	public function get_birthdays() {
		$month = $this->input->get('month');
	
		$positions = [
			'System Programmer I', 
			'System Programmer II', 
			'System Programmer III',
			'System Analyst I', 
			'System Analyst II', 
			'System Analyst III',
			'Tech Support Technician I', 
			'Tech Support Technician II', 
			'Tech Support Technician III',
			'Office Clerk I'
		];
	
		$birthday_list = $this->dashboard->get_birthday_list($positions, $month);
	
		if ($birthday_list) {
			echo json_encode(['status' => 'success', 'data' => $birthday_list]);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'No data found']);
		}
	}


	public function profile(){
		$this->load->view('_layouts/header');
		$this->load->view('profile');
		$this->load->view('_layouts/footer');
	}

	public function update_password(){
		$id 		= $this->input->post('id');
		$username 	= $this->input->post('username');
		$password 	= md5($this->input->post('password'));
		$data = array(
			'password' => $password,
			'username' => $username
		);
		$this->dashboard->update_password($id, $data);
		$this->session->set_userdata('username', $username);
		$this->session->set_userdata('password', $password);
	}
	
	
}

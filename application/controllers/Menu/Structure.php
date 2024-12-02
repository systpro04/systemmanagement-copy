<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Structure extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->username == "") {
            redirect('login');
        }
		$this->load->model('Menu/Structure_mod', 'structure');
		$this->load->model('Menu/Workload', 'workload');
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

	// 	$programmers 				= $this->structure->get_employees_by_positions($programmers_positions);
	// 	$analysts 					= $this->structure->get_employees_by_positions($analysts_positions);
	// 	$others 					= $this->structure->get_employees_by_positions($rms_positions);
	

	// 	$programmers = $this->format_employees($programmers);
	// 	$analysts 	 = $this->format_employees($analysts);
	// 	$others 	 = $this->format_employees($others);
	
	// 	$data['programmers'] = $programmers;
	// 	$data['analysts'] = $analysts;
	// 	$data['others'] = $others;
	
	// 	$this->load->view('_layouts/header');
	// 	$this->load->view('menu/structure', $data);
	// 	$this->load->view('_layouts/footer');
	// }

	// private function format_employees($employees) {
	// 	$formatted = [];
	// 	foreach ($employees as $e) {
	// 		$formatted[] = [
	// 			'name' => $e['name'],
	// 			'photo' => ltrim($e['photo'], '.'),
	// 		];
	// 	}
	// 	return $formatted;
	// }

	public function index()
	{

		$programmers = $this->structure->programmers();
		$analysts = $this->structure->analysts();
		$others = $this->structure->rms();
	
		$data['programmers'] = array_map(function ($pro) {
			$emp_data = $this->structure->get_emp($pro['emp_id']);
			if ($emp_data) {
				$pro['name'] 	= $emp_data['name'];
				$pro['photo'] 	= ltrim($emp_data['photo'], '.');
				$pro['date_hired'] = $emp_data['date_hired'];
			}
			return $pro;
		}, $programmers);
	
		$data['analysts'] = array_map(function ($sa) {
			$emp_data = $this->structure->get_emp($sa['emp_id']);
			if ($emp_data) {
				$sa['name'] 	= $emp_data['name'];
				$sa['photo'] 	= ltrim($emp_data['photo'], '.');
				$sa['date_hired'] = $emp_data['date_hired'];
			}
			return $sa;
		}, $analysts);
	
		$data['others'] = array_map(function ($r) {
			$emp_data = $this->structure->get_emp($r['emp_id']);
			if ($emp_data) {
				$r['name'] 		= $emp_data['name'];
				$r['photo'] 	= ltrim($emp_data['photo'], '.');
				$r['date_hired'] = $emp_data['date_hired'];
			}
			return $r;
		}, $others);
	
		usort($data['programmers'], function ($a, $b) {
			return strtotime($a['date_hired']) - strtotime($b['date_hired']);
		});
	
		usort($data['analysts'], function ($a, $b) {
			return strtotime($a['date_hired']) - strtotime($b['date_hired']);
		});
	
		usort($data['others'], function ($a, $b) {
			return strtotime($a['date_hired']) - strtotime($b['date_hired']);
		});
	
		$this->load->view('_layouts/header');
		$this->load->view('menu/structure', $data);
		$this->load->view('_layouts/footer');
	}
}

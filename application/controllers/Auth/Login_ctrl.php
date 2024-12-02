<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_ctrl extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Login_mod','login');
    } 

    public function index()
    {
        if ($this->session->username != "") {
            redirect('dashboard');
        }
        $this->load->view('auth/login');

    }

    public function login_data() {

        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        $hashed_password = md5($password);
        $user = $this->login->login_data_result($username, $hashed_password );
        if ($user) {
            $emp_id = $user['emp_id'];

            $employee = $this->login->get_emp($emp_id);

            if ($employee) {
                $user_details = $this->login->get_db_user($emp_id);

                if ($user_details) {
                    if ($employee['current_status'] === "Inactive") {
                        $this->session->set_flashdata('message', 'This account is deactivated');
                        $this->session->set_flashdata('message_type', 'error');
                        redirect('login');
                    }
                    $this->session->set_userdata([
                        'id'             => $user_details['id'],
                        'emp_id'         => $employee['emp_id'],
                        'username'       => $user_details['username'],
                        'name'           => $employee['name'],
                        'status'         => $user_details['status'],
                        'current_status' => $employee['current_status'],
                        'position'       => $user_details['position'],
                        'hrms_position'  => $employee['position'],
                        'firstname'      => $employee['firstname'],
                        'lastname'       => $employee['lastname'],
                        'emp_type'       => $employee['emp_type'],
                        'dept_name'      => $employee['dept_name'],
                        'company'        => $employee['company'],
                        'business'       => $employee['business_unit'],
                        'photo'          => ltrim($employee['photo'], '.'),
                    ]);

                    $this->session->set_flashdata('SUCCESSMSG', 'Login successful');
                    $action = '<b>' . $employee['name']. ' | '.$employee['position'].'</b> has a logged IN</b>';

                    $data1 = array(
                        'emp_id' => $employee['emp_id'],
                        'action' => $action,
                        'date_added' => date('Y-m-d H:i:s'),
                    );
                    $this->load->model('Logs', 'logs');
                    $this->logs->addLogs($data1);
                    redirect('dashboard');
                }
            }
        } else {
            $this->session->set_flashdata('message', 'Invalid username or password');
            $this->session->set_flashdata('message_type', 'error');
        }

        redirect('login');
    }
    

    public function logout_data()
    {
        if ($this->session->id == "") {
            redirect('login');
        } else {
            $this->session->set_flashdata('message', 'You have successfully logged out');
            $this->session->set_flashdata('message_type', 'success');

            $action = '<b>' . $this->session->name. ' | '.$this->session->hrms_position.'</b> has a logged OUT</b>';

            $data1 = array(
                'emp_id' => $this->session->emp_id,
                'action' => $action,
                'date_updated' => date('Y-m-d H:i:s'),
            );
            $this->load->model('Logs', 'logs');
            $this->logs->addLogs($data1);


            $this->session->sess_destroy();

            redirect('login');
        }
    }
    
}


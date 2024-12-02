<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RulesRegulation extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->username == "") {
            redirect('login');
        }
    }
    public function index() {
        $this->load->view('_layouts/header');
        $this->load->view('menu/rules_regulations');
        $this->load->view('_layouts/footer');
    }
}
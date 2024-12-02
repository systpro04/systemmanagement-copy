<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meeting extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ($this->session->username == "") {
            redirect('login');
        }
        $this->load->model('menu/Meeting_mod', 'meeting');
    }
    public function index() {
        $this->load->view('_layouts/header');
        $this->load->view('menu/meeting_sched');
        $this->load->view('_layouts/footer');
    }
    public function get_meeting() {
        $meeting = $this->meeting->fetch_events();

        $events = [];
        foreach ($meeting as $event) {
            $events[] = [
                'title' => $event['team_name'],
                'start' => $event['date_meeting'],
                'extendedProps' => [
                    'mod_name'  => $event['mod_name'],
                    'location'  => $event['location'],
                    'reasons'   => $event['reasons'],
                    'time'      => $event['time'],
                    'team_name' => $event['team_name'],
                    'team_id'   => $event['team_id'],
                    'mod_id'    => $event['mod_id'],
                    'id'        => $event['id'],
                ]
            ];
        }
        echo json_encode($events);
    }

    public function add_meeting() {

        $team_id     = $this->input->post('team_id');
        $team_name     = $this->input->post('team_name');
        $mod_id       = $this->input->post('mod_id');
        $date_meeting  = $this->input->post('date_meeting');
        $time          = $this->input->post('time');
        $location      = $this->input->post('location');
        $reasons       = $this->input->post('reasons');
        $data =[];
        $data = [
            'team_id'       => $team_id,
            'mod_id'        => $mod_id,
            'date_meeting'  => $date_meeting,
            'time'          => $time,
            'location'      => $location,
            'reasons'       => $reasons,
            'date_added'    => date('Y-m-d H:i:s')
        ];
        $this->meeting->insert_event($data);


        
        $action = '<b>' . $this->session->name. '</b> updated a meeting for <b>'.$team_name.'</b>';

        $data1 = array(
            'emp_id' => $this->session->emp_id,
            'action' => $action,
            'date_added' => date('Y-m-d H:i:s'),
        );
        $this->load->model('Logs', 'logs');
        $this->logs->addLogs($data1);


        echo json_encode(['status' => 'success']);
    }
    public function update_meeting() 
    {
        $id            = $this->input->post('id');
        $team_id       = $this->input->post('team_id');
        $team_name     = $this->input->post('team_name');
        $mod_id        = $this->input->post('mod_id');
        $date_meeting  = $this->input->post('date_meeting');
        $time          = $this->input->post('time');
        $location      = $this->input->post('location');
        $reasons       = $this->input->post('reasons');

        $data =[];
        $data = [
            'team_id'       => $team_id,
            'mod_id'        => $mod_id,
            'date_meeting'  => $date_meeting,
            'time'          => $time,
            'location'      => $location,
            'reasons'       => $reasons,
            'date_updated'  => date('Y-m-d H:i:s')
        ];
        $this->meeting->update_event($data, $id);

                
        $action = '<b>' . $this->session->name. '</b> updated a meeting for <b>'.$team_name.'</b>';

        $data1 = array(
            'emp_id' => $this->session->emp_id,
            'action' => $action,
            'date_updated' => date('Y-m-d H:i:s'),
        );
        $this->load->model('Logs', 'logs');
        $this->logs->addLogs($data1);

        echo json_encode(['status' => 'success']);
    }

    public function delete_meeting() {
        $id = $this->input->post('id');
        $this->meeting->delete_event($id);
        echo json_encode(['status' => 'success']);
    }

    public function get_upcoming_meetings() {
        $upcoming_events = $this->meeting->get_upcoming_meetings();
        echo json_encode($upcoming_events);
    }
    
    
    
}
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Home extends CI_Controller {

    private $conta_id;
    
    function __construct() {
        parent::__construct();

        if ($this->session->userdata('logged_in')) {
            $this->data['user'] = $this->session->userdata('logged_in');
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
        
        $this->conta_id  = $this->session->userdata('logged_in')['id'];
    }

    function index() {
        
        if ($this->session->userdata('logged_in')) {
            $data['user'] = $this->session->userdata('logged_in');
            $data['view'] = 'Painel/home';
            $this->load->view('Painel/index', $data);
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
    }

    function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('', 'refresh');
    }

}

?>
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class User extends CI_Controller {

    private $user_id;

    function __construct() {
        parent::__construct();
        
         if ($this->session->userdata('logged_in')) {
            $this->data['user'] = $this->session->userdata('logged_in');
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }

        $this->user_id = $this->session->userdata('logged_in')['id'];
        
        
        $this->load->library("Mensagem");
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

        $session_data = $this->session->userdata('logged_in');
    }

    function register() {
        $this->load->model('user_model', '', TRUE);
        $data['view'] = 'Painel/User/register';
        $this->load->view('Painel/index', $data);
    }
    
    function doRegister() {
        $this->load->model('user_model', '', TRUE);
        
        if ($this->user_model->doRegister($_POST, $this->user_id)) {
            $this->mensagem->setMensagem("Cadastro efetuado com sucesso!");
        } else {
            $this->mensagem->setMensagem("Erro ao Cadastrar!\\nPor favor, tente novamente.");
        }
        
        $this->mensagem->setUrl("user/listing");
        $this->mensagem->alerta();
        exit;
    }
    
    function alter() {
        $this->load->model('user_model', '', TRUE);
        $data['vUser'] = $this->user_model->alter($this->user_id);
        $data['view'] = 'Painel/User/alter';
        $this->load->view('Painel/index', $data);
    }

    function doAlter() {
        $this->load->model('user_model', '', TRUE);
        
        if ($this->user_model->doAlter($_POST, $this->user_id)) {
            $this->mensagem->setMensagem("Alteração efetuada com sucesso!");
        } else {
            $this->mensagem->setMensagem("Erro ao Alterar!\\nPor favor, tente novamente.");
        }
        
        $this->mensagem->setUrl("user/alter");
        $this->mensagem->alerta();
        exit;
    }
    

    function listing() {
        $this->load->model('user_model', '', TRUE);
        $data['vList'] = $this->user_model->listing();
        $data['view'] = 'Painel/User/listing';
        $this->load->view('Painel/index', $data);
    }
    
    function alterId() {
        $this->load->model('user_model', '', TRUE);
        $data['vUser'] = $this->user_model->alter($this->uri->segment(3));
        $data['view'] = 'Painel/User/alter';
        $this->load->view('Painel/index', $data);
    }
    
    
    function delete() {
        $this->load->model('user_model', '', TRUE);

        if ($this->user_model->delete($this->uri->segment(3))) {
            $this->mensagem->setMensagem("Exclusão efetuada com sucesso!");
        } else {
            $this->mensagem->setMensagem("Erro ao Deletar!\\nPor favor, tente novamente.");
        }
        $this->mensagem->setUrl("user/listing");
        $this->mensagem->alerta();
        exit;
    }
    
}

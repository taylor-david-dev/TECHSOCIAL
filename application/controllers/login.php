<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

session_start(); 

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->library("Mensagem");
    }

    function index() {
        $this->load->helper(array('form'));
        $this->load->view('Painel/login_view');
    }

    function cadastro() {
        $this->load->helper(array('form'));
        $this->load->view('Site/cadastro');
    }

    function doCadastrar() {
        $this->load->model('site_model', '', TRUE);
        
        $result = $this->site_model->cadastrar($_POST);
        if ($result) {
            
            $this->mensagem->setMensagem("Cadastro efetuado com sucesso!");

            $sess_array = array(
                'id' => $result[0]->id,
                'nome' => $result[0]->nome1
            );
            $this->session->set_userdata('logged_in', $sess_array);
            
        } else {
            $this->mensagem->setMensagem("Email já cadastrado\\nPor favor, outro email.");
            
            $this->mensagem->setUrl("login/cadastro");
            $this->mensagem->alerta();
            exit;
        }

        $this->mensagem->setUrl("home");
        $this->mensagem->alerta();
        exit;
    }

}

?>
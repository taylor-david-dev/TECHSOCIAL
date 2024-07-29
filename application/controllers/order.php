<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Order extends CI_Controller {

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
        $data['user'] = $this->session->userdata('logged_in');
        $data['view'] = 'Painel/Order/register';
        $this->load->view('Painel/index', $data);
    }

    function doRegister() {
        $this->load->model('order_model', '', TRUE);
        $_POST['price'] = str_replace(array(".", ","), array("", "."), $_POST['price']);

        if ($this->order_model->register($_POST)) {
            $this->mensagem->setMensagem("Cadastro efetuado com sucesso!");
        } else {
            $this->mensagem->setMensagem("Erro ao Cadastrar!\\nPor favor, tente novamente.");
        }
        
        $this->mensagem->setUrl("order/listing");
        $this->mensagem->alerta();
        exit;
    }

    function listing() {
        $this->load->model('order_model', '', TRUE);
        $data['user'] = $this->session->userdata('logged_in');
        $data['vList'] = $this->order_model->listing();
        $data['view'] = 'Painel/Order/listing';
        $this->load->view('Painel/index', $data);
    }


    function excluir() {
        $this->load->model('lancamento_model', '', TRUE);
        $data['user'] = $this->session->userdata('logged_in');

        if ($this->lancamento_model->excluir($this->uri->segment(3), $this->conta_id)) {
            $data['valida'] = 'trueExcluir';
            $data['vLista'] = $this->lancamento_model->listar($this->conta_id);
            $data['view'] = 'Painel/Lancamento/listar';
            $this->load->view('Painel/index', $data);
        } else {
            $data['valida'] = 'false';
            $data['vLista'] = $this->lancamento_model->listar($this->conta_id);
            $data['view'] = 'Painel/Lancamento/listar';
            $this->load->view('Painel/index', $data);
        }
    }

    function alter() {
        $this->load->model('order_model', '', TRUE);
        $data['vList'] = $this->order_model->alter($this->uri->segment(3));
        $data['view'] = 'Painel/Order/alter';
        $this->load->view('Painel/index', $data);
    }

    function doAlter() {
        $this->load->model('order_model', '', TRUE);
        $_POST['price'] = str_replace(array(".", ","), array("", "."), $_POST['price']);
        if ($this->order_model->doAlter($_POST)) {
            $this->mensagem->setMensagem("Alteração efetuada com sucesso!");
        } else {
            $this->mensagem->setMensagem("Erro ao Alterar!\\nPor favor, tente novamente.");
        }
        
        $this->mensagem->setUrl("order/listing");
        $this->mensagem->alerta();
        exit;
    }

}

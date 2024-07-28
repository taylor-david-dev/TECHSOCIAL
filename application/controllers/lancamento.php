<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Lancamento extends CI_Controller {

    private $conta_id;

    function __construct() {
        parent::__construct();

        if ($this->session->userdata('logged_in')) {
            $this->data['user'] = $this->session->userdata('logged_in');
        } else {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
        
        $this->conta_id = $this->session->userdata('logged_in')['id'];
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

    function cadastrar() {
        $data['user'] = $this->session->userdata('logged_in');
        $data['view'] = 'Painel/Lancamento/cadastrar';
        $this->load->view('Painel/index', $data);
    }

    function doCadastrar() {

        //print_r($_FILES);exit;
        $this->load->model('lancamento_model', '', TRUE);
        $data['user'] = $this->session->userdata('logged_in');
        $_POST['valor'] = str_replace(array(".", ","), array("", "."), $_POST['valor']);

        //print_r($_POST);exit;
        if ($this->lancamento_model->cadastrar($_POST, $this->conta_id)) {
            $data['view'] = 'Painel/Lancamento/listar';
            $data['valida'] = 'true';
            $data['vLista'] = $this->lancamento_model->listar($this->conta_id);
            $this->load->view('Painel/index', $data);
        } else {
            $data['valida'] = 'false';
            $data['vLista'] = $this->lancamento_model->listar($this->conta_id);
            $data['view'] = 'Painel/Lancamento/listar';
            $this->load->view('Painel/index', $data);
        }
    }

    function listar() {
        $this->load->model('lancamento_model', '', TRUE);
        $data['user'] = $this->session->userdata('logged_in');
        $data['valida'] = '';
        $data['vLista'] = $this->lancamento_model->listar($this->conta_id);
        $data['view'] = 'Painel/Lancamento/listar';
        $this->load->view('Painel/index', $data);
    }

    function doPesquisar() {
        $this->load->model('lancamento_model', '', TRUE);
        $data['user'] = $this->session->userdata('logged_in');
        $data['valida'] = '';
        $data['vLista'] = $this->lancamento_model->doPesquisar($_POST, $this->conta_id);
        $data['view'] = 'Painel/Lancamento/listar';
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

    function pagamento() {
        $this->load->model('lancamento_model', '', TRUE);
        $data['user'] = $this->session->userdata('logged_in');

        if ($this->lancamento_model->payment($this->uri->segment(3), $this->conta_id)) {
            $data['valida'] = 'truePago';
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

    function alterar() {
        $this->load->model('lancamento_model', '', TRUE);
        $data['user'] = $this->session->userdata('logged_in');
        $data['vCliente'] = $this->lancamento_model->alterar($this->uri->segment(3), $this->conta_id);
        $data['view'] = 'Painel/Lancamento/alterar';
        $this->load->view('Painel/index', $data);
    }

    function doAlterar() {
        $this->load->model('lancamento_model', '', TRUE);
        $data['user'] = $this->session->userdata('logged_in');
        $_POST['valor'] = str_replace(array(".", ","), array("", "."), $_POST['valor']);
        if ($this->lancamento_model->doAlterar($_POST, $this->conta_id)) {

            $data['view'] = 'Painel/Lancamento/listar';
            $data['valida'] = 'trueAlterado';
            $data['vLista'] = $this->lancamento_model->listar($this->conta_id);
            $this->load->view('Painel/index', $data);
        } else {
            $data['valida'] = 'false';
            $data['vLista'] = $this->lancamento_model->listar($this->conta_id);
            $data['view'] = 'Painel/Lancamento/listar';
            $this->load->view('Painel/index', $data);
        }
    }

}

?>
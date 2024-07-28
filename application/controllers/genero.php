<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI

class Genero extends CI_Controller {

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
        $data['view'] = 'Painel/Genero/cadastrar';
        $this->load->view('Painel/index', $data);
    }

    function doCadastrar() {
        $this->load->model('genero_model', '', TRUE);
        $data['user'] = $this->session->userdata('logged_in');
        if ($this->genero_model->cadastrar($_POST, $this->conta_id)) {

            $data['view'] = 'Painel/Genero/listar';
            $data['valida'] = 'true';
            $data['vLista'] = $this->genero_model->listar($this->conta_id);
            $this->load->view('Painel/index', $data);
        } else {

            $data['valida'] = 'false';
            $data['vLista'] = $this->genero_model->listar($this->conta_id);
            $data['view'] = 'Painel/Genero/listar';
            $this->load->view('Painel/index', $data);
        }
    }

    function doPesquisaGeneroAjax() {
        $this->load->model('genero_model', '', TRUE);
        $data['user'] = $this->session->userdata('logged_in');
        echo $this->genero_model->pesquisaGeneroAjax($_POST, $this->conta_id);
    }

    function doPesquisaGeneroAjax2() {
        $this->load->model('genero_model', '', TRUE);
        $data['user'] = $this->session->userdata('logged_in');
        echo $this->genero_model->pesquisaGeneroAjax2($_POST, $this->conta_id);
    }

    function listar() {
        $this->load->model('genero_model', '', TRUE);
        $data['user'] = $this->session->userdata('logged_in');
        $data['valida'] = '';
        $data['vLista'] = $this->genero_model->listar($this->conta_id);
        $data['view'] = 'Painel/Genero/listar';
        $this->load->view('Painel/index', $data);
    }

    function excluir() {
        $this->load->model('genero_model', '', TRUE);
        $data['user'] = $this->session->userdata('logged_in');

        if ($this->genero_model->excluir($this->uri->segment(3), $this->conta_id)) {
            $data['valida'] = 'trueExcluir';
            $data['vLista'] = $this->genero_model->listar($this->conta_id);
            $data['view'] = 'Painel/Genero/listar';
            $this->load->view('Painel/index', $data);
        } else {
            $data['valida'] = 'false';
            $data['vLista'] = $this->genero_model->listar($this->conta_id);
            $data['view'] = 'Painel/Genero/listar';
            $this->load->view('Painel/index', $data);
        }
    }

    function alterar() {
        $this->load->model('genero_model', '', TRUE);
        $data['user'] = $this->session->userdata('logged_in');
        $data['vCliente'] = $this->genero_model->alterar($this->uri->segment(3), $this->conta_id);
        $data['view'] = 'Painel/Genero/alterar';
        $this->load->view('Painel/index', $data);
    }

    function doAlterar() {
        $this->load->model('genero_model', '', TRUE);
        $data['user'] = $this->session->userdata('logged_in');
        if ($this->genero_model->doAlterar($_POST, $this->conta_id)) {

            $data['view'] = 'Painel/Genero/listar';
            $data['valida'] = 'trueAlterado';
            $data['vLista'] = $this->genero_model->listar($this->conta_id);
            $this->load->view('Painel/index', $data);
        } else {
            $data['valida'] = 'false';
            $data['vLista'] = $this->genero_model->listar($this->conta_id);
            $data['view'] = 'Painel/Genero/listar';
            $this->load->view('Painel/index', $data);
        }
    }

}

?>
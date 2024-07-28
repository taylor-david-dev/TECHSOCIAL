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

            $this->load->model('relatorio_model', '', TRUE);
            
            $dadosPagos = $this->relatorio_model->total_valor_lancamento_mes_atual_pagos($this->conta_id);
            $data['lucroXcustoMes'] = $dadosPagos;
            
            $dados = $this->relatorio_model->total_valor_lancamento($this->conta_id);
            $data['lucroXcusto'] = $dados['vLista'];
            
            $dadosNext = $this->relatorio_model->total_valor_lancamento_proximo_mes($this->conta_id);
            
            
            $data['lucroXcustoNext'] = $dadosNext['vLista'];
            
            $dadosYear = $this->relatorio_model->total_valor_lancamento_anual($this->conta_id);
            $data['lucroXcustoYear'] = $dadosYear['vLista'];
            
            
            $dadosDetalhadosYear = $this->relatorio_model->total_detalhado_por_ano($this->conta_id);
            $data['lancamentosAnuais'] = $dadosDetalhadosYear['vLista'];
            
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
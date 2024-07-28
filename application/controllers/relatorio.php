<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Relatorio extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		if($this->session->userdata('logged_in'))
		{	
			$data['user'] = $this->session->userdata('logged_in');
			$data['view'] = 'Painel/home';
			$this->load->view('Painel/index', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('login', 'refresh');
		}
		
		$session_data = $this->session->userdata('logged_in');
		
	}

	function tarefa()
	{	
		$data['user'] = $this->session->userdata('logged_in');
		$data['view'] = 'Painel/Relatorio/tarefa';
		$this->load->view('Painel/index', $data);
	}
	
	function doCadastrar(){
		$this->load->model('tarefa_model','',TRUE);
		$data['user'] = $this->session->userdata('logged_in');
		if($this->tarefa_model->cadastrar($_POST)){
			
			$data['view'] = 'Painel/Tarefa/listar';
			$data['valida'] = 'true';
			$data['vLista'] = $this->tarefa_model->listar();
			$this->load->view('Painel/index', $data);
			
		}else{
			
			$data['valida'] = 'false';
			$data['vLista'] = $this->tarefa_model->listar();
			$data['view'] = 'Painel/Tarefa/listar';
			$this->load->view('Painel/index', $data);
			
		}
	}
	
	function doTarefa(){
		$this->load->model('relatorio_model','',TRUE);
		$data['user'] = $this->session->userdata('logged_in');
		if($this->relatorio_model->tarefaPDF($_POST)){
                        $data['valida'] = 'false';
			$data['view'] = 'Painel/Relatorio/tarefa';
			$this->load->view('Painel/index', $data);
		}else{
			
			$data['valida'] = 'false';
			$data['view'] = 'Painel/Relatorio/tarefa';
			$this->load->view('Painel/index', $data);
		}
	}
	
	function listar()
	{
		$this->load->model('tarefa_model','',TRUE);
		$this->load->model('cliente_model','',TRUE);
		$this->load->model('servico_model','',TRUE);
		$data['user'] = $this->session->userdata('logged_in');
		$data['valida'] = '';
		$data['vLista'] = $this->tarefa_model->listar();
		$data['vCliente'] = $this->cliente_model->listar();
		$data['vServico'] = $this->servico_model->listar();
		$data['view'] = 'Painel/Tarefa/listar';
		$this->load->view('Painel/index', $data);
	}
	
	function excluir()
	{
		$this->load->model('tarefa_model','',TRUE);
		$this->load->model('cliente_model','',TRUE);
		$this->load->model('servico_model','',TRUE);
		$data['user'] = $this->session->userdata('logged_in');
		
		if($this->tarefa_model->excluir($this->uri->segment(3))){
			$data['valida'] = 'trueExcluir';
		}else{
			$data['valida'] = 'false';
		}
		
		$data['vLista'] = $this->tarefa_model->listar();
		$data['vCliente'] = $this->cliente_model->listar();
		$data['vServico'] = $this->servico_model->listar();
		$data['view'] = 'Painel/Tarefa/listar';
		$this->load->view('Painel/index', $data);
	}
	
	function alterar()
	{
		$this->load->model('tarefa_model','',TRUE);
		$this->load->model('cliente_model','',TRUE);
		$this->load->model('servico_model','',TRUE);
		
		$data['user'] = $this->session->userdata('logged_in');
		$data['vTarefa'] = $this->tarefa_model->alterar($this->uri->segment(3));
		$data['vCliente'] = $this->cliente_model->listar();
		$data['vServico'] = $this->servico_model->listar();
		$data['view'] = 'Painel/Tarefa/alterar';
		$this->load->view('Painel/index', $data);

	}
	
	function doAlterar(){
		$this->load->model('tarefa_model','',TRUE);
		$this->load->model('cliente_model','',TRUE);
		$this->load->model('servico_model','',TRUE);
		
		$data['user'] = $this->session->userdata('logged_in');
		if($this->tarefa_model->doAlterar($_POST)){
			$data['valida'] = 'trueAlterado';
				
		}else{
			$data['valida'] = 'false';
		}
		
		$data['vLista'] = $this->tarefa_model->listar();
		$data['vCliente'] = $this->cliente_model->listar();
		$data['vServico'] = $this->servico_model->listar();
		
		$data['view'] = 'Painel/Tarefa/listar';
		$data['vLista'] = $this->tarefa_model->listar();
		$this->load->view('Painel/index', $data);
		
	}
	

}

?>
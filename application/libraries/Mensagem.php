<?php
/**
* Classe "Mensagem" que exibe alertas e efetua redirecionamentos
*
* Criado em: 2008-09-01
* Modificado em: 2009-02-19
* Criado por: Daniel Kohn @ Floripa 360°
**/
class Mensagem {
	
	/**
	* Atributos:
	* @titulo		-> string
	* @mensagem		-> string
	* @url			-> string
	* @botao		-> botao
	**/
	private $titulo;
	private $mensagem;
	private $url;
	private $botao;
	
	/**
	* Método construtor 'Mensagem'
	**/
	public function Mensagem_model() {
		$this->titulo = "Mensagem do Sistema";
		$this->mensagem = "";
		$this->url = "";
		$this->botao = "OK";
	}
	
	/**
	* Método 'setTitulo'
	*
	* Parametros:
	* @titulo	-> string
	**/
	public function setTitulo($titulo) {
		$this->titulo = $titulo;
	}

	/**
	* Método 'setMensagem'
	*
	* Parametros:
	* @mensagem	-> string
	**/
	public function setMensagem($mensagem) {
		$this->mensagem = $mensagem;
	}

	/**
	* Método 'setUrl'
	*
	* Parametros:
	* @url	-> string
	**/
	public function setUrl($url) {
		$this->url = $url;
	}

	/**
	* Método 'botao'
	*
	* Parametros:
	* @botao	-> string
	**/
	public function setBotao($botao) {
		$this->botao = $botao;
	}
	
	/**
	* Método 'alerta'
	* 
	* retorno: "Nenhum"
	**/
	public function alerta() {
		// define dados do 'alerta' a ser exibido e da página e ser redirecionada
		$alerta = $this->mensagem!="" ? "alert('".$this->mensagem."');" : "";
		$action = $this->url!="" ? "location.href='".base_url().$this->url."';" : "history.back()";
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>:: <?php echo $this->titulo; ?> ::</title>
<script language="javascript">
	function alerta(){
		<?php echo $alerta; ?>
		<?php echo $action; ?>
	}
</script>
</head>
<body onLoad="alerta();">
</body>
</html>
<?php
	}

}
?>
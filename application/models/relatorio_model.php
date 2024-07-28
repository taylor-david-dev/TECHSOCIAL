<?php

Class relatorio_model extends CI_Model {

    function cadastrar($dados) {
        $gamb = explode(" ", $dados['dataHora']);
        $dataHora = $data = implode("-", array_reverse(explode("/", $gamb[0])));
        $dataHora = $dataHora . ' ' . $gamb[1];
        $data = array(
            'servico_id' => $dados['servico_id'],
            'cliente_id' => $dados['cliente_id'],
            'titulo' => $dados['titulo'],
            'dataHora' => $dataHora,
            'descricao' => $dados['descricao']);

        return $this->db->insert('tarefa', $data);
    }

    function listar() {
        $this->db->select('*');
        $this->db->from('tarefa');
        return $this->db->get()->result();
    }

    function excluir($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tarefa');
    }

    function alterar($id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->from('tarefa');
        return $this->db->get()->result();
    }

    function tarefaPDF($dados) {
        //$dados[cliente_id];
        //$dados[descricao];
        //$dados[nome_cliente];
        //$this->db->select('*');
        //$this->db->where('cliente_id', $dados['cliente_id']);
        //$this->db->from('tarefa');
        
        $dataIni = explode(" ", $dados['dataInicial']);
        $dataFin = explode(" ", $dados['dataFinal']);
        $dataInicial = implode("-", array_reverse(explode("/", $dataIni[0])))." ".$dataIni[1].":00";
        $dataFinal = implode("-", array_reverse(explode("/", $dataFin[0])))." ".$dataFin[1].":59";
        
        $result = $this->db->query("SELECT * FROM tarefa as t join servico as se on (t.servico_id = se.id) WHERE t.cliente_id = " . $dados['cliente_id'] . " and t.dataHora BETWEEN '" . $dataInicial . "' AND '" . $dataFinal . "'");
        
        require_once(APPPATH . 'libraries/mpdf/mpdf.php');

        $mpdf = new mPDF('c', 'A4-L'); // L- deitada P - empe'

        //$mpdf->allow_charset_conversion=true;
        $mpdf->charset_in='utf-8';
        //Exibir a pagina inteira no browser
        //$mpdf->SetDisplayMode('fullpage');
        //Cabeçalho: Seta a data/hora completa de quando o PDF foi gerado + um texto no lado direito
        $mpdf->SetHeader('<img src="'.base_url().'_file/cliente/'.$dados['cliente_id'].'/logo.png" style="width: 20px"/> {DATE d/m/Y}|{PAGENO}/{nb}|');
        //$mpdf->SetHeader('{DATE d/m/Y}|{PAGENO}/{nb}|Texto no cabeçalho');
        //Rodapé: Seta a data/hora completa de quando o PDF foi gerado + um texto no lado direito
        $mpdf->SetFooter('{DATE d/m/Y}|{PAGENO}/{nb}|'.$dados[descricao]);
        $html = "<html>";
        $html .= "<head></head>";
        $html .= "<body><table style='width:100%;font-size:12px;'>
  <tr>
    <td>Data Hora</td>
    <td>Tarefa</td>
    <td>Cod. Serviço</td> 
    <td>Serviço</td>
    <td>Valor</td>
    <td>Descrição</td>
  </tr>";
        $valida = true;
        foreach ($result->result() as $row){
            if($valida){
                $html .= "<tr style='background: #ccc;'>";
                $valida = false;
            }else{
                $html .= "<tr>";
                $valida = true;
            }
            
            $gamb = explode(" ", $row->dataHora);
                    $dataHora =  $data = implode("/",array_reverse(explode("-",$gamb[0])));
                    $dataHora = $dataHora.' '.$gamb[1];
            
            $html .= "<td>".$dataHora."</td>
                        <td>".$row->titulo."</td> 
                        <td>".$row->cod."</td> 
                        <td>".$row->nome."</td>
                        <td>".$row->valor."</td>
                        <td>".$row->descricao."</td>
                      </tr>";
        }
        
        $html .= "</table></body>";
        $html .= "</html>";
        
        $mpdf->WriteHTML($html);

        // define um nome para o arquivo PDF
        if ($filename == null) {
            $filename = $dados[nome_cliente].'_'.date("d-m-Y_his") . '_.pdf';
        }

        //header("Content-Type: application/pdf"); // informa o tipo do arquivo ao navegador
        //header("Content-Length: " . filesize($arquivo)); // informa o tamanho do arquivo ao navegador
        //header("Content-Disposition: attachment; filename=" . basename($arquivo)); // informa ao navegador que é tipo anexo e faz abrir a janela de download, tambem informa o nome do arquivo
        //readfile($arquivo); // lê o arquivo

        $mpdf->Output($filename, 'D');
        return true;
    }
    
    
    public function total_valor_lancamento($conta_id){
        //1 custo 0 lucro
        
        $resultCusto = $this->db->query("Select SUM(lan.valor) as valor
from lancamento as lan 
inner join genero as gen on lan.genero_id = gen.id
where gen.tipo = 1 and MONTH(data_vencimento) = MONTH(CURRENT_DATE()) and YEAR(data_vencimento) = YEAR(CURRENT_DATE()) and lan.conta_id = ". $conta_id)->result();
        
        $resultLucro = $this->db->query("Select SUM(lan.valor) as valor
from lancamento as lan 
inner join genero as gen on lan.genero_id = gen.id
where gen.tipo = 0 and MONTH(data_vencimento) = MONTH(CURRENT_DATE()) and YEAR(data_vencimento) = YEAR(CURRENT_DATE()) and lan.conta_id = ". $conta_id)->result();
        
        $vObj = [];
        
        $vObj[0][] = 'Custo';
        $vObj[0][] = $resultCusto[0]->valor;
        
        $vObj[1][] = 'Lucro';
        $vObj[1][] = $resultLucro[0]->valor;
        
        $vObj['vLista'] = $vObj;
        //print_r($vObj);exit;
        //$vObj['lucro'] = $resultLucro[0]->valor;
        return $vObj;
        
    }
    
     public function total_valor_lancamento_proximo_mes($conta_id){
        //1 custo 0 lucro
         
         $date = date('Ym', strtotime('+1 month'));
        
        $resultCusto = $this->db->query("Select SUM(lan.valor) as valor
from lancamento as lan 
inner join genero as gen on lan.genero_id = gen.id
where gen.tipo = 1 and EXTRACT(YEAR_MONTH FROM data_vencimento) = '".$date."' and lan.conta_id = ". $conta_id)->result();
        
        $resultLucro = $this->db->query("Select SUM(lan.valor) as valor
from lancamento as lan 
inner join genero as gen on lan.genero_id = gen.id
where gen.tipo = 0 and EXTRACT(YEAR_MONTH FROM data_vencimento) = '".$date."' and lan.conta_id = ". $conta_id)->result();
        
        $vObj = [];
        
        $vObj[0][] = 'Custo';
        $vObj[0][] = $resultCusto[0]->valor;
        
        $vObj[1][] = 'Lucro';
        $vObj[1][] = $resultLucro[0]->valor;
        
        $vObj['vLista'] = $vObj;
        //print_r($vObj);exit;
        //$vObj['lucro'] = $resultLucro[0]->valor;
        return $vObj;
        
    }
    
    
    public function total_valor_lancamento_mes_atual_pagos($conta_id){
        //1 custo 0 lucro
        
$resultCustoApagar = $this->db->query("Select SUM(lan.valor) as valor
from lancamento as lan 
inner join genero as gen on lan.genero_id = gen.id
where gen.tipo = 1 and MONTH(data_vencimento) = MONTH(CURRENT_DATE()) and YEAR(data_vencimento) = YEAR(CURRENT_DATE()) and lan.lan_status = 0 and lan.conta_id = ". $conta_id)->result();

$resultCustoJaPago = $this->db->query("Select SUM(lan.valor) as valor
from lancamento as lan 
inner join genero as gen on lan.genero_id = gen.id
where gen.tipo = 1 and MONTH(data_vencimento) = MONTH(CURRENT_DATE()) and YEAR(data_vencimento) = YEAR(CURRENT_DATE()) and lan.lan_status = 1 and lan.conta_id = ". $conta_id)->result();

        
        $resultLucroAreceber = $this->db->query("Select SUM(lan.valor) as valor
from lancamento as lan 
inner join genero as gen on lan.genero_id = gen.id
where gen.tipo = 0 and MONTH(data_vencimento) = MONTH(CURRENT_DATE()) and YEAR(data_vencimento) = YEAR(CURRENT_DATE()) and lan.lan_status = 0 and lan.conta_id = ". $conta_id)->result();

$resultLucroJarecebido = $this->db->query("Select SUM(lan.valor) as valor
from lancamento as lan 
inner join genero as gen on lan.genero_id = gen.id
where gen.tipo = 0 and MONTH(data_vencimento) = MONTH(CURRENT_DATE()) and YEAR(data_vencimento) = YEAR(CURRENT_DATE()) and lan.lan_status = 1 and lan.conta_id = ". $conta_id)->result();
        
        $vObj = [
            'aPagar' =>  $resultCustoApagar[0]->valor,
            'jaPago' =>  $resultCustoJaPago[0]->valor,
            'aReceber' =>  $resultLucroAreceber[0]->valor,
            'jaRebeu' =>  $resultLucroJarecebido[0]->valor,
            ];
        
        //$vObj[0][] = 'Custo';
        //$vObj[0][] = $resultCusto[0]->valor;
        //
        //$vObj[1][] = 'Lucro';
        //$vObj[1][] = $resultLucro[0]->valor;
        
        //$vObj['vLista'] = $vObj;
        //print_r($vObj);exit;
        //$vObj['lucro'] = $resultLucro[0]->valor;
        return $vObj;        
    }
    
    
    public function total_valor_lancamento_anual($conta_id){
        //1 custo 0 lucro
        
        $resultCusto = $this->db->query("Select SUM(lan.valor) as valor
from lancamento as lan 
inner join genero as gen on lan.genero_id = gen.id
where gen.tipo = 1 and YEAR(data_vencimento) = YEAR(CURRENT_DATE()) and lan.conta_id = ". $conta_id)->result();
        
        $resultLucro = $this->db->query("Select SUM(lan.valor) as valor
from lancamento as lan 
inner join genero as gen on lan.genero_id = gen.id
where gen.tipo = 0 and YEAR(data_vencimento) = YEAR(CURRENT_DATE()) and lan.conta_id = ". $conta_id)->result();
        
        $vObj = [];
        
        $vObj[0][] = 'Custo';
        $vObj[0][] = $resultCusto[0]->valor;
        
        $vObj[1][] = 'Lucro';
        $vObj[1][] = $resultLucro[0]->valor;
        
        $vObj['vLista'] = $vObj;
        //print_r($vObj);exit;
        //$vObj['lucro'] = $resultLucro[0]->valor;
        return $vObj;
        
    }

    public function total_detalhado_por_ano($conta_id){
        //1 custo 0 lucro
        
        $resultCusto = $this->db->query("
        Select SUM(lan.valor) as valor, gen.nome
        from genero as gen 
        inner join lancamento as lan on lan.genero_id = gen.id
        where YEAR(data_vencimento) = YEAR(CURRENT_DATE()) and gen.conta_id = ".$conta_id."
        group by gen.nome;
        ")->result();
        
        $vObj = [];
        
        $vObj['vLista'] = $resultCusto;
        //print_r($vObj);exit;
        //$vObj['lucro'] = $resultLucro[0]->valor;
        return $vObj;
        
    }

}

?>
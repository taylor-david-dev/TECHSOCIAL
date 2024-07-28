<?php

Class lancamento_model extends CI_Model {

    function cadastrar($dados, $conta_id) {
        $dataVencimento = explode(" ", $dados['dataHora_mensalidade']);
        $data = array(
            'conta_id' => $conta_id,
            'nome' => $dados['nome'],
            'valor' => $dados['valor'],
            'data_vencimento' => implode("-", array_reverse(explode("/", $dataVencimento[0]))),
            'genero_id' => $dados['genero_id'],
        );
        
        return $this->db->insert('lancamento', $data);
      }

    function listar($conta_id) {
        $this->db->select('gen.nome as genero, lan.nome as nome, valor, gen.tipo as tipo, data_vencimento, lan.lan_status, lan.id as id');
        $this->db->join('genero as gen', 'lan.genero_id = gen.id');
        $this->db->from('lancamento as lan');
        $this->db->where('lan.conta_id', $conta_id);
        $this->db->order_by('data_vencimento', 'desc');
        $this->db->limit(60,0);
        return $this->db->get()->result();
    }
    
    function doPesquisar($dados, $conta_id) {
        $first_date = implode("-",array_reverse(explode("/",$dados['dataInicial'])));
        $second_date = implode("-",array_reverse(explode("/",$dados['DataFinal'])));
        
        $this->db->select('gen.nome as genero, lan.nome as nome, valor, gen.tipo as tipo, data_vencimento, lan.lan_status, lan.id as id ');
        $this->db->join('genero as gen', 'lan.genero_id = gen.id');
        $this->db->from('lancamento as lan');
        $this->db->where('data_vencimento >=', $first_date);
        $this->db->where('data_vencimento <=', $second_date);
        $this->db->where('lan.conta_id ', $conta_id);
        $this->db->order_by('data_vencimento', 'asc');
        $this->db->limit(60,0);
        return $this->db->get()->result();
    }

    function excluir($id, $conta_id) {
        $this->db->where('id', $id);
        $this->db->where('conta_id', $conta_id);
        return $this->db->delete('lancamento');
    }

    function alterar($id, $conta_id) {
        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->where('conta_id', $conta_id);
        $this->db->from('lancamento');
        return $this->db->get()->result();
    }

    function doAlterar($dados, $conta_id) {
        $dataVencimento = explode(" ", $dados['dataHora_mensalidade']);
        $dataLancamento = implode("-", array_reverse(explode("/", $dataVencimento[0])));
        return $this->db->query("UPDATE lancamento SET nome='$dados[nome]', valor='$dados[valor]', lan_status=$dados[lan_status], data_vencimento='$dataLancamento' WHERE id=$dados[id] and conta_id = $conta_id");
    }

    function editar($user) {
        $this->db->select('*');
        $this->db->where('id', $user['id']);
        $this->db->from('conta');
        return $this->db->get()->result();
    }

    
    function payment($id, $conta_id){
        return $this->db->query("UPDATE lancamento SET lan_status = 1 WHERE id=" . $id. " and conta_id = ".$conta_id);
    }
    
    
    function doEditar($dados, $user) {
        if ($dados['password'] != '') {
            $query = ", password='" . md5($dados['password']) . "'";
        } else {
            $query = "";
        }
        $this->db->query("UPDATE info_bancaria SET cpf='$dados[cpf]', nConta='$dados[nConta]', banco='$dados[banco]', tipoConta=$dados[tipoConta], ag='$dados[ag]' $query WHERE conta_id=" . $user['id']);
        return $this->db->query("UPDATE conta SET nome='$dados[nome]', telefone='$dados[telefone]' $query WHERE id=" . $user['id']);
    }

    function pesquisaContaAjax($dados) {

        $html = '';
        $result = $this->db->query("SELECT * FROM conta WHERE nome like '%$dados[nome]%'");

        foreach ($result->result() as $row) {
            $html .= '<tr onClick="pegaValorTRContaAjax(this)" style="cursor:pointer;">';
            $html .= '<td>' . $row->id . '</td>';
            $html .= '<td>' . $row->nome . '</td>';
            $html .= '<td>' . $row->email . '</td>';
            $html .= '<td>' . $row->telefone . '</td>';
            $html .= '</tr>';
        }

        return $html;
    }

}

?>
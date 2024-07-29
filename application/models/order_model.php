<?php

Class order_model extends CI_Model {

    function register($dados) {
        $data = array(
            'user_id' => $dados['user_id'],
            'price' => $dados['price'],
            'quantity' => $dados['quantity'],
            'description' => $dados['description'],
            'created_at' => date('Y-m-d H:i:s'),
        );
        
        return $this->db->insert('order', $data);
      }

    function listing() {
        $this->db->select('*');
        $this->db->from('order');
        $this->db->order_by('created_at', 'desc');
        return $this->db->get()->result();
    }
    /*
    function listing($conta_id) {
        $this->db->select('gen.nome as genero, lan.nome as nome, valor, gen.tipo as tipo, data_vencimento, lan.lan_status, lan.id as id');
        $this->db->join('genero as gen', 'lan.genero_id = gen.id');
        $this->db->from('lancamento as lan');
        $this->db->where('lan.conta_id', $conta_id);
        $this->db->order_by('data_vencimento', 'desc');
        $this->db->limit(60,0);
        return $this->db->get()->result();
    }
    */
    function excluir($id, $conta_id) {
        $this->db->where('id', $id);
        return $this->db->delete('order');
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
    

}

?>
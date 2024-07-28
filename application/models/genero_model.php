<?php
Class genero_model extends CI_Model
{
	
	function cadastrar($dados, $conta_id){
		$data = array(
		   'cod' => $dados['cod'],
		   'tipo' => $dados['tipo'],
		   'conta_id' => $conta_id,
		   'nome' => $dados['nome']); 

		return $this->db->insert('genero', $data);
	}

	function listar($conta_id){
		$this->db->select('*');
		$this->db->from('genero');
                $this->db->where('conta_id', $conta_id);
		return $this->db->get()->result();
	}
	
	function excluir($id, $conta_id){
		$this->db->where('id', $id);
                $this->db->where('conta_id', $conta_id);
		return $this->db->delete('genero');
	}
	
	function alterar($id, $conta_id){
		$this->db->select('*');
		$this->db->where('id', $id);
                $this->db->where('conta_id', $conta_id);
		$this->db->from('genero');
		return $this->db->get()->result();
	}
	
	function doAlterar($dados, $conta_id){
		return $this->db->query("UPDATE genero SET cod='$dados[cod]', nome='$dados[nome]', tipo='$dados[tipo]' WHERE id=$dados[id] and conta_id = $conta_id");
	}
	
	function pesquisaGeneroAjax($dados, $conta_id){
		$html = '';
		$result = $this->db->query("SELECT * FROM genero WHERE nome like '%$dados[cod]%' and conta_id = $conta_id");
		foreach ($result->result() as $row){
                        if($row->tipo){
                            $tipo = 'Custo';
                        }else{
                            $tipo = 'Lucro';
                        }
                    
			$html .= '<tr onClick="pegaValorTRGeneroAjax(this)" style="cursor:pointer;">';
			$html .= '<td>'.$row->id.'</td>';
			$html .= '<td>'.$row->cod.'</td>';
			$html .= '<td>'.$row->nome.'</td>';
			$html .= '<td>'.$tipo.'</td>';
			$html .= '</tr>';
		}
		
		return $html;
		
	}
        
	function pesquisaGeneroAjax2($dados, $conta_id){
		$html = '';
		$result = $this->db->query("SELECT * FROM genero WHERE nome like '%".$dados['cod']."%' and conta_id = $conta_id");
		foreach ($result->result() as $row){
                    if($row->tipo){
                            $tipo = 'Custo';
                        }else{
                            $tipo = 'Lucro';
                        }
			$html .= '<tr onClick="pegaValorTRGeneroAjax2(this)" style="cursor:pointer;">';
			$html .= '<td>'.$row->id.'</td>';
			$html .= '<td>'.$row->cod.'</td>';
			$html .= '<td>'.$row->nome.'</td>';
                        $html .= '<td>'.$tipo.'</td>';
			$html .= '</tr>';
		}
		
		return $html;
		
	}
	
}
?>
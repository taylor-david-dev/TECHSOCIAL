<?php

Class user_model extends CI_Model {

    function login($username, $password) {
        $this->db->select('id, email, password, name');
        $this->db->from('user');
        $this->db->where('email', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function alter($account_id) {
        $this->db->select('*');
        $this->db->where('id', $account_id);
        $this->db->limit(1);
        $this->db->from('user');
        return $this->db->get()->result()[0];
    }

    function doAlter($dados) {
        $this->db->set('first_name', $dados['first_name']);
        $this->db->set('last_name', $dados['last_name']);
        $this->db->set('document', $dados['document']);
        $this->db->set('phone_number', $dados['phone_number']);
        $this->db->set('birth_date', $dados['birth_date']);
        $this->db->set('updated_at', date('Y-m-d H:i:s'));

        if ($dados['password'] != '') {
            $this->db->set('password', md5($dados['password']));
        }

        $this->db->where('id', (int) $dados['id']);
        return $this->db->update('user');
    }

    function doRegister($dados, $conta_id) {
        $data = array(
            'first_name' => $dados['first_name'],
            'last_name' => $dados['last_name'],
            'document' => $dados['document'],
            'email' => $dados['email'],
            'phone_number' => $dados['phone_number'],
            'birth_date' => $dados['birth_date'],
            'password' => md5($dados['password']),
            'created_at' => date('Y-m-d H:i:s'),
        );
        
        return $this->db->insert('user', $data);
    }

    function listing() {
        $this->db->select('id, first_name, last_name, document, email, phone_number, birth_date, created_at, updated_at');
        $this->db->from('user');
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('user');
    }
    
    
    function doPesquisaAjax($dados){
            $html = '';
            $result = $this->db->query("SELECT * FROM user WHERE first_name like '%$dados[name]%'");
            foreach ($result->result() as $row){
                    $html .= '<tr onClick="pegaValorTRUserAjax(this)" style="cursor:pointer;">';
                    $html .= '<td>'.$row->id.'</td>';
                    $html .= '<td>'.$row->first_name.'</td>';
                    $html .= '<td>'.$row->last_name.'</td>';
                    $html .= '</tr>';
            }

            return $html;
    }

}

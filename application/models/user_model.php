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

    function doAlter($dados, $conta_id) {
        $this->db->set('first_name', $dados[first_name]);
        $this->db->set('last_name', $dados[name]);
        $this->db->set('document', $dados[name]);
        $this->db->set('email', $dados[name]);
        $this->db->set('phone_number', $dados[name]);
        $this->db->set('birth_date', $dados[name]);
        $this->db->set('updated_at', date('Y-m-d '));
        
        if ($dados['password'] != '') {
            $this->db->set('password', md5($dados['password']));
        } 
        
        $this->db->where('id', $conta_id);
        return $this->db->update('user');
    }

}

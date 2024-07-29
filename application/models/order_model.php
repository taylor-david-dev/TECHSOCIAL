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

    function doAlter($dados) {
        $this->db->set('user_id', $dados['user_id']);
        $this->db->set('price', $dados['price']);
        $this->db->set('quantity', $dados['quantity']);
        $this->db->set('description', $dados['description']);
        $this->db->set('updated_at', date('Y-m-d H:i:s'));

        $this->db->where('id', (int) $dados['id']);
        return $this->db->update('order');
    }

    function listing() {
        $this->db->select('order.id as id, order.description as description, order.quantity as quantity, order.price as price, order.created_at, order.updated_at as updated_at, user.first_name, user.last_name');
        $this->db->join('user', 'user.id = order.user_id');
        $this->db->from('order');
        return $this->db->get()->result();
    }

    function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('order');
    }

    function alter($id) {
        $this->db->select('order.id as id, order.description as description, order.quantity as quantity, order.price as price, order.created_at, order.updated_at as updated_at, order.user_id, user.first_name, user.last_name');
        $this->db->join('user', 'user.id = order.user_id');
        $this->db->where('order.id', $id);
        $this->db->from('order');
        return $this->db->get()->result()[0];
    }

}

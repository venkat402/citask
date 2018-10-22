<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Dsbd_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function form_insert($data) {
        $this->db->insert('tasks', $data);
        return true;
    }

    public function get_data($get_email) {
        $result = $this
                ->db
                ->select('*')
                ->where('email', $get_email)
                ->limit(1)
                ->get('register')
                ->row();
        if (!empty($result)) {
            return $result;
        }
    }

    public function get_all_tasks($id) {
        $result = $this->db->get_where('tasks', array('reference' => $id));
        return $result;
    }

    public function task_dl($id) {
        $this->db->delete('tasks', array('id' => $id));
    }

    public function task_ed($id) {
        $result = $this
                ->db
                ->select('*')
                ->where('id', $id)
                ->limit(1)
                ->get('tasks')
                ->row();
        if (!empty($result)) {
            return $result;
        }
    }

    public function ed_save($data) {
        $data = (array)$data;
        $this->db->where('id', $data['id']);
        $this->db->update('tasks', $data);
        return true;
    }

}
 
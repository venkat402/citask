<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Rgstr_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function form_insert($data) {
        $this->db->insert('register', $data);
    }

    public function check_email_exist($data) {
        $result = $this
                ->db
                ->select('email')
                ->where('email', $data['email'])
                ->limit(1)
                ->get('register')
                ->row();
        if (empty($result)) {
            return true;
        } else {
            return false;
        }
    }

}

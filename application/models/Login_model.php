<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login_model extends CI_Model {

    public $title;
    public $content;
    public $date;

    function __construct() {
        parent::__construct();
    }

    public function get_last_ten_entries() {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    public function insert_entry($data) {
        $this->db->insert('register', $data);
    }

    public function update_entry() {
        $this->title = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

    function form_insert($data) {
// Inserting in Table(students) of Database(college)
        $this->db->insert('students', $data);
    }

    function check_entry($data) {
        $result = $this
                ->db
                ->select('*')
                ->where('email', $data['email'])
                ->limit(1)
                ->get('register')
                ->row();
        if ($result->password == $data['password']) {
            if (!empty($result)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}

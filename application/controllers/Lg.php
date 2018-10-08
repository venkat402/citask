<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lg extends CI_Controller {

    public function __construct() {
        // $this->load does not exist until after you call this
        parent::__construct(); // Construct CI's core so that you can use it

        $this->load->model('Login_model');
        $this->load->library('session');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        if ($this->session->userdata('user')) {
            redirect('dsbd');
        }
        $this->load->view('login_view');
    }

    public function lg_check() {
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if (!$this->form_validation->run() == FALSE) {
            $data = array(
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
            );
            $result = $this->Login_model->check_entry($data);
            if ($result == TRUE) {
                $this->session->set_userdata("user", $data);
                redirect('dsbd');
            } else {
                redirect('lg');
            }
        } else {
            $this->load->view('login_view');
        }
    }

}

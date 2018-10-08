<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dsbd extends CI_Controller {

    public function __construct() {
        // $this->load does not exist until after you call this
        parent::__construct(); // Construct CI's core so that you can use it
        $this->load->model('Dsbd_model');
        $this->check_isvalidated();
    }

    private function check_isvalidated() {
        if (!$this->session->userdata('user')) {
            redirect('lg');
        }
    }

    public function index() {
        $get_email = $this->session->userdata['user']['email'];
        $get_data = $this->Dsbd_model->get_data($get_email);
        $get_all_tasks = $this->Dsbd_model->get_all_tasks($get_data->id);
        $data = array(
            'get_email' => $get_email,
            'details' => $get_data,
            'get_all_tasks' => $get_all_tasks,
        );

        $this->load->view('dashboard/dashboard_view', $data);
    }

    public function task() {
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->form_validation->set_rules('tname', 'name', 'trim|required');
        $this->form_validation->set_rules('desc', 'desc', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('dsbd');
        } else {
            $data = array(
                'name' => $this->input->post('tname'),
                'description' => $this->input->post('desc'),
                'reference' => $this->reference(),
                'date_of_added' => date('Y-m-d'),
            );
            $result = $this->Dsbd_model->form_insert($data);
            if ($result == TRUE) {
                redirect('dsbd');
            }
        }
    }

    public function reference() {
        $get_email = $this->session->userdata['user']['email'];
        $get_data = $this->Dsbd_model->get_data($get_email);
        return $get_data->id;
    }

    public function dl($id) {
        $result = $this->Dsbd_model->task_dl($id);
        redirect('dsbd');
    }

    public function ed($id) {

        $result = $this->Dsbd_model->task_ed($id);
        $data = array(
            'data' => $result,
        );
        $this->load->view('dashboard/task_edit', $data);
    }

    public function ed_save($id) {
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->form_validation->set_rules('tname', 'name', 'trim|required');
        $this->form_validation->set_rules('desc', 'desc', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            redirect('dsbd');
        } else {
            $data = array(
                'id' => $id,
                'name' => $this->input->post('tname'),
                'description' => $this->input->post('desc'),
                'reference' => $this->reference(),
                'date_of_added' => date('Y-m-d'),
            );
            $result = $this->Dsbd_model->ed_save($data);
            if ($result == TRUE) {
                redirect('dsbd');
            }
        }
    }

    public function lo() {
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
        redirect('hm');
    }

}

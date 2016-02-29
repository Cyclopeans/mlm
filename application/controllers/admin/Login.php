<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    private $data = array();

    function __construct() {
        parent::__construct();
        if ($this->session->userdata('admin_logged_in')) {
            redirect("admin/dashboard");
        }
        $this->load->model('admin_model');
        $this->layout->set_layout("admin/layout/layout_manager");
    }

    function index() {
        $this->data['title'] = 'Admin login';
        $this->data['layout_section'] = 'login'; //use for identify login layout
        $this->form_validation->set_error_delimiters('<div class="server_error">', '</div>');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if (!($this->form_validation->run() == FALSE)) { //form validated
            
            $query_data = array('username' => $this->input->post('username'), 'password' => $this->input->post('password'));
            $admin_details = $this->admin_model->authenticate_admin($query_data);
            
            if (count($admin_details) > 0) { //details validated
                //start new session
                $admin_session_data = array('id' => $admin_details[0]["id"], 'first_name' => $admin_details[0]["first_name"], 'last_name' => $admin_details[0]["last_name"], 'admin_logged_in' => TRUE);
                $this->session->set_userdata($admin_session_data); //set admin session
                redirect("admin/dashboard");
            } else { //details not validated
                $this->data['common_error'] = 'Your username or password is wrong!';
            }
        }
        $this->layout->view('admin/login/login', $this->data);
    }

}
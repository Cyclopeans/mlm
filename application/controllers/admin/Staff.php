<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

    function __construct() {
        parent::__construct();
        authenticate(); //check admin login or not
        $this->layout->set_layout('admin/layout/layout_manager'); //set layout
        $this->load->model('admin_model');
    }

    public function index() {
        $this->data['title'] = 'Staff Listing';
        $this->layout->view('admin/staff/index', $this->data);
    }

    //  logout staff user and rediredt it to the login page
    public function logout() { 
        $this->session->sess_destroy(); // delete all session
        redirect("admin/login");
    }

}

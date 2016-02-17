<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


    function __construct() {
        parent::__construct();
        authenticate(); //check admin login or not
        $this->layout->set_layout('admin/layout/layout_manager'); //set layout
        $this->load->model('admin_model');
        $this->data['page_name']='dashboard';
    }

    public function index() {
        $this->data['title'] = 'Admin Dashboard';
        $this->layout->view('admin/dashboard/dashboard',$this->data);
    }

}

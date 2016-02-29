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
        $this->load->library('pagination');
        $this->data['title'] = 'Staff Listing';

        $total_records = $this->admin_model->get_admin_data(array('count' => TRUE));
        $pagination_data = array('base_url' => ADMIN_SITE_URL . 'staff/index', 'total_rows' => $total_records, 'per_page' => 10, 'uri_segment' => 4);
        $pagination_config = geneate_pagination($pagination_data);

        $this->pagination->initialize($pagination_config);
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $query_data = array('limit' => 10, 'offset' => $this->data['page']);
        $this->data['staff_data'] = $this->admin_model->get_admin_data($query_data);
        $this->data['pagination'] = $this->pagination->create_links();
        $this->layout->view('admin/staff/index', $this->data);
    }

    public function delete($id) {
        if ($id != '') {
            $upd_data = array('status' => 'deleted', 'id' => $id);
            $this->admin_model->update_admin($upd_data);
        }
        redirect('admin/staff');
    }

    public function add() {
        $this->data['title'] = 'Add Staff';
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'last name', 'trim|required');
        $this->form_validation->set_rules('primary_email', 'primary_email', 'trim|required');
        $this->form_validation->set_rules('secondary_email', 'secondary_email', 'trim');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_rules('role', 'role', 'trim|required');
        if (!($this->form_validation->run() == FALSE)) { //form validated            
            $insert_data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'primary_email' => $this->input->post('primary_email'),
                'secondary_email' => $this->input->post('secondary_email'),
                'status' => $this->input->post('status'),
                'role' => $this->input->post('role'),
                'phone' => $this->input->post('phone'),
            );


            $insert_status = $this->admin_model->insert_admin($insert_data);
            if ($insert_status > 0) { //record inserted            
                $this->session->set_flashdata('success_message', 'Staff member inserted successfully!');
                redirect('admin/staff');
            } else { //record not updated
                $this->data['common_error'] = 'Nothing is updated. Please try again!';
            }
        }
        $this->data['role_listing'] = array('admin' => 'Admin', 'staff' => 'Staff');
        $this->data['status_listing'] = array('pending' => 'pending', 'active' => 'active', 'inactive' => 'inactive', 'deleted' => 'deleted');
        $this->layout->view('admin/staff/add', $this->data);
    }

    function edit($id) {
        $this->data['title'] = 'Edit Staff';
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('first_name', 'first_name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'last_name', 'trim|required');
        $this->form_validation->set_rules('primary_email', 'primary_email', 'trim|required');
//        $this->form_validation->set_rules('secondary_email', 'secondary_email', 'trim|email');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');
        $this->form_validation->set_rules('role', 'role', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        if (!($this->form_validation->run() == FALSE)) { //form validated            
            $upd_data = array(
                'username' => $this->input->post('username'),
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'primary_email' => $this->input->post('primary_email'),
                'secondary_email' => $this->input->post('secondary_email'),
                'phone' => $this->input->post('phone'),
                'role' => $this->input->post('role'),
                'status' => $this->input->post('status'),
                'id' => $this->input->post('id'),
            );

            $update_status = $this->admin_model->update_admin($upd_data);
            if ($update_status > 0) { //record updated            
                $this->session->set_flashdata('success_message', 'Staff information updated successfully!');
                redirect('admin/staff');
            } else { //record not updated
                $this->data['common_error'] = 'Nothing is updated. Please try again!';
            }
        }

        $query_data = array('id' => $id);
        $staff_result = $this->admin_model->get_admin_details($query_data);
        if (count($staff_result) > 0) {
            $this->data['staff_data'] = $staff_result[0];
        } else { //data not present in database table.
            redirect('admin/staff');
        }
        $this->data['role_listing'] = array('admin' => 'Admin', 'staff' => 'Staff');
        $this->data['status_listing'] = array('pending' => 'pending', 'active' => 'active', 'inactive' => 'inactive', 'deleted' => 'deleted');
        $this->layout->view('admin/staff/edit', $this->data);
    }

    //  logout staff user and rediredt it to the login page
    public function logout() {
        $this->session->sess_destroy(); // delete all session
        redirect("admin/login");
    }

}

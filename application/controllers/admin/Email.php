<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Email extends CI_Controller {

    private $data = array();

    function __construct() {
        parent::__construct();
        authenticate(); //check admin login or not
        $this->load->model('email_model');
        $this->layout->set_layout("admin/layout/layout_manager");
    }

    function index() {
        $this->load->library('pagination');
        $this->data['title'] = 'Email Template Listing';       

        $total_records = $this->email_model->get_template(array('count' => TRUE));
        $pagination_data = array('base_url' => ADMIN_SITE_URL . 'email/index', 'total_rows' => $total_records, 'per_page' => 10, 'uri_segment' => 4);
        $pagination_config = geneate_pagination($pagination_data);

        $this->pagination->initialize($pagination_config);
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $query_data = array('limit' => 10, 'offset' => $this->data['page']);
        $this->data['template_data'] = $this->email_model->get_template($query_data);
        $this->data['pagination'] = $this->pagination->create_links();
        $this->layout->view('admin/email/index', $this->data);
    }

    function edit($id) {
        $this->data['title']='Edit Email Template';
        $this->form_validation->set_rules('template_name', 'template name', 'trim|required');
        $this->form_validation->set_rules('email_subject', 'email subject', 'trim|required');
        $this->form_validation->set_rules('sender_email_id', 'sender email id', 'trim|required');
        $this->form_validation->set_rules('email_content', 'email content', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        if (!($this->form_validation->run() == FALSE)) { //form validated            
            $upd_data = array(
                'template_name' => $this->input->post('template_name'),
                'email_subject' => $this->input->post('email_subject'),
                'sender_email_id' => $this->input->post('sender_email_id'),
                'email_content' => $this->input->post('email_content'),
                'status' => $this->input->post('status'),
                'modified_date' => date('Y-m-d H:i:s'),
                'id' => $this->input->post('id'),
            );
            $update_status = $this->email_model->update_template($upd_data);
            if ($update_status > 0) { //record updated            
                $this->session->set_flashdata('success_message', 'Email template information updated successfully!');
                redirect('admin/email');
            } else { //record not updated
                $this->data['common_error'] = 'Nothing is updated. Please try again!';
            }
        }
        
        $query_data = array('id' => $id);
        $email_template_result = $this->email_model->get_template($query_data);
        if(count($email_template_result)>0){
        $this->data['template_data'] = $email_template_result[0];
        }else{ //data not present in database table.
            redirect('admin/email');
        }
        $this->data['status_listing'] = array('active' => 'active', 'inactive' => 'inactive', 'deleted' => 'deleted');
        $this->layout->view('admin/email/edit', $this->data);
    }

    public function delete($id) {
        if ($id != '') {
            $upd_data = array('status' => 'deleted', 'id' => $id);
            $this->email_model->update_template($upd_data);
        }
        redirect('admin/email');
    }
    
    public function sendemail(){
        $this->data['title']='Edit Email Template';
        $this->layout->view('admin/email/sendemail', $this->data);
    }

}
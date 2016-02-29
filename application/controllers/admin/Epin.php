<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Epin extends CI_Controller {

    private $data = array();

    function __construct() {
        parent::__construct();
        authenticate(); //check admin login or not
        $this->load->model('epin_model');
        $this->load->model('product_model');
        $this->layout->set_layout("admin/layout/layout_manager");
    }

    function index() {
        $this->load->library('pagination');
        $this->data['title'] = 'Epin Listing';

        $total_records = $this->epin_model->get_epin_details(array('count' => TRUE));
        $pagination_data = array('base_url' => ADMIN_SITE_URL . 'epin/index', 'total_rows' => $total_records, 'per_page' => 10, 'uri_segment' => 4);
        $pagination_config = geneate_pagination($pagination_data);

        $this->pagination->initialize($pagination_config);
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $query_data = array('limit' => 10, 'offset' => $this->data['page']);
        $this->data['epin_data'] = $this->epin_model->get_epin_details($query_data);
//        echo "<pre>";print_r($this->data['epin_data'] );exit;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->layout->view('admin/epin/index', $this->data);
    }

    function edit($id) {
        $this->data['title'] = 'Edit Epins';
        $this->form_validation->set_rules('epin_sr_no', 'epin_sr_no', 'trim|required');
        $this->form_validation->set_rules('epin_code', 'epin_code', 'trim|required');
        $this->form_validation->set_rules('sponser_affiliate_id', 'sponser_affiliate_id', 'trim|required');
        $this->form_validation->set_rules('product_id', 'product_id', 'trim|required');
        if (!($this->form_validation->run() == FALSE)) { //form validated            
            $upd_data = array(
                'epin_sr_no' => $this->input->post('epin_sr_no'),
                'epin_code' => $this->input->post('epin_code'),
                'sponser_affiliate_id' => $this->input->post('sponser_affiliate_id'),
                'product_id' => $this->input->post('product_id'),
            );
            $product_presence = $this->epin_model->get_epin(array('name' => $upd_data['name'], 'count' => TRUE, 'other_than_id' => $upd_data['id']));
            $update_status = $this->epin_model->update_epin($upd_data);
            if ($update_status > 0) { //record updated            
                $this->session->set_flashdata('success_message', 'Product information updated successfully!');
                redirect('admin/product');
            } else { //record not updated
                $this->data['common_error'] = 'Nothing is updated. Please try again!';
            }
        }

        $query_data = array('epin_id' => $id);
        $epin_result = $this->epin_model->get_epin_details($query_data);
        if (count($epin_result) > 0) {
            $this->data['epin_data'] = $epin_result[0];//not_used', 'used', 'cancelled', 'inactive'
            $this->data['product_data'] = $this->product_model->get_active_product();
            $this->data['status_listing'] = array('not_used' => 'not_used', 'used'=>'used','inactive' => 'inactive', 'cancelled' => 'cancelled');
        } else { //data not present in database table.
            redirect('admin/epin');
        }
        $this->layout->view('admin/epin/edit', $this->data);
    }

    public function delete($id) {
        if ($id != '') {
            $upd_data = array('status' => 'deleted', 'id' => $id);
            $this->epin_model->update_epin($upd_data);
        }
        redirect('admin/epin');
    }

    public function add() {
        $this->data['title'] = 'Add EPINS';
        $this->form_validation->set_rules('product_id', 'Product', 'trim|required');
        $this->form_validation->set_rules('number_of_code', 'number_of_code', 'trim|required|integer');
        $this->form_validation->set_rules('sponser_affiliate_id', 'sponser affiliate_id', 'trim|required');
        $this->form_validation->set_rules('transaction_password', 'transaction password', 'trim|required');
        if (!($this->form_validation->run() == FALSE)) { //form validated            
            $insert_data = array(
                'number_of_code' => $this->input->post('number_of_code'),
                'product_id' => $this->input->post('product_id'),
                'sponser_affiliate_id' => $this->input->post('sponser_affiliate_id'),
                'transaction_password' => $this->input->post('transaction_password'),
            );

            $insert_status = $this->epin_model->insert_epin($insert_data);
            if ($insert_status > 0) { //record inserted            
                $this->session->set_flashdata('success_message', 'Epin created successfully!');
                redirect('admin/epin');
            } else { //record not updated
                $this->data['common_error'] = 'Nothing is updated. Please try again!';
            }
        }
        $this->data['prodauct_data'] = $this->product_model->get_active_product();
//        echo "<pre>";print_r($this->data['prodauct_data']);exit;
        $this->layout->view('admin/epin/add', $this->data);
    }

}

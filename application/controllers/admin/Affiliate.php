<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Affiliate extends CI_Controller {

    private $data = array();

    function __construct() {
        parent::__construct();
        authenticate(); //check admin login or not
//        $this->load->model('affiliate_model');
        $this->load->model('main_affiliate_model');
        $this->layout->set_layout("admin/layout/layout_manager");
    }

    function index() {
        $this->load->library('pagination');
        $this->data['title'] = 'Affiliate Listing';

        $total_records = $this->main_affiliate_model->get_main_affiliates(array('count' => TRUE));
        $pagination_data = array('base_url' => ADMIN_SITE_URL . 'affiliate/index', 'total_rows' => $total_records, 'per_page' => 10, 'uri_segment' => 4);
        $pagination_config = geneate_pagination($pagination_data);

        $this->pagination->initialize($pagination_config);
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $query_data = array('limit' => 10, 'offset' => $this->data['page']);
        $this->data['affiliate_data'] = $this->main_affiliate_model->get_main_affiliates($query_data);
//        echo "<pre>";print_r($this->data['affiliate_data']);exit;
        $this->data['pagination'] = $this->pagination->create_links();
        $this->layout->view('admin/affiliate/index', $this->data);
    }

    function edit($id) {
        $this->data['title'] = 'Edit Affiliate';
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('amount', 'amount', 'trim|required|numeric');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        if (!($this->form_validation->run() == FALSE)) { //form validated            
            $upd_data = array(
                'name' => $this->input->post('name'),
                'amount' => $this->input->post('amount'),
                'status' => $this->input->post('status'),
                'id' => $this->input->post('id'),
            );
            $product_presence = $this->product_model->get_product(array('name' => $upd_data['name'], 'count' => TRUE,'other_than_id'=>$upd_data['id']));
            $update_status = $this->product_model->update_product($upd_data);
            if ($update_status > 0) { //record updated            
                $this->session->set_flashdata('success_message', 'Product information updated successfully!');
                redirect('admin/product');
            } else { //record not updated
                $this->data['common_error'] = 'Nothing is updated. Please try again!';
            }
        }

        $query_data = array('id' => $id);
        $product_result = $this->product_model->get_product($query_data);
        if (count($product_result) > 0) {
            $this->data['product_data'] = $product_result[0];
        } else { //data not present in database table.
            redirect('admin/product');
        }
        $this->data['status_listing'] = array('pending' => 'pending', 'active' => 'active', 'inactive' => 'inactive', 'deleted' => 'deleted');
        $this->layout->view('admin/product/edit', $this->data);
    }

    public function delete($id) {
        if ($id != '') {
            $upd_data = array('status' => 'deleted', 'id' => $id);
            $this->product_model->update_affiliate($upd_data);
        }
        redirect('admin/affiliate');
    }

    public function add() {
        $this->data['title'] = 'Add Affiliate';
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('amount', 'amount', 'trim|required|numeric');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        if (!($this->form_validation->run() == FALSE)) { //form validated            
            $insert_data = array(
                'name' => $this->input->post('name'),
                'amount' => $this->input->post('amount'),
                'status' => $this->input->post('status'),
            );
            //check product name presence
            $product_presence = $this->product_model->get_product(array('name' => $insert_data['name'], 'count' => TRUE));
            
            if ($product_presence > 0) {
                $this->data['common_error'] = 'Product is already added with this name!';
            } else {
                $insert_status = $this->product_model->insert_product($insert_data);
                if ($insert_status > 0) { //record inserted            
                    $this->session->set_flashdata('success_message', 'Product inserted successfully!');
                    redirect('admin/product');
                } else { //record not updated
                    $this->data['common_error'] = 'Nothing is updated. Please try again!';
                }
            }
        }
        $this->data['status_listing'] = array('pending' => 'pending', 'active' => 'active', 'inactive' => 'inactive', 'deleted' => 'deleted');
        $this->layout->view('admin/product/add', $this->data);
    }

}

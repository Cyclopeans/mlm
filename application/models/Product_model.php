<?php

class Product_model extends CI_Model {

    private $tbl_product = PRODUCT;

    public function __construct() {
        parent::__construct();
    }

    public function get_product($data = array()) {
        $this->db->select('*');
        $this->db->from($this->tbl_product);

        if (isset($data['id']) && $data['id'] != '') {
            $this->db->where('id', $data['id']);
        }
        if (isset($data['name']) && $data['name'] != '') {
            $this->db->where('name', $data['name']);
        }
        if (isset($data['other_than_id']) && $data['other_than_id'] != '') { //check product other id
            $this->db->where('id!=', $data['id']);
        }
        $this->db->where('status !=', 'deleted');
        if (isset($data['limit']) && $data['limit'] != '') {
            $this->db->limit($data['limit'], $data['offset']);
        }
        if (isset($data['count']) && $data['count'] != '') {
            return $this->db->get()->num_rows();
        } else {
            return $this->db->get()->result_array();
        }
    }
    
    public function get_active_product(){
        $this->db->select('*');
        $this->db->from($this->tbl_product);
        $this->db->where('status', 'active');
        $this->db->order_by('name','asc');
        return $this->db->get()->result_array();
        
    }

    public function update_product($upd_data = array()) {
        if (isset($upd_data['id']) && $upd_data['id'] > 0) {
            $upd_data['modified_date'] = date('Y-m-d H:i:s');
            $this->db->where('id', $upd_data['id']);
            $this->db->update($this->tbl_product, $upd_data);
            return $this->db->affected_rows();
        }
        return 0;
    }

    public function insert_product($ins_data = array()) {
        $ins_data['modified_date'] = $ins_data['created_date'] = date('Y-m-d H:i:s');
        $this->db->insert($this->tbl_product, $ins_data);
        return $this->db->insert_id(); // return last insert 
    }
    
}

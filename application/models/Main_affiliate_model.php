<?php

class Main_affiliate_model extends CI_Model {

    private $tbl_main_affiliate = MAIN_AFFILIATE,$tbl_affiliate=AFFILIATE;

    public function __construct() {
        parent::__construct();
    }

    public function get_main_affiliates($data = array()) {
        $this->db->select('*');
        $this->db->from($this->tbl_main_affiliate);

        if (isset($data['id']) && $data['id'] != '') {
            $this->db->where('id', $data['id']);
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

    public function get_epin_details($data = array()) {
        $this->db->select('e.*,p.id as product_id,p.name,p.amount');
        $this->db->from($this->tbl_epin.' as e');
        $this->db->join($this->tbl_product.' as p', 'e.product_id =p.id', 'left');
        if (isset($data['epin_id']) && $data['epin_id'] > 0) {
            $this->db->where('e.epin_id', $data['epin_id']);
        }
        if (isset($data['epin_sr_no']) && $data['epin_sr_no'] > 0) {
            $this->db->where('e.epin_sr_no', $data['epin_sr_no']);
        }
        if (isset($data['epin_code']) && $data['epin_code'] > 0) {
            $this->db->where('e.epin_code', $data['epin_code']);
        }
        if (isset($data['sponser_affiliate_id']) && $data['sponser_affiliate_id'] > 0) {
            $this->db->where('e.sponser_affiliate_id', $data['sponser_affiliate_id']);
        }
        if (isset($data['used_affiliate_id']) && $data['used_affiliate_id'] > 0) {
            $this->db->where('e.used_affiliate_id', $data['used_affiliate_id']);
        }
        if (isset($data['product_id']) && $data['product_id'] > 0) {
            $this->db->where('e.product_id', $data['product_id']);
        }
        if (isset($data['status']) && $data['status'] > 0) {
            $this->db->where('e.status', $data['status']);
        }
        $this->db->order_by('e.epin_id', 'desc');
        if (isset($data['count']) && $data['count'] != '') {
            return $this->db->get()->num_rows();
        } else {
            return $this->db->get()->result_array();
        }
    }

    public function update_epin($upd_data = array()) {
        if (isset($upd_data['epin_id']) && $upd_data['epin_id'] > 0) {
            //check epin_sr_no & epin code present
            $upd_data['modified_date'] = date('Y-m-d H:i:s');
            $this->db->where('epin_id', $upd_data['epin_id']);
            $this->db->update($this->tbl_epin, $upd_data);
            return $this->db->affected_rows();
        }
        return 0;
    }

//    public function

    public function insert_epin($data = array()) {
        $ins_data = array();
        $ins_data['product_id'] = $data['product_id'];
        $ins_data['sponser_affiliate_id'] = $data['sponser_affiliate_id'];
        $ins_data['transaction_password'] = $data['transaction_password'];
        $ins_data['created_date'] = $ins_data['modified_date'] = date('Y-m-d H:i:s');
        $ins_data['status'] = 'not_used';
        $ins_data['used_affiliate_id'] = '';
        for ($i = 0; $i < $data['number_of_code']; $i++) {
            $ins_data['epin_sr_no'] = $this->geneate_random_number(EPIN_SR_NO_LENGTH, 'epin_sr_no'); //generate random epin sr no
            $ins_data['epin_code'] = $this->geneate_random_number(EPIN_LENGTH, 'epin_code'); //generate epin code
            $this->db->insert($this->tbl_epin, $ins_data);
        }
        return $this->db->insert_id(); // return last insert 
    }

    public function check_presence($data = array()) {
        $this->db->select('*');
        $this->db->from($this->tbl_epin);
        foreach ($data as $key => $val) {
            if ($key == 'epin_id') {
                $this->db->where('epin_id !=', $val);
            } else {
                $this->db->where($key, $val);
            }
        }
        return $this->db->get()->num_rows();
    }

    public function geneate_random_number($length, $columnname) {
        $random_string = generate_random_string($length);
        $check_status = $this->check_presence(array($columnname => $random_string));
        if ($check_status > 0) {
            generate_random_number();
        } else {
            return $random_string;
        }
    }
    
}

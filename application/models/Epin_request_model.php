<?php

class Epin_request_model extends CI_Model {

    private $tbl_epin_request = EPIN_REQUEST, $tbl_main_affiliate_ = MAIN_AFFILIATE;

    public function __construct() {
        parent::__construct();
    }

    public function get_epin_request($data = array()) {
        $this->db->select('er.*,ma.email');
        $this->db->from($this->tbl_epin_request . ' as er');
        $this->db->join($this->tbl_main_affiliate_ . ' as ma', 'er.main_affiliate_id =ma.id', 'left');
        if (isset($data['id']) && $data['id'] > 0) {
            $this->db->where('er.id', $data['id']);
        }
        $this->db->where('er.status !=', 'deleted');
        $this->db->order_by('er.created_date', 'desc');
        if (isset($data['count']) && $data['count'] != '') {
            return $this->db->get()->num_rows();
        } else {
            return $this->db->get()->result_array();
        }
    }

    public function upd_epin_request($upd_data=array()) {
        if (isset($upd_data['id']) && $upd_data['id'] > 0) {
            //check epin_sr_no & epin code present
            $upd_data['modified_date'] = date('Y-m-d H:i:s');
            $this->db->where('id', $upd_data['id']);
            $this->db->update($this->tbl_epin_request, $upd_data);
            return $this->db->affected_rows();
        }
        return 0;
    }

}

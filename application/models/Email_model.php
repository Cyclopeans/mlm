<?php

class Email_model extends CI_Model {
    private $tablename = EMAIL_TEMPLATE;
    public function __construct() {
        parent::__construct();
    }

    public function get_template($data = array()) {
        $this->db->select('*');
        $this->db->from($this->tablename);
        if (isset($data['template_key']) && $data['template_key'] != '') {
            $this->db->where('template_key', $data['template_key']);
        }
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

    public function update_template($upd_data = array()) {
        if (isset($upd_data['id']) && $upd_data['id'] > 0) {
            $upd_data['modified_date']=date('Y-m-d H:i:s');
            $this->db->where('id', $upd_data['id']);
            $this->db->update($this->tablename, $upd_data);
            return $this->db->affected_rows();
        }
        return 0;
    }

}

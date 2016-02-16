<?php

class Admin_model extends CI_Model {

    private $tablename = ADMIN;

    public function __construct() {
        parent::__construct();
    }

    public function authenticate_admin($data = array()) {
        $this->db->select('*');
        $this->db->from($this->tablename);
        $this->db->where('username', $data['username']);
        $this->db->where('password', md5($data['password']));
        $this->db->where('status', 'active');
        return $this->db->get()->result_array();
    }

    public function get_admin_details($data = array()) {
        $this->db->select('*');
        $this->db->from($this->tablename);
        if (isset($data['admin_id']) && $data['admin_id'] != '') {
            $this->db->where('admin.id', $data['admin_id']);
        }
        return $this->db->get()->result_array();
    }

    public function update_admin($upd_data = array()) {
        if (isset($upd_data['admin_id']) && $upd_data['admin_id'] > 0) {
            $this->db->where('admin_id', $upd_data['id']);
            $this->db->update($this->tablename, $upd_data);
            return $this->db->affected_rows();
        }
        return 0;
    }
    
    public function insert_admin($ins_data = array()) {
        $this->db->insert($this->tablename, $ins_data);
        return $this->db->insert_id(); // return last insert 
    }

}

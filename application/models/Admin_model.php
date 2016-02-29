<?php

class Admin_model extends CI_Model {

    private $tbl_admin = ADMIN;

    public function __construct() {
        parent::__construct();
    }

    public function authenticate_admin($data = array()) {
        $this->db->select('*');
        $this->db->from($this->tbl_admin);
        $this->db->where('username', $data['username']);
        $this->db->where('password', md5($data['password']));
        $this->db->where('status', 'active');
        return $this->db->get()->result_array();
    }

    public function get_admin_details($data = array()) {
        $this->db->select('*');
        $this->db->from($this->tbl_admin);
        if (isset($data['id']) && $data['id'] != '') {
            $this->db->where('id', $data['id']);
        }

        return $this->db->get()->result_array();
    }

    public function update_admin($upd_data = array()) {
        if (isset($upd_data['id']) && $upd_data['id'] > 0) {
            $upd_data['modified_date']=date('Y-m-d H:i:s');
            $this->db->where('id', $upd_data['id']);
            $this->db->update($this->tbl_admin, $upd_data);
            return $this->db->affected_rows();
        }
        return 0;
    }

    public function insert_admin($ins_data = array()) {
        $ins_data['modified_date']=$ins_data['created_date']=date('Y-m-d H:i:s');
        $this->db->insert($this->tbl_admin, $ins_data);
        return $this->db->insert_id(); // return last insert 
    }

    public function get_admin_data($data = array()) {
        $this->db->select('*');
        $this->db->from($this->tbl_admin);

        if (isset($data['admin_id']) && $data['admin_id'] != '') {
            $this->db->where('admin_id', $data['admin_id']);
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

}

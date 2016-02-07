<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Name:  Login Model
 *
 * Author:  Jay Suryawanshi
 *       For codaemonsoftwares.com
 *       In project RedLemon
 *
 *
 * Created:  08.05.2014
 *
 * Description:  For admin Login
 * Rules operations such as insert, update, delete 
 *
 */
class Login_model extends CI_model {

    public function __construct() {
        parent::__construct();
    }


    //Function for admin Login
    function get_user($username, $password)
     {
       $this -> db -> select('id, username, password');
       $this -> db -> from('admin_users');
       $this -> db -> where('username', $username);
       $this -> db -> where('password', MD5($password));
       $this -> db -> limit(1);

       $query = $this -> db -> get();

       if($query -> num_rows() == 1)
       {
         return $query->result();
       }
       else
       {
         return false;
       }
     }

}

/* End of file Login.php */
/* Location: ./application/models/admin/Login.php */
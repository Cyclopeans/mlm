<?php

/**
 * Name:  Common Helper
 *
 * Author:  Jay Suryawanshi
 *       	For 
 *       	In project 
 *
 *
 * Created:  02.02.2015
 *
 * Description:  For admin Login
 * Rules operations such as insert, update, delete 
 *
 */

// Function to authenticate users
function authenticate(){
  $object = & get_instance();
	if(!isset($object->session->userdata['admin']['logged_in']))
   {
      redirect('admin/login', 'refresh');
   }     
} 

?>
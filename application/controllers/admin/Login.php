<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 function __construct() {
        parent::__construct();    
        $this->load->model("login/login_model");   
       
    }

	public function index()
	{
      //get the posted values
      $username = $this->input->post("user_name");
      $password = $this->input->post("password");

       //If POST 
        if (!empty($this->input->post())) 
       	{           		
            //check if username and password is correct
            $usr_result = $this->login_model->get_user($username, $password);
          
            if ($usr_result > 0) //active user record is present
            {
                 //set the session variables
                 $sessiondata = array(
                      'admin_name' => $username,
                      'logged_in' => TRUE
                 );
                 $this->session->set_userdata("admin",$sessiondata);
                 redirect("admin/dashboard");
            }
            else
            {
                 $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Invalid username or password!</div>');
                 redirect('admin/login');                 
            }
       }
       else
       {
            $this->load->view('admin/login/login');
       }	
		
	}

  //Function for logout
  function logout()
   {
     $this->session->unset_userdata('admin');
     session_destroy();
     redirect('admin/login', 'refresh');
   }
}

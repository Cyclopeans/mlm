<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller {

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
		$this->layout->set_layout('layout/main_layout');           }

    //Function to show contact us page
	public function contact_us()
	{		
		$this->layout->view('frontend/cms/contact_us');
	}

	//Function to show about us page
	public function about_us()
	{		
		$this->layout->view('frontend/cms/about_us');
	}

	//Function to show company profile page
	public function company_profile()
	{		
		$this->layout->view('frontend/cms/company_profile');
	}

	//Function to show business plan page
	public function business_plan()
	{		
		$this->layout->view('frontend/cms/business_plan');
	}

	
}

<?php

// defined('BASEPATH') OR exit('No direct script access allowed');

class Designations extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();


    	/* Checking Condition if not logged in  */
		if (!$this->session->userdata('logged_in')) {
			# code...
			redirect(base_url('Auth/Login'));
		} 
	}


/*   Load Designation view */
	public function index($value='')
	{
		

		 $this->data['page_title'] = 'Designations';
		$this->render_template('designations/index', $this->data);

	}

}


?>
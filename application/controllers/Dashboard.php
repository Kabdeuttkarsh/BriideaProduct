<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller 
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


	/*  After Condition if logged in then view dashboard view */
	public function index($value='')
	{
		$this->data['page_title'] = 'Dashboard';
		$this->render_template('dashboard', $this->data);
		// code...
		
	}

}

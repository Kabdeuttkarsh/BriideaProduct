<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Admin_Controller 
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

    /* Load Users List View */

	public function index($value='')
	{
		$this->data['page_title'] = 'Users';

		$this->render_template('users/index', $this->data);
		// code...
		
	}

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ChatGroups extends Admin_Controller 
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
		$this->data['page_title'] = 'Chat Groups';

		$this->render_template('chatGroups/index', $this->data);
		// code...
		
	}

	public function newWindow($value='')
	{
		// code...

		$this->data['page_title'] = 'Chat Window';

		$this->render_template('chatGroups/newWindow', $this->data);
		// code...

	}


	public function newWindowGroup($value='')
	{
		// code...

		$this->data['page_title'] = 'Group Chat Window';

		$this->render_template('chatGroups/newWindowGroup', $this->data);
		// code...

	}

}

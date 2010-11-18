<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	
	function index()
	{
    		$this->session->sess_destroy();
		$this->load->view('welcome_message');
	}

	function logout()
	{
		redirect('/welcome');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
    		$this->session->sess_destroy();
		$this->load->view('welcome_message');
	}

	function logout()
	{
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		redirect('/welcome');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

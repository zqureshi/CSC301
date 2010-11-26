<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	

    /* Disable browser caching */
    $this->headers->disable_caching();
	}
	
	function index()
	{
    $this->session->sess_destroy();
		$this->load->view('welcome_message');
	}

	function logout()
	{
		redirect(index_page());
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

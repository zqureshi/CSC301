<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	

    /* Load the required helpers */
    $this->load->helper('form');
    $this->load->helper('url');
	}
	
	function index()
	{
		$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	

		$this->output->set_header("Expires: Mon, 20 Dec 1998 01:00:00 GMT");	
		$this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");	
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");	
		$this->output->set_header("Pragma: no-cache");	
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

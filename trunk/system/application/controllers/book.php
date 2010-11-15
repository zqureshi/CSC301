<?php

class Book extends Controller {

	function Book()
	{
		parent::Controller();	
	}

	function index()
	{
		$this->load->view('book');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

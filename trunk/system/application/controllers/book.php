<?php

class Book extends Controller {

	function Book()
	{
		parent::Controller();	
	}

	function index()
	{
		$this->load->view('book');
		$this->load->view('side_frame');
		$this->load->view('top_frame');
		$this->load->view('bookroom');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */

<?php

class Book extends Controller {

	function Book()
	{
		parent::Controller();	
	}

	function index()
	{
		/* Check if session is valid first */
		if($this->session->userdata('id') == FALSE)
		{
			redirect('/welcome');
		}
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");

		$this->load->view('book');
		$this->load->view('side_frame');
		$this->load->view('top_frame');
		$this->load->view('bookroom');
	}
}

/* End of file book.php */
/* Location: ./system/application/controllers/book.php */

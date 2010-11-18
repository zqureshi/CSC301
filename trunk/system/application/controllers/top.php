<?php

class Top extends Controller {

	function Top()
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
		$this->load->view('top_frame');
	}
}

/* End of file top.php */
/* Location: ./system/application/controllers/top.php */

?>

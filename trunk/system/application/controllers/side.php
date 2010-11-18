<?php

class Side extends Controller {

	function Side()
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
		$this->load->view('side_frame');
	}
}

/* End of file side.php */
/* Location: ./system/application/controllers/side.php */

?>

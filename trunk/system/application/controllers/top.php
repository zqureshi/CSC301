<?php

class Top extends Controller {

	function Top()
	{
		parent::Controller();	
	}

	function index()
	{
		$this->load->view('top_frame');
	}
}

/* End of file top.php */
/* Location: ./system/application/controllers/top.php */

?>

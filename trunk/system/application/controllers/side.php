<?php

class Side extends Controller {

	function Side()
	{
		parent::Controller();	
	}

	function index()
	{
		$this->load->view('side_frame');
	}
}

/* End of file side.php */
/* Location: ./system/application/controllers/side.php */

?>

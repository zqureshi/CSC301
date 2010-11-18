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
			redirect('/welcome','target="_top"');
		}

                $this->load->model('booking_user');
                $uid = $this->session->userdata('id');
                $data['id'] = $this->booking_user->get_user('id', $uid);
		$this->load->view('top_frame', $data);
	}
}

/* End of file top.php */
/* Location: ./system/application/controllers/top.php */

?>

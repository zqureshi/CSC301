<?php

class Book extends Controller {

	function Book()
	{
		parent::Controller();
		/* Check if session is valid first */
		if($this->session->userdata('id') == FALSE)
		{
			redirect(index_page());
		}

    $this->headers->disable_caching();
	}

	function side()
	{
		$this->load->model('side_model');

		$data['query'] = $this->side_model->current_booking();
		$this->load->view('side_frame', $data);
	}

	function top()
	{
		$this->load->model('booking_user');
    $uid = $this->session->userdata('id');
    $data['id'] = $this->booking_user->get_username($uid);
    $data['is_admin'] = $this->booking_user->is_admin($uid);
		$this->load->view('top_frame', $data);
	}

	function index()
	{
		$this->load->view('book');
		$this->load->view('bookroom');
	}
}

/* End of file book.php */
/* Location: ./system/application/controllers/book.php */


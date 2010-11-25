<?php

class Users extends Controller{

  function Users()
  {
    parent::Controller();

		/* Check if session is valid first */
		if($this->session->userdata('id') == FALSE)
		{
			redirect(index_page());
		}
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");

    /* load required models */
    $this->load->model('Booking_user');
  }

  function list_users()
  {
    $data['query'] = $this->Booking_user->get_users();
    $this->load->helper('html');

    $this->load->view('list_users', $data);
  }

  function add_user_form()
  {
    $this->load->view('add_user_form');
  }

  function add_user()
  {
    $this->Booking_user->add_user();
    $data['success'] = TRUE;
    $this->load->view('add_user_form', $data);
  }

  function test_user_added()
  {
    $data['success'] = TRUE;
    $this->load->view('add_user_form', $data);
  }

  function del_user($id)
  {
    $this->Booking_user->del_user($id);

    redirect('/users/list_users');
  }

  function index()
  {
    $this->load->view('users');
  }

}

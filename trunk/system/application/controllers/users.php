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

    $this->headers->disable_caching();

    /* load required models */
    $this->load->model('Booking_user');

    /* Check if user accessing is an administrator */
    if($this->Booking_user->is_admin($this->session->userdata('id')) == FALSE)
    {
			redirect('/bookroom');
    }
  }

  function list_users()
  {
    $data['query'] = $this->Booking_user->get_users();
    $this->load->helper('html');

    $this->load->view('list_users', $data);
  }

  function add_user_form($success=FALSE)
  {
    if($success != FALSE)
    {
      $data['success'] = TRUE;
      $this->load->view('add_user_form', $data);
    }
    else
    {
      $this->load->view('add_user_form');
    }
  }

  function add_user()
  {
    $this->load->library('form_validation');

    /* Set Validation rules */
    $rules = array(
      array(
        'field' => 'first_name',
        'label' => 'First Name',
        'rules' => 'required'
      ),
      array(
        'field' => 'last_name',
        'label' => 'Last Name',
        'rules' => 'required'
      ),
      array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'required'
      ),
      array(
        'field' => 'email',
        'label' => 'E-Mail Address',
        'rules' => 'required|valid_email'
      ),
      array(
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required'
      ),
      array(
        'field' => 'passconf',
        'label' => 'Password Confirmation',
        'rules' => 'required|matches[password]'
      ),
      array(
        'field' => 'role',
        'label' => 'User Role',
        'rules' => 'required'
      ),
    );

    $this->form_validation->set_rules($rules);
    $this->form_validation->set_error_delimiters(
      '<tr class="error"><td colspan="2">',
      '</td></tr><tr></tr>'
    );

    if($this->form_validation->run() == FALSE)
    {
      $this->load->view('add_user_form');
    }
    else
    {
      $this->Booking_user->add_user();
      redirect('/users/add_user_form/success');
    }
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

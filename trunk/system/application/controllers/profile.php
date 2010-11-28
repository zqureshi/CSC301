<?php

class Profile extends Controller{

  function Profile()
  {
    parent::Controller();

    /* Disable browser caching */
    $this->headers->disable_caching();

		/* Check if session is valid first */
    $this->authentication->validate_session();

    /* load required models */
    $this->load->model('Booking_user');

    /* load html helper */
    $this->load->helper('html');

    $this->load->model('side_model');
    $array = $this->side_model->current_booking();
    $this->load->view('bar', $array);
  }

  function index($success=FALSE)
  {
    $result = $this->Booking_user->
      get_user('id', $this->session->userdata('id'));

    $data['user'] = $result[0];
    $data['role'] = $this->Booking_user->
      is_admin($this->session->userdata('id')) ? 'Administrator' : 'User';

    if($success != FALSE)
      $data['success'] = TRUE;

    $this->load->view('profile', $data);
  }

  function update()
  {
    $this->load->library('form_validation');

    /* Set Validation rules */
    $rules = array(
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
    );

    $this->form_validation->set_rules($rules);
    $this->form_validation->set_error_delimiters(
      '<tr class="error"><td colspan="2">',
      '</td></tr><tr></tr>'
    );

    if($this->form_validation->run() == FALSE)
    {
      $result = $this->Booking_user->
        get_user('id', $this->session->userdata('id'));

      $data['user'] = $result[0];
      $data['role'] = $this->Booking_user->
        is_admin($this->session->userdata('id')) ? 'Admin' : 'User';

      $this->load->view('profile', $data);
    }
    else
    {
      $this->Booking_user->update_user();
      redirect('/profile/index/success');
    }
  }
}

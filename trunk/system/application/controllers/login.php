<?php

class Login extends Controller {
  
  function Login()
  {
    parent::Controller();

    /* Disable browser caching */
    $this->headers->disable_caching();

    /* Load required models */
    $this->load->model('Booking_user');
  }

  function index()
  {
    $this->load->library('form_validation');

    /* Set Validation rules */
    $rules = array(
      array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'required'
      ),
      array(
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required'
      ),
    );

    $this->form_validation->set_rules($rules);
    $this->form_validation->set_error_delimiters(
      '<div class="error">',
      '</div>'
    );

    if($this->form_validation->run() == FALSE)
    {
      $this->load->view('welcome_message');
    }
    else
    {
      $result = $this->Booking_user->
        get_user('username', $this->input->post('username'));

      if(empty($result)){
        redirect(site_url('/welcome/index/error'));
      }

      $user = $result[0];

      if(dohash($this->input->post('password')) != $user->password){
        redirect(site_url('/welcome/index/error'));
      }

      $this->session->set_userdata('id', $user->id);
      redirect('/book');
    }
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect(index_page());
  }

}


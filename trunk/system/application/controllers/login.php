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
    $result = $this->Booking_user->
      get_user('username', $this->input->post('username'));

    if(empty($result)){
      redirect(index_page());
    }

    $user = $result[0];

    if(dohash($this->input->post('password')) != $user->password){
      redirect(index_page());
    }

    $this->session->set_userdata('id', $user->id);
    redirect('/book');
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect(index_page());
  }

}


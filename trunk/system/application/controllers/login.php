<?php

class Login extends Controller {
  
  function Login()
  {
    parent::Controller;

    /* Load required models */
    $this->load->model('Booking_user');
  }

  function index()
  {
    $user = $this->Booking_user->
      get_user('username', $this->input->post('username'));

    echo $user;
  }

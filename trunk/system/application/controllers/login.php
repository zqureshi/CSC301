<?php

class Login extends Controller {
  
  function Login()
  {
    parent::Controller();

    /* Load required models */
    $this->load->model('Booking_user');
  }

  function index()
  {
    $result = $this->Booking_user->
      get_user('username', $this->input->post('username'));

    if(empty($result)){
      redirect('/welcome');
    }

    $user = $result[0];

    if(dohash($this->input->post('password')) != $user->password){
      redirect('/welcome');
    }

    $this->session->set_userdata('id', $user->id);
    redirect('/book');
  }

}


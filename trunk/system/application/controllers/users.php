<?php

class Users extends Controller{

  function Users()
  {
    parent::Controller();
  }

  function list_users()
  {
    $this->load->database();
    $this->load->model('Booking_user');
    $data['query'] = $this->Booking_user->get_users();

    $this->load->view('list_users', $data);
  }

  function index()
  {
    echo 'You\'re supposed to see this';
  }

}

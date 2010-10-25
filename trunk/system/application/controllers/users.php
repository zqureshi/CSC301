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

  function add_user_form()
  {
    $this->load->view('add_user_form');
  }

  function index()
  {
    $this->load->view('users');
  }

}

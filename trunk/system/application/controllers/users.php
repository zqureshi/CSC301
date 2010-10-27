<?php

class Users extends Controller{

  function Users()
  {
    parent::Controller();
  }

  function list_users()
  {
    $this->load->model('Booking_user');
    $data['query'] = $this->Booking_user->get_users();

    $this->load->view('list_users', $data);
  }

  function add_user_form()
  {
    $this->load->view('add_user_form');
  }

  function add_user()
  {
    $this->load->model('Booking_user');
    $this->Booking_user->add_user();
    $data['success'] = TRUE;
    $this->load->view('add_user_form', $data);
  }

  function test_user_added()
  {
    $data['success'] = TRUE;
    $this->load->view('add_user_form', $data);
  }

  function index()
  {
    $this->load->view('users');
  }

}
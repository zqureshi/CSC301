<?php

class Booking_user extends Model {

  var $first_name = '';
  var $last_name  = '';
  var $email      = '';
  var $password   = '';

  function Booking_user()
  {
    parent::Model();
  }

  function get_user($var,$val)
  {
    $this->db->where($var, $val);
    $query = $this->db->get_where('Users');

    return $query->result();
  }

  function get_users()
  {
    $query = $this->db->get('Users');

    return $query->result();
  }

  function update_pass($id, $password)
  {
    $this->password = dohash($password);
    $this->db->where('id', $id);
    $this->db->update('Users');
  }

  function add_user()
  {
    $this->first_name = xss_clean($this->input->post('first_name'));
    $this->last_name  = xss_clean($this->input->post('last_name'));
    $this->email      = xss_clean($this->input->post('email'));
    $this->password   = dohash($this->input->post('password'));

    $this->db->insert('Users', $this);
  }
}

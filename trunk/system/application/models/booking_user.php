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

  function get_users()
  {
    $query = $this->db->get('Users');

    return $query->result();
  }

}

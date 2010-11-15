<?php

class Calendar extends Model {

  var $Date   = '';
  var $tid    = '';
  var $rid    = '';
  var $id     = '';
  var $course = '';
  var $note   = '';

  function Calendar()
  {
    parent::Model();
  }

  function get_booking($var,$val)
  {
    $this->db->where($var, $val);
    $query = $this->db->get_where('booking');

    return $query->result();
  }

  function get_bookings()
  {
    $query = $this->db->get('booking');

    return $query->result();
  }

  function add_booking()
  {
    $this->Date   = xss_clean($this->input->post('Date'));
    $this->tid    = xss_clean($this->input->post('tid'));
    $this->rid    = xss_clean($this->input->post('rid'));
    $this->id     = xss_clean($this->input->post('id'));
    $this->course = xss_clean($this->input->post('course'));
    $this->note   = xss_clean($this->input->post('note'));

    $this->db->insert('booking', $this);
  }
}

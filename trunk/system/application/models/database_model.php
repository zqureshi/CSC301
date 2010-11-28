<?php

class Database_model extends Model {

  var $max_num = '';
  var $future  = '';

  function Database_model()
  {
    parent::Model();
  }

  function get_time()
  {
    $query = $this->db->get('time');
    
    return $query->result();
  }

  function update_time()
  {
    foreach ($query as $row):
        xss_clean($this->input->post('email'));
	form_input($row->tID, $row->tID);
    endforeach;
    $this->db->update('time', $data);
  }

  function get_contants()
  {
    $query = $this->db->get('variables');

    return $query->row();
  }

  function update_booking()
  {
    $this->max_num = xss_clean($this->input->post('max_num'));
    $this->future  = xss_clean($this->input->post('future'));

    $this->db->update('variables', $this);
  }
}


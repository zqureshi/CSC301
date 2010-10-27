<?php

class Recovery_hash extends Model {
  var $id   = '';
  var $user = '';

  function Recovery_hash()
  {
    parent::Model();
  }

  function hash_hash($hash)
  {
    $this->db->where('id', $hash);
    $query = $this->db->get('Recovery');

    if($query->num_rows() == 0){
      return FALSE;
    } else {
      return TRUE;
    }
  }

  function add_hash($user_id)
  {
    $this->load->model('Booking_user');
    $result = $this->Booking_user->get_user('id', $user_id);

    $user = $result[0];
    $this->id   = dohash($user->id . $user->email . $user->password);
    $this->user = $user_id;

    $this->db->insert('Recovery', $this);
  }

  function remove_hash($hash){
    $this->db->where('id', $hash);
    $this->db->delete('Recovery');
  }
}

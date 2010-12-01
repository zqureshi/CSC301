<?php

class Database_model extends Model {

  function Database_model()
  {
    parent::Model();
    $this->load->model('rooms_model' );	
  }

  function get_room_time($var)
  {
    $query = $this->db->get($var);
    
    return $query->result();
  }

  function add_room_time($item, $id)
  {
    $this->name = xss_clean($this->input->post($id));

    $this->db->insert($item, $this);
  }

  function update_room_time($item, $id)
  {
    $query = $this->get_room_time($item);
    foreach($query as $row){
        $this->name = xss_clean($this->input->post($row->$id));
        $this->db->where($id, $row->$id);
        $this->db->update($item, $this);
    }
  }

  function get_contants()
  {
    $query = $this->db->get('variables');

    return $query;
  }

  function update_booking()
  {
    $this->value = xss_clean($this->input->post('maxBookings'));
    $this->db->where('name', 'maxBookings');
    $this->db->update('variables', $this);

    $limit = $this->input->post('limitDate');
	if($this->rooms_model->validate_date($limit){
		 $this->value = xss_clean($limit);
   		 $this->db->where('name', 'limitDate');
   		 $this->db->update('variables', $this);
	}else{
		redirect("/users","location");
	}
    
  }

  function del_room_time($id, $item, $whatid)
  {
    $this->db->where($whatid, $id);
    $this->db->delete($item);
    /* delete all bookings of a given time/room*/
    $this->db->where($whatid, $id);
    $this->db->delete('booking');
  }
}


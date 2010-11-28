<?php
class Side_model extends Model {
	
	function Side_model () {
		parent::Model();
		$this->load->model('rooms_model');
		$this->load->model('booking_user');
	}

	function current_booking(){
		$user = $this->session->userdata('id');

		// Finds today's date
		$d= date("d");   
		// Finds today's month
		$m= date("m");	
		// Finds today's year
		$y= date("Y");   
		$date = $y. "-" . $m . "-" .$d ."\n";
		
		$sql = "SELECT * FROM booking WHERE id=$user AND Date>='$date' ORDER BY Date" ; 
		$query = $this->db->query($sql);

                $id = $this->booking_user->get_username($user);
                $is_admin = $this->booking_user->is_admin($user);

                $array = array('query' => $query->result(), 'id' => $id, 'is_admin' => $is_admin);

                return $array;
	}
}



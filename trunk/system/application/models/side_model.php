<?php
class Side_model extends Model {
	
	var $data = '';

	function Side_model () {
		parent::Model();
		$this->load->model('rooms_model');
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

                return $query->result();
	}
}


<?php
class Rooms_model extends Model {
	
	var $data = '';
	
	function Rooms_model () {	
		parent::Model();
		$this->load->database();			
	}
	
	/*
	 * Return the total number of rooms in the database.
	 */
	function number_of_rooms(){
		$sql = "SELECT * FROM room" ; 
		$query = $this->db->query($sql);
		return ($query->num_rows()) ;	
	}
	
	/*
	 * Return the total number of slots in the database.
	 */
	function number_of_slots(){
		$sql = "SELECT * FROM time" ; 
		$query = $this->db->query($sql);
		return ($query->num_rows()) ;	
	}
	
	/*
	 * Check if a booking exists with the given date, time and slot.
	 */
	function is_booked($year,$month,$day,$roomId, $slotId){
		$date = $year. "-" . $month . "-" .$day ."\n";
		$sql = "SELECT * FROM booking WHERE Date='$date' AND rID=$roomId AND tID=$slotId" ; 
		$query = $this->db->query($sql);
		return ($query->num_rows()) ;	
	}
	
	/*
	 * Return the room name given the associated id number.
	 */
	function get_room_name($roomId){
		$sql = "SELECT name FROM room WHERE rID=$roomId" ; 
		$query = $this->db->query($sql);
		foreach ($query->result() as $row){
			return $row->name;			
		}
	}
	
	/*
	 * Return the name of the slot (Period) given the associated id number.
	 */
	function get_slot_name($slotId){
		$sql = "SELECT * FROM time WHERE tID=$slotId" ; 
		$query = $this->db->query($sql);	
		foreach ($query->result() as $row){
			return $row->name;			
		}	
	}
	
	/*
	 * Returns the id of the teacher who has made the booking
	 * at the given date and slot.
	 */
	function get_user_id($year,$month,$day,$roomId, $slotId){
		$date = $year. "-" . $month . "-" .$day ."\n";
		$sql = "SELECT id FROM booking WHERE Date='$date' AND rID=$roomId AND tID=$slotId" ; 
		$query = $this->db->query($sql);
		foreach ($query->result() as $row){
			return $row->id ;			
		}
	}
	
	/*
	 * Given the unique teacher id returns the first and last name of the
	 * teacher. 
	 */
	function get_username_by_id($id){
		$sql = "SELECT first_name, last_name FROM Users WHERE ID=$id" ; 
		$query = $this->db->query($sql);	
		foreach ($query->result() as $row){
			return "$row->first_name $row->last_name" ;			
		}		
	}
		
	/*
	 * Get the course from the associated booking.
	 */
	function get_course($year,$month,$day,$roomId, $slotId){
		$date = $year. "-" . $month . "-" .$day ."\n";
		$sql = "SELECT course FROM booking WHERE Date='$date' AND rID=$roomId AND tID=$slotId" ; 
		$query = $this->db->query($sql);
		foreach ($query->result() as $row){
			return $row->course ;			
		}
	}
	
	/*
	 * Get the notes from the associated booking.
	 */
	function get_notes($year,$month,$day,$roomId, $slotId){
		$date = $year. "-" . $month . "-" .$day ."\n";
		$sql = "SELECT note FROM booking WHERE Date='$date' AND rID=$roomId AND tID=$slotId" ; 
		$query = $this->db->query($sql);
		foreach ($query->result() as $row){
			return $row->note ;			
		}
	}
	
	/*
	 * Make a booking with the given information.
	 * Should return true if successfully added to database. 
	 */
	function add_to_db ($year,$month,$day,$room,$slot,$notes,$course,$user){
		/// This is just a dummy variable for now...............................................
		$confirmation = 220000;
		$date = $year. "-" . $month . "-" .$day ."\n";
		$sql = "INSERT INTO booking (Date,tID,rID,id,course,confirmation,note) VALUES ("
			.$this->db->escape($date).", "
			.$this->db->escape($slot).", "
			.$this->db->escape($room).", "
			.$this->db->escape($user).", "
			.$this->db->escape($course).", "
			.$this->db->escape($confirmation).", "
			.$this->db->escape($notes)
			.")";
		$query = $this->db->query($sql);		
	}
	
	/*
	 * Deletes the booking in given date, time and slot.
	 */
	function delete_from_db($year=null, $month=null,$day=null, $roomId=null, $slotId=null){
		$date = $year. "-" . $month . "-" .$day ."\n";
		$sql = "DELETE FROM booking WHERE Date='$date' AND rID=$roomId AND tID=$slotId" ; 
		$query = $this->db->query($sql);		
	}
	
	function generate_schedule($year, $month, $day){	
		// Figure out the id of the current User from the session info.
		$currentUser = $this->session->userdata('id') ;
		
		// Figures out the number of class rooms and periods from DB. 
		$numOfSlots = $this->number_of_slots();
		$numOfRooms = $this->number_of_rooms();
		
		$this->data .= "<table border='0' cellpadding='0' cellspacing='0' align=center>"."\n";
		$this->data .= "	<tr>"."\n";
		$this->data .= "		<td align=center>$year-$month-$day</td>"."\n";
		$this->data .= "	</tr>"."\n";
		$this->data .= "	<tr>"."\n";
		$this->data .= "		<td><a href='/bookroom/index/$year/$month/'>Back to Calendar</a></td>"."\n";
		$this->data .= "	</tr>"."\n";
		$this->data .= "</table>"."\n";
		
		$this->data .= "<table border='0' cellpadding='0' cellspacing='0' class='calendar'>";
		for ($i = 0 ; $i < $numOfSlots + 1; $i++) {
			if($i == 0){
				$this->data .= "<tr valign=\"center\" >"."\n";
			}else{
				$this->data .= "<tr valign=\"center\"  class='days'>"."\n";
			}
			
			for ($j = 0 ; $j < $numOfRooms + 1; $j++) {
				if($this->is_booked($year, $month, $day,$j,$i)!= 0){					
					if($currentUser == ($this->get_user_id($year,$month,$day,$j, $i))){
						$class = "day_booked_by_me";
						$dispNote = "My Booking";					
					}else{
						$class = "day_booked";
						$dispNote = "Booked by " . $this->get_username_by_id($this->get_user_id($year,$month,$day,$j, $i));			
					} 
				}else{
					$class = "day";
					$dispNote = "";
				}
				
				if( $i == 0 && $j == 0){
					// This is the corner cell of the rooms and the times, hence needs to be empty.
					$this->data .= "<td></td>" . "\n";
				}else if( $i == 0 ){
					// Get the name of the rooms
					$temp = $this->get_room_name($j);					
					$this->data .= "<td class='day2' room='$j' slot='$i'>$temp</td>" . "\n";
				}else if($j == 0){
					// Get the name of the time slots.
					$temp = $this->get_slot_name($i);
					$this->data .= "<td class='day2' room='$j' slot='$i'>$temp</td>" . "\n";
				}else{
					$this->data .= "<td class='$class' room='$j' slot='$i'>$dispNote</td>" . "\n";
				}
			}	
			$this->data .= "</tr>". "\n";
			
		}
		$this->data .= "</table>". "\n";
		return $this->data ;
	}
}

<?php
class Rooms_model extends Model {
	
	var $data = '';
	
	function Rooms_model () {	
		parent::Model();
		$this->load->database();			
	}
	
	
	/*
	 * Return the latest date one can make a booking.
	 */
	function get_limit_date(){
		$sql = "SELECT * FROM variables WHERE name='limitDate'" ; 
		$query = $this->db->query($sql);
		foreach ($query->result() as $row){
			return $row->value;			
		}
	}
	
	/*
	 * Return the latest date one can make a booking.
	 */
	function get_max_number_of_bookings(){
		$sql = "SELECT * FROM variables WHERE name='maxBookings'" ; 
		$query = $this->db->query($sql);
		foreach ($query->result() as $row){
			return $row->value;			
		}
	}
	
	/*
	 * Return the number of bookings made by the given user.
	 */
	function get_number_of_bookings_by_id($id){
		$sql = "SELECT * FROM booking WHERE id=$id" ; 
		$query = $this->db->query($sql);
		return ($query->num_rows()) ;	
	}
	
	/*
	 * Return the total number of rooms in the database.
	 */
	function get_number_of_rooms(){
		$sql = "SELECT * FROM room" ; 
		$query = $this->db->query($sql);
		return ($query->num_rows()) ;	
	}
	
	/*
	 * Return the total number of slots in the database.
	 */
	function get_number_of_slots(){
		$sql = "SELECT * FROM time" ; 
		$query = $this->db->query($sql);
		return ($query->num_rows()) ;	
	}
	
	/*
	 * Check if a booking exists with the given date, time and slot.
	 */
	function is_booked($year,$month,$day,$roomId, $slotId){
		$date = $year. "-" . $month . "-" .$day;
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
	 * Returns the list of room names.
	 */
	function get_rooms(){
		$sql = "SELECT * FROM room" ; 
		$query = $this->db->query($sql);
		return $query ;			
		
	}
	
	
	/*
	 * Returns the list of slot names.
	 */
	function get_slots(){
		$sql = "SELECT * FROM time" ; 
		$query = $this->db->query($sql);	
		return $query ;		
	}


	/*
	 * Returns 1 if the given user exists in the database, 0 otherwise.
	 */
	function user_exists($user){			
		$sql = "SELECT id FROM Users WHERE id=$user" ; 
		$query = $this->db->query($sql);
		return ($query->num_rows()) ;
	}
	
	/*
	 * Returns the id of the teacher who has made the booking
	 * at the given date and slot.
	 */
	function get_user_id($year,$month,$day,$roomId, $slotId){
		$date = $year. "-" . $month . "-" .$day;
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
		$date = $year. "-" . $month . "-" .$day ;
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
		$date = $year. "-" . $month . "-" .$day;
		$sql = "SELECT note FROM booking WHERE Date='$date' AND rID=$roomId AND tID=$slotId" ; 
		$query = $this->db->query($sql);
		foreach ($query->result() as $row){
			return $row->note ;			
		}
	}
	
	/*
	 * Check whether start_date is before the end_date or not.
	 */
	function greaterDate($start_date,$end_date){
	  $start = strtotime($start_date);
	  $end = strtotime($end_date);
	  if ($start-$end >= 0){
	  	return 1;
	  }else{
	  	return 0;
	  }
	}

	
	/*
	 * Make a booking with the given information.
	 * Should return true if successfully added to database. 
	 */
	function add_to_db ($year,$month,$day,$roomId,$slotId,$notes,$course,$userId){
		// If the date is passed the current day, do not book it.
		$currentDate = date("Y-M-d");
		$givenDate = "$year-$month-$day";
		
		// If the given dates is after than the currentDate then book it.
		if($this->greaterDate($givenDate,$currentDate) == 1 ){
			// First check if the $user exists in the user database.
			if($this->user_exists($userId)){
				/// This is just a dummy variable for now...............................................
				$confirmation = 220000;
				$date = $year. "-" . $month . "-" .$day ;
				$sql = "INSERT INTO booking (Date,tID,rID,id,course,confirmation,note) VALUES ("
					.$this->db->escape($date).", "
					.$this->db->escape($slotId).", "
					.$this->db->escape($roomId).", "
					.$this->db->escape($userId).", "
					.$this->db->escape($course).", "
					.$this->db->escape($confirmation).", "
					.$this->db->escape($notes)
					.")";
				// To make sure there are no users booking at the same time, 
				// just check again to see if the booking has been made or not.
				// WARNING: This doesnt handle simultanius bookings, where it could give an error message.
				if($this->is_booked($year,$month,$day,$roomId, $slotId) == 0){
					$query = $this->db->query($sql);
				}							
			}	
		}else{
			// DO NOT BOOK.
		}
	}	
	
	/*
	 * Deletes the booking in given date, time and slot.
	 */
	function delete_from_db($year=null, $month=null,$day=null, $roomId=null, $slotId=null){
		$date = $year. "-" . $month . "-" .$day;
		$sql = "DELETE FROM booking WHERE Date='$date' AND rID=$roomId AND tID=$slotId" ; 
		$query = $this->db->query($sql);		
	}
	
	
	
	
	/*
	 * Generates the schedule to display on the screen.
	 */
	function generate_schedule($year, $month, $day){	
		$querySlot = $this->get_slots()->result();
		$queryRoom = $this->get_rooms()->result();

		// Figure out the id of the current User from the session info.
		$currentUser = $this->session->userdata('id') ;
		
		// Figures out the number of class rooms and periods from DB. 
		$numOfSlots = $this->get_number_of_slots();
		$numOfRooms = $this->get_number_of_rooms();
		
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
				
				
				if( $i == 0 && $j == 0){
					// This is the corner cell of the rooms and the times, hence needs to be empty.
					$this->data .= "<td></td>" . "\n";
				}else if( $i == 0 ){
					// Get the name of the rooms
					//$temp = $this->get_room_name($j);	
					$temp = $queryRoom[$j-1]->name ;				
					//$this->data .= "<td class='day2' room='$j' slot='$i'>$temp</td>" . "\n";
					$this->data .= "<td class='day2'>$temp</td>" . "\n";
				}else if($j == 0){
					// Get the name of the time slots.
					//$temp = $this->get_slot_name($i);
					$temp = $querySlot[$i-1]->name ;
					//$this->data .= "<td class='day2' room='$j' slot='$i'>$temp</td>" . "\n";
					$this->data .= "<td class='day2'>$temp</td>" . "\n";
				}else{
					$temp1 = $queryRoom[$j-1]->rID ;
					$temp2 = $querySlot[$i-1]->tID ;
					if($this->is_booked($year, $month, $day,$temp1,$temp2)!= 0){					
						if($currentUser == ($this->get_user_id($year,$month,$day,$temp1, $temp2))){
							$class = "day_booked_by_me";
							$dispNote = "My Booking";					
						}else{
							$class = "day_booked";
							$dispNote = "Booked by " . $this->get_username_by_id($this->get_user_id($year,$month,$day,$temp1, $temp2));			
						} 
					}else{
						$class = "day";
						$dispNote = "";
					}
					$this->data .= "<td class='$class' room='$temp1' slot='$temp2'>$dispNote</td>" . "\n";
				}
			}	
			$this->data .= "</tr>". "\n";
			
		}
		$this->data .= "</table>". "\n";
		return $this->data ;
	}


	
	/* MOVED FROM MASSBOOK_PAGE MODEL TO HERE. */	

	/*
	 * Returns the list of all the room names.
	 */
	function get_room_names (){	
		$sql = "SELECT * FROM room" ; 
		$query = $this->db->query($sql);
		return $query ;	
	}
	
	/*
	 * Returns the list of all the slot names.
	 */
	function get_slot_names(){	
		$sql = "SELECT * FROM time" ; 
		$query = $this->db->query($sql);
		return $query ;	
	}
	
	/*
	 * Returns 1 if the given booking exists in the database.
	 */
	function booking_exists($year,$month,$day,$room,$slot){		
		$date = $year. "-" . $month . "-" .$day;	
		$sql = "SELECT * FROM booking WHERE Date='$date' AND tID=$slot AND rID=$room" ; 
		$query = $this->db->query($sql);
		return ($query->num_rows()) ;
	}
	
	
	/*
	 * Given these inputs: book every desired date within given start and end date.
	 */
	function massbook($start_date,$end_date,$course,$notes,$days,$room,$slot,$override,$user){

		$dates = $this->get_dates($start_date,$end_date);
		foreach ($dates as $elem){
			// First figure out the name of the day:
			$nameDay = date("D", $elem);
			
			// Then check if each of the day is in the list days. if it is make the booking.
			if(in_array($nameDay, $days)){
				$year = date("Y", $elem);
				$month = date("m", $elem);
				$day = date("d", $elem);
				// Check if booking exists. According to the override rule either
				// delete the existing booking or skip to the next element.
				if($this->booking_exists($year,$month,$day,$room,$slot) == 1){
					// If override rule is 1 then delete the existing booking
					// and add the admin's booking.
					if($override == 1){
						// BEFORE YOU DELETE BOOKING MAYBE NOTIFY THE OWNER OF THE BOOKING.						
						$this->delete_from_db($year, $month, $day, $room, $slot);						
						$this->add_to_db($year,$month,$day,$room,$slot,$notes,$course,$user);						
					}
				}else{
					$this->add_to_db($year,$month,$day,$room,$slot,$notes,$course,$user);
				}				
			}
		}
	}
			
	/*
	 * Return an array containing all the dates between the start and the end date.
	 * The dates are represented in seconds since the unix epoch.
	 */
	function get_dates($start_date,$end_date){		
		$dateMonthYearArr = array();
		$fromDateTS = strtotime($start_date);
		$toDateTS = strtotime($end_date);
		
		for ($currentDateTS = $fromDateTS; $currentDateTS <= $toDateTS; ) {
			// use date() and $currentDateTS to format the dates in between
			$dateMonthYearArr[] = $currentDateTS;
			$currentDateTS += (60 * 60 * 24) ;
		}
		return $dateMonthYearArr ;
	
	}
	
	/*
	 * Checks whether the given dates is in the right form.
	 * Right form : YYYY-MM-DD .
	 */
	function validate_date($date){
		$size = strlen($date) ;
		if(($time = strtotime($date) == -1) && $time === false ){
			return 0 ;
		}else{
			if($size == 10){
				$temp1 = substr($date, 0, 4);
				$temp2 = substr($date, 5, 2);
				$temp3 = substr($date, 8, 2);		
				
				if ($date[4] != "-" && $date[7] != "-" && is_numeric($temp1)&& is_numeric($temp2) && is_numeric($temp3)){
					return 0 ;
				}else{
					return 1 ;
				}
			}else{
				return 0 ;	
			}
		}
		
	}
	
	/*  FUNSTIONS TO FLUSH THE DATABASE*/
	
	
	/*
	 * Given a user id deletes all the bookings associated with that user.
	 */
	function delete_all_bookings($user){		
		$sql = "DELETE FROM booking WHERE id=$user" ; 
		$query = $this->db->query($sql);	
	}
	
/*
	 * Given a user id deletes all the bookings associated with that user.
	 */
	function delete_user($user){		
		$sql = "DELETE FROM Users WHERE id=$user" ; 
		$query = $this->db->query($sql);
	}
	
	
	
}

<?php
class Thirdpage_model extends Model {
	
	var $data = '';
	// Maximim booking capacity per day
	var $maxBooking = 1;
	
	function Thirdpage_model () {
		parent::Model();
		$this->load->database();
		$this->load->model('rooms_model');
        $this->load->model('booking_user');
	}

	/*
	 * Generates the content to show on the page. According to booking status
	 * either shows the booking information or the forms to fill up if
	 * the given slot is not booked.
	 */
	function generate_content ($year,$month,$day,$room,$slot){
		$temp1 = $this->rooms_model->get_room_name($room) ;
		$temp2 = $this->rooms_model->get_slot_name($slot);
			
		$this->data .= "<table>"."\n";
		$this->data .= "	<tr>"."\n";
		$this->data .= "		<td colspan=\"2\" align=\"center\"><a href=\"/rooms/index/$year/$month/$day\">Back to Schedule</a></td>"."\n";	
		$this->data .= "	</tr>"."\n";
		
		// Check if the given room is booked at the given date and slot..
		if($this->rooms_model->is_booked($year,$month,$day,$room, $slot)){
			// Need to show update and delete options.
			
			$temp3a = $this->rooms_model->get_user_id($year,$month,$day,$room,$slot) ;
			$temp3 = $this->rooms_model->get_username_by_id($temp3a) ;
			$temp4 = $this->rooms_model->get_course($year,$month,$day,$room,$slot) ;
			$temp5 = $this->rooms_model->get_notes($year,$month,$day,$room,$slot) ;
			
			//$this->data .= "<table>"."\n";
			$this->data .= "	<tr>"."\n";
			$this->data .= "		<td><b>Date:</b></td><td>$year-$month-$day</td>"."\n";
			$this->data .= "	</tr>"."\n";
			$this->data .= "	<tr>"."\n";
			$this->data .= "		<td><b>Booked by:</b></td><td>$temp3</td>	"."\n";	
			$this->data .= "	</tr>"."\n";
			$this->data .= "	<tr>"."\n";
			$this->data .= "		<td><b>Room:</b></td><td>$temp1</td>"."\n";
			$this->data .= "	</tr>"."\n";
			$this->data .= "	<tr>"."\n";
			$this->data .= "		<td><b>Booked between:</b></td><td>$temp2</td>"."\n";
			$this->data .= "	</tr>"."\n";			
			$this->data .= "	<tr>"."\n";
			$this->data .= "		<td><b>Booked for:</b></td><td>$temp4</td>"."\n";
			$this->data .= "	</tr>"."\n";
			$this->data .= "	<tr>"."\n";
			$this->data .= "		<td><b>Notes:</b></td><td>$temp5</td>"."\n";	
			$this->data .= "	</tr>"."\n";
			
			// Do not show the delete option if the booking doesnt belong to the 
			// loged user.
			if ($this->session->userdata('id') == $temp3a){
				$this->data .= "	<tr>"."\n";
				$this->data .= "        <form name=\"input\" action=\"/thirdPage/delete/$year/$month/$day/$room/$slot\" method=\"POST\">" ."\n";					
				$this->data .= "		<td colspan=\"2\"  align=\"center\"><input type=\"submit\" value=\"Delete booking\" /></td>"."\n";	
				$this->data .= "	</tr>"."\n";
			}			
			
			$this->data .= "</form> "."\n";
			$this->data .= "</table>"."\n";
			
		}else{
			// figure out who the current user is here:
			$currentUser = $this->session->userdata('id');
			$user = $this->booking_user->get_username($currentUser);
			
			// Show the forms to book the slot.
			$this->data .= "<form name=\"input\" action=\"/thirdPage/validate\" method=\"POST\">" ."\n";
			
			$this->data .= "	<tr>"."\n";
			$this->data .= "		<td><b>Date:</b></td><td>$year-$month-$day</td>"."\n";
			$this->data .= "	</tr>"."\n";
			
			$this->data .= "	<tr>"."\n";
			$this->data .= "		<td><b>Person Booking:</b></td><td>$user</td>"."\n";
			$this->data .= "	</tr>"."\n";			
			$this->data .= "	<tr>"."\n";
			$this->data .= "		<td><b>Room:</b></td><td>$temp1</td>"."\n";
			$this->data .= "	</tr>"."\n";
			$this->data .= "	<tr>"."\n";
			$this->data .= "		<td><b>Booking Between:</b></td><td>$temp2</td>"."\n";
			$this->data .= "	</tr>"."\n";
			
			$this->data .= "	<tr VALIGN=\"top\">"."\n";
			$this->data .= "		<td><b>Course:</b></td><td><input type=\"text\" name=\"course\" size=\"53\" /></td>"."\n";
			$this->data .= "	</tr>"."\n";
			$this->data .= "	<tr VALIGN=\"top\">"."\n";
			$this->data .= "		<td><b>Notes:</b></td><td><textarea name=\"notes\" COLS=40 ROWS=6></textarea></td>"."\n";
			$this->data .= "	</tr>"."\n";
			$this->data .= "	<tr>"."\n";
			$this->data .= "		<td colspan=\"2\"  align=\"center\"><input type=\"submit\" value=\"Book\" /></td>"."\n";	
			$this->data .= "	</tr>"."\n";
			$this->data .= "</table>"."\n";
			
			//$this->data .= "<form name=\"input\" action=\"/thirdPage/validate\" method=\"POST\">" ."\n";
			//$this->data .= "Person Booking: $user<br>"."\n";
			//$this->data .= "Course: <input type=\"text\" name=\"course\" /><br>"."\n";
			//$this->data .= "<TEXTAREA NAME=\"notes\" COLS=40 ROWS=6></TEXTAREA>"."\n";
			//$this->data .= "Notes: <input type=\"text\" name=\"notes\" /><br>"."\n";
			$this->data .= "<input type=\"hidden\" name=\"year\" value=\"$year\" />"."\n";
			$this->data .= "<input type=\"hidden\" name=\"month\" value=\"$month\" />"."\n";
			$this->data .= "<input type=\"hidden\" name=\"day\" value=\"$day\" />"."\n";
			$this->data .= "<input type=\"hidden\" name=\"room\" value=\"$room\" />"."\n";
			$this->data .= "<input type=\"hidden\" name=\"slot\" value=\"$slot\" />"."\n";
			$this->data .= "<input type=\"hidden\" name=\"user\" value=\"$currentUser\" />"."\n";
			//$this->data .= "<input type=\"submit\" value=\"Submit\" />"."\n";
			$this->data .= "</form> "."\n";
		}	
		return $this->data;
	
	}
}

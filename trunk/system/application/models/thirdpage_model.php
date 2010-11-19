<?php
class Thirdpage_model extends Model {
	
	var $data = '';
	// Maximim booking capacity per day
	var $maxBooking = 1;
	
	function Thirdpage_model () {
		parent::Model();
		$this->load->database();
		$this->load->model('rooms_model');
		
	}


	function generate_content ($year,$month,$day,$room,$slot){
		// Check if the given room is booked at the given date and slot..
		if($this->rooms_model->is_booked($year,$month,$day,$room, $slot)){
			// Need to show update and delete options.
			$temp1 = $this->rooms_model->get_room_name($room) ;
			$temp2 = $this->rooms_model->get_slot_name($slot);
			$temp3 = $this->rooms_model->get_user_id($year,$month,$day,$room,$slot) ;
			$temp3 = $this->rooms_model->get_username_by_id($temp3) ;
			$temp4 = $this->rooms_model->get_course($year,$month,$day,$room,$slot) ;
			$temp5 = $this->rooms_model->get_notes($year,$month,$day,$room,$slot) ;
			
			$this->data .= "<table>"."\n";
			$this->data .= "	<tr>"."\n";
			$this->data .= "		<td>Room</td><td>$temp1</td>"."\n";
			$this->data .= "	</tr>"."\n";
			$this->data .= "	<tr>"."\n";
			$this->data .= "		<td>Booked between:</td><td>$temp2</td>"."\n";
			$this->data .= "	</tr>"."\n";
			$this->data .= "	<tr>"."\n";
			$this->data .= "		<td>Booked by:</td><td>$temp3</td>	"."\n";	
			$this->data .= "	</tr>"."\n";
			$this->data .= "	<tr>"."\n";
			$this->data .= "		<td>Booked for:</td><td>$temp4</td>"."\n";
			$this->data .= "	</tr>"."\n";
			$this->data .= "	<tr>"."\n";
			$this->data .= "		<td>Notes:</td><td>$temp5</td>"."\n";	
			$this->data .= "	</tr>"."\n";
			$this->data .= "</table>"."\n";
			
		}else{
			// figure out who the current user is here:
			$currentUser = $this->session->userdata('id');
			$user = $this->booking_user->get_username($uid);
			
			// Show the forms to book the slot.
			$this->data .= "<form name=\"input\" action=\"/thirdPage/validate\" method=\"POST\">" ."\n";
			$this->data .= "Person Booking: $user<br>"."\n";
			$this->data .= "Course: <input type=\"text\" name=\"course\" /><br>"."\n";
			$this->data .= "Notes: <input type=\"text\" name=\"notes\" /><br>"."\n";
			$this->data .= "<input type=\"hidden\" name=\"year\" value=\"$year\" />"."\n";
			$this->data .= "<input type=\"hidden\" name=\"month\" value=\"$month\" />"."\n";
			$this->data .= "<input type=\"hidden\" name=\"day\" value=\"$day\" />"."\n";
			$this->data .= "<input type=\"hidden\" name=\"room\" value=\"$room\" />"."\n";
			$this->data .= "<input type=\"hidden\" name=\"slot\" value=\"$slot\" />"."\n";
			$this->data .= "<input type=\"hidden\" name=\"user\" value=\"$currentUser\" />"."\n";
			$this->data .= "<input type=\"submit\" value=\"Submit\" />"."\n";
			$this->data .= "</form> "."\n";
		}	
		return $this->data;
	
	}
}

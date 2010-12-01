<?php
class Thirdpage_model extends Model {
	
	var $data = '';
	
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
			// Gets the id of the current user.
			$currentUser = $this->session->userdata('id') ;
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
				// loged user or not and admin. 
				if (($this->session->userdata('id') == $temp3a) || $this->booking_user->is_admin($currentUser) ){
					$this->data .= "	<tr>"."\n";
					$this->data .= "        <form name=\"input\" action=\"/thirdPage/delete/$year/$month/$day/$room/$slot\" method=\"POST\">" ."\n";					
					$this->data .= "		<td colspan=\"2\"  align=\"center\"><input type=\"submit\" value=\"Delete booking\" /></td>"."\n";	
					$this->data .= "	</tr>"."\n";
				}			
				
				$this->data .= "</form> "."\n";
				$this->data .= "</table>"."\n";
				
			}else{

				$numberOfBookingsMade = $this->rooms_model->get_number_of_bookings_by_id($currentUser) ;
				$maxNumberOfBookingsAllowed = $this->rooms_model->get_max_number_of_bookings();
				
				// Check if the user has reached the maximum number of bookings allowed.
				if(($maxNumberOfBookingsAllowed > $numberOfBookingsMade) || $this->booking_user->is_admin($currentUser)){
					$currentDate = date("Y-M-d");
					$givenDate = "$year-$month-$day";
					
					$limitDate = $this->rooms_model->get_limit_date();
					
					// If the desired booking date is not after the latest date set by the admin
					// then make the booking.
					if($this->rooms_model->greaterDate($limitDate , $givenDate) == 1 ){			
						// If the given dates is after than the currentDate display an error
						// message. If not display the forms.
						if($this->rooms_model->greaterDate($givenDate,$currentDate) == 1 ){			
							// figure out who the current user is here:
							$currentUser = $this->session->userdata('id');
							$user = $this->rooms_model->get_username_by_id($currentUser) ;			
							
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
							$this->data .= "		<td><b>*Course:</b></td><td><input style=\"width:100%\" type=\"text\" name=\"course\" /></td>"."\n";
							$this->data .= "	</tr>"."\n";
							$this->data .= "	<tr VALIGN=\"top\">"."\n";
							$this->data .= "		<td><b>Notes:</b></td><td><textarea style=\"width:100%\" name=\"notes\" ></textarea></td>"."\n";
							$this->data .= "	</tr>"."\n";
							$this->data .= "	<tr>"."\n";
							$this->data .= "		<td colspan=\"2\"  align=\"center\"><input type=\"submit\" value=\"Book\" /></td>"."\n";	
							$this->data .= "	</tr>"."\n";
							$this->data .= "</table>"."\n";
							$this->data .= "<input type=\"hidden\" name=\"year\" value=\"$year\" />"."\n";
							$this->data .= "<input type=\"hidden\" name=\"month\" value=\"$month\" />"."\n";
							$this->data .= "<input type=\"hidden\" name=\"day\" value=\"$day\" />"."\n";
							$this->data .= "<input type=\"hidden\" name=\"room\" value=\"$room\" />"."\n";
							$this->data .= "<input type=\"hidden\" name=\"slot\" value=\"$slot\" />"."\n";
							$this->data .= "<input type=\"hidden\" name=\"user\" value=\"$currentUser\" />"."\n";
							$this->data .= "</form> "."\n";
						}else{
							$msg = "The date you are trying to book is passed. Please try to book someother date.";
							$this->data .= "	<tr>"."\n";
							$this->data .= "		<td align=\"center\"> $msg</td>"."\n";	
							$this->data .= "	</tr>"."\n";
							$this->data .= "</table>"."\n";
						}
					}else{
						$msg = "The date you are trying to book is after the latest bookable date. Please try to book someother date.";
						$this->data .= "	<tr>"."\n";
						$this->data .= "		<td align=\"center\"> $msg</td>"."\n";	
						$this->data .= "	</tr>"."\n";
						$this->data .= "</table>"."\n";
					}	
			}else{
				$msg = "You have reached the maximum number of bookings a user can make. Please contact Admin for further questions.";
				$this->data .= "	<tr>"."\n";
				$this->data .= "		<td colspan=\"2\" align=\"center\">$msg</td>"."\n";	
				$this->data .= "	</tr>"."\n";
				$this->data .= "</table>"."\n";
			}			
		}
		return $this->data;
	}
}

<?php
class Massbook_model extends Model {

	var $data = '' ;
	function Massbook_model () {
		parent::Model();	
		$this->load->database();
		$this->load->model('rooms_model');
	}
		
	function generate_content($errNo){
				
		$this->data .= "<table cellpadding=\"10\">"."\n";
		// IF errNo is 1 it means that there was a empty field in the forms and 
		// need to display a message to the user.
		if($errNo == 1){
			$this->data .= "<tr> <td colspan=\"3\"> <div style=\"color:red;\">You forgot some of the fields empty. </div> </td> </tr>"."\n";	
		}else if($errNo == 2){
			$this->data .= "<tr> <td colspan=\"3\"> <div style=\"color:red;\">Start or End date is not in right format. </div> </td> </tr>"."\n";	
		}			
		$this->data .= "	<form action=\"/massbook/validate\" method=\"POST\" >"."\n";
		$this->data .= "		<tr> <td>*Start Date:</td><td> <input type=\"text\" size=\"10\" maxlength=\"10\" name=\"start_date\"></td> <td>Ex: 2010-01-30 </td></tr>"."\n";
		$this->data .= "		<tr> <td>*End Date:</td><td>  <input type=\"text\" size=\"10\" maxlength=\"10\" name=\"end_date\"></td><td>Ex: 2010-01-30 </td></tr>"."\n";
		$this->data .= "		<tr>"."\n";
		$this->data .= "			<td>*Repetition: </td> "."\n";
		$this->data .= "			<td> "."\n";
		$this->data .= "<table>"."\n";
		$this->data .= "					<tr> "."\n";
		$this->data .= "					<td><input type=\"checkbox\" name=\"days[]\" value=\"Mon\" /> </td>"."\n";
		$this->data .= "					<td><input type=\"checkbox\" name=\"days[]\" value=\"Tue\" /> </td>"."\n";
		$this->data .= "					<td><input type=\"checkbox\" name=\"days[]\" value=\"Wed\" /> </td>"."\n";
		$this->data .= "					<td><input type=\"checkbox\" name=\"days[]\" value=\"Thu\" /> </td> "."\n";
		$this->data .= "					<td><input type=\"checkbox\" name=\"days[]\" value=\"Fri\" /> </td>"."\n";
		$this->data .= "					<td><input type=\"checkbox\" name=\"days[]\" value=\"Sat\" /> </td>"."\n";
		$this->data .= "					<td><input type=\"checkbox\" name=\"days[]\" value=\"Sun\" /> </td>"."\n";
		$this->data .= "					</tr>"."\n";		
		$this->data .= "					<tr> "."\n";
		$this->data .= "					<td>Mon</td>"."\n";
		$this->data .= "					<td>Tue</td>"."\n";
		$this->data .= "					<td>Wed</td>"."\n";
		$this->data .= "					<td>Thur</td> "."\n";
		$this->data .= "					<td>Fri</td>"."\n";
		$this->data .= "					<td>Sat</td>"."\n";
		$this->data .= "					<td>Sun</td>"."\n";
		$this->data .= "					</tr>"."\n";
		$this->data .= "				</table>"."\n";
		$this->data .= "			</td>"."\n";
		$this->data .= "			<td> <b>Book every clicked day between the given dates. </b></td>"."\n";
		$this->data .= "		</tr>"."\n";				
		$this->data .= "		<tr> <td>*Course Name:</td><td>  <input style=\"width:100%\" type=\"text\" maxlength=\"10\" name=\"course_name\"></td></tr>"."\n";
		$this->data .= "		<tr> <td>Notes:</td><td>  <textarea style=\"width:100%; height:100px;\"   name=\"notes\" wrap=\"physical\" ></textarea></td></tr>"."\n";
		$this->data .= "		<tr> <td>*Select the period: </td>"."\n";
		$this->data .= "		<td>"."\n";
		$this->data .= "		<select name=\"slot\">"."\n";
		
		$query = $this->rooms_model-> get_slot_names ();
		foreach ($query->result() as $row){
			$this->data .= "<option value=\"$row->tID\">$row->name</option>" ;
		}	
		
		$this->data .= "		</select>"."\n";
		$this->data .= "		</td>"."\n";
		$this->data .= "		</tr>"."\n";				
		$this->data .= "		<tr> <td>*Select the room: </td>"."\n";
		$this->data .= "		<td>"."\n";
		$this->data .= "		<select name=\"room\">"."\n";
		
		$query = $this-> rooms_model -> get_room_names ();
		foreach ($query->result() as $row){
			$this->data .= "<option value=\"$row->rID\">$row->name</option>" ;
		}
		
		$this->data .= "		</td>	"."\n";
		$this->data .= "		</tr>"."\n";				
		$this->data .= "		<tr> "."\n";
		$this->data .= "		<td>Override Option:</td> <td><input type=\"checkbox\" name=\"override[]\" value=\"override\" /></td> <td>If a booking already exists in desired time, override option lets you take over the booking.</td>"."\n";
		$this->data .= "		</tr>"."\n";
		$this->data .= "		<td colspan=\"2\"  align=\"center\"><input type=\"submit\" value=\"Book\" /></td>"."\n";
		$this->data .= "	</form>"."\n";
		$this->data .= "</table>"."\n";
		
		return $this->data ;
	}
}

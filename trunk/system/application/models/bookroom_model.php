<?php
class Bookroom_model extends Model {
	
	var $conf;
	// Maximum booking capacity per day
	var $maxBooking = 1;
	
	function Bookroom_model () {
		parent::Model();
		$this->load->database();

		$this->conf['calendar'] = '';		
	}
	
	/*
	 * Checks whether the given date has been entirely booked or not. 
	 * Return 1 if fully booked.
	 */
	function fully_booked($year, $month, $day) {
		return (($this->maxBooking <= $this->number_of_bookings($year, $month, $day)) ? 1 : 0) ; 
	}
	
	/*
	 * Returns the number of bookings in a given day.
	 */
	function number_of_bookings($year, $month, $day) {
		$sql = "SELECT * FROM booking WHERE Date='$year-$month-$day'" ;
		$query = $this->db->query($sql);
		return ($query->num_rows()) ;
	}

	/*
	 * Returns the HTML code of the calendar to be displayed on the screen.
	 */
	function generate_calendar($year, $month){
		$adj = "";
		$prevYear = 0 ;
		$nextYear = 0 ;
		
		// Finds today's date
		$d= date("d");     
		// Finds today's year
		$y= date("Y");     
		// This is to calculate number of days in a month
		$no_of_days = date('t',mktime(0,0,0,$month,1,$year)); 
		// Month is calculated to display at the top of the calendar
		$mn=date('M',mktime(0,0,0,$month,1,$year)); 
		// Year is calculated to display at the top of the calendar
		$yn=date('Y',mktime(0,0,0,$month,1,$year)); 
		// This will calculate the week day of the first day of the month
		$j= date('w',mktime(0,0,0,$month,1,$year)); 
		
		// Figure out the previous month and the year to be used the links.
		$prevMonth = $month - 1 ;
		if($prevMonth <= 0){
			$prevMonth = 12;
			$prevYear = $year - 1;
		}else{
			$prevYear = $year ; 
		}
		// Figure out the next month and the year to be used the links.
		$nextMonth = $month + 1;
		if($nextMonth >= 13){
			$nextMonth = 1;
			$nextYear = $year + 1;
		}else{
			$nextYear = $year ;
		}
				
		$this->conf['calendar'] .= "  <table border='0' cellpadding='0' cellspacing='0' class='calendar'>
				<tr>
				<th style=\"text-decoration: underline;font-size: 11pt\"><a href='/bookroom/index/$prevYear/$prevMonth'>&lt;&lt;</a></th>
				<th colspan='5' style=\"font-size: 11pt\">$mn $yn </th>
				<th style=\"text-decoration: underline;font-size: 11pt\"><a href='/bookroom/index/$nextYear/$nextMonth'>&gt;&gt;</a></th>
				</tr>
				<tr>
					<td colspan='7'>&nbsp; </td>
				</tr>
				<tr class='highlight'>
				<td>Su</td><td>Mo</td><td>Tu</td><td>We</td><td>Th</td><td>Fr</td><td>Sa</td>
				</tr>				
				<tr class='days'>"."\n";
		
		
		// Adjustment of date starting
		for($k=1; $k<=$j; $k++){ 
			$adj .="<td class='solid'></td>". "\n";
		}
		
		for($i=1;$i<=$no_of_days;$i++){
			if($this->fully_booked($year,$month,$i) == 1){
				$class = "day_booked"; 
			}else{
				$class = "day";
			}
			$this->conf['calendar'] .= $adj."<td class='$class' ><div class='day_num'>$i</div></td>"."\n"; // This will display the date inside the calendar cell
			$adj='';
			$j ++;
			if($j==7){
				$this->conf['calendar'] .= "</tr>" . "\n" ."<tr class='days'>" ."\n";
				$j=0;
			}
		}
		// Fill up the rest of the cells after the end of the days.
		if( $j != 0){
			for ($i = 0 ; $i < (7 - $j); $i++) {
				$this->conf['calendar'] .= "<td class='solid'></td>" . "\n";
			}
		}
		$this->conf['calendar'] .= "</tr></table>";		
		return $this->conf['calendar'];
	}		
}

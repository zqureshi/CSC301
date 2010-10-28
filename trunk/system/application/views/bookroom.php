<!DOCTYPE HTML>
<html lang="en-US">
<head>
<title>My Calendar</title>
<meta charset="UTF-8">
<style type="text/css">
.calendar {
	font-family: Arial;
	font-size: 12px;
}

table.calendar {
	margin: auto;
	border-collapse: collapse;
}

.calendar .days td {
	width: 80px;
	height: 80px;
	padding: 4px;
	border: 1px solid #999;
	vertical-align: top;
	background-color: #DEF;
}

.calendar .days-booked td {
	width: 80px;
	height: 80px;
	padding: 4px;
	border: 1px solid #999;
	vertical-align: top;
	background-color: red;
}

.calendar .days td:hover {
	background-color: #FFF;
}

.calendar .highlight {
	font-weight: bold;
	color: #00F;
}
</style>
<script type="text/javascript"
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
</head>
<body>


<?php 

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


echo "  <table border='0' cellpadding='0' cellspacing='0' class='calendar'>
		<tr>
		<th><a href='/bookroom/index/$prevYear/$prevMonth'>&lt;&lt;</a></th>
		<th colspan='5'>$mn $yn </th>
		<th><a href='/bookroom/index/$nextYear/$nextMonth'>&gt;&gt;</a></th>
		</tr>
		<tr>
		<td>Su</td><td>Mo</td><td>Tu</td><td>We</td><td>Th</td><td>Fr</td><td>Sa</td>
		</tr>
		<tr class='days'>"."\n";

// Adjustment of date starting
for($k=1; $k<=$j; $k++){ 
	$adj .="<td class='days'>&nbsp;</td>". "\n";
}

for($i=1;$i<=$no_of_days;$i++){
	echo $adj."<td class='days'>$i"; // This will display the date inside the calendar cell
	echo "</td>","\n";
	$adj='';
	$j ++;
	if($j==7){
		echo "</tr>" . "\n" ."<tr class='days'>" ."\n";
		$j=0;
	}
}
// Fill up the rest of the cells after the end of the days.
for ($i = 0 ; $i < (7 - $j); $i++) {
	echo "<td class='days'></td>" . "\n";
}
echo "</tr></table>";

?>


</body>
</html>

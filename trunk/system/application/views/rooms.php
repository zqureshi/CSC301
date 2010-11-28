<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"	xml:lang="en">
<head>
<link rel="stylesheet" type="text/css" href="/css/layout.css" />
<title>My Calendar</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
</head>
<body>

<script type="text/javascript">
	$(document).ready(function() {
		$('.calendar .day').click(function() {
			year = <?php echo "\"$year\""; ?> ;
			month = <?php echo "\"$month\""; ?> ;
			day = <?php echo "\"$day\""; ?> ;
			day_num = $(this).find('.day_num').html();			
			room = $(this).attr("room");
			slot = $(this).attr("slot");
			temp = "" +year + "/" + month + "/" + day + "/" + room + "/" + slot ;
			//alert("/third/"+temp);
			window.location.replace("/thirdPage/index/" + temp);

		});		
		$('.calendar .day_booked').click(function() {
			year = <?php echo "\"$year\""; ?> ;
			month = <?php echo "\"$month\""; ?> ;
			day = <?php echo "\"$day\""; ?> ;
			day_num = $(this).find('.day_num').html();			
			room = $(this).attr("room");
			slot = $(this).attr("slot");
			temp = "" +year + "/" + month + "/" + day + "/" + room + "/" + slot ;
			//alert("/third/"+temp);
			window.location.replace("/thirdPage/index/" + temp);

		});	
		$('.calendar .day_booked_by_me').click(function() {
			year = <?php echo "\"$year\""; ?> ;
			month = <?php echo "\"$month\""; ?> ;
			day = <?php echo "\"$day\""; ?> ;
			day_num = $(this).find('.day_num').html();			
			room = $(this).attr("room");
			slot = $(this).attr("slot");
			temp = "" +year + "/" + month + "/" + day + "/" + room + "/" + slot ;
			//alert("/third/"+temp);
			window.location.replace("/thirdPage/index/" + temp);

		});	
	});		
</script>
<?php echo $schedule; ?>			

</body>
</html>

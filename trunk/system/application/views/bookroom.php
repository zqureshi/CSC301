<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="stylesheet" href="<?= site_url('css/layout.css') ?>" type="text/css" />
<title>My Calendar</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
</head>
<body>

<?php echo $calendar; ?>	
	
<script type="text/javascript">
	$(document).ready(function() {
		$('.calendar .day').click(function() {
			day_num = $(this).find('.day_num').html();
			<?php 
				echo "var thePage = \"/rooms/index/$year/$month/\";";
			?>
			window.location.replace(thePage + day_num);
		});	
		$('.calendar .day_booked').click(function() {
			day_num = $(this).find('.day_num').html();
			<?php 
				echo "var thePage = \"/rooms/index/$year/$month/\";";
			?>
			window.location.replace(thePage + day_num);
		});	
	});		
</script>
</body>
</html>


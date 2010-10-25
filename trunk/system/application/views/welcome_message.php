<html>
<head>
<title>Online Lab Booing Tool</title>
<link rel="stylesheet" href="<?php echo base_url() ?>css/blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="<?php echo base_url() ?>css/blueprint/print.css" type="text/css" media="print">  
<!--[if lt IE 8]><link rel="stylesheet" href="<?php echo base_url() ?>css/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
</head>
<body>

<h1>Lab Booking Tool</h1>
<div style="text-align: center; margin: 10%;">
<?php
echo form_open('welcome/login');
echo form_label('Username:', 'label_username');
echo form_input('username', '');
echo form_submit('Login', 'Login');
echo form_close();
?>
</div>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Online Lab Booking Tool</title>
<link rel="stylesheet" href="<?= site_url('css/styles.css') ?>" type="text/css" />
<?php $this->load->view('includes') ?>
<link href="../../../css/styles.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
	margin-bottom: 0px;
	text-align: center
}
-->
</style>
</head>
<body>
<div class="centered">
  <div><span class="span-24 prepend-top last"><img src="<?= site_url('img/frame_hor.png') ?>" width=100% height="30"></span></div>
  <div class="span-8 prepend-8 append-8 last"> <img src="<?= site_url('img/logo_cropped.png') ?>" width="298" height="114">

      <?= form_open('login') ?>
      <?= form_label('Username:', 'label_username') ?> 
	  <?= form_input('username', '') ?>
      <br/>
      <?= form_label('Password:', 'label_password') ?>
      <?= form_password('password', '') ?>
      <br/>
      <?= form_submit('Login', 'Login') ?>
      <?= form_close() ?>

  </div>
  <div><span class="span-24 prepend-top last"><img src="<?= site_url('img/frame_hor.png') ?>" width=100% height="30"></span></div>
  <div class="span-24 last" id="footer"> </div>
</div>
</body>
</html>

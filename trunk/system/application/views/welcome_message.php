<html>
<head>
<title>Online Lab Booing Tool</title>
<link rel="stylesheet" href="<?= site_url('css/styles.css') ?>" type="text/css" /> 
<?php $this->load->view('includes') ?>
</head>
<body>
<h1 align="center">


<div class="center">
<div class="container1"><span class="span-24 prepend-top last"><img src="<?= site_url('img/frame_hor.png') ?>" width=100% height="30"></span></div>
<div class="container"><div class="span-24 prepend-top last"><img src="logo_cropped.png" width="298" height="114"></div>

  <div class="span-8 prepend-8 append-8 last">
    <?= form_open('welcome/login') ?>
    <?= form_label('Username:', 'label_username') ?>
    <?= form_input('username', '') ?>
    <br/>
    <?= form_label('Password:', 'label_password') ?>
    <?= form_input('password', '') ?>
    <br/>
    <div class="prepend-2">
      <?= form_submit('Login', 'Login') ?>
    </div>
    <?= form_close() ?>
  </div>
  
 <div class="container1"><span class="span-24 prepend-top last"><img src="frame_hor.png" width=100% height="30"></span></div>

  <div class="span-24 last" id="footer">  </div>
</div>
</div>
</h1>
</body>
</html>

<html>
<head>
<title>Online Lab Booing Tool</title>
<link rel="stylesheet" href="<?= site_url('css/styles.css') ?>" type="text/css" /> 
<?php $this->load->view('includes') ?>
</head>
<body>
<div class="center">
<div><span class="span-24 prepend-top last"><img src="<?= site_url('img/frame_hor.png') ?>" width=100% height="30"></span></div>
<div class="container"><div class="span-8 prepend-6 last"><img src="<?= site_url('img/logo_cropped.png') ?>" width="298" height="114"></div>

  <div class="span-8 prepend-8 append-8 last">
    <?= form_open('welcome/login') ?>
    <?= form_label('Username:', 'label_username') ?>
    <?= form_input('username', '') ?>
    <br/>
    <?= form_label('Password:', 'label_password') ?>
    <?= form_password('password', '') ?>
    <br/>
    <div class="prepend-2">
      <?= form_submit('Login', 'Login') ?>
    </div>
    <?= form_close() ?>
  </div>
  
 <div><span class="span-24 prepend-top last"><img src="<?= site_url('img/frame_hor.png') ?>" width=100% height="30"></span></div>

  <div class="span-24 last" id="footer">  </div>
</div>
</div>
</body>
</html>

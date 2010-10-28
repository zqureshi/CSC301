<html>
<head>
<title>Online Lab Booing Tool</title>
<?php $this->load->view('includes') ?>
</head>
<body>
<div class="container">
  <div class="span-24 prepend-top last">
    <h1>Lab Booking Toolllllll</h1>
    <hr/>
  </div>

  <div class="span-8 prepend-8 append-8 last">
    <?= form_open('welcome/login') ?>
    <?= form_label('Username:', 'label_username') ?>
    <?= form_input('username', '') ?>
    <br/>
    <?= form_label('Password:', 'label_password') ?>
    <?= form_input('password', '') ?>
    <br/>
    <hr class="space"/>
    <div class="prepend-2">
      <?= form_submit('Login', 'Login') ?>
    </div>
    <?= form_close() ?>
  </div>

  <div class="span-24 last" id="footer">
  </div>
</div>
</body>
</html>

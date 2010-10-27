<html>
  <head>
    <title>Reset Password</title>
    <?php $this->load->view('includes') ?>
  </head>

  <body>
    <div class="container">
      <div class="span-24 prepend-top last">
        <h1>Reset Password</h1>
        <hr/>
      </div>

      <div class="span-16 prepend-4 append-4 last">
        <?= form_open("recovery/reset_password/{$hash}") ?>
        <table>
            <td>New Password</td>
            <td><?= form_password('password') ?></td>
          </tr>
          <tr>
            <td>Confirm Password</td>
            <td><?= form_password('password2') ?></td>
          </tr>
        </table>
        <?= form_submit('Reset', 'Reset') ?>
        <?= form_close() ?>
      </div>
    </div>
  </body>
</html>

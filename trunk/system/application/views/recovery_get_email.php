<html>
  <head>
    <title>Add User</title>
    <?php $this->load->view('includes') ?>
  </head>

  <body>
    <div class="container">
      <div class="span-24 prepend-top last">
        <h1>Recover Password</h1>
        <hr/>
      </div>

      <div class="span-16 prepend-4 append-4 last">
        <?= form_open('recovery/send_mail') ?>
        <table>
          <tr>
            <td>E-Mail Address</td>
            <td><?= form_input('email') ?></td>
          </tr>
        </table>
        <?= form_submit('recovery', 'Send Recovery Email') ?>
        <?= form_close() ?>
      </div>
    </div>
  </body>
</html>

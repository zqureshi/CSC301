<html>
  <head>
    <title>Add User</title>
    <?php $this->load->view('includes') ?>
  </head>

  <body>
    <div class="container">
      <div class="span-24 prepend-top last">
        <h1>Add User</h1>
        <hr/>
      </div>

      <?php if(isset($success)): ?>
      <div class="span-24 last">
        <div class="success" style="text-align: center">
          User Successfully Added
        </div>
      </div>
      <?php endif; ?>

      <div class="span-16 prepend-4 append-4 last">
        <?= form_open('/users/add_user') ?>
        <table>
          <?= form_error('first_name') ?>
          <tr>
            <td>First Name</td>
            <td><?= form_input('first_name', set_value('first_name')) ?></td>
          </tr>
          <?= form_error('last_name') ?>
          <tr>
            <td>Last Name</td>
            <td><?= form_input('last_name', set_value('last_name')) ?></td>
          </tr>
          <?= form_error('username') ?>
          <tr>
            <td>Username</td>
            <td><?= form_input('username', set_value('username')) ?></td>
          </tr>
          <?= form_error('email') ?>
          <tr>
            <td>E-Mail Address</td>
            <td><?= form_input('email', set_value('email')) ?></td>
          </tr>
          <?= form_error('password') ?>
          <tr>
            <td>Password</td>
            <td><?= form_password('password', set_value('password')) ?></td>
          </tr>
          <?= form_error('passconf') ?>
          <tr>
            <td>Password (again)</td>
            <td><?= form_password('passconf', set_value('passconf')) ?></td>
          </tr>
          <?= form_error('role') ?>
          <tr>
            <td>Role</td>
            <td>
              <?= form_dropdown('role', 
              array(0 => 'User', 1 => 'Admin'), 
              array(set_value('role', 0))) ?>
            </td>
          </tr>
        </table>
        <?= form_submit('Add', 'Add') ?>
        <?= form_reset('Reset', 'Reset') ?>
        <?= form_close() ?>
      </div>
    </div>
  </body>
</html>

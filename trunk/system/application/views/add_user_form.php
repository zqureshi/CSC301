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

      <!-- CodeIgniter Form Validation Result -->
      <div class="span-24 last">
        <?= validation_errors() ?>
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
          <tr>
            <td>First Name</td>
            <td><?= form_input('first_name', set_value('first_name')) ?></td>
          </tr>
          <tr>
            <td>Last Name</td>
            <td><?= form_input('last_name', set_value('last_name')) ?></td>
          </tr>
          <tr>
            <td>Username</td>
            <td><?= form_input('username', set_value('username')) ?></td>
          </tr>
          <tr>
            <td>E-Mail Address</td>
            <td><?= form_input('email', set_value('email')) ?></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><?= form_password('password', set_value('password')) ?></td>
          </tr>
          <tr>
            <td>Password (again)</td>
            <td><?= form_password('passconf', set_value('passconf')) ?></td>
          </tr>
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
        <?= form_close() ?>
      </div>
    </div>
  </body>
</html>

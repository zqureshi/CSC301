<html>
  <head>
    <title>My Profile</title>
    <?php $this->load->view('includes') ?>
  </head>

  <body>
    <div class="container">
      <div class="span-24 prepend-top last">
        <h1>My Profile</h1>
        <hr/>
      </div>

      <?php if(isset($success)): ?>
      <div class="span-24 last">
        <div class="success" style="text-align: center">
          Profile Successfully Updated
        </div>
      </div>
      <?php endif; ?>

      <div class="span-16 prepend-4 append-4 last">
        <?= form_open('/profile/update') ?>
        <table>
          <tr>
            <td>Username</td>
            <td>
              <?= form_input( array(
                    'value' => $user->username,
                    'disabled' => '',)) ?>
            </td>
          </tr>
          <tr>
            <td>First Name</td>
            <td>
              <?= form_input( array(
                    'value' => $user->first_name,
                    'disabled' => '')) ?>
            </td>
          </tr>
          <tr>
            <td>Last Name</td>
            <td>
              <?= form_input( array(
                    'value' => $user->last_name,
                    'disabled' => '')) ?>
            </td>
          </tr>
          <tr>
            <td>Role</td>
            <td>
              <?= form_input( array(
                    'value' => $role,
                    'disabled' => '')) ?>
            </td>
          </tr>
          <?= form_error('email') ?>
          <tr>
            <td>E-Mail Address</td>
            <td>
              <?= form_input('email', set_value('email', $user->email)) ?>
            </td>
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
        </table>
        <?= form_submit('Update', 'Update') ?>
        <?= form_close() ?>
      </div>
    </div>
  </body>
</html>

<html>
  <head>
    <title>User Management</title>
    <?php $this->load->view('includes') ?>
  </head>

  <body>
    <div class="container">

      <div class="span-24 prepend-top last">
        <h1>User Management</h1>
        <hr/>
      </div>

      <div class="span-20 prepend-4 last">
        <table border="0">
          <tr>
            <td>
              <div class="span-8 info">
                <h3 style="text-align: center">
                  <?= anchor('users/list_users', 'List Users') ?>
                </h3>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="span-8 info last">
                <h3 style="text-align: center">
                  <?= anchor('users/add_user_form', 'Add Users') ?>
                <h3>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="span-8 info last">
                <h3 style="text-align: center">
                  <?= anchor('users/room_time', 'Room and Time settings') ?>
                <h3>
              </div>
            </td>
          </tr>
          <tr>
            <td>
              <div class="span-8 info last">
                <h3 style="text-align: center">
                  <?= anchor('users/variables', 'Booking settings') ?>
                <h3>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </body>
</html>

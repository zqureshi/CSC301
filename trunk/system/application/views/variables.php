<html>
  <head>
    <title>Booking Settings</title>
    <?php $this->load->view('includes') ?>
  </head>

  <body>
    <div class="container">
      <div class="span-24 prepend-top last">
        <h1>Booking Settings</h1>
        <hr/>
      </div>

      <?php if(isset($success)): ?>
      <div class="span-24 last">
        <div class="success" style="text-align: center">
          Booking Settings Successfully Changed
        </div>
      </div>
      <?php endif; ?>

      <div class="span-16 prepend-4 append-4 last">
        <?= form_open('users/update_booking') ?>
        <table>
          <tr>
            <td>Maximum Number of Bookings</td>
            <td><?= form_input('maxBookings', $query->row()->value) ?></td>
          </tr>
          <tr>
            <td>Future Bookings (Year-Month-Day)</td>
            <td><?= form_input('limitDate', $query->next_row()->value) ?></td>
          </tr>
        </table>
        <?= form_submit('Save', 'Update') ?>
        <?= form_close() ?>
      </div>
    </div>
  </body>
</html>
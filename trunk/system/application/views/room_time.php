<html>
  <head>
    <title>Rooms and Times Settings</title>
    <?php $this->load->view('includes') ?>
  </head>

  <body>
    <div class="container">
      <div class="span-24 prepend-top last">
        <h1>Rooms and Times Settings</h1>
        <hr/>
      </div>

      <?php if(isset($success)): ?>
      <div class="span-24 last">
        <div class="success" style="text-align: center">
          Rooms and Times Settings Successfully Changed
        </div>
      </div>
      <?php endif; ?>
      <div class="span-16 prepend-4 append-4 last">
	<table>
        <?= form_open('users/update_time') ?> 
	  <?= foreach ($query as $row): ?>
          <tr>
            <td>Time:</td>
	    <td><?= form_input($row->tID, 'hello') ?></td>
	  </tr>
	  <?= endforeach; ?>
	<?= form_submit('Save', 'Update') ?>
        <?= form_close() ?> 
        </table>
      </div>
    </div>
  </body>
</html>

<html>
  <head>
    <title>Database Settings</title>
    <?php $this->load->view('includes') ?>
  </head>

  <body>
    <div class="container">
      <div class="span-24 prepend-top last">
        <h1>Change database settings</h1>
        <hr/>
      </div>
      <div class="span-16 prepend-4 append-4 last">
        <?= form_open('settings/update_time') ?>
	<table>
	  <?= foreach ($query->row() as $row): ?>
          <tr>
            <td>Time:</td>
	    <td><?= form_input($row->tID, $row->name) ?></td>
	  </tr>
	  <?= endforeach; ?>
	<?= form_submit('Update', 'Update') ?>
        <?= form_close() ?>
        </table>
      </div>
    </div>
  </body>
</html>

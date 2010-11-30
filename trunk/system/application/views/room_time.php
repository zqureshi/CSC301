<html>
  <head>
    <title>Rooms and Times Settings</title>
    <?php $this->load->view('includes') ?>
    <!--Javascript to delete a user-->
    <script type="text/javascript">
      $(document).ready(function(){
        $('a.deltime').click(function(event){
          if(confirm('Delete selected time?')){
            user = $(this).attr('user');
            $.get('<?= site_url('/users/del_time') ?>/' + user);
            $(this).parents('tr').addClass('error').hide(1000);
          }
        });
      });
      $(document).ready(function(){
        $('a.delroom').click(function(event){
          if(confirm('Delete selected room?')){
            user = $(this).attr('user');
            $.get('<?= site_url('/users/del_room') ?>/' + user);
            $(this).parents('tr').addClass('error').hide(1000);
          }
        });
      });
    </script>
  </head>

  <body>
    <div class="container">
      <div class="span-24 prepend-top last">
        <h1>Rooms and Times Settings</h1>
        <hr/>
      </div>

      <div class="span-24 last">
        <?php if($success=='time'){ ?>
          <div class="success" style="text-align: center">
            Times Settings Successfully Changed
          </div>
        <?php }else if($success=='room'){ ?> 
          <div class="success" style="text-align: center">
            Room Settings Successfully Changed
          </div>
        <?php } ?>
      </div>

      <!-- Display the table to edit time settings. -->
      <div class="span-16 prepend-4 append-4 last">
      <?= form_open('users/update_time') ?>
        <table>
          <tr>
            <p>Time Settings</p>
          </tr>
          <?php $counter=1; ?>
          <?php foreach($time as $row): ?>
            <tr>
              <td><?= $counter ?><?php $counter=$counter+1; ?></td>
              <td><?php $id=$row->tID; ?><?= form_input($id, $row->name) ?></td>
              <td>
                <a class="deltime" user="<?= $id ?>">
                  <img src="<?= site_url('/img/delete-icon.png') ?>">
                </a>
              </td>
            </tr>
          <?php endforeach;?>
          <tr>
            <td><?= form_submit('Save', 'Update') ?></td>
            <td><?= form_close() ?></td>
            <td></td>
          </tr>
          <?= form_open('users/add_time') ?>
            <tr>
              <td>New Time:</td>
              <td><?= form_input('new_time') ?></td>
              <td><?= form_submit('Add', 'Add') ?></td>
            </tr>
          <?= form_close() ?>
        </table>
      </div>

      <!-- Display the table to edit room settings. -->
      <div class="span-16 prepend-4 append-4 last">
      <?= form_open('users/update_room') ?>
        <table>
          <tr>
            <p>Room Settings</p>
          </tr>
          <?php $counter=1; ?>
          <?php foreach($room as $row): ?>
            <tr>
              <td><?= $counter ?><?php $counter=$counter+1; ?></td>
              <td><?php $id=$row->rID; ?><?= form_input($id, $row->name) ?></td>
              <td>
                <a class="delroom" user="<?= $id ?>">
                  <img src="<?= site_url('/img/delete-icon.png') ?>">
                </a>
              </td>
            </tr>
          <?php endforeach;?>
          <tr>
            <td><?= form_submit('Save', 'Update') ?></td>
            <td><?= form_close() ?></td>
            <td></td>
          </tr>
          <?= form_open('users/add_room') ?>
            <tr>
              <td>New Room:</td>
              <td><?= form_input('new_room') ?></td>
              <td><?= form_submit('Add', 'Add') ?></td>
            </tr>
          <?= form_close() ?>
        </table>
      </div>
    </div>
  </body>
</html>
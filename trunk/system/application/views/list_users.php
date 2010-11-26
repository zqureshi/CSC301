<html>
  <head>
    <title>Listing Users</title>
    <?php $this->load->view('includes') ?>
    <script type="text/javascript">
      $(document).ready(function(){
        $('a.deluser').click(function(event){
          if(confirm('Delete selected user?')){
            user = $(this).attr('user');
            $.get('<?= site_url('/users/del_user') ?>/' + user);
            $(this).parents('tr').addClass('error').hide(1000);
          }
        });
      });
    </script>
  </head>

  <body>
  <div class="container">
    <div class="span-24 prepend-top last">
      <h1>Listing Users</h1>
      <hr>
    </div>

    <div class="span-24 last">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Role</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-Mail</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($query as $row): ?>
          <tr id="row:<?= $row->id ?>">
            <td><?= $row->id ?></td>
            <td><?= ($row->admin == 1) ? 'Admin' : 'User' ?></td>
            <td><?= $row->username ?></td>
            <td><?= $row->first_name ?></td>
            <td><?= $row->last_name ?></td>
            <td><?= $row->email ?></td>
            <td>
              <a class="deluser" user="<?= $row->id ?>">
                <?= img('/img/delete-icon.png') ?>
              </a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
  </div>
  </body>
</html>

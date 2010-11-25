<html>
  <head>
    <title>Listing Users</title>
    <?php $this->load->view('includes') ?>
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
          <tr>
            <td><?= $row->id ?></td>
            <td><?= ($row->admin == 1) ? 'Admin' : 'User' ?>
            <td><?= $row->username ?></td>
            <td><?= $row->first_name ?></td>
            <td><?= $row->last_name ?></td>
            <td><?= $row->email ?></td>
            <td><?= anchor('/users/del_user/'.$row->id, img('/img/delete-icon.png')) ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
  </div>
  </body>
</html>

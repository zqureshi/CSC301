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
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>E-Mail</th>
        </tr>
        <?php foreach($query as $row): ?>
        <tr>
          <td><?= $row->id ?></td>
          <td><?= $row->first_name ?></td>
          <td><?= $row->last_name ?></td>
          <td><?= $row->email ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
  </div>
  </body>
</html>

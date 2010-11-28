<html>
<head>
<link rel="stylesheet" href="<?= site_url('css/styles.css') ?>" type="text/css" />
</head>
<body>
<!-- Top Panel -->
<div align="right">
  <?php 
if($is_admin == TRUE)
{
  echo anchor('users','Settings'), " | ";
}
?>
  <?= anchor('/profile', 'Profile') ?>
  | 
  Logged in as
  <?=$id?>
  |
  <?=anchor('login/logout','Log out');?>
</div>
<HR>
<!-- Side Panel -->
<span class="side">
<table width="295" border="0">
  <tr>
    <td height="117" colspan="2"><a href="/bookroom"><img src="<?= site_url('img/logo_cropped.png')?>" width="288" height="108" border="0" /></a></td>
  </tr>
  <tr>
    <td colspan="2"><p class="center">Your Current Bookings</p></td>
  </tr>
  <tr>
    <td width="20"></td>
    <td width="265"><p class="center">
        <?php foreach($query as $row): ?>
        <?= $link = "<br \n>";
                $link = "/thirdPage/index/";
                $link .= date_format(date_create($row->Date), "Y/m/d") ;
                $link .= "/$row->rID/$row->tID";
                $temp1 = date_format(date_create($row->Date), "M j, Y") ;
		        $temp2 = $this->rooms_model->get_slot_name($row->tID) ; ?>
      <li>
        <?= anchor($link, $temp1 .' : '. $temp2); ?>
      </li>
      <?php endforeach;?>
      </p>
    </td>
  </tr>
</table>
</span>
</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Current Bookings</title>
<link href="../../../css/styles.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table width="295" border="0">
  <tr>
    <td height="117" colspan="2"><a href="/bookroom"><img src="<?= site_url('img/logo_cropped.png')?>" width="288" height="108" border="0" /></a></td>
  </tr>
  <tr>
    <td colspan="2"><p class="center">Your Current Bookings</p>      </td>
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
          <?= anchor($link, $temp1 .' : '. $temp2,'target="mainFrame"'); ?>
        </li>
      
      <?php endforeach;?>
      </p>
    </td>
  </tr>
</table>
</body>
</html>


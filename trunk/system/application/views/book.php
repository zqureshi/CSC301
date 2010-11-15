<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>My Calendar</title>
<link rel="stylesheet" href="<?= site_url('css/styles.css') ?>" type="text/css" />
<?php $this->load->view('includes') ?>
<link href="../../../css/styles.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
	margin-bottom: 0px;
	text-align: center
}
-->
</style>
</head>

<frameset rows="52,*" cols="*" frameborder="no" border="0" framespacing="0">
  <frameset rows="64*,268*" cols="596">
    <frame src="top_frame.php" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="top_frame" />
  
  <frameset rows="*" cols="301,*" framespacing="0" frameborder="no" border="0">
    <frame src="side_frame.php" name="leftFrame" scrolling="No" noresize="noresize" id="leftFrame" title="side_frame" />
    <frame src="bookroom.php" name="mainFrame" id="mainFrame" title="My Calendar" />
  </frameset>
</frameset>
<noframes><body>
</body>
</noframes></html>
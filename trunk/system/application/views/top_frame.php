<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LaBook</title>
</head>

<body>
<div align="right"> 
<?php 
if($is_admin == TRUE)
{
  echo anchor('users','Settings'), " | ";
}
?> 
<?= anchor('/profile', 'Profile') ?> | 
Logged in as <?=$id?> | 
<?=anchor('login/logout','Log out');?></div>
<HR>
</body>

</html>

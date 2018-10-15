<?php
$con = mysql_connect("localhost", "root", "admin");
if (!$con)
  {
	die('Could not connect: ' . mysql_error());
  }
$db_selected = mysql_select_db("sistema_uneb",$con);

?>
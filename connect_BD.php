
<?php
	$host = "localhost";
	$db   = "sistema_uneb";
	$user = "root";
	$pass = "admin";
	
	// conecta ao banco de dados
    $con = mysql_pconnect($host, $user, $pass) or trigger_error(mysql_error(),E_USER_ERROR); 
    // seleciona a base de dados em que vamos trabalhar
    mysql_select_db($db, $con);

?>
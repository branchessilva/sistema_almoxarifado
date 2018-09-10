
<?php
	$host = "localhost";
	$db   = "sistema_uneb";
	$user = "root";
	$pass = "admin";
	
	$mysqli = new mysqli($host, $user, $pass, $db);
	if ($mysqli->connect_errno) {
		echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}

?>
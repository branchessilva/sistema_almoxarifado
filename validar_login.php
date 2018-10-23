	<?php
		// Inicia sessões 
		session_start();
		//Conexão com o BD
		include "connect_BD.php";
		require "connect_BD.php";
		
		/*Constantes para saber o perfil*/
		define("AUTORIZADO", 1);
		define("COMUM", 2);
		define("ALMOXARIFADO", 3);
		
		/*Parte do LDAP*/
		$user = (int) $_POST["matricula"]; 
		$pass = $_POST["password"];

		$g_ldap_server = 'autenticacaoad.uneb.br';
		//$g_ldap_server = 'ldap://autenticacaoad.uneb.br/';
		$g_ldap_port = 389;
		$ds= @ldap_connect($g_ldap_server)or die("Erro na conexao do LDAP!");
		if (!($bind = @ldap_bind($ds, $_POST["matricula"]."@uneb.br", $_POST["password"]))) { /*Se exitir problemas com a autenticação do login*/
		
			echo "<div class='alert alert-danger' role='alert'>USUÁRIO OU SENHA INCORRETOS, você está sendo recirecionado!</div> ";
			echo "<meta http-equiv=refresh content='3;URL=login.php'>";
			
		} else {
			
			/*Pesquisar o perfil do usuario para direcionar a sua página inicial*/
			$consulta_perfil = "SELECT P.cod_perfil FROM perfil AS P INNER JOIN usuario AS U ON P.cod_perfil=U.fk_Perfil WHERE U.matricula='$user'";
			$connect_perfil = mysql_query($consulta_perfil, $con) or die(mysqli_error());
			$dado = mysql_fetch_assoc($connect_perfil);
			
			if($dado['cod_perfil'] == AUTORIZADO)
			{
                session_start();
				$_SESSION["matricula"] = $_POST["matricula"];
				header('Location: ./AUTORIZADO/acompanhar_Pedido_Autorizador.php');
			}else if($dado['cod_perfil'] == COMUM)
			{
				session_start();
				$_SESSION["matricula"] = $_POST["matricula"];
				echo $_SESSION["matricula"];
				header('Location: ./COMUM/fazer_Pedido.php');
			}else if($dado['cod_perfil'] == ALMOXARIFADO)
			{
                				session_start();
				$_SESSION["matricula"] = $_POST["matricula"];
				echo $_SESSION["matricula"];
				header('Location: ./ALMOXARIFADO/fazer_Pedido_Almoxarifado.php');
			}
			
		}
		
	?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		<link rel="stylesheet"  href="./css_formato_Campos_cadastro.css" />
		
	</head>
</html> 
<body> 
</body>

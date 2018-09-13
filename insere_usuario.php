<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SISTEMA ALMOXARIFADO - LOGIN</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet"  href="./css_formato_Campos_cadastro.css" />
</head>
<body>
	<?php
		include "connect_BD.php";
		require "connect_BD.php";
		
		$nome = $_POST["nome"]; 
		$matricula = $_POST["matricula"];
		$cod_setor = (int)$_POST['opc_setor'];
		$cod_perfil = (int)$_POST['opc_perfil'];
		echo $cod_perfil;
		echo $cod_setor;
		
		$insere_usuario= "INSERT INTO usuario (matricula, nome, fk_Setor, fk_Perfil) VALUES";
		$insere_usuario .= "('$matricula', '$nome', '$cod_setor', '$cod_perfil')";
		
		$connect_usuario = mysqli_query($mysqli, $insere_usuario);

		if($connect_usuario){ 
			echo "<div class='alert alert-success' role='alert'>Registro INSERIDO com sucesso, AGUARDE VOCÊ ESTÁ SENDO REDIRECIONADO...</div> ";
			echo "<meta http-equiv=refresh content='5;URL=cadastro_usuario.php'>";
		} else {
			echo "<div class='alert alert-danger' role='alert'>Registro NÃO INSERIDO, AGUARDE VOCÊ ESTÁ SENDO REDIRECIONADO ...</div> ";
			echo "<meta http-equiv=refresh content='5;URL=login.php'>";
		}

	?> 
</body>	
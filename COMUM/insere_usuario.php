<?php 
	include "verifica.php";
	require "verifica.php";
	
	include "connect_BD.php";
	require "connect_BD.php";
    
    $nome = $_POST["nome"];
    $matricula = $_POST["matricula"];
    $perfil = $_POST["opc_perfil"];
    $setor = $_POST["opc_setor"];
    echo $perfil;
    echo $matricula;
?>	

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SISTEMA ALMOXARIFADO</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet"  href="./css_formato_Campos_cadastro.css" />
</head>
<body>
	<?php
        $insere_usuario = "INSERT INTO usuario (matricula, nome, fk_Setor, fk_Perfil) VALUES ($matricula, '$nome', $setor, $perfil)";
		//$atualiza_usuario = "UPDATE usuario SET matricula = $matricula, nome = $nome, fk_Setor = $setor, fk_Perfil = $perfil WHERE matricula = $matricula";
		$result = mysql_query($insere_usuario, $con);
		if(!$result)
		{
            echo"<script type='text/javascript'>alert('Usuario inserido com sucesso!');window.location.href='cadastro_usuario.php';</script>";
		}else
        {
            echo"<script type='text/javascript'>alert('Usuario inserido com sucesso!');window.location.href='cadastro_usuario.php';</script>";
        }

	?> 
</body>	
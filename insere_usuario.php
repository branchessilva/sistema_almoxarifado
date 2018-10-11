<?php 
	include "verifica.php";
	require "verifica.php";
	
	include "connect_Fazer_Pedido.php";
	require "connect_Fazer_Pedido.php";
    
    $nome = $_POST["nome"];
    $matricula = $_POST["matricula"];
    $perfil = $_POST["opc_perfil"];
    $setor = $_POST["opc_setor"];

?>	

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
		$atualiza_usuario = "UPDATE usuario SET matricula = $matricula, nome = $nome, fk_Setor = $setor, fk_Perfil = $perfil WHERE matricula = $matricula";
		$result = mysql_query($atualiza_usuario,$con);
		if(!$result)
		{
			echo "<div class='alert alert-danger' role='alert'>Erro ao realizar pedido, você está sendo recirecionado!</div> ";
					//echo "<meta http-equiv=refresh content='3;URL=login.php'>";
		}else
        {
            echo"<script type='text/javascript'>alert('Pedido realizado com sucesso!');window.location.href='fazer_Pedido.php';</script>";
        }

	?> 
</body>	
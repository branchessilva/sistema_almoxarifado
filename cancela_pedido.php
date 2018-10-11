<?php 
	include "verifica.php";
	require "verifica.php";
	
	include "connect_BD.php";
	require "connect_BD.php";
    /*Pega o codigo do pedido da tabela correspondente a linha clicada*/
    $PegaPedido = $_GET['Pedido'];
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
		$altera_pedido = "UPDATE pedido SET fk_Estado = 4 WHERE cod_pedido = $PegaPedido";
		$result = mysql_query($altera_pedido, $con) or die(mysql_error());
        if($result)
        {
            echo"<script type='text/javascript'>alert('Pedido cancelado com sucesso!');window.location.href='acompanhar_Pedido.php';</script>";
        }

	?> 
</body>	
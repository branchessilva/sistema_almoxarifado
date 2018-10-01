<?php 
	include "verifica.php";
	require "verifica.php";
	
	include "connect_Fazer_Pedido.php";
	require "connect_Fazer_Pedido.php";
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
		$matricula = $_SESSION["matricula"];
		
		date_default_timezone_set('America/Sao_Paulo');
		//Pegue a data no formato dd/mm/yyyy
		$data = date("d/m/Y");
		//Pega a hora
		$hora = date('H:i:s');

		//Exploda a data para entrar no formato aceito pelo DB.
		$dataAtual = explode('/', $data);
		$dataFormatada = $dataAtual[2].'/'.$dataAtual[1].'/'.$dataAtual[0];
		$insere_pedido = "INSERT INTO pedido(solicitante, data_Pedido, fk_Estado, hora) VALUES ($matricula,'$dataFormatada', 2, '$hora')";
		$result = mysql_query($insere_pedido,$con);
		$id_Pedido = mysql_insert_id();
		if(isset($_SESSION['item']) && isset($_SESSION['quantidade'])) {
			$i= 0;
			$j= 0;
			foreach($_SESSION['quantidade'] as $quant) {
				$quantidade[$i] = $quant;
				$i++;
			}
			foreach($_SESSION['item'] as $item)
			{
				$produto[$j] = $item;
				$j++;
			}
			for( $x=0; $x < $i; $x++)
			{
                echo $quantidade[$x],$produto[$x];
                echo $id_Pedido;
				//O @ esconde os warnings
				$insere_item_pedido = "INSERT INTO pedido_item (fk_Pedido, fk_Item, quantidade_Solicitada) VALUES ($id_Pedido,'$produto[$x]','$quantidade[$x]')";
				$result = mysql_query($insere_item_pedido,$con);
				if($result)
				{
					echo "<div class='alert alert-danger' role='alert'>Erro ao realizar pedido, você está sendo recirecionado!</div> ";
					//echo "<meta http-equiv=refresh content='3;URL=login.php'>";
				}
			}
		}
	?> 
</body>	
<?php 
	include "verifica.php";
	require "verifica.php";
	
	include "connect_BD.php";
	require "connect_BD.php";
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
		/*$pesquisa_solicitante = "SELECT nome FROM usuario WHERE matricula = $matricula";
		$result = mysqli_query($mysqli,$pesquisa_solicitante) or die("Erro ao buscar registro");
		while($pesquisa = mysqli_fetch_object($result))
		{
			$solucitante = $pesquisa->nome;
		}*/
		$data = date("d/m/Y");
		$dataAtual = str_replace("/", "-", $data);
		$pegaData = date('Y-m-d', strtotime($dataAtual));
		echo $pegaData;
		//Exploda a data para entrar no formato aceito pelo DB.
		//$dataAt = explode('/', $data);
		//$dataNoFormatoParaOBranco = $dataAt[2].'-'.$dataAt[1].'-'.$dataAt[0];
		
		$insere_pedido = "INSERT INTO pedido(solicitante, data_Pedido, fk_Estado) VALUES ($matricula, $pegaData, 2)";
		mysqli_query($mysqli,$insere_pedido) or die("Erro ao tentar cadastrar registro");
		
		if(isset($_POST["itens"])) {
			echo "Os campos que você adicionou são:<br><br>";
			echo $_SESSION["matricula"];
			// Faz loop pelo array dos campos:
			foreach($_POST["quantidade"] as $campo) {
				echo $campo."<br>";
			}
			foreach($_POST["itens"] as $item)
			{
				echo $item."<br>";
			}
		}else{
			echo "Você não adicionou dados em nenhum campo!";
		}

	?> 
</body>	
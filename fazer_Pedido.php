<?php 
	include "verifica.php";
	require "verifica.php";
	
	include "connect_BD.php";
	require "connect_BD.php";
	
	/*Pegar dados do setor no BD */
	$consulta_setor = "SELECT S.nome, S.cod_setor FROM setor AS S INNER JOIN usuario AS U ON S.cod_setor=U.fk_Perfil WHERE U.matricula='$_SESSION[matricula]'";
	$connect_setor = mysqli_query($mysqli, $consulta_setor ) or die(mysqli_error($mysqli));
?>

<!DOCTYPE html>
<html>
<head>
<title>SISTEMA ALMOXARIFADO - FAZER PEDIDO</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--Para deixar a div responsiva-->
<!-- O ERRO PODE ACONTECER AQUI DEPOIS POR CONTA DON ENDEREÇO DO LINK -->
<link rel="stylesheet"  type="text/css"  href="./divResponsiva.css" />
<link rel="stylesheet"  type="text/css"  href="./formularioResponsivo.css" />
<link rel="stylesheet"  type="text/css"  href="./css_NavBar.css" />

<!-- JavaScript -->
<script type="text/javascript" src="javaScript_uneb.js" /></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

	<div class="topnav" id="myTopnav">
	  <a href="#home" class="active">Home</a>
	  <a href="#news">Acompanhar pedidos</a>
	  <a href="login.php">Sair</a>
	  <a href="javascript:void(0);" class="icon" onclick="cria_Botao_NavBar();">
		<i class="fa fa-bars"></i>
	  </a>
	</div>

	<div class="container">
		<div class="box">
			<div class="pgContato"> 
				<legend align="center"> <font size='5' color='#FFFFFF'> Solicita&ccedil;&atilde;o de Material </font> </legend>
				<div class="divFormulario">  
					<div class="formPedido">  
						<form id="formPedido" action="insere_pedido.php" method="POST">
							<p>
								<font size="4" color="#FFFFFF">Unidade requisitante:</font>
							</p>
							<?php 
									while($dado = $connect_setor->fetch_array()) { ?>
									<input disabled type="text" name="nome" value="<?php echo $dado['nome'];?>"/>
									<input disabled type="text" name="nome" value="<?php echo $dado['cod_setor'];?>"/>
							<?php } ?>
							</br> </br>
							<div border="1">
							</div>
							<div id="campoPai"></div>
							<input type="button" value="Adicionar campos" onclick="addCampos()">
							<br><br><input type="submit" value="Solicitar">
						<form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

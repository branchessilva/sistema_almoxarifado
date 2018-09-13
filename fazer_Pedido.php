<?php 
	if(!isset($_SESSION["matricula"]))
	{
		header('HTTP/1.0 403 Forbidden');
		header("location:login.php");
		exit();
	}
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
	  <a href="login.html">Sair</a>
	  <a href="javascript:void(0);" class="icon" onclick="cria_Botao_NavBar();">
		<i class="fa fa-bars"></i>
	  </a>
	</div>

	<div class="container">
		<div class="box">
			<div class="pgContato"> 
				<legend align="center"> <font size='5' color='#FFFFFF'> Solicitacao de Material </font> </legend>
				<div class="divFormulario">  
					<div class="formPedido">  
						<form id="formPedido" action="" method="GET">
							<p>
								<font size="4" color="#FFFFFF">Unidade requisitante:</font>
							</p>
							<select id="country" name="country">
								<option value="australia">DCET</option>
								<option value="canada">COLEGIADO</option>
								<option value="usa">...</option>
							</select>
							<p>
								<font size="4" color="#FFFFFF">C&oacute;digo do setor:</font>
							</p>
							<input type="text" id="numero" name="numero" placeholder="N&uacute;mero..." onkeypress='return SomenteNumero(event)' disable />
							<div id="campoPai"></div>
							<input type="button" value="Adicionar item" onClick="addCampos();">
							<br><br><input type="submit" value="Solicitar">
						<form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

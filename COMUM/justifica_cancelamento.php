<?php 
	include "verifica.php";
	require "verifica.php";
	
	include "connect_BD.php";
	require "connect_BD.php";
    
    /*Pega o codigo do pedido da tabela correspondente a linha clicada*/
    $PegaPedido = $_GET['Pedido'];
    $_SESSION["num_pedido"]=$PegaPedido;

?>

<!DOCTYPE html>
<html>
<head>
<title>SISTEMA ALMOXARIFADO</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<!--Para deixar a div responsiva-->
<!-- O ERRO PODE ACONTECER AQUI DEPOIS POR CONTA DON ENDEREÇO DO LINK -->
<link rel="stylesheet"  type="text/css"  href="../css/divResponsiva.css" />
<link rel="stylesheet"  type="text/css"  href="../css/formularioResponsivo.css" />
<link rel="stylesheet"  type="text/css"  href="../css/css_NavBar.css" />
 
<!-- JavaScript -->
<script type="text/javascript" src="../js/javaScript_uneb.js" /></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Usando jquery para os campos dinamicos de add itens-->
<script src="jquery-1.11.3.js" type="text/javascript"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<!-- BOOtstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
<!-- BOOTSTRAP PARA COLOCAR FILTRO NA TABELA E MUDAR A LETRA -->    
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<div class="topnav " id="myTopnav">
          <a href="#home" class="active"><font size="3">HOME</font></a>
          <a href="acompanhar_Pedido.php"><font size="3">ACOMPANHAR PEDIDO</font></a>
          <a href="fazer_Pedido.php"><font size="3">FAZER PEDIDO</font></a>
          <a href="pedidos_cancelados.php"><font size="3">PEDIDOS CANCELADOS</font></a>
          <a href="../login.php"><font size="3">SAIR</font></a>
          <a href="javascript:void(0);" class="icon" onclick="cria_Botao_NavBar();">
           <i class="fa fa-bars"></i>
	      </a>
	</div>

	<div class="container">
		<div class="box">
			<div class="pgContato">
                        <center>
                        <font size='5' color='#FFFFFF'> 
                        QUAL O MOTIVO DO CANCELAMENTO?
                        </font></center></br> </br>
				<div class="divFormulario">  
					<div class="formPedido">  
						<form id="formPedido" action="cancela_pedido.php" method="POST">
                            <div id="div_pedidos">
                                <textarea required="required" rows="4" cols="100" name="justificativa" maxlength=200 placeholder="Justificativa..."></textarea>
                                <button type="submit" id="BotaoSubmit" class="btn btn-primary">Corfirmar cancelamento</button>
                            </div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

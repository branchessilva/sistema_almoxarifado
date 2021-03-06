<?php
	include "verifica.php";
	require "verifica.php";
	
	include "connect_BD.php";
	require "connect_BD.php";
	$condicaoData = date('Y-m-d', strtotime("-3 days"));
	$matricula = $_SESSION["matricula"];
	$contulta_pedido = "SELECT P.cod_pedido, P.data_Pedido, P.hora, E.nome FROM pedido as P INNER JOIN estado as E ON (P.solicitante = $matricula AND P.fk_Estado = E.cod_Estado) where P.data_Pedido >= $condicaoData ORDER BY P.data_Pedido DESC";
	$connect_pedido = mysqli_query($mysqli, $contulta_pedido ) or die(mysqli_error($mysqli));
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
</head>

<body onload="carregarTabelas()">

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
		
		<!-- Link para tabela e php: https://pt.stackoverflow.com/questions/38845/popular-tabela-com-dados-tabela-html ou
		http://respostas.guj.com.br/26109-preencher-tabela-html -->
		
	<div class="containerTable">
		<div class="boxtable">
			<div class=""> 
				<div class="">  
					<div> 
                        <div class="table-responsive">
                              <legend align="center"> <font size='5' color='000'> PEDIDOS REALIZADOS </font> </legend> <br><br>
                            <h2></h2>
                            <table id="tabela">
                                <thead>
                                    <th>Estado do pedido</th>
                                    <th>Data e hora do pedido realizado</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                         </div>
						</div>
					</div>
				</div>
			</div>
        </div>
		
	</body>
</html>
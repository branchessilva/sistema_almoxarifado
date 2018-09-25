<?php
	include "verifica.php";
	require "verifica.php";
	
	include "connect_BD.php";
	require "connect_BD.php";
	
	$matricula = $_SESSION["matricula"];
	$contulta_pedido = "SELECT P.cod_pedido, P.data_Pedido, E.nome FROM pedido as P INNER JOIN estado as E ON (P.solicitante = $matricula AND P.fk_Estado = E.cod_Estado)";
	$connect_pedido = mysqli_query($mysqli, $contulta_pedido ) or die(mysqli_error($mysqli));
?>
<!DOCTYPE html>
<html>
<head>
<title>SISTEMA ALMOXARIFADO - FAZER PEDIDO</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--Para deixar a div responsiva-->
<!-- O ERRO PODE ACONTECER AQUI DEPOIS POR CONTA DON ENDEREÇO DO LINK -->
<link rel="stylesheet" href="./divResponsiva.css" />
<link rel="stylesheet"  href="./acomp_Pedido.css" />
<link rel="stylesheet"  href="./css_NavBar.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- JavaScript -->
<script type="text/javascript" src="./javaScript_uneb.js"></script>

<!-- Tabela-->
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
	<body>

		<div class="topnav" id="myTopnav">
		  <a href="#home" class="active">Home</a>
		  <a href="fazer_Pedido.php">Fazer pedido</a>
		  <a href="login.html">Sair</a>
		  <a href="javascript:void(0);" class="icon" onclick="cria_Botao_NavBar();">
			<i class="fa fa-bars"></i>
		  </a>
		</div>
		
		<!-- Link para tabela e php: https://pt.stackoverflow.com/questions/38845/popular-tabela-com-dados-tabela-html ou
		http://respostas.guj.com.br/26109-preencher-tabela-html -->
		
		<div class="container">
			<div class="box">
				<div class=""> 
					<legend align="center"> <font size='5' color=''> Pedidos Pendentes </font> </legend> <br><br>
					<div class="divFormulario">  
						<div class="formPedido">  
							<div class="table-responsive">
							  <table class="table table-bordered">
								  <thead>
									<tr>
									  <th scope="col">Numero</th>
									  <th scope="col">Data</th>
									  <th scope="col">Estado</th>
									</tr>
								  </thead>
								  <tbody>
										
								       <?php 											
											while($dado = $connect_pedido->fetch_array()) { 
												$estado = $dado['nome'];
												echo $estado;
												switch ($estado)
												{
													case "Cancelado":
														$cor="#F08080";
														break;
													case "Aprovado":
														$cor="#90EE90";
														break;
													default:
														$cor="#EEDD82";
														break;
												}
												?>
												<tr bgcolor=<?=$cor?>>
												  <td id="codigo_pedido"><?=$dado['cod_pedido']?></th>
												  <td><?=$dado['data_Pedido']?></td>
												  <td><?=$estado?></td>
												  <td><button type="button" onclick="pegaPedido()" class="btn btn-success">Visualizar itens</button></td>
												</tr>
									   <?php } ?>
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
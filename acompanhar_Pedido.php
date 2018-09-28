<?php
	include "verifica.php";
	require "verifica.php";
	
	include "connect_BD.php";
	require "connect_BD.php";
	
	$matricula = $_SESSION["matricula"];
	$contulta_pedido = "SELECT P.cod_pedido, P.data_Pedido, P.hora, E.nome FROM pedido as P INNER JOIN estado as E ON (P.solicitante = $matricula AND P.fk_Estado = E.cod_Estado)";
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
							  <table class="table table-bordered" align="center">
								  <thead>
									<tr>
									  <th scope="col"><font size="3"><center>Identificao do pedido</center></font></th>
									  <th scope="col"><font size="3"><center>Data</center></font></th>
									  <th scope="col"><font size="3"><center>Estado</center></font></th>
                                      <th scope="col"><font size="3"><center>Acoes</center></font></th>
									</tr>
								  </thead>
								  <tbody>
										
								       <?php 											
											while($dado = $connect_pedido->fetch_array()) { 
												$estado = $dado['nome'];
                                                $codigo_pedido = $dado['cod_pedido'];
												switch ($estado)
												{
													case "Cancelado":
                                                        $botao="<button type='button' class='btn btn-danger'>Cancelado</button>";
														break;
													case "Aprovado":
														$botao="<button type='button' class='btn btn-success'>Aprovado</button>";
														break;
													default:
														$botao="<button type='button' class='btn btn-warning'>Pendente</button>";
														break;
												}
												?>
												<tr>
												  <td style="width:100px"><font size="3"><center><?=$codigo_pedido?></center></font></th>
												  <td style="width:200px"><font size="3"><center><?=$dado['data_Pedido']?> - <?=$dado['hora']?></center></font></td>
												  <td style="width:50px"><font size="3"><center><?=$botao?></center></font></td>
                                                  <td style="width:300px"><form method="POST"  action="editar_Pedido.php">
                                                        <div class="btn-group" role="group" aria-label="Exemplo básico">
                                                          <input type="hidden" name="id" value='<?=$codigo_pedido?>' />
                                                          <button type="button" class="btn btn-primary">Visualizar itens</button>
                                                            <?php 
                                                                if($estado!="Aprovado" && $estado!="Cancelado")
                                                                {?>
                                                                    <button type="submit" class="btn btn-primary">Editar pedido</button>
                                                                    <button type="submit" class="btn btn-primary">Cancelar pedido</button>
                                                          <?php } ?>
                                                        </div>
                                                      </form>
                                                  </td>
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
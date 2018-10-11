<?php
	include "verifica.php";
	require "verifica.php";
	
	include "connect_BD.php";
	require "connect_BD.php";
	$matricula = $_SESSION["matricula"];

    $consulta_motivo = "SELECT PC.motivo FROM pedido as P INNER JOIN pedido_cancelado AS PC ON (P.fk_pedido_cancelado = PC.cod_pedido_cancelado)";
    //$connect_pedido_cancelado = mysql_query($consulta_motivo, $con) or die(mysql_query());

	$contulta_pedido_cancelado = "SELECT P.cod_pedido, P.data_Pedido, P.hora, E.nome, E.cod_estado FROM pedido as P INNER JOIN estado as E ON (P.solicitante = $matricula AND P.fk_Estado = E.cod_Estado) WHERE (E.cod_estado=4 OR E.cod_estado=3) ORDER BY P.data_Pedido DESC";

	$connect_pedido = mysql_query($contulta_pedido_cancelado, $con) or die(mysql_query());
    $total = mysql_num_rows($connect_pedido); // Total de itens retornados
    if($total == 0)
    {
         echo"<script type='text/javascript'>alert('Nenhum pededido foi cancelado!');window.location.href='acompanhar_Pedido.php';</script>";
    }
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
<link rel="stylesheet"  type="text/css"  href="./css/divResponsiva.css" />
<link rel="stylesheet"  type="text/css"  href="./css/formularioResponsivo.css" />
<link rel="stylesheet"  type="text/css"  href="./css/css_NavBar.css" />
 
<!-- JavaScript -->
<script type="text/javascript" src="./js/javaScript_uneb.js" /></script>
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Usando jquery para os campos dinamicos de add itens-->
<script src="jquery-1.11.3.js" type="text/javascript"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>    
<!-- BOOtstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
<!-- BOOTSTRAP PARA COLOCAR FILTRO NA TABELA E MUDAR A LETRA -->    
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
<!-- TABELA LEANDRO -->   
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script> 
</head>

	<body>

	<div class="topnav " id="myTopnav">
          <a href="#home" class="active"><font size="3">HOME</font></a>
          <a href="acompanhar_Pedido.php"><font size="3">ACOMPANHAR PEDIDO</font></a>
          <a href="fazer_Pedido.php"><font size="3">FAZER PEDIDO</font></a>
          <a href="pedidos_cancelados.php"><font size="3">PEDIDOS CANCELADOS</font></a>
          <a href="login.php"><font size="3">SAIR</font></a>
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
                              <legend align="center"> <font size='5' color='000'> PEDIDOS CANCELADOS </font> </legend> <br><br>
							  <table name="itensPedido" id="tabela" class="table table-striped" align="center">
								  <thead>
									<tr>
                                      <th scope="col" ><font size="3"><center>CÓDIGO</center></font></th>
									  <th scope="col"><font size="3"><center>ESTADO DO PEDIDO</center></font></th>
									  <th scope="col"><font size="3"><center>DATA E HORA DO PEDIDO REALIZADO</center></font></th>
                                      <th scope="col"><font size="3"><center>MOTIVO CANCELAMENTO</center></font></th>
                                      <th scope="col"><font size="3"><center>Ações</center></font></th>
									</tr>
								  </thead>
								  <tbody>
										
								       <?php 											
											while($dado = mysql_fetch_assoc($connect_pedido)) { 
												$estado = $dado['nome'];
                                                $codigo_pedido = $dado['cod_pedido'];
                                                $botao="<button type='button' class='btn btn-danger'><font size='3'>Cancelado</font></button>";
												?>
												<tr>
                                                <td style="width:10px" class="idItem"><font size="3"><center><?=$dado['cod_pedido']?></center></font></td>
                                                 <td style="width:50px"><font size="3"><center><?=$botao?></center></font></td>
                                                 <td style="width:200px"><font size="3"><center><?=date('d/m/Y',strtotime($dado['data_Pedido']))?> ás <?=$dado['hora']?></center></font></td>
                                                <!--?php while($dados = mysql_fetch_assoc($connect_pedido_cancelado)) {?>
                                                    <td style="width:200px"><font size="3"><center><!--?=$dados['motivo']?></center></font></td-->
                                                <!--?php } ?-->
                                                  <td style="width:200px">
                                                         <center>   
                                                             <button type="button" id="<?=$dado['cod_pedido']?>" class="btn_idPedido btn btn-primary"><font size='3'>Visualizar itens</font></button>
                                                          </center>
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
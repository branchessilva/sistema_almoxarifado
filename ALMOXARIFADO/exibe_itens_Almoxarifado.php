<?php
    include "verifica.php";
	require "verifica.php";

    include "connect_BD.php";
	require "connect_BD.php";
    /*Pega o codigo do pedido da tabela correspondente a linha clicada*/
    $PegaPedido = $_GET['Pedido'];
    
    $contulta_itens_pedido = "SELECT I.unidade_Tipo, I.nome, PI.quantidade_Solicitada,PI.quantidade_Fornecida, P.data_Pedido FROM pedido_item as PI INNER JOIN itens as I ON (PI.fk_Pedido = $PegaPedido AND PI.fk_Item = I.cod_item) INNER JOIN pedido as P ON (PI.fk_Pedido = P.cod_pedido)";
	$connect_itens_pedido = mysql_query($contulta_itens_pedido, $con) or die(mysql_error());
    $linha = mysql_fetch_assoc($connect_itens_pedido);
    $total = mysql_num_rows($connect_itens_pedido); // Total de itens retornados
    $data = date('d/m/Y',strtotime($linha['data_Pedido']));
    if($total == 0)
    {
         echo"<script type='text/javascript'>alert('Sem itens cadastrados nesse pedido!');window.location.href='acompanhar_Pedido.php';</script>";
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
<link rel="stylesheet"  type="text/css"  href="../css/divResponsiva.css" />
<link rel="stylesheet"  type="text/css"  href="../css/formularioResponsivo.css" />
<link rel="stylesheet"  type="text/css"  href="../css/css_NavBar.css" />
 
<!-- JavaScript -->
<script type="text/javascript" src="../js/javaScript_uneb.js" /></script>
    
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Usando jquery para os campos dinamicos de add itens-->
<script src="jquery-1.11.3.js" type="text/javascript"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    
<!-- TABELA LEANDRO -->   
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script> 
    
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
          <a href="acompanhar_Pedido_Almoxarifado.php"><font size="3">ACOMPANHAR PEDIDO</font></a>
          <a href="fazer_Pedido_Almoxarifado.php"><font size="3">FAZER PEDIDO</font></a>
          <a href="pedidos_cancelados_Almoxarifado.php"><font size="3">PEDIDOS CANCELADOS</font></a>
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
                              <legend align="center"> <font size='5' color='000'> ITENS DO PEDIDO <?=$PegaPedido?> REALIZADO EM: <?=  date('d/m/Y',strtotime($linha['data_Pedido']));?> </font> </legend> <br><br>
							  <table name="itensPedido" id="tabela" class="table table-striped" align="center">
								  <thead>
									<tr>
                                      <th scope="col" ><font size="3"><center>NOME</center></font></th>
									  <th scope="col"><font size="3"><center>QUANTIDADE SOLICITADA</center></font></th>
                                       <th scope="col"><font size="3"><center>QUANTIDADE FORNECIDA</center></font></th>
                                        <th scope="col"><font size="3"><center>UNIDADE</center></font></th>
									</tr>
								  </thead>
								  <tbody>
								    <tr>
                                        <td style="width:10px" class="idItem"><font size="3"><center><?=utf8_encode($linha['nome'])?></center></font></td>
                                        <td style="width:200px"><font size="3"><center><?=$linha['quantidade_Solicitada']?></center></font></td>
                                        <td style="width:200px"><font size="3"><center><?=$linha['quantidade_Fornecida']?></center></font></td>
                                        <td style="width:200px"><font size="3"><center><?=$linha['unidade_Tipo']?></center></font></td>
								    </tr>
								       <?php 											
											while($dado = mysql_fetch_assoc($connect_itens_pedido)) { ?>
												<tr>
                                                <td style="width:10px" class="idItem"><font size="3"><center><?=utf8_encode($dado['nome'])?></center></font></td>
                                                 <td style="width:200px"><font size="3"><center><?=$dado['quantidade_Solicitada']?></center></font></td>
                                                <td style="width:200px"><font size="3"><center><?=$dado['quantidade_Fornecida']?></center></font></td>
                                                <td style="width:200px"><font size="3"><center><?=$dado['unidade_Tipo']?></center></font></td>
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
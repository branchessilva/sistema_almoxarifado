<?php 
	include "verifica.php";
	require "verifica.php";
	
	include "connect_BD.php";
	require "connect_BD.php";

    /*Pega o codigo do pedido da tabela correspondente a linha clicada*/
    $PegaPedido = $_GET['Pedido'];
    $_SESSION['IdPedido'] = $PegaPedido;

    //Consulta o setor
    $consulta_setor = "SELECT S.nome, S.cod_setor FROM setor AS S INNER JOIN usuario AS U ON S.cod_setor=U.fk_Perfil WHERE U.matricula='$_SESSION[matricula]'";
	$connect_setor = mysql_query($consulta_setor, $con ) or die(mysql_query());
    $linha_setor = mysql_fetch_assoc($connect_setor);
    //Pega os itens do pedido
    $contulta_itens_pedido = "SELECT I.cod_item, I.unidade_Tipo, I.nome, PI.quantidade_Solicitada, P.data_Pedido FROM pedido_item as PI INNER JOIN itens as I ON (PI.fk_Pedido = $PegaPedido AND PI.fk_Item = I.cod_item) INNER JOIN pedido as P ON (PI.fk_Pedido = P.cod_pedido)";
	$connect_itens_pedido = mysql_query($contulta_itens_pedido, $con) or die(mysql_error());
    //$linha = mysql_fetch_assoc($connect_itens_pedido);
    $total = mysql_num_rows($connect_itens_pedido); // Total de itens retornados
    //$data = date('d/m/Y',strtotime($linha['data_Pedido']));
    
    if($total == 0)
    {
         echo"<script type='text/javascript'>alert('Sem itens cadastrados nesse pedido!');window.location.href='acompanhar_Pedido.php';</script>";
    }
?>	
<!DOCTYPE html>
<html>
<head>
<title>SISTEMA ALMOXARIFADO - FAZER PEDIDO</title>
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
          <a href="login.php"><font size="3">SAIR</font></a>
          <a href="javascript:void(0);" class="icon" onclick="cria_Botao_NavBar();">
           <i class="fa fa-bars"></i>
	      </a>
	</div>

	<div class="container">
		  <div class="box">
			     <div class="pgContato">  
                        <div class="table-responsive">
                                    <center>
                                <font size='5' color='#FFFFFF'> 
                                EDITAR SOLICITAÇÃO DE MATERIAL PENDENTE
                                </font></center></br> </br>
                				<div class="divFormulario">  
                                    <div class="formPedido">  
                                      <form id="formPedido" action="lista_itens_pendentes.php" method="POST">
                                        <div id="inicio_div">
                                            <font size="4" color="#FFFFFF">Unidade requisitante:</font>
                                            <input disabled type="text" name="nome" value="<?php echo $linha_setor['nome'];?>"/>
                                            <input hidden type="text" name="nome" value="<?php echo $linha_setor['nome'];?>"/>
                                            <br>
                                        </div>
                                          <p>
                                                <font size="4" color="#FFFFFF">Itens do pedido:</font>
                                          </p>
                                        <div id="lista_itens_editar">
                                        <?php 
										while($dados = mysql_fetch_assoc($connect_itens_pedido)) { ?>
                                            <div id="div_pedidos">
                                                <select name="itens[]" required>
                                                <option value="<?=$dados['cod_item']?>"><?=utf8_encode($dados['nome'])?>&nbsp;- &nbsp;<?=$dados['unidade_Tipo']?></option>
                                                </select><input type="text" required="required" name="quantidade[]" onkeypress="return SomenteNumero()" value="<?php echo $dados['quantidade_Solicitada'];?>"><a href="#" class="remover_campo text-danger" >Remover</a>
                                            </div>   
                                        <?php }?>
                                        </div>
                                         <div id="lista_itens">								
							             </div>
                                          <br><div>
                                                <button type="button" id="add_item" onclick="carregarItens()" class="btn btn-primary">Adicionar itens</button>
                                            <!--input type="button" id="add_item" onclick="carregarItens()" value="Adicionar Item"-->
                                                <button type="submit"  id="BotaoSubmit" class="btn btn-primary  ">Concluir pedido</button>
							             </div>
                                        <form>
                                    </div>
					           </div>
				        </div>
			     </div>
		  </div>
    </div>
</body>
</html>



<?php 
	include "verifica.php";
	require "verifica.php";
	
	include "connect_BD.php";
	require "connect_BD.php";
	
	/*Pegar dados do setor no BD */
	$consulta_setor = "SELECT S.nome, S.cod_setor FROM setor AS S INNER JOIN usuario AS U ON S.cod_setor=U.fk_Perfil WHERE U.matricula='$_SESSION[matricula]'";
	$connect_setor = mysql_query($consulta_setor, $con ) or die(mysql_query());
	$consulta_itens = "SELECT * FROM itens";
	$connect_itens = mysql_query($consulta_itens, $con ) or die(mysql_query());

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
          <a href="acompanhar_Pedido.php"><font size="3">ACOMPANHAR PEDIDOS</font></a>
          <a href="login.php"><font size="3">SAIR</font></a>
          <a href="javascript:void(0);" class="icon" onclick="cria_Botao_NavBar();">
            <i class="fa fa-bars"></i>
	       </a>
	</div>

	<div class="container">
		<div class="box">
			<div class="pgContato">
                        <center>
                        <font size='5' color='#FFFFFF'> 
                        SOLICITAÇÃO DE MATERIAL
                        </font></center></br> </br>
				<div class="divFormulario">  
					<div class="formPedido">  
						<form id="formPedido" action="lista_item.php" method="POST">
							<div id="inicio_div">
								<?php 
										while($dado = mysql_fetch_assoc($connect_setor)) { ?>
                                            <font size="4" color="#FFFFFF">Unidade requisitante:</font>
                                            <input disabled type="text" name="nome" value="<?php echo $dado['nome'];?>"/>
                                            <input hidden type="text" name="nome" value="<?php echo $dado['nome'];?>"/>
								<?php } ?>
							</div>
							<br>
                            <p>
								<font size="4" color="#FFFFFF">Itens do pedido:</font>
							</p>
							<div id="div_pedidos">
									<select name="itens[]" required>
										<option value="">Selecione um item</option> 
										<?php 
										while($dado2 = mysql_fetch_assoc($connect_itens)) { ?>
											<option value="<?=$dado2['cod_item']?>"><?=utf8_encode($dado2['nome'])?>&nbsp;- &nbsp;<?=$dado2['unidade_Tipo']?></option>
										<?php } ?>
									</select><input type="text" required="required" placeholder="Quantidade" name="quantidade[]" onkeypress="return SomenteNumero()">
							</div >	
                            <div id="lista_itens">								
							</div>
                            <div id="div_botao">
                                <button type="button" id="add_item" onclick="carregarItens()" class="btn btn-primary">Adicionar itens</button>
                            <!--input type="button" id="add_item" onclick="carregarItens()" value="Adicionar Item"-->
								<button type="submit" id="BotaoSubmit" class="btn btn-primary">Concluir pedido</button>
							</div>
                        </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

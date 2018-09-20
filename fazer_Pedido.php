<?php 
	include "verifica.php";
	require "verifica.php";
	
	include "connect_BD.php";
	require "connect_BD.php";
	
	/*Pegar dados do setor no BD */
	$consulta_setor = "SELECT S.nome, S.cod_setor FROM setor AS S INNER JOIN usuario AS U ON S.cod_setor=U.fk_Perfil WHERE U.matricula='$_SESSION[matricula]'";
	$connect_setor = mysqli_query($mysqli, $consulta_setor ) or die(mysqli_error($mysqli));
	$consulta_itens = "SELECT * FROM itens";
	$connect_itens = mysqli_query($mysqli, $consulta_itens ) or die(mysqli_error($mysqli));

?>

<!DOCTYPE html>
<html>
<head>
<title>SISTEMA ALMOXARIFADO - FAZER PEDIDO</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>

<!--Para deixar a div responsiva-->
<!-- O ERRO PODE ACONTECER AQUI DEPOIS POR CONTA DON ENDEREÇO DO LINK -->
<link rel="stylesheet"  type="text/css"  href="./divResponsiva.css" />
<link rel="stylesheet"  type="text/css"  href="./formularioResponsivo.css" />
<link rel="stylesheet"  type="text/css"  href="./css_NavBar.css" />
 
<!-- JavaScript -->
<script type="text/javascript" src="javaScript_uneb.js" /></script>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Usando jquery para os campos dinamicos de add itens-->
<script src="jquery-1.11.3.js" type="text/javascript"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript">
jQuery(window).scroll(function () {
 if (jQuery(this).scrollTop() > 443) {
     jQuery(".myTopnav").addClass("fixo");
 } else {
     jQuery(".myTopnav").removeClass("fixo");
 }
});
</script>
</head>
<body>

	<div class="topnav " id="myTopnav">
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
				<legend align="center"> <font size='5' color='#FFFFFF'> Solicita&ccedil;&atilde;o de Material </font> </legend></br> </br>
				<div class="divFormulario">  
					<div class="formPedido">  
						<form id="formPedido" action="insere_pedido.php" method="POST">
							<div id="inicio_div">
								<p>
								<font size="4" color="#FFFFFF">Unidade requisitante:</font>
								</p>
								<?php 
										while($dado = $connect_setor->fetch_array()) { ?>
										<input disabled type="text" name="nome" value="<?php echo $dado['nome'];?>"/>
										<input disabled type="text" name="nome" value="<?php echo $dado['cod_setor'];?>"/>
								<?php } ?>
								</br> </br>
								<input type="button" id="add_item" onclick="carregarItens()" value="Adicionar Item">
							</div>
							<h2></h2>
							<br>
							<p>
								<font size="4" color="#FFFFFF">Itens do pedido:</font>
							</p>
							<div id="div_pedido">
									&nbsp;<font size="4" color="#FFFFFF">Material:</font>
									<select name="itens" style="width:auto">
										<option value="">Itens</option> 
										<?php 
										while($dado2 = $connect_itens->fetch_array()) { ?>
											<option value="<?=$dados2['cod_item']?>"><?=$dado2['nome']?>&nbsp;-&nbsp;<?=$dado2['unidade_Tipo']?></option>
										<?php } ?>
									</select>
									<input type='text' style='width:auto' placeholder='Quantidade' name='campo[]' onkeypress="return SomenteNumero()">
							</div >
							<div id="lista_itens">
								
							</div>
						<form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<?php 
	include "verifica.php";
	require "verifica.php";
	
	include "connect_Fazer_Pedido.php";
	require "connect_Fazer_Pedido.php";
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
</head>

<body>

	<div class="topnav " id="myTopnav">
	  <a href="#home" class="active">Home</a>
	  <a href="acompanhar_Pedido.php">Acompanhar pedidos</a>
	  <a href="login.php">Sair</a>
	  <a href="javascript:void(0);" class="icon" onclick="cria_Botao_NavBar();">
		<i class="fa fa-bars"></i>
	  </a>
	</div>

	<div class="container">
		  <div class="box">
			     <div class="pgContato">  
                        <div class="table-responsive">
                                <legend align="center"><font size='5' color='#FFFFFF'>  Editar Solicitação de Material </font> </legend></br> </br>
                				<div class="divFormulario">  
                                    <div class="formPedido">  
                                      <form id="formPedido" action="lista_item.php" method="POST">
                                        <div id="inicio_div">
                                            <font size="4" color="#FFFFFF">Unidade requisitante:</font>
                                            <input disabled type="text" name="nome" value="<?php echo $_SESSION['setor'];?>"/>
                                            <input hidden type="text" name="nome" value="<?php echo $_SESSION['setor'];?>"/>
                                            <br>
                                        </div>
                                          <p>
                                                <font size="4" color="#FFFFFF">Itens do pedido:</font>
                                          </p>
                                              <?php 
                                            if(isset($_SESSION['item']) && isset($_SESSION['quantidade'])) {
                                                $i= 0;
                                                $j= 0;
                                                foreach($_SESSION['quantidade'] as $quant) {
                                                    $quantidade[$i] = $quant;
                                                    $i++;
                                                }
                                                foreach($_SESSION['item'] as $item)
                                                {
                                                    $produto[$j] = $item;
                                                    $j++;
                                                }
                                                for( $x=0; $x < $i; $x++)
                                                {
                                                    $busca_item = "select nome from itens where cod_item ='$produto[$x]'";
                                                    $result = mysql_query($busca_item,$con);
                                                    // transforma os dados em um array
                                                    $linha = mysql_fetch_assoc($result);
                                                    ?>
                                                    <div id="lista_itens_editaveis">
                                                    <font size="4" color="#FFFFFF">Material:</font>
                                                        
                                                    <input disabled type="text" style="width:180px" required="required" value="<?php echo utf8_encode($linha['nome']);?>">
                                                        
                                                    <input hidden type="text" style="width:180px"  name="itens[]" value="<?php echo $produto[$x];?>">
                                                        
                                                    <input type="text" style="width:180px" required="required" name="quantidade[]" onkeypress="return SomenteNumero()" value="<?php echo $quantidade[$x];?>">
                                                        
                                                    <a href="#" class="remover_campo" >Remover</a>
                                                    </div>
                                                     <div id="lista_itens">								
							                         </div>
                                            <?php }
                                        }?>
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



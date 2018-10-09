<?php 
	include "verifica.php";
	require "verifica.php";
	
	include "connect_Fazer_Pedido.php";
	require "connect_Fazer_Pedido.php";
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

	<div class="containerTable">
		<div class="boxtable">
			<div class=""> 
				<div class="">  
					<div> 
                        <div class="table-responsive">
                            <form action="seleciona_Pagina.php" method="POST">
                                <legend align="center"> <font size='5'> Editação de pedido pendente </font> </legend></br> </br>
                                      <table name="itensPedido" class="table table-striped" align="center">
                                              <thead bgcolor="#28549D">
                                                <tr style="color: white;">
                                                  <th scope="col"><center>CÓDIGO</center></th>
                                                  <th scope="col"><center>ESPECIFICAÇÃO</center></th>
                                                  <th scope="col"><center>QUANTIDADE SOLICITADA</center></th>
                                                  <th scope="col"><center>UNIDADE</center></th>
                                                </tr>
                                              </thead>
                                              <tbody>

                                                   <?php 
                                                        //Cria sessão
                                                        $_SESSION['setor'] = $_POST["nome"];
                                                        $_SESSION['quantidade'] = array();
                                                        $_SESSION['item'] = array();
                                                        if(isset($_POST["itens"]) && isset($_POST["quantidade"])) {
                                                                $i= 0;
                                                                $j= 0;
                                                                foreach($_POST["quantidade"] as $quant) {
                                                                    array_push($_SESSION['quantidade'], $quant);
                                                                    $quantidade[$i] = $quant;
                                                                    $i++;
                                                                }
                                                                foreach($_POST["itens"] as $item)
                                                                {
                                                                    array_push($_SESSION['item'], $item);
                                                                    $produto[$j] = $item;
                                                                    $j++;
                                                                }
                                                                for( $x=0; $x < $i; $x++)
                                                                {
                                                                    //O @ esconde os warnings
                                                                    @$buscaItem = "Select * from itens where cod_item = $produto[$x]";
                                                                    @$result = mysql_query($buscaItem,$con);
                                                                    $linha = mysql_fetch_assoc($result);
                                                                    ?>
                                                                    <tr>  
                                                                      <td><font size="3"><center><?=$produto[$x]?></center></font></td>
                                                                      <td ><font size="3"><center><?=utf8_encode($linha['nome'])?></center></font></td>
                                                                      <td><font size="3"><center><?=$quantidade[$x]?></center></font></td>
                                                                      <td><font size="3"><center><?=utf8_encode($linha['unidade_Tipo'])?></center></font></td>
                                                                    </tr>
                                                            <?php } ?>
                                                   <?php } ?>
                                              </tbody>
                                      </table>
<br>
<button style="width: 150px; float:right;" type="submit" value="Editar"  name="BotaoSubmit" class="btn btn-primary btn-sm">Editar pedido</button>
<button style="width: 150px; float:right;" type="submit" value="Confirmar_Edição"  name="BotaoSubmit" class="btn btn-primary btn-sm">Confirmar pedido</button>

                                </form>
                            </div>
					   </div>
				   </div>
			  </div>
		</div>
	</div>
</body>
</html>



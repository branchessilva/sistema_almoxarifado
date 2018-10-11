<?php
	include "connect_BD.php";
	require "connect_BD.php";
	
	/*Pegar dados do setor no BD */
	$consulta_setor = "SELECT * FROM setor ORDER BY nome ASC";
	$connect_setor = mysql_query($consulta_setor,$con ) or die(mysqli_error());
	/*Pega dados do perfil no BD */
	$consulta_perfil = "SELECT * FROM perfil ORDER BY nome ASC";
	$connect_perfil = mysql_query($consulta_perfil,$con) or die(mysqli_error());
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
    
<link rel="stylesheet"  href="./css/css_formato_Campos_cadastro.css" />


    
<!-- JavaScript -->
<script type="text/javascript" src="./js/javaScript_uneb.js" /></script>

</head>
<body>
<div class="login-form">
	<h2 class="text-center">Cadastro</h2>
    <form name="formulario" action="insere_usuario.php" method="POST">
		<div class="avatar">
			<img src="Imagens/avatar.png" alt="Avatar">
		</div>           
        <div class="form-group">
        	<input type="text" name="nome" class="form-control input-lg" id="nome" placeholder="Nome" onblur="valida_Nome()" required="required">
        </div>
		 <div class="form-group">
        	<input type="text" name="matricula" class="form-control input-lg" id="matricula" onblur="valida_Matricula()" maxlength="9" placeholder="Matricula" required="required">
        </div>
		<div class="form-group">
            <select id="opc_perfil" name="opc_perfil" required>
			  <option placeholder="Nome" value="">Escolha o perfil do usu&aacute;rio</option>
			  <?php 
					while($dado = mysql_fetch_assoc($connect_perfil)) { ?>
						<option value=<?=$dado['cod_perfil']?>> <?=$dado['nome']?> </option>
				<?php } ?>
			</select><br>
			<select id="opc_setor" name="opc_setor" required>
			  <option placeholder="Nome" value="">Escolha o setor do usu&aacute;rio</option>
				<?php 
					while($dado = mysql_fetch_assoc($connect_setor)) { ?>
						<option value=<?=$dado['cod_setor']?>> <?=$dado['nome']?> </option>
				<?php } ?>
			</select>
        </div>        
        <div class="form-group">
            <button type="submit" id="BotaoSubmit" class="btn btn-primary btn-lg btn-block login-btn">Cadastrar</button>
        </div>
    </form>
</div>
</body>
</html>      
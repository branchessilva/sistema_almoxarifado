<?php
	include "connect_BD.php";
	require "connect_BD.php";
	
	/*Pegar dados do setor no BD */
	$consulta_setor = "SELECT * FROM setor ORDER BY nome ASC";
	$connect_setor = mysqli_query($mysqli, $consulta_setor ) or die(mysqli_error($mysqli));
	/*Pega dados do perfil no BD */
	$consulta_perfil = "SELECT * FROM perfil ORDER BY nome ASC";
	$connect_perfil = mysqli_query($mysqli, $consulta_perfil) or die(mysqli_error($mysqli));
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SISTEMA ALMOXARIFADO - LOGIN</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet"  href="./css/css_formato_Campos_cadastro.css" />

<!-- JavaScript -->
<script type="text/javascript" src="./js/javaScript_uneb.js" /></script>

</head>
<body>
<div class="login-form"">
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
					while($dado = $connect_perfil->fetch_array()) { ?>
						<option value=<?=$dado['cod_perfil']?>> <?=$dado['nome']?> </option>
				<?php } ?>
			</select><br>
			<select id="opc_setor" name="opc_setor" required>
			  <option placeholder="Nome" value="">Escolha o setor do usu&aacute;rio</option>
				<?php 
					while($dado = $connect_setor->fetch_array()) { ?>
						<option value=<?=$dado['cod_setor']?>> <?=$dado['nome']?> </option>
				<?php } ?>
			</select>
        </div>        
        <div class="form-group">
            <button type="submit" onclick="confirma()" id="BotaoSubmit" class="btn btn-primary btn-lg btn-block login-btn">Cadastrar</button>
        </div>
    </form>
</div>
</body>
</html>      
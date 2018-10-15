<?php
	include "connect_BD.php";
	require "connect_BD.php";
	
    $Usuario = $_POST["usuario"];
    
    /*Pegar dados do setor no BD */
	$consulta_setor = "SELECT * FROM setor ORDER BY nome ASC";
	$connect_setor = mysql_query($consulta_setor,$con ) or die(mysqli_error());

	/*Pega dados do perfil no BD */
	$consulta_perfil = "SELECT * FROM perfil ORDER BY nome ASC";
	$connect_perfil = mysql_query($consulta_perfil,$con) or die(mysqli_error());

	/*Pegar dados do setor no BD */
	$consulta_usuario = "SELECT matricula, nome FROM usuario WHERE matricula=$Usuario";
	$connect_usuario = mysql_query($consulta_usuario,$con ) or die(mysqli_error());

    $total = mysql_num_rows($connect_usuario); // Total de itens retornados
    $linha = mysql_fetch_assoc($connect_usuario);
    if($total == 0)
    {
         echo"<script type='text/javascript'>alert('Não foram encontrados registros!');window.location.href='pesquisa_usuario.php';</script>";
    }

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
<link rel="stylesheet"  href="../css/css_formato_Campos_login.css" />

<!-- BOOTSTRAP PARA COLOCAR FILTRO NA TABELA E MUDAR A LETRA -->    
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    
<!-- JavaScript -->
<script type="text/javascript" src="./js/javaScript_uneb.js" /></script>

</head>
<body>
<div class="login-form">
	<h2 class="text-center">Edição de usuário</h2>
    <form name="formulario" action="insere_usuario.php" method="POST">
		<div class="avatar">
			<img src="Imagens/avatar.png" alt="Avatar">
		</div>           
        <div class="form-group">
        	<input type="text" name="nome" class="form-control input-lg" value="<?=utf8_encode($linha['nome']);?>" id="nome" placeholder="Nome" onblur="valida_Nome()" required="required">
        </div>
		 <div class="form-group">
        	<input type="text" name="matricula" class="form-control input-lg" value=<?=$linha['matricula']?> id="matricula" onblur="valida_Matricula()" maxlength="9" placeholder="Matricula" required="required">
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
            <button type="submit" id="BotaoSubmit" class="btn btn-primary btn-lg btn-block login-btn">Salvar</button>
        </div>
    </form>
</div>
</body>
</html>      
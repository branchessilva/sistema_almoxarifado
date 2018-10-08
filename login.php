<?php 
	session_start();
    session_destroy();
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
<link rel="stylesheet"  href="./css/css_formato_Campos_login.css" />

<!-- JavaScript -->
<script type="text/javascript" src="./js/javaScript_uneb.js" /></script>

</head>
<body>
<div class="login-form">
	<h2 class="text-center">Login</h2>
    <form name="formulario" action="validar_login.php" method="POST">
		<div class="avatar">
			<img src="./Imagens/avatar.png" alt="Avatar">
		</div>           
		 <div class="form-group">
        	<input type="text" name="matricula" class="form-control input-lg" id="matricula"  maxlength="20" placeholder="Usuario" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control input-lg" name="password" maxlength="25" placeholder="Senha" required="required">
        </div>        
        <div class="form-group">
            <button type="submit" id="BotaoSubmit" class="btn btn-primary btn-lg btn-block login-btn">Acessar</button>
        </div>
    </form>
</div>
</body>
</html>                            
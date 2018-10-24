	<?php
		// Inicia sessões 
		session_start();
		//Conexão com o BD
		include "connect_BD.php";
		require "connect_BD.php";

		//Pega o id do pedido que vai ser retirado
        $PegaPedido = $_SESSION["idPedido"];

		/*Constantes para saber o perfil*/
		define("AUTORIZADO", 1);
		define("COMUM", 2);
		define("ALMOXARIFADO", 3);
		
		/*Parte do LDAP*/
		$user = (int) $_POST["matricula"]; 
		$pass = $_POST["password"];

		$g_ldap_server = 'autenticacaoad.uneb.br';
		//$g_ldap_server = 'ldap://autenticacaoad.uneb.br/';
		$g_ldap_port = 389;
		$ds= @ldap_connect($g_ldap_server)or die("Erro na conexao do LDAP!");
		if (!($bind = @ldap_bind($ds, $_POST["matricula"]."@uneb.br", $_POST["password"]))) { /*Se exitir problemas com a autenticação do login*/
		    echo"<script type='text/javascript'>alert('Usuário ou senha incorretos !');window.location.href='login.php';</script>";
			/*echo "<div class='alert alert-danger' role='alert'>USUÁRIO OU SENHA INCORRETOS, você está sendo recirecionado!</div> ";
			echo "<meta http-equiv=refresh content='3;URL=login.php'>";*/
			
		} else {
			
			/*Pesquisar o perfil do usuario para direcionar a sua página inicial*/
			$consulta_setor_recebedor = "SELECT S.cod_setor FROM setor AS S INNER JOIN usuario AS U WHERE U.matricula='$user' AND S.cod_setor=U.fk_Setor";
            
            $consulta_setor_pedinte = "SELECT S.cod_setor FROM setor AS S INNER JOIN usuario AS U INNER JOIN pedido AS P ON P.cod_pedido=$PegaPedido WHERE P.solicitante=U.matricula AND S.cod_setor=U.fk_Setor";

			$connect_setor_recebedor = mysql_query($consulta_setor_recebedor, $con) or die(mysqli_error());
			$dado1 = mysql_fetch_assoc($connect_setor_recebedor);
            
            $connect_setor_pedinte = mysql_query($consulta_setor_pedinte, $con) or die(mysqli_error());
			$dado2 = mysql_fetch_assoc($connect_setor_pedinte);
            
            
			if($dado1['cod_setor'] == $dado2['cod_setor'])
			{   $atualiza_pedido = "UPDATE pedido SET recebedor = '$user', fk_Estado=6 WHERE cod_pedido     =         $PegaPedido";
	            $result = mysql_query($atualiza_pedido,$con);
                echo"<script type='text/javascript'>alert('Usuário AUTORIZADO PARA RETIRADA !');window.location.href='acompanhar_Pedido_Almoxarifado.php';</script>";
			}else 
			{
                echo"<script type='text/javascript'>alert('Usuário NÃO AUTORIZADO para retirada !');window.location.href='acompanhar_Pedido_Almoxarifado.php';</script>";
			}
		}
		
	?>

<?php
	include "connect_BD.php";
	require "connect_BD.php";
	
	$nome = $_POST["nome"]; 
	$matricula = $_POST["matricula"];
	$cod_setor = (int)$_POST['opc_perfil'];
	$cod_perfil = (int)$_POST['opc_setor'];
	echo $cod_perfil;
	
	$insere_usuario= "INSERT INTO usuario (matricula, nome, fk_Setor, fk_Perfil) VALUES";
	$insere_usuario .= "('$matricula', '$nome', '$cod_setor', '$cod_perfil')";
	
	$connect_usuario = mysqli_query($mysqli, $insere_usuario) or die(mysqli_error($mysqli));
	
	if($connect_usuario){ //verifica se foi afetada alguma linha, nesse caso inserida alguma linha
        echo "<p>Cadastro feito com sucesso</p>";
        echo '<a href="cadastro_usuario.php">Voltar para formulário de cadastro</a>'; //Apenas um link para retornar para o formulário de cadastro
    } else {
        echo "Erro, não possível inserir no banco de dados";
    }

?>                  
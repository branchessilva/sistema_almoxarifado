<?php 
	include "verifica.php";
	require "verifica.php";
	
	include "connect_BD.php";
	require "connect_BD.php";
	
    echo $_SESSION['id'];
    $campo = $_POST['id'];
    echo $campo;
    echo $_GET["id"];
	/*Pegar dados do setor no BD */
	$consulta_setor = "SELECT S.nome, S.cod_setor FROM setor AS S INNER JOIN usuario AS U ON S.cod_setor=U.fk_Perfil WHERE U.matricula='$_SESSION[matricula]'";
	$connect_setor = mysqli_query($mysqli, $consulta_setor ) or die(mysqli_error($mysqli));
	$consulta_itens = "SELECT * FROM itens";
	$connect_itens = mysqli_query($mysqli, $consulta_itens ) or die(mysqli_error($mysqli));

?>


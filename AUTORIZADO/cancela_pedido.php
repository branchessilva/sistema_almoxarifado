<?php 
	include "verifica.php";
	require "verifica.php";
	
	include "connect_BD.php";
	require "connect_BD.php";
    /*Pega o codigo do pedido da tabela correspondente a linha clicada*/
    $PegaPedido = $_SESSION["num_pedido"];
    $justificativa = $_POST["justificativa"];
    echo $justificativa;
    
    $insere_justificativa = "INSERT INTO pedido_cancelado (motivo) VALUES ('$justificativa')";
    mysql_query($insere_justificativa, $con) or die(mysql_error());
    $id_Justiificativa = mysql_insert_id();
    echo $id_Justiificativa;
    $altera_pedido = "UPDATE pedido SET fk_Estado = 3, fk_pedido_cancelado = $id_Justiificativa WHERE cod_pedido = $PegaPedido";
	$result = mysql_query($altera_pedido, $con) or die(mysql_error());
    if($result)
    {
        echo"<script type='text/javascript'>alert('Pedido cancelado com sucesso!');window.location.href='acompanhar_Pedido_Autorizador.php';</script>";
    }

?> 
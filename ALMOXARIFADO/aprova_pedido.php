<?php 
	include "../verifica.php";
	require "../verifica.php";
	
	include "../connect_BD.php";
	require "../connect_BD.php";


    $idPedido = $_GET['Pedido'];
    $matricula = $_SESSION["matricula"];

	foreach($_SESSION['quantidade'] as $quant) {
				$quantidade[$i] = $quant;
				$i++;
			}
        for($i=0;$i<=$contador;$i++)
        {

        }
?>	
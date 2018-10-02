<?php
	include "verifica.php";
	require "verifica.php";

    switch ($_POST["BotaoSubmit"]) {
        case 'Confirmar':
            header("location:insere_pedido.php"); 
            break;

        case 'Editar':
             header("location:editar_pedido.php"); 
            break;
    }
?>
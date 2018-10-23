<?php 
	include "../verifica.php";
	require "../verifica.php";
	
	include "../connect_BD.php";
	require "../connect_BD.php";


    $idPedido = $_SESSION['IdPedido'];
    $matricula = $_SESSION["matricula"];
	/*date_default_timezone_set('America/Sao_Paulo');
	//Pegue a data no formato dd/mm/yyyy
	$data = date("d/m/Y");
	//Pega a hora

	$hora = date('H:i:s');
    $data_hora = date("Y-m-d H:i:s");

    //Exploda a data para entrar no formato aceito pelo DB.
	$dataAtual = explode('/', $data);
	$dataFormatada = $dataAtual[2].'/'.$dataAtual[1].'/'.$dataAtual[0];*/
	//$atualiza_pedido = "UPDATE pedido SET alteracao = 1 WHERE cod_pedido = $idPedido";
	//$result = mysql_query($atualiza_pedido,$con);
    
     //Deletando os itens do pedido feito anteriormente
    //$deleta_itens = "DELETE FROM pedido_item WHERE fk_Pedido = $idPedido";
	//$result = mysql_query($deleta_itens,$con);

    //Inserindo itens do pedido
    if(isset($_SESSION['item']) && isset($_SESSION['quantidade'])) {
			$i= 0;
			$j= 0;
			foreach($_SESSION['quantidade'] as $quant) {
				$quantidade[$i] = $quant;
				$i++;
			}
			foreach($_SESSION['item'] as $item)
			{
				$produto[$j] = $item;
				$j++;
			}
			for( $x=0; $x < $i; $x++)
			{
				//O @ esconde os warnings
				$insere_item_pedido = "INSERT INTO pedido_item (fk_Pedido, fk_Item, quantidade_Solicitada) VALUES ($idPedido,'$produto[$x]','$quantidade[$x]')";
				$result = mysql_query($insere_item_pedido,$con);
				if(!$result)
				{
                    echo"<script type='text/javascript'>alert('Pedido não realizado !');window.location.href='acompanhar_Pedido_Autorizador.php';</script>";
				}else
                {
                    echo"<script type='text/javascript'>alert('Pedido realizado com sucesso!');window.location.href='acompanhar_Pedido_Autorizador.php';</script>";
                }
			}
    }else
    {
        echo"<script type='text/javascript'>alert('O pedido deve ter pelo menos 1 item!');window.location.href='editar_Pedido.php';</script>";
    }
?>	
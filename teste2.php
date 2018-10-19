<?php
	include "../verifica.php";
	require "../verifica.php";
	
	include "../connect_BD.php";
	require "../connect_BD.php";
// Sanitise GET var
$term = $_GET['term'];

// Add WHERE clause '%Ca%'
$query = "SELECT nome,cod_item FROM itens WHERE nome LIKE '%".$term."%' ";
echo"<script type='text/javascript'>alert('Encontrei');</script>";
$result = mysql_query($query,$con) or die (mysql_error());
    $total = mysql_num_rows($result); // Total de itens retornados
    if($total == 0)
    {
         echo"<script type='text/javascript'>alert('Nenhum pedido foi cancelado!');window.location.href='acompanhar_Pedido.php';</script>";
    }else
    {
        echo"<script type='text/javascript'>alert('Encontrei');</script>";
    }
while($row = mysql_fetch_array($result)){

    $array[$row['cod_item']] = $row['nome'];

}

header('Content-type: application/json');
print json_encode($array);
exit(); // AJAX call, we don't want anything carrying on here
?>
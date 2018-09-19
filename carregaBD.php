

<?php 
    /* substitua as variáveis abaixo pelas que se adequam ao seu caso */
	$dbhost = 'localhost'; // endereco do servidor de banco de dados
	$dbuser = 'root'; // login do banco de dados
	$dbpass = 'admin'; // senha
	$dbname = 'sistema_uneb'; // nome do banco de dados a ser usado
	 
	$conecta = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	$seleciona = mysqli_select_db($conecta, $dbname);
	
	
	
	$selection="SELECT * FROM itens";
    //Consultando banco de dados
    $qryLista = mysqli_query($conecta,$selection);    
    while($resultado = mysqli_fetch_assoc($qryLista)){
        $vetor[] = array_map('utf8_encode', $resultado); 
    }    
    
    //Passando vetor em forma de json
    echo json_encode($vetor);
?>

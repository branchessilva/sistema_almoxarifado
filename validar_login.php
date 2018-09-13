<?php

	$user = (int) $_POST["matricula"]; 
	$pass = $_POST["password"];
	session_start();

	$g_ldap_server = 'autenticacaoad.uneb.br';
    //$g_ldap_server = 'ldap://autenticacaoad.uneb.br/';
    $g_ldap_port = 389;
	$ds= @ldap_connect($g_ldap_server)or die("Erro na conexao do LDAP!");
	if (!($bind = @ldap_bind($ds, $_POST["matricula"]."@uneb.br", $_POST["password"]))) {
		echo "nao passou";	
        // se não validar retorna false

        return FALSE;

    } else {
		echo " passou";	
        // se validar retorna true

        return TRUE;

    }
	
?>

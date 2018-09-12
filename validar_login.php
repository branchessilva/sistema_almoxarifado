<?php

	$user = $_POST["matricula"]; 
	$pass = $_POST["password"];
	session_start();


	$data = date("Y-m-d H:i:s");

	//$efetuaLogin = new conexao2();

	echo $_POST["password"];
	echo $_POST["matricula"];
	
	$g_ldap_server = "autenticacaoad.uneb.br";
    //$g_ldap_server = 'ldap://autenticacaoad.uneb.br/';
    $g_ldap_port = 389;
	echo "vim aqui antes ldap";
	$ds= ldap_connect($g_ldap_server, $g_ldap_port)or die("Não conectou!");

	echo "vim aqui depois ldap";

	if (TRUE)
	{   
		/*echo $_POST["password"];
        $consulta = "SELECT * FROM acesso WHERE login = '$_POST[login]' AND ativo = '1' AND senha= '$Passwd'";
        $sql = $efetuaLogin->executeSQL($consulta);*/
	}


    $ds=@ldap_connect($g_ldap_server);
	echo "vim aqui";
    //$ds=ldap_connect($g_ldap_server, $g_ldap_port);
	if (!($bind = @ldap_bind($ds, $user, $pass))) {
		echo "não passou";	
        // se não validar retorna false

        return FALSE;

    } else {
		echo " passou";	
        // se validar retorna true

        return TRUE;

    }
	function valida_ldap($user,$pass){
		
		
	}
	
?>

                function valida_ldap($user,$pass){

                               $g_ldap_server = 'autenticacaoad.uneb.br';

                               //$g_ldap_server = 'ldap://autenticacaoad.uneb.br/';

                               $g_ldap_port = 389;

                               $ds=@ldap_connect($g_ldap_server);

                               //$ds=ldap_connect($g_ldap_server, $g_ldap_port);

                                               if (!($bind = @ldap_bind($ds, $user, $pass))) {

                                                               // se não validar retorna false

                                                               return FALSE;

                                               } else {

                                                               // se validar retorna true

                                                               return TRUE;

                                               }

                } // fim função conectar lda

 

 

 
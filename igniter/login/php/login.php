<?php

error_reporting(0);

$usuarioRequest = $_REQUEST['usuario'];
$senhaRequest = $_REQUEST['senha'];

logar();

function logar(){
	
	session_start();
	
	global $usuarioRequest;
	global $senhaRequest;
	
	$keyLogin = keyLogin();
	$userKey = $keyLogin[0];
	$passKey = $keyLogin[1];
	
	if(($usuarioRequest==$userKey)and($senhaRequest==$passKey)){
		
		$_SESSION['erro_user_senha'] = "";
		$_SESSION['login'] = $usuarioRequest;
		$_SESSION['senha'] = $senhaRequest;
		$_SESSION['Nome_Cliente'] = "PJBank user";
		$logar = "yes";
		
	}else{
		$_SESSION['erro_user_senha'] = "Usuário ou senha inexistentes.";
		$logar = $_SESSION['erro_user_senha'];
	}
	
	return($logar);
	
}

function keyLogin(){
	
	$userKey = "pjbank";
	$passKey = "123";
	
	return array($userKey,$passKey);
}

?>
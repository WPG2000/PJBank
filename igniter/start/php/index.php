<?php

	require_once("model/classes/template.class.php");	
	require_once("model/sessions/session-global.php");
	require_once("model/sessions/nav-session.php");

	//se estiver logado carrega a tela inicial(welcome). caso contrario carrega o login.
	if(($_SESSION['login'] == true) and ($_SESSION['senha'] == true)){

	    if(isset($_SESSION['id_empr_url_session'])){
            $_SESSION['id_empr'] = $_SESSION['id_empr_url_session'];
        }

		$master_style = 'global.php';
		$profile = new Template("igniter/welcome/html/index.html");

	}else{

        $master_style = 'login-style.css';
        $profile = new Template("igniter/login/html/index.html");

    }

	//define que as telas serao carregadas dentro do (start).
	$choosedTemplates[] = $profile;
	$choosedContents = Template::merge($choosedTemplates);

	$profile  = new Template("igniter/start/html/index.html");

	$profile->set("result", $choosedContents);
	$profile->set("master_style", $master_style);

	//cria variaveis de saida para telas (start, login & welcomeIndex);
	if($usuario_logado==true){
		$usuario_logado = " - ".$usuario_logado;
	}
	$profile->set("recept_message", "bem vindo!");
	$profile->set("screen_label_session", $screen_label_session);
	$profile->set("engine_session", $engine_session);
	$profile->set("tipo_user_logado", $TIPO_USER_LOGADO);
	$profile->set("usuario_logado", mb_convert_case($usuario_logado, MB_CASE_TITLE, 'utf-8'));
	$profile->set("ref_login", "Login!");
	$profile->set("id_empr_key", $id_empr_key);
	$profile->set("id_empr", $id_empr);
	$profile->set("login", $login);
	$profile->set("erro_user_senha", $erro_user_senha);
	$profile->set("user_loc_session", $user_loc_session);
	$profile->set("user_prop_session", $user_prop_session);
    $profile->set("tipo_de_usuario", $tipo_de_usuario);

	if($primeiro_nome_cli==""){
		$primeiro_nome_cli="do Cliente VistaOffice";
	}else{
		$primeiro_nome_cli="VistaOffice - ".mb_convert_case($primeiro_nome_cli, MB_CASE_TITLE, 'utf-8')." $tipo_de_usuario";
	}
	$profile->set("primeiro_nome_cli", $primeiro_nome_cli);

	echo $profile->output();
	
?>
<meta charset="utf-8">

<?php

	//$icon_mode = $_GET['icon_mode'];
	
	/* -- */
	
	/* ....................................................................................... */
	require_once("../../../../model/classes/template.class.php");
	require_once("../../../../model/sessions/session-global.php");
	require_once("../../../../model/sessions/nav-session.php");					
	/* ....................................................................................... */
	
	/* -- */						
	
	/* ....................................................................................... */	
		$profile = new Template("../tpl/index.tpl");	
	/* ....................................................................................... */
	
	/* -- */
	
	/* ....................................................................................... */		
		switch ($screen_label_session) {
			case "":
				$breadcrumb_main_icon = "home32"; 
				$breadcrumb_level1 = "Home";			
				$nome_tela_session = "Dashboard";
				break;
			case "seguro_incendio_cli_contratar":
				$breadcrumb_main_icon = "fire-extinguisher"; 
				$breadcrumb_level1 = "Contratar Seguro";			
				break;		
		}				
	/* ....................................................................................... */
	
	/* -- */
	
	/* ....................................................................................... */
		$profile->set("nome_tela_session", $nome_tela_session);
		$profile->set("breadcrumb_main_icon", $breadcrumb_main_icon);
		$profile->set("breadcrumb_level1", $breadcrumb_level1);
		
		/*
		$profile->set("nav_session", $nav_escolhida_session);
		$profile->set("nome_tela_session", $nome_tela_session_format);
		$profile->set("nome_empresa_session", $nome_empresa_session);
		$profile->set("usuario_logado", $usuario_logado);				
		$profile->set("tipo_user_logado", $TIPO_USER_LOGADO);						
		$profile->set("screen_label_session", $screen_label_session);						
		//$profile->set("menu_icon_choosed_session", $menu_icon_choosed_session);			
		*/
		
		echo $profile->output();	
/* ....................................................................................... */
	
?>
<meta charset="utf-8">

<?php
	
	error_reporting(0);
		
	/* -- */
	
	/* ....................................................................................... */
	require_once("../../../../model/classes/template.class.php");
	require_once("../../../../model/sessions/session-global.php");
	require_once("../../../../model/sessions/nav-session.php");			
	require_once("../../../../model/conecta/conexao_cliente.php");		
	/* ....................................................................................... */
	
	/* -- */
		
	/* ....................................................................................... */
	switch ($screen_label_session) {
		
		case 'desocup':
		case 'desocup_pedido':
		case 'desocup_pedido_view':
		case 'desocup_anexos':
		case 'desocup_agendamento':			
			  $step_nav_key_path = "desocup";			
		break;
		
		/*
		case 'imoveis':			
		case 'meu_cadastro':
		case 'dashboard':		
			  $step_nav_key_path = "empty";			
		break;
		*/
		
	}//end switch	
	/* ....................................................................................... */
	
	/* -- */
	
	/* ....................................................................................... */	
		include("step-nav-config/step-nav-$step_nav_key_path/step-nav-$step_nav_key_path.php");		
	/* ....................................................................................... */
	
	/* -- */	
	
	/* ....................................................................................... */	
	foreach ($list_result as $list_r) {
		
		$profile = new Template("../html/step-nav-list.html");	
	 
		foreach ($list_r as $key => $value) {
			$profile->set($key, $value);
		}//end foreach 
		
		$listTemplates[] = $profile;
		
	}//end foreach
		
	$listContents = Template::merge($listTemplates);
	
	$profile  = new Template("../html/index.html");
	$profile->set("list_lines", $listContents);		
	/* ....................................................................................... */	
	
	/* -- */
	
	/* ....................................................................................... */			
	$profile->set("id_status_escolhido", $id_status_escolhido);
	$profile->set("screen_label_session", $screen_label_session);
	$profile->set("tipo_user_logado", $TIPO_USER_LOGADO);	
	$profile->set("id_escolhido", $id_escolhido);		
	/* ....................................................................................... */			
	
	/* -- */
	
	/* ....................................................................................... */			
	echo $profile->output();	
	/* ....................................................................................... */
	
	/* -- */
	
?>
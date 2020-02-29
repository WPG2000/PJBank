<?php
	
	error_reporting(0);

	$screen_label = $_GET['screen_label'];			
	$action_nav_btn = $_GET['action_nav_btn'];		

	require_once("../../../model/classes/template.class.php");		
	require_once("../../../model/sessions/session-global.php");
	require_once("../../../model/sessions/nav-session.php");
    require_once('../../../model/conecta/conecta-gregorisoft.php');
    require_once('../../../model/conecta/conecta-imoboffice.php');

	$dynamic_grid_config = "dynamic-grid-config.php";
    $grid_dynamic_head = $screen_label_session."/".$screen_label_session."_dynamic_head.php";
    $grid_dynamic_body = $screen_label_session."/".$screen_label_session."_dynamic_body.php";
    $grid_dynamic_foot = $screen_label_session."/".$screen_label_session."_dynamic_foot.php";

	switch ($screen_label_session) {			
											
		case "credenciarContaReceb":			
			include("../../../model/pjBank_integrar/pjBank_credenciarContaRecebimento.php");													
		break;
		
		case "boletos_a_pagar":			
			include("../../../model/pjBank_integrar/pjBank_emitirBoleto.php");													
		break;        
		
	}//end switch		


		include($grid_dynamic_head);		
		include($grid_dynamic_foot);

        $dy_arrContents = Template::merge($dy_arrTemplates);
        $profile  = new Template("../html/dynamic-grid.html");
        $profile->set("dynamic_grid", $dy_arrContents);

        $profile->set("id_primary", $id_primary);
		$profile->set("screen_label_session", $screen_label_session);
		$profile->set("action_nav_btn", $action_nav_btn);
		$profile->set("id_status_escolhido", $id_status_escolhido);		
		$profile->set("engine_session", $engine_session);		
		$profile->set("screen_table_session", $screen_table_session);		
		$profile->set("nome_empresa_session", $nome_empresa_session);
		$profile->set("nome_tela_session", $nome_tela_session);
        $profile->set("dynamic_head", $dynamic_head);
        $profile->set("dynamic_foot", $dynamic_foot);
        $profile->set("min_date", $min_date);
        $profile->set("max_date", $max_date);

        echo $profile->output();
	
?>
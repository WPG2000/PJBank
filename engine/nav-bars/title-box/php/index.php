<meta charset="utf-8">

<?php	
		
	
	require_once("../../../../model/classes/template.class.php");
	require_once("../../../../model/sessions/session-global.php");
	require_once("../../../../model/sessions/nav-session.php");			
		
	/* ....................................................................................... */
			
		$nome_empresa_session_format = str_replace("-"," ",$nome_empresa_session);
		
			if(($nome_tela_session=="")||($nome_tela_session=="undefined")){
				$nome_tela_session_format="DashBoard";
			}else{
				$nome_tela_session_format=$nome_tela_session;
			}
								
		$profile = new Template("../html/index.html");	
		
		$profile->set("nav_session", $nav_escolhida_session);
		
		$profile->set("nome_empresa_session", $nome_empresa_session_format);
		$profile->set("usuario_logado", $usuario_logado);				
		$profile->set("tipo_user_logado", $TIPO_USER_LOGADO);	
				
		$profile->set("screen_label_session", $screen_label_session);										
		$profile->set("nome_tela_session", $nome_tela_session_format);

		$profile->set("engine_session", $engine_session);	
		
		echo $profile->output();	
	
	/* ....................................................................................... */
	
?>
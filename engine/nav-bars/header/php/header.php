<?php
	
	require_once("../../../../model/classes/template.class.php");
	require_once("../../../../model/sessions/session-global.php");
	require_once("../../../../model/sessions/nav-session.php");

		if($foto_user_logado==""){			
			$header_foto_user ='
				<span class="icone icon-user5"></span>
			';			
		}else{			
			$header_foto_user ='
				<div class="foto_user"></div>
			';			
		}//end if/else

		$profile = new Template("../html/header.html");

		$profile->set("ref_header", "Header");
		$profile->set("nav_session", $nav_escolhida_session);
		$profile->set("site_cliente", $site_cliente);
		$profile->set("nome_tela_session", $nome_tela_session);		
		$profile->set("id_usuario_logado", $id_usuario_logado);
		$profile->set("usuario_logado", $usuario_logado);
		$profile->set("NOME_EMPRESA_LOGADA", mb_convert_case($NOME_EMPRESA_LOGADA,  MB_CASE_TITLE, 'utf-8'));		
		$profile->set("header_foto_user", $header_foto_user);
		$profile->set("foto_user_logado", $foto_user_logado);		
		$profile->set("id_logado", $id_login);		
		$profile->set("primeiro_nome_cli", mb_convert_case($primeiro_nome_cli,  MB_CASE_TITLE, 'utf-8'));
		$profile->set("id_empr", $id_empr);		
		$profile->set("nome_cliente", mb_convert_case($nome_cliente,  MB_CASE_TITLE, 'utf-8'));		
		$profile->set("tipo_de_usuario", "- ".$tipo_de_usuario);
        $profile->set("session_ARimobiliariaLoginDimob_key", $session_ARimobiliariaLoginDimob_key);
        $profile->set("session_ARimobiliariaLoginDimob_NomeFantasia", $session_ARimobiliariaLoginDimob_NomeFantasia);

		echo $profile->output();
	
?>
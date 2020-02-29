<meta charset="utf-8">

<?php
	/*	
	require_once("model/conecta/conecta.php");
	require_once("model/sql/sql-pipestyle.php"); 
	*/
	
	require_once("../../../model/classes/template.class.php");
	require_once("../../../model/sessions/session-global.php");
	require_once("../../../model/sessions/nav-session.php");			
	
	$nome_skin = "global-white";//esse item vem da session		
	$foto_usuario = "";//esse item vem da session
	
	if($foto_usuario==""){
		//sem foto
	}else{		
		$remove_icon_user = "0";			
	}//com foto

		
	/* ....................................................................................... */				
		
		$profile = new Template($nome_skin.".css");						
		
		
		$profile->set("ref_global", "ref_global");
		
		$profile->set("logo_empresa", $logo_empresa);
		$profile->set("foto_usuario", $foto_usuario);
		$profile->set("remove_icon_user", $remove_icon_user);
		
		echo $profile->output();	
	
	/* ....................................................................................... */
	
?>
<meta charset="utf-8">

<?php
	/*	
	require_once("model/conecta/conecta.php");
	require_once("model/sql/sql-pipestyle.php"); 
	*/
	
	require_once("../../../../model/classes/template.class.php");
	require_once("../../../../model/sessions/session-global.php");
	require_once("../../../../model/sessions/nav-session.php");			
	
	/* -- */
		
	/* ....................................................................................... */
	$list_result = array(				 		 
		array("id" => "user_name_big_style", "screen_label" => "", "icone" => "user5", "nome_tela" => $usuario_logado),
		array("id" => "1", "screen_table" => "","screen_label" => "", "icone" => "read-more", "nome_tela" => "Início"),		 		 
		array("id" => "2","screen_table" => "", "screen_label" => "seguradoras", "engine" => "", "icone" => "enhanced_encryption", "nome_tela" => "seguradoras"),				 
		array("id" => "3","screen_table" => "MIGRA_SEG_FIA_PORTO", "screen_label" => "clientes", "engine" => "dynamic-list", "icone" => "home6", "nome_tela" => "Clientes"),				 
		array("id" => "4", "screen_label" => "sair", "icone" => "subdirectory_arrow_left", "nome_tela" => "Sair"),		 		 
	);	
	
	foreach ($list_result as $list_r) {
		$profile = new Template("../tpl/screen-nav-list.tpl");	
	 
		foreach ($list_r as $key => $value) {
			$profile->set($key, $value);
		}//end foreach pipe
		
		$listTemplates[] = $profile;
	}//end foreach pipes
	
	
	
	$listContents = Template::merge($listTemplates);
	
	$profile  = new Template("../tpl/index.tpl");
	$profile->set("list_lines", $listContents);
	
	/**
	 * Outputs page
	 */
	echo $profile->output();
	
	/* ....................................................................................... */
	
	/* -- */
	
?>
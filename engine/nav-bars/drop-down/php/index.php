<meta charset="utf-8">

<?php
	
	error_reporting(0);

	/*	
	require_once("model/conecta/conecta.php");
	require_once("model/sql/sql-pipestyle.php"); 
	*/
	
	require_once("../../../../model/classes/template.class.php");
	require_once("../../../../model/sessions/session-global.php");
	require_once("../../../../model/sessions/nav-session.php");			
	
	/* -- */
		
	/* ....................................................................................... */
	
	/*	
	 - screen_table: tabela principal que serah utilizada para o recurso. 
	 - screen_label: referencia interna para identificar a 'session de navegacao' e campos do 'form master'.
	 - nome_tela: nome que serah utilizado no header para mostrar ao usuario em que tela estamos.
	 - engine: recurso utilizado para carregar os dados na tela.(grades, boxes,...);	
	 - icone: icone utilizado dentro do menu.
	*/
	
	if($TIPO_USER_LOGADO=="MIGRA"){
				
		$list_result = array(				 		 		 
			 array("id" => "1", "screen_table" => "","screen_label" => "", "icone" => "read-more", "nome_tela" => "Visão geral"),		 		 
			 array("id" => "2","screen_table" => "", "screen_label" => "seguradoras", "engine" => "", "icone" => "enhanced_encryption", "nome_tela" => "seguradoras"),				 
			 array("id" => "3","screen_table" => "MIGRA_CLIENTES", "screen_label" => "clientes", "engine" => "dynamic-grid", "form_mode" => "fm_mode2", "icone" => "users", "nome_tela" => "Clientes"),				 
			 array("id" => "4","screen_table" => "MIGRA_FLUXO_CAIXA", "screen_label" => "financeiro_migra", "engine" => "box-grid-mixed", "icone" => "safe", "form_mode" => "fm_mode3", "nome_tela" => "financeiro migra"),				 
			 //array("id" => "5","screen_table" => "RELATORIOS", "screen_label" => "relatorios", "engine" => "dynamic-grid", "icone" => "files", "form_mode" => "fm_mode3", "nome_tela" => "Relatorios"),	
			 array("id" => "5","screen_table" => "MIGRA_USUARIOS", "screen_label" => "cad_user", "engine" => "dynamic-grid", "icone" => "person_pin", "form_mode" => "fm_mode3", "nome_tela" => "Cadastro de usuários"),	
			 array("id" => "6", "screen_label" => "sair", "icone" => "subdirectory_arrow_left", "nome_tela" => "Sair"),			 		 		 
		);
						
	}//end if tipo_user_logado = Migra
	
	
	if($TIPO_USER_LOGADO=="CLIENTE"){
		
		$list_result = array(				 		 		 
			 array("id" => "1", "screen_table" => "","screen_label" => "", "icone" => "read-more", "nome_tela" => "Visão geral"),		 		 			 
			 array("id" => "6", "screen_label" => "sair", "icone" => "subdirectory_arrow_left", "nome_tela" => "Sair"),			 		 		 
		);
		
	}//end if tipo_user_logado = Cliente
	
		
	
	foreach ($list_result as $list_r) {
		$profile = new Template("../tpl/drop-down-list.tpl");	
	 
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
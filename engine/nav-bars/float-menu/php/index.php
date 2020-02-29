<meta charset="utf-8">

<?php
	
	$screen_label = $_GET['screen_label'];	
	$action_nav_btn = $_GET['action_nav_btn'];		
	$id_category_filter = $_GET['id_category_filter'];
	
	//echo $action_nav_btn;die;
	
	require_once("../../../../model/classes/template.class.php");		
	require_once("../../../../model/sessions/session-global.php");
	require_once("../../../../model/sessions/nav-session.php");		
	require_once("../../../../model/conecta/conecta.php");		
	require_once("../../../../model/sql/sql-global.php");
	
	
	/* -- */
	
	/* ....................................................................................... */						
	if($id_category_filter==''){
		$rs_action = $rs_dynamic_sub_category;
	}else{
		$rs_action = $rs_dynamic_sub_category_by_category;
	}		
	/* ....................................................................................... */					
	
	/* -- */
	
	/* ...................................................... */
	while($row = mysql_fetch_array($rs_action)){
		
			/* ......... global .........*/			
			$id_primary = $row['id_sub_categoria'];												
			$id_categoria = $row['id_categoria'];												
			$id_sub_categoria = $row['id_sub_categoria'];												
			$sub_categoria = $row['sub_categoria'];								
			/* ......... /global .........*/
			
			/* -- */
						
		
		//nome da categoria 
		$sql_dynamic_categoria_by_id = "SELECT * FROM ".$screen_label."_categoria WHERE id_categoria = $id_categoria";
		$rs_dynamic_categoria_by_id = mysql_query($sql_dynamic_categoria_by_id);		
		while($row = mysql_fetch_array($rs_dynamic_categoria_by_id)){
				$categoria = $row['categoria'];		
		}
		
		//nome da sub_categoria 
		$sql_dynamic_sub_categoria_by_id = "SELECT * FROM ".$screen_label."_sub_categoria WHERE id_sub_categoria = $id_sub_categoria";
		$rs_dynamic_sub_categoria_by_id = mysql_query($sql_dynamic_sub_categoria_by_id);		
		while($row = mysql_fetch_array($rs_dynamic_sub_categoria_by_id)){
				$sub_categoria = $row['sub_categoria'];		
		}
		
		//nome do contato
		$sql_contatos_by_id = "SELECT * FROM contatos WHERE id = $id_contato";
		$rs_contatos_by_id = mysql_query($sql_contatos_by_id);		
		while($row = mysql_fetch_array($rs_contatos_by_id)){
				$nome = $row['nome'];		
		}
		
		//nome do responsavel
		$sql_login_responsavel_by_id = "SELECT * FROM cad_login WHERE id_login = $id_login_responsavel";
		$rs_login_responsavel_by_id = mysql_query($sql_login_responsavel_by_id);		
		while($row = mysql_fetch_array($rs_login_responsavel_by_id)){
				$usuario_responsavel = $row['usuario'];		
		}

		//nome de quem cadastrou
		$sql_login_cadastrou_by_id = "SELECT * FROM cad_login WHERE id_login = $id_login_cadastrou";
		$rs_login_cadastrou_by_id = mysql_query($sql_login_cadastrou_by_id);		
		while($row = mysql_fetch_array($rs_login_cadastrou_by_id)){
				$usuario_cadastrou = $row['usuario'];		
		}		
		
		/* -- */
		
		/* .................................................... */		
		
		/* -- */
			
		$dynamic_array = array(		
				  array(				   
				   "id_primary" => $id_primary, 
				   "id_categoria" => $id_categoria,
				   "id_sub_categoria" => $id_sub_categoria,				   
				   "sub_categoria" => $sub_categoria				   							 
				   ));	
		
		foreach ($dynamic_array as $dy_arr) {
			$profile  = new Template("../tpl/list_float_menu.tpl");			
		 
			foreach ($dy_arr as $key => $value) {
				$profile->set($key, $value);
			}//end foreach 
			
			$dy_arrTemplates[] = $profile;
		}//end foreach 
			
		}//end while 	
		
		$dy_arrContents = Template::merge($dy_arrTemplates);
		
		$profile  = new Template("../tpl/index.tpl");		
		/* ...................................................... */
		
		/* -- */	
		
		/* ...................................................... */
			
			if($id_primary!=''){
				$profile->set("list_float_menu", $dy_arrContents);
			}else{
				$profile->set("list_float_menu", "<span class='inner_box_info'>Listagem vazia.</span>");
			}
			
		/* ...................................................... */
		
		/* -- */		
		
		/* ....................................................................................... */	
		$profile->set("screen_label", $screen_label);		
		$profile->set("action_nav_btn", $action_nav_btn);	
		$profile->set("engine_session", $engine_escolhida_session);		
		$profile->set("id_category_filter", $id_category_filter);				
		/* ....................................................................................... */
		
		/* -- */	
			
		echo $profile->output();		
			
	/* ....................................................................................... */
	
?>
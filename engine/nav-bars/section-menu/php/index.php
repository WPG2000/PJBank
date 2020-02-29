<meta charset="utf-8">

<?php
	
	error_reporting(0);
	
	//$screen_label = $_GET['screen_label'];
	$id_status_escolhido = $_GET['id_status_escolhido'];
	
	/* -- */
	
	/* ....................................................................................... */
	require_once("../../../../model/classes/template.class.php");
	require_once("../../../../model/sessions/session-global.php");
	require_once("../../../../model/sessions/nav-session.php");			
	require_once("../../../../model/conecta/conecta.php");	
	require_once("../../../../model/sql/sql-global.php");	
	/* ....................................................................................... */
	
	/* -- */
		
	/* ....................................................................................... */	
	switch ($screen_label_session) {	
		
		case 'seguro_fianc':
		
			if($nome_empresa_session=='porto-seguro'){
				$list_result = array(				 		 		 
					array("id_status" => "0", "ordem_status"=>"0", "action"=>"todos", "score"=>$soma_todos_seguros_porto, "custom_style_score"=>"background-color:#FFF;color:#2a6290;border:1px solid rgba(217, 228, 239, 0.9);", "screen_table" => "MIGRA_SEG_FIA_PORTO", "nome_tela"=>"seguro", "screen_label" => "seguro_fianc", "engine" => "dynamic-list", "icone" => "drawer", "nome" => "Todos"),		 		 
					array("id_status" => "1", "ordem_status"=>"1", "action"=>"novos", "score"=>$soma_seguros_porto_novos, "custom_style_score"=>"background-color:#1E90FF", "screen_table" => "MIGRA_SEG_FIA_PORTO", "nome_tela"=>"seguro fiança", "screen_label" => "seguro_fianc", "engine" => "dynamic-list", "icone" => "bell2", "class"=>"section_menu_active", "display"=>"inline-block", "nome" => "Novos"),
					array("id_status" => "2", "ordem_status"=>"2", "action"=>"em_analise", "score"=>$soma_seguros_porto_em_analise, "custom_style_score"=>"background-color:#CD9B1D", "screen_table" => "MIGRA_SEG_FIA_PORTO", "nome_tela"=>"seguro fiança", "screen_label" => "seguro_fianc", "engine" => "dynamic-list", "icone" => "search9", "class"=>"", "display"=>"", "nome" => "Em análise"),		 		 
					array("id_status" => "3", "ordem_status"=>"3", "action"=>"aprovados", "score"=>$soma_seguros_porto_aprovados, "custom_style_score"=>"background-color:#66CDAA", "screen_table" => "MIGRA_SEG_FIA_PORTO", "nome_tela"=>"seguro fiança", "screen_label" => "seguro_fianc", "engine" => "dynamic-list", "icone" => "thumbs-up2", "nome" => "Aprovados"),				 
					array("id_status" => "4", "ordem_status"=>"4", "action"=>"reprovados", "score"=>$soma_seguros_porto_reprovados, "custom_style_score"=>"background-color:#EE2C2C", "screen_table" => "MIGRA_SEG_FIA_PORTO", "nome_tela"=>"seguro fiança", "screen_label" => "seguro_fianc", "engine" => "dynamic-list", "icone" => "thumbs-down2", "nome" => "Reprovados"),			 		 		 
				);			
			}//end if
			break;
		
		case 'financeiro_migra':				
			$list_result = array(				 		 		 
				array("id_status" => "1", "ordem_status"=>"1", "action"=>"todos", "score"=>$soma_contas_do_dia_financ_migra, "custom_style_score"=>"background-color:#FFF;color:#2a6290;border:1px solid rgba(217, 228, 239, 0.9);", "screen_table" => "", "nome_tela"=>"financeiro migra", "screen_label" => "financeiro_migra", "engine" => "box-grid-mixed", "icone" => "coins", "class"=>"section_menu_active", "display"=>"inline-block", "nome" => "Contas do dia"),		 		 
				array("id_status" => "2", "ordem_status"=>"2", "action"=>"Quitar", "score"=>$soma_quitar_financ_migra, "custom_style_score"=>"background-color:#EEB422", "screen_table" => "", "nome_tela"=>"financeiro migra", "screen_label" => "financeiro_migra", "engine" => "dynamic-grid", "icone" => "attach_money", "nome" => "Quitar"),				
				array("id_status" => "3", "ordem_status"=>"3", "action"=>"fluxo_de_caixa", "score"=>$soma_fluxo_financ_migra, "custom_style_score"=>"background-color:#1E90FF", "screen_table" => "", "nome_tela"=>"financeiro migra", "screen_label" => "financeiro_migra", "engine" => "dynamic-grid", "icone" => "safe", "class"=>"", "display"=>"", "nome" => "Fluxo de Caixa"),		 		 
			);	
			break;
			
		case 'seguro_incendio':				
			$list_result = array(				 		 		 				
				array("id_status" => "1", "ordem_status"=>"1", "action"=>"novos", "score"=>$soma_seguro_inc_tokio_novo, "custom_style_score"=>"background-color:#1E90FF;color:#FFF;", "screen_table" => "MIGRA_SEG_INCENDIO", "nome_tela"=>"seguro incêndio", "screen_label" => "seguro_incendio", "engine" => "dynamic-grid", "icone" => "bell-o", "class"=>"section_menu_active", "display"=>"inline-block", "nome" => "novos"),		 		 				
				array("id_status" => "2", "ordem_status"=>"2", "action"=>"aceitos", "score"=>$soma_seguro_inc_tokio_aceito, "custom_style_score"=>"background-color:#FF8247;color:#FFF;border:0px solid rgba(217, 228, 239, 0.9);", "screen_table" => "MIGRA_SEG_INCENDIO", "nome_tela"=>"seguro incêndio", "screen_label" => "seguro_incendio", "engine" => "dynamic-grid", "icone" => "price-ribbon", "nome" => "aceitos"),		 		 																				 				
				array("id_status" => "3", "ordem_status"=>"3", "action"=>"aprovados", "score"=>$soma_seguro_inc_tokio_aprovado, "custom_style_score"=>"background-color:#43CD80;color:#FFF;border:0px solid rgba(217, 228, 239, 0.9);", "screen_table" => "MIGRA_SEG_INCENDIO", "nome_tela"=>"seguro incêndio", "screen_label" => "seguro_incendio", "engine" => "dynamic-grid", "icone" => "thumbs-up2", "nome" => "aprovados"),		 		 																				 				
				array("id_status" => "4", "ordem_status"=>"4", "action"=>"ativos", "score"=>$soma_seguro_inc_tokio_ativo, "custom_style_score"=>"background-color:#00CED1;color:#FFF;border:0px solid rgba(217, 228, 239, 0.9);", "screen_table" => "MIGRA_SEG_INCENDIO", "nome_tela"=>"seguro incêndio", "screen_label" => "seguro_incendio", "engine" => "dynamic-grid", "icone" => "checkmark3", "nome" => "ativos"),		 		 																				 				
				array("id_status" => "5", "ordem_status"=>"5", "action"=>"inativos", "score"=>$soma_seguro_inc_tokio_inativo, "custom_style_score"=>"background-color:#EE2C2C;color:#FFF;border:0px solid rgba(217, 228, 239, 0.9);", "screen_table" => "MIGRA_SEG_INCENDIO", "nome_tela"=>"seguro incêndio", "screen_label" => "seguro_incendio", "engine" => "dynamic-grid", "icone" => "circle-half", "nome" => "inativos"),		 		 																				 				
				array("id_status" => "6", "ordem_status"=>"6", "action"=>"cancelados", "score"=>$soma_seguro_inc_tokio_cancelado, "custom_style_score"=>"background-color:#000000;color:#FFF;border:0px solid rgba(217, 228, 239, 0.9);", "screen_table" => "MIGRA_SEG_INCENDIO", "nome_tela"=>"seguro incêndio", "screen_label" => "seguro_incendio", "engine" => "dynamic-grid", "icone" => "minus-alt", "nome" => "cancelados"),		 		 																				 				
			);	
			break;
			
		case 'seguro_conteudo':				
			$list_result = array(				 		 		 				
				array("id_status" => "1", "ordem_status"=>"1", "action"=>"novos", "score"=>$soma_seguro_conteudo_tokio_novo, "custom_style_score"=>"background-color:#1E90FF;color:#FFF;", "screen_table" => "MIGRA_SEG_CONTEUDO", "nome_tela"=>"seguro incêndio", "screen_label" => "seguro_conteudo", "engine" => "dynamic-grid", "icone" => "bell-o", "class"=>"section_menu_active", "display"=>"inline-block", "nome" => "novos"),		 		 				
				array("id_status" => "2", "ordem_status"=>"2", "action"=>"aceitos", "score"=>$soma_seguro_conteudo_tokio_aceito, "custom_style_score"=>"background-color:#FF8247;color:#FFF;border:0px solid rgba(217, 228, 239, 0.9);", "screen_table" => "MIGRA_SEG_CONTEUDO", "nome_tela"=>"seguro conteúdo", "screen_label" => "seguro_conteudo", "engine" => "dynamic-grid", "icone" => "price-ribbon", "nome" => "aceitos"),		 		 																				 				
				array("id_status" => "3", "ordem_status"=>"3", "action"=>"aprovados", "score"=>$soma_seguro_conteudo_tokio_aprovado, "custom_style_score"=>"background-color:#43CD80;color:#FFF;border:0px solid rgba(217, 228, 239, 0.9);", "screen_table" => "MIGRA_SEG_CONTEUDO", "nome_tela"=>"seguro conteúdo", "screen_label" => "seguro_conteudo", "engine" => "dynamic-grid", "icone" => "thumbs-up2", "nome" => "aprovados"),		 		 																				 				
				array("id_status" => "4", "ordem_status"=>"4", "action"=>"ativos", "score"=>$soma_seguro_conteudo_tokio_ativo, "custom_style_score"=>"background-color:#00CED1;color:#FFF;border:0px solid rgba(217, 228, 239, 0.9);", "screen_table" => "MIGRA_SEG_CONTEUDO", "nome_tela"=>"seguro conteúdo", "screen_label" => "seguro_conteudo", "engine" => "dynamic-grid", "icone" => "checkmark3", "nome" => "ativos"),		 		 																				 				
				array("id_status" => "5", "ordem_status"=>"5", "action"=>"inativos", "score"=>$soma_seguro_conteudo_tokio_inativo, "custom_style_score"=>"background-color:#EE2C2C;color:#FFF;border:0px solid rgba(217, 228, 239, 0.9);", "screen_table" => "MIGRA_SEG_CONTEUDO", "nome_tela"=>"seguro conteúdo", "screen_label" => "seguro_conteudo", "engine" => "dynamic-grid", "icone" => "circle-half", "nome" => "inativos"),		 		 																				 				
			);	
			break;
			
		case 'cad_user':				
			$list_result = array(				 		 		 				
				array("id_status" => "1", "ordem_status"=>"1", "action"=>"cadastro", "score"=>"", "custom_style_score"=>"background-color:transparent;color:#FFF;", "nome_tela"=>"Usuários", "screen_label" => "config", "engine" => "dynamic-grid", "icone" => "person_pin", "class"=>"section_menu_active", "display"=>"inline-block", "nome" => "Usuários"),		 		 								
			);	
		break;

		case '':				
			$list_result = array(				 		 		 
			//array("id" => "1", "section_style"=>"display:none;"),		 		 					 		 		
			//array("id" => "2", "score"=>"","screen_table" => "","screen_label" => "", "icone" => "box", "nome" => "TokyoMarine"),
			);	
						
			break;			
			
	}//end switch	
		

	
	foreach ($list_result as $list_r) {
		$profile = new Template("../tpl/section-list.tpl");	
	 
		foreach ($list_r as $key => $value) {
			$profile->set($key, $value);
		}//end foreach pipe
		
		$listTemplates[] = $profile;
	}//end foreach pipes
	
	
	
	$listContents = Template::merge($listTemplates);
	
	$profile  = new Template("../tpl/index.tpl");
	$profile->set("list_lines", $listContents);	
	
	$profile->set("id_status_escolhido", $id_status_escolhido);
	$profile->set("screen_label_session", $screen_label_session);
	$profile->set("tipo_user_logado", $TIPO_USER_LOGADO);	
	
	/**
	 * Outputs page
	 */
	echo $profile->output();
	
	/* ....................................................................................... */
	
	/* -- */
	
?>
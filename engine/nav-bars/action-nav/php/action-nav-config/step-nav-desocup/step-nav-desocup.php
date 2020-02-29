<?php

	include("../../../../model/sql/sql_desocup.php");
			
			if(($SITUACAO_DESOCUP=="OCUPADO")or($SITUACAO_DESOCUP=="")){
				$valid_step_nav = "lock";
				$info_tool_tip_step_nav = "Realize o primeiro passo para continuar.";
			}else{
				$valid_step_nav = "free";
				$info_tool_tip_step_nav = "";
			}//end if
			
			$list_result = array(				 		 		 				
				
				array(
						"id_step_nav" => "1", 						 																											
						"order_step_nav" => "0",
						"icon_step_nav" => "icon-megaphone",
						"label_step_nav" => "Pedido",
						"message_step_nav" => "<b>$id_imovel</b> $SITUACAO_DESOCUP",
						"info_tool_tip_step_nav" =>"",
						"valid_step_nav" => "free",
						"nome_tela" => "Desocupação",						
						"engine" => "form-master",
						"screen_label" => "desocup_pedido",
						"form_mode" => "fm_mode5",
					),
					
				array(
						"id_step_nav" => "2", 	
						"order_step_nav" => "1",	
						"icon_step_nav" => "icon-attach_file",
						"label_step_nav" => "Anexos",
						"message_step_nav" => "",
						"info_tool_tip_step_nav" =>$info_tool_tip_step_nav,
						"valid_step_nav" => $valid_step_nav,
						"nome_tela" => "Desocupação - Anexos",
						"engine" => "form-master",
						"screen_label" => "desocup_anexos",
						"form_mode" => "fm_mode5",
					),
					
				array(
						"id_step_nav" => "3",
						"order_step_nav" => "2",	
						"icon_step_nav" => "icon-calendar8",
						"label_step_nav" => "Agendamento",
						"message_step_nav" => "",
						"info_tool_tip_step_nav" =>$info_tool_tip_step_nav,
						"valid_step_nav" => $valid_step_nav,
						"nome_tela" => "Desocupação  - Agendamento",
						"engine" => "form-master",
						"screen_label" => "desocup_agendamento",
						"form_mode" => "fm_mode5",
					),
					
									
			);


?>
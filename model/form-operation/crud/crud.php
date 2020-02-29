<?php

/* -- */

/* ............................................................................. */
error_reporting(0);

require ("../../sessions/session-global.php");
require ("../../sessions/nav-session.php");
require ('../../conecta/conecta-gregorisoft.php');
require ('../../conecta/conecta-imoboffice.php');
/* ............................................................................. */

	/* -- */
	
	/* ................................ UsoGlobal .................................. */
	$data_hoje = date('Y-m-d');
	$action_nav_btn = $_REQUEST['action_nav_btn'];
	$screen_label = $_REQUEST['screen_label'];
	$id_escolhido = $_REQUEST['id_escolhido'];
	$ID_EMPR = $_POST['ID_EMPR'];
	$id_status = $_POST['id_status'];
	$clean_switch = $_REQUEST['clean_switch'];
	/* ............................... /UsoGlobal .................................. */	
	
	/* -- */
	
	/* ................................ Crud Config .................................. */		
	include("crud_config/index.php");
	/* ............................... /Crud Config .................................. */
	
	/* -- */
	
	/* .............................. Config Ins & Up ................................ */													
	$db_fields_ins = $config_ins_columns;													
	$values_ins = $config_ins_values;	 																
	
	$db_fields_up = $config_up;					
	/* ............................. /Config Ins & Up ................................ */													

				
	/* ............................................................................. */
	
	/* -- */
	
	/* ....................................... Novo ................................ */
	if($action_nav_btn=='action_nav_btn_novo'){								
													
			$crud_insert = "INSERT INTO ".$config_table."($db_fields_ins) VALUES ($values_ins)";
			$rs_crud_insert = mysqli_query($connect_imoboffice,$crud_insert);
				
			mysqli_close($connect_imoboffice);
								
	}//end if action_nav_btn_novo
	
	//echo $crud_insert;die;		
	/* ...................................... /Novo ................................ */
	
	/* -- */
	
	/* ....................................... Editar ............................... */
	if($action_nav_btn=='action_nav_btn_edit'){		
			
		$crud_up = "UPDATE ".$config_table." SET 
					$db_fields_up 
					WHERE $table_id_name=$id_escolhido";
		
		//echo $crud_up;die; 
		
		$rs_crud_up = mysqli_query($connect_imoboffice,$crud_up);
		
		mysqli_close($connect_imoboffice);
		
		if($rs_crud_up==true){
			echo "ok!";
		}else{
			echo "erro...";
		}
	}	
	//echo $crud_up;die;	
	/* ...................................... /Editar ............................... */

	/* -- */

	/* ....................................... Deletar ............................... */
		if($action_nav_btn=='action_nav_btn_delete'){		
									
			$crud_delete = "
							DELETE FROM
								$config_table 						
							WHERE 
								$table_id_name=$id_escolhido
							";
			
			//echo $crud_delete;die; 
			
			$rs_crud_delete = mysqli_query($connect_imoboffice,$crud_delete);
			
			mysqli_close($connect_imoboffice);
			
			if($rs_crud_delete==true){
				echo "ok!";
			}else{
				echo "erro...";
			}
		}	
		//echo $crud_up;die;	
	/* ...................................... /Deletar ............................... */

	/* -- */	
	
	
?>
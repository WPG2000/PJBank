<?php

	date_default_timezone_set('America/Sao_Paulo');				
	$data_agora = date("d-m-Y");
	$hora_agora = date("H-i-s");	
	
	$id_primary = $_REQUEST['id_primary'];
	//echo "id_primary: ".$id_primary;				 
		
	$choosed_input = $_GET['choosed_input'];	
	//echo $choosed_input;die;
	
	$hidden_type_btn = $_GET['hidden_type_btn'];
	//echo $hidden_type_btn;die; //used for delete mode
	
	$file_name = $_FILES['get_file']['name'];
	$file_type = $_FILES['get_file']['type'];
	$file_size = $_FILES['get_file']['size'];
	$file_tmp_name = $_FILES['get_file']['tmp_name'];
	$file_error = $_FILES['get_file']['error'];					 
					
		foreach($file_name as $fn){											
			$file_basename []= substr($fn, 0, strripos($fn, '.'));//get only file name			
			$file_ext []= substr($fn, strripos($fn, '.'));//get only file extension						
			$fn_array []= $fn;								
		}//end foreach
		
		foreach($file_type as $ft){								
			$ft_array []= $ft;					
		}//end foreach
		
		foreach($file_size as $fs){								
			$fs_array []= $fs;					
		}//end foreach
		
		foreach($file_tmp_name as $ftn){								
			$ftn_array []= $ftn;					
		}//end foreach
		
		foreach($file_error as $ferr){								
			$ferr_array []= $ferr;					
		}//end foreach
		
			$fn_join = join($fn_array);
			$fbname_join = join($file_basename);
			$fext_join = join($file_ext);
			$ft_join = join($ft_array);
			$fs_join = join($fs_array);
			$ftn_join = join($ftn_array);
			
						
				$destino = "desocup_imagens_anexadas/";
				
				if($hidden_type_btn=="ntab_li_col_info_btn_delete"){
					
					$new_file_name = "";									 
				
				}else{
					
					$new_file_name = $fbname_join."-".$data_agora."-".$hora_agora.$fext_join;
				
					 move_uploaded_file($ftn_join,$destino.$new_file_name);												
					
				}//end if
		
		$config_up = "	
				   $choosed_input='$new_file_name'				  			
		";
?>
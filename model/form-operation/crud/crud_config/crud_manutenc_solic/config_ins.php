<?php		
		
	$config_ins_columns = "								
							SOLICITANTE, 
							IDCONTRLOC,
							IDIMOVEL, 
							IDUSER, 
							ID_EMPR, 
							IDLOCATARIO, 
							NIVEL, 
							DATA, 
							DESCRCAO, 
							TIPO_SOLICITACAO, 
							IMOB		
						";
	
	$config_ins_values = "							
							'LOCATÁRIO', 
							'$id_contrato_loc',
							'$id_imovel', 
							'$_SESSION[id]', 
							'$id_empr',
							'$_SESSION[id]',			
							'$urgencia',  
							'$data_hoje', 
							'$descr',
							'$tipo',							
							'SIM'
					";	

					


								

?>
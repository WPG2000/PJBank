<?php
	/* -- */
	
	/* ........................................................ */	
	//$min_date = str_replace("-", "/", $_GET["min_date"]);	
	//$min_date = date('d/m/Y', strtotime($min_date)); 
	
	//$max_date = str_replace("-", "/", $_GET["max_date"]);	
	//$max_date = date('d/m/Y', strtotime($max_date)); 
	
	$min_date_origem = explode('-', $_GET['min_date']);	
	$min_date = $min_date_origem[2].'/'.$min_date_origem[1].'/'.$min_date_origem[0];			   				
	
	$max_date_origem = explode('-', $_GET['max_date']);
	$max_date = $max_date_origem[2].'/'.$max_date_origem[1].'/'.$max_date_origem[0];			   	
	
		if(($min_date=="//")or($max_date=="//")){
			
			$min_date = "";
			$max_date = "";
			
		}else{
			
		}//end if/else
	
	/* ........................................................ */	
	
	/* -- */
	
	/* ........................................................ */
	require_once("../../../../model/classes/template.class.php");		
	require_once("../../../../model/sessions/session-global.php");
	require_once("../../../../model/sessions/nav-session.php");
	require_once("../../../../model/conecta/conexao_cliente.php");	
	/* ........................................................ */
	
	/* -- */
	
	/* ........................................................ */
	switch ($screen_label_session) {				
		
		case "repasses":	
										
			//include("../../../../model/sql/sql_repasses_realizados.php");				
						
		break;
		
	}//end switch
	/* ........................................................ */
	
	/* -- */
	
	/* ........................................................ */
	$profile  = new Template("../../html/application-dynamic-grid-filters/dynamic-grid-pdf-generate.html");		
	/* ........................................................ */
	
	/* -- */
		
	/* ....................................................................................... */	
	$profile->set("screen_label_session", $screen_label_session);	
	$profile->set("min_date", $min_date);
	$profile->set("max_date", $max_date);
	/* ....................................................................................... */	

	/* -- */		
	
	/* ....................................................................................... */	
	//$profile->set("data_pgto", join($data_pgto));	
	/* ....................................................................................... */	
	
	/* ....................................................................................... */		
	echo $profile->output();		
	/* ....................................................................................... */

	/* -- */
?>
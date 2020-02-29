<?php

$id_primary = $_POST['id_primary'];
	
	if(isset($_POST['anexo_comprovante_quit_iptu'])){
		$anexo_comprovante_quit_iptu = $_POST['anexo_comprovante_quit_iptu'];
	}else{
		die;
	}
	
	
	
	
	$anexo_cond_cort_quit = $_POST['anexo_cond_cort_quit'];
	$anexo_seguro = $_POST['anexo_seguro'];
	$anexo_energia = $_POST['anexo_energia'];	
	$anexo_gas = $_POST['anexo_gas'];
	$anexo_comprovante_ult_doc_pago = $_POST['anexo_comprovante_ult_doc_pago'];
	$anexo_darf = $_POST['anexo_darf'];
	$anexo_diversos = $_POST['anexo_diversos'];								
	
?>
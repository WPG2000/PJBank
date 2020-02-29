<?php


$id_usuario = $_REQUEST['id_usuario'];	
$id_empr = $_REQUEST['id_empr'];	

$SITUACAO_DESOCUP = $_REQUEST['SITUACAO_DESOCUP'];	
//echo "Olá situac".$SITUACAO_DESOCUP;

if(($SITUACAO_DESOCUP=="OCUPADO")or($SITUACAO_DESOCUP=="")){

	$MOTIVO = $_POST['MOTIVO'];
	
	$getImovelDesocup = explode(",",$_POST['ID_IMOVEL']);
	
	$ID_IMOVEL = $getImovelDesocup[0];
	$ID_CONTRATO = $getImovelDesocup[1];
				
	$DESCRICAO = $_POST['DESCRICAO'];		
	
}else{
	
	die;
	
}//end if/else



?>
<?php

error_reporting(0);

$mysql_host_gregorisoft = "159.65.47.1";
$mysql_database_gregorisoft = "gregorisoft";
$mysql_user_gregorisoft = "gregorisoft";
$mysql_password_gregorisoft = "0sr0p5rrur6m20";

$connect_gregorisoft = mysqli_connect($mysql_host_gregorisoft, $mysql_user_gregorisoft, $mysql_password_gregorisoft, $mysql_database_gregorisoft);	

mysqli_set_charset($connect_gregorisoft,"utf8");
	
		
	if($ARP_config_empr_id==""){
		$id_empr_switch = $id_empr;//'id_empr' quando acessa pela tela de login area restrita	
	}
	if($id_empr==""){
		$id_empr_switch = $ARP_config_empr_id;//'ARP_config_empr_id' quando acessa pelo integrador	
	}	
			
	$sql_gre_empresas_db_gregorisoft = "SELECT * FROM gre_empresas WHERE id = '$id_empr_switch'";		
	$rs_gre_empresas_db_gregorisoft = mysqli_query($connect_gregorisoft, $sql_gre_empresas_db_gregorisoft);							
		
		$row = mysqli_fetch_assoc($rs_gre_empresas_db_gregorisoft);
	
			$Cliente_Host_Nome = $row['Host_Nome'];
			$Cliente_Host_User = $row['Host_User'];
			$Cliente_Host_DataBase = $row['Host_DataBase'];
			$Cliente_Host_Pass = $row['Host_Pass'];
			
			session_start();						
			$_SESSION['Cliente_Host_Nome'] = $Cliente_Host_Nome;
			$_SESSION['Cliente_Host_User'] = $Cliente_Host_User;
			$_SESSION['Cliente_Host_DataBase'] = $Cliente_Host_DataBase;
			$_SESSION['Cliente_Host_Pass'] = $Cliente_Host_Pass;									

?>

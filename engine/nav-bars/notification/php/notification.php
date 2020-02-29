<meta charset="utf-8">

<?php
	/*	
	require_once("model/conecta/conecta.php");
	require_once("model/sql/sql-pipestyle.php"); 
	*/
	
	require_once("../../../../model/classes/template.class.php");
	require_once("../../../../model/sessions/session-global.php");
	require_once("../../../../model/sessions/nav-session.php");			
		
		$notification_sum = "0";
		
	/* ....................................................................................... */
	
		$profile = new Template("../tpl/notification.tpl");						
		$profile->set("ref_notification", "Notification");
		$profile->set("usuario_logado", $usuario_logado);
		$profile->set("notification_sum", $notification_sum);				
		
		echo $profile->output();	
	
	/* ....................................................................................... */
	
?>
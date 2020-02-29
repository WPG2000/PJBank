<?php

    $min_date = $_GET['min_date'];
    $min_date = implode("/",array_reverse(explode("-",$min_date)));

    $max_date = $_GET['max_date'];
    $max_date = implode("/",array_reverse(explode("-",$max_date)));

    if(($min_date=="//")or($max_date=="//")){
        $min_date="";
        $max_date="";
    }

	require_once("../../../../model/classes/template.class.php");		
	require_once("../../../../model/sessions/session-global.php");
	require_once("../../../../model/sessions/nav-session.php");

	$profile  = new Template("../../html/application-dynamic-grid-filters/dynamic-grid-date-filter.html");		

	$profile->set("screen_label_session", $screen_label_session);	
	$profile->set("min_date", $min_date);
	$profile->set("max_date", $max_date);

	echo $profile->output();		

?>
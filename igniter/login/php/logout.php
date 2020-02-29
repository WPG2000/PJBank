<?php
	session_start();			
	
	//session_destroy();

	foreach ($_SESSION as $key => $value) {

		if (($key != 'id_empr_key')or($key != 'id_empr')) {

			unset($_SESSION[$key]);

		}//end if
		
	}//end foreach

    $path_parts = pathinfo( __FILE__ );

    if($path_parts['basename']=="logout.php"){
        header("location:../../../  ");
    }

	
?>
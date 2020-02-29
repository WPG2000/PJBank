<?php

    session_start();

    $hidden_choose_box = $_GET['hidden_choose_box'];
    //echo $hidden_choose_box;

    if($hidden_choose_box=="inq"){

            $_SESSION['Inquilino'] = "SIM";
            $_SESSION['Proprietario'] = "NAO";

    }//end if

    if($hidden_choose_box=="prop"){

            $_SESSION['Inquilino'] = "NAO";
            $_SESSION['Proprietario'] = "SIM";

    }//end if

?>
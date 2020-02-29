<?php

    header('Content-Type: text/html; charset=utf-8');

    require_once("../../../../../model/classes/template.class.php");
    require_once("../../../../../model/sessions/session-global.php");
    require_once("../../../../../model/sessions/nav-session.php");

    $profile  = new Template("../../../html/application-dynamic-grid-filters/btnActionWithSelecteds/dynamic-grid-btnActionWithSelecteds.html");

    $profile->set("screen_label_session", $screen_label_session);

    echo $profile->output();

?>
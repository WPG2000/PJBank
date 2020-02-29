<?php

require_once("../../../../model/classes/template.class.php");
require_once("../../../../model/sessions/session-global.php");
require_once("../../../../model/sessions/nav-session.php");
//require_once("../../../../model/conecta/conexao_cliente.php");

$profile  = new Template("../../html/application-dynamic-grid-filters/dynamic-grid-search.html");

$profile->set("screen_label_session", $screen_label_session);

echo $profile->output();

?>
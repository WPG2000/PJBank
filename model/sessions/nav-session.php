<?php

error_reporting(0);

/* -- */

/* ........................................... */
//$time = 2 * 60 * 60; //2h
//session_set_cookie_params($time);
/* ........................................... */

/* -- */

/* ........................................... */
session_start();

$screen_label_session = $_SESSION['screen_label'];
$nome_tela_session = $_SESSION['nome_tela'];
$nome_empresa_session = $_SESSION['nome_empresa'];
$screen_table_session = $_SESSION['screen_table'];
$engine_session = $_SESSION['engine'];
$box_mode_session = $_SESSION['box_mode'];
$form_mode_session = $_SESSION['form_mode'];
/* ........................................... */

/* -- */

?>
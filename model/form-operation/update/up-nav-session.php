<?php

session_start();

/* -- */

/* ............................................... */
$screen_label = $_GET['screen_label'];
$nome_tela = $_GET['nome_tela'];
$nome_empresa = $_GET['nome_empresa'];
$screen_table = $_GET['screen_table'];
$engine = $_GET['engine'];
$box_mode = $_GET['box_mode'];
$form_mode = $_GET['form_mode'];

$_SESSION['screen_label'] = $screen_label;
$_SESSION['nome_tela'] = $nome_tela;
$_SESSION['nome_empresa'] = $nome_empresa;
$_SESSION['screen_table'] = $screen_table;
$_SESSION['engine'] = $engine;
$_SESSION['box_mode'] = $box_mode;
$_SESSION['form_mode'] = $form_mode;
/* ............................................... */

/* -- */

/* ............................................... */


/* ............................................... */

/* -- */
?>
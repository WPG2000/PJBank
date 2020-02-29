<?php

session_start();

$path_verification_key = 'no';

$path_verification = $_SERVER['HTTP_HOST'];

if(($path_verification=="localhost") AND ($path_verification_key=="yes")){
	//Conecta localhost empresa 1
	$mysql_host_imoboffice = '127.0.0.1';
	$mysql_database_imoboffice = 'dev_porthus';
	$mysql_user_imoboffice = 'root';
	$mysql_password_imoboffice = 'root';
}else{
	//Conecta com os dados do cliente
	$mysql_host_imoboffice = $_SESSION['Cliente_Host_Nome'];
	$mysql_database_imoboffice = $_SESSION['Cliente_Host_DataBase'];
	$mysql_user_imoboffice = $_SESSION['Cliente_Host_User'];
	$mysql_password_imoboffice = $_SESSION['Cliente_Host_Pass'];
}

$connect_imoboffice = mysqli_connect($mysql_host_imoboffice, $mysql_user_imoboffice, $mysql_password_imoboffice, $mysql_database_imoboffice);	

mysqli_set_charset($connect_imoboffice,"utf8");

// Check connection
if (mysqli_connect_errno()){			
	$mysqli_connect_errno = mysqli_connect_errno();
	$mysqli_connect_error = mysqli_connect_error();
	//echo "Failed to connect to MySQL: " . $mysqli_connect_errno." - ".$mysqli_connect_error;
}

?>



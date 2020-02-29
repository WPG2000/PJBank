<?php
$mysql_host_imoboffice = "mysql.imoboffice.com.br";
$mysql_database_imoboffice = "imoboffice02";
$mysql_user_imoboffice = "imoboffice02";
$mysql_password_imoboffice = "tata1103";
$connect_imoboffice = mysqli_connect($mysql_host_imoboffice, $mysql_user_imoboffice, $mysql_password_imoboffice, $mysql_database_imoboffice);	

mysqli_set_charset($connect_imoboffice,"utf8");

// Check connection
if (mysqli_connect_errno()){			
	$mysqli_connect_errno = mysqli_connect_errno();
	$mysqli_connect_error = mysqli_connect_error();
	//echo "Failed to connect to MySQL: " . $mysqli_connect_errno." - ".$mysqli_connect_error;
}
?>
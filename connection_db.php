<?php
$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); 
$mysqli -> set_charset("utf8"); 

if ($mysqli->connect_errno){
	echo "Failed to connect:".$mysqli->connect_error." ".$mysqli->connect_errno;
	exit();
}
?>


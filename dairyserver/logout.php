<?php
$data=array();
session_start();
	$_SESSION["a"] = "";
	$_SESSION["login"] = "";	
	//session_destroy();
	$data="Logged out successfully";
	echo json_encode($data);
?>
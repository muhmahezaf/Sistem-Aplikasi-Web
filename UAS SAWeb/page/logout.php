<?php 
	session_destroy();
	unset($_COOKIE['MYCOOKIE']);
	setcookie("MYCOOKIE", "", time() - 3600,'/');
	header("Location: index.php");
	die();

 ?>
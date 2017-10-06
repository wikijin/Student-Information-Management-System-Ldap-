<?php
	session_start();
	$_SESSION["info"] = "";
	$_SESSION["access"] = "";

	$_SESSION["userinfo"] = "";
	session_regenerate_id(true);
	session_write_close();
	session_destroy();
	header('Location:http://192.168.246.183/ibm/login.php');
	exit;
?>
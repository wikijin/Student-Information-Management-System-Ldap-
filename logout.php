<?php
	session_start();
	$_SESSION["info"] = "";
	$_SESSION["access"] = "";

	session_regenerate_id(true);
	session_write_close();
	session_destroy();
	header('Location:http://192.168.246.183/log.php');
	exit;
?>
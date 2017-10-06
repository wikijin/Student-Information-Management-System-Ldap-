<?php
// initialize session
session_start();
 
if(!isset($_SESSION['user'])) {
	// user is not logged in, do something like redirect to login.php
	echo "19";
	header("Location: login.php");
	die();
}
 
if($_SESSION['access'] != 2) {
	echo"50"
	// another example...
	// user is logged in but not a manager, let's stop him
	die("Access Denied");
}
?>
 
<p><strong>Secret Protected Content Here!</strong></p>
 
<p>Mary Had a Little Lamb</p>
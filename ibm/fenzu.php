<?php
    session_start();
    $access = $_SESSION["access"];
    $info = $_SESSION["info"];
   /// echo $access;
    include("authenticate.php");
    if($access == ""){
         header('Location:http://192.168.246.183/ibm/protect.php');
     }
    if($access == 1){
    	header('Location:http://192.168.246.183/ibm/manager.php');
    }
    if($access == 2){
    	header('Location:http://192.168.246.183/ibm/user.php');
    }
 ?>
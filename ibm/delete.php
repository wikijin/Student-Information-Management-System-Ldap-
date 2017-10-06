<?php
    session_start();
    $access = $_SESSION["access"];
    $info = $_SESSION["info"];
    $userinfo = $_SESSION["userinfo"];
    if($access == ""){
         header('Location:http://192.168.246.183/ibm/protect.php');
    }
    
    if($access != 1){
    	echo "You have no Access!";
    }else{
    	include("authenticate.php");
    	if($ldapbind){
    		for ($i=0; $i<$info["count"]; $i++)
        {
            $uid = $userinfo[$i]["dn"];
            

        }
    		$delete = ldap_delete($ldapconn,$uid);
    		if($delete){
    		echo"delete sucess";
    	}
    	}

    }
?>
<a href="manager.php">Back</a>/>

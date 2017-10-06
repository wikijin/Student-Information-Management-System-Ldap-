<?php
    session_start();
    $access = $_SESSION["access"];
    $info = $_SESSION["info"];
    $userinfo = $_SESSION["userinfo"];
    
    if($access != 1){
    	echo "You have no Access!";
    }else{
    	include("authenticate.php");
    	if($ldapbind){
    		for ($i=0; $i<$info["count"]; $i++)
        {
            $uid = $userinfo[$i]["dn"];
            

        }
         $userdata['userpassword'][0] = "000";
    		$result = ldap_mod_replace($ldapconn, $uid, $userdata);
    		if($result){
    		echo"Secess Reset password to 000";
    	}
    	}

    }
?>
<a href="manager.php">Back</a>/>

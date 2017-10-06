<?php
	
	session_start();

	$userinfo = $_SESSION["userinfo"];

	//echo "1";

	//echo $userinfo[0]["beer"][0];

     for ($i=0; $i<$userinfo["count"]; $i++) {
        
        // Print out the user information here. For those uid, displayname, userprincipalname and emailaddress are those data inside a user profile. It will be different for your LDAP setup.
    	print "<pre>";
        echo  $userinfo[$i]["givenname"][0] . "\n";
        //echo "displayName entry is: " . $info[$i]["displayname"][0] . "\n";
    //echo "beer is:" . $info[$i}["beer"][0] . "\n";
        echo "favourate beer is " . $userinfo[$i]["beer"][0] . "\n";
    	echo "\n";
        //echo "userPrincipalName entry is: " . $info[$i]["emailaddress"][0] . "\n";
    }
//ldap_close($ds);
?>
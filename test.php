<?php

// using ldap bind
$ldaprdn  = "cn=admin,dc=ldap,dc=com";     // ldap rdn or dn
$ldappass = "333";  // associated password

// connect to ldap server
$ldapconn = ldap_connect("ldap://localhost:389")
    or die("Could not connect to LDAP server.");
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
if ($ldapconn) {

    // binding to ldap server
   $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
   // $ldapbind = ldap_bind($ldapconn);
    // verify binding
    if ($ldapbind) {
        $sr=ldap_search($ldapconn, "dc=ldap,dc=com", "uid=hanchen");
    $info = ldap_get_entries($ldapconn, $sr);
     print"<pre>";
     print_r ($info);
     echo $info[0]["beer"][0];
     //for ($i=0; $i<$info["count"]; $i++) {
        
        //Print out the user information here. For those uid, displayname, userprincipalname and emailaddress are those data inside a user profile. It will be different for your LDAP setup.
    
        //echo "uid is: " . $info[$i]["uid"][0] . "\n";
        //echo "displayName entry is: " . $info[$i]["displayname"][0] . "\n";
    //echo "beer is:" . $info[$i}["beer"][0] . "\n";
        //echo "beer is " . $info[$i]["beer"][0] . "\n";
    //echo "\n";
        //echo "userPrincipalName entry is: " . $info[$i]["emailaddress"][0] . "\n";
    //}
//ldap_close($ds);
    } else {
        echo "LDAP bind failed...";
    }
}



?>
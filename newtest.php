<?php

//include("information.php");

// $ldaprdn = "cn=admin,dc=ldap,dc=com";
// $ldappass = 333;

// $ldapconn = ldap_connect("ldap://localhost:389") 
// 	or die("Could not connect to LDAP server");

// ldap_set_option($ldapconn,LDAP_OPT_PROTOCOL_VERSION,3);
//ldap_set_option($ldapconn,LDAP_OPT_REFERRALS,0);
$ldapdomain = "@ldap.com";
$user = 'hanchen';
$ldaprdn = "uid=hanchen,ou=users,dc=ldap,dc=com";
$ldappass = "333";

$ldapconn = ldap_connect("192.168.42.20") 
	or die("Could not connect to LDAP server");

ldap_set_option($ldapconn,LDAP_OPT_PROTOCOL_VERSION,3);

if($ldapconn){
	//$ldapbind = @ldap_bind($ldapconn,$ldaprdn,$ldappass);
	//$ldapbind = @ldap_bind($ldapconn,$ldaprdn,$ldappass);
	$ldapbind = ldap_bind($ldapconn);
	if($ldapbind){
		echo "good";
	}else{
		echo "good try! !";
	}
}

?>
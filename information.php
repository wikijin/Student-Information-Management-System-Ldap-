<?php

$ldaprdn = "uid=hanchen,ou=users,dc=ldap,dc=com";
$ldappass = "333";

$ldapconn = ldap_connect("ldap://localhost:389") 
	or die("Could not connect to LDAP server");

ldap_set_option($ldapconn,LDAP_OPT_PROTOCOL_VERSION,3);
?>
<?php

$ldapconn = ldap_connect("192.168.42.114") 
	or die("Could not connect to LDAP server");

ldap_set_option($ldapconn,LDAP_OPT_PROTOCOL_VERSION,3);

$ldapbind = ldap_bind($ldapconn,"cn=root","Passw0rd");

if(!$ldapbind){
	echo"error!";
}

?>
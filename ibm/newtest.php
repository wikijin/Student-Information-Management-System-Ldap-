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
//$ldaprdn = "uid=hanchen,ou=users,dc=ldap,dc=com";
//$ldaprdn = "cn=root";
$ldaprdn = "uid=weiyu,o=user,c=us";
//$ldappass = "Passw0rd";
$ldappass = "333";

//$ldapconn = ldap_connect("192.168.42.20") 
$ldapconn = ldap_connect("192.168.42.114") 
	or die("Could not connect to LDAP server");

ldap_set_option($ldapconn,LDAP_OPT_PROTOCOL_VERSION,3);

if($ldapconn){
	$ldapbind = ldap_bind($ldapconn,"cn=root","Passw0rd");
	//$ldapbind = @ldap_bind($ldapconn,$ldaprdn);
	//$ldapbind = ldap_bind($ldapconn);
	if($ldapbind){
		echo "good";
		$filter = "(uid=weiyu)";
		//$result = ldap_search($ldap,"sds1.demo.com","uid=*") or exit("sorry");
		//echo "1";
		$attr = array("memberof");
		$sr=ldap_search($ldapconn, "c=us", $filter,$attr) or exit("sorry");
		//echo "2";
		$entries = ldap_get_entries($ldapconn, $sr);
		print "</pre>";
		print_r($entries[0]);
		print "</pre>";
		foreach($entries[0] as $grps) {
			// is manager, break loop
			
			
			if(strpos($grps, "demp")) { $access = 2; break; }
 
			// is user
			if(strpos($grps, "us")) $access = 1;
		}
		echo $access;
		//echo "3";
		//$info = ldap_get_entries($ldapconn, $result);
		//echo "4";
		print "</pre>";
		print_r($result);
		print "</pre>";
		//echo "5";
		//print_r($userinfo);
		print "</pre>";
		$ldaprecord['uid'] = "chenchen";
  $ldaprecord['cn'] =  "Chenchen";
  //$ldaprecord['givenName'] = "Chenchen";
  $ldaprecord['sn'] = "Qi";
  // put user in objectClass inetOrgPerson so we can set the mail and phone number attributes
  $ldaprecord['objectclass'][0] = "inetorgperson";
  $ldaprecord['objectclass'][1] = "top";
  $ldaprecord['objectclass'][2] = "organizationalperson"; 
  //$ldaprecord['objectclass'][3] = "student";
  // $ldaprecord['major'] = $major;
  // $ldaprecord['gender'] = $gender;
  // $ldaprecord['mail'] = $email;
  // $ldaprecord['mobile'] = $mobile;
  print_r($ldaprecord);
  $r = ldap_add($ldapconn, "uid=chenchen,o=user,c=us", $ldaprecord);
  if(!$r){
  	echo"4";
		//echo "6";
  }else{
  	echo "good try ergou";
  }
	}else{
		echo "good try! !";
	}
}

?>
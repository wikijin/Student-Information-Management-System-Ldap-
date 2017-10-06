<?php
function authenticate($user, $password) {
	if(empty($user) || empty($password)) return false;
 
	// active airectory server
	$ldap_host = "ldap://localhost:389";
 
	// active directory DN (base location of ldap search)
	$ldap_dn = "dc=ldap,dc=com";
 
	// active directory user group name
	$ldap_user_group = "users";
 
	// active directory manager group name
	$ldap_manager_group = "manager";
 
	// domain, for purposes of constructing $user
	//$ldap_usr_dom = '@college.school.edu';
 
	// connect to active directory
	$ldap = ldap_connect($ldap_host);
 
	// configure ldap params
	ldap_set_option($ldap,LDAP_OPT_PROTOCOL_VERSION,3);
	ldap_set_option($ldap,LDAP_OPT_REFERRALS,0);
	echo "2.0";
 
	// verify user and password
	if($bind = @ldap_bind($ldap, $user, $password)) {
		echo "3";
		// valid
		// check presence in groups
		//$filter = "(sAMAccountName=".$user.")";
		$filter = "(uid=hanchen)";
		$attr = array("memberof");
		echo "11";
		$result = ldap_search($ldap, $ldap_dn, $filter, $attr) or exit("Unable to search LDAP server");
		$entries = ldap_get_entries($ldap, $result);
		ldap_unbind($ldap);
		 echo "15";
 
		// check groups
		foreach($entries[0]['memberof'] as $grps) {
			echo "4";
			// is manager, break loop
			if(strpos($grps, $ldap_manager_group)) { $access = 2; break; }
 
			// is user
			if(strpos($grps, $ldap_user_group)) $access = 1;
		}
 
		if($access != 0) {
			// establish session variables
			$_SESSION['user'] = $user;
			$_SESSION['access'] = $access;
			echo "7";
			return true;
		} else {
			// user has no rights
			echo "8";
			return false;
		}
 
	} else {
		// invalid name or password
		return false;
	}
}
?>
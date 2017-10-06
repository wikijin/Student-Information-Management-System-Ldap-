
<?php
	session_start();
	if($_SESSION["access"]==""){
		echo "You Have Log Out!";
	}else{
		echo $_SESSION["info"];
	$query = "(".$_POST['query'].")";
	echo $query;
	$ldap = ldap_connect("ldap://localhost:389");
	
	ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);
    $bind = @ldap_bind($ldap);

	if($bind){
		$result = ldap_search($ldap,"dc=ldap,dc=com",$query);
		//echo 1;
		//var_dump($result);


		$info = ldap_get_entries($ldap, $result);
		print"<pre>";

		print_r($info);
	}

	}
?>
<?php
	session_start();
	$access = $_SESSION["access"];
	if($_SESSION["info"]==""){
		echo "You Have Log Out!";
	}else{
		//echo $_SESSION["info"];
	$query = "(".$_POST['query'].")";
	//echo $query;
	if($access != 1){
		echo"no access permit";
	}else{
	include("authenticate.php");



	if($ldapbind){
		$result = ldap_search($ldapconn,"c=us",$query);
		//print_r($result);
		//if($result!=""){
		
		//var_dump($result);


		$info = ldap_get_entries($ldapconn, $result);
		session_start();
        $_SESSION["userinfo"] = $info;
		///print_r($info);
		if($info[0]!=0){
		
		for ($i=0; $i<$info["count"]; $i++) {
        
        // Print out the user information here. For those uid, displayname, userprincipalname and emailaddress are those data inside a user profile. It will be different for your LDAP setup.
    	print "<pre>";
        ///echo  $info[$i]["givenname"][0] . "\n";
        //echo "displayName entry is: " . $info[$i]["displayname"][0] . "\n";
    //echo "beer is:" . $info[$i}["beer"][0] . "\n";
        echo "Firstname " . $info[$i]["cn"][0] . "\n";
        echo "Lastname " . $info[$i]["sn"][0] . "\n";
        echo "Major " . $info[$i]["major"][0] . "\n";
        echo "Mobile " . $info[$i]["mobile"][0] . "\n";
        echo "Email " . $info[$i]["mail"][0] . "\n";
        echo "Gender " . $info[$i]["gender"][0] . "\n";
    	echo "\n";
        //echo "userPrincipalName entry is: " . $info[$i]["emailaddress"][0] . "\n";
    }
}else{
	echo "Sorry no such user";
}
		//print"<pre>";

		//print_r($info);
	}

	}
}
?>
<br/>
<a href="modify.php">Edit User</a>/><br/> 
<a href="delete.php">Delete User</a>/><br/>
<a href="reset.php">Reset Password</a>/><br/> 
<a href="manager.php">Back</a>/>
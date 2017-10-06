<form action="password.php" method="POST">
        <label for="username">OldPassword: </label><input id="OldPassword" type="text" name="OldPassword"/><br/>
        <label for="password">newPassword: </label><input id="newPassword" type="password" name="newPassword" /><br/>
        <label for="password">Reenter newPassword: </label><input id="newPassword1" type="password" name="newPassword1" /><br/>
        <input type="submit" name="submit" value="Change" /><br /> 
</form>

<?php
	if(isset($_POST['OldPassword']) && isset($_POST['OldPassword'])){
	session_start();
	$access = $_SESSION["access"];
	$info = $_SESSION["info"];
	include("authenticate.php");

	if($access== ""){
		echo "You Have Log Out!";
	}else{
		$password = $_POST['OldPassword'];
		$newpassword = $_POST['newPassword'];
		$newpassword1 =  $_POST['newPassword1'];
		///print_r($newpassword);
		///print_r($newpassword1);
		$uid = $info[0]["dn"];
	//print_r($uid);
	//$bind = @ldap_bind($ldapconn);
	//$ldapbind = @ldap_bind($ldapconn);
	$newldapbind = @ldap_bind($ldapconn,$uid,$password);

	if($newldapbind){
		//echo "1";
		if($newpassword == $newpassword1){
		//$result = ldap_bind($ldapconn,$uid,$password);
			///echo "2";
			$userdata = array();
		
		 $userdata['userpassword'][0] = $newpassword;
		 for ($i=0; $i<$info["count"]; $i++)
        {
            $uid = $info[$i]["dn"];
            

        }
		 ///print_r($uid);
		 include("authenticate.php");

		 $result = ldap_mod_replace($ldapconn, $uid, $userdata);
		 if($result){
		echo "secess modify password of $uid";
		header('Location:http://192.168.246.183/ibm/login.php');
	}
		//echo 1;
		//var_dump($result);


		// $info = ldap_get_entries($ldap, $result);
		// print"<pre>";

		// print_r($info);
		}else{
			echo "Invalid newpassword";
		}	
	}else{
		echo "Invalid OldPassword";
	}

	}
}
?>
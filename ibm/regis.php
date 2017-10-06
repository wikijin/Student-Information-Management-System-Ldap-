<form action="regis.php" method="POST">
        <label for="username">Username: </label><input id="username" type="text" name="username" /><br />
        <label for="password">Password: </label><input id="userPassword" type="password" name="userPassword" /><br />
        <label for="password">Firstname: </label><input id="firstname" type="text" name="firstname" /><br />
        <label for="password">Lastname: </label><input id="lastname" type="text" name="lastname" /><br />
        <label for="password">Major: </label><input id="major" type="text" name="major" /><br />
        <label for="password">Gender: </label><input id="gender" type="text" name="gender" /><br />
        <label for="password">Email: </label><input id="email" type="text" name="email" /><br />
        <label for="password">Mobile: </label><input id="mobile" type="text" name="mobile" /><br />      
        <input type="submit" name="submit" value="Register" /><br /> 
</form>

<?php
if(isset($_POST['username'])){
include("authenticate.php");
if($ldapbind){
  $uid = $_POST['username'];
  $cn =  $_POST['firstname'];
  $givenName = $_POST['firstname'];
  $sn = $_POST['lastname'];
  $password = $_POST['userPassword'];
  // put user in objectClass inetOrgPerson so we can set the mail and phone number attributes
  // $ldaprecord['objectclass'][0] = "inetOrgPerson";
  // $ldaprecord['objectclass'][1] = "student";
  $major = $_POST['major'];
  $gender = $_POST['gender'];
  $mail = $_POST['email'];
  $mobile = $_POST['mobile'];




  $ldaprecord['uid'] = $uid;
  $ldaprecord['userPassword'] = $password;
  $ldaprecord['cn'] =  $cn;
  $ldaprecord['givenName'] = $givenName;
  $ldaprecord['sn'] = $sn;
  // put user in objectClass inetOrgPerson so we can set the mail and phone number attributes
  $ldaprecord['objectclass'][0] = "inetorgperson";
  $ldaprecord['objectclass'][1] = "top";
  $ldaprecord['objectclass'][2] = "organizationalperson"; 
  $ldaprecord['objectclass'][3] = "student";
  $ldaprecord['major'] = $major;
  $ldaprecord['gender'] = $gender;
  $ldaprecord['mail'] = $mail;
  $ldaprecord['mobile'] = $mobile;
  ////print_r($ldaprecord);
  $r = ldap_add($ldapconn, "uid=$uid,o=user,c=us", $ldaprecord);
  if($r){
  	echo "seccess add $uid";
  }else{
  	echo "fail to add";
  }

}else{
	echo "fail to bind";
}
}

?> 
<a href="user.php">Back</a>/>
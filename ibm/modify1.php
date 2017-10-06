
<?php
    session_start();
    $access = $_SESSION["access"];
    $info = $_SESSION["info"];
    include("authenticate.php");
    if($access == ""){
         header('Location:http://192.168.246.183/ibm/protect.php');
    }
    ///echo "1";
if($ldapbind){
  ///echo "1";
  
  $cn =  $_POST['firstname'];
  
  $sn = $_POST['lastname'];
  $major = $_POST['major'];
  $gender = $_POST['gender'];
  $mail = $_POST['email'];
  $mobile = $_POST['mobile'];
  
  $ldaprecord = array();
  $ldaprecord['cn'][0] =  $cn;
  
  $ldaprecord['sn'][0] = $sn;
  
  $ldaprecord["major"][0] = $major;

  $ldaprecord['gender'][0] = $gender;
  $ldaprecord['mail'][0] = $mail;
  $ldaprecord['mobile'][0] = $mobile;
  ///print_r($ldaprecord);
  //$uid = $info[0]["dn"];
  $uid = $_POST['username'];
  $dn = $info[0]["dn"];
  ///print_r($uid);
   include("authenticate.php");
 $result = ldap_mod_replace($ldapconn, "uid=$uid,o=user,c=us", $ldaprecord);
  if($result){
    echo "seccess modify $uid";
  }else{
    echo "fail to modify";
  }

}else{
  echo "fail to bind";
}

?>
<br/>
<a href="fenzu.php">Back</a>/> 
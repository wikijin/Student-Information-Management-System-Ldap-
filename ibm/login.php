<form action="login.php" method="POST">
        <label for="username">Username: </label><input id="username" type="text" name="username" /><br />
        <label for="password">Password: </label><input id="password" type="password" name="password" />        <input type="submit" name="submit" value="Submit" />
</form>
<a href="regis.php">Register for new user</a>/>

<?php

session_start();

include("authenticate.php");

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if ($ldapbind) {
    	
    	if (!filter_var($username,FILTER_VALIDATE_EMAIL)){
        $filter="(uid=$username)"; 
            }else{
                $filter="(mail=$username)";
        }
        
        $attr = array("memberof");
        
        $result=ldap_search($ldapconn,"c=us",$filter,$attr) or exit("sorry");
        $entries = ldap_get_entries($ldapconn, $result);

        foreach($entries[0] as $grps) {
            // is manager, break loop
          
            
            if(strpos($grps, "user")) { $access = 2; break; }
 
            // is user
            if(strpos($grps, "manager")) $access = 1;
        }

        $result2 = ldap_search($ldapconn,"c=us",$filter);
        $info = ldap_get_entries($ldapconn, $result2);
        
        print"<pre>";
        ///print_r($info);
        print"<pre>";
        $uid = $info[0]["dn"];
        $link_id = @ldap_bind($ldapconn,$uid,$password);
        //header('Location:http://192.168.42.114/user.php');
        if($link_id){
             session_start();
            $_SESSION["info"] = $info;
             $_SESSION["access"] = $access;
        if ($access == 1){
             header('Location:http://192.168.246.183/ibm/manager.php');
       // @ldap_close($ldap);;
         }
         if ($access == 2){
             header('Location:http://192.168.246.183/ibm/user.php');
       // @ldap_close($ldap);;
         }
            // $_SESSION["binddn"] = $uid;
            // $_SESSION["userinfo"] = $userinfo;
             ///header('Location:http://192.168.246.183/ibm/user.php');
       // @ldap_close($ldap);
    } else  {
        $msg = "Invalid email address / password";
        echo $msg;
    }
}

}
 ?> 
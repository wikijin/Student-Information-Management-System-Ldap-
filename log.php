<form action="log.php" method="POST">
        <label for="username">Username: </label><input id="username" type="text" name="username" /> 
        <label for="password">Password: </label><input id="password" type="password" name="password" />        <input type="submit" name="submit" value="Submit" />
</form>

<?php

session_start();

if(isset($_POST['username']) && isset($_POST['password'])){
    //session_()start();


    //$adServer = "ldap://domaincontroller.mydomain.com";
	
    //$ldap = ldap_connect("ldap://localhost:389");
    $ldap = ldap_connect("192.168.246.179");
    $username = $_POST['username'];
    $password = $_POST['password'];

    //$ldaprdn = 'mydomain' . "\\" . $username;

    ldap_set_option($ldap, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($ldap, LDAP_OPT_REFERRALS, 0);

    //$bind = @ldap_bind($ldap, $username, $password);
    $bind = @ldap_bind($ldap);


    if ($bind) {
    	//echo "1";
        if (!filter_var($username,FILTER_VALIDATE_EMAIL)){
        $filter="(uid=$username)";
            }else{
                $filter="(mail=$username)";
        }
        $result = ldap_search($ldap,"dc=ldap,dc=com",$filter);
        $sr=ldap_search($ldap, "dc=ldap,dc=com", "uid=*");
        $userinfo = ldap_get_entries($ldap, $sr);
        //ldap_sort($ldap,$result,"sn");
        $info = ldap_get_entries($ldap, $result);
        $uid = $info[0]["dn"];
        $link_id = @ldap_bind($ldap,$uid,$password);
        //print"<pre>";
        //print_r($info);
        if($link_id){
            
            session_start();
            $_SESSION["info"] = $info;
            $_SESSION["access"] = $access;
            $_SESSION["binddn"] = $uid;
            $_SESSION["userinfo"] = $userinfo;
            header('Location:http://192.168.246.183/userlogin.php');
        // for ($i=0; $i<$info["count"]; $i++)
        // {
        //     if($info['count'] > 1)
        //         break;
        //     echo "<p>You are accessing <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["beer"][0] .")</p>\n";
        //     echo '<pre>';
        //     //var_dump($info);
        //     echo '</pre>';
        //     //$userDn = $info[$i]["distinguishedname"][0]; 
        // }

       // @ldap_close($ldap);
    } else {
        $msg = "Invalid email address / password";
        echo $msg;
    }
}

}
 ?> 
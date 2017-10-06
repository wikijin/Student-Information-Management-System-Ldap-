<?php
    session_start();
    $access = $_SESSION["access"];
    $info = $_SESSION["info"];
if($access == ""){
         header('Location:http://192.168.246.183/ibm/protect.php');
}

if($access != 1){
    header('Location:http://192.168.246.183/ibm/login.php');
}
//echo "1";

//echo $_SESSION["info"];


///print_r($info);

 for ($i=0; $i<$info["count"]; $i++)
        {
            if($info['count'] > 1)
             break;
            //echo "<p>HELLO <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["beer"][0] .")</p>\n";
            echo "<p>HELLO <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["cn"][0] ."</strong><br/> </p>\n";
            echo '<pre>';
            //var_dump($info);
            echo '</pre>';
            //$userDn = $info[$i]["distinguishedname"][0];
        }
        
        



    
?>

<form action="querym.php" method="POST">
        <label for="search for">find</label><input id="querym" type="text" name="query" /> 
        <input type="submit" name="submit" value="Submit" />
</form>

<!-- <?php
    $query = $_POST['query'];

        $_SESSION["query"] = $query;

?> -->



<a href="password.php">Change Password</a>/><br/>  
<a href="logout.php">Logout</a>/>

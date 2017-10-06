
<?php
    session_start();
    $access = $_SESSION["access"];
    //$userinfo = $_SESSION["info"];
    //$info = $_SESSION["userinfo"];
    if($access == 1){
        $info = $_SESSION["userinfo"];
    }
    if($access ==2){
       $info = $_SESSION["info"]; 
    }
    if($access == ""){
         header('Location:http://192.168.246.183/ibm/protect.php');
    }
    include("authenticate.php");
     
     for ($i=0; $i<$info["count"]; $i++)
        {
            $ja = $info[$i]["cn"][0];
            $jb = $info[$i]["sn"][0];
            $jc = $info[$i]["mail"][0];
            $jd = $info[$i]["major"][0];
            $je = $info[$i]["gender"][0];
            $jf = $info[$i]["mobile"][0];
            $jg =  $info[$i]["uid"][0];

        }

?>


<form action="modify1.php" method="post">
    Username:<br>
  <input type="text" name="username" value="<?php echo $jg; ?>"/>
  <br>
  First name:<br>
  <input type="text" name="firstname" value="<?php echo $ja; ?>"/>
  <br>
  Last name:<br>
  <input type="text" name="lastname" value="<?php echo $jb; ?>"/>
  <br><br>
  Email:<br>
  <input type="text" name="email" value="<?php echo $jc; ?>"/>
  <br><br>
  Major:<br>
  <input type="text" name="major" value="<?php echo $jd; ?>"/>
  <br><br>
  Gender:<br>
  <input type="text" name="gender" value="<?php echo $je; ?>"/>
  <br><br>
  Mobile:<br>
  <input type="text" name="mobile" value="<?php echo $jf; ?>"/>
  <br><br>
  <input type="submit" value="Modify">
</form> 




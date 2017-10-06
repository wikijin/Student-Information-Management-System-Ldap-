


<?php

session_start();

//echo "1";

//echo $_SESSION["info"];

$info = $_SESSION["info"];



//print_r($info);

 for ($i=0; $i<$info["count"]; $i++)
        {
            if($info['count'] > 1)
                break;
            //echo "<p>HELLO <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> (" . $info[$i]["beer"][0] .")</p>\n";
            echo "<p>HELLO <strong> ". $info[$i]["sn"][0] .", " . $info[$i]["givenname"][0] ."</strong><br /> </p>\n";
            echo '<pre>';
            //var_dump($info);
            echo '</pre>';
            //$userDn = $info[$i]["distinguishedname"][0];
        }
        
        



?> 

<!-- $query = $_POST['query'];
$_SESSION["query"] = $query; -->

<form action="query.php" method="POST">
        <label for="search for">find</label><input id="query" type="text" name="query" /> 
        <input type="submit" name="submit" value="Submit" />
</form>

<!-- <?php
	$query = $_POST['query'];

		$_SESSION["query"] = $query;

?> -->


<a href="beer.php">Show All Users' Favourate Beer</a>/>
<a href="logout.php">Logout</a>/>

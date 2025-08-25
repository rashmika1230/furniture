<?php

include "connection.php";

$place = $_POST["p"];

if (empty($place)) {
   echo("Please Enter Your Place Name");
} else if(strlen($place) > 20) {
    echo("Your characters More than 20");
}else{
    // echo("succes");

    $rs = Database::search("SELECT * FROM `place` WHERE `place_name` = '".$place."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo("Your Place Name is Already exist");
    } else {
        
        Database::iud("INSERT INTO `place` (`place_name`) VALUES ('".$place."')");
        echo("succes");
    }
    
}


?>
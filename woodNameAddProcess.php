<?php

include "connection.php";

$woodname = $_POST["wo"];

if (empty($woodname)) {
    echo("Please Enter Wood Name");
} else if(strlen($woodname) > 20) {
    echo("Your Characters more than 20");
}else{
    // echo("succes");

    $rs = Database::search("SELECT * FROM `wood` WHERE `wood_name` = '".$woodname."'");
   $num = $rs->num_rows;

   if ($num == 1) {
    echo("This Category Name Already Exist");
   } else {
    
    Database::iud("INSERT INTO `wood` (`wood_name`) VALUES ('".$woodname."')");
    echo("success");
   }
   

}


?>
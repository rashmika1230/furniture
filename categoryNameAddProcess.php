<?php

include "connection.php";

$catname = $_POST["c"];

if (empty($catname)) {
    echo("Please Enter Category Name");
} else if(strlen($catname) > 20) {
    echo("Your Characters more than 20");
}else{
    // echo("succes");

    $rs = Database::search("SELECT * FROM `category` WHERE `cat_name` = '".$catname."'");
   $num = $rs->num_rows;

   if ($num == 1) {
    echo("This Category Name Already Exist");
   } else {
    
    Database::iud("INSERT INTO `category` (`cat_name`) VALUES ('".$catname."')");
    echo("success");
   }
   

}


?>
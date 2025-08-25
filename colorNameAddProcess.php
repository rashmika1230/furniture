<?php 

include "connection.php";

$color = $_POST["clr"];
// echo($color);

if (empty($color)) {
    echo("please eneter the color name");
} else if(strlen($color) > 20) {
    echo("Color name charaters more than 20");
}else{
    // echo("success");

    $rs = Database::search("SELECT * FROM `color` WHERE `color_name` = '".$color."'");
    $num = $rs->num_rows;

    if ($num == 1) {
        echo("Color Name Already exist");
    }else{

        Database::iud("INSERT INTO `color` (`color_name`) VALUES ('".$color."')");
        echo("success");
    }
}


?>
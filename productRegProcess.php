<?php

include "connection.php";

$pname = $_POST["pro"];
$place = $_POST["pla"];
$cat = $_POST["cat"];
$wood = $_POST["w"];
$color = $_POST["co"];
$desc = $_POST["desc"];


if (empty($_FILES["i"])) {
    echo ("Plese choose image");
} else if (empty($pname)) {
    echo ("Please enter the product name");
} else if (strlen($pname) > 30) {
    echo ("more than 30 charachters");
} else if ($place == "0") {
    echo ("please select a plce");
} else if ($cat == "0") {
    echo ("pleaase Select the category name");
} else if ($wood == "0") {
    echo ("please slece wood type");
} else if ($color == "0") {
    echo ("Please select color");
} else if (empty($desc)) {
    echo ("Plese Eneter the description");
} else if (strlen($desc) > 1000) {
    echo ("more tha 1000 charct");
} else {
    // echo("success");

    $rs = Database::search("SELECT * FROM `product` WHERE `name` = '" . $pname . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Producr Already Exist");
    } else {
        $path = "productImge/" . uniqid() . ".png";
        move_uploaded_file($_FILES["i"]["tmp_name"], $path);

        Database::iud("INSERT INTO `product` (`name`,`description`,`path`,`category_id`,`color_id`,`place_id`,`wood_id`)
        VALUES ('" . $pname . "','" . $desc . "','" . $path . "','" . $cat . "','" . $color . "','" . $place . "','" . $wood . "')");

        echo ("success");

    }

}


?>
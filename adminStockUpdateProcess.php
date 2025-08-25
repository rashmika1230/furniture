<?php

include "connection.php";

$product = $_POST["product"];
$qty = $_POST["qty"];
$price = $_POST["price"];

// echo($product);

if ($product == "0") {
    echo("Please Select Product Name");
} else if(empty($qty)) {
    echo("Plese Enter the product quantity");
}else if(strlen($qty) > 10) {
    echo("More than 10 character");
}else if(isset($qty) > 0) {
    echo("please enter valid qty");
}else if(empty($price)){
    echo("Plese Enter the Produc price");
}elseif(strlen($price) > 10) {
    echo("more Thann 10 characters");
}else{
    // echo("success");
    
    $rs = Database::search("SELECT * FROM `stock` WHERE `product_id` = '".$product."'");
    $num = $rs->num_rows;

    $data = $rs->fetch_assoc();

    if ($num == 1) {
        //update

        $newQty = $data["qty"] + $qty;
        Database::iud("UPDATE `stock` SET `qty` = '".$newQty."' WHERE `stock_id` = '".$data["stock_id"]."'");
        echo("update successfully");
    } else {
        //insert
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d ");

        Database::iud("INSERT INTO `stock` (`price`,`qty`,`date`,`product_id`) VALUES ('".$price."','".$qty."','".$date."','".$product."')");
        echo("new stock Added success");
    }
    
}


?>
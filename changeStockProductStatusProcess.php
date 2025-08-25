<?php
include "connection.php";

$stock_id = $_GET["stock_id"];

$rs = Database::search("SELECT * FROM `stock` WHERE `stock_id` = '".$stock_id."' ");
$num = $rs->num_rows;

// echo($num);
if ($num == 1) {
    $d = $rs->fetch_assoc();

    if ($d["status"] == 1) {

        Database::iud("UPDATE `stock` SET `status` = '0' WHERE `stock_id` = '".$stock_id."'");
        //set Deactive
        echo("Enable");
    }

    if ($d["status"] == 0) {

        Database::iud("UPDATE `stock` SET `status` = '1' WHERE `stock_id` = '".$stock_id."'");
        //set Active
        echo("Disable");
    }

} else {
    echo ("invalid User Id");
}

?>
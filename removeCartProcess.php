<?php

include "connection.php";

$cartId = $_POST["c"];

Database::iud("DELETE FROM `cart` WHERE `cart_id` = '".$cartId."'");
echo("Items Successfuly remove from cart");

?>
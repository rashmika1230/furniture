<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$password = $_POST["pw"];
$no = $_POST["no"];
$line1 = $_POST["l1"];
$line2 = $_POST["l2"];
$city = $_POST["ci"];

if (empty($fname)) {
    echo("please enter your first Name");
} else if((strlen($fname) > 20)){
    echo("your first name should be less than 20 Characters");
}else if (empty($lname)) {
    echo("please enter your last Name");
} else if((strlen($lname) > 20)){
    echo("your last name should be less than 20 Characters");
}else if (empty($email)) {
    echo("please enter your email");
} else if((strlen($email) > 100)){
    echo("your email should be less than 100 Characters");
}else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo("email not vaild");
} else if((empty($mobile))){
    echo("please enter your mobile ");
}else if((strlen($mobile) != 10)){
    echo("Incorect number");
}elseif(!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/",$mobile)){
    echo("Not valid number");
}elseif (empty($password)) {
    echo("please enter your passsword");
}elseif (strlen($password) < 5 || strlen($password) > 45) {
    echo("your password must contain 5 - 45 characters");
}else if (empty($no)) {
    echo("Pleaase enter your Adress no");
}else if (strlen($no) > 10) {
    echo("less than 10 charc");
}else if (empty($line1)) {
    echo("Pleaase enter your line1 ");
}else if (strlen($line1) > 50 ) {
    echo("less than 50");
}else if (empty($line2)) {
    echo("Pleaase enter your line2");
}else if (strlen($line2) > 50 ) {
    echo("less than 50");
}else if (empty($city)) {
    echo("Pleaase enter your city");
}else if (strlen($city) > 50) {
    echo("less than 50");
}else{
    Database::iud("UPDATE `user` SET `fname` = '".$fname."', `lname` = '".$lname."', `email` = '".$email."',
    `mobile` = '".$mobile."', `password` = '".$password."', `no` = '".$no."', `line1` = '".$line1."', `line2` = '".$line2."',
    `city` = '".$city."' WHERE `id` = '".$user["id"]."'");

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '".$user["id"]."' ");
    $d = $rs->fetch_assoc();
    $_SESSION["u"] = $d;

    echo("success");
}

?>
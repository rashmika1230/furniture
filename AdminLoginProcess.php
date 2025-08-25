<?php

session_start();
include("connection.php");

$username = $_POST["u"];
$password = $_POST["p"];

// echo($username);

if (empty($username)) {
    echo("Please Enter Your username");
} elseif(empty($password)) {
    echo("please Enter your password");
}else{
    $rs = Database::search("SELECT * FROM `user` WHERE `username` = '".$username."' AND `password` = '".$password."'");
    $num = $rs->num_rows;
    

    if ($num == 1) {

        $d = $rs->fetch_assoc();

        if ($d["user_type_id"] == 1) {
            echo("success");

            $_SESSION["a"] = $d;

            

        } else {
            echo("you Don't have an admin account");
        }
        

    } else {
        echo("invalid username or password");
    }
    
}


?>
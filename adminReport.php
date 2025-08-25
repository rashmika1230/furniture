<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    ?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shehan Furniture-Reports</title>

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="rs/bookshelf-svgrepo-com.svg">
</head>

<body>
    <?php include "adminNav.php"; ?>
    <?php include "adminNavSideBar.php"; ?>

    <div class="content admin_conetent_body">



        <div class="container mt-5 ">
            <h2 class="mt-5 text-center">Reports</h2>
            <hr>
            <div class="container d-flex justify-content-center align-items-center row mt-5">


    
        <div class="col-lg-6 mb-5">
           <a href="adminReportStock.php"><button class="btn btn-outline-danger col-12 rbt">Stock Report</button> </a>
        </div>
        <div class="col-lg-6 mb-5">
            <a href="adminReportProduct.php"><button class="btn btn-outline-warning col-12 rbt">Product Report</button></a>
        </div>
        <div class="col-lg-6">
            <a href="adminReportUser.php"><button class="btn btn-outline-info col-12 rbt">User Report</button></a>
        </div>
        
    </div>


            <div>

            </div>

    </div>
    </div>


<!-- Footer -->
<div class="col-12 fixed-bottom">
      <p class="text-center">&copy;
        <script>document.write(new Date().getFullYear());</script>
        ShehanFurniture.lk || All right Reseverd
      </p>
    </div>
    <!-- Footer -->


    <script src="script.js"></script>
</body>

</html>
    <?php

} else {
    header("Location: adminlogin.php");
    exit();
  }




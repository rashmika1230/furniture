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
    <title>Shehan Furniture-user Management</title>

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="shortcut icon" href="rs/bookshelf-svgrepo-com.svg">
    <link rel="stylesheet" href="styles.css">

</head>

<body onload="loadUser();">

    <?php include "adminNavSideBar.php"; ?>

    <div class="content admin_conetent_body">
        <?php include "adminNav.php"; ?>


      <div class="container-fluid mt-5">
      <div class="container mt-5 border border-3 ">
            <h2 class="mt-2"> Users Management</h2><hr>

            <div class="row d-flex justify-content-end mt-4 ">

                <div class="col-3">
                    <input type="text" class="form-control" placeholder="Enter User First or Last Name " id="usernames"/>
                    
                </div>
                <button class="btn btn-outline-light col-1 " onclick="userSearch();">Search</button>

            </div>

            <div class="overflow-x-auto mt-4">
            <table class="table table-success table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="tb1">
            
                </tbody>
            </table>
            
           
            </div>
            
        </div>
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


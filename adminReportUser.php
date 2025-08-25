<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

$rs = Database::search("SELECT * FROM `user`");
$num = $rs->num_rows;
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shehan Furniture - Shop Stock Report</title>

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="shortcut icon" href="rs/bookshelf-svgrepo-com.svg">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<a class="ms-5 mt-5" href="adminReport.php">< back</a>
    <div class="container mt-5" id="printArea">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Shehan Furniture Users Report</h1>
                <p class="text-center">Date: <span id="currentDate"></span></p>
                <p class="text-center">Prepared By: [Rashmika Lakshan]</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>user id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Emai</th>
                            <th>Mobile</th>
                            <th>User Name</th>
                            <th>User Type</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        for ($i = 0; $i < $num; $i++) {

                            $d = $rs->fetch_assoc();

                            ?>
                            <tr>
                                <td><?php echo ($d["id"]); ?></td>
                                <td><?php echo ($d["fname"]); ?></td>
                                <td><?php echo ($d["lname"]); ?></td>
                                <td><?php echo ($d["email"]); ?></td>
                                <td><?php echo ($d["mobile"]); ?></td>
                                <td><?php echo ($d["username"]); ?></td>
                                <td>
                                    <?php
                                        if ($d["user_type_id"] == 1) {
                                            echo("Admin");
                                        } else {
                                            echo("User");
                                        }
                                        
                                    ?>
                                </td>
                                <td><?php

if ($d["status"] == 1) {
    echo("Active");
} else {
    echo("Inactive");
}

                                ?></td>
                            </tr>
                            <?php
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container d-flex justify-content-end mt-5 mb-5">
        <button class="btn btn-outline-warning col-2" onclick="printArea();"><img src="rs/printer.svg" alt=""></button>
    </div>

    <script src="script.js"></script>
    <script>
        // Set the current date
        document.getElementById('currentDate').textContent = new Date().toLocaleDateString();
    </script>


</body>

</html>
<?php


?>
    <?php

} else {
    header("Location: adminlogin.php");
    exit();
  }





<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

$rs = Database::search("SELECT * FROM `stock` INNER JOIN `product` ON
`stock`.`product_id` = `product`.`id`
INNER JOIN `wood` ON
`product`.`wood_id` = `wood`.`wood_id`
ORDER BY `stock`.`stock_id` DESC");
$num = $rs->num_rows;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Shop Stock Report</title>

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="shortcut icon" href="rs/bookshelf-svgrepo-com.svg">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<a class="ms-5 mt-5" href="adminReport.php">< back</a>
    <div class="container mt-5" id="printArea">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Shehan Furniture Stock Report</h1>
                <p class="text-center">Date: <span id="currentDate"></span></p>
                <p class="text-center">Prepared By: [Rashmika Lakshan]</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>stock id</th>
                            <th>Product Name</th>
                            <th>Material</th>
                            <th>Quantity</th>
                            <th>Selling Price</th>
                            <th>Date Added</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    
                    for ($i = 0; $i < $num; $i++) {
                        
                        $d = $rs->fetch_assoc();

                        ?>
                        <tr>
                            <td><?php echo($d["stock_id"]); ?></td>
                            <td><?php echo($d["name"]); ?></td>
                            <td><?php echo($d["wood_name"]); ?></td>
                            <td><?php echo($d["qty"]); ?></td>
                            <td>RS: <?php echo($d["price"]); ?></td>
                            <td><?php echo($d["date"]); ?></td>
                            <td><?php 
                            
                            if ($d["status"] == 1) {
                               echo("Availible");
                            }else{
                                echo("Not Availibale");
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

} else {
    header("Location: adminlogin.php");
    exit();
  }
?>


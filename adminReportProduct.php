<?php
session_start();
include "connection.php";

$rs = Database::search("SELECT * FROM `product`
INNER JOIN `wood` ON
`product`.`wood_id` = `wood`.`wood_id`
INNER JOIN `color` ON
`product`.`color_id` = `color`.`color_id`
INNER JOIN category ON
`product`.`category_id` = `category`.`cat_id` ORDER BY `product`.`id` ASC");
$num = $rs->num_rows;
if (isset($_SESSION["a"])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shehan Furniture - Shop product Report</title>

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="shortcut icon" href="rs/bookshelf-svgrepo-com.svg">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<a class="ms-5 mt-5" href="adminReport.php">< back</a>
    <div class="container mt-5" id="printArea">
        
        <div class="row">
            <div class="col">
                <h1 class="text-center">Shehan Furniture Products Report</h1>
                <p class="text-center">Date: <span id="currentDate"></span></p>
                <p class="text-center">Prepared By: [Rashmika Lakshan]</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Product id</th>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Metirial</th>
                            <th>Color</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        for ($i = 0; $i < $num; $i++) {

                            $d = $rs->fetch_assoc();

                            ?>
                            <tr>
                                <td><?php echo ($d["id"]); ?></td>
                                <td><img src="<?php echo($d["path"]); ?>" height="75" class="rounded rounded-4"></td>
                                <td><?php echo ($d["name"]); ?></td>
                                <td><?php echo ($d["description"]); ?></td>
                                <td><?php echo ($d["cat_name"]); ?></td>
                                <td><?php echo ($d["wood_name"]); ?></td>
                                <td><?php echo ($d["color_name"]); ?></td>
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
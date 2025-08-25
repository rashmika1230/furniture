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
    <title>Shehan Furniture-Stock Management</title>

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="rs/bookshelf-svgrepo-com.svg">
</head>

<body>
    <?php include "adminNav.php"; ?>
    <?php include "adminNavSideBar.php"; ?>

    <div class="content admin_conetent_body">



        <div class="container mt-5 ">
            <h2 class="mt-5">Stock Management</h2>
            <hr>

            <div class="d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="row">

                    <?php
                    
                    $rs2 = Database::search("SELECT * FROM `product`");
                    $num2 = $rs2->num_rows;
                    $d2 = $rs2->fetch_assoc();


                    ?>

                        <div class="form-group mb-3">
                            <label for="selectPlace" class="form-label mb-2">Select Product Name</label>
                            <select class="form-control" id="selectProduct" onchange="productDetailsload();">
                                <option value="0">Select</option>
                                
                                <?php
                                
                                $rs = Database::search("SELECT * FROM `product`");
                                $num = $rs->num_rows;

                                for ($i = 0; $i < $num; $i++) {

                                    $d = $rs->fetch_assoc();

                                    ?>
                                    <option value="<?php echo($d["id"]); ?>"><?php echo($d["name"]); ?></option>
                                    <?php
                                }

                                ?>

                            </select>
                        </div>

                        <div class="row container-fluid" id="pv">

                        </div>

                        <div class="form-group mb-3">
                            <label for="productName" class="form-label mb-2">Product Quantity</label>
                            <input type="text" class="form-control" id="productQty" placeholder="Enter product qty">
                        </div>

                        <div class="form-group mb-3">
                            <label for="productName" class="form-label mb-2">Product Price</label>
                            <input type="text" class="form-control" id="productPrice" placeholder="Enter product price">
                        </div>

                        <div class="d-grid">
                            <button type="button" class="btn btn-secondary" onclick="stockUpdate();">Add</button>
                        </div>

                    </div>
                </div>
            </div>
            <!-- table -->
            <div class="d-flex justify-content-center border border-3 overflow-x-auto mt-4">
                <div class="container-fluid">
                    <table class="table table-bordered mt-3 text-center">
                        <thead>
                            <tr>
                                <th>Stock ID</th>
                                <th>Product Name</th>
                                <th>Quantaity</th>
                                <th>Price</th>
                                <th>Add Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                        
                        $rs = Database::search("SELECT * FROM `stock` INNER JOIN `Product` ON `stock`.`product_id` = `product`.`id`");
                        $num = $rs->num_rows;
                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();

                            ?>
                            <tr>
                                <th scope="row"><?php echo ($d["stock_id"]); ?></th>
                                <td><?php echo ($d["name"]); ?></td>
                                <td><?php echo ($d["qty"]); ?></td>
                                <td>RS. <?php echo ($d["price"]); ?> .00</td>
                                <td><?php echo ($d["date"]); ?></td>

                                <td>
                                    <?php 
                                    if ($d["status"] == 1) {
                                        echo("Enable");
                                    } else {
                                        echo("Disable");
                                    }
                                    
                                     ?>
                                </td>

                                <td>
                                <a><div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" id="toggle" onchange="changeProductStatus(<?php echo $d['stock_id']; ?>);" <?php if ($d["status"] == 1) { ?> checked <?php } ?>>
  <label class="form-check-label" for="flexSwitchCheckDefault"></label>
</div></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                            

                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
    </div>


<!-- Footer -->
<div class="col-12">
      <p class="text-center">&copy;
        <script>document.write(new Date().getFullYear());</script>
        ShehanFurniture.lk || All right Reseverd
      </p>
    </div>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
</body>

</html>
    <?php

} else {
    header("Location: adminlogin.php");
    exit();
  }


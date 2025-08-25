<?php

session_start();
$user = $_SESSION["u"];
include "connection.php";

if (isset($user)) {

  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shehan Furniture</title>

    <link rel="stylesheet" href="bootstrap.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/tiny-slider.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="rs/bookshelf-svgrepo-com.svg">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    <?php include "header.php"; ?>

    <div class="container mt-5 mb-5">

      <div class="">

        <div class="row col-12 d-flex">
          <div class="col-6 mt-3">
            <h5 class="card-title">Customer Details</h5>
            <p><strong>Name:</strong> <?php echo ($user["fname"]); ?>   <?php echo ($user["lname"]); ?></p>
            <p><strong>Email:</strong> <?php echo ($user["email"]); ?></p>
          </div>
          <?php

          $rs3 = Database::search("SELECT SUM(amount) AS total_amount
                  FROM order_history
              WHERE `user_id` = '" . $user["id"] . "'");
          $num3 = $rs3->num_rows;
          $d3 = $rs3->fetch_assoc();

          ?>
          <div class="col-6 text-end">
            <h5 class="card-title mt-4">Purchase History</h5>
            <div class="">           
              <p><strong>Sub Amount:</strong> Rs. <?php echo ($d3["total_amount"]); ?>.00</p>
            </div>
          </div>
          <?php
          ?>
        </div>


        <?php

        $rs = Database::search("SELECT * FROM `order_history` WhERE `user_id` = '" . $user["id"] . "' ORDER BY order_history.ohid DESC");
        $num = $rs->num_rows;

        if ($num > 0) {

          for ($i = 0; $i < $num; $i++) {

            $d = $rs->fetch_assoc();

            ?>

            <div class="card mt-3">
              <div class="card-header">
                Order Id #<?php echo ($d["order_id"]); ?>
              </div>

              <?php

              $rs2 = Database::search("SELECT * FROM order_items INNER JOIN stock ON
            order_items.stock_stock_id = stock.stock_id 
            INNER JOIN product ON
            stock.product_id = product.id
            INNER JOIN category ON
            `product`.`category_id` = `category`.`cat_id`
            WHERE order_items.order_history_ohid = '" . $d["ohid"] . "' ORDER BY order_items.oid DESC");
              $num2 = $rs2->num_rows;

              for ($j = 0; $j < $num2; $j++) {
                $d2 = $rs2->fetch_assoc();

                ?>

                <div class="card-body d-flex">
                  <img src="<?php echo ($d2["path"]); ?>" class="img-thumbnail" alt="Sweetheart Prom"
                    style="width: 150px; height: auto;">
                  <div class="ml-3">
                    <h5 class="card-title"><?php echo ($d2["name"]); ?></h5>
                    <p>Category: <?php echo ($d2["cat_name"]); ?></p>
                    <p><strong>Price: Rs. <?php echo ($d2["price"]); ?>.00</strong></p>
                    <p>Quantity: <?php echo ($d2["oi_qty"]); ?></p>
                  </div>
                  <div class="ml-auto text-right">

                    <h5>Order Summary</h5>
                    <p>Dilevery: Free</p>
                    <p><strong>Total: Rs. <?php echo ($d2["price"] * $d2["oi_qty"]); ?>.00</strong></p>
                  </div>
                </div>

                <hr>

                <?php
              }

              ?>


            </div>

            <?php

          }
        }

        ?>




      </div>

    </div>

    <?php include "footer.php"; ?>


  </body>

  </html>


  <?php

} else {
  header("Location: signIn.php");
  exit();
}


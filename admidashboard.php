<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {


  $q = "SELECT * FROM order_items
  INNER JOIN order_history ON
  order_items.order_history_ohid = order_history.ohid
  INNER JOIN stock ON 
  order_items.stock_stock_id = stock.stock_id
  INNER JOIN product ON
  stock.product_id = product.id
  INNER JOIN user ON
  order_history.user_id = user.id ORDER BY order_items.oid DESC";

  ?>

  <!DOCTYPE html>
  <html lang="en" data-bs-theme="dark">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shehan Furniture Admin_Dashboard</title>

    <link rel="shortcut icon" href="rs/bookshelf-svgrepo-com.svg">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="styles.css">

  </head>

  <body onload="loadChart();">

    <?php include "adminNavSideBar.php"; ?>

    <div class="content admin_conetent_body">
      <?php include "adminNav.php"; ?>

      <div id="home-page" class="page active">
        <div class="container-fluid">
          <div class="row mt-5">
            <div class="col-12">
              <div class="welcome">
                <h2>Welcome</h2>
                <hr>
              </div>
            </div>
          </div>
          <div class="filters">
            <button class="btn btn-outline-primary" onclick="printArea();">Export</button>
          </div>
          <div id="printArea">
            <div class="row">

              <div class="col-md-3 mb-4">
                <div class="card">
                  <div class="card-body card-stats">
                    <div>
                      <h5 class="card-title">Yearly Income</h5>
                      <hr>

                      <?php
                      $rs1 = Database::search("SELECT YEAR(order_date) AS year, SUM(amount) AS total_income
              FROM order_history
              GROUP BY YEAR(order_date)
              ORDER BY year;");
                      $d1 = $rs1->fetch_assoc();
                      ?>

                      <p class="card-text">
                      <h2 class="text-danger">Rs. <?php echo ($d1["total_income"]); ?>.00 </h2>
                      </p>
                      <h4>
                        <p class="text-success"><?php echo ($d1["year"]); ?></p>
                      </h4>

                    </div>

                  </div>
                </div>
              </div>


              <div class="col-md-3 mb-4">
                <div class="card">
                  <div class="card-body card-stats">
                    <div>
                      <h5 class="card-title">Monthly Income</h5>
                      <hr>

                      <?php
                      $rs2 = Database::search("SELECT SUM(amount) AS total_income
              FROM order_history
              WHERE order_date >= DATE_FORMAT(CURRENT_DATE, '%Y-%m-01')
              AND order_date < DATE_FORMAT(CURRENT_DATE + INTERVAL 1 MONTH, '%Y-%m-01')");
                      $d2 = $rs2->fetch_assoc();
                      ?>

                      <p class="card-text">
                      <h2>
                        <h2 class="text-warning">Rs. <?php echo ($d1["total_income"]); ?>.00 </h2>
                        </p>
                        <h4>
                          <p class="text-success">June</p>
                        </h4>

                    </div>

                  </div>
                </div>
              </div>

              <div class="col-md-3 mb-4">
                <div class="card">
                  <div class="card-body card-stats">
                    <div>
                      <h5 class="card-title">Total Customers</h5>
                      <hr>

                      <?php

                      $rs3 = Database::search("SELECT COUNT(DISTINCT user_id) AS total_customers
            FROM order_history");
                      $d3 = $rs3->fetch_assoc();
                      ?>

                      <p class="card-text">
                      <h2 class="text-primary"><?php echo ($d3["total_customers"]); ?></h2>
                      </p>
                      <p>
                      <h5 class="text-success">since: 2024.06</h5>
                      </p>

                    </div>

                  </div>
                </div>
              </div>


              <div class="col-md-3 mb-4">
                <div class="card">
                  <div class="card-body card-stats">
                    <div>
                      <h5 class="card-title">Total Deals</h5>
                      <hr>

                      <?php
                      $rs4 = Database::search("SELECT COUNT(*) AS total_deals FROM order_history");
                      $d4 = $rs4->fetch_assoc();
                      ?>

                      <p class="card-text">
                      <h2 class="text-info"><?php echo ($d4["total_deals"]); ?></h2>
                      </p>
                      <p>
                      <h5 class="text-success">since: 2024.06</h5>
                      </p>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">

              <div class="col-md-4 mb-4">
                <div class="card">
                  <div class="card-body card-stats">
                    <div>
                      <h5 class="card-title">Total_sold</h5>
                      <hr>
                      <canvas id="myChart"></canvas>

                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-3 mb-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Top Deals</h5>
                    <hr>
                    <ul class="list-unstyled">
                      <?php
                      $rs5 = Database::search("SELECT user.fname, user.lname, SUM(order_history.amount) AS total_deal_price
            FROM order_history INNER JOIN user ON order_history.user_id = user.id
            GROUP BY user.id
            ORDER BY total_deal_price DESC
            LIMIT 5");
                      $num5 = $rs5->num_rows;


                      for ($i = 0; $i < $num5; $i++) {
                        $d5 = $rs5->fetch_assoc();

                        ?>


                        <li><?php echo ($d5["fname"]); ?>     <?php echo ($d5["lname"]); ?> -
                          Rs.<?php echo ($d5["total_deal_price"]); ?>.00</li>


                        <?php


                      }

                      ?>

                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-5 mb-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Sales count</h5>
                    <hr>
                    <div class="d-flex justify-content-between">

                      <?php

                      $rs6 = Database::search("SELECT product.name, COUNT(order_items.stock_stock_id) AS sales_count
                  FROM order_items INNER JOIN stock ON order_items.stock_stock_id = stock.stock_id
                  INNER JOIN product ON 
                  stock.product_id = product.id
                  GROUP BY product.name
                  ORDER BY sales_count DESC
                  LIMIT 4");
                      $num6 = $rs6->num_rows;


                      for ($i = 0; $i < $num6; $i++) {
                        $d6 = $rs6->fetch_assoc();

                        ?>

                        <div class="p-2 text-center">
                          <p><?php echo ($d6["name"]); ?></p>
                          <h4><?php echo ($d6["sales_count"]); ?></h4>
                        </div>

                        <?php
                      }

                      ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Table -->
          <div class="container mt-4 overflow-x-auto">
            <h2>Purchers History</h2>
            <hr>
            <table class="table table-striped table-bordered text-center table-hover ">
              <thead>
                <tr>

                  <th scope="col">Product Name</th>
                  <th scope="col">Quanttiy</th>
                  <th scope="col">Total amount</th>
                  <th scope="col">Customer Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Order Date</th>
                </tr>
              </thead>
              <tbody>

                <?php

                $rs = Database::search($q);
                $num = $rs->num_rows;

                for ($i = 0; $i < $num; $i++) {
                  $d = $rs->fetch_assoc();

                  ?>

                  <tr>
                    <td><?php echo ($d["name"]); ?></td>
                    <td><?php echo ($d["oi_qty"]); ?></td>
                    <td>Rs. <?php echo ($d["amount"]); ?>.00</td>
                    <td><?php echo ($d["fname"]); ?></td>
                    <td><?php echo ($d["email"]); ?></td>
                    <td><?php echo ($d["order_date"]); ?></td>
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

    <!-- Footer -->
    <div class="col-12">
      <p class="text-center">&copy;
        <script>document.write(new Date().getFullYear());</script>
        ShehanFurniture.lk || All right Reseverd
      </p>
    </div>
    <!-- Footer -->

    </div>





    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  </body>

  </html>



  <?php

} else {
  header("Location: adminlogin.php");
  exit();
}

?>
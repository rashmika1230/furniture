<?php

include "connection.php";
session_start();

$user = $_SESSION["u"];
$orderHistoryId = $_GET["orderId"];

$rs = Database::search("SELECT * FROM `order_history` WHERE `ohid` = '" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {

	$d = $rs->fetch_assoc();

	?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Shehan Furniture - Invice</title>

		<link rel="stylesheet" href="bootstrap.css">
		<link rel="shortcut icon" href="rs/bookshelf-svgrepo-com.svg">
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link rel="stylesheet" href="styles.css">
	</head>

	<body>
		<div class="container">
			<div class="mt-3 row">
				<div>
					<a href="index.php">Home</a>
				</div>
			</div>
			<div id="printArea">


				<div class="row">



					<div class="text-center">
						<h3><b>Shehan Furniture</b></h3>
					</div>
					<hr class="border border-3 border-black">

					<div class="col-xs-12">
						<div class="invoice-title">
							<h2>Invoice</h2>
							<h3 class="pull-right">Order # <?php echo ($d["order_id"]); ?></h3>
						</div>
						<hr>
						<div class="row">
							<div class="col-xs-6">
								<address>
									<strong>Billed To:</strong><br>
									Shehan Furniture<br>
									135,<br>
									Kuruwiyaya<br>
									Bakamuna
								</address>
							</div>
							<div class="col-xs-6 text-right">
								<address>
									<strong>Shipped To:</strong><br>
									<?php echo ($user["fname"]); ?><br>
									<?php echo ($user["line1"]); ?><br>
									<?php echo ($user["line2"]); ?><br>
									<?php echo ($user["city"]); ?>
								</address>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<address>
									<strong>Payment Method:</strong><br>
									Visa ending **** 4242<br>
									<?php echo ($user["email"]); ?>
								</address>
							</div>
							<div class="col-xs-6 text-right">
								<address>
									<strong>Order Date and Time:</strong><br>
									<?php echo ($d["order_date"]); ?><br><br>
								</address>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><strong>Order summary</strong></h3>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-condensed">
										<thead>
											<tr>
												<td><strong>Item</strong></td>
												<td class="text-center"><strong>Category</strong></td>
												<td class="text-center"><strong>Price</strong></td>
												<td class="text-center"><strong>Quantity</strong></td>
												<td class="text-right"><strong>Totals</strong></td>
											</tr>
										</thead>
										<tbody>

											<?php

											$rs2 = Database::search("SELECT * FROM order_items INNER JOIN stock ON
							order_items.stock_stock_id = stock.stock_id
							INNER JOIN product ON
							stock.product_id = product.id
							INNER JOIN category ON
							product.category_id = category.cat_id
							WHERE
							order_items.order_history_ohid =  '" . $orderHistoryId . "'");
											$num2 = $rs2->num_rows;

											for ($i = 0; $i < $num2; $i++) {

												$d2 = $rs2->fetch_assoc();

												?>
												<tr>
													<td><?php echo ($d2["name"]); ?></td>
													<td class="text-center"><?php echo ($d2["cat_name"]); ?></td>
													<td class="text-center">Rs. <?php echo ($d2["price"]); ?>.00</td>
													<td class="text-center"><?php echo ($d2["oi_qty"]); ?></td>
													<td class="text-right">Rs. <?php echo ($d2["price"] * $d2["oi_qty"]); ?> .00
													</td>
												</tr>
												<?php
											}
											?>

											<tr>
												<td class="thick-line"></td>
												<td class="thick-line"></td>
												<td class="thick-line"></td>
												<td class="thick-line text-center"><strong>Subtotal</strong></td>
												<td class="thick-line text-right">Rs. <?php echo ($d["amount"]); ?>.00</td>
											</tr>
											<tr>
												<td class="no-line"></td>
												<td class="no-line"></td>
												<td class="no-line"></td>
												<td class="no-line text-center"><strong>Shipping</strong></td>
												<td class="no-line text-right">free</td>
											</tr>
											<tr>
												<td class="no-line"></td>
												<td class="no-line"></td>
												<td class="no-line"></td>
												<td class="no-line text-center"><strong>Total</strong></td>
												<td class="no-line text-right">Rs.<?php echo ($d["amount"]); ?>.00</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="d-flex justify-content-end mb-5">
				<a class=" col-3 btn btn-outline-warning" onclick="printArea();">Print</a>
			</div>

		</div>
	</body>

	<script src="script.js"></script>

	</html>

	<?php

} else {
	header("Location: index.php");
	exit();
}

?>
<?php
session_start();

$user = $_SESSION["u"];

if (isset($user)) {
  
  ?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="rs/bookshelf-svgrepo-com.svg">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="css/tiny-slider.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="styles.css">

	<title>Shehan Furniture </title>
</head>

<body onload="loadProduct(0);">

	<!-- Start Header/Navigation -->
	<?php include "shopNavBar.php" ?>

	<div class="mt-4">
		<h2 class="text-center">View All Product</h2>
	</div>

	<div class="untree_co-section product-section before-footer-section">
		<div class="container">
			<div class="row gap-0" id="pid">

			</div>
		</div>
	</div>


	<!-- Start Footer Section -->
	<?php include "footer.php" ?>
	<!-- End Footer Section -->


	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/tiny-slider.js"></script>
	<script src="js/custom.js"></script>
	<script src="script.js"></script>
</body>

</html>
  <?php

} else {
  header("Location: signIn.php");
    exit();
}



?>


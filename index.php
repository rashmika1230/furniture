<?php

include "connection.php";

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
	<link rel="stylesheet" href="styles.css">
	<title>Shehan Furniture</title>
</head>

<body>

	<?php include "header.php"; ?>

	<!-- Start Hero Section -->
	<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>Shehan <span clsas="d-block">Furniture</span></h1>
						<p class="mb-4">Discover our exquisite range of modern furniture designed to elevate your living spaces. 
							Each piece combines comfort, style, and durability, ensuring your home looks and feels its best. 
							Shop with us today and transform your interior with our curated collection.</p>
						<p><a href="shop.php" class="btn btn-secondary me-2">Shop Now</a></p>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="hero-img-wrap homeChair" id="homeChair">
						<img src="images/couch.png" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Hero Section -->

	<div class="container text-center ">
		<h4 class="mb-4 mt-4">We Have This Locations Products</h4>
		<div class="row text-center">

			<?php

			$rs = Database::search("SELECT * FROM `place`");
			$num = $rs->num_rows;

			for ($i = 0; $i < $num; $i++) {

				$d = $rs->fetch_assoc();
				?>
				<div class="col category-item">		
					<div class="category-label"><?Php echo ($d["place_name"]); ?></div>
				</div>

				<?php

			}

			?>
		</div>
	</div>
	<hr>

	<!-- Start Product Section -->
	<div class="product-section">
		<div class="container">
			<div class="row">

				<!-- Start Column 1 -->
				<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
					<h2 class="mb-4 section-title">Recently Aded Products</h2>
					<p class="mb-4">Made from premium solid oak wood, ensuring durability and longevity.
						
					</p>
					<p><a href="shop.php" class="btn">Explore</a></p>
				</div>
				<!-- End Column 1 -->

				<?php
			
			$rs2 = Database::search("SELECT * FROM stock INNER JOIN 
			product ON
			stock.product_id = product.id
			WHERE stock.status = '1'
			ORDER BY stock.stock_id  DESC LIMIT 3");

			$num2 = $rs2->num_rows;

			for ($i = 0; $i < $num2; $i++) {

				$d2 = $rs2->fetch_assoc();

				?>
				
				<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0" >
					<a class="product-item" href="singleProductView.php?s=<?Php echo($d2["stock_id"]); ?>">
						<img src="<?php echo($d2["path"]); ?>" class="img-fluid product-thumbnail">
						<h3 class="product-title"><?php echo($d2["name"]); ?></h3>
						<strong class="product-price">Rs. <?php echo($d2["price"]); ?>.00</strong>

						<span class="icon-cross">
							<img src="images/cross.svg" class="img-fluid">
						</span>
					</a>
				</div>
				
				<?php
			}

			?>

				

			</div>
		</div>
	</div>
	<!-- End Product Section -->

	<!-- Start Why Choose Us Section -->
	<div class="why-choose-section" id="ab">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-6">
					<h2 class="section-title">Why Choose Us</h2>
					<p>At our furniture shop, we pride ourselves on expert craftsmanship, 
						ensuring every piece is made with the highest quality materials for 
						lasting beauty and durability. Our modern designs stay ahead of trends, 
						adding a touch of contemporary elegance to any space. 
						We offer personalized customer service, helping you find the 
						perfect furniture to match your unique style and needs. Additionally, we are committed to sustainable practices, using eco-friendly materials and ethical manufacturing processes, 
						so you can feel good about your choices.</p>

					<div class="row my-5">
						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="images/truck.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>Fast &amp; Free Shipping</h3>
								<p>Enjoy the convenience of fast and free 
									shipping on all our products.</p>
							</div>
						</div>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="images/bag.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>Easy to Shop</h3>
								<p>Experience hassle-free shopping with our user-friendly 
									website and intuitive navigation.</p>
							</div>
						</div>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="images/support.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>24/7 Support</h3>
								<p>Our dedicated customer support team is available 24/7 to assist you with any questions or concerns.</p>
							</div>
						</div>

						<div class="col-6 col-md-6">
							<div class="feature">
								<div class="icon">
									<img src="images/return.svg" alt="Image" class="imf-fluid">
								</div>
								<h3>Hassle Free Returns</h3>
								<p>Shop with confidence knowing that we offer hassle-free returns on all purchases. </p>
							</div>
						</div>

					</div>
				</div>

				<div class="col-lg-5 cc1">
					<div class="img-wrap">
						<img src="images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- End Why Choose Us Section -->

	<!-- Start We Help Section -->
	<div class="we-help-section" id="ser">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-7 mb-5 mb-lg-0">
					<div class="imgs-grid">
						<div class="grid grid-1 img1"><img src="images/img-grid-1.jpg" alt="Untree.co"></div>
						<div class="grid grid-2"><img src="images/img-grid-2.jpg" alt="Untree.co"></div>
						<div class="grid grid-3"><img src="images/img-grid-3.jpg" alt="Untree.co"></div>
					</div>
				</div>
				<div class="col-lg-5 ps-lg-5">
					<h2 class="section-title mb-4">We Help You Make Modern Interior Design</h2>
					<p>Transform your living space with our latest collection of modern furniture. Our new arrivals blend contemporary aesthetics with functionality, ensuring that every piece not only looks stunning but also enhances your lifestyle. Discover sleek designs, premium materials, and expert craftsmanship 
						that bring your modern interior design dreams to life</p>

					<ul class="list-unstyled custom-list my-4">
						<li>Innovative Designs</li>
						<li>Premium Quality</li>
						<li>Personalized Solutions</li>
						<li>Sustainable Choices:</li>
					</ul>
					
				</div>
			</div>
		</div>
	</div>
	<!-- End We Help Section -->

	<!-- Start Popular Product -->
	<div class="popular-product">
		<h5 class="text-center mb-5">Popular products</h5>
		<div class="container">
			<div class="row">

			<?php
			
			$rs3 = Database::search("SELECT product.name, product.path, product.description, COUNT(order_items.stock_stock_id) AS sales_count
			FROM order_items INNER JOIN stock ON
			order_items.stock_stock_id = stock.stock_id
			INNER JOIN product ON
			stock.product_id = product.id
			GROUP BY product.name, product.path, product.description
			ORDER BY sales_count DESC
			LIMIT 3");
			$num3 = $rs3->num_rows;

			for ($i = 0; $i < $num3; $i++) {
				$d3 = $rs3->fetch_assoc();

				?>
				<div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
					<div class="product-item-sm d-flex">
						<div class="thumbnail">
							<img src="<?php echo($d3["path"]); ?>" alt="Image" class="img-fluid">
						</div>
						<div class="pt-3">
							<h3><?php echo($d3["name"]); ?></h3>
							<p><?php echo($d3["description"]); ?></p>
							
						</div>
					</div>
				</div>
				<?php
			}

			?>

				

				

			</div>
		</div>
	</div>


	<!-- Start Footer Section -->
	<?php include "footer.php"; ?>
	<!-- End Footer Section -->


	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/tiny-slider.js"></script>
	<script src="js/custom.js"></script>
	<script src="script.js"></script>
	
</body>

</html>
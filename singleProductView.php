<?php
session_start();
include "connection.php";

$user = $_SESSION["u"];

if (isset($user)) {

$stock_id = $_GET["s"];

$q ="SELECT * FROM `stock`
INNER JOIN `product` ON
`stock`.`product_id` = `product`.`id`
INNER JOIN `color` ON
`product`.`color_id` = `color`.`color_id`
INNER JOIN `wood` ON
`product`.`wood_id` = `wood`.`wood_id`
INNER JOIN `place` ON 
`product`.`place_id` = `place`.`place_id`
INNER JOIN `category` ON
`product`.`category_id` = `category`.`cat_id` WHERE stock.stock_id = '".$stock_id."'";

$rs = Database::search($q);
$d = $rs->fetch_assoc();

?>
<!DOCTYPE html>
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
    <div class="container product-page">
        


        <div class="row mt-5">
            <div class="col-md-6">
                <img src="<?php echo($d["path"]); ?>" alt="Nike Air Force 1" class="product-image img-fluid">
                <div class="mt-2">
                    <h5>Related Product</h5>
                </div>
                <div class="row mt-2">

                <?php
                
                $rs2 = Database::search("SELECT * FROM `stock`
                INNER JOIN `product` ON
                `stock`.`product_id` = `product`.`id`
                INNER JOIN `category` ON
                `product`.`category_id` = `category`.`cat_id` WHERE  
                category.cat_id = '".$d["cat_id"]."' ORDER BY stock.stock_id LIMIT 2");
                $num2 = $rs2->num_rows;

                for ($i = 0; $i < $num2; $i++) {

                    $d2 = $rs2->fetch_assoc();

                    if ($num2 > 0) {
                        ?>
                        <div class="col-4">
                        <img src="<?php echo($d2["path"]); ?>" alt="Thumbnail 1" class="img-thumbnail">
                    </div>
                        
                        <?php
                    }else{
                        ?>
                        <div class="col-4">
                        <img src="images/bag.svg" alt="Thumbnail 2" class="img-thumbnail">
                    </div>
                        <?php
                    }
                }

                ?>

                    
                    
                    <div class="col-4">
                        <img src="productImge/66576699a8e9f.png" alt="Thumbnail 2" class="img-thumbnail">
                    </div>
                </div>
            </div>

            <div class="col-md-6 ms-auto p-3">
                <h1 class="text-dark"><b><?php echo($d["name"]); ?></b></h1>
                <p><?php echo($d["description"]); ?></p>
                <div class="price-details">
                    <span class="h4">Rs. <b><?php echo($d["price"]); ?>.00</b></span>
                    <!-- <span class="price h4 ml-2">$240</span>
                    <span class="discount h4 ml-2">-10%</span> -->
                </div>
                
                    <div class="col-6 mt-4">
                        <p><b>Location:</b> <?php echo($d["place_name"]); ?></p>
                    </div>
                    <div class="col-6">
                        <p><b>Category:</b> <?php echo($d["cat_name"]); ?></p>
                    </div>
                    <div class="col-6">
                        <p><b>Metiral:</b> <?php echo($d["wood_name"]); ?></p>
                    </div>
                    <div class="col-6">
                        <p><b>Color:</b> <?php echo($d["color_name"]); ?></p>
                    </div>
                    <div class="col-6">
                        <p><b>Availibale Quantity:</b> <?php echo($d["qty"]); ?></p>
                    </div>
                
                    <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">                              
                              <input type="text" class="form-control text-center quantity-amount" placeholder="Quanty" id="qty">                            
                            </div>
                <button class="btn btn-dark  mt-4" onclick="addtoCart(<?php echo($d['stock_id']); ?>);">Add to Cart</button>
                <button class="btn btn-primary  mt-4" onclick="buyNow(<?php echo($d['stock_id']); ?>);">Buy Now</button>
            </div>
        </div>
    </div>
    <?php include "footer.php"; ?>
    
    <script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/tiny-slider.js"></script>
	<script src="js/custom.js"></script>
	<script src="script.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>
<?php

} else {
  header("Location: signIn.php");
    exit();
}



?>




<?php

include "connection.php";

$pageno = 0;
$page = $_POST["pg"];

$color = $_POST["col"];
$cat = $_POST["cat"];
$wood = $_POST["w"];
$place = $_POST["p"];
$minPrice = $_POST["min"];
$maxPrice = $_POST["max"];

// echo($cat);

$status = 0; //no condition

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock`
INNER JOIN `product` ON
`stock`.`product_id` = `product`.`id`
INNER JOIN `color` ON
`product`.`color_id` = `color`.`color_id`
INNER JOIN `category` ON
`product`.`category_id` = `category`.`cat_id`
INNER JOIN `wood` ON 
`product`.`wood_id` = `wood`.`wood_id`
INNER JOIN `place` ON
`product`.`place_id` = `place`.`place_id`
";

// serach by color

if ($status == 0 && $color != 0) {
    // 1st time search by color (WHERE)

    $q .= " WHERE `color`.`color_id` = '".$color."'";
    $status = 1;

}else if($status != 0 && $color !=0 ){

    $q .= " AND `color`.`color_id` = '".$color."'";
}

// serach by category

if ($status == 0 && $cat != 0) {
    

    $q .= " WHERE `category`.`cat_id` = '".$cat."'";
    $status = 1;
    
}else if($status != 0 && $cat !=0 ){

    $q .= " AND `category`.`cat_id` = '".$cat."'";
}

// serach by brand

if ($status == 0 && $wood != 0) {
    

    $q .= " WHERE `wood`.`wood_id` = '".$wood."'";
    $status = 1;
    
}else if($status != 0 && $wood !=0 ){

    $q .= " AND `wood`.`wood_id` = '".$wood."'";
}

// serach by size

if ($status == 0 && $place != 0) {
    

    $q .= " WHERE `place`.`place_id` = '".$place."'";
    $status = 1;
    
}else if($status != 0 && $place !=0 ){

    $q .= " AND `place`.`place_id` = '".$place."'";
}

// search min price

if(!empty($minPrice) && empty($maxPrice)){
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` >= '".$minPrice."' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` >= '".$minPrice."' ORDER BY `stock`.`price` ASC";
    }
}

// search max price

if(empty($minPrice) && !empty($maxPrice)){
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` <= '".$maxPrice."' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` <= '".$maxPrice."' ORDER BY `stock`.`price` ASC";
    }
}

// search price Range

if(!empty($minPrice) && !empty($maxPrice)){
    if ($status == 0) {
        $q .= " WHERE `stock`.`price` BETWEEN '".$minPrice."' AND '".$maxPrice."' ORDER BY `stock`.`price` ASC";
        $status = 1;
    } else if ($status != 0) {
        $q .= " AND `stock`.`price` BETWEEN '".$minPrice."' AND '".$maxPrice."' ORDER BY `stock`.`price` ASC";
    }
}

$rs = Database::search($q);
$num = $rs->num_rows;

$result_per_page = 8;
$num_of_pages = ceil($num / $result_per_page);
$page_result = ($pageno - 1) * $result_per_page;

$q2 = $q . " LIMIT $result_per_page OFFSET $page_result";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    ?>
    <div class="d-flex flex-column align-items-center mt-5">
    <h5>Search No result</h5>
    <p>We,re Sorry cant find any products</p>

</div>
    <?php
} else {
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();

        ?>
         <div class="col-12 col-md-4 col-lg-3 mb-5 border rounded-4">
            <a class="product-item" href="singleProductView.php?s=<?Php echo($d["stock_id"]); ?>">
                <div class="container p-1">
                    <img src="<?php echo ($d["path"]); ?>" class="img-fluid product-thumbnail">
                </div>
                <h3 class="product-title"><?php echo ($d["name"]); ?></h3>
                <strong class="product-price">Rs: <?php echo ($d["price"]); ?></strong>
                <span class="icon-cross">
                    <img src="images/cross.svg" class="img-fluid">
                </span>
            </a>
        </div>
        <?php
    }

    ?>
    <!-- pageination -->
    <div class="d-flex justify-content-center mt-5">
    <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" 

      <?php
      
      if ($pageno <= 1) {
        echo("#");
      } else {
        ?>
        onclick="searchProduct(<?php echo ($page - 1); ?>);"
        <?php
      }
      
      
      ?>
      
      href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>


    <?php
                for ($i = 1; $i <= $num_of_pages; $i++) {

                    if ($i == $pageno) {
                        ?>
                        <li class="page-item active"><a class="page-link"
                                onclick="searchProduct(<?php echo $i; ?>);"><?php echo $i; ?></a>
                            </li>
                        <?php
                    } else {

                        ?>
                        <li class="page-item"><a class="page-link"
                                onclick="searchProduct(<?php echo $i; ?>);"><?php echo $i; ?></a>
                            </li>
                        <?php
                    }

                }
                ?>

    <li class="page-item">
      <a class="page-link" 

      <?php
      
      if ($pageno >= $num_of_pages) {
        echo("#");
      }else{
        ?>
        onclick="searchProduct(<?php echo ($page + 1); ?>);" 
        <?php
      }

      ?>
      
      
      href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
    </div>
    <?php
}


?>
<?php

include "connection.php";

$pageno = 0;
$page = $_POST["p"];

// echo ($page);

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock`
INNER JOIN `product`
ON `stock`.`product_id` = `product`.`id` WHERE `stock`.`status` = '1' ORDER BY `stock`.`stock_id` ASC ";

$rs = Database::search($q);
$num = $rs->num_rows;
// echo($num);

$result_per_page = 8;
$num_of_pages = ceil($num / $result_per_page);
// echo($num_of_pages);

$page_result = ($pageno - 1) * $result_per_page;
// echo($page_result);

$q2 = $q . " LIMIT $result_per_page OFFSET $page_result";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;
// echo($num2);

if ($num2 == 0) {
    //not Avalible Stock
    echo ("No Products Here...");


} else {
    //Load Stock

    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();

        ?>
        <div class="col-12 col-md-4 col-lg-3 mb-5 border rounded-4">
            <a class="product-item" href="singleProductView.php?s=<?Php echo($d["stock_id"]); ?>">
                
            <div class="container p-1">
                    <img src="<?php echo ($d["path"]); ?>" class="img-fluid product-thumbnail">
                </div>
                <h3 class="product-title"><?php echo ($d["name"]); ?></h3>
                <strong class="product-price">Rs. <?php echo ($d["price"]); ?>.00</strong>
                <span class="icon-cross">
                    <img onclick="addtoCart(<?php echo($d['stock_id']); ?>);" src="images/cross.svg" class="img-fluid">
                </span>
            </a>
        </div>
        <?php
    }

    ?>
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
        onclick="loadProduct(<?php echo ($page - 1); ?>);"
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
                                onclick="loadProduct(<?php echo $i; ?>);"><?php echo $i; ?></a>
                            </li>
                        <?php
                    } else {

                        ?>
                        <li class="page-item"><a class="page-link"
                                onclick="loadProduct(<?php echo $i; ?>);"><?php echo $i; ?></a>
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
        onclick="loadProduct(<?php echo ($page + 1); ?>);" 
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
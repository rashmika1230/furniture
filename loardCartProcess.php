<?php

include "connection.php";
session_start();

$user = $_SESSION["u"];
$netTotal = 0;

$rs = Database::search("SELECT * FROM cart INNER JOIN stock ON 
cart.stock_stock_id = stock.stock_id
INNER JOIN `product` ON
stock.product_id = product.id
 WHERE
cart.user_id = '" . $user["id"] . "'");

$num = $rs->num_rows;

if ($num > 0) {
    //load cart
    // echo ("load cart");

    ?>
    

        <?php

        for ($i = 0; $i < $num; $i++) {
            $d = $rs->fetch_assoc();

            $total = $d["price"] * $d["cart_qty"];
            $netTotal += $total;

            ?>
            <!-- cart align-items-center -->
            
            <div class="col-12 border border-3 rounded-5 p-3 mb-2 d-flex justify-content-between">
                <div class="d-flex align-items-center col-3">
                    <img src="<?php echo ($d["path"]) ?>" class="rounded-4" width="150px">
                    <div class="ms-5">
                        <h4 class="mb-2"><?php echo ($d["name"]) ?></h4>
                        
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <h5><span class=text-dark>Rs. <?php echo ($d["price"]) ?>.00</span></h5>
                </div>

                <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                              <div class="input-group-prepend">
                                <button onclick="decrementCartQty('<?php echo $d['cart_id'] ?>');" class="border border-0" type="button">&minus;</button>
                              </div>
                              <input id="qty<?php echo $d["cart_id"] ?>" type="text" class="form-control text-center quantity-amount" value="<?php echo $d["cart_qty"] ?>" >
                              <div class="input-group-append">
                                <button onclick="incrementCartQty('<?php echo $d['cart_id'] ?>');" class=" border border-0" type="button">&plus;</button>
                              </div>
                            </div>

                <div class="d-flex align-items-center">
                    <h5><span class=text-dark>Rs. <?php echo ($total) ?>.00</span></h>
                </div>

                <div class="d-flex align-items-center">
                    <button class="btn-danger border-danger btn-sm" onclick="removeCart('<?php echo $d['cart_id'] ?>');">x</button>
                </div>

            </div>
              
            
            <!-- cart align-items-center -->
            <?php
        }

        ?>
        <div class="row mt-5">
                <div class="col-md-6">
                  
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-black h4" for="coupon">Coupon</label>
                      <p class="text-danger">we will added coupon code soon...</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                      <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7 ">
                      <div class="row">
                        <div class="col-md-12 text-center border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                      </div>
                      <div class="row mb-3 text-center">
                        <div class="col-md-6 ">
                          <span class="text-black">Number Of Items</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black"><?php echo ($num) ?></strong>
                        </div>
                      </div>
                      <div class="row mb-3 text-center">
                        <div class="col-md-6 ">
                          <span class="text-black">Delivary fee</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">Free</strong>
                        </div>
                      </div>
                      <div class="row mb-5 text-center">
                        <div class="col-md-6 ">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">Rs. <?php echo ($netTotal) ?>.00</strong>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-md-12 text-center">
                          <button class="btn btn-primary  py-3 btn-block" onclick="checkOut();">Proceed To Checkout</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        <?php

        ?>



        <div class="col-12 mt-5">
            <hr>
        </div>

       



    </div>
    <?php

} else {
    // emptu card

    ?>
    <!-- Empty View -->
    <div class="col-12 mt-3">
						<div class="row">
							<div class=" emptyCart"></div>
							<div class="col-12 text-center mb-2">
								<label class="form-label fs-4 fw-bold">
								Your cart is currently empty
								</label>
							</div>
							<div class="offset-lg-4 col-3 col-lg-4 mb-4 d-grid border-5 ">
								<a href="index.php" class="btn btn-primary fw-bold">
									Start Shopping
								</a>
							</div>
						</div>
					</div>
					<!-- Empty View -->
    <?php

}


?>
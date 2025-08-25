<?php

include "connection.php";

$pdetails = $_POST["pn"];



$rs2 = Database::search("SELECT * FROM `product`
                    INNER JOIN `color` ON
                    `product`.`color_id` = `color`.`color_id`
                    INNER JOIN `wood` ON
                    `product`.`wood_id` = `wood`.`wood_id`
                    INNER JOIN `place` ON 
                    `product`.`place_id` = `place`.`place_id`
                    INNER JOIN `category` ON
                    `product`.`category_id` = `category`.`cat_id` WHERE `product`.`id` = '" . $pdetails . "'");
$num2 = $rs2->num_rows;



$d2 = $rs2->fetch_assoc();

?>
<div class=" col-6 form-group mb-3">
    <label for="productName" class="form-label mb-2">Category</label>
    <input type="text" class="form-control" id="pcat" placeholder="<?php echo ($d2["cat_name"]); ?>" disabled>
</div>

<div class="col-6 form-group mb-3">
    <label for="productName" class="form-label mb-2">Location</label>
    <input type="text" class="form-control" id="ploc" placeholder="<?php echo ($d2["place_name"]); ?>" disabled>
</div>

<div class=" col-6 form-group mb-3">
    <label for="productName" class="form-label mb-2">Metiral</label>
    <input type="text" class="form-control" id="pmet" placeholder="<?php echo ($d2["wood_name"]); ?>" disabled>
</div>

<div class="col-6 form-group mb-3">
    <label for="productName" class="form-label mb-2">color</label>
    <input type="text" class="form-control" id="pco" placeholder="<?php echo ($d2["color_name"]); ?>" disabled>
</div>
<?php





?>
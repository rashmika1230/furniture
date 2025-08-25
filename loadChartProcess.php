<?php

include "connection.php";

$rs = Database::search("SELECT product.id, product.name, SUM(order_items.oi_qty) AS
total_sold FROM order_items INNER JOIN stock ON
order_items.stock_stock_id = stock.stock_id INNER JOIN 
product ON
stock.product_id = product.id GROUP BY 
product.id, product.name ORDER BY total_sold DESC LIMIT 5");

$num = $rs->num_rows;

$labels = array();
$data = array();

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();

    $labels[] = $d["name"];
    $data[] = $d["total_sold"];

}

$jason = array();
$jason["labels"] = $labels;
$jason["data"] = $data;

echo json_encode($jason);

?>
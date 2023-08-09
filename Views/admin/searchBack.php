<?php
require_once "../../Controllers/ProductController.php";

$pd= new ProductController;
$products=$pd->getAllProducts();
echo json_encode($products);
?>
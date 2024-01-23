<?php
require_once "../../../Controllers/ProductController.php";
require_once "../../../Models/product.php";

if(isset($_POST['sku'])){
    $pid=$_POST['sku'];
    $pd=new ProductController();
    if($pd->deleteProduct($pid)){
        echo "done";
        header("location: ../Main.php");
    }else{
        echo "error";
    }
}
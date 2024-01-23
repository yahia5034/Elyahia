<?php
require_once "../../../Controllers/ProductController.php";
require_once "../../../Models/product.php";

if(isset($_POST['pid'])){
    $pid=$_POST['pid'];
    $pd=new ProductController();
    if($pd->deleteProduct($pid)){
        echo "done";
        header("location: ../Main.php");
    }else{
        echo "error";
    }
}
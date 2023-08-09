<?php

require_once "../../../Controllers/ProductController.php";
require_once "../../../Models/product.php";

if(isset($_POST['sku'])){
    $prevsku=$_POST['prevsku'];
    $pd=new ProductController();
    $product=new Product;
    $newsku=$_POST['sku'];
    $product->pname=$_POST['Pname'];
    $product->sku=$_POST['sku'];
    $product->price=$_POST['price'];
    $product->sellprice=$_POST['sellprice'];
    $product->property=$_POST['property'];
    $product->quantity=$_POST['qty'];
    $product->type=$_POST['type'];
    if($prevsku == $newsku){
        $pd->updateProduct($product,$prevsku);
        header("location: ../EditProduct.php?sku=$newsku");
    }else if(($newsku=$pd->getProductBySku($newsku)) != ""){
        header("location: ../EditProduct.php?status=Exists");
    }else{
        $pd->updateProduct($product,$prevsku);
        header("location: ../EditProduct.php?sku=$newsku");
    }
     

}
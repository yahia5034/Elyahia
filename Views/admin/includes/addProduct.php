<?php
require_once "../../../Controllers/ProductController.php";
require_once "../../../Models/product.php";

if (isset($_POST['addbutton'])) {
    
    $product=new Product;
    $productController=new ProductController;

    $product->pname=$_POST["name"];
    $product->price=$_POST["price"];
    $product->sellprice=$_POST["sellprice"];

    $product->sku=$_POST["sku"];
    $product->quantity=$_POST["qty"];
    $product->property=$_POST["property"];
    $product->type=$_POST['type'];
    //can make a error if the new name is within other name
    //ممكن يعمل مشكله لو الاسم  موجود في اسم تاني فشيلنا التدوير بالاسم
    if($productController->getProductBySku($product->sku) ){
        
        header("location: ../AddProduct.php?state=Exists");
    }else
    {
        if($productController->addProduct($product))
         {
            header("location: ../AddProduct.php?done=done");
         }   
        else
        { echo "";}
    }

}
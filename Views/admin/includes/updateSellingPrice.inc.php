<?php
if(isset($_POST)){
    require_once "../../../Controllers/ProductController.php";
    $product=new ProductController;
    if(isset($_POST['updatePrices'])){
        $percent = $_POST['percent']/100;
        $type = $_POST['type'];
        
        if($product->updateSellPrice($type, $percent))
        {
            echo "done";
            echo $type;
            ?>
            <script>setTimeout(function() { alert("تم تحديث السعر"); });</script>
            <?php
            header("location: ../main.php");
        }else{
            ?>
            <script>setTimeout(function() { alert(" الرجاء المحاولة مرة اخرى"); });</script>
            <?php
            header("location: ../updatePrice.php");
        }
    }
}
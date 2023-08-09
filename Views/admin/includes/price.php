<?php
require_once "../../../Controllers/ProductController.php";
$product=new ProductController;
if(isset($_POST['submit'])){
    if(!empty($_POST['type']) && !empty($_POST['percent'])){
        $type=$_POST['type'];
        $percent=$_POST['percent']/100;
        if($type=="*")
        {
            if($product->updateAllPrice($percent))
            {
                echo "done";
                echo $type;
                ?>
                <script>setTimeout(function() { alert("تم تحديث السعر"); }, 1000);</script>
               <?php
                header("location: ../main.php");
            }
        }    
        else if($product->updatePrice($type,$percent))
        {
            echo "done";
            echo $type;
            ?>
            <script>setTimeout(function() { alert("تم تحديث السعر"); }, 1000);</script>
            <?php
            header("location: ../main.php");
        }
    }
}else{
    echo"you are outttt";
}

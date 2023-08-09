<?php
require_once "../../Controllers/TypeController.php";
require_once "../../Models/Type.php";
$cc=new TypeController;
$types=$cc->getTypes();
$chossenType=array("type_name"=>"","madein"=>"","type_id"=>"");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تعديل الاسعار </title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(function(){
            $("div2").style.display=none;
            $("#heloo").change(function(){
                $("#div1").hide();
                $("#div2").hide();
                var x=$("#heloo").val;
                $("#"+x).show();
            })
        });
    </script>
    <style>
        body{
            text-align:right
        }
    </style>
</head>
<body>
    
    <!-- <select name="" id="heloo" >
        <option value="div1">بالنوع</option>
        <option value="div2"></option>
    </select> -->
    <form action="includes/price.php" method="POST">
    <h1>تحديث سعر الشراء</h1>
        <div id="div1" name="div1">
            <select name="type" id="type" >
                <option value="*">الكل</option>
                <?php
                foreach ($types as $type)
                {
                ?>
                <option value="<?php echo $type['type_id']?>"><?php echo $type['type_id']," - ",$type['type_name'];?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <!-- <div id="div2">
            from<input type="text" name="from"><br>
            to <input type="text" name="to">
        </div> -->
        <hr>
            Enter percent   <input type="text" name="percent" id="">
        <hr>
        <button name="submit" type="submit">Button </button>
    </form>
    <hr>
    <div class= "container-fluid">
        <h1>تحديث سعر البيع</h1>
    <form action="includes/updateSellingPrice.inc.php" method= "POST">
    <div class="row">
        <h3>اختر النوع</h3>
        <select name="type" id="type" required>
            <option value="*">الكل</option>
            <?php
            foreach ($types as $type)
            {
            ?>
            <option value="<?php echo $type['type_id']?>"><?php echo $type['type_id']," - ",$type['type_name'];?></option>
            <?php
            }
            ?>
        </select>
    </div>    <br>
    <div class= "row">
    <input type="text" name="percent" required>
    </div>       <br>
    <div class="row">
        <button type="submit" name="updatePrices">
                تحديث
        </button>
    </div>     
    </form>          
    </div>
    
</body> 
</html>
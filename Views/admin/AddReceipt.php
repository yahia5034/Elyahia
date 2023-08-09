<?php
require_once "../../Controllers/CustomerController.php";
require_once "../../Models/customer.php";

require_once "../../Controllers/TypeController.php";
require_once "../../Models/Type.php";
$cc=new TypeController;
$types=$cc->getTypes();
$chossenType=array("type_name"=>"","madein"=>"","type_id"=>"");

if (isset($_POST['NoOfProducts'])) {
    $num=$_POST['NoOfProducts'];
} else {
    $num=0;
}

$cc=new CustomerController();
$customers=$cc->getCustomers();
$chossenCustomer="";
if (isset($_POST['selector'])) {
    $chossenCustomer= new Customer();
    $chossenCustomer=$cc->getCustomerById($_POST['selector']);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>اضافه فاتورة</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <style>
        .myform{
            text-align: right;
        }
        .column{
            padding-bottom: 10px;
            color: black;
        }
        label{
            color: black;
        }
        #cid,#date{
            border-style: solid;
            border-radius: 10px;
            width: auto;
            padding-right: 40px;
        }
        #receipttype{
            background-color: blue;
            color: whitesmoke;
            text-align: right;
            font-size: xx-large;
        }
        
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php include "sidebar.html";?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            <?php include "navbar.php";?>
                <div class="container-fluid">
                    <div class="row" id="receipttype">
                        <p>فاتورة شراء</p>
                    </div>
                    <div class="row float-none d-lg-flex justify-content-lg-end mb-3">
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-end text-primary m-0 fw-bold">اضافه فاتورة جديد</p>
                                                <div class="row">
                                                    <div class="col-md-6 text-nowrap">
                                                        <form action="" method="post" style="text-align: right;">
                                                            <button class="btn btn-primary text-center"  type="submit" >بحث</button>
                                                            </div>
                                                        <div class="col-md-6">
                                                        <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                                        <input type="text" name="NoOfProducts"  style="text-align: right;" value="<?php if($num)echo $num?>" placeholder="ادخل عدد المنتجات هنا">
                                                       
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            
                                            
                                        </div>
                                        <div class="card-body">
                                            <form action="includes/addReceipt.php" method="post">
                                            <div class="row myform" >
                                                    <div class="column">
                                                    
                                                        <select name="cid" id="cid">
                                                        <?php
                                                        foreach ($customers as $customer) {
                                                            ?>
                                                                <option value="<?php echo $customer['cid']?>"><?php echo $customer['cname'];?></option>
                                                                <?php
                                                        }
                                                        ?>
                                                        </select>
                                                        <label for="cid"><strong>اسم العميل </strong></label>
                                                    </div>
                                                    <div class="column">
                                                        <input type="date" name="date" id="date" required>
                                                        
                                                        <label for="cid" ><strong>التاريخ  </strong></label>
                                                    
                                                    </div>
                                            </div>
                                                <table class="table my-0" id="dataTable">
                                                    <thead>
                                                        <th>النوع</th>
                                                        <th>السعر</th>
                                                        <th>الكمية</th>
                                                        <th>الرقم</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                     for ($i=0;$i<$num;$i++) {
                                                    ?>
                                                    <tr>
                                                    <td>
                                                        <select class ="form-control" name="type<?php echo $i;?>" id="">
                                                            <option value=""></option>
                                                            <?php
                                                            foreach($types as $type){
                                                                ?>
                                                                <option value="<?php echo $type['type_id'];?>"><?php echo $type['type_name'];?></option>
                                                                <?php
                                                            }
                                                            ?>
                                                        </select>
                                                        </td>
                                                        <td> <input class="form-control" type="text" id="price<?php echo $i;?>" name="price<?php echo $i;?>" required></td>
                                                        <td><input class="form-control" type="text" id="qty<?php echo $i;?>" name="qty<?php echo $i;?>" inputmode="numeric"></td>
                                                        <td><input class="form-control" type="text" id="sku<?php echo $i;?>" name="sku<?php echo $i;?>" required></td>
                                                    
                                                    </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                    </tbody>
                                                </table>
                                                
                                            
                                                <?php
                                                // for ($i=0;$i<$num;$i++) {
                                                //     ?>
                                                    <!-- <div class="row"> -->
                                                    
                                                    <!-- <div class="col">
                                                        <div class="mb-3"><label class="form-label float-end" for="property<?php //echo $i;?>"><strong>مكانه قي المحل&nbsp;</strong><br></label>
                                                        <input class="form-control" type="text" id="property<?php //echo $i;?>" name="property<?php //echo $i;?>" required></div>
                                                    </div> -->
                                                    <!-- <div class="col">
                                                        <div class="mb-3">
                                                        <label class="form-label float-end" for="type<?php echo $i;?>"><strong>النوع &nbsp;</strong><br></label>
                                                        <select class ="form-control" name="type<?php echo $i;?>" id="">
                                                            <option value=""></option>
                                                            <?php
                                                            /* foreach($types as $type){
                                                                ?>
                                                                <option value="<?php echo $type['type_id'];?>"><?php echo $type['type_name'];?></option>
                                                                <?php
                                                            }*/
                                                            ?>
                                                        </select>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label float-end" for="price<?php echo $i;?>"><strong>السعر</strong><br></label>
                                                        <input class="form-control" type="text" id="price<?php echo $i;?>" name="price<?php echo $i;?>" required></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label float-end" for="qty<?php echo $i;?>" >الكمية&nbsp;</label>
                                                        <input class="form-control" type="text" id="qty<?php echo $i;?>" name="qty<?php echo $i;?>" inputmode="numeric"></div>
                                                    </div> -->
                                                   
                                                    <!-- <div class="col">
                                                        <div class="mb-3"><label class="form-label float-end" for="name<?php //echo $i;?>"><strong>الاسم</strong><br></label
                                                        ><input class="form-control" type="text" id="name<?php // echo $i;?>"  name="name<?php //echo $i;?>" required></div>
                                                    </div> -->
                                                    <!-- <div class="col">
                                                        <div class="mb-3"><label class="form-label float-end" for="sku<?php echo $i;?>"><strong>الرقم&nbsp;</strong><br></label>
                                                        <input class="form-control" type="text" id="sku<?php echo $i;?>" name="sku<?php echo $i;?>" required></div>
                                                    </div>
                                                     -->
                                                    
                                                    <?php
                                                    //}
                                                    ?>
                                                <input class="form-control" type="text" name="noOfProducts" value="<?php echo $num;?>" hidden>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm float-start" type="submit">اضافة</button></div>
                                            </div> 
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card shadow"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-5"></div>
                </div>
            </div>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
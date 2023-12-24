<?php
require_once "../../Controllers/TypeController.php";
require_once "../../Models/Type.php";
$cc=new TypeController;
$types=$cc->getTypes();
$chossenType=array("type_name"=>"","madein"=>"","type_id"=>"");

$errMsg="";
if(isset($_GET['state']))
{
    $errMsg=$_GET['state'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>اضافه منتج</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
    <?php include "sidebar.html";?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            <?php include "navbar.php";?>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4" style="text-align: end">اضافة منتج</h3>
                    <div class="row float-none d-lg-flex justify-content-lg-end mb-3">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-end text-primary m-0 fw-bold">اضافه منتج جديد</p>
                                            <span style="color: red; text-size-adjust:15px;"><?php echo $errMsg;?></span>
                                            </div>  
                                        <div class="card-body">
                                            <form action="includes/addProduct.php" method="post">
                                                
                                                 <div class="mb-3"><label class="float-end" for="pid"><strong>مسلسل</strong><br>
                                                </label><input   type="text" id="pid" name="pid" readonly></div>
                                                    
                                                <div class="row">
                                                    
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label text-end float-end" for="sku"><strong>الرقم</strong><br>
                                                    </label><input class="form-control" type="text" id="sku" name="sku" required=""></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label float-end" for="qty"><strong>الكمية&nbsp;</strong><br>
                                                    </label><input class="form-control" type="text" id="qty"  name="qty" required=""></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label float-end" for="name"><strong>الاسم&nbsp;</strong></label>
                                                        <input class="form-control" type="text" id="name" inputmode="numeric" name="name"></div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label float-end" for="sellprice"><strong>البيع&nbsp;</strong><br>
                                                    </label><input class="form-control" type="text" id="sellprice"  name="sellprice" required=""></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label float-end" for="price"><strong>السعر</strong><br>
                                                    </label><input class="form-control" type="text" id="price" name="price" required=""></div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label float-end" for="property"><strong>مكانية في المحل&nbsp;</strong><br>
                                                    </label><input class="form-control" type="text" id="property"  name="property" required=""></div>
                                                    </div>
                                                    <div class="col" style="text-align: right;">
                                                        <div class="mb-3" >
                                                        <div class="row">
                                                            <label class="form-label float-end" for="type"><strong>النوع &nbsp;</strong><br>
                                                                        </label></div>
                                                                        <div class="row">
                                                                        <select class ="form-control"name="type" id="">
                                                                            <option value=""></option>
                                                                        <?php
                                                                        foreach($types as $type){
                                                                            ?>
                                                                            <option value="<?php echo $type['type_id']?>"><?php echo $type['type_name'];?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        </select>
                                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm float-start" type="submit" name="addbutton">اضافة </button></div>
                                          
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
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span></span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
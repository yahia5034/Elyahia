<?php

require_once "../../Controllers/ProductController.php";
require_once "../../Controllers/ReceiptController.php";

$pd=new ProductController();
$rc=new ReceiptController();

if (isset($_POST['sku'])|| isset($_GET['sku'])) {
    $sku=isset($_GET['sku']) ? $_GET['sku'] : $sku=$_POST['sku'];
    $currentProduct=$pd->getProductBySku($sku);
    $prices =$rc->getRecieptOfProduct($sku);
} else {
    $currentProduct=array("sku"=>"","pname"=>"","type_name"=>"","price"=>"","sellprice"=>"","quantity"=>"","property"=>"","pid"=>"","type"=>"");
    $prices=array(array("rid"=>"","price"=>"","quantity"=>"","date"=>"","status"=>""));
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>بحث و تعديل منتج </title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php require_once "sidebar.html";?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
               <?php require_once "navbar.php"?>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4" style="text-align: end">تعديل منتج</h3>
                    <div class="row float-none d-lg-flex justify-content-lg-end mb-3">
                        <div class="col-lg-8">                     
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-end text-primary m-0 fw-bold">بحث عن بيانات منتج&nbsp;</p>
                                         <form action="" method="post">
                                            <div class="text-end">
                                                <button class="btn btn-primary text-center float-none" type="submit" style="background: var(--bs-red);margin: 0px;margin-right: 10px;">بحث</button>
                                                <input type="text" name="sku" style="text-align: right;" required placeholder="ادخل الرقم">
                                            </div>
                                         </form>
                                        </div>
                                        <div class="card-body">
                                        <form action="includes/editProduct.php" name="productform" method="post">
                                                <div class="row">
                                                    <div class="col">
                                                        <input type="text" hidden name="prevsku" value="<?php echo $currentProduct['sku']; ?>">
                                                        <div class="mb-3"><label class="form-label float-end" for="pid"><strong>مسلسل</strong><br>
                                                    </label><input class="form-control" type="text" id="pid" name="pid"  value="<?php echo $currentProduct['pid']; ?>" ></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label text-end float-end" for="sku"><strong>الرقم</strong><br>
                                                    </label><input class="form-control" type="text" id="sku" name="sku"  value="<?php echo $currentProduct['sku']; ?>" ></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label float-end" for="Pname">الاسم&nbsp;</label>
                                                        <input class="form-control" type="text" id="Pname" inputmode="numeric" name="Pname" value="<?php echo $currentProduct['pname']; ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <!-- New -->
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label float-end" for="sellprice"><strong>البيع</strong><br>
                                                    </label><input class="form-control" type="text" id="sellprice" name="sellprice"  value="<?php echo $currentProduct['sellprice']; ?>"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label float-end" for="price"><strong>السعر</strong><br>
                                                    </label><input class="form-control" type="text" id="price" name="price"  value="<?php echo $currentProduct['price']; ?>"></div>
                                                    </div>
                                                    
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label float-end" for="qty"><strong>الكمية&nbsp;</strong><br></label>
                                                    <input class="form-control" type="text" id="qty"  name="qty" value="<?php echo $currentProduct['quantity'];?>"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label float-end" for="property"><strong>مكانية في المحل&nbsp;</strong><br>
                                                    </label><input class="form-control" type="text" id="property"  name="property" value="<?php echo $currentProduct['property']; ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label float-end" for="type"><strong>النوع&nbsp;</strong><br>
                                                    </label><input class="form-control" type="text" id="type"  name="type" value="<?php echo $currentProduct['type_name']; ?>"></div>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-3"><button class="btn btn-primary btn-sm float-start" type="submit">تعديل</button></div>
                                                </form>
                                        </div>
                                    </div>
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3"></div>
                                        <div class="card-body">
                                            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                                <table class="table my-0" id="dataTable">
                                                    <thead>
                                                        <tr>
                                                        <th class="text-end">الحالة</th>

                                                            <th class="text-end">الرقم الفاتورة</th>
                                                            <th class="text-end">السعر</th>
                                                            <th class="text-end">الكمية&nbsp;</th>
                                                            <th class="text-end">التاريج</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        foreach ($prices as $price) {
                                                            ?>
                                                            <tr>
                                                            <td><?php echo $price['status'];?></td>
                                                            <td><?php echo $price['rid'];?></td>
                                                            <td><?php echo $price['price'];?></td>
                                                            <td><?php echo $price['quantity'];?></td>
                                                            <td><?php echo $price['date'];?></td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr></tr>
                                                    </tfoot>
                                                </table>
                                            </div>
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
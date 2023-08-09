<?php
include "../../Controllers/receiptController.php";

$Rc= new ReceiptController;
$receipts=$Rc->getReciepts();
if(isset($_POST['search'])){
    $rid=$_POST['search'];
    $receipts=$Rc->getRecieptByRid($rid);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
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
                    <h3 class="text-end text-dark mb-4">اليحيا لقطع غيار النقل الثقيل&nbsp;</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-end text-primary m-0 fw-bold">الفواتير</p>
                        </div>
                        <div class="card-body text-end">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                <form action="" method="post">
                                <button class="btn btn-primary text-center" type="submit" >بحث</button>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                        
                                            <input type="text" class="form-control form-control-sm" aria-controls="dataTable" name="search" id ="search" placeholder="Search">
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th class="text-end">اسم العميل</th>
                                            <th class="text-end">الحالة&nbsp;</th>
                                            <th class="text-end">التاريخ&nbsp;</th>
                                            <th class="text-end">رقم الفاتورة&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach($receipts as $receipt){
                                        ?>
                                            <tr>
                                                <td><?php echo $receipt['cname'];?></td>
                                                <td><?php echo $receipt['status'];?></td>
                                                <td><?php echo $receipt['date'];?></td>
                                                <td><a href="includes/editReceipt.php"><?php echo $receipt['rid'];?></a></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                        <tr></tr>
                                        <tr></tr>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
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
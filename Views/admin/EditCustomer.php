<?php
require_once "../../Controllers/CustomerController.php";
require_once "../../Models/customer.php";
$cc=new CustomerController;
$customers=$cc->getCustomers();
$chossenCustomer=array("cname"=>"","balance"=>"","cid"=>"");

//he searched
if(isset($_POST['selector'])){
    $chossenCustomer= new Customer;
    $chossenCustomer=$cc->getCustomerById($_POST['selector']);
}


//he submited the new form
if(isset($_POST['cid'])){
    $newcustomer= new Customer;
    $newcustomer->cname=$_POST['cname'];
    $newcustomer->balance=$_POST['balance'];
    $newcustomer->cid=$_POST['cid'];
    $cc->updateCustomer($newcustomer);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>تعديل عميل</title>
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
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row float-none d-lg-flex justify-content-lg-end mb-3">
                        <div class="col-lg-8">
                            
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-end text-primary m-0 fw-bold">تعديل في بيانات عميل&nbsp;</p>
                                            <div class="text-end">
                                                <form action="" method="post">
                                                <button  class="btn btn-primary text-center" type="submit" >بحث</button>
                                                
                                                <select name="selector" id="">
                                                    <?php
                                                    foreach($customers as $customer){
                                                        ?>
                                                        <option value="<?php echo $customer['cid']?>"><?php echo $customer['cname'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                                <label for="">اختر عميل</label>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="">
                                                <div class="row">
                                                    <div class="col">
                                                    
                                                        <div class="mb-3"><label class="form-label float-end" for="balance"><strong>الرقم&nbsp;</strong><br></label>
                                                        <input class="form-control" type="text" id="balance" name="balance" required="" value="<?php echo $chossenCustomer['balance'];?>"></div>
                                                        <input type="text"hidden name="cid" value="<?php echo $chossenCustomer['cid'];?>">
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label text-end float-end" for="cname"><strong>الاسم</strong><br></label>
                                                        <input class="form-control" type="text" id="cname" name="cname" required="" value="<?php echo $chossenCustomer['cname'];?>"></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3"></div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm float-start" type="submit">تعديل </button></div>
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
<?php
require_once "../../Controllers/ProductController.php";

$pd= new ProductController;
$products=$pd->getAllProducts();
$searchproducts=$products;
if(isset($_POST['search'])){
    $name=$_POST['search'];
    $products=$pd->getProductByName($name);
}

?>
<?php require_once "navbar.php";?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>الرئيسية</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/mycss.css">

</head>
<body id="page-top">
    <div id="wrapper">
     <?php include "sidebar.html";?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            
                <div class="container-fluid">
                    <br><br>
                    <h3 class="text-end text-dark mb-4" >اليحيا لقطع غيار النقل الثقيل&nbsp;</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-end text-primary m-0 fw-bold">البضاعة</p>
                        </div>
                        <div class="card-body text-end">
                            <div class="row">
                                
                                <div class="col-md-6 "style="text-align:left">
                                    <select name="selectValue" id="selectValue" class="text-align:left">
                                </select>
                                </div>
                                <div class="col-md-6" >
                                <form action="" method="post">
                                    <div class="row">
                                        
                                        <div class="col-md-2" >
                                        <button class="btn btn-primary text-center" type="submit" >بحث</button>
                                        </div>
                                        <div class="col-md-10" >
                                            <div class="text-md-end dataTables_filter" id="dataTable_filter">  
                                            <input type="text" list="browser" class="form-control form-control-sm" aria-controls="dataTable" name="search" id ="search" placeholder="Search">
                                            <datalist id="browser">
                                        <?php
                                            foreach($searchproducts as $product){
                                            ?>
                                            <option value = "<?php echo $product['pname'];?>">
                                            <?php
                                            }
                                            ?>
                                        </datalist>
                                        </div>

                                    </div>                                
                                </form>
                                        </div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="products" role="grid" aria-describedby="dataTable_info">
                                <!-- <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th class="text-end">المنشأ</th>
                                            <th class="text-end">النوع</th>
                                            <th class="text-end">وصف</th>
                                            <th class="text-end">بيع</th>
                                            <th class="text-end">السعر</th>
                                            <th class="text-end">الكمية&nbsp;</th>
                                            <th class="text-end">الاسم&nbsp;</th>
                                            <th class="text-end">الرقم&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        // foreach($products as $product){
                                        ?>
                                            <tr class="h">
                                                <td><?php // echo $product['madein'];?></td>
                                                <td><?php // echo $product['type_name'];?></td>
                                                <td><?php // echo $product['property'];?></td>
                                                <td><?php // echo $product['sellprice'];?></td>
                                                <td><?php // echo $product['price'];?></td>
                                                <td><?php // echo $product['quantity'];?></td>
                                                <td><a class="btn" style="color: #000000!important"href="EditProduct.php?sku=<?php echo $product['sku'];?>"><?php echo $product['pname'];?></a></td>
                                                <td><a class="btn" style="color: #000000!important"href="EditProduct.php?sku=<?php echo $product['sku'];?>"><?php echo $product['sku'];?></a></td>
                                            </tr>
                                        <?php
                                        // }
                                        ?>
                                        <tr></tr>
                                        <tr></tr>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table> -->
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
    <script src= "main.js"></script>
</body>

</html>
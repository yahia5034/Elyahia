<?php
require_once "../../Controllers/ProductController.php";

$pd= new ProductController;
$products=$pd->getAllProducts();
$searchproducts=$products;
/* 
Old way of search using php let's call it A --> anything down with A is related to this
*/
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
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css"> -->
    <link rel="stylesheet" href="assets/mycss.css">
        <!-- CSS -->
    <link rel="stylesheet" href="test.css" />
    <!-- Fontawesome CDN Link -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/> -->
</head>
<body id="page-top">
    <div id="wrapper">
    <!-- including the side bar -->
     <?php include "sidebar.html";?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <br><br>
                    <h3 class="text-end text-dark mb-4" >اليحيا لقطع غيار النقل الثقيل&nbsp;</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-end text-primary m-0 fw-bold">البضاعة</p>
                            <!-- <button 
                                        class="btn btn-primary text-center" 
                                        type="submit" 
                                        onclick="download()"
                                        >
                                        تنزيل
                            </button> -->
                            <section >
                            <button class="show-modal">تنزيل</button>
                            <span class="overlay"></span>
                            <div class="modal-box">
                                <p class="h4">العناوين</p>
                                <div style="display: flex; flex-direction:row">
                                    <div>
                                    <input type="checkbox" id="notes" name="notes" value="notes">
                                    <label for="notes">ملاحظات</label><br>
                                    </div>
                                    <div>
                                    <input type="checkbox" id="madein" name="madein" value="madein">
                                    <label for="madein">المنشأ</label><br>
                                    </div>
                                    <div>
                                    <input type="checkbox" id="type_name" name="type_name" value="type_name">
                                    <label for="type_name">النوع</label><br>
                                    </div>
                                    <div>
                                    <input type="checkbox" id="property" name="property" value="property">
                                    <label for="property">وصف</label><br>
                                    </div>
                                    <div>
                                    <input type="checkbox" id="total" name="total" value="total">
                                    <label for="total">اجمالي الاسعار</label><br>
                                    </div>
                                    <div>
                                    <input type="checkbox" id="sellprice" name="sellprice" value="sellprice">
                                    <label for="sellprice">بيع</label><br>
                                    </div>
                                    <div>
                                    <input type="checkbox" id="price" name="price" value="price">
                                    <label for="price">السعر</label><br>
                                    </div>
                                    <div>
                                    <input type="checkbox" id="quantity" name="quantity" value="quantity">
                                    <label for="quantity">الكمية</label><br>
                                    </div>
                                    <div>
                                    <input type="checkbox" id="pname" name="pname" value="pname">
                                    <label for="pname">الاسم</label><br>
                                    </div>
                                    <div>
                                    <input type="checkbox" id="sku" name="sku" value="sku">
                                    <label for="sku">الرقم</label><br>
                                    </div>
                                    
                                </div>
                                <p class="h4">القيم في الجدول</p>
                                <div style="display: flex; flex-direction:row">
                                    <div>
                                    <input type="checkbox" id="madein_value" name="madein_value" value="madein">
                                    <label for="madein_value">المنشأ</label><br>
                                    </div>
                                    <div>
                                    <input type="checkbox" id="type_name_value" name="type_name_value" value="type_name">
                                    <label for="type_name_value">النوع</label><br>
                                    </div>
                                    <div>
                                    <input type="checkbox" id="property_value" name="property_value" value="property">
                                    <label for="property_value">وصف</label><br>
                                    </div>
                                    <div>
                                    <input type="checkbox" id="sellprice_value" name="sellprice_value" value="sellprice">
                                    <label for="sellprice_value">بيع</label><br>
                                    </div>
                                    <div>
                                    <input type="checkbox" id="price_value" name="price_value" value="price">
                                    <label for="price_value">السعر</label><br>
                                    </div>
                                    <div>
                                    <input type="checkbox" id="quantity_value" name="quantity_value" value="quantity">
                                    <label for="quantity_value">الكمية</label><br>
                                    </div>
                                    <div>
                                    <input type="checkbox" id="pname_value" name="pname_value" value="pname">
                                    <label for="pname_value">الاسم</label><br>
                                    </div>
                                    <div>
                                    <input type="checkbox" id="sku_value" name="sku_value" value="sku">
                                    <label for="sku_value">الرقم</label><br>
                                    </div>
                                </div>
                            
                                            
                                <div class="buttons">
                                <button class="close-btn" onclick="test()">Ok, Close</button>
                                </div>
                            </div>
                            </section>
                            <select name="sortBy" id="sortBy" onchange=sortBy()>
                                <option value="type_name">المنشا</option>
                                <option value="property" selected>بالوصف</option>
                            </select>
                        </div>
                        <div class="card-body text-end">
                            <div class="row">
                                
                                <div class="col-md-6 "style="text-align:left">
                                    <select name="selectValue" id="selectValue" class="text-align:left">
                                </select>
                                </div>
                                <div class="col-md-6" >
                                    <!-- A -->
                                <!-- <form action="" method="post"> -->
                                <form >
                                    <div class="row">
                                        <!-- B: New efficient way using java script more responsive and more functionallity -->
                                        <div class="col-md-2" >
                                        <button 
                                        class="btn btn-primary text-center" 
                                        type="submit" 
                                        onclick="searchProducts(event)"
                                        >
                                        بحث
                                        </button>
                                        </div>
                                        <div class="col-md-10" >
                                            <div class="text-md-end dataTables_filter" id="dataTable_filter">  
                                            <input type="text" list="browser"onkeyup="searchFast()" class="form-control form-control-sm" aria-controls="dataTable" name="search" id ="search" placeholder="Search">
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
                            <input type="checkbox" name="checkbox" id ="checkbox" onchange="hidePrice()">اخفاء السعر
                            <div class="table-responsive table mt-2" id="products" role="grid" aria-describedby="dataTable_info">
                                <!-- A: -->
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
    <script>
      const section = document.querySelector("section"),
        overlay = document.querySelector(".overlay"),
        showBtn = document.querySelector(".show-modal"),
        closeBtn = document.querySelector(".close-btn");

      showBtn.addEventListener("click", () => section.classList.add("active"));

      overlay.addEventListener("click", () =>
        section.classList.remove("active")
      );

      closeBtn.addEventListener("click", () =>
        section.classList.remove("active")
      );
    </script>
</body>

</html>
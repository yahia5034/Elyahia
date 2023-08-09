<?php
require_once "../../Controllers/TypeController.php";
require_once "../../Models/Type.php";
$cc=new TypeController;
$types=$cc->getTypes();
$chossenType=array("type_name"=>"","madein"=>"","type_id"=>"");

if(isset($_GET['status'])){
    echo'<script>alert( "added successfully");</script>';
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>اضافة نوع</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
    <?php require_once "sidebar.html";?>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
            <?php require_once "navbar.php";?>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">ِِAdd Type</h3>
                    <div class="row float-none d-lg-flex justify-content-lg-end mb-3">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header text-end py-3">
                                            <p class="text-end text-primary m-0 fw-bold">اضافة نوع</p>
                                            <div class="text-end"></div>
                                        </div>

                                        <div style="text-align: right;">
                                        <select name="selector" id="">
                                                    <?php
                                                    foreach($types as $type){
                                                        ?>
                                                        <option value="<?php echo $type['type_id']?>"><?php echo $type['type_name'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                        <label for="selector"> الانواع المسجلة</label>
                                        </div>
                                        
                                        <div class="card-body">
                                            <form action="includes/addType.php" method="post">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label float-end" for="madein"><strong>المصنع&nbsp;</strong><br></label>
                                                        <input class="form-control" type="text" id="madein" name="madein" required=""></div>
                                                    </div>  
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label text-end float-end" for="typename"><strong>الاسم</strong><br></label>
                                                        <input class="form-control" type="text" id="type_name"  name="typename" required=""></div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="mb-3"><button class="btn btn-primary btn-sm float-start" type="submit">اضافة</button></div>
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
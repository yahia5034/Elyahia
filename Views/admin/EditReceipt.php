<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>تعديل فاتورة </title>
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
                    <h3 class="text-dark mb-4"></h3>
                    <div class="row float-none d-lg-flex justify-content-lg-end mb-3">
                        <div class="col-lg-8">
                            
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                        <p class="text-end text-primary m-0 fw-bold">بحث عن فاتورة&nbsp;</p>
                                                <div class="row">
                                                    <div class="col-md-6 text-nowrap">
                                                        
                                                        <form action="" method="post" style="text-align: right;">
                                                            <button class="btn btn-primary text-center"  type="submit" >بحث</button>
                                                            </div>
                                                        <div class="col-md-6">
                                                        <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                                        <input type="text" name="NoOfProducts" style="text-align: right;" placeholder="ادخل الرقم">
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                    </div>
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3"></div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label float-end" for="pid"><strong>التاريخ</strong></label><input type="email" id="email" name="pid" required=""></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label text-end float-end" for="sku"><strong>المحل</strong></label><input type="text" id="username" name="sku" required=""></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                                <table class="table my-0" id="dataTable">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-end">&nbsp;الرقم الفاتورة</th>
                                                            <th class="text-end">السعر</th>
                                                            <th class="text-end">الكمية&nbsp;</th>
                                                            <th class="text-end">الاسم&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td style="text-align: right;">Tokyo</td>
                                                            <td style="text-align: right;">33</td>
                                                            <td style="text-align: right;">2008/11/28</td>
                                                            <td style="text-align: right;">$162,700</td>
                                                        </tr>
                                                        <tr></tr>
                                                        <tr></tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr></tr>
                                                    </tfoot>
                                                </table>
                                            </div>    
                                             <div class="mb-3"><button class="btn btn-primary btn-sm float-start" type="submit">تعديل</button></div>
                                          
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
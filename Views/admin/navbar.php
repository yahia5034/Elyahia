<?php
    require_once "../../Models/generalAuth.php";
    $auth=new Auth;
    if(!$auth->loggedin()){
        header("location: login.php");
    }
?>
<head>

<link rel = "icon" href = "assets/img/semi.png"type = "image/x-icon">

    <!-- <link rel = "icon" href = "data:image/jpeg;base64,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" type = "image/x-icon"> -->
    
</head>
<nav class="navbar navbar-dark navbar-expand-md sticky-top bg-primary bg-gradient navbar-shrink py-3" id="mainNav-2">
    <div class="container" style="justify-content-space-evenly">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
            <div class="sidebar-brand-text mx-3"><span>Elyahia</span></div>
        </a>
        <!-- <a class="navbar-brand d-flex align-items-center" href="Main.php"><span class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bezier">
                    <path fill-rule="evenodd" d="M0 10.5A1.5 1.5 0 0 1 1.5 9h1A1.5 1.5 0 0 1 4 10.5v1A1.5 1.5 0 0 1 2.5 13h-1A1.5 1.5 0 0 1 0 11.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zm10.5.5A1.5 1.5 0 0 1 13.5 9h1a1.5 1.5 0 0 1 1.5 1.5v1a1.5 1.5 0 0 1-1.5 1.5h-1a1.5 1.5 0 0 1-1.5-1.5v-1zm1.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1zM6 4.5A1.5 1.5 0 0 1 7.5 3h1A1.5 1.5 0 0 1 10 4.5v1A1.5 1.5 0 0 1 8.5 7h-1A1.5 1.5 0 0 1 6 5.5v-1zM7.5 4a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"></path>
                    <path d="M6 4.5H1.866a1 1 0 1 0 0 1h2.668A6.517 6.517 0 0 0 1.814 9H2.5c.123 0 .244.015.358.043a5.517 5.517 0 0 1 3.185-3.185A1.503 1.503 0 0 1 6 5.5v-1zm3.957 1.358A1.5 1.5 0 0 0 10 5.5v-1h4.134a1 1 0 1 1 0 1h-2.668a6.517 6.517 0 0 1 2.72 3.5H13.5c-.123 0-.243.015-.358.043a5.517 5.517 0 0 0-3.185-3.185z"></path>
                </svg></span><span>Elyahia</span>
        </a> -->
        <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav mx-auto">

                <li class="nav-item dropdown show">
                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown">فواتبر</a>
                    <div class="dropdown-menu " data-bs-popper="none">
                        <a class="dropdown-item" href="viewReceipts.php">الفواتير</a>
                        <a class="dropdown-item" href="EditReceipt.php" hidden>تعديل فاتورة</a>
                        <a class="dropdown-item" href="AddReceipt.php"  target="blank">فاتورة شراء</a>
                        <a class="dropdown-item" href="SellReceipt.php" target="blank">فاتورة بيع</a></div>
                </li>
                <li class="nav-item dropdown show">
                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">المنتجات</a>
                    <div class="dropdown-menu " data-bs-popper="none">
                    <a class="dropdown-item" href="AddProduct.php">اضافة منتج جديد</a>
                    <a class="dropdown-item" href="EditProduct.php"  target="blank">بحث و تعديل</a>
                    <a class="dropdown-item" href="AddType.php">صنف جديد</a></div>
                </li>
                <li class="nav-item dropdown show">
                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">العملاء</a>
                    <div class="dropdown-menu " data-bs-popper="none">
                        <a class="dropdown-item" href="AddCustomer.php">اضافة عميل</a>
                        <a class="dropdown-item" href="EditCustomer.php">تعديل وبحث عن عميل&nbsp;</a>
                        <a class="dropdown-item" href="#">بحث عن حركات هميل</a></div>
                </li>
                <li class="nav-item"><a class="nav-link active" href="includes/login.php?logout=''">Logout</a></li> 

            </ul><a class="btn btn-primary shadow" role="button" href="Main.php">الرئيسية</a>
            <!-- <a class="nav-link active" href="Main.php">الرئيسية</a> -->
        </div>
    </div>
</nav>

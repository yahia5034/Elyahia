<?php
$err="";
if(isset($_GET['err'])){
    $err=$_GET['err'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <script>
    function change(){
        document.getElementById("span").innerText="";
    }
    </script>
</head>
<body class="bg-gradient-primary" style="background: rgb(255,255,255);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-3 d-none d-lg-flex"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                    <span style="color: red; font-weight: bold;" id="span"><?php echo $err;?></span>
                                    <form   action="includes/login.php" method="post">
                                        <div class="mb-3"><input id="exampleInputEmail"onchange="change()" class="form-control form-control-user" style="text-align:left;" type="text" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="name" /></div>
                                        <div class="mb-3"><input id="exampleInputPassword" onchange="change()" class="form-control form-control-user" style="text-align:left;" type="password" placeholder="Password" name="password" /></div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input id="formCheck-1" class="form-check-input custom-control-input" type="checkbox" /><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div><button class="btn btn-primary d-block btn-user w-100" type="submit">Login</button>
                                        <hr />
                                        <hr />
                                    </form>
                                    <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                    <div class="text-center"><a class="small" href="register.html">Create an Account!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
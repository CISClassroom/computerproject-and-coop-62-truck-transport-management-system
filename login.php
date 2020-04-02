<!DOCTYPE html>
<?php
    require 'connectdb.php';
?>
<html lang="th">
    <head>
        <meta charset="utf-8" />
        <title>Amb Checker| Powered by ID Drives</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="e-Checklist" name="description" />
        <meta content="ID Drives" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="image/favicons.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>


    <body class="authentication-bg">

        <div class="home-btn d-none d-sm-block">
            <a href="index.html"><i class="fas fa-home h2 text-dark"></i></a>
        </div>

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="text-center">
                            <a href="javascript:void(0);">
                                <span><img src="assets/images/logo.png" alt="" height="80"></span>
                            </a>
                            <p class="text-muted mt-2 mb-4">trucktransportmanagement.com</p>
                        </div>
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center mb-4">
                                    <h4 class="text-uppercase mt-0">เข้าสู่ระบบ</h4>
                                </div>

                                <form name="form1" method="post" action="checklogin.php">

                                    <div class="form-group mb-3">
                                        <label for="user_username">ชื่อผู้ใช้งาน / Username</label>
                                        <input class="form-control" name="user_username" type="text" id="user_username" required="" placeholder="กรอกชื่อผู้ใช้งาน">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="user_password">รหัสผ่าน / Password</label>
                                        <input class="form-control" name="user_password" type="password" required="" id="user_password" placeholder="กรอกรหัสผ่าน">
                                    </div>

                                    <!-- <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div> -->

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-success btn-block" name="submit" type="submit"> เข้าสู่ระบบ </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="javascript:void(0);" class="text-muted ml-1"><i class="fa fa-lock mr-1"></i>ลืมรหัสผ่านใช่หรือไม่?</a></p>
                                <!-- <p class="text-muted">Don't have an account? <a href="pages-register.html" class="text-dark ml-1"><b>Sign Up</b></a></p> -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->
    

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>
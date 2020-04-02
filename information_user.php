<?php
include("connectdb.php");
session_start();
?>

<!DOCTYPE html>
<html lang="th">
    <head>
        <meta charset="utf-8" />
        <title>ข้อมูลผู้ใช้</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="ระบบจัดการขนส่งทางรถบรรทุก" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!--swith alert-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <!--Morris Chart-->
        <link rel="stylesheet" href="assets/libs/morris-js/morris.css" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>
  
    <body class="authentication-bg">
    
    <?php
        include("show_information_topbar.php");
    ?>
    
        <!-- Begin page -->
        <div id="wrapper">

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
    <?php
        include("show_information_lift_sidebar.php");
    ?>
    
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="card-box">
                                    
                                    <h1>ข้อมูลผู้ใช้</h1>
                                    
                                    <div class="col-xl-8">
                                            <div class="card-box">
                                    
                                                <form class="form-horizontal" role="form" data-parsley-validate novalidate>
                                                <?php
                                                    $ad_id =$_GET["ad_id"];
                                                    $query ="SELECT user.user_name ,user.user_username ,user.user_password,user.user_id, user.ut_id, user.ad_id , usertype.ut_name ,usertype.ut_id ,company.user_id,company.company_name FROM  user 
                                                    INNER JOIN usertype ON user.ut_id = usertype.ut_id 
                                                    INNER JOIN company ON user.user_id = company.user_id WHERE  ad_id = '$ad_id'";
                                                    $res = mysqli_query($con,$query);
                                                                                            
                                                    while ($row = mysqli_fetch_array($res)){
                                                    ?>
    
                                                    <div class="form-group row">
                                                        <label  class="col-sm-4 col-form-label">ชื่อ-นามสกุล</label>
                                                        <div class="col-sm-7">
                                                            <div  class="form-control">
                                                                <?php echo $row["user_name"];?>  
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="hori-pass2" class="col-sm-4 col-form-label">Username</label>
                                                        <div class="col-sm-7">
                                                            <div  class="form-control">
                                                                <?php echo $row["user_username"];?>  
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="hori-pass2" class="col-sm-4 col-form-label">Password</label>
                                                        <div class="col-sm-7">
                                                            <div  class="form-control">
                                                                <?php echo $row["user_password"];?>  
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="hori-pass2" class="col-sm-4 col-form-label">แผนกงาน</label>
                                                        <div class="col-sm-7">
                                                            <div  class="form-control">
                                                                <?php echo $row["ut_name"];?>  
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                    <label for="hori-pass2" class="col-sm-4 col-form-label">บริษัทที่สังกัด</label>
                                                        <div class="col-sm-7">
                                                            <div  class="form-control">
                                                                <?php echo $row["company_name"];?>  
                                                            </div>
                                                        </div>
                                                    </div>
            
                                                    
                                                </form>
            
                                        </div> <!-- end card-body -->
                                    </div>
                                    <!-- end card -->
                            </div><!-- end col -->
                        </div>  
                    </div> <!-- container -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                               2016 - 2019 &copy; Adminto theme by <a href="">Coderthemes</a> 
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>

                   
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- knob plugin -->
        <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>

        <!-- Sweet Alerts js -->
        <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

        <!-- Sweet alert init js-->
        <script src="assets/js/pages/sweet-alerts.init.js"></script>

        <!--Morris Chart-->
        <script src="assets/libs/morris-js/morris.min.js"></script>
        <script src="assets/libs/raphael/raphael.min.js"></script>

        <!-- Dashboard init js-->
        <script src="assets/js/pages/dashboard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        <?php
           }
           ?>
    </body>
</html>
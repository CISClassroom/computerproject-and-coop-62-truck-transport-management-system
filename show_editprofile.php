<?php
include("connectdb.php");
session_start();
include("show_information_lift_sidebar.php");
include("show_information_topbar.php");
?>
<!DOCTYPE html>
<html lang="th">
    <head>
        <meta charset="utf-8" />
        <title>ระบบจัดการขนส่งทางรถบรรทุก</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="ระบบจัดการขนส่งทางรถบรรทุก" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!--Morris Chart-->
        <link rel="stylesheet" href="assets/libs/morris-js/morris.css" />

        <!-- dropify -->
        <link href="assets/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />
      
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>
    <body >
    <?php
    include("show_information_topbar.php");
    ?>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
            <div class="content">
                
                <!-- Start Content-->
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                                    
                                    <h1>ตั้งค่าข้อมูลส่วนตัว</h1>
                                    
                                    <div class="col-xl-10">
                                            <div class="card-box">
                                            <form class="form-horizontal" role="form" data-parsley-validate novalidate >
                                                
                                                <?php
                                                    $query = "SELECT * FROM user";
                                                    $res = mysqli_query($con,$query);
                                                   
                                                ?>
                                                
                                                <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-thumbnail avatar-lg">
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">ชื่อ - นามสกุล</label>
                                                        <?php print_r($_SESSION['user_name']);?> 
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">บริษัทที่สังกัด</label>
                                                        <div class="col-sm-4 col-form-label">
                                                            <?php echo $row["ad_id"];?>
                                                        </div>
                                                    </div>

                                        
                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Username</label>
                                                        <?php print_r($_SESSION['user_username']);?>
                                                        
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-4 col-form-label">Password</label>
                                                        <?php print_r($_SESSION['user_password']);?>
                                                        </div>


                                                        <div class="float-right">
                                                            <a href="setting_profile.php?id="  class="btn btn-warning btn-rounded width-lg waves-effect waves-light " ><span>แก้ไข </span></a>
                                                        </div>

                                                    </div>
                                           
                                                </form>
     <!-- END wrapper -->



        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- knob plugin -->
        <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>

        <!--Morris Chart-->
        <script src="assets/libs/morris-js/morris.min.js"></script>
        <script src="assets/libs/raphael/raphael.min.js"></script>

        <!-- Dashboard init js-->
        <script src="assets/js/pages/dashboard.init.js"></script>

        <!-- dropify js -->
        <script src="assets/libs/dropify/dropify.min.js"></script>

        <!-- form-upload init -->
        <script src="assets/js/pages/form-fileupload.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>


</body>
</html>
<?php
include("connectdb.php");
session_start();
?>

<!DOCTYPE html>
<html lang="th">
    <head>
        <meta charset="utf-8" />
        <title>เพิ่มพนักงานขับรถ</title>
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
        include("counter_topbar.php");
    ?>
    
        <!-- Begin page -->
        <div id="wrapper">

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
    <?php
        include("counter_left_sidebar.php");
    ?>
    
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="card-box">
                                    
                                    <h1>เพิ่มพนักงานขับรถ</h1>
                                    
                                    <div class="col-xl-8">
                                            <div class="card-box">
                                    
                                                <form action="./counter_adddriver_save.php" method="post" class="form-horizontal" role="form" data-parsley-validate novalidate>

                                                    <div class="form-group row">
                                                        <label for="hori-pass1" class="col-sm-4 col-form-label">ชื่อ-นามสกุล</label>
                                                        <div class="col-sm-7">
                                                            <input id="hori-pass1" type="text" name="driver_name" placeholder="ชื่อ-นามสกุล" required
                                                                   class="form-control">
                                                        </div>
                                                    </div>

                                                   
                                                    <div class="form-group row">
                                                        <label for="hori-pass2" class="col-sm-4 col-form-label">แผนกงาน</label>
                                                            <?php
                                                                $query ="SELECT * FROM usertype WHERE ut_id ";
                                                                $result = mysqli_query($con,$query);
                                                            ?>
                                                            
                                                        <div class="col-sm-7">
                                                            <select id="department" name="driver_department"class="form-control" >
                                                                <?php 
                                                                    while ($row = mysqli_fetch_array($result)) {
                                                                        echo "<option value='$row[0]'> $row[1]</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="hori-pass2" class="col-sm-4 col-form-label">บริษัทที่สังกัด</label>
                                                            <?php
                                                                $query ="SELECT * FROM company ";
                                                                $result = mysqli_query($con,$query);
                                                            ?>
                                                          
                                                        <div class="col-sm-7">
                                                            <select id="user_id" name="user_id"  class="form-control" >
                                                            <option value="">--เลือกบริษัท--</option>
                                                                <?php 
                                                                    while ($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
                                                                        echo "<option value='$row[0]'> $row[2]</option>";
                                                                    }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                       

                                                    <div class="form-group row">
                                                        <label for="hori-pass2" class="col-sm-4 col-form-label">หมายเลขโทรศัพท์</label>
                                                        <div class="col-sm-7">
                                                            <input data-parsley-equalto="#hori-pass1" type="text" name="driver_tel" required
                                                                   placeholder="driver_tel" class="form-control" id="hori-pass2">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="hori-pass2" class="col-sm-4 col-form-label">username</label>
                                                        <div class="col-sm-7">
                                                            <input data-parsley-equalto="#hori-pass1" type="text" name="driver_username" required
                                                                   placeholder="username" class="form-control" id="hori-pass2">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="hori-pass2" class="col-sm-4 col-form-label">Password</label>
                                                        <div class="col-sm-7">
                                                            <input data-parsley-equalto="#hori-pass1" type="password" name="driver_password" required
                                                                   placeholder="Password" class="form-control" id="hori-pass2">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="hori-pass2" class="col-sm-4 col-form-label">Line ID</label>
                                                        <div class="col-sm-7">
                                                            <input data-parsley-equalto="#hori-pass1" type="text" name="lineid" required
                                                                   placeholder="line" class="form-control" id="hori-pass2">
                                                        </div>
                                                    </div>

  
                                                    <div class="form-group mb-0">
                                                        <div class="float-right">
                                                       
                                                            <button type="submit" name="submit" class="btn btn-success  waves-light" ><span>เพิ่มข้อมูลผู้ใช้</span></button>
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
     
    </body>
</html>
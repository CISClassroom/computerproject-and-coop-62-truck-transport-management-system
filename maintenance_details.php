<?php
include("connectdb.php");
session_start();
$car_id = $_GET['car_id'];
$qr_user = mysqli_query($con, "SELECT * from user where ad_id = '$_SESSION[ad_id]'") or die("Database selection failed: " . mysqli_error($con));
$re_user = mysqli_fetch_array($qr_user);
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

    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>
<?php
require("maintenance_topbar.php");
?>

<body>

    <!-- Begin page -->
    <div id="wrapper">



        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-4 col-md-4">
                            <div class="card-box">
                                <h2 class="">ข้อมูลรถ</h2>
                                <div class="progress">
                                    <div class="progress-bar bg-blue progress-bar-striped progress-bar-animated"
                                        role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 50%;">
                                        <span class="sr-only">0% Complete</span>
                                    </div>
                                </div>
                                <hr />
                                <?php

                                        $sql = "SELECT  *  FROM car_data
                                            WHERE car_data.rec=$car_id ";


                                        $query = mysqli_query($con, $sql) or die("Database selection failed: " . mysqli_error($con));
                                        while($result = mysqli_fetch_array($query)) {
                                            $company_id = $result['company_id'];
                                            $car_lin = $result['car_id'];
                                            
                                        ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <dt class="col-sm-5">ทะเบียนรถ</dt>
                                            <dd class="col-sm-7"><?php echo $result['car_plate'] ?></dd>
                                            <dt class="col-sm-5">จังหวัด</dt>
                                            <dd class="col-sm-7"><?php echo $result['car_province'] ?></dd>
                                            <dt class="col-sm-5">ชื่อคนขับ</dt>
                                            <dd class="col-sm-7"><?php echo $result['car_name_cf'] ?></dd>



                                        </div>
                                    </div>
                                </div>
                                <?php
                                    }
                                    ?>
                            </div>
                            <hr />
                        </div>
                        <div class="col-xl-8 col-md-8">
                            <div class="card-box">
                                <h2 class="">รายละเอียด</h2>
                                <div class="progress">
                                    <div class="progress-bar bg-blue progress-bar-striped progress-bar-animated"
                                        role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 100%;">
                                        <span class="sr-only">35% Complete</span>
                                    </div>
                                </div>
                                <hr />

                                <?php 
                                $id = $_GET['id'];
                                $select = "SELECT * FROM report
                                 WHERE report_id=$id AND report_status='ผ่าน'
                                ";
                                $query = mysqli_query($con,$select);
                                while($row = mysqli_fetch_array($query)){
                                    $canlin = $row['license_car'];
                                   
                                }
                            
                                $select = "SELECT * FROM report 
                                WHERE license_car='$canlin' AND report_status='ผ่าน'
                               ";
                               $query = mysqli_query($con,$select);

                                while($row = mysqli_fetch_array($query)){
                                ?>
                                <?php if($row['report_status'] == "ผ่าน"){?>
                                <div class="card-box border border-primary">
                                    <?php echo $row['report_detail'];?></a>
                                </div>
                                <button type="button" class="btn btn-info " onclick="showValue(this)"
                                    value="<?php echo $row["image"]; ?>">รูปภาพ</button>


                                <?php }?>


                                <?php }?>
                                <div class="float-right">
                                    <button type="button" class="btn btn-success  waves-light mt-2 "
                                        id="sa-success">ยืนยันการซ่อม</button>
                                </div>
                            </div>
                            <hr />
                        </div>
                    </div>
                </div>
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
    <?php
require("maintenance_lift_sidebar.php");
?>


    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- knob plugin -->
    <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>

    <!--Morris Chart-->
    <script src="assets/libs/morris-js/morris.min.js"></script>
    <script src="assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboard init js-->
    <script src="assets/js/pages/dashboard.init.js"></script>

    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Sweet alert init js-->
    <script src="assets/js/pages/sweet-alerts.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    <script>
        /*
Template Name: Adminto - Responsive Bootstrap 4 Admin Dashboard
Author: CoderThemes
File: Sweet Alerts init js
*/

        ! function ($) {
            "use strict";

            var SweetAlert = function () {};

            //examples
            SweetAlert.prototype.init = function () {

                    //Custom Image
                    /*  $('#sa-image').click(function () {
                          Swal.fire({
                              imageUrl: $('#img').val(),
                              imageHeight: 500,
                              imageAlt: 'A tall image',
                              confirmButtonClass: 'btn btn-confirm mt-2'
                          })
                      });*/
                    //Success Message
                    $('#sa-success').click(function () {
                        Swal.fire({
                            title: 'ยืนยันการซ่อมสำเร็จ',
                            type: 'success',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        })
                    });
                },
                //init
                $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
        }(window.jQuery),

        //initializing
        function ($) {
            "use strict";
            $.SweetAlert.init()
        }(window.jQuery);

        function showValue(obj) {
            Swal.fire({
                imageUrl: obj.value,
                imageHeight: 500,
                imageAlt: 'A tall image',
                confirmButtonClass: 'btn btn-confirm mt-2'
            })
            //alert(obj.value);
        }
    </script>
</body>

</html>
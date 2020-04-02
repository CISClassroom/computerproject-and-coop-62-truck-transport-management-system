<?php
include("connectdb.php");
session_start();
$car_id = $_GET['car_id'];
$carlin = $_GET['carlin'];
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

    <!-- dropify -->
    <link href="assets/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <script language=Javascript>
        function Inint_AJAX() {
            try {
                return new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {} //IE
            try {
                return new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {} //IE
            try {
                return new XMLHttpRequest();
            } catch (e) {} //Native Javascript
            alert("XMLHttpRequest not supported");
            return null;
        };

        function dochange(src, val) {
            var req = Inint_AJAX();
            req.onreadystatechange = function () {
                if (req.readyState == 4) {
                    if (req.status == 200) {
                        document.getElementById(src).innerHTML = req.responseText; //รับค่ากลับมา
                    }
                }
            };
            req.open("GET", "locale_counter.php?data=" + src + "&val=" + val); //สร้าง connection
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
            req.send(null); //ส่งค่า
        }
        window.onLoad = dochange('province', -1);
    </script>

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
                        <div class="col-md-4">
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
                                    <form action="maintenance_update.php" method="post" enctype="multipart/form-data">

                                    <h4 class="header-title mt-0 mb-3">รายละเอียดข้อที่ไม่ผ่านการตรวจ</h4>
                            <?php 
                                $id = $_GET['id'];
                                $select = "SELECT * FROM report WHERE license_car='$carlin' AND report_status='ไม่ผ่าน'";
                                $query = mysqli_query($con,$select);
                                while($row = mysqli_fetch_array($query)){
                                ?>
                         
                               
                                    <div class="card-box border border-primary mt-2" >
                                        <?php echo $row['report_detail'];?><br>
                                    </div>
                                    <button type="button" class="btn btn-info " onclick="showValue(this)" 
                                    value="<?php echo $row["image"]; ?>">รูปภาพ</button><br>
                                    <!--<input type="text" value="<?php echo $row["image"]; ?>" id="sa-image">-->

                                <?php }?>
                               
                                    <input type="hidden" name="car_id" value="<?php echo $_GET['car_id']; ?>" id="">
                                    <input type="hidden" name="report_id" value="<?php echo $_GET['id']; ?>" id="">
                                    <hr />

                                    <h4 class="header-title mt-0 mb-3">กรอกรายละเอียด</h4>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" rows="4" name="detail_update"
                                            id="example-textarea"></textarea>
                                    </div> <br>
                                    <h4 class="header-title mt-0 mb-3">แนบใบเสร็จ</h4>
                                    <div class="col-sm-9">
                                        <input type="file" class="dropify" data-max-file-size="1M"
                                            name="image_update" />
                                    </div>

                                    <div class="float-right">
                                        <input type="submit" value="บันทึกข้อมูล"
                                            class="btn btn-success  waves-light ">
                                    </div>
                                    </form>

                                    <hr />
                                </div>
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

    <!-- dropify js -->
    <script src="assets/libs/dropify/dropify.min.js"></script>

    <!-- form-upload init -->
    <script src="assets/js/pages/form-fileupload.init.js"></script>


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

                    /*    //Custom Image
                        $('#sa-image').click(function () {
                            Swal.fire({
                                imageUrl: 'https://placeholder.pics/svg/1200x1500',
                                imageHeight: 500,
                                imageAlt: 'A tall image',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            })
                        });*/

                    //Custom Image
                 
                    $('#sa-image').click(function () {
                        var img = $('#sa-image').val();
                        Swal.fire({
                            imageUrl: img,
                            imageHeight: 500,
                            imageAlt: 'A tall image',
                            confirmButtonClass: 'btn btn-confirm mt-2'
                        })
                    });

                    //Success Message
                    $('#sa-success').click(function () {
                        Swal.fire({
                            title: 'บันทึกข้อมูลสำเร็จ',
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

        function showValue(obj){
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
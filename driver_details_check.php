<?php
include("connectdb.php");
session_start();
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
    require("driver_topbar.php");
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
                            <div class="col-md-12" >
                                <div class="card">
                                    <div class="card-box">
                                        <h1>รายการรผลตรวจรายวัน</h1>
                                        <h4 class="card-title">วันที่ 2 กุมภาพันธ์ 2563</h4>                                        
                                            <div class="card-box border border-primary">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <form class="form-horizontal" role="form" data-parsley-validate novalidate>
                                                            
                                                            <div class="form-group row">
                                                                <label for="inputEmail3" class="col-sm-2 col-form-label">ทะเบียนรถ</label>
                                                                <label for="hori-pass1" class="col-sm-2 col-form-label">กข1584</label>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="hori-pass1" class="col-sm-2 col-form-label">จังหวัด</label>
                                                                <label for="hori-pass1" class="col-sm-2 col-form-label">อุดรธานี</label>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="hori-pass2" class="col-sm-2 col-form-label">ชื่อคนขับ</label>
                                                                <label for="hori-pass1" class="col-sm-2 col-form-label">เฟิร์น</label>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="webSite" class="col-sm-2 col-form-label">ประเภทรถ</label>
                                                                <label for="hori-pass1" class="col-sm-2 col-form-label">รถยนต์</label>
                                                            </div>
                                                        <h4 class="col-sm-2 col-form-label">รายละเอียด</h4> 
                                                
                                                        <div class="card-box border border-primary">
                                                            <p>เปลี่ยนน้ำมันเครื่อง เปลี่ยนล้อหน้า 2 ข้าง ซ่อมเบรก ซ่อมหม้อน้ำ</p>
                                                        </div>

                                                        <h4 class="col-sm-2 col-form-label">วิเคราะห์ผลตรวจ</h4> <br>     
                                                        </form>  
                                            
                                                        <div class="checkbox checkbox-success">
                                                            <div class="col-sm-9">
                                                            <input id="checkbox0" type="checkbox">
                                                            <label for="checkbox0">
                                                                ผ่าน
                                                            </label>
                                                            </div>
                                                        </div>

                                                        <div class="checkbox checkbox-danger">
                                                            <div class="col-sm-9">
                                                                <input id="checkbox1" type="checkbox" checked>
                                                                <label for="checkbox1">ไม่ผ่าน</label>
                                                            </div>
                                                        </div>
                                                        <div class="float-right">
                                                            <button type="button" class="btn btn-success  waves-light " id="sa-success">บันทึกข้อมูล</button>
                                                        </div>
                                                    </div>
                                                        <div class="col-md-4">
                                                            <div class="card card-inverse text-white">
                                                                <img class="card-img img-fluid" src="assets/images/gallery/6.jpg" alt="Card image">     
                                                            </div>
                                                        </div>
                                                    </div>
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
        require("driver_left_sidebar.php");
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

!function ($) {
    "use strict";

    var SweetAlert = function () {
    };

    //examples
    SweetAlert.prototype.init = function () {

        //Success Message
        $('#sa-success').click(function () {
            Swal.fire(
                {
                    title: 'บันทึกข้อมูลสำเร็จ',
                    type: 'success',
                    confirmButtonClass: 'btn btn-confirm mt-2'
                }
            )
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
    </script>
        
    </body>
</html>
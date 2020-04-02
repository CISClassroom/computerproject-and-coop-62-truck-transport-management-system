<?php
session_start();
include_once "connectdb.php";
$qr_user = mysqli_query($con, "select * from user where ad_id = '$_SESSION[ad_id]'") or die("Database selection failed: " . mysqli_error($con));
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

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

     <!-- App favicon -->
     <link rel="shortcut icon" href="assets/images/favicon.ico">

     <!-- Sweet Alert-->
     <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

     <!-- App css -->
     <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body>
<?php
include("dispatch_top_bar.php");

include("dispatch_lift_sidebar.php");
  
?>

    <!-- Baegin page -->
    <div id="wrapper">



        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

           
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card-box">
                    <h2 class="">กรอกรายละเอียดการจ่ายงาน</h2>
                        <div class="progress">
                            <div class="progress-bar bg-blue progress-bar-striped progress-bar-animated"
                                role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"
                                style="width: 50%;">
                                <span class="sr-only">0% Complete</span>
                            </div>
                        </div>
                        <hr />
                        
                       <?php
                                           $id = $_GET['id'];
                                          
                                           $sql = "SELECT * from report AS A  JOIN car_data AS B ON A.license_car=B.car_plate 
                                           JOIN company AS c on B.company_id=c.user_id
                                           WHERE report_id='$id'";
                                           //$sql = "SELECT * FROM car_detail";

                                           $query = mysqli_query($con, $sql) or die("Database selection failed: " . mysqli_error($con));
                                           while ($result = mysqli_fetch_array($query)) {
                                            
                                           ?>
    
                                <form action="./dispatch_addwork_save.php" method="post" class="form-horizontal" role="form" data-parsley-validate novalidate>                  
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">หมายเลขทะเบียนรถ</label>
                                     <?php echo $result['license_car'];?>
                                    <input type="hidden" name="car_plate" value="<?php echo $result['license_car'];?>">
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">ชื่อบริษัทที่สังกัด</label>
                                    <?php echo $result['company_name'];?>
                                    <input type="hidden" name="car_company" value=" <?php echo $result['company_name'];?>">

                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">ป้ายจังหวัด</label>
                                    <?php echo $result['car_province'];?>
                                    <input type="hidden" name="car_province" value="<?php echo $result['car_province'];?>">
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">สถานที่ทำงาน</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="name" type="text" name="car_address"
                                            placeholder="กรอกรายละเอียดสถานที่ทำงาน"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">ประเภทงาน</label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" id="name" type="text"name="work_type"
                                            placeholder="ทำอะไร"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">ค่าน้ำมัน</label>
                                    <div class="col-sm-8">
                                        <input id="name" type="text"name="price_oil" row ="5" class="form-control" placeholder="ค่าน้ำมัน/ลิตร">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-3 col-form-label">ค่าเที่ยว</label>
                                    <div class="col-sm-8">
                                        <input id="name" type="text"name="price_travel" class="form-control" placeholder="ค่าเที่ยว">
                                    </div>
                                </div>
                                <div class="float-right">
                                   <input type="submit" value="จ่ายงาน" class="btn btn-success waves-light"  id="sa-success">
                                </div>
                                <hr>
                                <hr>
                                 <!--   <div class="float-right">
                                        <button type="button" class="btn btn-success  waves-light " id="sa-success">จ่ายงาน</button>
                                    </div>-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
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
                <?php
                                           }
                                           ?>
            </footer>
            <!-- end Footer -->
            </div>
    </div>
    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- knob plugin -->
    <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>

    <!--Morris Chart-->
    <script src="assets/libs/morris-js/morris.min.js"></script>
    <script src="assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboard init js-->
    <script src="assets/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

     <!-- Vendor js -->
     <script src="assets/js/vendor.min.js"></script>

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
                    title: 'จ่ายงานสำเร็จ',
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
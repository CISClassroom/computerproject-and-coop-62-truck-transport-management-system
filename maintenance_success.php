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
                        <div class="col-md-12">
                            <div class="card-box">
                                <div class="row">
                                    <div class="col-md-8">
                                        <form class="form-horizontal" role="form" data-parsley-validate novalidate>
                                            <div class="form-group row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">ทะเบียนรถ</label>
                                                    <div class="col-sm-9">
                                                        <input type="email" required parsley-type="email" class="form-control" id="inputEmail3" placeholder="คนว 605">
                                                    </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="hori-pass1" class="col-sm-2 col-form-label">จังหวัด</label>
                                                    <div class="col-sm-9">
                                                        <input id="hori-pass1" type="password" placeholder="อุดรธานี" required class="form-control">
                                                    </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="hori-pass2" class="col-sm-2 col-form-label">ชื่อคนขับ</label>
                                                    <div class="col-sm-9">
                                                        <input data-parsley-equalto="#hori-pass1" type="password" required placeholder="เฟิร์น" class="form-control" id="hori-pass2">
                                                    </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="webSite" class="col-sm-2 col-form-label">ประเภทรถ</label>
                                                    <div class="col-sm-9">
                                                        <input type="url" required parsley-type="url" class="form-control" id="webSite" placeholder="รถยนต์">
                                                    </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="card-box border border-primary">
                                            <div class="form-group mb-0">
                                                <div class="float-right">

                                                    <button
                                                        class="btn btn-lighten-success  btn-rounded width-lg waves-effect waves-light "
                                                        data-animation="fadein"
                                                        data-overlayColor="#36404a"><span>ซ่อมสำเร็จ</span> <i
                                                            class="ti-check-box"></i></button>
                                                    <button
                                                        class="btn btn-lighten-danger  btn-rounded width-lg waves-effect waves-light "
                                                        data-animation="fadein"
                                                        data-overlayColor="#36404a"><span>ยังไม่ได้ซ่อม</span> <i
                                                            class="ti-close"></i></button>

                                                </div>
                                            </div>
                                            <h4 class="header-title mt-0">รายการที่ 1</h4>
                                            <label class="col-sm-2  col-form-label" for="example-textarea">รายละเอียด</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" rows="5" id="example-textarea"></textarea>
                                                </div>
                                        </div>

                                        <div class="card-box border border-primary">
                                            <div class="form-group mb-0">
                                                <div class="float-right">
                                                    <button class="btn btn-lighten-success  btn-rounded width-lg waves-effect waves-light " data-animation="fadein" data-overlayColor="#36404a"><span>ซ่อมสำเร็จ</span> 
                                                        <i class="ti-check-box"></i></button>
                                                    <button class="btn btn-lighten-danger  btn-rounded width-lg waves-effect waves-light " data-animation="fadein" data-overlayColor="#36404a"><span>ยังไม่ได้ซ่อม</span> 
                                                        <i class="ti-close"></i></button>
                                                </div>
                                            </div>
                                            <h4 class="header-title mt-0">รายการที่ 2</h4>
                                            <label class="col-sm-2  col-form-label" for="example-textarea">รายละเอียด</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control" rows="5" id="example-textarea"></textarea>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-success  waves-light "><span>ยืนยันการซ่อม</span></button>
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

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>
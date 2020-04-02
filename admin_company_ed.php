<?php
include("connectdb.php");
session_start();
$qr_user = mysqli_query($con, "SELECT * FROM user WHERE user_id = '$_SESSION[user_id]'") or die("Database selection failed: " . mysqli_error($con));
$re_user = mysqli_fetch_array($qr_user);
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8" />
    <title>e-Checklist | Powered by ID Drives</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="e-Checklist" name="description" />
    <meta content="ID Drives" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link rel="stylesheet" href="assets/libs/sweetalert2/sweetalert2.min.css">
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
    <!-- Plugins css -->
    <link href="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />

    <link href="assets/libs/multiselect/multi-select.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="assets/libs/switchery/switchery.min.css" rel="stylesheet" />
    <link href="assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="assets/libs/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet">
    <link href="assets/libs/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

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
            req.onreadystatechange = function() {
                if (req.readyState == 4) {
                    if (req.status == 200) {
                        document.getElementById(src).innerHTML = req.responseText; //รับค่ากลับมา
                    }
                }
            };
            req.open("GET", "locale_ed.php?data=" + src + "&val=" + val); //สร้าง connection
            req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
            req.send(null); //ส่งค่า
        }
        window.onLoad = dochange('province', -1);
    </script>
</head>

<?php
include("admin_addcounter_topbar.php");
?>

<body class="authentication-bg">
    <?php
    include_once "connectdb.php";
    $user_id = $_GET['user_id'];
    $qr_1 = mysqli_query($con, "SELECT * from company where user_id = '$user_id' ") or die("Database selection failed: " . mysqli_error($con));
    $re_1 = mysqli_fetch_array($qr_1);

    ?>



    <!-- Begin page -->
    <div id="wrapper">

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <?php
        include("admin_addcounter_left_sidebar.php");
        ?>


        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card-box">

                                <h2 class="">แก้ไขบริษัทในระบบ</h2>
                                <h4>แก้ไขรายละเอียดบริษัท</h4>
                                <div class="progress">
                                    <div class="progress-bar bg-pink progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
                                        <span class="sr-only">40% Complete</span>
                                    </div>
                                </div>

                                <hr />
                                <div class="col-xl-12">
                                    <div class="card-box">

                                        <form name="form" method="post" class="form-horizontal" onsubmit="" role="form" data-parsley-validate novalidate>

                                            <div class="form-group row">
                                                <label for="hori-pass1" class="col-sm-2 col-form-label">ชื่อบริษัท</label>
                                                <div class="col-sm-7">
                                                    <input id="name" type="text" name="company_name" placeholder="กรอกชื่อบริษัท " required class="form-control" value="<?php echo $re_1['company_name']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="hori-pass1" class="col-sm-2 col-form-label">เลขผู้เสียภาษี</label>
                                                <div class="col-sm-7">
                                                    <input id="tax" type="text" name="company_tex" placeholder="เลขผู้เสียภาษี " required class="form-control" value="<?php echo $re_1['company_tex']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="hori-pass1" class="col-sm-2 col-form-label">โทร</label>
                                                <div class="col-sm-7">
                                                    <input id="tel" type="text" name="company_tel" placeholder="กรอกแบบไม่ต้องมีวรรค " required class="form-control" value="<?php echo $re_1['company_tel']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="hori-pass1" class="col-sm-2 col-form-label">ที่อยู่</label>
                                                <div class="col-sm-7">
                                                    <input id="ad" type="text" name="company_address" placeholder="กรอกที่อยู่" required class="form-control" value="<?php echo $re_1['company_address']; ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="hori-pass1" class="col-sm-2 col-form-label">จังหวัด</label>
                                                <div class="col-md-7">
                                                    <font id="province"><select class="form-control" name="company_province">
                                                            <option value="0">-เลือกจังหวัด</option>
                                                        </select></font>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="hori-pass1" class="col-sm-2 col-form-label">อำเภอ</label>
                                                <div class="col-md-7">
                                                    <font id="amphur"><select class="form-control" name="company_amphur">
                                                            <option value="0">-เลือกอำเภอ</option>
                                                        </select></font>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="hori-pass1" class="col-sm-2 col-form-label">ตำบล</label>
                                                <div class="col-md-7">
                                                    <font id="district"> <select class="form-control" name="company_tumbon">
                                                            <option value="0">-เลือกตำบล</option>
                                                        </select></font>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="hori-pass1" class="col-sm-2 col-form-label">รหัสไปรษณีย์</label>
                                                <div class="col-md-7">
                                                    <input id="zip" type="text" name="company_zip" placeholder="กรอกรหัสไปรษณีย์" required class="form-control" value="<?php echo $re_1['company_zip']; ?>">
                                                </div>
                                            </div>
                                            <hr />
                                            <div class="form-group text-right mb-0">
                                                <button class="btn btn-success  waves-effect width-md waves-light" name="submit" type="submit">
                                                    บันทึก
                                                </button>

                                            </div>

                                        </form>

                                        <div class="col-md-12 col-xs-12">






                                        </div>

                                    </div>

                                    <hr />


                                    <div class="row">



                                    </div>

                                </div>

                            </div><!-- end col -->



                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                2019 &copy; Powered by <a href="#">ID Drives</a>
                            </div>
                            <!-- <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div>
                            </div> -->
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

        <!-- Plugins Js -->
        <script src="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
        <script src="assets/libs/switchery/switchery.min.js"></script>
        <script src="assets/libs/multiselect/jquery.multi-select.js"></script>
        <script src="assets/libs/jquery-quicksearch/jquery.quicksearch.min.js"></script>

        <script src="assets/libs/select2/select2.min.js"></script>
        <script src="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="assets/libs/jquery-mask-plugin/jquery.mask.min.js"></script>
        <script src="assets/libs/moment/moment.js"></script>
        <script src="assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
        <script src="assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
        <script src="assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="assets/libs/bootstrap-daterangepicker/daterangepicker.js"></script>
        <script src="assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>


        <!-- Validation js (Parsleyjs) -->
        <script src="assets/libs/parsleyjs/parsley.min.js"></script>

        <!-- validation init -->
        <script src="assets/js/pages/form-validation.init.js"></script>

        <!-- Init js-->
        <script src="assets/js/pages/form-advanced.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

        <script>
            $(function() {
                $('form').on('submit', function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: 'post',
                        url: 'admin_company_save_ed.php',
                        data: $('form').serialize(),
                        success: function() {
                            swal(
                                'Success',
                                'บันทึกข้อมูลเรียบร้อย!',
                                'success'
                            ).then(function() {
                                window.location.href = 'admin_allcompamy.php';
                            });
                        }
                    });
                });
            });
        </script>

</body>

</html>
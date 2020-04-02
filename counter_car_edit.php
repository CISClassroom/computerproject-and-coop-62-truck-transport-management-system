<?php
session_start();
include("connectdb.php");
$qr_user = mysqli_query($con, "SELECT * FROM user WHERE user_id = '$_SESSION[user_id]'") or die("Database selection failed: " . mysqli_error($dbcon));
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
include("counter_topbar.php");
?>

<body class="authentication-bg">
<?php
            include_once "connectdb.php";
            $company_id = $_GET['company_id'];
            $car_id = $_GET['car_id'];
            $qurey=mysqli_query($con,"SELECT * from company where user_id = '$company_id'") or die("Database selection failed: " . mysqli_error($con));
            $result = mysqli_fetch_array($qurey);

            $query2=mysqli_query($con,"SELECT * from car_data JOIN car_form ON car_data.car_form = car_form.form_id where car_data.car_id = '$car_id'") or die("Database selection failed: " . mysqli_error($con));
            $result2 = mysqli_fetch_array($query2);
            $form_id2= $result2['form_id'];
            ?>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <?php
        include("counter_left_sidebar.php");
        ?>
        
        <div id="wrapper">

<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-box">
                            <h2>แก้ไขรายละเอียดรถ </h2><br>
                            <div class="col-xl-10">

                            <hr />

                            <form name="form"  action="counter_car_edit_save.php" method="post" class="form-horizontal" onsubmit="" role="form" data-parsley-validate novalidate>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">รายชื่อบริษัท</label>
                                    <div class="col-sm-10">
                                        <select class="form-control " name="company_id">
                                            <option>--เลือกบริษัท--</option>
                                            <?php
                                            $qr_1 = mysqli_query($con, "SELECT * from company where 1 ") or die("Database selection failed: " . mysqli_error($con));
                                            while ($re = mysqli_fetch_array($qr_1, MYSQLI_ASSOC)) {
                                            ?>
                                                <option value="<?php echo $re['user_id'] ?>"><?php echo $re['company_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">เลือกแบบฟอร์ม / ประเภทรถ</label>
                                    <div class="col-sm-10">
                                        <select class="form-control " name="car_form">
                                            <option>--เลือกแบบฟอร์ม--</option>
                                            <?php
                                            $qr_2 = mysqli_query($con, "SELECT * from car_form where 1 order  by number_rec ASC") or die("Database selection failed: " . mysqli_error($con));
                                            while ($re2 = mysqli_fetch_array($qr_2, MYSQLI_ASSOC)) {
                                            ?>
                                                <option value="<?php echo $re2['form_id'] ?>"><?php echo $re2['form_name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">ชื่อ-นามสกุลคนขับ</label>
                                    <div class="col-sm-10">
                                        <input id="name" type="text" name="car_name_cf" placeholder=" " required class="form-control" value="<?php echo $result2['car_name_cf'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-sm-2 col-form-label">ป้ายทะเบียนรถ</label>
                                    <div class="col-sm-4">
                                        <input id="name" type="text" name="car_plate" placeholder="กรอกป้ายทะเบียนรถ" required class="form-control"  value="<?php echo $result2['car_plate'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pov" class="col-sm-2 col-form-label">ป้ายจังหวัด*</label>
                                    <div class="col-sm-10">
                                        <select class="form-control " name="car_province">
                                            <option>--เลือกจังหวัด--</option>
                                            <?php
                                            $qr_1 = mysqli_query($con, "SELECT * from province where 1 order  by name_th ASC") or die("Database selection failed: " . mysqli_error($con));
                                            while ($re = mysqli_fetch_array($qr_1, MYSQLI_ASSOC)) {
                                            ?>
                                                <option value="<?php echo $re['name_th'] ?>"><?php echo $re['name_th'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-sm-2 col-form-label">ป้ายทะเบียนหาง</label>
                                    <div class="col-sm-4">
                                        <input id="name" type="text" name="car_licenseplatetail" placeholder="( ถ้ามี ) " required class="form-control">
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-sm-2 col-form-label">วันที่ตรวจ</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" placeholder="วว/ดด/ปป.." data-date-format="yyyy-mm-dd" type="date" name="dateRegis" id="dateRegis" required value="">
                                    </div>
                                    <label for="hori-pass1" class="col-sm-2 col-form-label">ประเภทรถ</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="car_type">
                                            <option value="0">- เลือกประเภทรถ -</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">บริษัทประกันภัย</label>
                                    <div class="col-sm-10">
                                        <input id="name" type="text" name="car_insurance_company" placeholder=" " required class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="hori-pass" class="col-sm-2 col-form-label">วันที่ประกันหมดอายุ</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" placeholder="วว/ดด/ปป.." data-date-format="yyyy-mm-dd" type="date" name="dateExIns" required class="form-control">
                                    </div>
                                    <label for="hori-pass1" class="col-sm-2 col-form-label">วันที่ภาษีหมดอายุ</label>
                                    <div class="col-sm-4">
                                        <input class="form-control" placeholder="วว/ดด/ปป.." data-date-format="yyyy-mm-dd" type="date" name="dateExTax" required class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="company_id" value="<?php echo $company_id ?>">
                                </div>
                                <?php
                                include_once "random_id_2.php";
                                $car_id = getToken2(18);
                                ?>
                                <div class="form-group">
                                    <input type="hidden" name="car_id" value="<?php echo $car_id  ?>">
                                </div>
                                <div class="form-group text-right mb-0">
                                    <button class="btn btn-success  waves-effect width-md waves-light" name="submit" type="submit">
                                        บันทึกการแก้ไข
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

  

</body>

</html>
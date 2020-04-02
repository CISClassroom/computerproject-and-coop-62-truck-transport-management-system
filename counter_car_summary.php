
<?php
session_start();
include_once "connectdb.php";
$qr_user =mysqli_query($con,"SELECT * from user where user_id = '$_SESSION[user_id]'") or die("Database selection failed: " . mysqli_error($con));
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

        <!-- Sweet Alert-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
         
         <!-- App css -->
         <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
         <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
         <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        
        <!-- dropify -->
        <link href="assets/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />
    </head>
    <?php
    include("counter_topbar.php");
    ?>
    <body  >

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php
    include("counter_left_sidebar.php");
    ?>
            <?php
            include_once "connectdb.php";
            $car_id = $_GET['car_id'];
            $qurey=mysqli_query($con,"SELECT * from car_data where car_id = '$car_id'") or die("Database selection failed: " . mysqli_error($con));
            $result = mysqli_fetch_array($qurey);
            $company_id = $result['company_id'];
			$car_plate = $result['car_plate'];
            ?>
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-xl-12 col-md-12">
                                <div class="card-box">
                                    
                                    <h2 class="">ข้อมูลรถ</h2>
                                    <h4>ทะเบียน <?php echo $result['car_plate']; ?> <?php echo $result['car_province']; ?></h4>
                                    <div class="progress">
                                            <div class="progress-bar bg-pink progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                                <span class="sr-only">100% Complete</span>
                                            </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-box">
                                    <h4>QR CODE</h4>
                                    <?php
                                    include_once('phpqrcode/qrlib.php');
                                    include_once('phpqrcode/qrconfig.php');

                                    // how to save PNG codes to server

                                    $tempDir = 'temp/';

                                    $codeContents = $car_id;

                                    // we need to generate filename somehow,
                                    // with md5 or with database ID used to obtains $codeContents...
                                    $fileName = '_file_'.$car_id.'.png';

                                    $pngAbsoluteFilePath = $tempDir.$fileName;
                                    $urlRelativeFilePath = $fileName;

                                    // generating
                                    if (!file_exists($pngAbsoluteFilePath)) {
                                        QRcode::png($codeContents, $pngAbsoluteFilePath , QR_ECLEVEL_H, 8);
                                    }
                                    // displaying

                                    echo '<img src="temp/'.$urlRelativeFilePath.'" />';
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-box">
                                    <h4>เมนู</h4>
                                    <a href="counter_car_edit.php?car_id=<?php echo $car_id ?>&company_id=<?php echo $company_id ?>" class="btn btn-block btn-md btn-warning waves-effect waves-light">แก้ไขข้อมูล</a>
                                                            
                                    <a href="counter_car_status.php?car_id=<?php echo $car_id ?>" class="btn btn-block btn-md btn-primary waves-effect waves-light" id="">ดูรายการตรวจ</a>
                                    <a class="btn btn-block btn-md btn-danger waves-effect waves-light"
                                       data-animated href="JavaScript:if(confirm('ต้องการลบ ใช่หรือไม่?')==true){window.location='counter_car_del.php?car_id=<?php echo $car_id ?>';}">
                                        <i class="fa fa-fw fa-close"></i> ลบข้อมูลรถ</a>
                                </div>
                            </div>
                        </div>
                        
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

       

       <!-- App js -->
       <script src="assets/js/app.min.js"></script>
       
       <!-- Sweet Alerts js -->
       <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

       <!-- Sweet alert init js-->
       <script src="assets/js/pages/sweet-alerts.init.js"></script>

        <script>
            //Warning Message
            $('#sa-confirm-pass').click(function () {
            Swal.fire({
                title: "คุณแน่ใจใช่มั้ย?",
                text: "กรูณาตรวจสอบข้อมูลให้ถูกต้อง",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancleButtonText: "ยกเลิก",
                confirmButtonText: "ใช่! ฉันตรวจสอบดีแล้ว"
              }).then(function (result) {
                if (result.value) {
                  window.open("inspection_check_final.php","_self")
                  
                }
            });
        });
        
        </script>

         <!-- dropify js -->
         <script src="assets/libs/dropify/dropify.min.js"></script>

         <!-- form-upload init -->
         <script src="assets/js/pages/form-fileupload.init.js"></script>

        
    </body>
</html>
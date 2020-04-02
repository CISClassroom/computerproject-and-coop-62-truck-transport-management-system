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
include("inspection_foreman_topbar.php");
?>
<?php
include("inspection_foreman_left_sidebar.php");
?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <?php
    include_once "connectdb.php";
    include_once  "dateth.php";
    $car_id = $_GET['car_id'];
    $chk = $_GET['chk'];

    $qurey = mysqli_query($con, "select * from car_data where car_id = '$car_id'") or die("Database selection failed: " . mysqli_error($con));
    $result = mysqli_fetch_array($qurey);
    $company_id = $result['company_id'];
    ?>
    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <div class="row">

                    <div class="col-xl-12 col-md-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-6">
                                    <h2 class="">สถานะการตรวจ</h2>
                                    <h4>ทะเบียน <?php echo $result['car_plate']; ?><?php echo $result['car_province']; ?></h4>
                                </div>
                                <div class="col-6 text-right">
                                    <?php
                                    $query3 = mysqli_query($con, "SELECT *  from car_data INNER JOIN company ON car_data.company_id = company.user_id 
                                INNER JOIN car_form ON car_data.car_form = car_form.form_id
                                where 1 ORDER BY car_data.date_add DESC") or die("Database selection failed: " . mysqli_error($con));

                                    $status2 = $result['car_status'];
                                    if ($status2  == "0") {
                                        echo $status3 = "<h1 class='text-secondary'>รอการตรวจ</h1>";
                                    } elseif ($status2  == "1") {
                                        echo $status3 = "<h1 class='text-success'>ผ่าน</h1>";
                                    } elseif ($status2  == "2") {
                                        echo  $status3 = "<h1 class='text-danger'>ไม่ผ่าน</h1>";
                                    }

                                    ?>
                                    <br>
                                    <div class="d-print-none">
                                        <div class="float-right">
                                            <?php
                                            $qurey4 = mysqli_query($con, "SELECT * FROM car_data INNER JOIN car_form ON car_data.car_form = car_form.form_id where car_data.car_id = '$car_id' ") or die("Database selection failed: " . mysqli_error($con));
                                            $result4 = mysqli_fetch_array($qurey4);
                                            $company_id = $result['company_id'];
                                            ?>
                                            <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                            <a href="export_f1.php?fid=<?php echo $result4['form_id']; ?>&car_id=<?php echo $result4['car_id']; ?>" class="btn btn-danger waves-effect waves-light">PDF</a>
                                            <a href="counter_car_showform.php?fid=<?php echo $result4['form_id']; ?>&car_id=<?php echo $result4['car_id']; ?>" class="btn btn-primary waves-effect waves-light">ดูรายการตรวจทั้งหมด</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>

                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                    <span class="sr-only">100% Complete</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h4>รายการตรวจ</h4>


                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>ข้อที่</th>
                                        <th>หัวข้อตรวจ</th>
                                        <th>รายละเอียด</th>
                                        <th>รูปภาพ</th>
                                        <th>ยืนยันการตรวจ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = '1';
                                    $query5 = mysqli_query($con, " SELECT * from car_choice_problem
														WHERE car_choice_problem.car_id = '$car_id' 
                                                        ORDER BY car_choice_problem.num_id ASC") or die("Database selection failed 5: " . mysqli_error($con));
                                    
                                    $number =  mysqli_num_rows($query5);
                                    
                                    while ($result1 = mysqli_fetch_array($query5, MYSQLI_ASSOC)) {
                                        if ($result1['check_pass'] != 0) {
                                    ?>
                                            <tr>
                                                <input type="hidden" id="num_check" value="<?php echo $number; ?>"/>
                                                <td><?php echo  $i++; ?></td>
                                                <td><?php echo  'ตรวจแล้ว'; ?> </td>
                                                <td><?php echo  $result1['detail_check'] ?></td>
                                                <td> <img src="<?php echo $result1['img_check'];?>" class="w3-circle w3-hover-opacity " width="150" height="150" ></td>
                                                <td><a  href="insert_report_save.php?id=<?php echo $result1['id']; ?>&&check=ผ่าน" class="btn btn-success waves-effect width-md waves-light" id ="sa-confirm-pass" >ผ่าน</a>
                                                <a href="insert_report_save.php?id=<?php echo $result1['id']; ?>&&check=ไม่ผ่าน" class="btn btn-danger waves-effect width-md waves-light" id ="sa-success" >ไม่ผ่าน</a></td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <!--  เริ่มใส่รายละเอียดตรงนี้    -->

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
         var Number = 0;
        //Success Message
        $('#sa-confirm-pass').click(function() {
            Number += 1;
            if($('#num_check').val() == Number){
                alert(Number);
            }
            Swal.fire({
                title: "คุณแน่ใจใช่มั้ย ?",
                text: "กรุณาตรวจสอบข้อมูลให้ถูกต้อง",
                type: "success",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancleButtonText: "ยกเลิก",
                confirmButtonText: "ใช่! ฉันตรวจสอบดีแล้ว"
            }).then(function(result) {
                if (result.value) {
                    window.open("#", "_self")

                }
            });
        });
        //Warning Message
        $('#sa-success').click(function() {
            Swal.fire({
                title: "คุณแน่ใจใช่มั้ย ?",
                text: "กรุณาตรวจสอบข้อมูลให้ถูกต้อง",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancleButtonText: "ยกเลิก",
                confirmButtonText: "ใช่! ฉันตรวจสอบดีแล้ว"
            }).then(function(result) {
                if (result.value) {
                    window.open("#", "_self")

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
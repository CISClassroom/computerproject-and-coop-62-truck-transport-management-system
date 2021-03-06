
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
                                        <h4>ทะเบียน <?php echo $result['car_plate']; ?> <?php echo $result['car_province']; ?></h4>
                                    </div>
                                    <div  class="col-6 text-right">
                                    <?php
                                                $query=mysqli_query($con,"SELECT *  from car_data INNER JOIN company ON car_data.company_id = company.user_id 
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
                                                include_once "connectdb.php";
                                                $car_id = $_GET['car_id'];
                                                $qurey=mysqli_query($con,"SELECT * FROM car_data INNER JOIN car_form ON car_data.car_form = car_form.form_id where car_data.car_id = '$car_id' ") or die("Database selection failed: " . mysqli_error($con));
                                                $result = mysqli_fetch_array($qurey);
                                                $company_id = $result['company_id'];
                                                ?>
                                                <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="export_f1.php?fid=<?php echo $result['form_id']; ?>&car_id=<?php echo $result['car_id']; ?>" class="btn btn-danger waves-effect waves-light">PDF</a>
                                                <a href="counter_car_showform.php?fid=<?php echo $result['form_id']; ?>&car_id=<?php echo $result['car_id']; ?>" class="btn btn-primary waves-effect waves-light">ดูรายการตรวจทั้งหมด</a>
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
                                    <h4>จำนวนครั้งการตรวจ</h4>


                                    <table class="table table-striped mb-0" >
                                        <thead>
                                        <tr>
                                            <th>ครั้งที่</th>
                                            <th>วันที่</th>
                                                     </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = '1';
                                        $query5=mysqli_query($con," SELECT * from car_problem where car_id = '$car_id' GROUP BY chk_id ORDER BY date_insert ASC") or die("Database selection failed 1: " . mysqli_error($con));
                                        while($result5 = mysqli_fetch_array($query5, MYSQLI_ASSOC)) {
                                            $date5 = $result5['date_insert'];
                                            $chk_id = $result5['chk_id'];
                                            ?>
                                            <tr>
                                                <td><?php echo  $i++; ?></td>
                                                <td><a href="counter_car_status2.php?car_id=<?php echo $car_id ?>&chk=<?php echo $chk_id ?>&date=<?php echo date('Y-m-d', strtotime($date5) ); ?>" ><?php echo date('d', strtotime($date5) ); ?>/<?php echo date('m', strtotime($date5) ); ?>/<?php echo YearThai($date5); ?></a></td>
                                            </tr>
                                            <?php
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
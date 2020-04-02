<?php
include("connectdb.php");
session_start();
$id = $_GET['id'];
$car = $_GET['car'];

$select_show = "SELECT * FROM maintenance WHERE id='$id'";
$select_query = mysqli_query($con,$select_show);
$re_id = '';
while($row1 = mysqli_fetch_array($select_query)){
   $re_id = $row1['report_id'];
}

$update = "UPDATE report SET report_status='ไม่ผ่าน' WHERE report_id='$re_id'";
mysqli_query($con,$update);

$lin_car = '';
$select = "SELECT * FROM car_data WHERE car_plate='$car'";
$query = mysqli_query($con,$select);
while($row = mysqli_fetch_array($query)){
   $lin_car = $row['rec'];
}

$update_show = "UPDATE maintenance SET status='ไม่ผ่าน' WHERE id=$id";
mysqli_query($con,$update_show);

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
    require("foreman_maintenance_topbar.php");
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
                        <div class="col-xl-12 col-md-12">
                            <div class="card-box">  
                            <h2 class="">ข้อมูลรถ</h2>
                                <div class="progress">
                                    <div class="progress-bar bg-blue progress-bar-striped progress-bar-animated"
                                        role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 75%;">
                                        <span class="sr-only">0% Complete</span>
                                    </div>
                                </div>
                                <hr />
                                <?php
                                    $select  = "SELECT * FROM maintenance AS A
                                           JOIN car_data AS B ON A.car_id=B.rec
                                           WHERE A.id=$id";
                                    $query = mysqli_query($con,$select);
                                          while($row = mysqli_fetch_array($query)){      
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <dt class="col-sm-3">ทะเบียนรถ</dt>
                                            <dd class="col-sm-7"><?php echo $row['car_plate'] ?></dd>
                                            <dt class="col-sm-3">จังหวัด</dt>
                                            <dd class="col-sm-7"><?php echo $row['car_province'] ?></dd>
                                            <dt class="col-sm-3">ชื่อคนขับ</dt>
                                            <dd class="col-sm-7"><?php echo $row['car_name_cf'] ?></dd>
                                            
                                        </div>
                                    </div>
                                </div><br><br>
                                <form action="foreman_maintenance_document_update.php" method="post">
                                    
                                 <input type="hidden" name="report_id" value="<?php echo $row['report_id']; ?>"/>
                                 <h4 class="header-title mt-0">เพิ่มรายละเอียดการซ่อม</h4><br>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="4" id="example-textarea" name="example-textarea"></textarea>
                                    </div>    
                                
                                
                                <?php }?> 
                                <div class=" text-right">
                                    <button type="submit" class="btn btn-success  width-md waves-effect waves-light" id="sa-warning">ยืนยันข้อมูล</button>
                                    <!--<a href="foreman_maintenance_status.php" class="btn btn-success  width-md waves-effect waves-light" id="sa-warning">ยืนยันข้อมูล</a> -->     
                            </div>
                            </form>
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
    require("foreman_maintenance_left_sidebar.php");
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
    




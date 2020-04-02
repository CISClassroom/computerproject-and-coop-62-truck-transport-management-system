<?php
session_start();
include("connectdb.php");

$qr_user = mysqli_query($con, "SELECT * from user where user_id = '$_SESSION[user_id]'") or die("Database selection failed: " . mysqli_error($con));
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

    <!-- third party css -->
    <link href="assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->


    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>
<?php
include("maintenance_topbar.php");
?>
<?php
    include("maintenance_lift_sidebar.php");
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

                                <h2 class="">รถในระบบทั้งหมด</h2>
                                <h4>รายการ</h4>


                                <hr />


                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            
                                            <th>ทะเบียนรถ</th>
                                            <th>จังหวัด</th>
                                            <th>รายละเอียดการซ่อม</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                    <?php
                                    $check = 1;
                                    $i = 0;
                                    $find = 1;
                                    $Notfind = 1;
                                    $newValue = array();
                                    $oldValue = array();

                                    $valArray = array();
                                    $car_id = $_GET['user_id'];
                                           
                                          
                                           $sql = "SELECT * from report AS A 
                                           JOIN car_data AS B ON A.license_car=B.car_plate
                                           WHERE A.report_status='ผ่าน'";
                                           //$sql = "SELECT * FROM car_detail";

                                           $query = mysqli_query($con, $sql) or die("Database selection failed: " . mysqli_error($con));
                                           while ($result = mysqli_fetch_array($query)) {
                                            $newValue = array("name"=>$result['license_car'],"status"=>$result['report_status'],"id"=>$result['report_id']);
                                      
                                            if($oldValue != ""){                                                             
                                               if($newValue['name'] != $oldValue['name']){
                                                
                                                 
                                                  // if($newValue['status'] == $oldValue['status']){
                                                     /*  $valArray[$i] = array("id"=>$result['rec'],
                                                       "name"=>$result['car_name_cf'],
                                                       "plate"=>$result['car_plate'],
                                                       "province"=>$result['car_province']
                                                       );         
                                                      $i += 1;   */
                                     
                                          ?>
                                               
                                          

                                            <tr>
                                                <!-- <td><?php echo  $result['car_name_cf'] ?></td> -->
                                                <td><?php echo  $result['car_plate'] ?></td>
                                                <td><?php echo  $result['car_province'] ?></td>
                                               
                                                <td>
                                                    <a href="maintenance_details.php?car_id=<?php echo $result['rec']; ?>&&id=<?php echo $result['report_id']; ?>&&carlin=<?php echo $result['car_plate']; ?>" class="btn btn-success btn-rounded width-lg waves-effect waves-light " ><span>รายละเอียดที่ซ่อมแล้ว </span></a>
                                                    <a href="maintenance_details2.php?car_id=<?php echo $result['rec']; ?>&&id=<?php echo $result['report_id']; ?>&&carlin=<?php echo $result['car_plate']; ?>" class="btn btn-danger btn-rounded width-lg waves-effect waves-light " ><span>ข้อที่ไม่ผ่านการตรวจ </span></a>     
                                                </td>
                                            </tr>
                                        <?php
                                           // }
                                             }
                                          
                                                                       
                                            }
                                           
                                            
                                            
                                            $oldValue = $newValue;
                                        }
                                        ?>

                                    </tbody>
                                </table>





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

    <!-- third party js -->
    <script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables/dataTables.bootstrap4.js"></script>
    <script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>
    <script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
    <script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
    <script src="assets/libs/datatables/buttons.html5.min.js"></script>
    <script src="assets/libs/datatables/buttons.flash.min.js"></script>
    <script src="assets/libs/datatables/buttons.print.min.js"></script>
    <script src="assets/libs/datatables/dataTables.keyTable.min.js"></script>
    <script src="assets/libs/datatables/dataTables.select.min.js"></script>
    <script src="assets/libs/pdfmake/pdfmake.min.js"></script>
    <script src="assets/libs/pdfmake/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="assets/js/pages/datatables.init.js"></script>


    <!-- App js -->
    <script src="assets/js/app.min.js"></script>


</body>

</html>
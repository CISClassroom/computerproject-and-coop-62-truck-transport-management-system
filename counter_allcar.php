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
include("counter_topbar.php");
?>

<body>

    <!-- Begin page -->
    <div id="wrapper">



        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <?php
        include("counter_left_sidebar.php");
        ?>
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


                                <table id="datatable-buttons"
                                    class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ทะเบียน</th>
                                            <th>จังหวัด</th>
                                            <th>ชื่อบริษัท</th>
                                            <th>ประเภท</th>
                                            <th>สถานะ</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        <?php
                                        $car_id = $_GET['user_id'];

                                        include_once "connectdb.php";
                                        $query = mysqli_query($con, "SELECT * from car_data
                                        INNER JOIN company ON car_data.company_id = company.user_id 
                                        INNER JOIN car_form ON car_data.car_form = car_form.form_id
                                        where car_data.company_id=$car_id") or die("Database selection failed: " . mysqli_error($con));

                                        while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                            $check = 0;
                                            $i = 0;
                                            $find = 0;
                                            $Notfind = 0;
                                            $newValue = array();
                                            $oldValue = array();
 
                                            $valArray = array();

                                            $id = $result['car_id'];
                                            $plate = $result['car_plate'];
                                            $provice = $result['car_province'];
                                            $company = $result['company_name'];
                                            $form = $result['form_name'];
                                            

                                            $show_select = "SELECT * FROM report WHERE license_car='$plate'";
                                            
                                            $query2 = mysqli_query($con, $show_select);
                                            $num = mysqli_num_rows($query2);
                                            if ($num > 0) {
                                                while ($result1 = mysqli_fetch_array($query2)) {
                                                    $status2 = $result1['check_pass'];
                                                    $carid = $result1['license_car'];
                                                    $newValue = array("name"=>$result1['license_car'],"status"=>$result1['report_status']);

                                                    if($oldValue != ""){                                                             
                                                      if($newValue['name'] == $oldValue['name']){
                                                        if($newValue['status'] == "ผ่าน" && $oldValue['status'] == "ผ่าน"){
                                                            $status3 = "<button type='button' class='btn btn-success btn-rounded width-md waves-effect'>ผ่าน</button>";
                                                            echo '  <tr>
                                                            <td><a href="counter_car_summary.php?car_id='.$carid.'">
                                                                    '.$plate.'</a></td>
                                                            <td>'.$provice.'</td>
                                                            <td>'.$company.'</td>
                                                            <td>'.$form.'</td>
                                                            <td><a href="counter_report.php?car_id='.$carid.'">'.$status3.'</a></td>
                                                           </tr>';
                                                        }
                                                        else if($newValue['status'] == 'ไม่ผ่าน' || $oldValue['status'] == 'ไม่ผ่าน'){
                                                            $status3 = "<button type='button' class='btn btn-danger btn-rounded width-md waves-effect'>ไม่ผ่าน</button>";
                                                            echo '  <tr>
                                                            <td><a href="counter_car_summary.php?car_id='.$carid.'">
                                                                    '.$plate.'</a></td>
                                                            <td>'.$provice.'</td>
                                                            <td>'.$company.'</td>
                                                            <td>'.$form.'</td>
                                                            <td><a href="counter_report.php?car_id='.$carid.'">'.$status3.'</a></td>
                                                            </tr>';
                                                        }
                                                      }
                                                    }    
                                                    $oldValue = $newValue;


                                            } 
                                          }
                                        ?>


                                        <?php

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
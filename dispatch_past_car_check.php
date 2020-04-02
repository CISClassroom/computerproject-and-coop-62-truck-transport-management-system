<?php
include("connectdb.php");
session_start();
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8" />
    <title>รถที่พร้อมใช้งาน</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!--Morris Chart-->
    <link rel="stylesheet" href="assets/libs/morris-js/morris.css" />

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

<body>
    <?php
include("dispatch_top_bar.php");
?>

    <!-- Baegin page -->
    <div id="wrapper">



        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="mt-0 header-title">รถที่ผ่านการจ่ายงาน</h4>

                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        
                                        <th>ทะเบียนรถ</th>
                                        <th>จังหวัด</th>
                                        <th>รายละเอียดการซ่อม</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php 
                                           $check = 0;
                                           $i = 0;
                                           $find = 0;
                                           $Notfind = 0;
                                           $newValue = array();
                                           $oldValue = array();

                                           $valArray = array();
                                           $car_id = $_GET['user_id'];
                                          
                                           $sql = "SELECT *
                                           from report AS A 
                                           JOIN car_data AS B ON A.license_car=B.car_plate";

                                           //$sql = "SELECT * FROM car_detail";

                                           $query = mysqli_query($con, $sql) or die("Database selection failed: " . mysqli_error($con));
                                           while ($result = mysqli_fetch_array($query)) {
                                            
                                             $newValue = array("name"=>$result['license_car'],"status"=>$result['report_status']);
                                             if($oldValue != ""){                                                             
                                                if($newValue['name'] == $oldValue['name']){
                                                    if($newValue['status'] == $oldValue['status']){
                                                    //    $valArray[$i] = array("id"=>$result['rec'],
                                                    //     "namee"=>$result['car_name_cf'],
                                                    //     "plate"=>$result['car_plate'],
                                                    //     "province"=>$result['car_province']
                                                    //     );         
                                                    //    $i += 1;   
                                                   
                                           ?>
                                               

                                    <tr>
                                        <!-- <td><?php echo  $result['car_name_cf'] ?></td> -->
                                        <td><?php echo  $result['car_plate'] ?></td>
                                        <td><?php echo  $result['car_province'] ?></td>
                                        <td>
                                            <?php 
                                                    $sid = $result['car_plate'];
                                                    $show = "SELECT * FROM car_dispatch WHERE car_plate='$sid'";
                                                    $query5 = mysqli_query($con,$show);
                                                    if(mysqli_num_rows($query5) == 0){?>
                                            <a
                                                href="dispatch_add_work.php?car_id=<?php echo $result['rec'];?>&&id=<?php echo $result['report_id'];?>"><button
                                                    type="button"
                                                    class="btn btn-warning waves-effect width-md waves-light">จ่ายงาน</button>
                                                <?php 
                                                    }else{?>
                                                <a
                                                    href="#"><button
                                                        type="button"
                                                        class="btn btn-success waves-effect width-md waves-light">จ่ายงานแล้ว</button>
                                                    <?php } ?>
                                        </td>

                                    </tr>
                                    <?php
                                              }
                                                   
                                            }
                                           
                                         }    
                                         $oldValue = $newValue;
                                        }
                                        
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- container-fluid -->
        </div> <!-- content -->
        <?php
    include("dispatch_lift_sidebar.php");
    ?>


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

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
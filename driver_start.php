<?php
include("connectdb.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>ระบบจัดการขนส่งทางรถบรรทุก</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="ระบบจัดการขนส่งทางรถบรรทุก" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- third party css -->
        <link href="assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />     
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
       
        <!-- third party css end -->

        <!-- Sweet Alert-->
        <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom box css -->
        <link href="assets/libs/custombox/custombox.min.css" rel="stylesheet">

        <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/libs/sweetalert2/sweetalert2.min.css">
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

    </head>
    <?php
    include("driver_topbar.php");
    ?>
    <body onload="load()" >
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
                            <div class="col-12">
                                <div class="card-box">                                    
                                    <h1>รายการรถที่ส่งผลตรวจสภาพ</h1><br>

                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                               
                                    
                                                <thead>
                                                <tr>
                                                    
                                                    <th>ทะเบียน</th>
                                                    <th>จังหวัด</th>                   
                                                    <th>ประเภท</th>
                                                    <th>เพิ่มเติม</th>
                                                </tr>
                                                </thead>

                                        <tbody>
                                        <?php
                                           $car_id = $_GET['user_id'];
                                          
                                           $sql = "SELECT * from car_data INNER JOIN company ON car_data.company_id = company.user_id 
                                           INNER JOIN car_form ON car_data.car_form = car_form.form_id
                                           where car_data.company_id=$car_id";
                                           //$sql = "SELECT * FROM car_detail";

                                           $query = mysqli_query($con, $sql) or die("Database selection failed: " . mysqli_error($con));
                                           while ($result = mysqli_fetch_array($query)) {
                                            
                                               
                                           ?>
                                               <tr>
                                                   <!-- <td><?php echo $result['car_name_cf'] ?></td> -->
                                                   <td><?php echo $result['car_plate'] ?></td>
                                                   <td><?php echo $result['car_province'] ?></td>
                                                   <td><?php echo $result['form_name'] ?></td>
                                                   <td>
                                                   <a href="driver_check01.php?car_id=<?php echo $result['rec']; ?>&&formcar_id=<?php echo $result['car_form'];?>" class="btn btn-success btn-rounded width-lg waves-effect waves-light " data-animation="fadein" 
                                                     data-overlayColor="#36404a">ดูรายละเอียด</a></td>
                                               </tr>
                                           <?PHP
                                           }
                                           ?>

                                                                                                                     
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->                        
                    </div> <!-- container-fluid -->

                </div> <!-- content -->
            
            
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        
        <!-- END wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>
        
        <?php
            include("driver_left_sidebar.php");
        ?>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Modal-Effect -->
        <script src="assets/libs/custombox/custombox.min.js"></script>

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

        <!-- Sweet Alerts js -->
       <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

       <!-- Sweet alert init js-->
       <script src="assets/js/pages/sweet-alerts.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
        
    </body>
</html>
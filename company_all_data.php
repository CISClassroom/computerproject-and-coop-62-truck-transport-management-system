<?php
session_start();
include("connectdb.php");
$qr_user = mysqli_query($con, "SELECT * FROM user WHERE user_id = '$_SESSION[user_id]'") or die("Database selection failed: " . mysqli_error($con));
$re_user = mysqli_fetch_array($qr_user);
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8" />
    <title>e-Checklist | บริษัททั้งหมดในระบบ</title>
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

    <link rel="stylesheet" href="assets/libs/sweetalert2/sweetalert2.min.css">
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>
<?php
include("admin_addcounter_topbar.php");
?>

<body>

    <!-- Begin page -->
    <div id="wrapper">
        <?php
        include("admin_addcounter_left_sidebar.php");
        ?>



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

                                <h2 class="">รายชื่อผู้ใช้ทั้งหมดในบริษัท </h2>
                                <h4>รายการ</h4>


                                <hr />


                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <!-- <th>ชื่อบริษัท</th> -->
                                            <th>ชื่อ - นามสกุล</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                    <?php
                                        $sql = "SELECT admin_id,admin_name,admin_username,admin_password FROM admin INNER JOIN admintype ON admin.ad_id = admintype.ad_id 
                                        WHERE admintype.ad_id = ".$_GET['ad_id']." ";

                                        $query = mysqli_query($con, $sql) or die("Database selection failed: " . mysqli_error($con));
                                        while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                            //$ad_id = $result['ad_id'];
                                        ?>
                                            <tr>  
                                                <td><?php echo $result['admin_name'] ?></td>
                                                <td><?php echo $result['admin_username'] ?></td>
                                                <td><?php echo $result['admin_password'] ?></td>  
                                            </tr>
                                        <?PHP
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
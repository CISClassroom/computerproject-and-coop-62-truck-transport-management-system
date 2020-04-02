<?php
include("connectdb.php");
session_start();
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
        

        <?php

        $query = "SELECT user.user_name, user.user_username,user.user_password, user.user_id, user.ad_id, user.image, company.user_id,company.company_name,usertype.ut_id,usertype.ut_name FROM user 
        INNER JOIN company ON user.user_id=company.user_id  
        INNER JOIN usertype ON user.ut_id=usertype.ut_id  WHERE ad_id = '" . $_SESSION['ad_id'] . "' ";
        $res = mysqli_query($con, $query);

        while ($row = mysqli_fetch_array($res)) {
        ?>
           <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-xl-6 col-md-6">
                                <div class="card-box">

                                    <h2 class="header-title mt-0 mb-3">ตั้งค่าบัญชีผู้ใช้</h2>

                                    <div class="col-xl-12">
                                        <div class="card-box">
                                            <form class="form-horizontal" role="form" data-parsley-validate novalidate>

                                                <div>
                                                    <div align="center">

                                                        <img src="assets/images/users/<?php echo $row["image"]; ?>" width="250" height="250" class="w3-circle w3-hover-opacity ">

                                                    </div>
                                                </div>

                                                <div class="form-group row ">
                                                    <label class="col-sm-4 col-form-label">ชื่อ - นามสกุล</label>
                                                    <div  class="form-control">
                                                        <?php echo $row["user_name"]; ?>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">แผนก</label>
                                                    <div  class="form-control">
                                                        <?php echo $row["ut_name"]; ?>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">บริษัทที่สังกัด</label>
                                                    <div  class="form-control">
                                                        <?php echo $row["company_name"]; ?>
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Username</label>
                                                    <div  class="form-control">
                                                        <?php echo $row["user_username"]; ?>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label">Password</label>
                                                    <div  class="form-control">
                                                        <?php echo $row["user_password"]; ?>
                                                    </div>
                                                </div>
                                                <br>



                                                <div class="float-right">
                                                    <a href="edit_maintenance.php?id=<?php echo $row["ad_id"]; ?>" class="btn btn-warning btn-rounded width-lg waves-effect waves-light "><span>แก้ไข </span></a>
                                                </div>

                                        </div>

                                        </form>

                                    </div>
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

    <!-- knob plugin -->
    <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>


    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
<?php
        }
?>

</body>

</html>
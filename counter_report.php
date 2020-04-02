<?php
session_start();
include("connectdb.php");
$qr_user = mysqli_query($con, "select * from user where user_id = '$_SESSION[user_id]'") or die("Database selection failed: " . mysqli_error($con));
$re_user = mysqli_fetch_array($qr_user);
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
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
include("counter_topbar.php");
?>
<?php
include("counter_left_sidebar.php");
?>

<body onload="load()">
    <!-- Begin page -->
    <div id="wrapper">

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <?php
        include_once "connectdb.php";
        include_once  "dateth.php";
        $car_id = $_GET['car_id'];
        $qurey = mysqli_query($con, "select * from car_data where car_data.car_id = '$car_id'") or die("Database selection failed: " . mysqli_error($con));
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
                                    <div class="col-6 text-right">
                                        <div class="d-print-none">
                                            <div class="float-right">
                                                <?php
                                                include_once "connectdb.php";
                                                $car_id = $_GET['car_id'];
                                                $qurey = mysqli_query($con, "SELECT * FROM car_data INNER JOIN car_form ON car_data.car_form = car_form.form_id where car_data.car_id = '$car_id' ") or die("Database selection failed: " . mysqli_error($con));
                                                $result = mysqli_fetch_array($qurey);
                                                $company_id = $result['company_id'];
                                                ?>
                                                <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="export_f1.php?fid=<?php echo $result['form_id']; ?>&car_id=<?php echo $result['car_id']; ?>" class="btn btn-danger waves-effect waves-light">PDF</a>
                                                <a href="inspection_report_showform.php?fid=<?php echo $result['form_id']; ?>&car_id=<?php echo $result['car_id']; ?>" class="btn btn-primary waves-effect waves-light">ดูรายการตรวจทั้งหมด</a>
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


                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>ครั้งที่</th>
                                            <th>วันที่</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = '1';
                                        $query5 = mysqli_query($con, " select * from report where license_car = '$car_id' ORDER BY report_date_add ASC") or die("Database selection failed 1: " . mysqli_error($con));
                                        while ($result5 = mysqli_fetch_array($query5)) {
                                            $date5 = $result5['report_date_add'];
                                            $chk_id = $result5['report_id'];
                                        ?>
                                            <tr>
                                                <td><?php echo  $i++; ?></td>
                                                <td><a href="counter_report2.php?car_id=<?php echo $car_id ?>&chk=<?php echo $chk_id ?>&date=<?php echo date('Y-m-d', strtotime($date5)); ?>"><?php echo date('d', strtotime($date5)); ?>/<?php echo date('m', strtotime($date5)); ?>/<?php echo YearThai($date5); ?></a></td>
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


            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>

        <!-- END wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>



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
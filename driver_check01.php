<?php
session_start();
$con = mysqli_connect("localhost","root","123456789","register");
error_reporting(error_reporting() & ~E_NOTICE);

$car_id = $_GET['car_id'];
$formcar_id = $_GET['formcar_id'];
$qr_user = mysqli_query($con, "SELECT * FROM user WHERE ad_id = '$_SESSION[ad_id]'") or die("Database selection failed: " . mysqli_error($con));
$re_user = mysqli_fetch_array($qr_user);


$user = $re_user["user_id"];
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

    <!-- Custom box css -->
    <link href="assets/libs/custombox/custombox.min.css" rel="stylesheet">

    <!-- Sweet Alert-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

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
<?php
include("driver_left_sidebar.php");
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
                        <div class="col-xl-4 col-md-4">
                            <div class="card-box">
                                <h2 class="">ข้อมูลรถ</h2>
                                <div class="progress">
                                    <div class="progress-bar bg-blue progress-bar-striped progress-bar-animated"
                                        role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 50%;">
                                        <span class="sr-only">0% Complete</span>
                                    </div>
                                </div>
                                <hr />

                                <?php

                                $sql = "SELECT  *  FROM car_data
                                       WHERE car_data.rec=$car_id ";


                                $query = mysqli_query($con, $sql) or die("Database selection failed: " . mysqli_error($con));
                                while($result = mysqli_fetch_array($query)) {
                                    $company_id = $result['company_id'];
                                    $car_lin = $result['car_id'];
                                    
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <dt class="col-sm-5">ทะเบียนรถ</dt>
                                            <dd class="col-sm-7"><?php echo $result['car_plate'] ?></dd>
                                            <dt class="col-sm-5">จังหวัด</dt>
                                            <dd class="col-sm-7"><?php echo $result['car_province'] ?></dd>
                                            
                                            <dt class="col-sm-5">บริษัทประกันภัย</dt>
                                            <dd class="col-sm-7"><?php echo $result['car_insurance_company'] ?></dd>
                                            <dt class="col-sm-5">วันที่ตรวจ</dt>
                                            <dd class="col-sm-7"><?php echo $result['dateRegis'] ?></dd>
                                            <dt class="col-sm-5">วันหมดอายุภาษี</dt>
                                            <dd class="col-sm-7"><?php echo $result['dateExTax'] ?></dd>
                                            <dt class="col-sm-5">วันหมดอายุประกันภัย</dt>
                                            <dd class="col-sm-7"><?php echo $result['dateExIns'] ?></dd>
                                           
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>


                            <hr />
                        </div>

                        <?php
                        $cp = $_GET['cp'];
                        $chk = $_GET['chk'];
                        $cf = $_GET['cf'];
                        $car_id = $_GET['car_id'];
                        include("connectdb.php");
                        date_default_timezone_set('Asia/Bangkok');
                        $datetime = date("Y-m-d H:i:s");
                        include('random_id_2.php');
                        $chk1 = getToken2(12);
                        $chk_id = 'N'.$chk1;
                        $strSQL = "UPDATE car_data SET ";
                        $strSQL .="car_status = '$chk',date_update = '$datetime' ";
                        $strSQL .="WHERE car_plate = '$cp' ";
                        $objQuery = mysqli_query($con,$strSQL) or die("Database selection failed: " . mysqli_error($con));
                        ?>
                        <div class="col-xl-8 col-md-8">
                            <div class="card-box">
                                <h2 class="">รายการตรวจ</h2>
                                
                                <div class="progress">
                                    <div class="progress-bar bg-blue progress-bar-striped progress-bar-animated"
                                        role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 100%;">
                                        <span class="sr-only">35% Complete</span>
                                    </div>
                                </div>
                                <hr />

                                <div class="row">
                                    <div class="col-md-12 col-xs-12">

                                        <form
                                            action="driver_check02_save.php?cp=<?php echo $cp ?>&cf=<?php echo $cf ?>&car_id=<?php echo $car_id ?>&chkid=<?php echo $chk_id ?>"
                                            method="post">

                                            <div class="accordion" id="accordionExample">
                                                <div class="card">
                                                    <?php
                                                $sql = "SELECT * from car_form_subject where  car_form_subject.form_id=$formcar_id
                                                GROUP BY car_form_subject.form_sub_id ORDER BY car_form_subject.date_insert ASC ";
                                                $query = mysqli_query($con, $sql) or die("Database selection failed: " . mysqli_error($con));
                                                while($re = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                                    $form_sub_id = $re['form_sub_id'];
                                                    ?>

                                                    <div class="card-header mt-2" id="headingOne">
                                                        <h2 class="mb-0">
                                                            <button class="btn btn-link" type="button"
                                                                data-toggle="collapse"
                                                                data-target="#collapse<?php echo $re['form_sub_id'] ?>"
                                                                aria-expanded="true"
                                                                aria-controls="collapse<?php echo $re['form_sub_id'] ?>">
                                                                <?php echo $re['form_sub_name'] ?>
                                                            </button>
                                                        </h2>
                                                    </div>
                                                    <?php
                                                    $sql01 = "SELECT * from car_form_choice
                                                    INNER JOIN car_choice_problem ON car_form_choice.num=car_choice_problem.num_id
                                                    where car_form_choice.form_sub_id = '$form_sub_id' AND  status=0 AND car_id='$car_lin'";
                                                    $query01 = mysqli_query($con, $sql01) or die("Database selection failed: " . mysqli_error($con));
                                                    while($row = mysqli_fetch_array($query01, MYSQLI_ASSOC)) {
                                                        ?>
                                                    <div id="collapse<?php echo $row['form_sub_id'] ?>" class="collapse"
                                                        aria-labelledby="headingOne" data-parent="#accordionExample">
                                                        <div class="card-body">
                                                            <div class="checkbox checkbox-danger checkbox-circle">
                                                                <input id="<?php echo $row['choice_detail'] ?>"
                                                                    class="check_detail" type="checkbox"
                                                                    value="<?php echo $row['choice_detail'].'_'.$row['num'].'_'.$car_lin; ?>"
                                                                    name="car_problem[]" <?php if($row['check_pass'] != 0){ echo 'checked';}?>>
                                                                <label for="<?php echo $row['choice_detail'] ?>">
                                                                    <?php echo $row['choice_detail'] ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <?php
                                                }
                                                    }
                                                ?>
                                                </div>
                                            </div>
                                        </form>
                                       
                                    </div><!-- ส่วนท้าย -->
                                </div><!-- ส่วนท้าย -->
                            </div><!-- end col -->

                        </div>

                    </div> <!-- container-fluid -->

                </div> <!-- content -->



           
             <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">ข้อตรวจ</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Start Content-->
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12">
                                        <form action="driver_check_update.php" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="id" id="id">
                                                <input type="hidden" name="car_id" id="car_id">
                                                <div class="card-box">
                                                    <h2 id="header4"></h2><br>
                                                    <div class="col-sm-12">
                                                   
                                                        <div class=" form-group text-center mb-0 " >
                                                            <h3>
                                                            <input id="examination1" type="radio" name="car_pb_status" value="1"><font color="green"> ผ่าน</font>&nbsp;
                                                            <input id="examination2" type="radio" name="car_pb_status" value="2"><font color="red"> ไม่ผ่าน</font>
                                                            </h3>
                                                        </div><br>
                                                        <h5 id="header4"> รายละเอียด </h5>
                                                        <textarea class="form-control" rows="3" placeholder="เขียนรายละเอียด" name="car_pb_detail" id="car_pb_detail" required></textarea>
                                                    </div>
                                                    <br>
                                                    <h4 class="header-title mt-0">เพิ่มรูปภาพ</h4>
                                                    <input type="file" name="images" id="images" class="form-control" required
                                                        accept="image/*" />
                                                        <label id="file_name"></label>
                                                        <br><br>
                                                       
                                                    
                                                    <div class="form-group text-center mb-0">
                                                        <button type="submit" class="btn btn-success  waves-effect width-md waves-light" id="submit_post">บันทึกผลการตรวจ</button>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end col -->



                    </div>
                    <!-- end row -->

                </div> <!-- container-fluid -->

            </div>

        </div>
    </div>
    </div>

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

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>


    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- Modal-Effect -->
    <script src="assets/libs/custombox/custombox.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

    <!-- Sweet Alerts js -->
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <!-- Sweet alert init js-->
    <script src="assets/js/pages/sweet-alerts.init.js"></script>

    <script>
        $("#images").change(function(){
            $("#file_name").text('');
        });
        $(".check_detail").change(function (e) {
            if (this.checked) {
                var id = $(this).val().split('_')[1];
                var topic = $(this).val().split('_')[0];
                var car_id = $(this).val().split('_')[2];
                $('#exampleModalCenter').modal('show');
                $("#header4").text(topic);
                $("#id").val(id);
                $("#car_id").val(car_id);
                //alert(id+" "+car_id);
                $.ajax({
                    url:'inspection_get_infomation.php',
                    data:{
                        id:id,
                        car_id:car_id
                    },
                    type:"GET",
                    dataType:"json",
                    success:function(data){
                        console.log(data['status']);
                        if(data['status'] != 0){
                            if(data['status'] == 1){
                                $("#examination1").prop( "checked",true );
                                $("#examination1").attr( "readonly",true );
                            }
                            else{
                                $("#examination2").prop( "checked",true );
                                $("#examination2").attr( "readonly",true );

                            }
                            $("#car_pb_detail").val(data['detail']);
                            $("#file_name").text("ภาพอันเก่า: "+data['img']);
                            $("#file_name").attr( "readonly",true );
                            $("#car_pb_detail").attr( "readonly",true );
                            $("#submit_post").hide();
                        }
                        else{
                          
                            $("#examination1").prop('checked',false );
                            $("#examination2").prop( "checked",false );
                            $("#examination2").attr( "readonly",false );
                            $("#examination1").attr( "readonly",false );
                            $("#file_name").attr( "readonly",false );
                            $("#car_pb_detail").attr( "readonly",false );
                            $("#submit_post").show();


                            $("#car_pb_detail").val('');
                            $("#file_name").text('');
                           
                        }
                      
                    },
                    error:function(request, status, error){
                        console.log(request.responseText);
                        $("#examination1").prop( "checked",false );
                        $("#examination2").prop( "checked",false );
                        $("#car_pb_detail").val('');
                        $("#file_name").text('');
                    }

                });
              
            } else {
           
                // the checkbox is now no longer checked
            }
        });

        
    </script>

</body>

</html>
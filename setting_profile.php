<?php
include("connectdb.php");
session_start();
include("show_information_lift_sidebar.php");
include("show_information_topbar.php");
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

        <!-- dropify -->
        <link href="assets/libs/dropify/dropify.min.css" rel="stylesheet" type="text/css" />
      
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">

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
                            
                            <div class="col-md-12">
                                <div class="card-box">
                                    
                                    <h1>แก้ไขข้อมูลส่วนตัว</h1>
                                    
                                    <div class="col-xl-10">
                                            <div class="card-box">
<body>
    <?php 
   
    $id = $_GET["d"];
    $query = "SELECT * FROM user WHERE id ='$id'";
    $res = mysqli_query($con, $query);

    while ($row = mysqli_fetch_array($res)){
        ?>
    
    <form action="./update_profile.php" method="post" enctype="multipart/form-data" id="form1" >
        
        <input type="hidden" name="d" value="<?php echo $id;?>"> 
        <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">ชื่อ - นามสกุล:</label>
            <div class="col-sm-9">
                <input type="text" name="user_name"  class="form-control"value="<?php echo $row["user_name"]?>"></a>
            </div>
         </div>

         <div class="form-group row">
                <label class="col-sm-4 col-form-label">บริษัทที่สังกัด</label>
                    <div class="col-sm-4 col-form-label">
                        <?php echo $row["ad_id"];?>
                    </div>
         </div>


         <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">แผนก:</label>
            <div class="col-sm-9">
            <a type="text" name="ut_id"  class="form-control"value=" <?php echo $row["ut_id"];?>"></a>
         </div>
         </div>

         <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">username:</label>
            <div class="col-sm-9">
            <a type="text" name="user_username"  class="form-control"value="<?php echo $row["user_username"];?><"></a>
         </div>
         </div>

         <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Password:</label>
            <div class="col-sm-9">
            <input type="text" name="user_password"  class="form-control"value="<?php echo $row["user_password"];?>">
         </div>
         </div>

        

         <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">รูปภาพ:</label>
            <div class="col-sm-9">
        <input type="file" name="user_image"  class="form-control" accept="image/*" require>
        </div>
         </div>

        

        <!-- <div class="float-right">
        <button class="btn btn-warning btn-rounded width-lg waves-effect waves-light " ><span>บันทึก</span></button>
        </div> -->
        <button><a type="submit">บันทึกข้อมูล</a></button>
    </form>
     <!-- END wrapper -->
<?php
    }
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

        <!-- dropify js -->
        <script src="assets/libs/dropify/dropify.min.js"></script>

        <!-- form-upload init -->
        <script src="assets/js/pages/form-fileupload.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

</body>
</html>
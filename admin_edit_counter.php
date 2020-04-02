<?php
include("connectdb.php");
session_start();
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
    <?php
        require("show_information_topbar.php");
    
    ?>
    <body class="authentication-bg">

        <!-- Begin page -->
        <div id="wrapper">
        <?php
  require("show_information_lift_sidebar.php");
  ?>
        <?php
            $query =  "SELECT admin.admin_name ,admin.admin_username ,admin.admin_password,admin.admin_id, admin.user_id, admin.image , company.user_id,company.company_name FROM  admin 
            INNER JOIN company ON admin.user_id = company.user_id WHERE  admin_id = '". $_SESSION['admin_id'] . "' ";
            $res = mysqli_query($con,$query);
                                                  
            while ($row = mysqli_fetch_array($res)){
        ?>

          

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
    
    <form action="admin_update.php" method="POST" enctype="multipart/form-data" id="form1" >
        <input type="hidden" name="id" value="<?php echo $id;?>">
        
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">ชื่อ - นามสกุล:</label>
                <div class="col-sm-9">
                <input type="text" name="admin_name"  required class="form-control"value="<?php echo $row["admin_name"]?>">
            </div>
         </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">บริษัทที่สังกัด</label>
                <div class="col-sm-9">
                <label for="inputEmail3" class="col-sm-2 col-form-label"><?php echo $row["company_name"]?></label>
            </div>
         </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">username:</label>
                <div class="col-sm-9">
                <label for="inputEmail3" class="col-sm-2 col-form-label"><?php echo $row["admin_username"]?></label>
            </div>
         </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Password:</label>
                <div class="col-sm-9">
                <input type="text" name="admin_password"  required class="form-control"value="<?php echo $row["admin_password"]?>">
            </div>
         </div>

        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Profile:</label>
                <div class="col-sm-9">
                    <img src="assets/images/users/<?php echo $row['image'];?>" width="300"><br>
                </div>
            </div>
            
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">New Profile:</label>
                <div class="col-sm-9">
                <input type="file" name="image"  class="form-control" accept="image/*" >
            </div>
         </div>
        
    
        <div class="float-right" class="form-group row" >
        <input type="hidden" name="image2" value="<?php echo $row['image'];?>">    
        <input type="hidden" name="admin_id" value="<?php echo $row['admin_id'];?>">           
        <input type="submit" class="btn btn-warning btn-rounded width-lg waves-effect waves-light " value="บันทึกข้อมูล">
    </form>
     <!-- END wrapper -->

    

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
<?php
}
   ?>
</body>
</html>
<html>

<head>
  <meta charset="utf-8">
  <meta charset="utf-8" />
  <title>e-Checklist | Powered by ID Drives</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="e-Checklist" name="description" />
  <meta content="ID Drives" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="assets/images/favicon.ico">

  <!-- Sweet Alert-->
  <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />

  <!-- App css -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
  <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />


  <!-- Vendor js -->
  <script src="assets/js/vendor.min.js"></script>



  <!-- App js -->
  <script src="assets/js/app.min.js"></script>

  <!-- Sweet Alerts js -->
  <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

  <!-- Sweet alert init js-->
  <script src="assets/js/pages/sweet-alerts.init.js"></script>
</head>

<body>
  <?php 
        session_start();
        if(isset($_POST['user_username'])){
				//connection
        include("connectdb.php");
				//รับค่า user & password
                  $user_username = $_POST['user_username'];
                  $user_password = $_POST['user_password'];
                  
				//query 
                  $sqli="SELECT * FROM user Where user_username='$user_username' AND user_password='$user_password' ";
 
                  $result = mysqli_query($con,$sqli);
				
                  if(mysqli_num_rows($result)==1){
 
                      $row = mysqli_fetch_array($result);
                      $_SESSION["user_id"] = $row["user_id"];
                      $_SESSION["user_name"] = $row["user_name"];
                      $_SESSION["user_username"] = $row["user_username"];
                      $_SESSION["user_password"] = $row["user_password"];
                      $_SESSION["image"] = $row["image"];
                      $_SESSION["ut_id"] = $row["ut_id"];
                      $_SESSION["ad_id"] = $row["ad_id"];
                     
                 
                      //$_SESSION["company_id"] = $row["company_id"];
                  

                      if($_SESSION["ut_id"]=="1"){ //ถ้าเป็น 1 แผนกจ่ายงาน ให้กระโดดไปหน้า  dispatch_past_car_check.php
 
                        Header("Location: dispatch_past_car_check.php?user_id=30");
 
                      }
                      if($_SESSION["ut_id"]=="2"){ //ถ้าเป็น 2 แผลกจัดการเอกสาร ให้กระโดดไปหน้า admin_company.php
 
                        Header("Location: counter_dashboard.php?user_id=30");
 
                      }
                      if($_SESSION["ut_id"]=="3"){ //ถ้าเป็น 3 หัวหน้าคนขับ ให้กระโดดไปหน้า foreman_inspection_alert_all_car.php
 
                        Header("Location: driver_dashbord.php");
 
                      }
                      if($_SESSION["ut_id"]=="4"){ //ถ้าเป็น 4 แผนกซ่อมบำรุง ให้กระโดดไปหน้า maintenance_all_car.php
 
                        Header("Location: maintenance_all_car.php?user_id=30");
 
                      }
                      if($_SESSION["ut_id"]=="5"){ //ถ้าเป็น 5 หัวหน้าพนักงานซ่อม ให้กระโดดไปหน้า foreman_maintenance_documant_adddata.php
 
                        Header("Location: foreman_maintenance_status.php");
 
                      }
                      if($_SESSION["ut_id"]=="6"){ //ถ้าเป็น 6 ให้กระโดดไปหน้า 
 
                        Header("Location: inspection_foreman_status.php?user_id=30");
 
                      }
                     
                      if($_SESSION["ut_id"]=="7"){ //ถ้าเป็น 7 ให้กระโดดไปหน้า adduser.php.php 
 
                        Header("Location: adduser.php");
 
                      }
                      if($_SESSION["ut_id"]=="99"){ //ถ้าเป็น 99 คือแอดมินใหญ่ ให้กระโดดไปหน้า admin_addcounter.php
 
                        Header("Location:admin_addcompany.php");
 
                      }
                    
                    else{
                       echo  "<script> swal({
                        title:'ไม่สามารถเข้าสู่ระบบได้',
                        text: 'Username หรือ รหัสผ่าน ไม่ถูกต้อง',
                        type: 'warning'
                    }).then ( function() {
                        window.location.href='login.php';
                    });
                   </script>" ;
            }        
                    
                }       
                else{
                  echo  "<script> swal({
                    title:'ไม่สามารถเข้าสู่ระบบได้',
                    text: 'Username หรือ รหัสผ่าน ไม่ถูกต้อง',
                    type: 'warning'
                }).then ( function() {
                  window.location.href='login.php';
                });
             </script>" ;

                  $sqli="SELECT * FROM admin WHERE admin_username='$user_username' AND admin_password='$user_password' ";
                 

                  $result = mysqli_query($con,$sqli);
				
                  if(mysqli_num_rows($result) > 0){
 
                      $row = mysqli_fetch_array($result);
                      $_SESSION["admin_id"] = $row["admin_id"];
                      $_SESSION["user_name"] = $row["admin_name"];
                      $_SESSION["user_username"] = $row["user_username"];
                      $_SESSION["user_password"] = $row["user_password"];
                      $_SESSION["user_id"] = $row["user_id"];
                     
                       
                      if($_SESSION["user_id"]==$row["user_id"]){ //ถ้าเท่ากับค่าที่รับมา ให้กระโดดไปหน้า  dispatch_past_car_check.php
 
                        Header("Location: adduser.php");
 
                      }


                    else{
                      {
                        echo  "<script> swal({
                            title:'ไม่สามารถเข้าสู่ระบบได้',
                            text: 'Username หรือ รหัสผ่าน ไม่ถูกต้อง',
                            type: 'warning'
                        }).then ( function() {
                          window.location.href='login.php';
                        });
                     </script>" ;
                }
                    }  
                    
                }       
				
                }
            }
          
?>
</body>

</html>
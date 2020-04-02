<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
session_start();
include("connectdb.php");
date_default_timezone_set('Asia/Bangkok');
$datetime = date("Y-m-d H:i:s");
$con->set_charset("utf8");

$sql2 = "INSERT INTO car_driver (driver_name, driver_department, user_id, 	 driver_tel, driver_username, driver_password,lineid)   VALUES
('$_POST[driver_name]','$_POST[driver_department]','$_POST[user_id]','$_POST[driver_tel]','$_POST[driver_username]',
'$_POST[driver_password]','$_POST[lineid]')";
$Query2 = mysqli_query($con, $sql2) or die("Database selection failed: " . mysqli_error($con));

if($Query2) {
    Header("Location: counter_adddriver.php");
    }else{
        echo "เกิดข้อผิดพลาด".mysqli_error($con);
    }



?>
</body>
</html>

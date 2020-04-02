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

$car_plate = $_POST['car_plate'];
$car_company = $_POST['car_company'];
$car_province = $_POST['car_province'];
$car_address  =$_POST['car_address'];
$work_type = $_POST['work_type'];
$price_oil = $_POST['price_oil'];
$price_travel = $_POST['price_travel'];

$sql2 = "INSERT INTO car_dispatch VALUES
(NULL,'$car_plate','$car_company','$car_province','$car_address','$work_type','$price_oil','$price_travel','$datetime')";
$Query2 = mysqli_query($con, $sql2) or die("Database selection failed: " . mysqli_error($con));

if($Query2) {
    Header("Location: dispatch_past_car_check.php");
    }else{
        echo "เกิดข้อผิดพลาด".mysqli_error($con);
    }


?>
</body>
</html>

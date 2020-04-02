<html>
<head>
    <meta charset="utf-8">
</head>
<body>
<?php
include_once ("connectdb.php");
date_default_timezone_set('Asia/Bangkok');
$datetime = date("Y-m-d H:i:s");
$con->set_charset("utf8");
$car_id = $_GET['car_id'];
$URL = 'counter_dashboard.php';


$query4 = "DELETE FROM car_data WHERE car_id = '$car_id'";
$objQuery4 = mysqli_query($con, $query4) or die("Database selection failed: " . mysqli_error($con));

if($objQuery4) {
    echo "<script>location.href='$URL'</script>";
}
?>
</body>
</html>

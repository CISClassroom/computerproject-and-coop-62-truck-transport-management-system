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

$sql2 = "INSERT INTO report (report_topic, report_detail, report_status, image, report_date_add)   VALUES
('$_POST[report_topic]','$_POST[report_detail]','$_POST[report_status]','$_POST[image]','$datetime')";
$Query2 = mysqli_query($con, $sql2) or die("Database selection failed: " . mysqli_error($con));


?>
</body>
</html>

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

$sql2 = "INSERT INTO company (company_zone, company_name, company_tel, company_address, company_province, company_amphur, company_tumbon,company_zip,company_date_add)   VALUES
('$_POST[company_zone]','$_POST[company_name]','$_POST[company_tel]','$_POST[company_address]','$_POST[company_province]','$_POST[company_amphur]','$_POST[company_tumbon]','$_POST[company_zipcode]','$datetime')";
$Query2 = mysqli_query($con, $sql2) or die("Database selection failed: " . mysqli_error($con));


?>
</body>
</html>

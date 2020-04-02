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

$strSQL2 = "UPDATE company SET company_zone = '$_POST[company_zone]',
company_name = '$_POST[company_name]',
company_tex = '$_POST[company_tex]',
company_tel = '$_POST[company_tel]',
company_address = '$_POST[company_address]',
company_province = '$_POST[company_province]',
company_amphur = '$_POST[company_amphur]',
company_tumbon = '$_POST[company_tumbon]',
company_zip = '$_POST[company_zip]'
WHERE user_id = '$_POST[company_id]'";
$objQuery = mysqli_query($con,$strSQL2) or die("Database selection failed: " . mysqli_error($con));

?>
</body>
</html>

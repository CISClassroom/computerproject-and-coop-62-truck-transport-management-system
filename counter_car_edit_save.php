<!-- <html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/libs/sweetalert2/sweetalert2.min.css">
    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
</head>
<body>
<?php
include_once ("connectdb.php");
date_default_timezone_set('Asia/Bangkok');
$car_id = $_POST['car_id'];
$URL = 'counter_car_summary.php?car_id='.$car_id;

$sql = "UPDATE car_data ";
$sql .=" SET 
car_form = '$_POST[car_form]',
car_name_cf = '$_POST[name_cf]',
car_plate  = '$_POST[car_plate]',
car_licenseplatetail  = '$_POST[car_licenseplatetail]',
car_province  = '$_POST[car_province]',
dateRegis = '$_POST[dateRegis]',
dateExTax  = '$_POST[dateExTax]',
dateExIns  = '$_POST[dateExIns]',
WHERE car_id = '$car_id'
";
$objQuery = mysqli_query($con, $sql) or die("Database selection failed: " . mysqli_error($con));

if($objQuery)
{
    echo "<script>
            swal({
                title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
                text: '',
                type: 'success',
                confirmButtonColor: '#4fa7f3'
            }).then ( function() {
                window.location.href = '$URL';
            });
         </script>";
}else
{
    echo "<script>
            swal({
                title:'เกิดข้อผิดพลาด',
                text: 'ไม่สามารถบันทึกข้อมูลได้',
                type: 'error'
            }).then ( function() {
                window.location.href = '$URL';
            });
         </script>";
}

?>
</body>
</html> -->
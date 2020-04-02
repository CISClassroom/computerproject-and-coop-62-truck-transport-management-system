<html>
<head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/libs/sweetalert2/sweetalert2.min.css">
        <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>
</head>
<body>
<?php
include_once ("connectdb.php");
date_default_timezone_set('Asia/Bangkok');
$datetime = date("Y-m-d H:i:s");
$con->set_charset("utf8");
$cp = $_GET['cp'];
$cf = $_GET['cf'];
$car_id = $_GET['car_id'];
$URL = 'driver_check01.php?car_id='.$car_id.'&cp='.$cp.'&cf='.$cf;
$chk = $_GET['chkid'];

for($i=0;$i<count($_POST["car_problem"]);$i++) {
    if (trim($_POST["car_problem"][$i]) != "") {
        $strSQL = "INSERT INTO car_problem (car_id,chk_id,car_plate, car_form, car_form_choice_num, car_pb_status, date_insert, user_id) VALUES
 ('$car_id','$chk','$cp','$cf','".$_POST["car_problem"][$i]."','0','$datetime','check' )";
        $objQuery = mysqli_query($con, $strSQL) or die("Database selection failed: " . mysqli_error($con));
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
    }
}


?>
</body>
</html>

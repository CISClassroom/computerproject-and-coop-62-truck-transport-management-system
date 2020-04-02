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
$cn = $_GET['cn'];
$car_id = $_GET['car_id'];
$strSQL2 = "UPDATE car_problem SET ";
$strSQL2 .="car_pb_status = '1' ";
$strSQL2 .="WHERE car_id = '$car_id' AND car_form_choice_num = '$cn' ";
$objQuery2 = mysqli_query($con,$strSQL2) or die("Database selection failed: " . mysqli_error($con));

$qr_1=mysqli_query($con,"select * from car_problem where car_id = '$car_id' AND car_pb_status = '0' ") or die("Database selection failed: " . mysqli_error($con));
$re_1 = mysqli_num_rows($qr_1);

if ($re_1 >= '1') {
    $URL = 'driver_check03.php?car_id='.$car_id.'&cp='.$cp.'&cf='.$cf;
}else
{
    $URL = 'driver_check_final.php';
}

    foreach ($_FILES["pictures"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
            // basename() may prevent filesystem traversal attacks;
            // further validation/sanitation of the filename may be appropriate
            $name = basename($_FILES["pictures"]["name"][$key]);
            move_uploaded_file($tmp_name, "data/$name");
            $strSQL5 = "INSERT INTO car_problem_img (car_id, car_plate, car_form, car_form_choice_num, car_img_pb, car_pb_status, date_insert, user_id) VALUES
 ('$car_id','$cp','$cf','$cn','$name','0','$datetime','check' )";
            $objQuery5 = mysqli_query($con, $strSQL5) or die("Database selection failed 0: " . mysqli_error($con));
        }
    }



    $strSQL = "INSERT INTO car_problem2 (car_id, car_plate, car_form, car_form_choice_num, car_pb_detail, date_insert, user_id) VALUES
 ('$car_id','$cp','$cf','$cn','".$_POST["car_pb_detail"]."','$datetime','check' )";
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








?>
</body>
</html>

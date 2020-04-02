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
$car_id = $_POST['car_id'];
$URL = 'counter_car_summary.php?car_id='.$car_id; 

$strSQL = "INSERT INTO car_data 
VALUES (NULL,'$car_id',
'$_POST[car_name_cf]','$_POST[car_form]','$_POST[car_plate]','$_POST[car_province]','$_POST[car_licenseplatetail]','$_POST[car_insurance_company]','$_POST[dateRegis]','$_POST[dateExTax]','$_POST[dateExIns]','$_POST[company_id]','',0,'$datetime','')";
$objQuery = mysqli_query($con, $strSQL) or die("Database selection failed: " . mysqli_error($con));

if($objQuery)
{
    $show_select = "SELECT * FROM car_choice_problem WHERE car_id='$car_id' AND status=0";
    $show_query = mysqli_query($con,$show_select);
    $num = mysqli_num_rows($show_query);
    if($num ==0){
        $select = "SELECT * FROM car_form_choice WHERE form_id='$_POST[car_form]'";
        $query = mysqli_query($con,$select);
        while($row = mysqli_fetch_array($query)){
           $id = $row['num'];
           $insert = "INSERT INTO car_choice_problem VALUES(NULL,'$car_id',
           $id,0,'','',0,'$datetime')";
           mysqli_query($con,$insert);
        }
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
    }
    else{
        $select = "SELECT * FROM car_form_choice WHERE form_id='$_POST[car_form]'";
        $query = mysqli_query($con,$select);
        while($row = mysqli_fetch_array($query)){
           $id = $row['num'];
           $show_select = "SELECT * FROM car_choice_problem WHERE car_id='$car_id' AND status=0 AND num_id=$id";
           $show_query = mysqli_query($con,$show_select);
           $num = mysqli_num_rows($show_query);
           if($num == 0){
            $insert = "INSERT INTO car_choice_problem VALUES(NULL,'$car_id',
            $id,0,'','',0,'$datetime')";
            mysqli_query($con,$insert);
           }else{
             $insert = "UPDATE car_choice_problem SET num_id=$id ,check_pass=0,
            detail_check='',img_check='' WHERE car_id='$car_id'";
             mysqli_query($con,$insert);
           }
        
       }
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
    }
   
    
    /*echo "<script>
            swal({
                title: 'บันทึกข้อมูลเรียบร้อยแล้ว',
                text: '',
                type: 'success',
                confirmButtonColor: '#4fa7f3'
            }).then ( function() {
                window.location.href = '$URL';
            });
         </script>";*/
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
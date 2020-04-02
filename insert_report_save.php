<?php
include_once ("connectdb.php");
date_default_timezone_set('Asia/Bangkok');
$datetime = date("Y-m-d H:i:s");

$check = $_GET['check'];
$id = $_GET['id'];

$select = "SELECT * FROM car_choice_problem AS A
           JOIN car_data AS B ON A.car_id=B.car_id 
           WHERE A.id=$id
           ";
 
$query =  mysqli_query($con,$select);


while($row = mysqli_fetch_array($query)){
   $detail = $row['detail_check'];
   $img = $row['img_check'];    
   $plate = $row['car_plate']; 
   $INSERT = "INSERT INTO report VALUES(NULL,'$plate','ตรวจแล้ว','$detail','$img','$check','$datetime')";
   if(mysqli_query($con,$INSERT)){
       $delete = "DELETE FROM car_choice_problem WHERE id=$id";
       if(mysqli_query($con,$delete)){
           echo "<script>window.history.back();</script>";
       }
   }
}



?>
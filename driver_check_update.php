<?php 
include_once ("connectdb.php");

$id=$_POST["id"]; 
$status=$_POST["car_pb_status"];
$pb=$_POST["car_pb_detail"]; 
$car_id = $_POST['car_id'];

//$img=$_POST["images"];


$target_dir = "evidence_problem/".$id.'/';
if (!file_exists($target_dir)) {
  mkdir($target_dir);
}

$target_file = $target_dir.basename($_FILES['images']['name']);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
    $UPDATE = "UPDATE car_choice_problem SET 
    detail_check='$pb',
    check_pass=$status,
    img_check='$target_file'
    WHERE car_id='$car_id' AND num_id=$id AND status=0 ";
    if(mysqli_query($con,$UPDATE)){
       echo '<script>
       alert("อัพโหลดเรียบร้อย");
       window.history.back();  
       </script>';
    }
    else{
    
    }
} else {
  
}

exit;
?>
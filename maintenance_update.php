<?php 
include_once ("connectdb.php");

 
$car_id = $_POST['car_id'];
$report_id = $_POST['report_id'];
$detail_update = $_POST['detail_update'];
$image_update = $_POST['image_update'];





$target_dir = "evidence_problem_update/".$report_id.'/';
if (!file_exists($target_dir)) {
  mkdir($target_dir);
}

$target_file = $target_dir.basename($_FILES['image_update']['name']);

$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (move_uploaded_file($_FILES["image_update"]["tmp_name"], $target_file)) {

    $UPDATE = "INSERT INTO maintenance VALUES(NULL,'$detail_update','$target_file'
    ,$car_id,$report_id,'')";
    
    if(mysqli_query($con,$UPDATE)){
     $update = "UPDATE report SET report_status='ผ่าน' WHERE report_id=$report_id";
     if(mysqli_query($con,$update)){
         echo '<script>
         alert("อัพโหลดเรียบร้อย");
          window.history.back();  
          </script>';
     }
    }
   
} else {
  
  $UPDATE = "INSERT INTO maintenance VALUES(NULL,'$detail_update','$target_file'
  ,$car_id,$report_id)";
  
  if(mysqli_query($con,$UPDATE)){
   $update = "UPDATE report SET report_status='ผ่าน' WHERE report_id=$report_id";
   if(mysqli_query($con,$update)){
       echo '<script>
       alert("อัพโหลดเรียบร้อย");
        window.history.back();  
        </script>';
   }
  }
}

exit;
?>
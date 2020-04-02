<?php 
include_once ("connectdb.php");
$id = $_GET['id'];
$car_id = $_GET['car_id'];


$select = "SELECT * FROM car_choice_problem WHERE car_id='$car_id' AND num_id=$id AND status=0";
$query = mysqli_query($con,$select);
while($row = mysqli_fetch_array($query)){
    $status = $row['check_pass'];
    if($status != 0){
    $detail = $row['detail_check'];
    $img = explode('/',$row['img_check'])[2];
    }
    else{
        $detail = '';
        $img = '';
    }
   
}


echo json_encode(array("status"=>$status,'detail'=>$detail,'img'=>$img));


?>
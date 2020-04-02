<?php 
include("connectdb.php");

$report_id = $_POST['report_id'];
$example = $_POST['example-textarea'];

$select = "UPDATE report SET report_detail='$example' WHERE report_id='$report_id'";
if(mysqli_query($con,$select)){
 header("location:foreman_maintenance_status.php");
}
?>
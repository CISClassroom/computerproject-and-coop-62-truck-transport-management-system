<?php
include("connectdb.php");
date_default_timezone_set('Asia/Bangkok');
$con->set_charset("utf8");

$a1 = $_GET['num'];
$form_id = $_POST['fid'];
$datetime = date("Y-m-d H:i:s");

$strSQL2 = "UPDATE car_form_choice SET choice_detail = '$_POST[choice_form]' WHERE num = '$a1'";
$objQuery = mysqli_query($con,$strSQL2) or die("Database selection failed: " . mysqli_error($con));

if($objQuery)
{
    $show = "<script> window.location='counter_edform.php?fid=$form_id'</script>";
}
else
{
    $show = "Error Save [".$strSQL2."]";
}
echo $show;

?>
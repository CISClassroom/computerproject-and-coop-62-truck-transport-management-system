<?php
include("connectdb.php");
date_default_timezone_set('Asia/Bangkok');
$con->set_charset("utf8");

$a1 = $_POST['fid'];
$fj = $_POST['fj'];
$ed = $_GET['type'];
$choice_form = $_POST['choice_form'];
$datetime = date("Y-m-d H:i:s");

if ($ed == 'ed'){
    $sql = "INSERT INTO car_form_choice (form_id , form_sub_id, choice_detail, date_insert)  VALUES ('$a1','$fj' ,'$choice_form', '$datetime')";
    $objQuery = mysqli_query($con,$sql) or die("Database selection failed: " . mysqli_error($con));
    if($objQuery)
    {
        $show = "<script> window.location='counter_edform.php?fid=$a1&fj=$fj';</script>";
    }
    else
    {
        $show = "Error Save [".$sql."]";
    }
    echo $show;
}elseif ($ed == 'new') {
    $sql = "INSERT INTO car_form_choice (form_id,form_sub_id, choice_detail, date_insert)  VALUES ('$a1','$fj' ,'$choice_form', '$datetime')";
    $objQuery = mysqli_query($con, $sql) or die("Database selection failed: " . mysqli_error($con));

    if ($objQuery) {
        $show = "<script> window.location='counter_addform2.php?fid=$a1&fj=$fj';</script>";
    } else {
        $show = "Error Save [" . $sql . "]";
    }
    echo $show;
}


?>
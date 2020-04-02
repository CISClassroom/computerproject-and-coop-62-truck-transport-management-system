<?php
include("connectdb.php");
date_default_timezone_set('Asia/Bangkok');
$con->set_charset("utf8");

$form_id = $_GET['fid'];
$datetime = date("Y-m-d H:i:s");
$tables = array("car_form","car_form_choice","car_form_subject");
foreach($tables as $table) {
    $query = "DELETE FROM $table WHERE form_id = '$form_id'";
    $objQuery = mysqli_query($con, $query) or die("Database selection failed 3: " . mysqli_error($con));

    if ($objQuery) {
        $show = "<script> window.location='counter_allform.php'</script>";
    } else {
        $show = "Error Save [" . $strSQL2 . "]";
    }
    echo $show;
}
?>
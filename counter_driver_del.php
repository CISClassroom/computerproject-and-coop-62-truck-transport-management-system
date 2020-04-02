<?php
require_once ("connectdb.php");
date_default_timezone_set('Asia/Bangkok');
$con->set_charset("utf8");

$form_id = $_GET['id'];
$datetime = date("Y-m-d H:i:s");

    $query = "DELETE FROM car_driver WHERE user_id = '$form_id'";
    $objQuery = mysqli_query($con, $query) or die("Database selection failed 3: " . mysqli_error($con));

    if ($objQuery) {
        $show = "<script> window.location='counter_driver_show.php'</script>";
    } else {
        $show = "Error Save [" . $strSQL2 . "]";
    }
    echo $show;

?>
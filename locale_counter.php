<?php
header("content-type: text/html; charset=utf-8");
include("connectdb.php");

$data = $_GET['data'];
$val = $_GET['val'];

if ($data =='province') {
    echo "<select name='car_provincialsign' class=\"form-control\" onChange=\"dochange('amphur', this.value)\">\n";
    echo "<option value='0'>-เลือกจังหวัด</option>\n";
    $result=mysqli_query($con,"SELECT * FROM province order by name_th ASC");
    while($row = mysqli_fetch_array($result)){
        echo "<option value=\"$row[id]\" >$row[name_th]</option> \n" ;
    }
} elseif ($data =='amphur') {
    echo "<select name='admin_amphur' class=\"form-control\" onChange=\"dochange('district', this.value)\">\n";
    echo "<option value='0'>-เลือกอำเภอ </option>\n";
    $result1=mysqli_query($con,"SELECT * FROM amphur WHERE province_id = '$val' ORDER BY id ASC");
    while($row1 = mysqli_fetch_array($result1)){
        echo "<option value=\"$row1[id]\" >$row1[name_th]</option> \n" ;
    }
} elseif ($data =='district') {
    echo "<select name='admin_tumbon' class=\"form-control\">\n";
    echo "<option value='0'>-เลือกตำบล </option>\n";
    $result2=mysqli_query($con,"SELECT * FROM tumbon WHERE amphur_id= '$val' ORDER BY id ASC");
    while($row2 = mysqli_fetch_array($result2)){
        echo "<option value=\"$row2[id]\" >$row2[name_th]</option> \n" ;
    }
}
echo "</select>\n";

?>
<?php
        include("connectdb.php");

        $ad_name =$_POST["ad_name"];
       
        $query = "INSERT INTO admin (ad_name)
                    VALUES ('$ad_name')";

        $result = mysqli_query($con, $query);

        if($result) {
            Header("Location: admin_addcounter.php");
            }else{
                echo "เกิดข้อผิดพลาด".mysqli_error($con);
            }
    ?>
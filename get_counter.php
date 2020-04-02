<?php
        include("connectdb.php");

        $admin_name =$_POST["admin_name"];
        $admin_username =$_POST["admin_username"];
        $admin_password =$_POST["admin_password"];
        $admin_password =$_POST["admin_password"];
        $user_id =$_POST["user_id"];



        $query = "INSERT INTO admin (admin_name, admin_username, admin_password,user_id  )
                    VALUES ('$admin_name','$admin_username', '$admin_password' ,'$user_id')";

        $result = mysqli_query($con, $query);

        if($result) {
            Header("Location: admin_addcompany.php");
            }else{
                echo "เกิดข้อผิดพลาด".mysqli_error($con);
            }
    ?>
<?php
       include("connectdb.php");

        $user_name =$_POST["user_name"];
        $user_username =$_POST["user_username"];
        $user_password =($_POST["user_password"]);
        $ut_id =$_POST["ut_id"];
        $user_id =$_POST["user_id"];

        //  $hash = password_hash($user_password, PASSWORD_DEFAULT);


        $query = "INSERT INTO user (user_name, user_username, user_password ,ut_id,user_id )
                    VALUES ('$user_name', '$user_username', '$user_password','$ut_id','$user_id')";

        $result = mysqli_query($con, $query);

        if($result) {
            Header("Location: adduser.php");
            }else{
                echo "เกิดข้อผิดพลาด".mysqli_error($con);
            }
    ?>
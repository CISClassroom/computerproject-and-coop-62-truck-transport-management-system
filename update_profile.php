<?php
    include("connectdb.php");
  
    $user_id = $_POST["user_id"];
    $user_name = $_POST["user_name"];
    $user_password = $_POST["user_password"];
    $user_image= $_POST["user_image"];
    

    $query= "INSERT INTO user VALUES
    ('','$user_name', '$user_password', '$user_image')";
    mysqli_query($con, $query);

   

    header("Location:setting_profile.php");

    
?>
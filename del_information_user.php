<?php
    include("connectdb.php");
    $id = $_GET["id"];

    $query = "DELETE FROM users WHERE id='$id'";
    mysqli_query($con,$query);

    header("Location: show_information_user.php");
?>
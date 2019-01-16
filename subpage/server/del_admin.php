<?php
    //connect database
    require 'server.php';

    // make it easy
    $val = $_POST['del_id'];

    $sql = "DELETE FROM admin WHERE admin_id = '$val' ";
    $re = mysqli_query($con,$sql);
    if($re){
        $_SESSION['alert'] = 12;
    }else{
        $_SESSION['alert'] = 13;
    }
    header("Location: ../dataadmin.php");
?>
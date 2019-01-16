<?php
    // connect database
    require 'server.php';

    // make it easy
    $id = $_POST['admin_id'];
    $name = $_POST['admin_name'];
    $username = $_POST['admin_username'];
    $password = $_POST['admin_password'];
    $role = $_POST['admin_role'];
    // check checkbox
    if(isset($_POST['admin_check'])){
        $check = 1;
    }else{
        $check = 0;
    }
    $hide_id = $_POST['hide_id'];

    $sql = "UPDATE admin 
            SET admin_id = '$id' , admin_name = '$name' , admin_username = '$username' , admin_password = '$password' , role = '$role' , status = '$check'
            WHERE admin_id = '$hide_id' ";
    $re = mysqli_query($con,$sql);
    if($re){
        $_SESSION['alert'] = 10;
    }else{
        $_SESSION['alert'] = 11;
    }

    header("Location: ../dataadmin.php");
    exit();

    echo $id.'<br>'.$name.'<br>'.$username.'<br>'.$password.'<br>'.$role.'<br>'.$check.'<br>'.$hide_id;
?>
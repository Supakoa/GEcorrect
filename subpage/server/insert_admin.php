<?php
    // connect server
    require 'server.php';

    // make it easy
    $id = $_POST['admin_id'];
    $name = $_POST['admin_fname']." ".$_POST['admin_lname'];
    $username = $_POST['admin_username'];
    $password = $_POST['admin_password'];
    $role = $_POST['admin_role'];
    // check checkbox
    if(isset($_POST['admin_check'])){
        $check = 1;
    }else{
        $check = 0;
    }

    // insert in to database
    $sql = " INSERT INTO admin ( admin_id , admin_name , admin_username , admin_password , role , status )
            VALUES ( $id , $name , $username , $password , $role , $check ) ";
    $re = mysqli_query($con,$sql);
    if($re){
        $_SESSION['alert'] = 3;
    }else{
        $_SESSION['alert'] = 4;
    }

    // return to dataadmin.php
    header("Location: ../dataadmin.php");
    exit();

    // echo check
    echo $id.'<br>'.$name.'<br>'.$username.'<br>'.$password.'<br>'.$role.'<br>'.$check.'<br>';

?>
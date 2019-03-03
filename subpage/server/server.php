<?php
    $con = mysqli_connect("localhost","root","","ge_exam") or die(mysqli_connect_error());
    // $con = mysqli_connect("localhost","root","P@ssw0rdGE","ge_exam") or die('เชื่อมต่อข้อมูลไม่สำเร็จ'. mysqli_connect_error());
    mysqli_set_charset($con,"utf8");
    session_start();
?>
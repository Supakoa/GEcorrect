<?php
    //connect database
    require 'server.php';

    // make it easy
    $cb = $_GET['del_cb'];
    $sel_del = $_GET['hide_del_select'];
    /** 
     *  hide_del_select
     * 0,null -> ไม่แสดงค่า
     * 1 -> subject
     * 2 -> location 
     * 3 -> admin 
    */

    // traverse all
    // for ($i=0; $i <count($cb) ; $i++) { 
    //     echo $cb[$i].'<br>';
    // }echo $sel_del;

    for($i=0; $i < count($cb); $i++){
        switch ($sel_del) {
            case '1':
                $sql = "DELETE FROM `subject` WHERE `subject_id` = '$cb[$i]' ";
                $header = "Location: ../subject.php";
            break;

            case '2':
                $sql = "DELETE FROM `location_table` WHERE `order` = '$cb[$i]' ";
                $header = "Location: ../location.php";
            break;

            case '3':
                $sql = "DELETE FROM `admin` WHERE `admin_id` = '$cb[$i]' ";
                $header = "Location: ../dataadmin.php";
            break;
        }

        // if have fail exit this now.
        if( !(mysqli_query($con,$sql)) ){
            $_SESSION['alert'] = 13;
            header($header);
            exit();
        }
    }
    // success
    $_SESSION['alert'] = 12;
    header($header);
    exit();
?>
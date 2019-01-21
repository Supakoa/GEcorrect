<?php
    //connect database
    require 'server.php';

    // make it easy
    $cb = $_GET['del_cb'];
    $sel_del = $_GET['hide_del_select'];

    for($i=0; $i < count($cb); $i++){
        switch ($sel_del) {
            case '1':
                $sql = "DELETE FROM subject WHERE subject_id = '$cb[$i]' ";
            break;

            case '2':
                $sql = "DELETE FROM location_table WHERE order = '$cb[$i]' ";
            break;
        }
        // if have fail exit this now.
        if( !(mysqli_query($con,$sql)) ){
            $_SESSION['alert'] = 13;
            header("Location: ../subject.php");
            exit();
        }
    }
    // success
    $_SESSION['alert'] = 12;
    header("Location: ../subject.php");
    exit();
?>
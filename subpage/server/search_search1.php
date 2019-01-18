<?php
    require 'server.php';

    // make it easy
	$_SESSION['search'] = $_POST['value_search'];
    
    header("Location: ../search1.php");

?>
<?php
    // connect DB
    require 'server/server.php';

    // session_destroy();
    if(isset($_POST['submit_btn'])){

        // post name & password
        $username = mysqli_real_escape_string($con,$_POST['username']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        
        // select check database
        $sql = "SELECT * FROM `admin` WHERE `admin_username`='$username' AND `admin_password`='$password' ";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);

        if($row){
            // check admin online
            if( $row['status'] == 1 ){
                $_SESSION['admin_id'] = $row['admin_id'];
                Header("Location: main.php");
                exit();
            }else if($row['status'] == 0){
                $_SESSION['alert'] = 24;
            }
        }else{
            $_SESSION['alert'] = 14;
        }
        Header("Location: index.php");
        exit();
        
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CorrectGE SSRU</title>
    <meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
    <meta name="author" content="Pike Web Development - https://www.pikephp.com">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Switchery css -->
    <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome CSS -->
    <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <!-- sweet alert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>

    <!-- BEGIN CSS for this page -->

    <!-- END CSS for this page -->

</head>

<body class="adminbody">

    <div id="main">

        <img src="" alt="">


        <div class="container-fluid">
            <form action="index.php" method="POST">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h2 class="text-center">Log-In</h2>
                            </div>
                            <div class="card-body">
                                <div class="form-section">
                                    <label for="id">ID : </label>
                                    <input id="id" class="form-control" type="text" name="username" required>
                                    <label for="pass">Password : </label>
                                    <input class="form-control" type="password" name="password" required>
                                    <br>
                                </div>
                                <div class=text-center>
                                    <button class="btn btn-success" name="submit_btn" type="submit">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
            </form>




        </div>
        <!-- END container-fluid -->



        <footer class="footer">

        </footer>

    </div>
    <!-- END main -->

    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/moment.min.js"></script>

    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/plugins/switchery/switchery.min.js"></script>

    <!-- App js -->
    <script src="assets/js/pikeadmin.js"></script>

    <!-- alert all -->
    <?php require '../alert.php'; ?>

    <!-- BEGIN Java Script for this page -->

    <!-- END Java Script for this page -->

</body>

</html>
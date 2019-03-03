<?php
    // connect database 
    require 'server/server.php';
    
    
    // check login
    if( !(isset($_SESSION['admin_id'])) ){
        $_SESSION['alert'] = 2;
        header("Location: ../index.php");
        exit();
    }
    $_SESSION['err_std'][] = "";
    // import student .csv
    if (isset($_POST['upload_btn'])) {
        // set collaction 
        mysqli_set_charset($con,'tis620');
        $i = 0;
        // open file
        $a = $_FILES["File"]["tmp_name"];
        // $file = fopen($a,'r');
        
        if (($handle = fopen("$a", "r")) !== FALSE) {
            $_SESSION['err_std'][] = "<style>table, th, td {border: 1px solid black;border-collapse: collapse;}</style><table style=\"width:100%\" ><thead><th>รหัสนักศึกษา</th><th>ชื่อนาม-สกุล</th></thead><tbody>" ;
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $value = "'".implode("','",$data)."'";
                $q = "INSERT INTO student(`std_id`,`name`) VALUES (". $value .") ";
                $resault = mysqli_query($con,$q);
                if(!$resault){
                    $_SESSION['alert'] = 25;
                    //$arr[] = implode("','",$data);
                     $_SESSION['err_std'][] = "<tr><td>".implode("</td><td>",$data)."</td></tr>";
                }
            }
            $_SESSION['err_std'][] = "</tbody></table>";
            if($_SESSION['alert']!=25){
                $_SESSION['alert'] = 3;
                // $_SESSION['arr_err'] change to array if alert = 25
                $_SESSION['arr_err'] = $arr_err;
            }
            fclose($handle);
            header("Location: imstudent.php");
            exit();
        }
    }
    
    // echo $err ;
// print_r($_SESSION['err_std'])
?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Admin Template-นำเข้าข้อมูลนักศึกษา</title>
        <meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
        <meta name="author" content="Pike Web Development - https://www.pikephp.com">

        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- Bootstrap CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

        <!-- Font Awesome CSS -->
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

        <!-- Custom CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <!-- BEGIN CSS for this page -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />
        <!-- END CSS for this page -->

        <!-- sweet alert2 -->
	    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
        
    </head>

    <body class="adminbody">
        <div id="main">

            <?php require 'menu/navmenu.php' ?>


            <div class="content-page">

                <!-- content-page -->
                <div class="content">

                    <!-- content -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4 class="text-center">นำเข้าข้อมูลนักศึกษา</h4>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="imstudent.php" method="post" enctype="multipart/form-data">
                                            <div class="row ">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-4 text-center">
                                                    <input class="form-control btn" type="file" name ="File" accept=".csv" required>
                                                </div>
                                                <div class="col-lg-4"></div>
                                            </div><br>
                                            <div class="text-center">
                                                <button class="btn btn-success btn-sm" name="upload_btn" type="submit">Upload</button>
                                            </div>
                                            <div class="row ">
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-4"></div>
                                                <div class="col-lg-4 text-right"><br>
                                                    <p>* .csv<br>* ข้อมูลนักศึกษาที่นำเข้า <br>- รหัสนักศึกษา <br>- ชื่อนักศึกษา<br></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end content-->

            </div>
            <!-- END content-page -->

            <footer class="footer"></footer>
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

        <!-- App js -->
        <script src="assets/js/pikeadmin.js"></script>

        <!-- BEGIN Java Script for this page -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

        <!-- Counter-Up-->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

        <script>
            $(document).ready(function () {
                // data-tables
                $('#example1').DataTable();

            });
        </script>

        <!-- alert all -->
	    <?php require '../alert.php'; ?>

        <!-- END Java Script for this page -->

    </body>
</html>
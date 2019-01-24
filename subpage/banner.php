<?php
	// connect database 
    require 'server/server.php';

    // check login
    if( !(isset($_SESSION['admin_id'])) ){
        $_SESSION['alert'] = 2;
        header("Location: ../index.php");
        exit();
    }

   if(isset($_POST['uptobase'])){
    $b1 =$_SESSION['name_banner'];
    $b2 = $_SESSION['tmp_banner'];
    $a = "UPDATE `web_show_time` SET `banner`= '$b2' ";
    
    unset($_SESSION['check_banner']); 
    if ($r_a = mysqli_query($con,$a)) {
        $_SESSION['alert'] = 3 ;
    } else {
        $_SESSION['alert'] = 4 ;
	}
	
    // header("Location: banner.php");
    // exit();
}
elseif(isset($_POST['go_banner'])){
    $ext = pathinfo(basename($_FILES["banner"]["name"]), PATHINFO_EXTENSION);
    $new_taget_name = 'banner_' . uniqid() . "." . $ext;
    $target_path = "banner/";
    $upload_path = $target_path . $new_taget_name;
    $uploadOk = 1;

    $imageFileType = strtolower(pathinfo($new_taget_name, PATHINFO_EXTENSION));

    if ($_FILES["banner"]["size"] > 60000000) {
        echo "Sorry, your file is too large.";
        $_SESSION['alert'] = 15 ;
        header("Location: banner.php");
            exit();
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg"&&$imageFileType != "png") {
        echo "Sorry, only JPG , PNG files are allowed.";
        $_SESSION['alert'] = 17 ;
        header("Location: banner.php");
            exit();
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        $_SESSION['alert'] = 4 ;
        header("Location: banner.php");
            exit();
    }

    else {
        if (move_uploaded_file($_FILES["banner"]["tmp_name"], $upload_path)) {
            // echo 'Move success.';
            $_SESSION['alert'] = 3 ;
            

        }else {
            // echo 'Move fail';
            $_SESSION['alert'] = 4 ;
        }
    }

    $banner = $_FILES["banner"]["name"];
    $b = $new_taget_name;
    $_SESSION['name_banner'] = $banner ;
    $_SESSION['tmp_banner'] = $b ;
    $_SESSION['check_banner'] = 1;
    // header("Location: ../banner.php");
}




	// what would i do
	$q_banner = "SELECT * FROM `web_show_time` ";
    $result_banner = mysqli_query($con,$q_banner);
    $row_banner = mysqli_fetch_array($result_banner);
	if(!isset($_SESSION['check_banner'])){
		$_SESSION['tmp_banner'] = $row_banner['banner'];
		
	}
	// show banner from database
	$sql = "SELECT footer FROM web_show_time";
	$re = mysqli_query($con,$sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Admin Template- แบรนเนอร์</title>
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

				<div class="container-fluid">
					<!--container-fluid -->
					<div class="card mb-3">
						<!-- card -->
						<div class="card-header">
							<h4 class="text-center">ตั้งค่าแบรนเนอร์</h4>
						</div>
						<div class="card-body">
							<div class="card">
								<div class="card-body">
									<div class="container">
										<!-- container -->
										<div class="row">
											<div class="col-lg-4"></div>
											<div class="col-lg-4 text-center">
												<form method="POST" action="banner.php" enctype="multipart/form-data" >
													<input class="btn btn-md form-control" type="file" name="banner" required />
													<input type="hidden" name="go_banner">
													<br><br><button type="submit" class="btn btn-primary btn-sm" name="submit">Upload</button>
												</form>
											</div>
											<div class="col-lg-4"></div>
										</div>

									</div><br>
									<!--end container -->
									<div class="container-fluid text-center">
										<!-- display-->
										<div class="jumbotron">
											<img src="banner/<?php echo $_SESSION['tmp_banner']?>" class="img-fluid" alt="Responsive image">
										</div>
										<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">ตกลง</button>
										<!-- Modal -->
										<div class="modal fade" id="myModal" role="dialog">
											<form action="banner.php" method="post">
											<input type="hidden" name="uptobase">
												<div class="modal-dialog modal-sm">
													<div class="modal-content">
														<div class="modal-header">
															<h4>ยืนยัน ?</h4>
															<button type="button" class="close" data-dismiss="modal">&times;</button>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-default btn-sm" data-dismiss="modal" href="">Close</button>
															
															<button type="submit" class="btn btn-success btn-sm" name="submit">Yes</button>
														</div>
													</div>
												</div>
											</form>
										</div>
										<!--Modal-->

									</div>
									<!--end display -->
								</div>
							</div>
						</div>
						<!--end card-->
					</div>
				</div><!-- END container-fluid -->
			</div>
			<!--end content-->
		</div>
		<!-- END content-page -->

		<footer class="footer">

		</footer>

	</div>
	<!-- END main -->

	<!-- alert all -->
	<?php require '../alert.php'; ?>

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

	<!-- END Java Script for this page -->

	

</body>

</html>
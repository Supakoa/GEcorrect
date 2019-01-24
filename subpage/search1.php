<?php
	// connect database 
    require 'server/server.php';

    // check login
    if( !(isset($_SESSION['amdin_id'])) ){
        $_SESSION['alert'] = 2;
        header("Location: ../index.php");
        exit();
    }

	// search
	if(!isset($_SESSION['search'])){
		$sql = "SELECT * FROM student WHERE 0 ";
		$re = mysqli_query($con,$sql);
	}else{
		$search = $_SESSION['search'];
		$sql = "SELECT * FROM student WHERE std_id LIKE '$search%' ";
    	$re = mysqli_query($con,$sql);
	}

	// insert new student
	if(isset($_POST['insert_btn'])){
		unset($_POST['insert_btn']);
		if( $_POST['id_std'] != ' ' AND $_POST['std_fname'] != ' ' AND $_POST['std_lname'] != ' ' ){

			// make it easy
			$id = $_POST['id_std'];
			$name = $_POST['std_fname']." ".$_POST['std_lname'];

			// check it have in database .if have show error
			$sql = "SELECT * FROM `student` WHERE `std_id` = '$id' ";
			$re = mysqli_query($con,$sql);
			if( !(mysqli_fetch_array(mysqli_query($con,"SELECT * FROM `student` WHERE `std_id` = '$id' ")))){

				if( mysqli_query($con,"INSERT INTO `student` (`std_id`, `name`) VALUES ('$id','$name') ") ){
					$_SESSION['alert'] = 3; 
					header("Location: search1.php");
					exit();
				}else{
					$_SESSION['alert'] = 4; 
					header("Location: search1.php");
					exit();
				}

			}else{
				$_SESSION['alert'] = 19;
				header("Location: search1.php");
				exit();
			}

		}else{
			$_SESSION['alert'] = 4; 
			header("Location: search1.php");
			exit();
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Admin Template-ค้นหาทั่วไป</title>
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

	<!-- w3.css -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

	<!-- w3.js -->
	<!-- <script src="https://www.w3schools.com/lib/w3.js"></script> -->

	<!-- sweet alert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>

</head>

<body class="adminbody" ng-app="">

	<div id="main">

		<?php require 'menu/navmenu.php'; ?>


		<div class="content-page">
			<!-- start content-page-->
			<div class="content">
				<!--content-->
				<div class="card mb-3">
					<div class="card-header">
						<h4 class="text-center">ค้นหาทั่วไป</h4>
					</div>

					<div class="card-body">
						<div class="container">
							<div class="form-group">
								
								<form action="server/search_search1.php" method="post">
									<div class="row">
										<!-- w3.js filter -->
										<!-- <input oninput="w3.filterHTML('#search1', '.item', this.value)" class="w3-input" placeholder="Search for names.."> -->
										<div class="col-sm-4"></div>
										<div class="col-sm-4"><input id="id" class="form-control" type="text" name='value_search' placeholder="รหัสนักศึกษา"  required></div>
										<div class="col-sm-4"><input class="btn btn-md btn-success" type="submit" value="Submit" name="btn_search"></div>
									</div>
								</form>
							</div>
						</div>
					</div>

					<div class="card-body">
						<div class="table-responsive">
							<!-- table -->
							<table id="search1" class="table table-bordered">
								<thead>
									<tr>
										<div class="text-center">
											<a role="button" href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
												<i class="fa fa-plus"></i> เพิ่มข้อมูล
											</a>
											<a role="button" href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_select"><i
												 class="fa fa-minus"></i> ลบที่เลือก</a>

										</div>

										<!-- Modal -->
										<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="loca" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="loca">เพิ่มข้อมูล</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="container">
																<div class="form-group">
																	<div class="row">
																		<div class="col-md-7">
																			<label for="id1">รหัสนักศึกษา</label>
																			<input form="form_2" id="id1" name="id_std" class="form-control" type="text" maxlength="11" required>
																		</div>
																		<div class="col-md-6">
																			<label for="fname1">ชื่อ(คำนำหน้าตามด้วยชื่อ)</label>
																			<input form="form_2" id="fname1" name="std_fname" class="form-control" type="text" required>
																		</div>
																		<div class="col-md-6">
																			<label for="lname1">นามสกุล</label>
																			<input form="form_2" id="lname1" name="std_lname" class="form-control" type="text" required>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<form action="search1.php" method="post" id="form_2">
																<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
																<button type="submit" name="insert_btn" class="btn btn-primary btn-sm">Save</button>
															</form>
														</div>
													</div>
												</div>
										</div>
										<!--end modal -->

										<!-- Small modal -->
										<div class="modal fade bd-example-modal-sm" id="del_select" tabindex="-1" role="dialog" aria-hidden="true">
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">ลบข้อมูล</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>

													<div class="modal-footer">
														<form action="server/del_select.php" method="get" id="form_1">
															<button type="submit" form="form_1" class="btn btn-danger btn-sm">Yes</button>
															<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
														</form>
													</div>
												</div>
											</div>
										</div>
										<!--end modal -->
										<th><input type="checkbox" ng-model="all"> CheckAll</th>
										<th></th>
										<th>รหัสนักศึกษา</th>
										<th>ชื่อ-นามสกุล</th>
									</tr>
								</thead>

								<input form="form_1" type="hidden" name="hide_del_select" value="4">

								<tbody>
									<!-- loop for search -->
									<?php
									while( $r = mysqli_fetch_array($re) ){
								?>
									<tr class="item">

										<td class="text-center">
											<div class="form-check">
												<input form="form_1" type="checkbox" name="del_cb[]" value="<?php echo $r['std_id']; ?>" class="form-check-input" ng-checked="all">
											</div>
										</td>

										<td>

											<div class="text-center">
												<a role="button" href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit">
													<i class="fa fa-pencil"></i>
												</a>
												<a role="button" href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm"><i
													 class="fa fa-minus"></i></a>

											</div>


											<!-- Modal 1-->
											<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="loca" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="loca">แก้ไข</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="container">
																<div class="form-group">
																	<div class="row">
																		<div class="col-md-7">
																			<label for="id">รหัสนักศึกษา</label>
																			<input id="id" class="form-control" type="text">
																		</div>
																		<div class="col-md-6">
																			<label for="fname">ชื่อ</label>
																			<input id="fname" class="form-control" type="text">
																		</div>
																		<div class="col-md-6">
																			<label for="lname">นามสกุล</label>
																			<input id="lname" class="form-control" type="text">
																		</div>
																	</div>
																</div>
															</div>

														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
															<button type="button" class="btn btn-primary btn-sm">Save</button>
														</div>
													</div>
												</div>
											</div>
											<!--end modal 1-->

											<!-- Small modal 3-->
											<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-sm">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">ลบข้อมูล</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>

														<div class="modal-footer">
															<button type="button" class="btn btn-danger btn-sm">Yes</button>
															<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
														</div>
													</div>
												</div>
											</div>
											<!--end modal 3-->

										</td>
										<td>
											<?php echo $r['std_id']; ?>
										</td>
										<td>
											<?php echo $r['name'];?>
										</td>
									</tr>
									<!-- end of php loop -->
									<?php } ?>
								</tbody>
							</table>
						</div>
						<!--end table -->
					</div>
				</div>

			</div>
			<!--end content-->
		</div>
		<!-- END content-page -->

		<footer class="footer">

		</footer>

	</div>
	<!-- END main -->

	<div>
		<!--modal-->


	</div>

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
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

	<!-- Counter-Up-->
	<script src="assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

	<script>
		$(document).ready(function () {
			// data-tables
			$('#search1').DataTable();

		});
	</script>
	<!-- END Java Script for this page -->

	<?php unset($_SESSION['search']); ?>

</body>

</html>
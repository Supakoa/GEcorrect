<?php
	// connect database 
    require 'server/server.php';

    // check login
    if( !(isset($_SESSION['admin_id'])) ){
        $_SESSION['alert'] = 2;
        header("Location: ../index.php");
        exit();
    }

	// insert new location
	if(isset($_POST['new_btn'])){
		// make it easy
		$location_name = $_POST['new_location_name'];
		$location_url = $_POST['new_location_url'];

		// check it have in database
		$sql = " SELECT * FROM loaction_table WHERE name_location='$location_name' ";
		$re = mysqli_query($con,$sql);
		$row = mysqli_fetch_array($re);

		// if have : call back and show error.
		if($row > 0){
			$_SESSION['alert'] = 20;
			header("Location: location.php");
			exit();
		} else{
			// push value to database
			$sql = " INSERT INTO location_table (name_location,url_location) VALUE ('$location_name','$location_url') ";
			$re = mysqli_query($con,$sql);

			// check it not have error
			if($re){
				$_SESSION['alert'] = 3;
				
			} else{
				$_SESSION['alert'] = 4;
				
			}
			header("Location: location.php");
			exit();
		}
	}

	//edit location
	if(isset($_POST['edit_btn'])){
		// make it easy
		$location_name = $_POST['edit_location_name'];
		$location_url = $_POST['edit_location_url'];
		$order = $_POST['order'];

		// update into database
		$sql = "UPDATE `location_table` SET `name_location` = '$location_name' , `url_location` = '$location_url' WHERE  `order` = '$order' ";
		$re = mysqli_query($con,$sql);

		// check can update into datbase
		if($re){
			$_SESSION['alert'] = 10;
		} else{
			$_SESSION['alert'] = 11;
		}
		// exit
		header("Location: location.php");
		exit();
		echo $location_name."<br>".$location_url."<br>".$order."<br>";
	}

	// delete location
	if(isset($_POST['submit_del'])){
		// make it easy
		$a = $_POST['del_id'];
		
		$del_sql = "DELETE FROM `location_table` WHERE `order` = '$a' ";
		$re_del = mysqli_query($con,$del_sql);

		if($re_del){
			$_SESSION['alert'] = 12;
		}	else{
			$_SESSION['alert'] = 13;
		}
		// exit
		header("Location: location.php");
		exit();
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Admin Template-สถานที่สอบ</title>
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

<body class="adminbody" ng-app="">

	<div id="main">

		<?php require 'menu/navmenu.php' ?>

		<div class="content-page">
			<!-- content-page -->

			<div class="content">
				<!-- content -->

				<div class="container-fluid">
					<!--container-fluid -->
					<div class="card mb-3">
						<div class="card-header">
							<h4 class="text-center">
								สถานที่สอบ
							</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive-xl">
								<!-- <form action="server/del_select.php" id="cb_del" method="get"> -->
									<table id="locat" class="table table-bordered">

										<input form="form_1" type="hidden" name="hide_del_select" value="2">
										<thead>
											<tr>
												<div class="text-center">
													<a role="button" href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addloc">
														<i class="fa fa-plus"></i> เพิ่มข้อมูล
													</a>
													<a role="button" href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_select_btn"><i
														 class="fa fa-minus"></i> ลบที่เลือก</a>

												</div>

												<th><input type="checkbox" ng-model="all"> </th>
												<th>Action </th>
												<th>สถานที่</th>
												<th >URL</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$sql = " SELECT * FROM location_table ";
											$re = mysqli_query($con,$sql);
											while($row1 = mysqli_fetch_array($re)){
										?>
											<tr>
												<td class="text-center">
													<!-- <form action="server/del_select.php" id="form_1" method="get"> -->
														<div class="form-check">
															<input form="form_1"type="checkbox" ng-checked="all" name="del_cb[]" value="<?php echo $row1['order'] ?>" class="form-check-input">
														</div>
													<!-- </form> -->
												</td>
												<td>

													<!-- Button trigger modal -->
													<div class="text-center">
														<a role="button" href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editloc_<?php echo $row1['order'] ?>">
															<i class="fa fa-pencil"></i>
														</a>
														<a role="button" href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_<?php echo $row1['order']; ?>"><i
															 class="fa fa-minus"></i></a>
													</div>

													<!-- Modal -->
													<div class="modal fade" id="editloc_<?php echo $row1['order'] ?>" tabindex="-1" role="dialog"
													 aria-labelledby="locat" aria-hidden="true">
														<form action="location.php" method="post">
															<div class="modal-dialog" role="document">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="locat">แก้ไข
																			<?php echo $row1['name_location']; ?>
																		</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>

																	<!-- hidden value -->
																	<input type="hidden" name="order" value="<?php echo $row1['order']; ?>">

																	<div class="modal-body">
																		<label for="loc1">สถานที่สอบ</label>
																		<input class="form-control" type="text" name="edit_location_name" value="<?php echo $row1['name_location']; ?>"
																		 required>

																		<label for="url-loc1">URL</label>
																		<input class="form-control" id="url-loc1" type="text" name="edit_location_url" value="<?php echo $row1['url_location']; ?>"
																		 required>
																	</div>

																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
																		<button type="submit" name="edit_btn" class="btn btn-primary btn-sm">Save changes</button>
																	</div>
																</div>
															</div>
														</form>
													</div>
													<!--end modal 2-->

													<!-- Small modal 3-->
													<div class="modal fade bd-example-modal-sm" id="delete_<?php echo $row1['order']; ?>" tabindex="-1" role="dialog"
													 aria-hidden="true">
														<form action="location.php" method="post">
															<div class="modal-dialog modal-sm">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title">ลบข้อมูล
																			<hr>
																			<?php echo $row1['name_location']; ?>
																		</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<input type="hidden" name="del_id" value="<?php echo $row1['order']; ?>">
																	<div class="modal-footer">
																		<button type="submit" name="submit_del" class="btn btn-danger btn-sm">Yes</button>
																		<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
																	</div>
																</div>
															</div>
														</form>
													</div>
													<!--end modal 3-->

												</td>
												<td>
													<?php echo $row1['name_location']; ?>
												</td>
												<td>
													<?php echo $row1['url_location']; ?>
												</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
								<!-- </form> -->
							</div>
						</div>
					</div>
				</div><!-- END container-fluid -->
			</div>
			<!--end content-->
		</div>
		<!-- END content-page -->

		<footer class="footer">

			<!-- modal all -->

			<!-- Modal -->
			<div class="modal fade" id="addloc" tabindex="-1" role="dialog" aria-labelledby="loca" aria-hidden="true">
				<form action="location.php" method="post">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="loca">เพิ่มข้อมูล</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body">
								<label for="loc0">สถานที่สอบ</label>
								<input class="form-control" type="text" name="new_location_name">
								<label for="url-loc">URL</label>
								<input class="form-control" id="url-loc" type="text" name="new_location_url">
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary btn-sm" name="new_btn">Save</button>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!--end modal 1-->

			<!-- Small modal -->
			<div class="modal fade bd-example-modal-sm" id="del_select_btn" tabindex="-1" role="dialog" aria-hidden="true">
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
								<button type="submit" form="form_1"  class="btn btn-danger btn-sm">Yes</button>
								<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
							</form>	
						</div>
					</div>
				</div>
			</div>
			<!--end modal -->

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
			$('#locat').DataTable();
		});

		function fun_del_cb() {
			// document.forms["cb_del"].submit();
			$("#cb_del").submit();
		}
	</script>


	<!-- END Java Script for this page -->

	<!-- alert all -->
	<?php require '../alert.php'; ?>

</body>

</html>
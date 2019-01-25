<?php
	// connect database 
	require 'server/server.php';

	// check login
	if( !(isset($_SESSION['admin_id'])) ){
		$_SESSION['alert'] = 2;
		header("Location: ../index.php");
		exit();
	}
	
	// insert new subject
	if(isset($_POST['new_btn'])){
		if( $_POST['new_sub_name'] != '' && $_POST['new_sub_id'] != '' ){
			// make it easy
			$sub_id = $_POST['new_sub_id'];
			$sub_name = $_POST['new_sub_name'];
	
			// check id is have in database
			$sql = "SELECT * FROM subject WHERE subject_id = '$sub_id' ";
			$re = mysqli_query($con,$sql);

			// have in database : don't do that.
			if(mysqli_fetch_array($re) > 0){
				$_SESSION['alert'] = 19;
				header("Location: subject.php");
				exit();
			}else{
				//insert in to database
				$sql = " INSERT INTO subject(subject_id,subject_name) VALUE ('$sub_id','$sub_name') ";
				$re = mysqli_query($con,$sql);

				// check complete
				if($re){
					$_SESSION['alert'] = 3;
				} else{
					$_SESSION['alert'] = 4;
				}
			}
		}
		header("Location: subject.php");
		unset($_POST['new_btn']);
		exit();
	}

	// edit subject
	if(isset($_POST['edit_btn'])){
		// make it easy
		$sub_id = $_POST['edit_sub_id'];
		$sub_name = $_POST['edit_sub_name'];
		$origin_id = $_POST['original_id'];

		// update into database
		$sql = "UPDATE subject SET subject_id = '$sub_id' , subject_name = '$sub_name' WHERE subject_id = '$origin_id' ";
		$re = mysqli_query($con,$sql);

		// check can update to database
		if($re){
			$_SESSION['alert'] = 10;
		} else{
			$_SESSION['alert'] = 11;
		}
		header("Location: subject.php");
		unset($_POST['edit_btn']);
		exit();
	}

	// delete subject in database
	if(isset($_POST['delete_btn'])){
		// make it easy
		$delete_id = $_POST['delete_id'];

		$sql = "DELETE FROM subject WHERE subject_id = '$delete_id' ";
		$re = mysqli_query($con,$sql);

		// check update success
		if($re){
			$_SESSION['alert'] = 12;
			header("Location: subject.php");
			exit();
		} else{
			$_SESSION['alert'] = 13;
			header("Location: subject.php?error=problem_delete");
			exit();
		}
		unset($_POST['delete_btn']);
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Admin Template-วิชาที่สอบ</title>
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

	<!-- jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
					<div class="card md-3">
						<div class="card-header">
							<h4 class="text-center">วิชาที่สอบ</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive" style="overflow-x:auto;">
								<form action="server/del_select.php" id="cb_del" method="GET">
									<input type="hidden" name="hide_del_select" value="1">
									<table id="subject" class="text-center table table-bordered" style="table-layout:auto;">
										<thead>
											<tr>
												<!-- Button trigger modal edit -->
												<div class="text-center">
													<a role="button" href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
														<i class="fa fa-plus"></i> เพิ่มข้อมูล
													</a>
													<a role="button" href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#mod_del_sel"><i
														 class="fa fa-minus"></i> ลบที่เลือก</a>

												</div>

												<th class="text-center"><label class="checkbox-inline" id="chb"><input id="chb" type="checkbox"  ng-model="all"> Check All</label></th>
												<th>Action</th>
												<th>รหัสวิชา</th>
												<th>ชื่อวิชา</th>
											</tr>
										</thead>
										<tbody>

											<!-- php -->
											<?php 
											$sql = " SELECT * FROM subject ";
											$re = mysqli_query($con,$sql);
											while($row = mysqli_fetch_array($re)){
										?>
											<tr>

												<td class="text-center">
													<div class="form-check">
														<input type="checkbox" name="del_cb[]" value="<?php echo $row['subject_id'] ?>" class="form-check-input"
														 ng-checked="all">
													</div>
												</td>

												<td>
													<!-- Button trigger modal edit -->
													<div class="text-center">
														<a role="button" href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_<?php echo $row['subject_id']; ?>">
															<i class="fa fa-pencil"></i>
														</a>
														<a role="button" href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_<?php echo $row['subject_id']; ?>"><i
															 class="fa fa-minus"></i></a>
													</div>

												</td>
												<td>
													<?php echo $row['subject_id']; ?>
												</td>
												<td>
													<?php echo $row['subject_name']; ?>
												</td>

											</tr>

											<!-- Modal edit -->
											<div class="modal fade" id="edit_<?php echo $row['subject_id']; ?>" tabindex="-1" role="dialog"
											 aria-labelledby="exampleModalLabel" aria-hidden="true">
												<form action="subject.php" method="post">
													<div class="modal-dialog" role="document">
														<div class="modal-content">

															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel">แก้ไข</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>

															<!-- hidden tag show orginal id -->
															<input type="hidden" name="original_id" value="<?php echo $row['subject_id']; ?>">

															<div class="modal-body">
																<label for="id-subj1">รหัสวิชา</label>
																<input class="form-control" type="text" name="edit_sub_id" maxlength="7" value="<?php echo $row['subject_id']; ?>"
																 required>
																<label for="subject1">วิชา</label>
																<input class="form-control" id="id-subj1" type="text" name="edit_sub_name" value="<?php echo $row['subject_name']; ?>"
																 required>
															</div>

															<div class="modal-footer">
																<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-primary btn-sm" name="edit_btn">Save changes</button>
															</div>

														</div>
													</div>
												</form>
											</div>
											<!--end modal edit -->

											<!-- Small modal delete some one -->
											<div class="modal fade bd-example-modal-sm " id="delete_<?php echo $row['subject_id']; ?>" tabindex="-1"
											 role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-sm">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">ลบข้อมูล
																<?php echo $row['subject_id']; ?>
															</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>

														<form action="" method="post">
															<div class="modal-footer">
																<input type="hidden" name="delete_id" value="<?php echo $row['subject_id']; ?>">
																<button type="submit" class="btn btn-danger btn-sm" name="delete_btn">Yes</button>
																<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
															</div>
														</form>

													</div>
												</div>
											</div>
											<!--end modal delete some one -->

											<?php } ?>

										</tbody>
									</table>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- END container-fluid -->
			</div>

		</div>
		<!-- END content-page -->

		<footer class="footer">

			<!-- all modal -->

			<!-- Modal insert -->
			<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<form action="subject.php" method="post">
					<div class="modal-dialog" role="document">
						<div class="modal-content">

							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body">
								<label for="id-subj">รหัสวิชา</label>
								<input class="form-control" id="id-subj" type="text" name="new_sub_id" maxlength="7" required>
								<label for="subject0">วิชา</label>
								<input class="form-control" type="text" name="new_sub_name" required>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary btn-sm" name="new_btn">Save</button>
							</div>

						</div>
					</div>
				</form>
			</div>
			<!--end modal insert-->

			<!-- Small modal delete on checkbox -->
			<div class="modal fade bd-example-modal-sm" id="mod_del_sel" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">ลบข้อมูล</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="modal-footer">
							<button type="button" onclick="fun_del_cb()" class="btn btn-danger btn-sm">Yes</button>
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
						</div>
					</div>
				</div>
			</div>
			<!--end modal delete on checkbox -->

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
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	
	<!-- Counter-Up-->
	<script src="assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

	<script>
		$(document).ready(function () {
			// data-tables
			$('#subject').DataTable();
		});

		function fun_del_cb() {
			// document.forms["cb_del"].submit();
			$("#cb_del").submit();
		}
	</script>


	<!-- END Java Script for this page -->

</body>

</html>
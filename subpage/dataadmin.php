<?php
	// connect database 
	require 'server/server.php';

	// check login
	if( !(isset($_SESSION['admin_id'])) ){
		$_SESSION['alert'] = 2;
		header("Location: ../index.php");
		exit();
	}

	// show in table
	$sql = "SELECT * FROM admin";
	$re = mysqli_query($con,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Admin Template-ข้อมูลแอดมิน</title>
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
							<h3 class="text-center">ตารางข้อมูพนักงาน</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="admin" class="table table-bordered">
									<thead>
										<tr>
											<div class="text-center">
												<a role="button" href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#adddata">
													<i class="fa fa-plus"></i> เพิ่มข้อมูล
												</a>
												<a role="button" href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_select_btn"><i
													 class="fa fa-minus"></i> ลบที่เลือก</a>

											</div>

											<!-- Modal -->
											<div class="modal fade" id="adddata" tabindex="-1" role="dialog" aria-labelledby="loca" aria-hidden="true">
												<form action="server/insert_admin.php" method="post">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="loca">เพิ่มข้อมูล</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<label for="admin0">รหัสพนักงาน</label>
																<input class="form-control" id="admin0" type="text" name="admin_id">
																<div class="row">
																	<div class="form-gruop col-lg-6">
																		<label for="fname">ชื่อ</label>
																		<input class="form-control" id="fname" type="text" name="admin_fname">
																	</div>
																	<div class="form-gruop col-lg-6">
																		<label for="lname">นามสกุล</label>
																		<input class="form-control" id="lname" type="text" name="admin_lname">
																	</div>
																</div>
																<div class="row">
																	<div class="form-gruop col-lg-6">
																		<label for="user">Username</label>
																		<input class="form-control" id="user" type="text" name="admin_username">
																	</div>
																	<div class="form-gruop col-lg-6">
																		<label for="pass">Password</label>
																		<input class="form-control" id="pass" type="text" name="admin_password">
																	</div>
																</div>
																<div class="row">
																	<div class="form-group col-lg-6">
																		<label for="inputState">ระดับ</label>
																		<select id="inputState" class="form-control" name="admin_role">
																			<option selected>Choose...</option>
																			<option>Admin</option>
																			<option>ผู้ดูแลระบบ</option>
																			<option>เจ้าหน้าที่ทั่วไป</option>
																		</select>
																	</div>
																	<div class="form-gruop col-lg-6 ">
																		<br>
																		<div class="form-check">
																			<label class="form-check-label">
																				<input type="checkbox" class="form-check-input" name="admin_check">
																				Active
																			</label><br>
																		</div>
																	</div>
																</div>

															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
																<button type="sunmit" class="btn btn-primary btn-sm">Save</button>
															</div>
														</div>
													</div>
												</form>
											</div>
											<!--end modal 1-->


											<!-- Small modal delete select -->
											<div class="modal fade bd-example-modal-sm" id="del_select_btn" tabindex="-1" role="dialog" aria-hidden="true">
												<div class="modal-dialog modal-sm">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">ลบข้อมูล
															</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>

														<div class="modal-footer">
															<form action="server/del_select.php" id="form_1" method="get">
																<button type="submit" form="form_1" class="btn btn-danger btn-sm">Yes</button>
																<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
															</form>
														</div>
													</div>
												</div>
											</div>

											<!--end modal -->
											<th><input type="checkbox" ng-model="all"></th>
											<th></th>
											<th>รหัสพนักงาน</th>
											<th>ชื่อ</th>
											<th>Username</th>
											<th>Password</th>
											<th>ระดับ</th>
											<th>active</th>
										</tr>
									</thead>

									<!-- hidden sent to server/del_select.php -->
									<input form="form_1" type="hidden" name="hide_del_select" value="3">

									<tbody>
										<!-- php loop -->
										<?php
											while( $r = mysqli_fetch_array($re) ){
										?>
										<tr>
											<td class="text-center">
												<div class="form-check">
													<input form="form_1" name="del_cb[]" value="<?php echo $r['admin_id']; ?>" ng-checked="all" type="checkbox" class="form-check-input">
												</div>
											</td>
											<td>
												<!-- Button trigger modal -->
												<div class="text-center">
													<a role="button" href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_<?php echo $r['admin_id']; ?>">
														<i class="fa fa-pencil"></i>
													</a>
													<a role="button" href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#del_<?php echo $r['admin_id']; ?>"><i
														 class="fa fa-minus"></i></a>
												</div>



												<!-- Modal -->
												<div class="modal fade" id="edit_<?php echo $r['admin_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
												 aria-hidden="true">
													<form action="server/update_admin.php" method="post">
														<input type="hidden" name="hide_id" value="<?php echo $r['admin_id']; ?>">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">แก้ไข</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<label for="admin1">รหัสพนักงาน</label>
																	<input class="form-control" name="admin_id" type="text" value="<?php echo $r['admin_id']; ?>">
																	<div class="row">
																		<div class="form-gruop col-lg-12">
																			<label for="fname1">ชื่อ</label>
																			<input class="form-control" name="admin_name" type="text" value="<?php echo $r['admin_name']; ?>">
																		</div>
																	</div>
																	<div class="row">
																		<div class="form-gruop col-lg-6">
																			<label for="user1">Username</label>
																			<input class="form-control" name="admin_username" type="text" value="<?php echo $r['admin_username']; ?>">
																		</div>
																		<div class="form-gruop col-lg-6">
																			<label for="pass1">Password</label>
																			<input class="form-control" name="admin_password" type="text" value="<?php echo $r['admin_password']; ?>">
																		</div>
																	</div>
																	<div class="row">
																		<div class="form-group col-lg-6">
																			<label for="inputState1">ระดับ</label>
																			<select id="inputState1" name="admin_role" class="form-control">
																				<option selected>
																					<?php echo $r['role'] ?>
																				</option>
																				<?php
																				$role = $r['role'];
																				$sql = "SELECT * FROM role WHERE role != '$role' ";
																				$re_role = mysqli_query($con,$sql);
																				while($r_role = mysqli_fetch_array($re_role)){
																					echo '<option>'.$r_role['role'].'</option>';
																				}
																			?>
																			</select>
																		</div>
																		<div class="form-gruop col-lg-6 ">
																			<br>
																			<div class="form-check">
																				<label class="form-check-label">
																					<?php 
																					if($r['status'] == 1){
																						echo '<input type="checkbox" name="admin_check" class="form-check-input" checked>';
																					}else{
																						echo '<input type="checkbox" name="admin_check" class="form-check-input">';
																					}
																				?>
																					Active
																				</label><br>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
																	<button type="submit" class="btn btn-primary btn-sm">Save changes</button>
																</div>
															</div>
														</div>
													</form>
												</div>
												<!--end modal 2-->


												<!-- Small modal -->
												<div class="modal fade bd-example-modal-sm" id="del_<?php echo $r['admin_id']; ?>" tabindex="-1" role="dialog"
												 aria-hidden="true">
													<form action="server/del_admin.php" method="post">
														<div class="modal-dialog modal-sm">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title">ลบข้อมูล
																		<?php echo $r['admin_id']; ?>
																	</h5>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<input type="hidden" name="del_id" value="<?php echo $r['admin_id']; ?>">
																<div class="modal-footer">
																	<button type="submit" class="btn btn-danger btn-sm">Yes</button>
																	<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
																</div>
															</div>
														</div>
													</form>
												</div>
												<!--end modal 3-->
											</td>
											<td>
												<?php echo $r['admin_id']; ?>
											</td>
											<td>
												<?php echo $r['admin_name']; ?>
											</td>
											<td>
												<?php echo $r['admin_username']; ?>
											</td>
											<td>
												<?php echo $r['admin_password']; ?>
											</td>
											<td>
												<?php echo $r['role']; ?>
											</td>
											<td>
												<?php echo $r['status']; ?>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
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
			$('#admin').DataTable();


		});
	</script>
	<!-- END Java Script for this page -->

	<!-- alert all -->
	<?php require '../alert.php'; ?>

</body>

</html>
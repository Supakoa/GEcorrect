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
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
		<!-- END CSS for this page -->
		
</head>

<body class="adminbody">

<div id="main">

	<?php require 'menu/navmenu.php'; ?>


    <div class="content-page"><!-- start content-page-->
		<div class="content"><!--content-->
			<div class="card mb-3">
				<div class="card-header">
					<h4 class="text-center">ค้นหาทั่วไป</h4>
				</div>
				<div class="card-body">
					<div class="table-responsive"><!-- table -->
						<table id="search1" class="table table-bordered">
							<thead> 
								<tr>
												<div class="text-center">
													<a role="button" href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
														<i class="fa fa-plus"></i> เพิ่มข้อมูล
													</a>
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
																				<input id="id1" class="form-control" type="text" >
																			</div>
																			<div class="col-md-6">
																				<label for="fname1">ชื่อ</label>
																				<input id="fname1" class="form-control" type="text">
																			</div>
																			<div class="col-md-6">
																				<label for="lname1">นามสกุล</label>
																				<input id="lname1" class="form-control" type="text">
																			</div>
																			<div class="col-md-6">
																				<label for="user1">Username</label>
																				<input id="user1" class="form-control" type="text">
																			</div>
																			<div class="col-md-6">
																				<label for="pas1s">Password</label>
																				<input id="pass1" class="form-control" type="text">
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
												</div><!--end modal -->
									<th></th>
									<th>รหัสนักศึกษา</th>
									<th>ชื่อ-นามสกุล</th>
									<th>Username</th>
									<th>Password</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center">
													<a role="button" href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit">
														<i class="fa fa-pencil"></i>
													</a>
												
												<!-- Modal 1-->
												<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="loca" aria-hidden="true">
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
																				<label for="id">รหัสนักศึกษา</label>
																				<input id="id" class="form-control" type="text" >
																			</div>
																			<div class="col-md-6">
																				<label for="fname">ชื่อ</label>
																				<input id="fname" class="form-control" type="text">
																			</div>
																			<div class="col-md-6">
																				<label for="lname">นามสกุล</label>
																				<input id="lname" class="form-control" type="text">
																			</div>
																			<div class="col-md-6">
																				<label for="user">Username</label>
																				<input id="user" class="form-control" type="text">
																			</div>
																			<div class="col-md-6">
																				<label for="pass">Password</label>
																				<input id="pass" class="form-control" type="text">
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
												</div><!--end modal 1-->

												<!-- Small modal 3-->
												<a role="button" href="#"  class="btn btn-danger btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fa fa-minus"></i></a>

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
												</div><!--end modal 3-->
									</td>
									<td>59122519023</td>
									<td>นายศุภกิจ กิจนะบำรุงศักดิ์</td>
									<td>s59122519023</td>
									<td>ssru59122519023</td>
								</tr>
							</tbody>
						</table>
					</div><!--end table -->
				</div>
			</div>
		
		</div><!--end content-->
    </div>
	<!-- END content-page -->
    
	<footer class="footer">
		
	</footer>

</div>
<!-- END main -->

<div><!--modal-->


</div>

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
		$(document).ready(function() {
			// data-tables
			$('#search1').DataTable();
					
			
		} );		
	</script>
	
	
<!-- END Java Script for this page -->

</body>
</html>
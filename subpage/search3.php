<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Admin Template-ค้นหาบุคคล</title>
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
			<div class="card mb-3"><!--card 1-->
				<div class="card-header">
					<h4 class="text-center">ค้นหาบุคคล</h4>
				</div>
				<div class="card-body">
					<div class="contain"><!-- filter -->
						<div class="row">
							<div class="col-lg-6">
								<div class="card">
									<div class="card-body">
										<div class="row"><!-- row 1 -->
											<div class="col-md-6">
												<label for="subject">วิชา</label>
												<select name="" id="subject" class="form-control select2">
														<option>GEL1101</option>
														<option>GRL1102</option>
														<option>GEL2203</option>
													</select>
											</div>
											<div class="col-md-6">
												<label for="group">กลุ่มเรียน</label>
													<select name="" id="group" class="form-control select2">
														<option>001</option>
														<option>002</option>
														<option>003</option>
													</select>
											</div>
												<div class="col-md-2">
													<label for="term">เทอม</label>
													<select id="term" class="form-control select2">
															<option>1</option>
															<option>2</option>
													</select>
												</div>
												<div class="col-md-1">
													<br><br><center><label style="text-align:center;">/</label></center>
												</div>
												<div class="col-md-3">
													<label for="year">ปีการศึกษา</label>
														<select id="year" class="form-control select2">
															<option>2561</option>
															<option>2560</option>
															<option>2559</option>
														</select>
												</div>
											<div class="col-md-6">
												<label for="time">เวลา</label>
												<select name="" id="time" class="form-control select2">
													<option>08.00-11.00</option>
													<option>011.00-14.00</option>
													<option>04.00-17.00</option>
												</select>
											</div>
											<div class="col-md-6">
												<label for="room">ห้อง</label>
													<select name="" id="room" class="form-control select2">
														<option>1701</option>
														<option>1702</option>
														<option>3111</option>
													</select>
											</div>
											
										</div><!--end row 1 -->
										<br><button class="btn btn-sm btn-info" type="submit">submit</button>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="card">
									<div class="card-body">
										<div class="row"><!-- row 2 -->
											<div class="col-md-6">
												<div class="form-group">
													<label for="id">รหัสนักศึกษา</label>
													<input id="id" class="form-control" type="text">
												</div>
											</div>
											<div class="col-md-6"></div>
												
										</div><!--end row 2 -->
										<button class="btn btn-sm btn-info" type="submit">submit</button>
									</div>
								</div>
							</div>
						</div><br>
					</div><!--end filter -->
				</div>
			</div><!--end card 1-->
			<div class="card"><!--card 2-->
				<div class="card-body">
					<div class="table-responsive">
						<table id="search3" class="table table-bordered">
							<thead>
								
												<div class="text-center">
													<a role="button" href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
														<i class="fa fa-plus"></i> เพิ่มข้อมูล
													</a>
													<a role="button" href="#"  class="btn btn-danger btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fa fa-minus"></i> ลบที่เลือก</a>
															
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
																			<div class="col-md-6">
																				<label for="id1">รหัสนักศึกษา</label>
																				<input id="id1" class="form-control" type="text" >
																			</div>
																			<div class="col-md-6">
																				<label for="room0">ห้อง</label>
																				<input id="room0" class="form-control" type="text">
																			</div>
																			<div class="col-md-6">
																				<label for="detail">Detail</label>
																				<input id="detail" class="form-control" type="text">
																			</div>
																			<div class="col-md-6">
																				<label for="not">หมายเหตุ</label>
																				<input id="not" class="form-control" type="text">
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
															
															<!-- Small modal -->
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
															</div><!--end modal -->
								<tr>
									<th></th>
									<th></th>
									<th>รหัสนักศึกษา</th>
									<th>ห้อง</th>
									<th>วิชา</th>
									<th>กลุ่มเรียน</th>
									<th>ที่นั่ง</th>
									<th>วันที่</th>
									<th>เวลา</th>
									<th>ปีการศึกษา</th>
									<th>ประเภท</th>
									<th><span class="text-danger">*</span>หมายเหตุ</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="text-center">
										<div class="form-check">
											<input type="checkbox" class="form-check-input">
										</div>
									</td>
									<td>
												
												<div class="text-center">
													<a role="button" href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit">
														<i class="fa fa-pencil"></i>
													</a>
													<a role="button" href="#"  class="btn btn-danger btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fa fa-minus"></i></a>
													
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
																			<div class="col-md-6">
																				<label for="id0">รหัสนักศึกษา</label>
																				<input id="id10" class="form-control" type="text" >
																			</div>
																			<div class="col-md-6">
																				<label for="room01">ห้อง</label>
																				<input id="room01" class="form-control" type="text">
																			</div>
																			<div class="col-md-6">
																				<label for="detail0">วิชา</label>
																				<input id="detail0" class="form-control" type="text">
																			</div>
																			<div class="col-md-6">
																				<label for="detail0">ที่นั่งสอบ</label>
																				<input id="detail0" class="form-control" type="text">
																			</div>
																			<div class="col-md-6">
																				<label for="not0">หมายเหตุ</label>
																				<input id="not0" class="form-control" type="text">
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

												<!-- Small modal 2-->
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
												</div><!--end modal 2-->
									</td>
									<td>59122519023</td>
									<td>1701</td>
									<td>ge2011</td>
									<td>001</td>
									<td>23</td>
									<td>03-09-2562</td>
									<td>08.00-11.00</td>
									<td>2561</td>
									<td>ปลายภาค</td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div><!--end card 2-->
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
			$('#search3').DataTable();
			$('.select2').select2();
			
		} );		
	</script>
	
	
<!-- END Java Script for this page -->

</body>
</html>
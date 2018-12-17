<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Admin Template-เอกสารที่เผยแพร่และเว็บไซต์ที่เกี่ยวข้อง</title>
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

	<?php require 'menu/navmenu.php' ?>


    <div class="content-page"><!-- content-page -->

		<div class="content"><!-- content -->

			<div class="container-fluid"><!--container-fluid -->
					<div class="card mb-3">
						<div class="card-header">
							<h3 class="text-center">เอกสารที่เผยแพร่และเว็บไซต์ที่เกี่ยวข้อง</h3>
						</div>
						<div class="card-body">
							<div class="card"><!-- card table 1 -->
								<div class="card-body">
										<h4 class="text-center">เว็บไซต์ที่เกี่ยวข้อง</h4>
									<div class="table-responsive">
										<table class="table"><!-- table 1 -->
											<thead>
												<tr>
													<th>ลำดับ</th>
													<th>ข้อความ</th>
													<th>ที่อยู่</th>
													<th>แสดงหน้าเว็บ</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1.</td>
													<td><input class="form-control" type="text"></td>
													<td><input class="form-control" type="text"></td>
													<td class="text-center"><input type="checkbox" class="form-checkbox"></td>
												</tr>
												<tr>
													<td>2.</td>
													<td><input class="form-control" type="text"></td>
													<td><input class="form-control" type="text"></td>
													<td class="text-center"><input type="checkbox" class="form-checkbox"></td>
												</tr>
												<tr>
													<td>3.</td>
													<td><input class="form-control" type="text"></td>
													<td><input class="form-control" type="text"></td>
													<td class="text-center"><input type="checkbox" class="form-checkbox"></td>
												</tr>
												<tr>
													<td>4.</td>
													<td><input class="form-control" type="text"></td>
													<td><input class="form-control" type="text"></td>
													<td class="text-center"><input type="checkbox" class="form-checkbox"></td>
												</tr>
											</tbody>
										</table><br>
											<div class="text-center">
												<a href="#custom-modal" class="btn btn-success m-r-5 m-b-10 btn-sm" data-target="#up0" data-toggle="modal">Update</a>
											
											<!-- Modal -->
													<div class="modal fade bd-example-modal-sm" id="up0" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
													<div class="modal-dialog " role="document">
														<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel2">ยืนยัน</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<p>เมื่อกดยืนยันแล้วข้อความจะถูกอัพไปยังหน้าเว็บไซต์.</p>
														</div>
														<div class="modal-footer text-center">
															<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
															<button type="button" class="btn btn-primary btn-sm">Yes</button>
														</div>
														</div>
													</div>
													</div>
												</div>
									</div><!--end table 1 --> 
								</div>
							</div><!--end card table 1 -->

							<hr>
							<div class="card"><!-- card table 2 -->
								<div class="card-body">
										<h4 class="text-center">เอกสารที่เผยแพร่</h4>
									<div class="table-responsive">
									<table class="table"><!-- table 2 -->
											<thead>
												<tr>
													<th>ลำดับ</th>
													<th>ข้อความ</th>
													<th>ชื่อไฟล์</th>
													<th>เพิ่มไฟล์ PDF</th>
													<th>แสดงหน้าเว็บ</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>1.</td>
													<td><input class="form-control" type="text"></td>
													<td></td>
													<td><input class="form-control btn" type="file"></td>
													<td class="text-center"><input type="checkbox" class="form-checkbox"></td>
												</tr>
												<tr>
													<td>2.</td>
													<td><input class="form-control" type="text"></td>
													<td></td>
													<td><input class="form-control btn" type="file"></td>
													<td class="text-center"><input type="checkbox" class="form-checkbox"></td>
												</tr>
												<tr>
													<td>3.</td>
													<td><input class="form-control" type="text"></td>
													<td></td>
													<td><input class="form-control btn" type="file"></td>
													<td class="text-center"><input type="checkbox" class="form-checkbox"></td>
												</tr>
												<tr>
													<td>4.</td>
													<td><input class="form-control" type="text"></td>
													<td></td>
													<td><input class="form-control btn"  type="file"></td>
													<td class="text-center"><input type="checkbox" class="form-checkbox"></td>
												</tr>
											</tbody>
										</table><br>
											<div class="text-center">
												<!-- Small modal -->
												<a role="button" href="#"  class="btn btn-success btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm">Upload</a>

													<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
													<div class="modal-dialog modal-sm">
														<div class="modal-content">
															<div class="modal-header">
															<h5 class="modal-title">ยืนยันการอัพข้อมูล</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
															</div>
															<div class="modal-body">
																<p>เมื่อกดยืนยันแล้วข้อความจะถูกอัพไปยังหน้าเว็บไซต์.</p>
															</div>
															<div class="modal-footer text-center">
															<button type="button" class="btn btn-danger btn-sm">Yes</button>
															<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
														</div>
														</div>
													</div>
													</div><!--end modal 3-->
											</div>
									</div><!--end table 2 -->
								</div>
							</div><!--end card table 2 -->
							<hr>
						</div>
					</div>
					<div class="card mb-3">
						<div class="card-header">
							<h3 class="text-center">Footer</h3>
						</div>
						<div class="card-body">
							<div class="container-fluid">
								<form action="">
									<div class="form-section text-center">
										<label for="foot">Text</label>
										<textarea class="form-control" name="" id="foot" col="10" rows="10"></textarea>
									</div><br>
										<div class="text-center">
										<a href="#custom-modal" class="btn btn-success m-r-5 m-b-10 btn-sm" data-target="#up2" data-toggle="modal">Update</a>
									
									<!-- Modal -->
											<div class="modal fade" id="up2" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel2">ยืนยัน</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
												<p>เมื่อกดยืนยันแล้วข้อความจะถูกอัพไปยังหน้าเว็บไซต์.</p>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
													<button type="button" class="btn btn-primary btn-sm">Yes</button>
												</div>
												</div>
											</div>
											</div>
										</div>
								</form>
							</div>
						</div>
					</div>
            </div><!-- END container-fluid -->
		</div><!--end content-->
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

	<!-- Counter-Up-->
	<script src="assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="assets/plugins/counterup/jquery.counterup.min.js"></script>			

	<script>
		$(document).ready(function() {
			// data-tables
			$('#example1').DataTable();
					
			
		} );		
	</script>
	
<!-- END Java Script for this page -->

</body>
</html>
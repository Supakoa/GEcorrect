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
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
		<!-- END CSS for this page -->
		
</head>

<body class="adminbody">

<div id="main">

	<?php require 'menu/navmenu.php' ?>


    <div class="content-page"><!-- content-page -->

		<div class="content"><!-- content -->

			<div class="container-fluid"><!--container-fluid -->
					<div class="card md-3">
						<div class="card-header">
							<h4>วิชาที่สอบ</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>
												<a href="#custom-modal" class="btn btn-primary btn-sm" data-target="#customModal" data-toggle="modal"><i class="fa fa-plus"></i></a>
														
														<!-- Modal -->
												<div class="modal fade custom-modal" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="exampleModalLabel2">เพิ่มข้อมูลวิชา</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																<div class="form-section container-fluid">
																		<div class="container">
																			<div class="row">
																				<div class="col-lg-6">
																					<p>ชื่อ : </p><input class="form-control" type="text" name="fname" required>
																				</div>
																				<div class="col-lg-6">
																					<p>นามสกุล : </p><input class="form-control" type="text" name="lname" required>
																				</div>
																				</div>
																		</div><br>
																		
																</div>
																	<!--General information-->
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																	<button type="button" class="btn btn-primary">Save changes</button>
																</div>
														</div>
													</div>
												</div>
											</th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
            </div>
			<!-- END container-fluid -->
		</div>

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
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
							<h4 class="text-center">
								สถานที่สอบ
							</h4>
						</div>
						<div class="card-body">
						<div class="table-responsive">
								<table id="locat" class="table table-bordered">
									<thead>
										<tr>
												<div class="text-center">
													<a role="button" href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addloc">
														<i class="fa fa-plus"></i> เพิ่มข้อมูล
													</a>
												</div>
												
												<!-- Modal -->
												<div class="modal fade" id="addloc" tabindex="-1" role="dialog" aria-labelledby="loca" aria-hidden="true">
													<div class="modal-dialog" role="document">
														<div class="modal-content">
															<div class="modal-header">
																<h5 class="modal-title" id="loca">เพิ่มข้อมูล</h5>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<div class="modal-body">
																		<label for="loc">ชื่อสถานที่</label>
																		<input class="form-control" id="loc" type="text">
																		<label for="url-loc">URL</label>
																		<input class="form-control" id="url-loc" type="text">
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
																<button type="button" class="btn btn-primary btn-sm">Save</button>
															</div>
														</div>
													</div>
												</div><!--end modal 1-->
											<th></th>
											<th>ชื่อสถานที่</th>
											<th>URL</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center">
														<!-- Button trigger modal -->
																
														<a role="button" href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editloc">
																	<i class="fa fa-pencil"></i>
																	</a>
																
															
															<!-- Modal -->
																<div class="modal fade" id="editloc" tabindex="-1" role="dialog" aria-labelledby="locat" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="locat">แก้ไข</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																	<label for="loc1">ชื่อสถานที่</label>
																	<input class="form-control" id="loc1" type="text">
																	<label for="url-loc1">URL</label>
																	<input class="form-control" id="url-loc1" type="text">

																	</div>
																	<div class="modal-footer">
																		<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
																		<button type="button" class="btn btn-primary btn-sm">Save changes</button>
																	</div>
																	</div>
																</div>
															</div><!--end modal 2-->

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
											<td>เป็นไรก็ได้</td>
											<td>www.nunoi.com</td>
										</tr>
									</tbody>
								</table>
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
			$('#locat').DataTable();
			
		} );		
	</script>
	
	
<!-- END Java Script for this page -->

</body>
</html>
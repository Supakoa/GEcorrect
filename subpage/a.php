<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Admin Template-ข้อมูลนักศึกษา</title>
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

			<form action="">
				<div class="card"><!--strat card-->
					<div class="card-header text-center">
						<h3><i class="fa fa-search"></i> Search</h3>
					</div>	
					<div class="card-body">								
						<div class="container">
							<div class="container">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
										<label for="example1">
										ปีการศึกษา :
										</label>
										<select class="form-control select2"  name="year">    
											<option value="AR">Argentina</option>
											<option value="AU">Australia</option>
											<option value="AT">Austria</option>
										</select>
									</div>
									<div class="col-lg-6">
										<label for="example1">
										ภาคการศึกษา :
										</label>
										<select class="form-control select2"  name="term">    
											<option value="AR">Argentina</option>
											<option value="AU">Australia</option>
											<option value="AT">Austria</option>
										</select>
									</div>
									<div class="col-lg-6">
										<label for="example1">
										การสอบ :
										</label>
										<select class="form-control select2"  name="test">    
											<option value="AR">Argentina</option>
											<option value="AU">Australia</option>
											<option value="AT">Austria</option>
										</select>
									</div>
									<div class="col-lg-6">
										<label for="example1">
										วิชาที่สอบ :
										</label>
										<select class="form-control select2"  name="date">    
											<option value="AR">Argentina</option>
											<option value="AU">Australia</option>
											<option value="AT">Austria</option>
										</select>
									</div>
								</div>
							</div>
							
							<div class="col-lg-12 text-center"><br><br>
								<a role="button" class="btn btn-success btn-lg" href="#"><i class="fa fa-search"></i></a>
							</div>
						</div>
					</div>
				</div><!-- end card-->							
			</form>

			<div class="card mb-3">
					<div class="card-header">
						<h3 class="text-center">ตารางข้อมูพนักงาน</h3>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example1" class="table table-bordered">
								<thead>
									<tr>
										<th class="text-center">
											<a href="#custom-modal" class="btn btn-primary " data-target="#customModal" data-toggle="modal"><i class="fa fa-plus"></i></a>
													
													<!-- Modal -->
											<div class="modal fade custom-modal" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
												<div class="modal-dialog" role="document">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="exampleModalLabel2">เพิ่มข้อมูลพนักงาน</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<div class="form-section container-fluid">
                                                                    <div class="container">
                                                                        <p>รหัสพนักงาน : </p><input class="form-control" type="text" name="user_id" required>
                                                                    </div><br>
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
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <p>Username : </p><input class="form-control" type="text" name="username" required>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <p>Password : </p><input class="form-control" type="text" name="password" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            </div>
                                                                <!--General information-->
                                                                            <div class="form-section container" >
                                                                                <p>ระดับ : </p>	 <select class="form-control" name="role"  >
                                                                                        			<option>เจ้าหน้าที่ทั่วไป</option>
                                                                                				</select><br>
                                                                                <p>Status : </p>
                                                                                <input  type="radio" name="status" value="1" ><span> Online </span>
                                                                                <input  type="radio" name="status" value="0" checked><span> Offline </span>
                                                                            </div>

                                                                    
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																<button type="button" class="btn btn-primary">Save changes</button>
															</div>
													</div>
												</div>
											</div>
										</th><!--modol-->
										<th>รหัสพนักงาน</th>
										<th>ชื่อ</th>
										<th>นามสกุล</th>
										<th>Username</th>
										<th>Password</th>
										<th>ระดับ</th>
										<th>Active</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
										
										<div class="container">
                                                <div class="row">
                                                    <div class="col-lg-6">
														<a href="#custom-modal" class="btn btn-warning " data-target="#edit" data-toggle="modal"><i class="fa fa-pencil"></i></a>
													
													<!-- Modal -->
														<div class="modal fade custom-modal" id="edit" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">	
                                                            <div class="modal-dialog modal-lg">
																<div class="modal-content">
																	<div class="modal-header">
																		<h5 class="modal-title" id="exampleModalLabel2">เพิ่มข้อมูลพนักงาน</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																		</button>
																	</div>
																	<div class="modal-body">
																		<div class="form-section container-fluid">
                                                                    		<div class="container">
                                                                        		<p>รหัสพนักงาน : </p><input class="form-control" type="text" name="user_id" required>
                                                                    		</div><br>
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
                                                                    	<div class="container">
                                                                        	<div class="row">
                                                                            	<div class="col-lg-6">
                                                                                	<p>Username : </p><input class="form-control" type="text" name="username" required>
                                                                            	</div>
                                                                            	<div class="col-lg-6">
                                                                                	<p>Password : </p><input class="form-control" type="text" name="password" required>
                                                                            	</div>
                                                                        	</div>
                                                                    	</div>
                                                            		</div>
                                                                    <div class="form-section container" >
                                                                        <p>ระดับ : </p>	 <select class="form-control" name="role"  >
                                                                                        	<option>เจ้าหน้าที่ทั่วไป</option>
                                                                                		</select><br>
                                                                        <p>Status : </p>
                                                                            <input  type="radio" name="status" value="1" ><span> Online </span>
                                                                            <input  type="radio" name="status" value="0" checked><span> Offline </span>
                                                                    </div><!--General information-->
                                                                </div>
                                                            	<div class="modal-footer">
                                                            		<button type="submit" class="btn btn-info">update</button>
                                                                </div>
                                                            </div>
                                                        
                                                    	</div>
                                                	</div>
                                                
													<div class="col-lg-6">
														<a href="#custom-modal" class="btn btn-danger " data-target="#del" data-toggle="modal"><i class="fa fa-minus"></i></a><!-- Modal -->
															<div class="modal fade custom-modal" id="del" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">	
																<div class="modal-dialog modal-sm">
																	<div class="modal-content">
																		<div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal">&times;</button>
																		</div>
																		<div class="modal-body">
																				<h3 class="text-center">ยืนยันการลบข้อมูล</h3>
																		</div>
																		<div class="modal-footer">
																			<div style="text-align: center;">
																				<a type="button" href="deleteadmindata.php?id=<?php echo $row['admin_id'] ?>" class="btn btn-danger">Yes</a>
																				<button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
													</div>
                                            	</div>
                                        </div>
										
										</td> <!-- modol -->
										<td></td>
                                        <td>kk</td>
                                        <td>aa</td>
                                        <td>dd</td>
                                        <td>ss</td>
                                        <td>ff</td>
                                        <td>gg</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			
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
					
			// counter-up
			$('.counter').counterUp({
				delay: 10,
				time: 600
			});
		} );		
	</script>
	
	<script>
	var ctx1 = document.getElementById("lineChart").getContext('2d');
	var lineChart = new Chart(ctx1, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			datasets: [{
					label: 'Dataset 1',
					backgroundColor: '#3EB9DC',
					data: [10, 14, 6, 7, 13, 9, 13, 16, 11, 8, 12, 9] 
				}, {
					label: 'Dataset 2',
					backgroundColor: '#EBEFF3',
					data: [12, 14, 6, 7, 13, 6, 13, 16, 10, 8, 11, 12]
				}]
				
		},
		options: {
						tooltips: {
							mode: 'index',
							intersect: false
						},
						responsive: true,
						scales: {
							xAxes: [{
								stacked: true,
							}],
							yAxes: [{
								stacked: true
							}]
						}
					}
	});


	var ctx2 = document.getElementById("pieChart").getContext('2d');
	var pieChart = new Chart(ctx2, {
		type: 'pie',
		data: {
				datasets: [{
					data: [12, 19, 3, 5, 2, 3],
					backgroundColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					label: 'Dataset 1'
				}],
				labels: [
					"Red",
					"Orange",
					"Yellow",
					"Green",
					"Blue"
				]
			},
			options: {
				responsive: true
			}
	 
	});


	var ctx3 = document.getElementById("doughnutChart").getContext('2d');
	var doughnutChart = new Chart(ctx3, {
		type: 'doughnut',
		data: {
				datasets: [{
					data: [12, 19, 3, 5, 2, 3],
					backgroundColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					label: 'Dataset 1'
				}],
				labels: [
					"Red",
					"Orange",
					"Yellow",
					"Green",
					"Blue"
				]
			},
			options: {
				responsive: true
			}
	 
	});
	</script>
<!-- END Java Script for this page -->

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Admin Template</title>
		<meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
		<meta name="author" content="Pike Web Development - https://www.pikephp.com">

		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">

		<!-- Bootstrap CSS -->
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		
		<!-- Font Awesome CSS -->
		<link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		
		<!-- Custom CSS -->
		<link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
		
		<!-- BEGIN CSS for this page -->
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
		<!-- END CSS for this page -->
		
</head>

<body class="adminbody">

<div id="main">

<?php require 'menu/navmenu.php' ?>


    <div class="content-page">
	
		<!-- Start content -->
        <div class="content">
            
			<div class="container-fluid">
					<div class="card mb-3">
						<div class="card-header text-center">
							<h3 class="text-info">ผู้ดูแลระบบ</h3>
						</div>
						<div class="card-body">
							<div class="table-responsive">
                                <table id="example1" class="table table-striped table-bordered table responsive" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>
                                            <button type="button" class="btn btn-info fa fa-plus" data-toggle="modal" data-target="#myModal"></button>
                                                    <!-- Modal -->
                                            <div class="modal fade" id="myModal" role="dialog">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="text-center">
                                                                <h2>เพิ่มข้อมูลพนักงาน</h2>
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <form role="form" action="" method="POST">
															<div class="modal-body"><!--add-->
																<div class="form-section" >
																	
																		<label for="id">รหัสพนักงาน : </label>
																		<input class="form-control" id="id" type="text" name="user_id" required>
																	<br>
																	<div class="row">
																		<div class="col-md-6">
																			<label for="fn">ชื่อ : </label>
																			<input class="form-control" id="fn" type="text" name="fname" required>
																		</div>
																		<div class="col-md-6">
																			<label for="ln">นามสกุล : </label>
																			<input class="form-control" id="ln" type="text" name="lname" required>
																		</div>
																	</div><br>
																		<div class="form-section">
																			<div class="row">
																				<div class="col-lg-6">
																					<label for="nam">Username : </label>
																					<input class="form-control" id="nam" type="text" name="username" required>
																				</div>
																				<div class="col-lg-6">
																					<label for="pas">Password : </label>
																					<input class="form-control" id="pas" type="text" name="password" required>
																				</div>
																			</div>
																		</div>
																	</div>
																	<!--General information-->
																
																		<div class="form-section">
																			<label for="rol">ระดับ : </label>
																			<select id="rol" class="form-control" name="role"  >
																							<option>เจ้าหน้าที่ทั่วไป</option>
																						</select><br>
																			
																			<label for="sta">Status : </label>
																			<div id="sta" class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="on">
																				<label class="custom-control-label" for="on">Online</label><br>
																			</div>
																			<div  class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="of">
																				<label class="custom-control-label" for="of">Offline</label>
																			</div>
																		</div>
																	</div>
																	<div class="text-center">
																		<button type="submit" class="btn btn-info">save</button>
																	</div><br>
																		
															</div><!--end add-->
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        	</th>
                                            <th>รหัสพนักงาน</th>
                                            <th>ชื่อ</th>
                                            <th>นามสกุล</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>ระดับ</th>
                                            <th>Active</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr>
                                            <td>
                                            	<div class="container">
                                                	<div class="row">
                                                    	<div class="col-lg-6">
                                                        	<button type="button" class="btn btn-warning  fa fa-pencil" data-toggle="modal" data-target="#update_admin_data<?php echo $row['admin_id'] ?>"></button>
                                                        <!-- Modal -->
                                                        	<div class="modal fade" id="update_admin_data<?php echo $row['admin_id'] ?>" role="dialog">
                                                            	<div class="modal-dialog modal-lg">
                                                                	<div class="modal-content">
                                                                <form action="updateadmindata.php?id=<?php echo $row['admin_id'] ?>" method="POST">
                                                                	<div class="modal-header">
                                                                    	<div class="text-center">
                                                                        	<h2>แก้ไขข้อมูลพนักงาน</h2>
                                                                    	</div>
                                                                    		<button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                	</div>
                                                                <div class="modal-body">
																<div class="form-section" >
																		<label for="id1">รหัสพนักงาน : </label>
																		<input class="form-control" id="id1" type="text" name="user_id" required>
																	<br>
																	<div class="row">
																		<div class="col-lg-6">
																			<label for="fn1">ชื่อ : </label>
																			<input class="form-control" id="fn1" type="text" name="fname" required>
																		</div>
																		<div class="col-lg-6">
																			<label for="ln1">นามสกุล : </label>
																			<input class="form-control" id="ln1" type="text" name="lname" required>
																		</div>
																</div><br>
																		<div class="form-section">
																			<div class="row">
																				<div class="col-lg-6">
																					<label for="nam1">Username : </label>
																					<input class="form-control" id="nam1" type="text" name="username" required>
																				</div>
																				<div class="col-lg-6">
																					<label for="pas1">Password : </label>
																					<input class="form-control" id="pas1" type="text" name="password" required>
																				</div>
																			</div>
																		</div>
																	</div>
																	<!--General information-->
																	
																		<div class="form-section ">
																			<label for="rol1">ระดับ : </label>
																			<select id="rol1" class="form-control" name="role"  >
																							<option>เจ้าหน้าที่ทั่วไป</option>
																						</select><br>
																						<label for="sta2">Status : </label>
																			<div id="sta2" class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="on">
																				<label class="custom-control-label" for="on">Online</label><br>
																			</div>
																			<div  class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="of">
																				<label class="custom-control-label" for="of">Offline</label>
																			</div>
																		</div><!--General information-->
                                                   
                                                            <div class="text-center">
                                                            	<button type="submit" class="btn btn-info">update</button>
                                                            </div> <br>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>    
                                    </div>
                                    <div class="col-lg-6">
                                        <button type="button" class="btn btn-danger  fas fa-minus" data-toggle="modal" data-target="#del_admin_id<?php echo $row['admin_id'] ?>"></button>
                                            <div class="modal fade" id="del_admin_id<?php echo $row['admin_id'] ?>" role="dialog">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                			<h3 class="text-center">ยืนยันการลบข้อมูล</h3>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="text-center">
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
							</td>
                            <td><?php echo $row['admin_id']; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                        	<td><?php echo $row['admin_username']; ?></td>
                            <td><?php echo base64_decode($row['admin_password']); ?></td>
                            <td><?php echo $row['admin_role']; ?></td>
                            <td><?php echo $row['admin_status']; ?></td>
                                <?php
									}
                                ?>
                        </tr>
                    </table>
				</div>
			</div>
						<div class="row">
							
						</div>			

            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
    
	<footer class="footer">
		<span class="text-right">
		Copyright <a target="_blank" href="#">Your Website</a>
		</span>
		<span class="float-right">
		Powered by <a target="_blank" href="#"><b>Pike Admin</b></a>
		</span>
	</footer>

</div>
<!-- END main -->

<script src="../assets/js/modernizr.min.js"></script>
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/moment.min.js"></script>
		
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<script src="../assets/js/detect.js"></script>
<script src="../assets/js/fastclick.js"></script>
<script src="../assets/js/jquery.blockUI.js"></script>
<script src="../assets/js/jquery.nicescroll.js"></script>

<!-- App js -->
<script src="../assets/js/pikeadmin.js"></script>

<!-- BEGIN Java Script for this page -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

	<!-- Counter-Up-->
	<script src="../assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="../assets/plugins/counterup/jquery.counterup.min.js"></script>			

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
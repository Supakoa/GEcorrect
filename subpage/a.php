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
			<form action="">
				<div class="card mb-3"><!--strat card-->
					<div class="card-header text-center">
						<h2><i class="fa fa-search"></i> Search</h2>
					</div>	
					<div class="card-body">								
						<div class="row">
							<div class="col-lg-6">
								<div class="col-xl-4">
									<label for="1">
									ปีการศึกษา :
									</label>
									<select id="1" class="form-control select2"  name="year">    
										<option value="AR">Argentina</option>
										<option value="AU">Australia</option>
										<option value="AT">Austria</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="col-xl-4">
									<label for="2">
									ภาคการศึกษา :
									</label>
									<select id="2" class="form-control select2"  name="year">    
										<option value="AR">Argentina</option>
										<option value="AU">Australia</option>
										<option value="AT">Austria</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="col-md-4">
									<label for="3">
									การสอบ :
									</label>
									<select id="3" class="form-control select2"  name="year">    
										<option value="AR">Argentina</option>
										<option value="AU">Australia</option>
										<option value="AT">Austria</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="col-md-4">
									<label for="4">
									วิชาที่สอบ :
									</label>
									<select id="4" class="form-control select2"  name="year">    
										<option value="AR">Argentina</option>
										<option value="AU">Australia</option>
										<option value="AT">Austria</option>
									</select>
								</div>
							</div>
							
							<div class="col-lg-12 text-center"><br><br>
								<a role="button" class="btn btn-success btn-lg" href="#"><i class="fa fa-search"></i></a>
							</div>
						</div>
					</div>
				</div><!-- end card-->							
				</form>
			</div>
				<div class="container-fluid"><!-- table -->
					<div class="card mb-3">
						<div class="card-header text-center">
							<h3>ข้อมูลนักศึกษา</h3>
						</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="example1" class="table table-bordered table-hover display">
								<thead>
									<tr>
									<th>
										<div class="container"><!-- Trigger the modal with a button -->
										<button type="button" class="btn btn-info btn-sm fa fa-plus" data-toggle="modal" data-target="#myModal"></button>
										</div>
										<!-- Modal -->
										<div class="modal fade" id="myModal" role="dialog">
											<div class="modal-dialog modal-lg">
											<div class="modal-content">
												<form  role="form" action="insertform.php" method="POST">
												<div class="modal-header ">
													<h3>กรอกข้อมูล นักศึกษา</h3>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>
												<div class="modal-body">
													<div  class="form-section" >
														<h3>ข้อมูลทั่วไป</h3><br>
															<label for="id">รหัสนักศึกษา : </label>
															<input id="id" class="form-control" type="text" name="user_id" required>
															<label for="ti">คำนำหน้า : </label>
															<input id="ti" class="form-control" type="text" name="title" required>
															<label for="fn">ชื่อ : </label>
															<input id="fn" class="form-control" type="text" name="fname" required>
															<label for="ln">นามสกุล : </label>
															<input id="ln" class="form-control" type="text" name="lname" required>
															
													<br>
													</div>
													<div class="form-section">
														<h3>ข้อมูลการสอบ</h3><br>
														<label for="ye">ปีการศึกษา : </label>
														<input  id="ye" class="form-control" type="text" name="year" required>
														<label for="ter">ภาคการศึกษา : </label>
														<select id="ter" class="form-control" name="term" required>
																				<option disabled selected value="">--------เลือกภาคเรียน--------</option>
																				<option value="1">ภาคเรียนที่ 1</option>
																				<option value="2">ภาคเรียนที่ 2</option>
																				<option value="3">ภาคเรียนที่ 3</option>
																			</select>
													<label for="ty">การสอบ : </label>
													<select id="ty" class="form-control" name="type" required>
																				<option disabled selected value="">--------เลือกรูปแบบ--------</option>
																				<option>กลางภาค</option>
																				<option>ปลายภาค</option>
																				<option>แก้ไขผลการเรียน(I)</option>
																				<option>อื่นๆ...</option>
																	</select>

													<label for="aa">วิชาที่สอบ : </label>
															<select class="form-control" id="aa" name="sub" onchange="getSelectValue();" required>
																	<option disabled selected value="" >----------------เลือกรายวิชา--------------------</option>
																	<?php while ($row_sub = mysqli_fetch_array($re_sub_2)) { ?>
																		<option value="<?php echo $row_sub['sub_id']?>"><?php echo $row_sub['sub_id'] . " " . $row_sub['id_name'] ?></option>
																	<?php 
																} ?>
															</select>
														<label for="dat">วันที่สอบ  : (1 ม.ค. 2561) </label>
														<input id="dat" class="form-control" type="text" name="date" required>
														<label for="seat">ลำดับที่นั่งสอบ : </label>
														<input id="seat" class="form-control" type="text" name="seat" required>
													
														<label for="tim">เวลาสอบ : </label>
														<div id="tim" class="row form-section">
															<div class="col-lg-6">
															<label for="tim1">เวลาเริ่ม : </label> 
															<input id="tim1" class="form-control" type="time" name="time1"></div required>
															<div class="col-lg-6">
															<label for="tim2">เวลาสิ้นสุด :</label>
															<input id="tim2" class="form-control" type="time" name="time2"></div required>
														</div>
													<label for="plac">สถานที่สอบ : </label>
													<select id="plac" class="form-control" name="place" required>
																			<option disabled selected>เลือกรายวิชา</option>
																			<?php while ($row_location = mysqli_fetch_array($re_location)) { ?>
																				<option value="<?php echo $row_location['name_location'] ?>"><?php echo $row_location['name_location'] ?></option>
																			<?php 
																		} ?>
																		</select>

													<label for="too">สอบด้วยอุปกรณ์ : </label>
													<select id="too" class="form-control" name="tool"required>
																			<option>Tablet</option>
																			<option>Computer</option>
																		</select>
													<label for="commen">หมายเหตุ : </label>
													<textarea id="commen" class="form-control" rows="3" name="comment"></textarea>
												</div>
												<br><br>
													<button  type="submit" class="btn btn-info pull-block form-control" value="save" >save</button>

												</div>
											</form>
											</div>
										</div>
										</div>
										<!--Modal-->

									</th>
									<th>รหัสนักศึกษา</th>
									<th>คำนำหน้า</th>
									<th>ชื่อ</th>
									<th>นามสกุล</th>
									<th>ปีการศึกษา</th>
									<th>เทอม</th>
									<th>การสอบ</th>
									<th>วิชาที่สอบ</th>
									<th>วันที่สอบ</th>
									<th>เวลาสอบ</th>
									<th>สถานที่สอบ</th>
									<th>อุปกรณ์ที่สอบ</th>
									<th>ที่นั่งสอบ</th>
									<th>หมายเหตุ</th>
								</tr>
								</thead>
								<tbody>
								<?php

								while ($row = mysqli_fetch_array($result)) {

									?>
									<tr>
									<td>
										<div class="container">
										<div class="row">
											<div class="col col-md-6">
											<button type="button" class="btn btn-warning btn-sm fa fa-pencil" data-toggle="modal" data-target="#<?php echo $row['order'] ?>"></button>
											<!-- Modal -->
											<div class="modal fade" id="<?php echo $row['order'] ?>" role="dialog">
												<div class="modal-dialog modal-lg">
												<div class="modal-content">
													<form  role="form" action="updateform.php?id=<?php echo $row['order'] ?>" method="POST">
														<div class="modal-header ">
															<h3>แก้ไขข้อมูล นักศึกษา</h3>
															<button type="button" class="close" data-dismiss="modal">&times;</button>
														</div>

													<div class="modal-body ">

														<div  class="form-section" style="text-align: left">
															<h3>ข้อมูลทั่วไป</h3><br>
															<label for="id1">รหัสนักศึกษา : </label>
															<input id="id1" class="form-control" type="text" name="user_id" required>
															<label for="ti1">คำนำหน้า : </label>
															<input id="ti1" class="form-control" type="text" name="title" required>
															<label for="fn1">ชื่อ : </label>
															<input id="fn1" class="form-control" type="text" name="fname" required>
															<label for="ln1">นามสกุล : </label>
															<input id="ln1" class="form-control" type="text" name="lname" required>
														<br>
														</div>
														<div class="form-section">
															<h3>ข้อมูลการสอบ</h3><br>
															<label for="ye">ปีการศึกษา : </label>
														<input  id="ye1" class="form-control" type="text" name="year" required>
														<label for="ter1">ภาคการศึกษา : </label>
														<select id="ter1" class="form-control" name="term" required>
																				<option disabled selected value="">--------เลือกภาคเรียน--------</option>
																				<option value="1">ภาคเรียนที่ 1</option>
																				<option value="2">ภาคเรียนที่ 2</option>
																				<option value="3">ภาคเรียนที่ 3</option>
																			</select>
													<label for="ty1">การสอบ : </label>
													<select id="ty1" class="form-control" name="type" required>
																				<option disabled selected value="">--------เลือกรูปแบบ--------</option>
																				<option>กลางภาค</option>
																				<option>ปลายภาค</option>
																				<option>แก้ไขผลการเรียน(I)</option>
																				<option>อื่นๆ...</option>
																	</select>

													<label for="aa1">วิชาที่สอบ : </label>
															<select class="form-control" id="aa1" name="sub" onchange="getSelectValue();" required>
																	<option disabled selected value="" >----------------เลือกรายวิชา--------------------</option>
																	<?php while ($row_sub = mysqli_fetch_array($re_sub_2)) { ?>
																		<option value="<?php echo $row_sub['sub_id']?>"><?php echo $row_sub['sub_id'] . " " . $row_sub['id_name'] ?></option>
																	<?php 
																} ?>
															</select>
														<label for="dat1">วันที่สอบ  : (1 ม.ค. 2561) </label>
														<input id="dat1" class="form-control" type="text" name="date" required>
														<label for="seat1">ลำดับที่นั่งสอบ : </label>
														<input id="seat1" class="form-control" type="text" name="seat" required>
													
														<label for="tim1">เวลาสอบ : </label>
														<div id="tim1" class="row form-section">
															<div class="col-lg-6">
															<label for="tim11">เวลาเริ่ม : </label> 
															<input id="tim1" class="form-control" type="time" name="time1"></div required>
															<div class="col-lg-6">
															<label for="tim22">เวลาสิ้นสุด :</label>
															<input id="tim22" class="form-control" type="time" name="time2"></div required>
														</div>
													<label for="plac1">สถานที่สอบ : </label>
													<select id="plac1" class="form-control" name="place" required>
																			<option disabled selected>เลือกรายวิชา</option>
																			<?php while ($row_location = mysqli_fetch_array($re_location)) { ?>
																				<option value="<?php echo $row_location['name_location'] ?>"><?php echo $row_location['name_location'] ?></option>
																			<?php 
																		} ?>
																		</select>

													<label for="too1">สอบด้วยอุปกรณ์ : </label>
													<select id="too1" class="form-control" name="tool"required>
																			<option>Tablet</option>
																			<option>Computer</option>
																		</select>
													<label for="commen1">หมายเหตุ : </label>
													<textarea id="commen1" class="form-control" rows="3" name="comment"></textarea>
												</div>
														<br><br>
														<button  type="submit" class="btn btn-info pull-block form-control" value="save" >update</button>

													</div>
													</form>
												</div>
												</div>
											</div>
											<!--Modal-->

											</div>
											<div class="col-lg-6">
											<button type="button" class="btn btn-danger btn-sm fa fa-minus" data-toggle="modal" data-target="#de<?php echo $row['order'] ?>"></button>
												<div class="modal fade" id="de<?php echo $row['order'] ?>" role="dialog">
												<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													</div>

													<div class="modal-body text-center">
														 <h3>ยืนยันการลบข้อมูล</h3>
													</div>
													<div class="modal-footer">
															<div style="text-align: center">
																<a type="button" href="deletedata.php?id=<?php echo $row['order'] ?>" class="btn btn-danger">Yes</a>
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
									<td><?php echo $row['user_id']; ?></td>
									<td><?php echo $row['user_title']; ?></td>
									<td><?php echo $row['user_first_name']; ?></td>
									<td><?php echo $row['user_last_name']; ?></td>
									<td><?php echo $row['exam_year']; ?></td>
									<td><?php echo $row['exam_term']; ?></td>
									<td><?php echo $row['exam_type']; ?></td>
									<td><?php echo $row['exam_subject']; ?></td>
									<td><?php echo $row['exam_date']; ?></td>
									<td><?php echo $row['exam_time']; ?></td>
									<td><?php echo $row['exam_location']; ?></td>
									<td><?php echo $row['exam_tool']; ?></td>
									<td><?php echo $row['exam_seat']; ?></td>
									<td><?php echo $row['note']; ?></td>
									<?php

									}
									?>
								</tr>
								</tbody>
								</table>
						</div>
					</div>
				</div>
			

            </div>
			<!-- END container-fluid -->

		</div>
		<!-- END content -->

    </div>
	<!-- END content-page -->
    
	<footer class="footer">
		<div class="row">
			<div class="col-md-6"></div>
			<div class="col-md-6"></div>
		</div>
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
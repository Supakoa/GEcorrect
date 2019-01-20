<?php 
require 'server/server.php';
$q_sub = "SELECT * FROM `subject` order by `subject_id`";
$re_sub = mysqli_query($con, $q_sub);
$i = 0;
$option_sub = '<option hidden selected  value="">เลือกวิชา</option>';
while ($row_sub = mysqli_fetch_array($re_sub)) {
    $option_sub.="<option value = \"" . $row_sub['subject_id'] . "\">" . $row_sub['subject_id'] . " : " . $row_sub['subject_name'] . "</option>";
    $i++;
}
if(isset($_POST['gogo'])){
	$term = $_POST['term'];
	$year = $_POST['year'];
	$subject = $_POST['subject'];
	$group_exam = $_POST['group_exam'];
	$q_show = "SELECT room_detail.detail_id,room_detail.sub_id,room_detail.sub_group,detail.term,detail.year,detail.type,detail.day,detail.time_start ,detail.time_end 
FROM `room_detail`,`detail` WHERE detail.detail_id = room_detail.detail_id 
AND detail.term LIKE '$term%' AND detail.year LIKE '$year%' AND room_detail.sub_id LIKE '$subject%' AND room_detail.sub_group LIKE '$group_exam%' GROUP BY detail.detail_id";
$re_show = mysqli_query($con, $q_show);
}
else{
	$q_show = "SELECT room_detail.detail_id,room_detail.sub_id,room_detail.sub_group,detail.term,detail.year,detail.type 
FROM `room_detail`,`detail` WHERE 0";
$re_show = mysqli_query($con, $q_show);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Admin Template-ค้นหาแบบกลุ่มสอบ</title>
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

	<?php// require 'menu/navmenu.php'; ?>


    <div class="content-page"><!-- start content-page-->
		<div class="content"><!--content-->
				<div class="card mb-3">
					<div class="card-header">
						<h4 class="text-center">ค้นหาแบบกลุ่มสอบ</h4>
					</div>
					<div class="card-body">
					<form action="search2.php" method="post">
						<div class="container"><!-- container -->
							<div class="row"><!-- row -->
								<div class="col-lg-8">
									<div class="card"><!-- card 1 -->
										<div class="card-body">
											<div class="row">
												<div class="col-md-3">
													<label for="term">เทอม</label>
													<select name="term" class="form-control select2">
													<option hidden selected  value="">เทอม</option>
															<option>1</option>
															<option>2</option>
															<option>3</option>
													</select>
												</div>
												<div class="col-md-1">
													<br><br><label >/</label>
												</div>
												<div class="col-md-7">
													<label for="year">ปีการศึกษา</label>
														<select name="year" class="form-control select2">
														<option hidden selected  value="">เลือกปีการศึกษา</option>
														<option>2561</option>
                                                        <option>2562</option>
                                                        <option>2563</option>
                                                        <option>2564</option>
                                                        <option>2565</option>
                                                        <option>2566</option>
                                                        <option>2567</option>
                                                        <option>2568</option>
                                                        <option>2569</option>
														</select>
												</div>
												<div class="col-md-7">
													<label for="subject">วิชา</label>
													<select name="subject" class="form-control select2">
													<option hidden selected  value="">เลือกวิชา</option>
														<?php echo $option_sub ?>
													</select>
												</div>
												<div class="col-md-7">
													<label for="group">กลุ่มเรียน</label>
													<input name = "group_exam" type="text"  placeholder = "กรอกกลุ่มเรียน" maxlength="3"  class="form-control" >
												</div>
											</div>
										</div>
									</div><!--end card 1 --> <br>
								</div>
							</div><!-- end row -->
								<div class="text-center">
									<button class="btn btn-sm btn-success" type="submit">submit</button>
								</div>
						</div><!--end container -->
						<input type="hidden" name="gogo">
						</form>
					</div>
				</div>
								<div class="card"><!-- card 2 -->
									<div class="card-body">
										<div class="table-responsive"><!--table -->
											<table id="search2" class="table table-bordered">
												<thead>
															<div class="text-center">
																<a role="button" href="#"  class="btn btn-danger btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm"><i class="fa fa-minus"></i> ลบที่เลือก</a>
															</div>
															
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
														<th>เทอม</th>
														<th>ปีการศึกษา</th>
														<th>วิชา</th>
														<th>กลุ่มเรียน</th>
														<th>วันที่</th>
														<th>เวลา</th>
														<th>ประเภท</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
												<?php while ($row_show = mysqli_fetch_array($re_show)){ ?>
													<tr>
													
														<td>
															<div class="text-center">
																<a role="button" href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#info">
																	<i class="fa fa-file"></i></a><!-- modal 0 -->
																<a role="button" href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit">
																	<i class="fa fa-pencil"></i></a><!-- modal 1 -->
																<a role="button" href="#"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">
																	<i class="fa fa-minus"></i></a><!-- modal 2 -->

															</div>

															<!-- Modal 0-->
															<div class="modal fade" id="info" tabindex="-1" role="dialog" aria-labelledby="sea3" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title" id="sea3">ข้อมูล</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<div class="modal-body">
																			<div class="container">
																				<div class="card mb-3">
																					<div class="card-body">
																						<div class="table-responsive">
																							<table class="table table-borderless">
																								<tbody>
																									<tr>
																										<th scope="row">ปีการศึกษา</th>
																										<td>2562</td>
																									</tr>
																									<tr>
																										<th scope="row">กลุ่มเรียน</th>
																										<td>002</td>
																									</tr>
																									<tr>
																										<th scope="row">เวลา</th>
																										<td>08.00 - 11.00 น.</td>
																									</tr>
																									<tr>
																										<th scope="row">วันที่</th>
																										<td>26 ก.พ.</td>
																									</tr>
																									<tr>
																										<th scope="row">ประเภท</th>
																										<td>Computer</td>
																									</tr>
																								</tbody>
																							</table>
																						</div>

																						<div class="table-responsive">
																							<table class="table">
																								<thead>
																									<tr>
																										<th>#</th>
																										<th>ห้อง</th>
																										<th>จำนวน</th>
																									</tr>
																								</thead>
																								<tbody>
																									<tr>
																										<td class="text-center">1</td>
																										<td>1711</td>
																										<td>250</td>
																									</tr>
																								</tbody>
																							</table>
																						</div>
																					</div>
																				</div>
																			</div>
																					
																		</div>
																	</div>
																</div>
															</div><!--end modal 0-->
															
															<!-- Modal 1-->
															<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="sea2" aria-hidden="true">
																<div class="modal-dialog" role="document">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h5 class="modal-title" id="sea2">แก้ไข</h5>
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																			<span aria-hidden="true">&times;</span>
																			</button>
																		</div>
																		<div class="modal-body">
																			<div class="container">
																				<div class="form-group">
																					<div class="row">
																						<div class="col-md-6">
																							<div class="form-group">
																								<label for="year">ปีการศึกษา</label>
																								<select id="year" class="form-control select2">
																									<option>2561</option>
																									<option>2560</option>
																									<option>2559</option>
																								</select>
																							</div>
																						</div>
																						<div class="col-md-6">
																							<div class="form-group">
																								<label for="subj">วิชา(รหัส)</label>
																								<select id="subj" class="form-control select2">
																									<option>GEL1101</option>
																									<option>GEL1102</option>
																									<option>GEL1103</option>
																								</select>
																							</div>
																						</div>
																						<div class="col-md-6">
																							<div class="form-group">
																								<label for="group">กลุ่มเรียน</label>
																								<select id="group" class="form-control select2">
																									<option>101</option>
																									<option>201</option>
																									<option>302</option>
																								</select>
																							</div>
																						</div>
																						<div class="col-md-6">
																							<div class="form-group">
																								<label for="time">เวลา</label>
																								<select id="time" class="form-control select2">
																									<option>08.00 - 11.00 น.</option>
																									<option>11.00 - 14.00 น.</option>
																									<option>14.00 - 17.00 น.</option>
																								</select>
																							</div>
																						</div>
																						<div class="col-md-6">
																							<div class="form-group">
																								<label for="date">วันที่</label>
																								<input id="date" type="date" class="form-control " name="">
																							</div>
																						</div>
																						<div class="col-md-6">
																							<div class="form-group">
																								<label for="cate">ประเภท</label>
																								<select id="cate" class="form-control select2">
																									<option>Tablat</option>
																									<option>Computer</option>
																								</select>
																							</div>
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
															<div class="modal fade bd-example-modal-sm" id = "delete" tabindex="-1" role="dialog" aria-hidden="true">
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
														<td><?php echo $row_show['term'] ?></td>
														<td><?php echo $row_show['year'] ?></td>
														<td>
															<?php
															$de_id =  $row_show['detail_id'];
															$q_check = "SELECT `sub_id` FROM `room_detail` WHERE `detail_id` = '$de_id' GROUP BY `sub_id` ";
															$re_check = mysqli_query($con, $q_check);
															$num_check = 0;
															while($row_check = mysqli_fetch_array($re_check)){
																$num_check++;
															}

															if($num_check>1){
																echo "หลายวิชา";
															}
															else{
																echo $row_show['sub_id'] ;
															}
																
																
															?>
														</td>
														<td><?php echo $row_show['sub_group'] ?></td>
														<td><?php echo $row_show['day'] ?></td>
														<td><?php echo $row_show['time_start']." - ". $row_show['time_end'] ?></td>
														<td><?php echo $row_show['type'] ?></td>
														<td class="text-center">
															<div class="form-check">
																<input type="checkbox" class="form-check-input">
															</div>
														</td>
													</tr>
												<?php } ?>
												</tbody>
											</table>
										</div><!-- end table -->
									</div>
								</div><!-- card 2 -->
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
			$('#search2').DataTable();
			$('.select2').select2();

					
		
			
		} );		
	</script>
	
	
<!-- END Java Script for this page -->

</body>
</html>
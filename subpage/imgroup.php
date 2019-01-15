<?php 
if(isset($_POST['gogo'])){
    
	print_r($_POST['room']);
	echo "<br>";
	print_r($_POST['text']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Admin Template-นำเข้าข้อมูลแบบกลุ่ม</title>
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

	<?php //require 'menu/navmenu.php' ?>


    <div class="content-page"><!-- content-page -->

		<div class="content"><!-- content -->
			<div class="card mb-3">
				<div class="card-header">
					<h4 class="text-center">นำเข้าข้อมูลแบบกลุ่มเรียน</h4>
				</div>
				<div class="card-body"><!-- card-body -->
						<div class="container">
							<div class="card">
								<div class="card-body">
									<div class="row"><!-- filter -->
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
													<option>กลางภาค</option>
													<option>ปลายภาค</option>
                                                    <option>แก้ไอ</option>	
                                                    <option>ย้อนหลัง</option>
												</select>
											</div>
										</div>
									</div><!--end filter -->
								</div>
							</div>
							<hr>
							<div class="card">
								<div class="row">
									<div class="col-md-6">
										<div class="card-body">
											<div style="text-align:center;">
												<h3>Tablet</h3>
											</div>
											<form action="imgroup.php" method="post">
											<div class="row" id = "eiei"><!-- row -->
												<div class="col-md-4 form-group"><!-- room & Value -->
													<label for="room">ห้อง</label>
														<select name="room[]" id="room" class="form-control select2">
															<option>1701</option>
															<option>1702</option>
															<option>3111</option>
														</select><hr>		
												</div>
												<div class="col-md-4"></div>
												<div class="col-md-4 form-group">
													<label for="value">จำนวน</label>
													<input id="value" class="form-control" type="text" name = "text[]" placeholder="1."><hr>
												</div><!--end room & Value -->
											
											</div><!--end row -->
											<div class = "come"></div>
											<button type="submit"name ="gogo">gogo</button>
											</form>
											
											<div class="row">

												<div class="col-md-4"></div><!-- button add collum -->
														<div class="col-md-4 text-center">
															<button class="btn btn-sm btn-info" id="btn1"><i class="fa fa-plus"></i></button>
														</div>
													<div class="col-md-4"></div><!-- end button add collum -->
												</div>
												
										</div>
									</div>
									<div class="col-md-6">
										<div class="card-body">
											<div style="text-align:center;">
												<h3>Computer</h3>
											</div>
											<div class="row"><!-- row -->
												<div class="col-md-4 form-group"><!-- room & Value -->
													<label for="room">ห้อง</label>
														<select name="" id="room" class="form-control select2">
															<option>1701</option>
															<option>1702</option>
															<option>3111</option>
														</select><hr>
														<select name="" class="form-control select2">
																		<option>1701</option>
																		<option>1702</option>
																		<option>3111</option>
														</select><hr>
												</div>
												<div class="col-md-4"></div>
												<div class="col-md-4 form-group">
													<label for="value">จำนวน</label>
													<input id="value" class="form-control" type="text" placeholder="1."><hr>
													<input  class="form-control" type="text" placeholder="2."><hr>
												</div><!--end room & Value -->

												<div class="col-md-4"></div><!-- button add collum -->
													<div class="col-md-4 text-center">
														<button class="btn btn-sm btn-info"><i class="fa fa-plus"></i></button>
													</div>
												<div class="col-md-4"></div><!-- end button add collum -->
											</div><!--end row -->
											
										</div>
									</div>
								</div>
								<hr>
									<div class="text-center"><!-- up file -->
										<input class="btn btn-md" type="file">
										<button id="btn2" class="btn btn-sm btn-success" type="submit">submit</button>
									</div><!--end up file -->
							</div>
						</div>
				</div><!-- end card-body -->
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script>
		$(document).ready(function() {
			// data-tables
			$('#example1').DataTable();
    		$('.select2').select2();

		} );		
	</script>
	<script>
$(document).ready(function(){
	var eiei = '<div class="col-md-4 form-group"><select name="room[]" id="room" class="form-control select2"><option>1701</option><option>1702</option><option>3111</option></select><hr></div><div class="col-md-4"></div><div class="col-md-4 form-group"><input id="value" class="form-control" type="text" name = "text[]" placeholder="1."><hr></div>';

  $("#btn1").click(function(){
    $("#eiei").append(eiei);
  });
  $("#btn2").click(function(){
    $(".come").append(eiei);
  });
//   <div class=\"col-md-4 form-group\"><label for=\"value\">ห้อง</label><select name=\"\" id=\"room\" class=\"form-control select2\"><option>1701</option><option>1702</option><option>3111</option> </select><hr> </div><div class=\"col-md-4\"></div><div class=\"col-md-4 form-group\"><label for=\"value\">จำนวน</label><input id=\"value\" class=\"form-control\" type=\"text\" placeholder="1."><hr></div><div class=\"col-md-12 center\" ><button id = \"btn1\">+</button> </div>
});
</script>
	
<!-- END Java Script for this page -->

</body>
</html>
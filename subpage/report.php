<?php 


if(isset($_POST['create_pdf'])){
	require_once __DIR__ . '/vendor/autoload.php';

	$mpdf = new \Mpdf\Mpdf([ 
		'default_font_size' => 11,
		'default_font' => 'sarabun',
		"sarabun" => 'B',
		'format' => 'A4',
		'margin_left' => 1,
		'margin_right' => 1,
		'mode' => 'utf-8',
		]);
	
		$keep_table_proportions = true;		
		$ignore_table_percents = true;
		$ignore_table_width = true;
		$mpdf->shrink_tables_to_fit = 1;

$head = '
<html>
<head>
<style>
    @page {
      size: auto;
      odd-header-name: html_MyHeader1;
	}
	
	table,th,td{
		border: 1pt solid black;
		border-collapse: collapse;
		margin-top:1pt;
		margin-button:1pt;
		padding: 2pt;
	
	}
	table.layout {
		text-align:center;
		margin-left:1;
		margin-right:1;
		border-collapse: collapse;
	}
	td.layout {
		border: 1pt solid black;
	}
	th{
		text-align:center;
	}
</style>
</head>
<body>
    <htmlpageheader name="MyHeader1">
		<div style="text-align: center; font-weight: bold; font-size: 11pt;">
			 <span>รายชื่อนักศึกษาสอบ '.$type.' ภาคเรียนที่ '.$term.'/'.$year.'</span><br><span>สำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทรอนิกส์ : มหาวิทยาลัยราชภัฎสวนสุนันทา</span><br><span>วันที่ '.$exam_date.' เวลา '.$exam_time.' น. ห้อง '.$exam_location.'</span>
		</div>
	</htmlpageheader>
';


$body = '
	<div class="container"  >
		<table autosize="1" style="width:100%;">
		<thead name="tablehead">
			<tr>
				<th>ลำดับ</th>
				<th>รหัสนักศึกษา</th>
				<th>ชื่อ-นามสกุล</th>
				<th>วิชาที่สอบ</th>
				<th>วันที่สอบ</th>
				<th>เวลาที่สอบ</th>
				<th>ห้องสอบ</th>
				<th style="width:80pt;">ลายเซ็น</th>
			</tr>
		</thead>
			<tbody>
			<tr>
				<td class="text-center"> <!-- btn PDF -->
					dsfgsdrg
				</td><!-- end btn PDF -->
				<td>dsfgsdfg</td>
				<td>dsfgsdfg</td>
				<td>dsfgsdfg</td>
				<td>dsfgsdfg</td>
				<td>dfsgsdfg</td>
				<td>dfsgsdfg</td>
				<td>dfsgsdfg</td>
			</tr>
			</tbody>

		</table>
	</di>

';
$footer = '<br>
<div style="text-align:right;">
<span>กรรมการคุมสอบ...................................................................................................</span><br>
<span>กรรมการคุมสอบ...................................................................................................</span><br>
<span>กรรมการคุมสอบ...................................................................................................</span><br>
<span>จำนวนนักศึกษาที่เข้าสอบ.................................................................................................คน</span><br>
<span>จำนวนนักศึกษาที่ขาดสอบ.................................................................................................คน</span>

</div>
</body>
</html>
';

$mpdf->WriteHTML($head);
$mpdf->WriteHTML($body);
$mpdf->WriteHTML($footer);
$mpdf->Output();


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Admin Template-รายงาน</title>
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

					<div class="card mb-3"><!-- filter card -->
						<div class="card-header">
							<h4 class="text-center">รายงาน PDF</h4>
						</div>
						<div class="card-body">
							<div class="container"><!-- container -->
								<div class="row"><!-- row -->
									<div class="col-lg-8">
										<div class="card"><!-- card 1 -->
											<div class="card-body">
												<div class="row">
													<div class="col-md-3">
														<label for="term">เทอม</label>
														<select id="term" class="form-control select2">
																<option>1</option>
																<option>2</option>
														</select>
													</div>
													<div class="col-md-1">
														<br><br><label >/</label>
													</div>
													<div class="col-md-7">
														<label for="year">ปีการศึกษา</label>
															<select id="year" class="form-control select2">
																<option>2561</option>
																<option>2560</option>
																<option>2559</option>
															</select>
													</div>
													<div class="col-md-7">
														<label for="subject">วิชา</label>
														<select name="" id="subject" class="form-control select2">
															<option>GEL1101</option>
															<option>GRL1102</option>
															<option>GEL2203</option>
														</select>
													</div>
													<div class="col-md-7">
														<label for="group">กลุ่มเรียน</label>
															<select name="" id="group" class="form-control select2">
																<option>001</option>
																<option>002</option>
																<option>003</option>
															</select>
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
						</div>
					</div><!--end filter card -->

					<div class="card mb-3"><!-- table card-->
						<div class="card-body">
							<div class="table-responsive">
								<table id="report" class="table table-bordered">
									<thead>
										<tr>
											<th></th>
											<th>ปีการศึกษา</th>
											<th>กลุ่มเรียน</th>
											<th>เวลา</th>
											<th>วันที่</th>
											<th>ประเภท</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center"> <!-- btn PDF -->
												<form method="POST" action="report.php">
													<input name="create_pdf" type="submit" class="btn btn-sm btn-info" value="Create PDF">
												</form>
											</td><!-- end btn PDF -->
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div><!--end table card-->

					<div class="crad mb-3"><!-- signature card-->
						<div class="card-header">
							<h4 class="text-center">signature</h4>
						</div>
						<div class="card-body">
							<div class="container">
								<div class="row">
									<div class="col-xl-12 ">
										<div class="mx-auto" style="width: 40px;">
											<img src="..." class="rounded mx-auto d-block"><br><br>
										</div>
									</div>
									<div class="col-md-12">
										<div class="text-center">
											<button class="btn btn-sm btn-success">Upload Signature</button>
											<p>Size 200*200 <br>Type*PNG*</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div><!--end signature card-->

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
			$('#report').DataTable();
					
			
		} );		
	</script>
<!-- END Java Script for this page -->

</body>
</html>
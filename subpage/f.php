<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<title>Admin Template-footer</title>
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
					<div class="card">
						<div class="card-header text-center"><!--paper-->
							<h2>แก้ไข เอกสารที่เกี่ยวข้อง</h2>
						</div>
						<div class="card-body">
							<div class="text-center">
								<h4>เว็บไซต์ที่เกี่ยวข้อง</h4>
							</div>
									<div class="row"><!--left-->
										<div class="col-xl-6">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="Check1">
												<label class="custom-control-label" for="Check1">(คลิกเพื่อแสดง)</label>
												<input class="form-control" type="text" placeholder="Default input">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="custom-control ">
												<br>
												<input class="form-control" type="text" placeholder="Default input" id="01">
											</div>
										</div>
									</div>
									
									<div class="row">
										<div class="col-xl-6">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="Check2">
												<label class="custom-control-label" for="Check2">(คลิกเพื่อแสดง)</label>
												<input class="form-control" type="text" placeholder="Default input">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="custom-control">
												<br>
												<input class="form-control" type="text" placeholder="Default input" id="02">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-6">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="Check3">
												<label class="custom-control-label" for="Check3">(คลิกเพื่อแสดง)</label>
												<input class="form-control" type="text" placeholder="Default input">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="custom-control ">
											<br>
												<input class="form-control" type="text" placeholder="Default input">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-6">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="Check4">
												<label class="custom-control-label" for="Check4">(คลิกเพื่อแสดง)</label>
												<input class="form-control" type="text" placeholder="Default input">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="custom-control ">
											<br>
												<input class="form-control" type="text" placeholder="Default input">
											</div>
										</div>
									</div><!--end left--> <hr>
									<div class="text-center">
										<h4>เอกสารที่เผยแพร่</h4>
									</div>
								<div class="row"><!-- right-->
										<div class="col-xl-6">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="Check5">
												<label class="custom-control-label" for="Check5">(คลิกเพื่อแสดง)</label>
												<input class="form-control" type="text" placeholder="Default input">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="custom-control ">
											<br>
												<input class="form-control" type="text" placeholder="Default input">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-6">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="Check6">
												<label class="custom-control-label" for="Check6">(คลิกเพื่อแสดง)</label>
												<input class="form-control" type="text" placeholder="Default input">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="custom-control ">
											<br>
												<input class="form-control" type="text" placeholder="Default input">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-6">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="Check7">
												<label class="custom-control-label" for="Check7">(คลิกเพื่อแสดง)</label>
												<input class="form-control" type="text" placeholder="Default input">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="custom-control ">
											<br>
												<input class="form-control" type="text" placeholder="Default input">
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-xl-6">
											<div class="custom-control custom-checkbox">
												<input type="checkbox" class="custom-control-input" id="Check8">
												<label class="custom-control-label" for="Check8">(คลิกเพื่อแสดง)</label>
												<input class="form-control" type="text" placeholder="Default input">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="custom-control ">
											<br>
												<input class="form-control" type="text" placeholder="Default input">
											</div>
										</div>
									</div><!--end right-->
						</div><!--end paper-->
					</div>
				</form>
				
				<br><hr><br>

				<form action="">
					<div class="card">
						<div class="card-header text-center"><!--footer-->
							<h2>แก้ไข Footer</h2>
						</div>
						<div class="card-body">
							<div class="input-group">
								<textarea class="form-control" aria-label="With textarea" rows="4"></textarea>
							</div><br><br>
							<div class="text-center">
								<button type="submit" class="btn btn-success">Upload</button>
							</div>
						</div><!--end footer-->
					</div>
				</form>
				
					

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
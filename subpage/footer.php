<?php 
	// connect database 
	require 'server/server.php';

	// check login
	if( !(isset($_SESSION['admin_id'])) ){
		$_SESSION['alert'] = 2;
		header("Location: ../index.php");
		exit();
	}

	// insert new footer
	$a = "SELECT * FROM show_url WHERE group_url = 1";
    $b = "SELECT * FROM show_url WHERE group_url = 2";

    $q1 = mysqli_query($con,$a);
    $q2 = mysqli_query($con,$b);

    $re = mysqli_query($con, $a);
	$re2 = mysqli_query($con, $b);
	
if(isset($_POST['new_btn_1'])){//web
	$id = 1;
    $count = 1;
    $plus1 = "web_text_";
    $plus2 = "web_url_";
    $plus3 = "web_check_";
    while ($rowrow = mysqli_fetch_array($re)) {
        $sum1 = $plus1 . $id;
        $sum2 = $plus2 . $id;
        $sum3 = $plus3 . $id;
        if (isset($_POST[$sum3])) {
            $ed3 = 1;
        } else {
            $ed3 = 0;
        }
        $ed1 = $_POST[$sum1];
        $ed2 = $_POST[$sum2];
        $lin = $rowrow['id'];
        $qinq = "UPDATE `show_url` SET `id`='$id',`url`='$ed2',`text`='$ed1',`hide`='$ed3' WHERE `id`='$lin' ";//,`hide`='$ed3'
        $que = mysqli_query($con, $qinq);
        if ($que) {
            $count++;
        }
        $id = $id + 1;
	}//end web
	header('Location: footer.php');
	exit();
}

if(isset($_POST['new_btn_2'])){//paper
	// make it easy
	$plus1 = "paper_text_";
    $plus2 = "paper_file_";
	$plus3 = "paper_check_";
	$id = 5;

	while ( mysqli_fetch_array($re2) ){//paper
        $sum1 = $plus1 . $id;
        $sum2 = $plus2 . $id;
		$sum3 = $plus3 . $id;
		$count = 0;
        if (isset($_POST[$sum3])) {
            $ed3 = 1;
        } else {
            $ed3 = 0;
        }
        $ed1 = $_POST[$sum1];
        $ed2 = $_FILES[$sum2]['name'];

        $ext = pathinfo(basename($_FILES[$sum2]["name"]), PATHINFO_EXTENSION);
        $new_taget_name = 'pdf_' . uniqid() . "." . $ext;
        $target_path = "uploads/";
        $upload_path = $target_path . $new_taget_name;
        // $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($new_taget_name, PATHINFO_EXTENSION));

        if ($ed2 != "") {

            if ($_FILES[$sum2]["size"] > 8000000) {
				$_SESSION['alert'] = 15;
				header("Location: footer.php");
				exit();
                // echo "Sorry, your file is too large.";
                // $uploadOk = 0;
			}
			
       		// Allow certain file formats
            if ($imageFileType != "pdf") {
				$_SESSION['alert'] = 16;
				header("Location: footer.php");
				exit();
                // echo "Sorry, only PDF files are allowed.";
                // $uploadOk = 0;
			}
			
            if (move_uploaded_file($_FILES[$sum2]["tmp_name"], $upload_path)) {
                //echo "The file " . basename($_FILES[$sum2]["name"]) . " has been uploaded.";
                $real_name = basename($_FILES[$sum2]["name"]);
                //echo $real_name;
                //$q = "INSERT INTO `testpdf`(`url`,`real_name`) VALUES ('$new_taget_name','$real_name')";
                $q = "UPDATE `show_url` SET `url`='$new_taget_name',`real_name`='$real_name',`text`='$ed1',`hide`='$ed3' WHERE `id` = '$id' ";
                $result = mysqli_query($con, $q);
                if ($result) {
					$_SESSION['alert'] = 10;
                    // $count++;
                }else{
					$_SESSION['alert'] = 11;
					header("Location: footer.php");
					exit();
				}
            } else {
				$_SESSION['alert'] = 11;
				header("Location: footer.php");
				exit();
                // echo "Sorry, there was an error uploading your file.";
            }

    	} else {
			// $count++;
			$q = "UPDATE `show_url` SET `text`='$ed1',`hide`='$ed3' WHERE `id` = '$id' ";
			$result = mysqli_query($con, $q);
			if($result){
				$_SESSION['alert'] = 10;
			}else{
				$_SESSION['alert'] = 11;
				header("Location: footer.php");
				exit();
			}
		}
        $id = $id + 1;
	}
	header("Location: footer.php");
	exit();
}//end paper

	if (isset($_POST['new_btn_3'])) {//footer
		$a = $_POST['commentf'];
		$b = "UPDATE `web_show_time` SET `footer`= '$a' WHERE `id`= '1' ";
		$q_b = mysqli_query($con,$b);
		if($q_b){
			$_SESSION['alert'] = 10 ;
		}else{
			$_SESSION['alert'] = 11 ;
		}
		header("Location: footer.php");
	}//end footer

	$q_banner = "SELECT * FROM `web_show_time` ";
    $result_banner = mysqli_query($con,$q_banner);
    $row_banner = mysqli_fetch_array($result_banner);
    
?>
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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />

  	<!-- sweet alert2 -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>

	<!-- END CSS for this page -->

</head>

<body class="adminbody">

	<div id="main">

		<?php require 'menu/navmenu.php' ?>


		<div class="content-page">
			<!-- content-page -->

			<div class="content">
				<!-- content -->

				<div class="container-fluid">
					<!--container-fluid -->
					<div class="card mb-3">
						<div class="card-header">
							<h3 class="text-center">เอกสารที่เผยแพร่และเว็บไซต์ที่เกี่ยวข้อง</h3>
						</div>
						<div class="card-body">
							<div class="card">
								<!-- card table 1 -->
								<div class="card-body">
									<h4 class="text-center">เว็บไซต์ที่เกี่ยวข้อง</h4>
									<div class="table-responsive" style="overflow-x:auto;">
										<table class="table">
											<!-- table 1 -->
											<thead>
												<tr>
													<th>ลำดับ</th>
													<th>ข้อความ</th>
													<th>ที่อยู่</th>
													<th>ซ่อน</th>
												</tr>
											</thead>
											<form action="footer.php" method="post">
												<!-- form web -->
												<tbody>
													<?php $i = 1; ?>
													<?php while ($row1 = mysqli_fetch_array($q1)) {  ?>
													<tr>
														<td>
															<?php echo $i . " )." ?>
														</td>
														<td><input class="form-control" type="text" name="web_text_<?php echo $i ?>" value="<?php echo $row1['text'] ?>"
															 require></td>
														<td><input class="form-control" type="text" name="web_url_<?php echo $i ?>" value="<?php echo $row1['url'] ?>"
															 require></td>
														<?php if ($row1['hide'] == 0) { ?>
														<td class="text-center"><input type="checkbox" class="form-checkbox" name="web_check_<?php echo $i ?>"></td>
														<?php 
                                    						} else { ?>
														<td class="text-center"><input type="checkbox" class="form-checkbox" name="web_check_<?php echo $i ?>"
															 checked></td>
														<?php 
                                    						} ?>
													</tr>
													<?php $i = $i + 1;
                            						} ?>
												</tbody>
										</table><br>
										<div class="text-center">
											<a href="#custom-modal" class="btn btn-success m-r-5 m-b-10 btn-sm" data-target="#up0" data-toggle="modal">Update</a>

											<!-- Modal -->
											<div class="modal fade bd-example-modal-sm" id="up0" tabindex="-1" role="dialog" aria-labelledby="customModal"
											 aria-hidden="true">
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
															<button type="submit" class="btn btn-primary btn-sm" name="new_btn_1">Yes</button>
														</div>
													</div>
												</div>
											</div>
										</div>
										</form>
										<!--end form web -->
									</div>
									<!--end table 1 -->
								</div>
							</div>
							<!--end card table 1 -->

							<hr>
							<div class="card">
								<!-- card table 2 -->
								<div class="card-body">
									<h4 class="text-center">เอกสารที่เผยแพร่</h4>
									<div class="table-responsive" style="overflow-x:auto;">
										<table class="table">
											<!-- table 2 -->
											<thead>
												<tr>
													<th>ลำดับ</th>
													<th>ข้อความ</th>
													<th>ชื่อไฟล์</th>
													<th>เพิ่มไฟล์ PDF</th>
													<th>ซ่อน</th>
												</tr>
											</thead>
											<tbody>
												<!-- form paper -->
												<?php $a = 1; ?>
												<?php while ($row2 = mysqli_fetch_array($q2)) { ?>
												<tr>
													<td>
														<?php echo $a .".)"?>
													</td>
													<td><input form="form_1" class="form-control" type="text" name="paper_text_<?php echo $a ?>" value="<?php echo $row2['text'] ?>"></td>
													<td>
														<?php echo $row2['real_name'] ?>
													</td>
													<td><input form="form_1" class="form-control btn" type="file" name="paper_file_<?php echo $a ?>"></td>
													<?php 
														if ($row2['hide'] == 0) { 
													?>
													<td class="text-center"><input form="form_1" type="checkbox" class="form-checkbox" name="paper_check_<?php echo $a ?>"></td>
													<?php 
														} else { 
													?>
													<td class="text-center"><input form="form_1" type="checkbox" class="form-checkbox" name="paper_check_<?php echo $a ?>"
														 checked></td>
													<?php 
														} 
													?>
												</tr>
												<?php $a = $a + 1; } ?>
											</tbody>
										</table><br>
										<div class="text-center">
											<!-- Small modal -->
											<a role="button" href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target=".bd-example-modal-sm">Upload</a>

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
															<form action="footer.php" method="post" enctype="multipart/form-data" id="form_1">
																<button form="form_1" type="submit" class="btn btn-danger btn-sm" name="new_btn_2">Yes</button>
																<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
															</form>
														</div>
													</div>
												</div>
											</div>
											<!--end modal 3-->
										</div>
										<!--end form paper -->
									</div>
									<!--end table 2 -->
								</div>
							</div>
							<!--end card table 2 -->
							<hr>
						</div>
					</div>
					<div class="card mb-3">
						<div class="card-header">
							<h3 class="text-center">Footer</h3>
						</div>
						<div class="card-body">
							<div class="container-fluid">
								<form action="footer.php" method="post">
									<div class="form-section text-center">
										<label for="foot">Text</label>
										<textarea class="form-control" name="commentf" id="foot" col="10" rows="10"><?php echo $row_banner['footer']  ?></textarea>
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
														<button type="submit" class="btn btn-primary btn-sm" name="new_btn_3">Yes</button>
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
			</div>
			<!--end content-->
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
		$(document).ready(function () {
			// data-tables
			$('#example1').DataTable();


		});
	</script>

	

	<!-- alert all -->
	<?php require '../alert.php'; ?>

	<!-- END Java Script for this page -->

</body>

</html>
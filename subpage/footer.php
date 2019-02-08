<?php
// connect database 
require 'server/server.php';
// check login
if (!(isset($_SESSION['admin_id']))) {
    $_SESSION['alert'] = 2;
    header("Location: ../index.php");
    exit();
}

if(isset($_POST['new_btn_5'])){
    $web_year = $_POST['year'];
    $web_term = $_POST['term'];
    $q_web = "UPDATE `web_show_time` SET `web_year`= '$web_year' , `web_term`= '$web_term' WHERE `id`= '1' ";
    $re_web = mysqli_query($con, $q_web);
    if ($re_web) {
        $_SESSION['alert'] = 10;
    } else {
        $_SESSION['alert'] = 11;
    }

}

$a = "SELECT * FROM show_url WHERE group_url = 1";
$b = "SELECT * FROM show_url WHERE group_url = 2";
$re = mysqli_query($con, $a);
$re2 = mysqli_query($con, $b);

if (isset($_POST['new_btn_1'])) {//web
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
        $qinq = "UPDATE `show_url` SET `id`='$id',`url`='$ed2',`text`='$ed1',`hide`='$ed3' WHERE `id`='$lin' "; //,`hide`='$ed3'
        $que = mysqli_query($con, $qinq);
        if ($que) {
            $count++;
		}
		else{
			$_SESSION['alert'] = 4;
            
			header("Location: footer.php");
			exit();
		}
		$id = $id + 1;
		
	}//end web
	if ($count == $id) {
        $_SESSION['alert'] = 10;
    } else {
         $_SESSION['alert'] = 11;
    }
	header('Location: footer.php');
	exit();
}
$id = 5;
$count = 5;
if (isset($_POST['new_btn_2'])) {//paper
	while ($rowrow = mysqli_fetch_array($re2)) {//paper
		
        $plus1 = "paper_text_";
        $plus2 = "paper_file_";
        $plus3 = "paper_check_";
        $sum1 = $plus1 . ($id-4);
        $sum2 = $plus2 . ($id-4);
        $sum3 = $plus3 . ($id-4);
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

        if ($_FILES[$sum2]["name"] != "") {
			echo "-------------<br>".$_FILES[$sum2]["name"]."<br>-------------";
            if ($_FILES[$sum2]["size"] > 60000000) {
                echo "Sorry, your file is too large.";
				$uploadOk = 0;
				$_SESSION['alert'] = 15;
			header("Location: footer.php");
			exit();
            }
            // Allow certain file formats
            if ($imageFileType != "pdf") {
                echo "Sorry, only PDF files are allowed.";
				$uploadOk = 0;
				$_SESSION['alert'] = 16;
				header("Location: footer.php");
				exit();
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
				$_SESSION['alert'] = 4;
				header("Location: footer.php");
				exit();
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES[$sum2]["tmp_name"], $upload_path)) {
                    //echo "The file " . basename($_FILES[$sum2]["name"]) . " has been uploaded.";
                    $real_name = basename($_FILES[$sum2]["name"]);
                    //echo $real_name;
                    //$q = "INSERT INTO `testpdf`(`url`,`real_name`) VALUES ('$new_taget_name','$real_name')";
                    $q = "UPDATE `show_url` SET `url`='$new_taget_name',`real_name`='$real_name' WHERE `id` = '$id' ";
                    $result = mysqli_query($con, $q);
                    if ($result) {
                        $count++;
                    }
                } else {
					$_SESSION['alert'] = 4;
				header("Location: footer.php");
				exit();
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else {
            $count++;
        }

        $q_text = "UPDATE `show_url` SET `text`='$ed1' WHERE `id` = '$id' ";
        if($result = mysqli_query($con, $q_text)){
			echo "<br>".$id." : ".$ed1;
		}
        $q = "UPDATE `show_url` SET `hide`='$ed3' WHERE `id` = '$id' ";
        if($result = mysqli_query($con, $q)){
			echo "<br>".$id." : ".$ed3;
		}
        $id = $id + 1;
	}
	if ($count == $id) {
        $_SESSION['alert'] = 10;
    } else {
         $_SESSION['alert'] = 11;
    }
	header('Location: footer.php');
	exit();
	
}//end paper

if (isset($_POST['new_btn_3'])) {//footer
    $a = $_POST['commentf'];
    $b = "UPDATE `web_show_time` SET `footer`= '$a' WHERE `id`= '1' ";
    $q_b = mysqli_query($con, $b);
    if ($q_b) {
        $_SESSION['alert'] = 10;
    } else {
        $_SESSION['alert'] = 11;
    }
}//end footer


// insert new footer
$a = "SELECT * FROM show_url WHERE group_url = 1";
$b = "SELECT * FROM show_url WHERE group_url = 2";
$q1 = mysqli_query($con, $a);
$q2 = mysqli_query($con, $b);

$re = mysqli_query($con, $a);
$re2 = mysqli_query($con, $b);
$q_banner = "SELECT * FROM `web_show_time` ";
$result_banner = mysqli_query($con, $q_banner);
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

		<!-- sweet alert2 -->
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>

        <!-- BEGIN CSS for this page -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />
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
                                <h3 class="text-center">ภาคการศึกษาที่แสดงบนหน้าเว็บ</h3>
                            </div>
                            <div class="card-body">
                                <div class="container-fluid">
                                    <form action="footer.php" method="post">
                                        <div class="form-section">
                                            <div class="row">
                                            <div class="col-md-2"></div>
                                                <div class="col-md-3">
                                                <label for="term">เทอม</label>
                                                <select name="term" class="form-control select2" required>
                                                    <option hidden selected value="<?php echo $row_banner['web_term'] ?>"><?php echo $row_banner['web_term'] ?></option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                </select>
                                                </div>
                                                <div class="col-md-2 text-center"> <br><h2>/</h2> </div>
                                                <div class="col-md-3">
                                                <label for="year">ปีการศึกษา</label>
                                                <select name="year" class="form-control select2" required>
                                                    <option hidden selected value="<?php echo $row_banner['web_year'] ?>"><?php echo $row_banner['web_year'] ?></option>
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
                                            <div class="col-md-2"></div>

                                            </div>
                                            
                                        </div><br>
                                        <div class="text-center">
                                            <a href="#custom-modal" class="btn btn-success m-r-5 m-b-10 btn-sm" data-target="#up5" data-toggle="modal">Update</a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="up5" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
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
                                                            <button type="submit" class="btn btn-primary btn-sm" name="new_btn_5">Yes</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>  
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
                                            <form action="footer.php" method="post">
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
                                                    <!-- form web -->
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php while ($row1 = mysqli_fetch_array($q1)) { ?>
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
                                                                <?php } else {
                                                                    ?>
                                                                    <td class="text-center"><input type="checkbox" class="form-checkbox" name="web_check_<?php echo $i ?>"
                                                                                                   checked></td>
                                                                    <?php }
                                                                    ?>
                                                            </tr>
                                                            <?php
                                                            $i = $i + 1;
                                                        }
                                                        ?>
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
                                            <form action="footer.php" method="post" enctype="multipart/form-data" id = "form2">
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
                                                                    <?php echo $a . ".)" ?>
                                                                </td>
                                                                <td><input class="form-control" type="text" name="paper_text_<?php echo $a ?>" value="<?php echo $row2['text'] ?>"></td>
                                                                <td>
                                                                    <?php echo $row2['real_name'] ?>
                                                                </td>
                                                                <td><input class="form-control btn" type="file" name="paper_file_<?php echo $a ?>"></td>
                                                                <?php if ($row2['hide'] == 0) { ?>
                                                                    <td class="text-center"><input type="checkbox" class="form-checkbox" name="paper_check_<?php echo $a ?>"></td>
                                                                <?php } else { ?>
                                                                    <td class="text-center"><input type="checkbox" class="form-checkbox" name="paper_check_<?php echo $a ?>"
                                                                                                   checked></td>
                                                                    <?php } ?>
                                                            </tr>
                                                            <?php
                                                            $a = $a + 1;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table><br>
                                                <div class="text-center">
                                                    <!-- Small modal -->
													<a href="#custom-modal" class="btn btn-success m-r-5 m-b-10 btn-sm" data-target="#up1" data-toggle="modal">Update</a>

													<!-- Modal -->
													<div class="modal fade bd-example-modal-sm" id="up1" tabindex="-1" role="dialog" aria-labelledby="customModal"
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
																	<button type="submit" class="btn btn-primary btn-sm" form="form2" name="new_btn_2">Yes</button>
																</div>
															</div>
														</div>
													</div>
                                                    <!--end modal 3-->
                                                </div>
                                            </form>
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
                                            <textarea class="form-control" name="commentf" id="foot" col="10" rows="10"><?php echo $row_banner['footer'] ?></textarea>
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

		<?php require '../alert.php'; ?>
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

        <!-- END Java Script for this page -->

    </body>

</html>
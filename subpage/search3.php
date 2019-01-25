<?php
	// connect database 
	// connect database 

	require 'server/server.php';
	function DateThai($strDate) { //วันที่แบบไทย
		$strYear = date("Y", strtotime($strDate)) + 543;
		$strMonth = date("n", strtotime($strDate));
		$strDay = date("j", strtotime($strDate));
		$strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
		$strMonthThai = $strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}

	// check login
	if( !(isset($_SESSION['admin_id'])) ){
		$_SESSION['alert'] = 2;
		header("Location: ../index.php");
		exit();
    }
	
	if(isset($_POST['edit'])){//แก้ไข
		$std_id =  $_POST['std_id'];
		$note = $_POST['note'];
		$q_edit = "UPDATE `student_room` SET `note`='$note' WHERE  `student_room_id` = '$std_id' ";
		if($re_edit = mysqli_query($con, $q_edit)){
			$_SESSION['alert'] = 10;
		}
		else{
			$_SESSION['alert'] = 11;
		}
		
	}elseif(isset($_POST['delete'])){ //ลบ
		$std_id =  $_POST['std_id'];
		$q_del = "DELETE FROM `student_room` WHERE `student_room_id` = '$std_id' ";
		if($re_del = mysqli_query($con, $q_del)){
			$_SESSION['alert'] = 12;
		}
		else{
			$_SESSION['alert'] = 13;
		}
	}
	$q_sub = "SELECT * FROM `subject` order by `subject_id`";
	$re_sub = mysqli_query($con, $q_sub);
	$i = 0;

	$option_sub = '';

	while ($row_sub = mysqli_fetch_array($re_sub)) {
		$option_sub.="<option value = \"" . $row_sub['subject_id'] . "\">" . $row_sub['subject_id'] . " : " . $row_sub['subject_name'] . "</option>";
		$i++;
	}

	$q_location = "SELECT `order`,`name_location` FROM `location_table` order BY `name_location`";
	$re_location = mysqli_query($con, $q_location);
	$j = 0;

	$option_location = '';

	while ($row_location = mysqli_fetch_array($re_location)) {
		$option_location.='<option value = "' . $row_location['order'] . '"> ห้อง ' . $row_location['name_location'] . '</option>';
		$j++;
	}

	if (isset($_POST['gogo'])) {
		$term = $_POST['term'];
		$year = $_POST['year'];
		$subject = $_POST['sub'];
		$group_exam = $_POST['group_exam'];
		$type_exam = $_POST['type_exam'];
		$room = $_POST['room'];
		$date = $_POST['date'];
		$s_time = $_POST['s_time'];
		$e_time = $_POST['e_time'];
		$std_id =  $_POST['std_id'];
		// echo $term . $year . $subject . $group_exam;
		$q_show = "SELECT student_room.student_room_id,student_room.std_id,student.name,location_table.name_location,`subject`.subject_name,room_detail.sub_id,room_detail.sub_group,student_room.seat,detail.day,detail.time_start,detail.time_end,detail.term,detail.year,detail.type,student_room.note 
		FROM `student_room`,`location_table`,`room_detail`,`student`,`subject`,`detail`
		WHERE student_room.std_id = student.std_id AND location_table.order=room_detail.room_id AND room_detail.sub_id =`subject`.subject_id AND student_room.room_detail_id = room_detail.room_detail_id AND room_detail.detail_id = detail.detail_id 
		AND student_room.std_id LIKE '$std_id%' AND location_table.order LIKE '$room%' AND room_detail.sub_id LIKE '$subject%' 
		AND room_detail.sub_group LIKE '$group_exam%' AND detail.day LIKE '$date%' AND detail.year LIKE '$year%' AND detail.term LIKE '$term%' 
		AND detail.type LIKE '$type_exam%'";
		$re_show = mysqli_query($con, $q_show);
	} else {
	
		$term = "";
		$year = "";
		$subject = "";
		$group_exam = "";
		$type_exam = "";
		$room = "";
		$date = "";
		$s_time = "";
		$e_time = "";
		$std_id = "";
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

        <title>Admin Template-ค้นหาบุคคล</title>
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

        <link href="dist/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
        <!-- BEGIN CSS for this page -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>

		<!-- sweet alert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>

        <!-- END CSS for this page -->

    </head>

    <body class="adminbody" ng-app="">
        <div id="main">
            <?php require 'menu/navmenu.php'; ?>

            <div class="content-page"><!-- start content-page-->
                <div class="content"><!--content-->
                    <div class="card mb-3"><!--card 1-->
                        <div class="card-header">
                            <h4 class="text-center">ค้นหาบุคคล</h4>
                        </div>
                        <div class="card-body">
                            <div class="contain"><!-- filter -->
                                <div class="row">
									
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
											<form action="search3.php" id = "form_search" method="post">
                                                <div class="row">
                                                    <!-- filter -->
                                                    <div class="col-md-3">
                                                        <label for="term">เทอม</label>
                                                        <select name="term" class="form-control select2" >
																<?php
																if ($term == '') {
																	echo '<option hidden selected  value="">ทั้งหมด</option>';
																} else {
																	echo '<option hidden selected  value="' . $term . '">' . $term . '</option>';
																}
																?>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1 text-center">
                                                        <br><br><label style="text-align:center;">/</label>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="year">ปีการศึกษา</label>
                                                        <select name="year" class="form-control select2" >
															<?php
																if ($year == '') {
																	echo '<option hidden selected  value="">ทั้งหมด</option>';
																} else {
																	echo '<option hidden selected  value="' . $year . '">' . $year . '</option>';
																}
																?>
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
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="sub">วิชา(รหัส)</label>
                                                            <select name="sub" class="form-control select2" >
															<?php
																if ($subject == '') {
																	echo '<option hidden selected  value="">ทั้งหมด</option>';
																} else {
																	echo '<option hidden selected  value="' . $subject . '">' . $subject . '</option>';
																}
																?>
                                                                <?php echo $option_sub ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="group">กลุ่มเรียน</label>
                                                            <input name="group_exam" type="text " placeholder="กรอกกลุ่มเรียน"
                                                                   maxlength="3" class="form-control" 
																<?php
																if ($group_exam == '') {
																	echo 'value = "" ';
																} else {
																	echo 'value = "'.$group_exam.'"';
																}
																?> >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="time">เวลา เริ่ม - สิ้นสุด</label>
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    <div class="input-group clockpicker" data-autoclose="true"
                                                                         data-placement="left" data-default='00.00'>
                                                                        <input type="text" class="form-control" name="s_time"
                                                                               placeholder="เวลาเริ่มต้น"
																			    <?php
																	if ($s_time == '') {
																	echo 'value = "" ';
																} else {
																	echo 'value = "'.$s_time.'"';
																}
																?> >
                                                                        <span class="input-group-addon">
                                                                            <span class="glyphicon glyphicon-time"></span>
                                                                        </span>
                                                                    </div>

                                                                </div>
                                                                <div class="col-md-2 text-center"><label style="text-align:center;">ถึง</label></div>
                                                                <div class="col-md-5">
                                                                    <div class="input-group clockpicker" data-autoclose="true"
                                                                         data-placement="right" data-default='00.00'>
                                                                        <input type="text" class="form-control" name="e_time"
                                                                               placeholder="เวลาสิ้นสุด" <?php
																if ($e_time == '') {
																	echo 'value = "" ';
																} else {
																	echo 'value = "'.$e_time.'"';
																}
																?>>
                                                                        <span class="input-group-addon">
                                                                            <span class="glyphicon glyphicon-time"></span>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="date">วันที่</label>
                                                            <input name="date" type="date" class="form-control " name="date" <?php
																if ($date == '') {
																	echo 'value = "" ';
																} else {
																	echo 'value = "'.$date.'"';
																}
																?> >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="type">ประเภท</label>
                                                            <select name="type_exam" class="form-control select2" >
															<?php
																if ($type_exam == '') {
																	echo '<option hidden selected  value="">ทั้งหมด</option>';
																} else {
																	echo '<option hidden selected  value="' . $type_exam . '">' . $type_exam . '</option>';
																}
																?>
                                                                <option>กลางภาค</option>
                                                                <option>ปลายภาค</option>
                                                                <option>แก้ผลการเรียน(I)</option>
                                                                <option>ย้อนหลัง</option>
                                                            </select>
                                                        </div>
                                                    </div>
													<div class="col-md-6">
                                                            
                                                            <label for="room">ห้อง</label>
                                                            <select name='room' class="form-control select2" >
															<?php
																if ($room == '') {
																	echo '<option hidden selected  value="">ทั้งหมด</option>';
																} else {
																	echo '<option hidden selected  value="' . $room . '">' . $room . '</option>';
																}
																?>
                                                            <?php echo $option_location ?>
                                                            </select>
                                                    </div>
													<div class="col-md-6">
													
													<br>
													<button class="btn btn-lm btn-info" style ="margin-top :8px" name="submit" type="submit">submit</button>
													
                                                    </div>
                                                </div>
												
												<input type="hidden" name="gogo">
											</form>	
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row"><!-- row 2 -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="id">รหัสนักศึกษา</label>
                                                            <input name = "std_id" class="form-control" form = "form_search" type="text" <?php
																if ($std_id == '') {
																	echo 'value = "" ';
																} else {
																	echo 'value = "'.$std_id.'"';
																}
																?> > 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
													<br>
													<button class="btn btn-lm btn-info" style ="margin-top :8px" type="submit" form = "form_search" >submit</button>
													</div>

                                                </div><!--end row 2 -->
                                                
                                            </div>
                                        </div>
										
                                    </div>
									
								</div><br>
                            </div><!--end filter -->
                        </div>
                    </div><!--end card 1-->
                    <div class="card"><!--card 2-->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="search3" class="table table-bordered">
                                    <thead>

                                    <div class="text-center">
                                        
                                        <a role="button" href="#"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_select"><i class="fa fa-minus"></i> ลบที่เลือก</a>

                                    </div>

                                   

                                    <!-- Small modal -->
                                    <div class="modal fade bd-example-modal-sm" id="delete_select" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">ลบข้อมูลที่เลือก</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-footer">
													<form action="server/del_select.php" id="form_1" method="get">
    
														<input type="hidden" name="hide_del_select" value = "5">
														<button type="submit" form="form_1" class="btn btn-danger btn-sm">Yes</button>
														<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
													</form>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end modal -->
                                    <tr>
                                        <th><label class="checkbox-inline"><input type="checkbox"  ng-model="all"> Check All</label></th>
                                        <th></th>
                                        <th>รหัสนักศึกษา</th>
										<th>ชื่อ - นามสกุล</th>
                                        <th>ห้อง</th>
                                        <th>วิชา</th>
                                        <th>กลุ่มเรียน</th>
                                        <th>ที่นั่ง</th>
                                        <th>วันที่</th>
                                        <th>เวลา</th>
                                        <th>ปีการศึกษา</th>
                                        <th>ประเภท</th>
                                        <th><span class="text-danger">*</span>หมายเหตุ</th>
                                    </tr>
                                    </thead>
                                    <tbody>
										<?php
											while($row_show = mysqli_fetch_array($re_show)){
										?>
                                        <tr>
                                            <td class="text-center" style = "width:100px " >
                                                <div class="form-check">
                                                    <input type="checkbox" form="form_1" name="del_cb[]" value="<?php echo $row_show['student_room_id']  ?>" ng-checked="all" class="form-check-input">
                                                </div>
                                            </td>
                                            <td style = "width:80px ">

                                                <div class="text-center">
                                                    <a role="button" href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $row_show['student_room_id'] ?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a role="button" href="#"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row_show['student_room_id'] ?>"><i class="fa fa-minus"></i></a>

                                                </div>
												<form action="search3.php" method = "POST" id ="button_form">
												<input type="hidden" name="std_id" value = "<?php echo $row_show['student_room_id']?>">
                                                <!-- Modal 1-->
                                                <div class="modal fade" id="edit<?php echo $row_show['student_room_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="loca" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="loca">แก้ไขหมายเหตุ</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            
                                                                            <div class="col-md-6">
                                                                                <label for="not0">หมายเหตุ</label>
                                                                                <input id="not0" class="form-control" type="text" name = "note">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                                <button type="submit" name = "edit" class="btn btn-primary btn-sm">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--end modal 1-->

                                                <!-- Small modal 2-->
                                                <div class="modal fade bd-example-modal-sm" id="delete<?php echo $row_show['student_room_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">ลบข้อมูล</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-footer">
																
																	<button type="submit" name = "delete" class="btn btn-danger btn-sm">Yes</button>
																	<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
																
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--end modal 2-->
												</form>
                                            </td>
                                            <td><?php echo $row_show['std_id'] ?></td>
											<td style = "width:200px "><?php echo $row_show['name'] ?></td>
                                            <td><?php echo $row_show['name_location'] ?></td>
                                            <td><?php echo $row_show['sub_id']." ".$row_show['subject_name'] ?></td>
                                            <td style = "width:10px "><?php echo $row_show['sub_group'] ?></td>
											<td><?php echo $row_show['seat'] ?></td>
                                            <td style = "width:80px "><?php echo DateThai($row_show['day']) ?></td>
                                            <td style = "width:120px " ><?php echo substr($row_show['time_start'], 0, 5) . " น. - " . substr($row_show['time_end'], 0, 5) . " น." ?></td>
                                            <td><?php echo $row_show['year'] ?></td>
                                            <td><?php echo $row_show['type'] ?></td>
                                            <td><?php echo $row_show['note'] ?></td>
                                        </tr>
										<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!--end card 2-->
                </div><!--end content-->
            </div>
            <!-- END content-page -->

            <footer class="footer">
			<?php require '../alert.php'; ?>
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

        <script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
        <script type="text/javascript">
            $('.clockpicker').clockpicker();
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
		
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

        <!-- Counter-Up-->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>			

        <script>
            $(document).ready(function () {
                // data-tables
                $('#search3').DataTable();
                $('.select2').select2();

            });
        </script>


        <!-- END Java Script for this page -->

    </body>
</html>
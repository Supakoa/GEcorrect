<?php
	// connect database 
	require 'server/server.php';
	$q_sub = "SELECT * FROM `subject` order by `subject_id`";
	$re_sub = mysqli_query($con, $q_sub);
	$i = 0;

	$option_sub = '<option hidden selected  value="">เลือกวิชา</option>';

	while ($row_sub = mysqli_fetch_array($re_sub)) {
		$option_sub.="<option value = \"" . $row_sub['subject_id'] . "\">" . $row_sub['subject_id'] . " : " . $row_sub['subject_name'] . "</option>";
		$i++;
	}

	$q_location = "SELECT `order`,`name_location` FROM `location_table` order BY `name_location`";
	$re_location = mysqli_query($con, $q_location);
	$j = 0;

	$option_location = '<option hidden selected  value="">สถานที่สอบ</option>';

	while ($row_location = mysqli_fetch_array($re_location)) {
		$option_location.='<option value = "' . $row_location['order'] . '"> ห้อง ' . $row_location['name_location'] . '</option>';
		$j++;
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
											<form action="" method="post">
                                                <div class="row">
                                                    <!-- filter -->
                                                    <div class="col-md-2">
                                                        <label for="term">เทอม</label>
                                                        <select name="term" class="form-control select2" required>
                                                            <option hidden selected value="">เลือกเทอม</option>
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
                                                        <select name="year" class="form-control select2" required>
                                                            <option hidden selected value="">เลือกปีการศึกษา</option>
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
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="sub">วิชา(รหัส)</label>
                                                            <select name="sub" class="form-control select2" required>
                                                                <?php echo $option_sub ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="group">กลุ่มเรียน</label>
                                                            <input name="group_exam" type="text " placeholder="กรอกกลุ่มเรียน"
                                                                   maxlength="3" class="form-control" required>
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
                                                                               placeholder="เวลาเริ่มต้น" required>
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
                                                                               placeholder="เวลาสิ้นสุด" required>
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
                                                            <input name="date" type="date" class="form-control " name="date"
                                                                   required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="type">ประเภท</label>
                                                            <select name="type_exam" class="form-control select2" required>
                                                                <option hidden selected value="">เลือกประเภท</option>
                                                                <option>กลางภาค</option>
                                                                <option>ปลายภาค</option>
                                                                <option>แก้ผลการเรียน(I)</option>
                                                                <option>ย้อนหลัง</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
												<br><button class="btn btn-sm btn-info" type="submit">submit</button>
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
                                                            <input id="id" class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6"></div>

                                                </div><!--end row 2 -->
                                                <button class="btn btn-sm btn-info" type="submit">submit</button>
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
                                        <a role="button" href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
                                            <i class="fa fa-plus"></i> เพิ่มข้อมูล
                                        </a>
                                        <a role="button" href="#"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_select"><i class="fa fa-minus"></i> ลบที่เลือก</a>

                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="loca" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="loca">เพิ่มข้อมูล</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="id1">รหัสนักศึกษา</label>
                                                                    <input id="id1" class="form-control" type="text" >
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="room0">ห้อง</label>
                                                                    <input id="room0" class="form-control" type="text">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="detail">Detail</label>
                                                                    <input id="detail" class="form-control" type="text">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="not">หมายเหตุ</label>
                                                                    <input id="not" class="form-control" type="text">
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
                                    </div><!--end modal -->

                                    <!-- Small modal -->
                                    <div class="modal fade bd-example-modal-sm" id="delete_select" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">ลบข้อมูล</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <div class="modal-footer">
													<form action="server/del_select.php" method="get">
														<button type="submit" form="form_1" class="btn btn-danger btn-sm">Yes</button>
														<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
													</form>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end modal -->
                                    <tr>
                                        <th><input type="checkbox" ng-model="all"></th>
                                        <th></th>
                                        <th>รหัสนักศึกษา</th>
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
											while(0){
										?>
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input type="checkbox" form="form_1" name="del_cb[]" value="<?php  ?>" ng-checked="all" class="form-check-input">
                                                </div>
                                            </td>
                                            <td>

                                                <div class="text-center">
                                                    <a role="button" href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a role="button" href="#"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete"><i class="fa fa-minus"></i></a>

                                                </div>

                                                <!-- Modal 1-->
                                                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="loca" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="loca">แก้ไข</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="container">
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label for="id0">รหัสนักศึกษา</label>
                                                                                <input id="id10" class="form-control" type="text" >
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="room01">ห้อง</label>
                                                                                <input id="room01" class="form-control" type="text">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="detail0">วิชา</label>
                                                                                <input id="detail0" class="form-control" type="text">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="detail0">ที่นั่งสอบ</label>
                                                                                <input id="detail0" class="form-control" type="text">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="not0">หมายเหตุ</label>
                                                                                <input id="not0" class="form-control" type="text">
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
                                                <div class="modal fade bd-example-modal-sm" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">ลบข้อมูล</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <div class="modal-footer">
																<form action="" method="post">
																	<button type="submit" class="btn btn-danger btn-sm">Yes</button>
																	<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
																</form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--end modal 2-->
                                            </td>
                                            <td>59122519023</td>
                                            <td>1701</td>
                                            <td>ge2011</td>
                                            <td>001</td>
                                            <td>23</td>
                                            <td>03-09-2562</td>
                                            <td>08.00-11.00</td>
                                            <td>2561</td>
                                            <td>ปลายภาค</td>
                                            <td></td>
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
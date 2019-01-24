<?php
    // connect database 
    require 'server/server.php';

    // check login
    if( !(isset($_SESSION['admin_id'])) ){
        $_SESSION['alert'] = 2;
        header("Location: ../index.php");
        exit();
    }

    
    if (isset($_POST['big_form'])) {//ลบที่เลือก
        
        foreach($_POST['del_cb'] as $del_id ){
            $q_del_sl = "SELECT `room_detail_id` FROM `room_detail` WHERE `detail_id` ='$del_id'";
            if($re_del_sl = mysqli_query($con, $q_del_sl)){
                while ($row_del_sl = mysqli_fetch_array($re_del_sl)) {
                    $del_room_id = $row_del_sl['room_detail_id'];
                    $q_del_std = "DELETE FROM `student_room` WHERE `room_detail_id` = '$del_room_id' ";
                    if($re_del_std = mysqli_query($con, $q_del_std)){
                        $_SESSION['alert'] = 12;
                    }
                    else{
                        header("Location: search2.php");
                            $_SESSION['alert'] = 4;
                            exit();
                    }
                }
                $q_del_rm = "DELETE FROM `room_detail` WHERE `detail_id` ='$del_id'";
                if($re_del_rm = mysqli_query($con, $q_del_rm)){
                    $q_del_dt = "DELETE FROM `detail` WHERE `detail_id` ='$del_id'";
                    if($re_del_dt = mysqli_query($con, $q_del_dt)){
                        $_SESSION['alert'] = 12;
                    }else{
                        header("Location: search2.php");
                        $_SESSION['alert'] = 4;
                        exit();
                    }
                }
                else{
                    header("Location: search2.php");
                    $_SESSION['alert'] = 4;
                    exit();
                }
                
            }
        }
    }

    if (isset($_POST['edit'])) { //แก้ไข
        $edit_id = $_POST['edit_id'];
        $edit_term =$_POST['term'];
        $edit_year =$_POST['year'];
        $edit_s_time = $_POST['s_time'];
        $edit_e_time = $_POST['e_time'];
        $edit_date = $_POST['date'];
        $edit_type_exam= $_POST['type_exam'];
        // echo $edit_id." - ".$edit_term." - ".$edit_year." - ".$edit_s_time." - ".$edit_e_time." - ".$edit_date." - ".$edit_type_exam ;
        $q_edit = "UPDATE `detail` SET `term`= '$edit_term' ,`year`='$edit_year',`day`='$edit_date',`time_start`='$edit_s_time',`time_end`='$edit_e_time',`type`='$edit_type_exam' WHERE `detail_id` = '$edit_id' ";
        if($re_edit = mysqli_query($con, $q_edit)){
            $_SESSION['alert'] = 10;
        }else{
            $_SESSION['alert'] = 11;
        }


    }

    if (isset($_POST['delete'])) { //ลบ
        $del_id = $_POST['delete_id'];
        // echo $del_id ;
        $q_del_sl = "SELECT `room_detail_id` FROM `room_detail` WHERE `detail_id` ='$del_id'";
        if($re_del_sl = mysqli_query($con, $q_del_sl)){
            while ($row_del_sl = mysqli_fetch_array($re_del_sl)) {
                $del_room_id = $row_del_sl['room_detail_id'];
                $q_del_std = "DELETE FROM `student_room` WHERE `room_detail_id` = '$del_room_id' ";
                if($re_del_std = mysqli_query($con, $q_del_std)){
                    $_SESSION['alert'] = 12;
                }
                else{
                    header("Location: search2.php");
                        $_SESSION['alert'] = 4;
                        exit();
                }
            }
            $q_del_rm = "DELETE FROM `room_detail` WHERE `detail_id` ='$del_id'";
            if($re_del_rm = mysqli_query($con, $q_del_rm)){
                $q_del_dt = "DELETE FROM `detail` WHERE `detail_id` ='$del_id'";
                if($re_del_dt = mysqli_query($con, $q_del_dt)){
                    $_SESSION['alert'] = 12;
                }else{
                    header("Location: search2.php");
                    $_SESSION['alert'] = 4;
                    exit();
                }
            }
            else{
                header("Location: search2.php");
                $_SESSION['alert'] = 4;
                exit();
            }
        }
    }


    function DateThai($strDate) {
        $strYear = date("Y", strtotime($strDate)) + 543;
        $strMonth = date("n", strtotime($strDate));
        $strDay = date("j", strtotime($strDate));
        $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }

    $q_sub = "SELECT * FROM `subject` order by `subject_id`";
    $re_sub = mysqli_query($con, $q_sub);
    $i = 0;
    $option_sub = '';
    while ($row_sub = mysqli_fetch_array($re_sub)) {
        $option_sub.="<option value = \"" . $row_sub['subject_id'] . "\">" . $row_sub['subject_id'] . " : " . $row_sub['subject_name'] . "</option>";
        $i++;
    }
    if (isset($_POST['gogo'])) {

        $term = $_POST['term'];
        $year = $_POST['year'];
        $subject = $_POST['subject'];
        $group_exam = $_POST['group_exam'];
        $type_exam = $_POST['type_exam'];
        // echo $term . $year . $subject . $group_exam;

        $q_show = "SELECT room_detail.detail_id,room_detail.sub_id,room_detail.sub_group,detail.term,detail.year,detail.type,detail.day,detail.time_start ,detail.time_end 
        FROM `room_detail`,`detail` 
        WHERE detail.detail_id = room_detail.detail_id 
            AND detail.term 
            LIKE '$term%' 
            AND detail.year 
            LIKE '$year%' 
            AND room_detail.sub_id 
            LIKE '$subject%' 
            AND room_detail.sub_group 
            LIKE '$group_exam%' 
            AND detail.type 
            LIKE '$type_exam%' 
            GROUP BY detail.detail_id";
        $re_show = mysqli_query($con, $q_show);

    } else {

        $term = "";
        $year = "";
        $subject = "";
        $group_exam = "";
        $type_exam = "";
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


		
        <!-- sweet alert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>

        <link href="dist/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
        <!-- END CSS for this page -->

        <script src="assets/js/jquery.min.js"></script>	

    </head>

    <body class="adminbody" ng-app="">

        <div id="main">

    <?php  require 'menu/navmenu.php';  ?>

            


            <div class="content-page"><!-- start content-page-->
                <div class="content " ><!--content-->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4 class="text-center">ค้นหาแบบกลุ่มสอบ</h4>
                        </div>
                        <div class="card-body " >
                            <form action="search2.php" method="post">
                                <div class="container"><!-- container -->
                                    <div class="row "><!-- row -->
                                        <div class="col-lg-2 "></div>
                                        <div class="col-lg-8 ">
                                            <div class="card"><!-- card 1 -->
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label for="term">เทอม</label>
                                                            <select name="term" class="form-control select2">
																<?php
																if ($term == '') {
																	echo '<option hidden selected  value="">ทั้งหมด</option>';
																} else {
																	echo '<option hidden selected  value="' . $term . '">' . $term . '</option>';
																}
																?>
                                                                <option value = "">ทั้งหมด</option>
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                            </select>

                                                        </div>
                                                        <!-- <div class="col-md-2">
                                                                <br><br><label >/</label>
                                                        </div> -->
                                                        <div class="col-md-3">
                                                            <label for="year">ปีการศึกษา</label>
                                                            <select name="year" class="form-control select2">
																<?php
																if ($year == '') {
																	echo '<option hidden selected  value="">ทั้งหมด</option>';
																} else {
																	echo '<option hidden selected  value="' . $year . '">' . $year . '</option>';
																}
																?>
                                                                <option value = "">ทั้งหมด</option>
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
                                                            <label for="subject">วิชา</label>
                                                            <select name="subject" class="form-control select2">
																<?php
																if ($subject == '') {
																	echo '<option hidden selected  value="">ทั้งหมด</option>';
																} else {
																	echo '<option hidden selected  value="' . $subject . '">' . $subject . '</option>';
																}
																?>
                                                                <option value = "">ทั้งหมด</option>
                                                                <?php echo $option_sub ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="group">กลุ่มเรียน</label>
                                                                <?php
                                                                if ($group_exam == '') {
                                                                    echo '<input name = "group_exam" type="text"  placeholder = "ทั้งหมด" value = "" maxlength="3"  class="form-control" >';
                                                                } else {
                                                                    echo '<input name = "group_exam" type="text"  placeholder = "" value = "' . $group_exam . '" maxlength="3"  class="form-control" >';
                                                                }
                                                                ?>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="subject">ประเภท</label>
                                                            <select name = "type_exam" class="form-control select2" >
                                                            <?php
                                                            if ($type_exam == '') {
                                                                echo '<option hidden selected  value="">ทั้งหมด</option>';
                                                            } else {
                                                                echo '<option hidden selected  value="' . $type_exam . '">' . $type_exam . '</option>';
                                                            }
                                                            ?>
                                                                <option value="">ทั้งหมด</option>
                                                                <option>กลางภาค</option>
                                                                <option>ปลายภาค</option>
                                                                <option>แก้ผลการเรียน(I)</option>	
                                                                <option>ย้อนหลัง</option>
                                                            </select>
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
                                <input type="hidden" name="gogo">
                            </form>
                        </div>
                    </div>
                    <div class="card"><!-- card 2 -->
                        <div class="card-body">
                            <form id="big_form" action="search2.php" method="post">
                                <input type="hidden" name="big_form">
								</form>
                                <div class="table-responsive"><!--table -->
                                    <table id="search2" class="table table-bordered">
                                        <thead>
                                        <div class="text-center">
                                            <a role="button" href="#"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_select"><i class="fa fa-minus"></i> ลบที่เลือก</a>
                                        </div>



                                        <tr>
											<th><input type="checkbox" ng-model="all">Check All</th>
                                            <th></th>
                                            <th>เทอม</th>
                                            <th>ปีการศึกษา</th>
                                            <th>วิชา</th>
                                            <th>กลุ่มเรียน</th>
                                            <th>วันที่</th>
                                            <th>เวลา</th>
                                            <th>ประเภท</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
											<?php
											while ($row_show = mysqli_fetch_array($re_show)) {
												$de_id = $row_show['detail_id'];
												?>
                                                <tr>
												<td class="text-center">
                                                        <div class="form-check">
                                                            <input name="del_cb[]" value = "<?php echo $de_id ?>" type="checkbox" class="form-check-input"   ng-checked="all" form = "big_form">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <a role="button" href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#info<?php echo $de_id ?>">
                                                                <i class="fa fa-file"></i></a><!-- modal 0 -->
                                                            <a role="button" href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $de_id ?>">
                                                                <i class="fa fa-pencil"></i></a><!-- modal 1 -->
                                                            <a role="button" href="#"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $de_id ?>">
                                                                <i class="fa fa-minus"></i></a><!-- modal 2 -->

                                                        </div>

                                                        <!-- Modal 0-->
                                                        <div class="modal fade" id="info<?php echo $de_id ?>" tabindex="-1" role="dialog" aria-labelledby="sea3" aria-hidden="true">
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
                                                                                                    <td><?php echo $row_show['year'] ?></td>
                                                                                                </tr>
                                                                                                
                                                                                                <tr>
                                                                                                    <th scope="row">เวลา</th>
                                                                                                    <td><?php echo substr($row_show['time_start'], 0, 5) . " น. - " . substr($row_show['time_end'], 0, 5) . " น." ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">วันที่</th>
                                                                                                    <td><?php echo DateThai($row_show['day']) ?></td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <th scope="row">ประเภท</th>
                                                                                                    <td><?php echo $row_show['type'] ?></td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>

                                                                                    <div class="table-responsive">
                                                                                        <table class="table">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th>#</th>
                                                                                                    <th>วิชา</th>
																									<th>กลุ่มเรียน</th>
                                                                                                    <th>ห้อง</th>
                                                                                                    <th>จำนวน</th>
                                                                                                    <th>อุปกรณ์</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
																								<?php
																								$i = 1;
																								$q_room = "SELECT * FROM `room_detail`,`location_table` WHERE room_detail.room_id = location_table.order  AND room_detail.detail_id = '$de_id' ORDER BY `name_location`,`sub_id`,`tool` ";
																								$re_room = mysqli_query($con, $q_room);
																								while ($row_room = mysqli_fetch_array($re_room)) {
																									?>
                                                                                                    <tr>
                                                                                                        <td class="text-center"><?php echo $i++ ?></td>
                                                                                                        <td><?php echo $row_room['sub_id'] ?></td>
																										<td><?php echo $row_room['sub_group'] ?></td>
                                                                                                        <td><?php echo $row_room['name_location'] ?></td>
                                                                                                        <td><?php echo $row_room['num'] ?></td>
                                                                                                        <td><?php echo $row_room['tool'] ?></td>
                                                                                                    </tr>
   																								 <?php } ?>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>								
                                                        <!--end modal 0-->

                                                        <!-- Modal 1-->
                                                        <div class="modal fade" id="edit<?php echo $de_id ?>" tabindex="-1" role="dialog" aria-labelledby="sea2" aria-hidden="true">
                                                            <form action="search2.php" id="form_edit<?php echo $de_id ?>" method="post">
                                                                <input type="hidden" name="edit">
                                                                <input type="hidden" name="edit_id" value = "<?php echo $de_id ?>">
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
																						<div class="col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label for="term">เทอม</label>
                                                                                                <select name="term" class="form-control select2">
                                                                                                    <option hidden selected  value="<?php echo $row_show['term'] ?>"><?php echo $row_show['term'] ?></option>
                                                                                                    <option>1</option>
                                                                                                    <option>2</option>
                                                                                                    <option>3</option>
                                                                                                   
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <div class="form-group">
                                                                                                <label for="year">ปีการศึกษา</label>
                                                                                                <select name="year" class="form-control select2">
                                                                                                    <option hidden selected  value="<?php echo $row_show['year'] ?>"><?php echo $row_show['year'] ?></option>
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
                                                                                        </div>
																						
                                                                                
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label for="time">เวลา</label>
                                                                                                <div class ="row" >
                                                                                                    <div class="col-md-5">
                                                                                                        <div class="input-group clockpicker" data-autoclose="true"  data-placement="left"  data-default = '00.00'>
                                                                                                            <input type="text" class="form-control" name = "s_time" placeholder = "เวลาเริ่มต้น" value = "<?php echo substr($row_show['time_start'], 0, 5) ?>" required >
                                                                                                            <span class="input-group-addon">
                                                                                                                <span class="glyphicon glyphicon-time"></span>
                                                                                                            </span>
                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div class="col-md-2 text-center"><label style="text-align:center;">ถึง</label></div>
                                                                                                    <div class="col-md-5">
                                                                                                        <div class="input-group clockpicker" data-autoclose="true"   data-placement="right"  data-default = '00.00'>
                                                                                                            <input type="text" class="form-control" name = "e_time" placeholder = "เวลาสิ้นสุด" value = "<?php echo substr($row_show['time_end'], 0, 5) ?>" required>
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
                                                                                                <input  type="date" class="form-control " name="date" value = "<?php echo $row_show['day'] ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <label for="type_exam">ประเภท</label>
                                                                                                <select name="type_exam" class="form-control select2">
                                                                                                    <option hidden selected  value="<?php echo $row_show['type'] ?>"><?php echo $row_show['type'] ?></option>
                                                                                                    <option>กลางภาค</option>
                                                                                                    <option>ปลายภาค</option>
                                                                                                    <option>แก้ผลการเรียน(I)</option>	
                                                                                                    <option>ย้อนหลัง</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                                            <button type="button" id = "submit_edit<?php echo $de_id ?>" class="btn btn-primary btn-sm">Save</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <script>
                                                            $(document).ready(function () {
                                                                $("#submit_edit<?php echo $de_id ?>").click(function () {
                                                                    $("#form_edit<?php echo $de_id ?>").submit();
                                                                });
                                                            });
                                                        </script>	
                                                        <!--end modal 1-->

                                                        <!-- Small modal 2-->
                                                        <div class="modal fade bd-example-modal-sm" id = "delete<?php echo $de_id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                           <form action="search2.php" id="form_delete<?php echo $de_id ?>" method="post">
														   <input type="hidden" name="delete">
                                                           <input type="hidden" name="delete_id" value = "<?php echo $de_id ?>">
														    <div class="modal-dialog modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">ลบข้อมูล</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>

                                                                    <div class="modal-footer">
                                                                        <button type="button" id = "submit_delete<?php echo $de_id ?>" class="btn btn-danger btn-sm">Yes</button>
                                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
                                                                    </div>
                                                                </div>
                                                            </div>
															</form>
                                                        </div>
														<script>
                                                            $(document).ready(function () {
                                                                $("#submit_delete<?php echo $de_id ?>").click(function () {
                                                                    $("#form_delete<?php echo $de_id ?>").submit();
                                                                });
                                                            });
                                                        </script>	
														
														<!--end modal 2-->
                                                    </td>
                                                    <td><?php echo $row_show['term'] ?></td>
                                                    <td><?php echo $row_show['year'] ?></td>
                                                    <td>
													<?php
													$q_check = "SELECT `sub_id` FROM `room_detail` WHERE `detail_id` = '$de_id' GROUP BY `sub_id` ";
													$re_check = mysqli_query($con, $q_check);
													$num_check = 0;
													while ($row_check = mysqli_fetch_array($re_check)) {
														$num_check++;
													}

													if ($num_check > 1) {
														echo "หลายวิชา";
														$mutiple = 1;
													} else {
														echo $row_show['sub_id'];
														
													}
													?>
                                                    </td>
													<?php 
													if(isset($mutiple)){
														echo "<td>หลายกลุ่ม</td>";
														unset($mutiple);
													}
													else{
														echo '<td>'.$row_show['sub_group'].'</td>';
													}
													?>
                                                    
                                                    <td><?php echo DateThai($row_show['day']) ?></td>
                                                    <td><?php echo substr($row_show['time_start'], 0, 5) . " น. - " . substr($row_show['time_end'], 0, 5) . " น." ?></td>
                                                    <td><?php echo $row_show['type'] . "----" . $de_id ?></td>
                                                    
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
                <!-- Small modal -->
                <div class="modal fade bd-example-modal-sm" id = "delete_select" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">ลบข้อมูล</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" form = "big_form" id="delete_select"  class="btn btn-danger btn-sm">Yes</button>
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
                            </div>
                        </div>
                    </div>
                </div><!--end modal -->
            </footer>

        </div>
		<script>
                $(document).ready(function () {
                    $("#delete_select").click(function () {
                        $("#big_formm").submit();
                    });
                });
            </script>

			 <?php require '../alert.php'; ?>
        <!-- END main -->

        <div><!--modal-->


        </div>

        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/moment.min.js"></script>

<!-- <script src="assets/js/jquery.min.js"></script>			 -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>

        <!-- App js -->
        <script src="assets/js/pikeadmin.js"></script>

        <!-- clockpicker -->
        <script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
        <script type="text/javascript">
                                                        $('.clockpicker').clockpicker();
        </script>

        <!-- BEGIN Java Script for this page -->
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
                                                            $('#search2').DataTable();
                                                            $('.select2').select2();




                                                        });
        </script>


        <!-- END Java Script for this page -->

    </body>
</html>
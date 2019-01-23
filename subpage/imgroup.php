<?php
require 'server/server.php';

function getToken($length) {
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= "0123456789";
    $max = strlen($codeAlphabet); // edited
    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[random_int(0, $max - 1)];
    }
    return $token;
}

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
if (isset($_POST['tab_room'])) {

    $term = $_POST['term'];
    $year = $_POST['year'];
    $date = $_POST['date'];
    $s_time = $_POST['s_time'];
    $e_time = $_POST['e_time'];
    $type_exam = $_POST['type_exam'];
    $file = $_FILES['file_csv']['tmp_name'];
    $detail_id = "DT" . getToken(10);
    //insert detial
    $q_detail = "INSERT INTO `detail`(`detail_id`, `term`, `year`, `day`, `time_start`, `time_end`, `type`) VALUES ( '$detail_id','$term','$year','$date','$s_time','$e_time','$type_exam')";
    if ($re_detail = mysqli_query($con, $q_detail)) {

        $sub = $_POST['sub'];
        $group_exam = $_POST['group_exam'];
        $i = 0;
        $num[] = '';
        $sum_num = 0;
        foreach ($_POST['tab_num'] as $value) {
            $num[$i] = $value;
            $sum_num += $value;
            $i++;
        }
        foreach ($_POST['com_num'] as $value) {
            $num[$i] = $value;
            $sum_num += $value;
            $i++;
        }
        $i = 0;
        $room[] = '';
        foreach ($_POST['tab_room'] as $value) {
            $std_num  = $num[$i];
            $room_id = "RD" . getToken(10);
            
            $q_room = "INSERT INTO `room_detail`(`room_detail_id`, `room_id`, `detail_id`, `sub_id`, `sub_group`,`num`,`tool`) VALUES ('$room_id','$value','$detail_id','$sub','$group_exam','$std_num','TABLET')";
            if ($re_room = mysqli_query($con, $q_room)) {
                $room[$i++] = $room_id;
            } else {
                header("Location: imgroup.php");
                $_SESSION['alert'] = 4;
                exit();
            }
        }
        foreach ($_POST['com_room'] as $value) {
            $std_num  = $num[$i];
            $room_id = "RD" . getToken(10);
            $q_room = "INSERT INTO `room_detail`(`room_detail_id`, `room_id`, `detail_id`, `sub_id`, `sub_group`,`num`,`tool`) VALUES ('$room_id','$value','$detail_id','$sub','$group_exam','$std_num','COMPUTER')";
            if ($re_room = mysqli_query($con, $q_room)) {
                $room[$i++] = $room_id;
            } else {
                header("Location: imgroup.php");
                $_SESSION['alert'] = 4;
                exit();
            }
        }
        
       

        if (($handle = fopen("$file", "r")) !== FALSE) {
            $i = 0;
            $student[] = '';
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

                $value = implode("','", $data);
                $student[$i] = $value;
                $i++;

            }
            $sum_std = $i;
            $i = 0;
            $s = 0;
           if($sum_num<$sum_std){
                 header("Location: imgroup.php");
                 $_SESSION['alert'] = 21;//จำนวนรวมน้อยกว่าจำนวนรายชื่อในไฟล์
                 exit();
           }
           elseif($sum_num>$sum_std){
                header("Location: imgroup.php");
                $_SESSION['alert'] = 22;//จำนวนรวมมากกว่าจำนวนรายชื่อในไฟล์
                exit();
           }
           else{
            
            foreach ($room as $a) {
                $j = 1;
                $cout = $num[$i];
                while ($j <= $cout) {
                    $sr_id = "SR" . getToken(10);
                    $std = $student[$s++];
                    $q_sub = "INSERT INTO `student_room`(`student_room_id`, `std_id`, `room_detail_id`, `seat`, `note`) VALUES ('$sr_id','$std','$a','$j','')";
                    if ($re_sub = mysqli_query($con, $q_sub)) {
                        $_SESSION['alert'] = 3;
                    } else {
                        header("Location: imgroup.php");
                        $_SESSION['alert'] = 4;
                        exit();
                    }
                    $j++;
                }
                $i++;
            }

           }
           
            
        }
    }
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

    <link href="dist/bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />

    <!-- sweet alert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>

    <!-- END CSS for this page -->

</head>

<body class="adminbody">

    <div id="main">

        <?php require 'menu/navmenu.php'   ?>


        <div class="content-page">
            <!-- content-page -->

            <div class="content">
                <!-- content -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h4 class="text-center">นำเข้าข้อมูลแบบกลุ่มเรียน</h4>
                    </div>

                    <div class="card-body">
                        <!-- card-body -->
                        <form action="imgroup.php" method="post" id="form1" class="formsingha" enctype="multipart/form-data" >
                            <!-- FORM WOWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW-->

                            <div class="container">

                                <div class="card">
                                    <div class="card-body">
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
                                                        <option>แก้ไอ</option>
                                                        <option>ย้อนหลัง</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end filter -->
                                        <div class="text-center">
                                            <!-- up file -->
                                            <input class="btn btn-md" type="file" name="file_csv" accept=".csv"  form ="form1" required>
                                        </div>
                                        <!--end up file -->
                                    </div>
                                </div>
                                <hr>

                                <div class="card">
                                    <div class="row">
                                        <!-- row all -->
                                        <div class="col-lg-12">
                                            <div class="row">

                                                <div class="col-lg-6" style="border-right: 1px solid #DFDFDF;">
                                                    <!-- row tablet -->
                                                    <div style="card-header ">
                                                        <h3 class="text-center">Tablet</h3>
                                                    </div>
                                                    <div class="card-body " id="tablet_main">
                                                        <div class="row form-group">
                                                            <div class="col-md-4">
                                                                <!-- room & Value -->
                                                                <label for="room">1.ห้อง</label>
                                                                <select name='tab_room[]' class="form-control select2"
                                                                    required>
                                                                    <?php echo $option_location ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4"></div>
                                                            <div class="col-md-4 ">
                                                                <label for="value">จำนวน</label>
                                                                <input class="form-control" type="number" min="0" name="tab_num[]"
                                                                    required>
                                                            </div>
                                                            <!--end room & Value -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row computer -->
                                                <div class="col-lg-6">
                                                    <!-- row computer -->
                                                    <div style="card-header ">
                                                        <h3 class="text-center">Computer</h3>
                                                    </div>
                                                    <div class="card-body" id="computer_main">
                                                        <div class="row form-group" id="computer">
                                                            <div class="col-md-4 ">
                                                                <!-- room & Value -->
                                                                <label for="room1">1.ห้อง</label>
                                                                <select name="com_room[]" class="form-control select2"
                                                                    required>
                                                                    <?php echo $option_location ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4"></div>
                                                            <div class="col-md-4">
                                                                <label for="value1">จำนวน</label>
                                                                <input class="form-control" type="number" min="0" name="com_num[]"
                                                                    required>
                                                            </div>
                                                            <!--end room & Value -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row computer -->

                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <!-- buttom -->
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="text-center">
                                                        <a class="btn btn-sm btn-info" id="btn1"><i class="fa fa-plus"></i></a>

                                                        <a class="btn btn-sm btn-danger" id="btn11"> X </a>
                                                    </div><br>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="text-center">
                                                        <a class="btn btn-sm btn-info" id="btn2"><i class="fa fa-plus"></i></a>
                                                        <a class="btn btn-sm btn-danger" id="btn22"> X </i></a>
                                                    </div><br>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end buttom -->
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <hr>
                                                <button class="btn btn-xm btn-success text-center" id="submit" type="submit">submit</button>
                                                <br><br>
                                            </div>
                                            <!--end row all -->
                                        </div>

                                    </div>
                                    <!--end row all -->
                                </div>

                            </div>
                        </form><!-- FORM WOWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW-->

                    </div><!-- end card-body -->
                </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <script type="text/javascript" src="dist/bootstrap-clockpicker.min.js"></script>
    <script type="text/javascript">
        $('.clockpicker').clockpicker();
    </script>
    <script>
        $(document).ready(function () {
            // data-tables
            $('#example1').DataTable();
            $('.select2').select2();
        });
    </script>
    <script>
        $(document).ready(function () {
            var i = 1;
            var j = 1;
            var sum = '<?php echo $option_location; ?>'
            $("#btn1").click(function () {
                $("#tablet_main").append(function () {
                    i++;
                    var tablet = '';
                    tablet +=
                        '<div class="row form-group" id = "tablet" ><div class="col-md-4 "> <label  for="room">' +
                        i +
                        '.ห้อง</label><select name="tab_room[]" class="form-control select2" required>' +
                        sum +
                        '</select></div><div class="col-md-4"></div><div class="col-md-4 "><label for="value">จำนวน</label><input  class="form-control" type="number" min="0" name = "tab_num[]" required></div></div>';
                    return tablet;
                });
            });
            $("#btn2").click(function () {
                $("#computer_main").append(function () {
                    j++;
                    var computer = '';
                    computer +=
                        '<div class="row form-group" id ="computer" ><div class="col-md-4 "><label for="room">' +
                        j +
                        '.ห้อง</label><select name="com_room[]"  class="form-control select2" required>' +
                        sum +
                        '</select></div><div class="col-md-4"></div><div class="col-md-4 "><label for="value">จำนวน</label><input  class="form-control" type="number" min="0" name = "com_num[]" required ></div></div><!--end room & Value -->';
                    return computer;
                });
            });


            $("#submit").click(function () {
                $("#form1").submit();
            });
            $("#btn11").click(function () {
                if (i > 1) {
                    i--;
                }

                $("#tablet:last-child").remove();
            });
            $("#btn22").click(function () {
                if (j > 1) {
                    j--;
                }
                $("#computer:last-child").remove();
            });
        });
    </script>

    <!-- END Java Script for this page -->

</body>

</html>
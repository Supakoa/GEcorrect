<?php
// connect database 
require 'server/server.php';
if(!isset($_SESSION['signature'])){
    $_SESSION['signature'] = 0 ;
}
function DateThai($strDate) {
    $strYear = date("Y", strtotime($strDate)) -2500 + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}

if (isset($_POST['create_pdf'])) {
    $detail_id = $_POST['detail_id'];
    echo $detail_id;
    $q_sl_room = "SELECT `room_detail_id` FROM `room_detail` WHERE `detail_id` ='$detail_id'";
    if ($re_sl_room = mysqli_query($con, $q_sl_room)) {
		$num_room = 0 ;
		while ($row_sl_room = mysqli_fetch_array($re_sl_room)) {
			$num_room++;
		}
		$re_sl_room = mysqli_query($con, $q_sl_room);

        require_once __DIR__ . '/vendor/autoload.php';

        $mpdf = new \Mpdf\Mpdf([
            'default_font_size' => 12,
            'default_font' => 'sarabun',
            "sarabun" => 'B',
            'format' => 'A4',
            'margin_left' => 1,
            'margin_right' => 1,
            'margin_top' => 35,
            'mode' => 'utf-8',
        ]);


        $keep_table_proportions = true;
        $ignore_table_percents = true;
        $ignore_table_width = true;
        $mpdf->shrink_tables_to_fit = 1;

            $num_page = 0;
            $row_sl_room = mysqli_fetch_array($re_sl_room);
            $r_d_id = $row_sl_room['room_detail_id'];
            $q_head = "SELECT detail.* , subject.subject_name,location_table.name_location FROM `room_detail`,`detail`,`subject`,`location_table` WHERE location_table.order = room_detail.room_id AND detail.detail_id =room_detail.detail_id AND room_detail.sub_id = subject.subject_id AND room_detail.room_detail_id = '$r_d_id' AND room_detail.detail_id = '$detail_id' ";
            $re_head = mysqli_query($con, $q_head);
            $row_head = mysqli_fetch_array($re_head);
          
           
			$head_term =$row_head['term'];
			$head_year = $row_head['year'];
			$head_date =DateThai($row_head['day']);
			$head_time =substr($row_head['time_start'], 0, 5) . " น. - " . substr($row_head['time_end'], 0, 5) . " น.";
            $head_location = $row_head['name_location'];
            $head = '
            <html>
                <head>
                    <style>
                        @page {
                            size: auto;
                            odd-header-name: html_MyHeader1;
                        }
                        
                    </style>
                </head>
                <body>
                    <htmlpageheader name="MyHeader1">
                        <div>
                                
                                <div style="text-align: center; font-weight: bold; font-size: 12pt;padding-top: 10px;">
                                <span>รายชื่อนักศึกษาสอบ ภาคเรียนที่ ' . $head_term . '/' . $head_year . '</span><br><span>สำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทรอนิกส์ : มหาวิทยาลัยราชภัฎสวนสุนันทา</span><br><span>วันที่ ' . $head_date . ' เวลา ' . $head_time . ' ห้อง ' . $head_location . '</span>
                                </div>
                        </div>
                        
                        ';
        
                        if($_POST['signature']){
                            $_SESSION['signature'] = 1 ;
                            $head .= ' 
                            <img src="banner/Im_Yoona_signature.png" style="width: 50mm; height: 50mm;margin-top:250mm;margin-left:170mm">
                        ';
                       }else{
                        $_SESSION['signature'] = 0 ;
                       }
                       $head .= '</htmlpageheader>
                </body>
            </html>
        
            ';
        while ($num_page<$num_room) {
            
         
            $q_show = "SELECT student_room.student_room_id,student_room.std_id,student.name,location_table.name_location,`subject`.subject_name,`subject`.subject_id,room_detail.sub_id,room_detail.sub_group,student_room.seat,detail.day,detail.time_start,detail.time_end,detail.term,detail.year,detail.type,student_room.note 
			FROM `student_room`,`location_table`,`room_detail`,`student`,`subject`,`detail`
			WHERE student_room.std_id = student.std_id AND location_table.order=room_detail.room_id AND room_detail.sub_id =`subject`.subject_id AND student_room.room_detail_id = room_detail.room_detail_id AND room_detail.detail_id = detail.detail_id 
            AND detail.detail_id = '$detail_id' AND room_detail.room_detail_id = '$r_d_id' order by student_room.seat ";
            $re_show = mysqli_query($con, $q_show);


            $thead = '
	<html>
		<head>
			<style>
					table,th,td{
						border: 1pt solid black;
						border-collapse: collapse;
						margin-top:1px;
						margin-button:1px;
						padding: 2px;
					}
					table{
						table-layout: auto;
						margin-left:20px;
						width:100%;
						margin-right:20px;
					}
					table.layout {
						text-align:center;
						margin-top:1px;
						margin-left:5px;
						margin-right:5px;
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
				<table autosize="1">
					<thead>
						<tr>
							<th style="width:20pt;">ลำดับ</th>
							<th style="width:60pt;">รหัสนักศึกษา</th>
							<th style="width:120pt;">ชื่อ-นามสกุล</th>
							<th style="width:120pt;">วิชาที่สอบ</th>
							<th style="width:50pt;">วันที่สอบ</th>
							<th style="width:60pt;">เวลาที่สอบ</th>
							<th style="width:30pt;">ห้องสอบ</th>
							<th style="width:120pt;">ลายเซ็น</th>
						</tr>
					</thead>
				';



            $tbody = '<tbody>';
            while ($row_show = mysqli_fetch_array($re_show)) {
				$seat =$row_show['seat'];
				$std_id = $row_show['std_id'];
				$name =$row_show['name'];
				$sub = $row_show['subject_id']." ".$row_show['subject_name'] ; 
				$date = DateThai($row_show['day']);
				$time = substr($row_show['time_start'], 0, 5) . " - " . substr($row_show['time_end'], 0, 5)  ;
				$lo_name =substr($row_show['name_location'], 0, 4) ;
                $tbody.= '	<tr>
								<td style="text-align:center">' . $seat . '</td>
								<td style="text-align:center">' . $std_id . '</td>
								<td>' . $name . '</td>
								<td style="text-align:center">' . $sub . '</td>
								<td style="text-align:center">' . $date . '</td>
								<td style="text-align:center">' . $time . '</td>
								<td style="text-align:center">' . $lo_name . '</td>
								<td></td>
							</tr>';
            }

            $tbody.='				</tbody>
					</table>
			
	';

            $footer = '
			
			<br>
			<div style="text-align:right;margin-right:10px">
				<span>จำนวนนักศึกษาที่เข้าสอบ.................คน</span><br>
				<span>จำนวนนักศึกษาที่ขาดสอบ.................คน</span><br>
			</div>
			
			<div style="text-align:left;margin-right:10px;margin-left:10px">
				<span>ปัญหาที่พบ ';
            for ($i = 0; $i < 500+90; $i++) {
                $footer.= '.';
            }
            $footer.='<br>การแก้ปัญหาเบื้องต้น ';

            for ($i = 0; $i < 500+90; $i++) {
                $footer.= '.';
            }

            $footer.= ' </span><br>
		<input type="checkbox"> <span> ไม่พบปัญหา</span>
		</div><br/><br/>
        <div style="text-align:right;margin-right:10px">
        
			<span>กรรมการคุมสอบ 1 ...................................................................................................</span><br>
			<span>กรรมการคุมสอบ 2 ...................................................................................................</span><br>
            <span>กรรมการคุมสอบ 3 ...................................................................................................</span><br>
        </div>
        
		</body>
	</html>
	';
            $mpdf->WriteHTML($head);
            $mpdf->WriteHTML($thead);
            $mpdf->WriteHTML($tbody);
			$mpdf->WriteHTML($footer);
			++$num_page;
			if($num_page<$num_room){
                $row_sl_room = mysqli_fetch_array($re_sl_room);
                $r_d_id = $row_sl_room['room_detail_id'];
                $q_head = "SELECT detail.* , subject.subject_name,location_table.name_location FROM `room_detail`,`detail`,`subject`,`location_table` WHERE location_table.order = room_detail.room_id AND detail.detail_id =room_detail.detail_id AND room_detail.sub_id = subject.subject_id AND room_detail.room_detail_id = '$r_d_id' AND room_detail.detail_id = '$detail_id' ";
                $re_head = mysqli_query($con, $q_head);
                $row_head = mysqli_fetch_array($re_head);
              
                $head_term =$row_head['term'];
                $head_year = $row_head['year'];
                $head_date =DateThai($row_head['day']);
                $head_time =substr($row_head['time_start'], 0, 5) . " น. - " . substr($row_head['time_end'], 0, 5) . " น.";
                $head_location = $row_head['name_location'];
                $head = '
                <html>
                    <head>
                        <style>
                            @page {
                                size: auto;
                                odd-header-name: html_MyHeader1;
                            }
                            
                        </style>
                    </head>
                    <body>
                        <htmlpageheader name="MyHeader1">
                            <div>
                                    
                                    <div style="text-align: center; font-weight: bold; font-size: 12pt;padding-top: 10px;">
                                    <span>รายชื่อนักศึกษาสอบ ภาคเรียนที่ ' . $head_term . '/' . $head_year . '</span><br><span>สำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทรอนิกส์ : มหาวิทยาลัยราชภัฎสวนสุนันทา</span><br><span>วันที่ ' . $head_date . ' เวลา ' . $head_time . ' ห้อง ' . $head_location . '</span>
                                    </div>
                            </div>
                            
                            ';
            
                            if($_POST['signature']){
                                $_SESSION['signature'] = 1 ;
                                $head .= ' 
                                <img src="banner/Im_Yoona_signature.png" style="width: 50mm; height: 50mm;margin-top:230mm;margin-left:170mm">
                            ';
                           }else{
                            $_SESSION['signature'] = 0 ;
                           }
                           $head .= '</htmlpageheader>
                    </body>
                </html>
            
                ';
                $mpdf->WriteHTML($head);
                $mpdf->AddPage();
				
					}
			
        }
        $mpdf->Output();
        exit();
    } else {
        header("Location: report.php");
        $_SESSION['alert'] = 4;
        exit();
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
    $q_show = "SELECT room_detail.detail_id,room_detail.sub_id,room_detail.sub_group,detail.term,detail.year,detail.type,detail.day,detail.time_start ,detail.time_end 
	FROM `room_detail`,`detail`  WHERE 0";
    $re_show = mysqli_query($con, $q_show);
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" />
    <!-- END CSS for this page -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>

<body class="adminbody" ng-app="">

    <div id="main">

        <?php require 'menu/navmenu.php'    ?>


        <div class="content-page">
            <!-- content-page -->
            <div class="content">
                <!-- content -->
                <div class="container-fluid">
                    <!--container-fluid -->

                    <div class="card mb-3">
                        <!-- filter card -->
                        <div class="card-header">
                            <h4 class="text-center">รายงาน PDF</h4>
                        </div>
                        <div class="card-body">
                            <form action="report.php" method="post">
                                <div class="container">
                                    <!-- container -->
                                    <div class="row ">
                                        <!-- row -->
                                        <div class="col-lg-2 "></div>
                                        <div class="col-lg-8 ">
                                            <div class="card">
                                                <!-- card 1 -->
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
                                                                <option value="">ทั้งหมด</option>
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
                                                                <option value="">ทั้งหมด</option>
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
                                                                <option value="">ทั้งหมด</option>
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
                                                            <select name="type_exam" class="form-control select2">
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
                                            </div>
                                            <!--end card 1 --> <br>
                                        </div>
                                    </div><!-- end row -->
                                    <div class="text-center">
                                        <button class="btn btn-sm btn-success" type="submit">submit</button>
                                    </div>
                                </div>
                                <!--end container -->
                                <input type="hidden" name="gogo">
                            </form>
                        </div>
                    </div>
                    <!--end filter card -->

                    <div class="card">
                        <!-- card 2 -->
                        <div class="card-body">
                            <form id="big_form" action="search2.php" method="post">
                                <input type="hidden" name="big_form">
                            </form>
                            <div class="table-responsive">
                                <!--table -->
                                <table id="report" class="table table-bordered">
                                    <div class="row text-center">
                                        <div class="col-lg-4"></div>
                                        <div class="col-lg-2">
                                            <a role="button" href="#" class="btn btn-danger btn-md" data-toggle="modal"
                                                data-target="#delete_select"><i class="fa fa-minus"></i> ลบที่เลือก</a>
                                        </div>
                                        <div class="col-lg-2 text-center">
                                            <p>

                                                <?php
                                        if($_SESSION['signature']){
                                            echo ' <select class="form-control select2" id="signature_select">
                                            <option value="1">แสดงลายเซ็นต์</option>
                                            <option value="0">ไม่แสดงลายเซ็นต์</option>
                                         
                                        </select>';
                                        }else{
                                            echo ' <select class="form-control select2" id="signature_select">
                                            <option value="0">ไม่แสดงลายเซ็นต์</option>
                                            <option value="1">แสดงลายเซ็นต์</option>
                                            
                                         
                                        </select>' ;
                                        }
                                        ?>
                                            </p>
                                        </div>
                                        <div class="col-lg-4"></div>

                                    </div>
                                    <thead>
                                        <tr>
                                            <th class="text-center"><label class="checkbox-inline"><input type="checkbox"
                                                        ng-model="all">
                                                    Check All</label></th>
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
                                                    <input name="del_cb[]" value="<?php echo $de_id ?>" type="checkbox"
                                                        class="form-check-input" ng-checked="all" form="big_form">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <form action="report.php" method="post" id="form_signature<?php echo $de_id ?>">
                                                    </form>
                                                    <button class="btn btn-sm btn-warning signature_bt" form="form_signature<?php echo $de_id ?>"
                                                        formtarget="_blank" type="submit" name="create_pdf">PDF</button>

                                                    <input form="form_signature<?php echo $de_id ?>" type="hidden" name="detail_id"
                                                        value="<?php echo $de_id ?>">
                                                    <input form="form_signature<?php echo $de_id ?>" type="hidden"
                                                        class="signature_hide" name="signature" value="0">
                                                    <button href="#" class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#info<?php echo $de_id ?>">
                                                        <i class="fa fa-file"></i>
                                                    </button><!-- modal 0 -->
                                                </div>

                                                <!-- Modal 0-->
                                                <div class="modal fade" id="info<?php echo $de_id ?>" tabindex="-1"
                                                    role="dialog" aria-labelledby="sea3" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="sea3">ข้อมูล</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-borderless">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">ปีการศึกษา</th>
                                                                                <td>
                                                                                    <?php echo $row_show['year'] ?>
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th scope="row">เวลา</th>
                                                                                <td>
                                                                                    <?php echo substr($row_show['time_start'], 0, 5) . " น. - " . substr($row_show['time_end'], 0, 5) . " น." ?>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">วันที่</th>
                                                                                <td>
                                                                                    <?php echo DateThai($row_show['day']) ?>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th scope="row">ประเภท</th>
                                                                                <td>
                                                                                    <?php echo $row_show['type'] ?>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered">
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

                                                                                <td class="text-center">
                                                                                    <?php echo $i++ ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $row_room['sub_id'] ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $row_room['sub_group'] ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $row_room['name_location'] ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $row_room['num'] ?>
                                                                                </td>
                                                                                <td>
                                                                                    <?php echo $row_room['tool'] ?>
                                                                                </td>
                                                                            </tr>

                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end modal 0-->

                                            </td>
                                            <td>
                                                <?php echo $row_show['term'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row_show['year'] ?>
                                            </td>
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
                                                    if (isset($mutiple)) {
                                                        echo "<td>หลายกลุ่ม</td>";
                                                        unset($mutiple);
                                                    } else {
                                                        echo '<td>' . $row_show['sub_group'] . '</td>';
                                                    }
                                                    ?>

                                            <td>
                                                <?php echo DateThai($row_show['day']) ?>
                                            </td>
                                            <td>
                                                <?php echo substr($row_show['time_start'], 0, 5) . " น. - " . substr($row_show['time_end'], 0, 5) . " น." ?>
                                            </td>
                                            <td>
                                                <?php echo $row_show['type'] . "----" . $de_id ?>
                                            </td>

                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div><!-- end table -->

                        </div>
                    </div><!-- card 2 --><br>

                    <div class="card mb-3">
                        <!-- signature card-->
                        <div class="card-header">
                            <h4 class="text-center">signature</h4>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12 ">
                                        <div class="mx-auto" style="width:400px;" >
                                            <img src="banner/Im_Yoona_signature.png"  class="rounded mx-auto d-block"
                                                style="width: 100%;"><br>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-2 text-center">
                                        <input type="file" class="form-control btn">
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <button class="btn btn-sm btn-success">Upload Signature</button>
                                        <p>Size 400*400 <br>Type*PNG*</p>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end signature card-->

        </div><!-- END container-page -->
    </div>
    <!-- END main -->

    <footer class="footer">

    </footer>

    </div>
    <!-- END main -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

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
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".signature_bt").click(function () {
                $(".signature_hide").val($("#signature_select").val());
            });

        });
    </script>
    <script>
        $(document).ready(function () {
            // data-tables
            $('#report').DataTable();
            $('.select2').select2();
        });
    </script>

    <!-- Counter-Up-->
    <script src="assets/plugins/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>



    <!-- END Java Script for this page -->

</body>

</html>
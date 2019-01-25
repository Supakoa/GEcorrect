<?php
require 'server.php';
session_start();

if(!isset($_SESSION['id'])){
    $_SESSION['alert'] = 2;
    header("Location: index.php");
    exit();
}

function DateThai($strDate) {
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}
//pre footer
$q1 = "SELECT * FROM `show_url` WHERE group_url = '1' AND hide = '0' ";
$q2 = "SELECT * FROM `show_url` WHERE group_url = '2' AND hide = '0' ";
$result1 = mysqli_query($con, $q1);
$result2 = mysqli_query($con, $q2);
//banner
$q_web =  "SELECT * FROM `web_show_time` ";
$web_result = mysqli_query($con,$q_web);
$web_row = mysqli_fetch_array($web_result);
$_SESSION['footer'] = $web_row['footer'];
$_SESSION['banner'] = $web_row['banner'];
$year = $_SESSION['year'];

$term = $_SESSION['term'];
$a = $_SESSION['id'];

//student
$std = "SELECT * FROM `student` WHERE std_id = '$a' ";
$std_result = mysqli_query($con,$std);
$row = mysqli_fetch_array($std_result);

//detail
$detail = "SELECT * FROM `detail` ";
$detail_result = mysqli_query($con,$detail);
$row2 = mysqli_fetch_array($detail_result);

// require 'checklogin.php';
// $a = $row2['id'];
// $b = $_SESSION['year'];
// $c = $_SESSION['term'];
// if ($_GET['id'] == 1) {
//     $_SESSION['type'] = "กลางภาค";
// } elseif ($_GET['id'] == 2) {
//     $_SESSION['type'] = "ปลายภาค";
// } elseif ($_GET['id'] == 3) {
//     $_SESSION['type'] = "แก้ไขผลการเรียน(I)";
// }
$d = $_GET['id'];
$_SESSION['type'] = $d;

// if ($d == "แก้ไขผลการเรียน(I)" && $c == 1) {
//     $b--;
//     $c = 2;
// }
// else if ($d == "แก้ไขผลการเรียน(I)" && $c == 2){
//     $c=1;
// }
// $user = "SELECT * FROM student_table WHERE user_id = '$a'";
// $q = "SELECT * FROM student_table WHERE user_id = '$a' AND exam_year = '$b' AND exam_term = '$c' AND exam_type = '$d'";
// $result1 = mysqli_query($con, $user);
// $result = mysqli_query($con, $q);
// $row1 = mysqli_fetch_array($result1);

//table
$table = "SELECT student.std_id, student_room.seat, student_room.note, room_detail.tool,  location_table.name_location,location_table.url_location, subject.*, detail.day, detail.time_start, detail.time_end  FROM `student`,`student_room`,`room_detail`,`location_table`,`subject`,`detail` WHERE student.std_id = student_room.std_id AND student_room.room_detail_id = room_detail.room_detail_id AND room_detail.room_id = location_table.order AND room_detail.sub_id = subject.subject_id AND room_detail.detail_id = detail.detail_id AND detail.type = '$d' AND student_room.std_id = '$a' AND detail.year = '$year' AND detail.term = '$term' ";
$table_result = mysqli_query($con,$table);
// $row3 = mysqli_fetch_array($table_result)

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
        crossorigin="anonymous">
    <link rel="stylesheet" href="node_modules/font.css">
    <title>ระบบตรวจสอบที่นั่ง</title>
</head>

<body>

    <header>
        <img src="image/ge-test.png" width="100%" height="auto" class="img-fluid" alt="Responsive image">

    </header>

    <nav class="navbar navbar-expand-md navbar-light" style="background:#55236d">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="Imag/GElogo.png" alt="Logo" width="75" height="auto">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn btn-md" href="main.php" style="color:white;"><span class="fas fa-home"></span></a>
                    </li>
                    <li class="nav-item">
                        <a href="http://gen-ed.ssru.ac.th/page/contact-us" target="_blank" class="nav-link btn btn-md"
                            style="color:white;"><span>ติดต่อสอบถาม</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-md nav-link" href="logout.php" style="color:white;"><span class="fas fa-sign-out-alt"></span>
                            logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><br>

    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header text-center" style="background:#55236d">
                            <p style="color:white">ข้อมูลนักศึกษา</p>
                        </div>
                        <div class="card-body">
                            <div class="row ">
                                <div class="col-md-4">
                                    <p style="color:#55236d" id="n">ชื่อ-นามสกุล</p>
                                    <p style="color:#55236d" id="i">รหัสนักศึกษา</p>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-6">

                                    <p id="n">
                                        <?php echo $row['name'] ?>
                                    </p>
                                    <p id="i">
                                        <?php echo $row['std_id'] ?>
                                    </p>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-header" style="background:#55236d">
                            <p style="color:white">ตรวจสอบที่นั่งสอบ</p>
                        </div>
                        <div class="card-body">
                            <div class="btn-group-vertical container-fluid dropdown">
                                <a class="btn btn-light btn-md" href="checkseat.php?id=กลางภาค" style="background:#dd99ff">กลางภาค</a>
                                <a class="btn btn-light btn-md" href="checkseat.php?id=ปลายภาค" style="background:#dd99ff">ปลายภาค</a>
                                <a class="btn btn-light btn-md" href="checkseat.php?id=แก้ไขผลการเรียน(I)" style="background:#dd99ff">แก้ไขผลการเรียน
                                    ( I )</a>
                                <a class="btn btn-light btn-md dropdown-toggle" style="background:#dd99ff"
                                    id="drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">อื่นๆ
                                </a>
                                <div class="dropdown-menu" aria-labelledby="drop" style="background:#dd99ff">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-sm table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <?php 
                                $pitook = '<th style="color:white;background-color: #55236d;border-radius:5px" colspan="7"><h4 >ตารางสอบวัดความรู้ '.$d." ปีการศึกษา" . $_SESSION['term'] . "/" .$_SESSION['year'].'</h4></th>';
                                $pitook2 = '<th style="color:white;background-color: #55236d;border-radius:5px" colspan="7"><h4 >ตารางสอบวัดความรู้ '.$d.'</h4></th>';
                                
                                if ($d == "แก้ไขผลการเรียน(I)") {
                                    echo $pitook2;
                                } else {
                                    echo $pitook;
                                }
                                ?>
                    <tr>
                    <tr class="text-center">
                        <th>วิชา</th>
                        <th>วันที่สอบ</th>
                        <th>เวลาสอบ</th>
                        <th>สถานที่</th>
                        <th>อุปกรณ์ที่ใช้สอบ</th>
                        <th>ที่นั่งสอบ</th>
                        <th>หมายเหตุ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
                    
                    
                    while ($row3 = mysqli_fetch_array($table_result)) { ?>
                    <?php
                                         

                                        ?>
                    <tr style="text-align: center">
                        <td style="text-align:left">
                            <?php echo $row3['subject_id'] . " " . $row3['subject_name'] ?>
                        </td>
                        <td>
                            <?php echo DateThai($row3['day']) ?>
                        </td>
                        <td>
                            <?php echo substr($row3['time_start'], 0, 5) . " น. - " . substr($row3['time_end'], 0, 5) . " น." ?>
                        </td>
                        <td>
                            <?php echo $row3['name_location'] ?><br>
                            <a href="<?php echo $row3['url_location'] ?>" target="_blank"><i class="fas fa-map-marked-alt"
                                    style="font-size: 40px; "></i></a>

                        </td>
                        <td>

                            <?php echo $row3['tool'] ?>

                            <?php if ($row3['tool'] == "TABLET") : ?>
                            <br>
                            <i class="fas fa-tablet-alt" style="font-size: 50px;"></i>
                            <?php endif; ?>
                            <?php if ($row3['tool'] == "COMPUTER") : ?>
                            <br>
                            <i class="fas fa-desktop" style="font-size: 50px;"></i>
                            <?php endif; ?>

                        </td>

                        <td>
                            <?php echo $row3['seat'] ?>
                        </td>
                        <td>
                            <?php echo $row3['note'] ?>
                        </td>
                    </tr>

                    <?php 
                                    } ?>
                    <tr style="border-collapse: collapse">
                        <td colspan="6">
                            *** หากไม่พบข้อมูล ติดต่อได้ที่จุด one stop service
                        </td>
                        <td>
                            <a href="print.php?id=" target="_blank" class="btn btn-link">Print</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
    <br>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-center" style="color:#55236d">เว็ปไซต์ที่เกี่ยวข้อง</h4>
                            <ul>
                                <?php
                                      while ($row1 = mysqli_fetch_array($result1)) {
                                  ?>
                                <li><a href="<?php echo $row1['url']; ?>" target="_blank">
                                        <?php echo $row1['text']; ?></a></li>
                                <?php
                                      }
                                  ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-center" style="color:#55236d">เอกสารที่เผยแพร่</h4>
                            <ul>
                                <?php
                                      while ($row2 = mysqli_fetch_array($result2)) {
                                        ?>
                                <li><a href="ser_side/uploads/<?php echo $row2['url']; ?> " target="_blank">
                                        <?php echo $row2['text']; ?></a></li>
                                <?php
                                      }
                                      ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br>
    <footer class="container-fluid" style="background:#f6f6f6;height:">
        <div class="text-center">
            <br>
            <h5>
                <?php
                echo $web_row['footer'];
                ?>
            </h5>
        </div>
    </footer>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script src="node_modules/bootstrap/dist/js/dropdown.js.map"></script>
    <script src="link.js"></script>
</body>

</html>
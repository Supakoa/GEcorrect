<?php
  require 'server.php';
  session_start();

  if(!isset($_SESSION['id'])){
    $_SESSION['alert'] = 2;
    header("Location: index.php");
    exit();
  }

  $a = $_SESSION['id']." ";
  $b = $_SESSION['year']." ";
  $c = $_SESSION['term']." ";
  $d = $_SESSION['type']." ";
  $name = $_SESSION['name']." ";
  $std = $_SESSION['std_id']." ";
  
  // $user = "SELECT * FROM student WHERE std_id = '$a'";
  // $q = "SELECT * FROM student WHERE std_id = '$a' AND exam_year = '$b' AND exam_term = '$c' AND exam_type = '$d'";
  // $result_detail = mysqli_query($con,$detail);
  // $result = mysqli_query($con,$q);
  // $row_detail = mysqli_fetch_array($result_detail);

  //student
  $table = "SELECT student.name, student.std_id, student_room.seat, student_room.note, room_detail.tool,  
                    location_table.name_location,location_table.url_location, subject.*, 
                    detail.day, detail.time_start, detail.time_end  
            FROM `student`,`student_room`,`room_detail`,`location_table`,`subject`,`detail` 
            WHERE student.std_id = student_room.std_id 
                  AND student_room.room_detail_id = room_detail.room_detail_id 
                  AND room_detail.room_id = location_table.order 
                  AND room_detail.sub_id = subject.subject_id 
                  AND room_detail.detail_id = detail.detail_id 
                  AND detail.type = '$d' 
                  AND student_room.std_id = '$a' 
                  AND detail.year = '$b' 
                  AND detail.term = '$c' ";
  $table_result = mysqli_query($con,$table);
  // $row_table = mysqli_fetch_array($table_result);

  function DateThai($strDate) {
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strMonthCut = Array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
    integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="node_modules/font.css">
  <title>Document</title>
</head>

<body>
  <br><br>
  <div class="container-fluid">

    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6 text-center">
        <img src="image/eddd219671f4e3e2333be5105343e18dd0ba426a.png" class="img-fluid" alt="Responsive image"
          width="110" height="140">
      </div>
      <div class="col-lg-3"></div>
    </div>

    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8 text-center">
        <h3>สำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทรอนิกส์</h3>
      </div>
      <div class="col-lg-2"></div>
    </div>

    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6 text-center">
        <h3> มหาวิทยาลัยราชภัฏสวนสุนันทา </h3>
      </div>
      <div class="col-lg-3"></div>
    </div>

    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6 text-center">
        <h5>
          <?php echo "ชื่อ-สกุล ".$name." "." รหัสนักศึกษา ".$std; ?>
        </h5>
      </div>
      <div class="col-lg-3"></div>
    </div>

    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6 text-center">
        <h5 style="width: 100%;height: 30px;">ตารางสอบวัดความรู้
          <?php echo $d ?> ปีการศึกษา
          <?php echo $c."/".$b ?>
        </h5>
      </div>
      <div class="col-lg-3"></div>
    </div>

  </div>
  <section class="container-fluid" style="height: 100%">
    <div class="container">
      <div id="resultsTable">
        <div class="table-responsive text-nowrap">

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
                    } ?>
              </tr>

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
                while ($row3 = mysqli_fetch_array($table_result)) { 
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
                  <?php echo $row3['tool']; 
                        if ($row3['tool'] == "TABLET") : ?>
                  <br>
                  <i class="fas fa-tablet-alt" style="font-size: 50px;"></i>
                  <?php endif; 
                        if ($row3['tool'] == "COMPUTER") : ?>
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

              <?php } ?>
              <tr style="border-collapse: collapse">
                <td colspan="6">
                  *** หากไม่พบข้อมูล ติดต่อได้ที่จุด one stop service
                </td>
                <td>
                  <a href="print.php" target="_blank" class="btn btn-link">Print</a>
                </td>
              </tr>

            </tbody>

          </table>

        </div>
      </div>
    </div>
    <br>

    <div class="row">
      <div class="col-lg-12 text-center">
        <button class="btn btn-danger" onclick="myFunction()">Print</button>
      </div>
    </div>

    <br>
  </section>

  <footer class="text-center">
    *** หากไม่พบข้อมูล กรุณาติดต่อสอบถามได้ที่จุด one stop service อาคาร34 ชั้น1 <br>
    สำนักวิชาการศึสำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทรอนิกส์ ติดต่อ 02-160-1265-70 <br><br>
  </footer>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
  </script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
  </script>

  <script src="node_modules/jquery/dist/jquery.min.js"></script>
  <script src="node_modules/popper.js/dist/popper.min.js"></script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script>
    function myFunction() {
      window.print();
    }
  </script>
</body>

</html>
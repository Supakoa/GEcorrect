<?php
require 'server.php';
session_start();
$a = $_SESSION['id'];
$b = $_SESSION['year'];
$c = $_SESSION['term'];
$d = $_SESSION['type'];
$user = "SELECT * FROM student_table WHERE user_id = '$a'";
  $q = "SELECT * FROM student_table WHERE user_id = '$a' AND exam_year = '$b' AND exam_term = '$c' AND exam_type = '$d'";
  $result1 = mysqli_query($con,$user);
  $result = mysqli_query($con,$q);
  $row1 = mysqli_fetch_array($result1);



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
  <title>Document</title>
</head>

<body>
  <br><br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4 text-center">
        <img src="image/eddd219671f4e3e2333be5105343e18dd0ba426a.png" class="img-fluid" alt="Responsive image" width="110"
          height="140">
      </div>
      <div class="col-lg-4"></div>
    </div>
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4 text-center">
        <br>
        <h3>สำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทรอนิกส์</h3>

      </div>
      <div class="col-lg-4"></div>
    </div>
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4 text-center">
        <h3> มหาวิทยาลัยราชภัฏสวนสุนันทา </h3>
      </div>
      <div class="col-lg-4"></div>
    </div>
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4 text-center">
        <h4>
          <?php echo "ชื่อ ".$row1['user_title']." ".$row1['user_first_name']." นามสกุล ".$row1['user_last_name']." รหัสนักศึกษา ".$row1['user_id'];
                             ?>
        </h4>
      </div>
      <div class="col-lg-4"></div>
    </div>
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4 text-center">
        <h4 style="width: 100%;height: 30px;">ตารางสอบวัดความรู้
          <?php echo $d ?> ปีการศึกษา
          <?php echo $c."/".$b ?>
        </h4>
      </div>
      <div class="col-lg-4"></div>
    </div>
  </div>
  <section class="container-fluid" style="height: 100%">
    <div class="container">
      <div id="resultsTable">
        <div class="table-responsive">
          <table class="table table-striped table-sm table-bordered" style="width:100%">
            <thead>
              <tr>
                <th style="color:white;background-color: #55236d;border-radius:5px" colspan="7">
                  <h4>ตารางสอบวัดความรู้
                    <?php echo $d ?> ปีการศึกษา 1/2561</h4>
                </th>
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
              <?php while($row =mysqli_fetch_array($result)){ ?>
              <?php
                                        $l_name = $row['exam_location'];
                                        $q_location =  "SELECT * FROM `location_table` WHERE name_location = '$l_name' ";
                                        $l_result = mysqli_query($con,$q_location);
                                        $l_row = mysqli_fetch_array($l_result);
                                        $sub = $row['exam_subject'];
                                        $q_sub = "SELECT * FROM `subject`  WHERE sub_id = '$sub' ";
                                        $re_sub = mysqli_query($con, $q_sub);
                                        $sub_row = mysqli_fetch_array($re_sub);


                                        ?>
              <tr style="text-align: center">
                <td style="text-align:left">

                  <?php echo $row['exam_subject'] . " " . $sub_row['id_name'] ?>

                </td>
                <td>

                  <?php echo $row['exam_date'] ?>

                </td>
                <td>

                  <?php echo $row['exam_time']?>

                </td>
                <td>

                  <?php echo $row['exam_location'] ?>


                  <a href="<?php echo $l_row['url_location'] ?>" target="_blank"><i class="fas fa-map-marked-alt" style="font-size: 40px; "></i></a>

                </td>
                <td>

                  <?php echo $row['exam_tool'] ?>


                  <?php if ($row['exam_tool']=="Tablet"): ?>
                  <i class="fas fa-tablet-alt" style="font-size: 50px;"></i>
                  <?php endif; ?>
                  <?php if ($row['exam_tool']=="Computer"): ?>
                  <i class="fas fa-desktop" style="font-size: 50px;"></i>
                  <?php endif; ?>

                </td>

                <td>

                  <?php echo $row['exam_seat'] ?>

                </td>
                <td>

                  <?php echo $row['note'] ?>

                </td>
              </tr>

              <?php } ?>
              <tr style="border-collapse: collapse">
                <td colspan="6">
                  *** หากไม่พบข้อมูล ติดต่อได้ที่จุด one stop service
                </td>
                <td>

                  <a href="print.php" class="btn btn-link"></a>

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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>

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
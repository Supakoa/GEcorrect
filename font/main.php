<?php
 require 'server.php';
  session_start();
  $q1 =  "SELECT * FROM `show_url` WHERE group_url = '1' AND hide=0 ";
  $q2 =  "SELECT * FROM `show_url` WHERE group_url = '2' AND hide=0";
$result1 = mysqli_query($con,$q1);
$result2 = mysqli_query($con,$q2);
//   require 'checklogin.php';
  $a = $_SESSION['id'];
  $y = $_SESSION['year'] ;
  $t = $_SESSION['term'];
  $q = "SELECT * FROM student_table WHERE user_id = $a AND exam_year = $y";
  $result = mysqli_query($con,$q);
  $row = mysqli_fetch_array($result);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
        crossorigin="anonymous">
    <link rel="stylesheet" href="node_modules/font.css">
    <title>หน้าหลัก</title>

    <style>
        .btn {
            transition: 1 s;text - decoration: none;text - align: left;
        }
        .btn: hover {
                background: #ffffff;color: #000; }
    </style>

</head>

<body>
    <header>
        <?php
    //  $banner = "SELECT * FROM `baner` WHERE `id` = 1";
    //  $sth2 = mysqli_query($con,$banner);
    //  $ImYourFather=mysqli_fetch_array($sth2,MYSQLI_ASSOC);
    //  $sing = $ImYourFather['name_baner'];
 
    //  $sql = "SELECT * FROM images WHERE name_pic = '$sing' ";
    //  $sth = mysqli_query($con,$sql);
    //  $Baner=mysqli_fetch_array($sth);
    //  echo '<img src="data:image/jpeg;base64,'.base64_encode( $Baner['image'] ).'" alt="ssru" style="width:100%"  title="มหาลัยราชภัฎสวนสุนันทา"/>';
    // ?>
        <img src="<?php echo $_SESSION['banner'] ?>" class="img-fluid" alt="Responsive image">

    </header>

    <div class="container-fluid" style="background:#55236d">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light" style="background:#55236d">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link btn btn-md" href="main.php" style="color:white;margin-left:30px"><span
                                    class="fas fa-home"></span></a>
                        </li>
                        <li class="nav-item">
                            <a href="http://gen-ed.ssru.ac.th/page/contact-us" target="_blank" class="nav-link btn btn-md"
                                    style="color:white;margin-left:20px"><span>ติดต่อสอบถาม</span></a>
                        </li>
                        <li class="nav-item">
                            <div style="text-align:right"></div>
                            <a class="nav-link btn btn-md" href="logout.php" style="color:white;margin-left:20px"><span
                                    class="fas fa-sign-out-alt"></span> logout</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

    </div><br>
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
                                    <p style="color:#55236d" id="n">ชื่อ</p>
                                    <p style="color:#55236d" id="l">นามสกุล</p>
                                    <p style="color:#55236d" id="i">รหัสนักศึกษา</p>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-6">

                                    <p id="n">
                                    555555555555555555<!-- <?php echo $row['user_title']." ".$row['user_first_name'] ?> -->
                                    </p>
                                    <p id="l">
                                       acdsfsdfsd <?php echo $row['user_last_name'] ?>
                                    </p>
                                    <p id="i">
                                        59122519023<?php echo $row['user_id'] ?>
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
                                <button class="btn btn-light btn-md" href="checkseat.php?id=1" style="background:#dd99ff">กลางภาค</button>
                                <button class="btn btn-light btn-md" href="checkseat.php?id=2" style="background:#dd99ff">ปลายภาค</button>
                                <button class="btn btn-light btn-md" href="checkseat.php?id=3" style="background:#dd99ff">แก้ไขผลการเรียน
                                    ( I )</button>
                                <button class="btn btn-light btn-md dropdown-toggle" style="background:#dd99ff" type="button"
                                    id="drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">อื่นๆ
                                </button>
                                <div class="dropdown-menu" aria-labelledby="drop">
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
            <p>
                <?php
            echo $_SESSION['footer'];
        ?>
            </p>

            <br>
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
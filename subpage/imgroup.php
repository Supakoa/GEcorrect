<?php
$i = 0;
$sum = "";
while ($i < 10) {
    $sum.="<option>" . $i . "</option>";
    $i++;
}

if (isset($_POST['tab_room'])) {

    print_r($_POST['tab_room']);
    echo "<br>";
    print_r($_POST['tab_num']);
    echo "<br>";
    print_r($_POST['com_room']);
    echo "<br>";
    print_r($_POST['com_num']);
    echo "<br>";
    echo $_POST['term'];
    echo "<br>";
    echo $_POST['time'];
    echo "<br>";
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

        <!-- BEGIN CSS for this page -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
        <!-- END CSS for this page -->

    </head>

    <body class="adminbody">

        <div id="main">

            <?php //require 'menu/navmenu.php'  ?>


            <div class="content-page"><!-- content-page -->

                <div class="content"><!-- content -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <h4 class="text-center">นำเข้าข้อมูลแบบกลุ่มเรียน</h4>
                        </div>

                        <div class="card-body"><!-- card-body -->
                            <form action="imgroup.php" method="post" id = "form1" class ="formsingha" style="background-color: red"><!-- FORM WOWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW-->

                                <div class="container">

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row"><!-- filter -->
                                                <div class="col-md-2">
                                                    <label for="term">เทอม</label>
                                                    <select name="term" class="form-control select2">
                                                        <option>1</option>
                                                        <option>2</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-1 text-center">
                                                    <br><br><label style="text-align:center;">/</label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="year">ปีการศึกษา</label>
                                                    <select name="year" class="form-control select2">
                                                        <option>2561</option>
                                                        <option>2560</option>
                                                        <option>2559</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="subj">วิชา(รหัส)</label>
                                                        <select name="subj" class="form-control select2">
                                                            <option>GEL1101</option>
                                                            <option>GEL1102</option>
                                                            <option>GEL1103</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="group">กลุ่มเรียน</label>
                                                        <select name="group" class="form-control select2">
                                                            <option>101</option>
                                                            <option>201</option>
                                                            <option>302</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="time">เวลา</label>
                                                        <select name="time" class="form-control select2">
                                                            <option>08.00 - 11.00 น.</option>
                                                            <option>11.00 - 14.00 น.</option>
                                                            <option>14.00 - 17.00 น.</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="date">วันที่</label>
                                                        <input name="date" type="date" class="form-control " name="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="cate">ประเภท</label>
                                                        <select name="cate" class="form-control select2">
                                                            <option>กลางภาค</option>
                                                            <option>ปลายภาค</option>
                                                            <option>แก้ไอ</option>	
                                                            <option>ย้อนหลัง</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div><!--end filter -->
                                            <div class="text-center"><!-- up file -->
                                                <input class="btn btn-md" type="file">
                                            </div><!--end up file -->
                                        </div>
                                    </div>
                                    <hr>

                                    <div class="card">
                                        <div class="row"><!-- row all -->
                                            <div class="col-lg-12">
                                                <div class="row">

                                                    <div class="col-lg-6" style="border-right: 1px solid #DFDFDF;"><!-- row tablet -->
                                                        <div style="card-header ">
                                                            <h3 class="text-center">Tablet</h3>
                                                        </div>
                                                        <div class="card-body" >

                                                            <div class="row form-group" id = "tablet" >
                                                                <div class="col-md-4"><!-- room & Value -->
                                                                    <label for="room">1.ห้อง</label>
                                                                    <select name='tab_room[]'  class="form-control select2">
                                                                        <?php echo $sum ?>
                                                                    </select>		
                                                                </div>
                                                                <div class="col-md-4"></div>
                                                                <div class="col-md-4 ">
                                                                    <label for="value">จำนวน</label>
                                                                    <input  class="form-control" type="number" min="0" name = "tab_num[]" >
                                                                </div><!--end room & Value -->
                                                            </div>
                                                        </div>
                                                    </div><!--end row computer -->
                                                    <div class="col-lg-6"><!-- row computer -->
                                                        <div style="card-header ">
                                                            <h3 class="text-center">Computer</h3>
                                                        </div>
                                                        <div class="card-body" >
                                                            <div class="row form-group" id ="computer" >
                                                                <div class="col-md-4 " ><!-- room & Value -->
                                                                    <label for="room1">1.ห้อง</label>
                                                                    <select name="com_room[]"  class="form-control select2">
                                                                        <?php echo $sum ?>
                                                                    </select>	
                                                                </div>
                                                                <div class="col-md-4"></div>
                                                                <div class="col-md-4">
                                                                    <label for="value1">จำนวน</label>
                                                                    <input class="form-control" type="number" min="0" name = "com_num[]" >
                                                                </div><!--end room & Value -->
                                                            </div>
                                                        </div>
                                                    </div><!--end row computer -->

                                                </div>
                                            </div>

                                            <div class="col-lg-12"><!-- buttom -->
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="text-center">
                                                            <a class="btn btn-sm btn-info" id = "btn1"><i class="fa fa-plus"></i></a>
                                                        </div><br>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="text-center">
                                                            <a class="btn btn-sm btn-info" id = "btn2"><i class="fa fa-plus"></i></a>
                                                        </div><br>
                                                    </div>
                                                </div>
                                            </div><!--end buttom -->

                                            <button class="btn btn-sm btn-success" id = "submit" type="submit">submit</button>
                                        </div><!--end row all -->
                                    </div>

                                </div>
                            </form><!-- FORM WOWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW-->

                        </div><!-- end card-body -->
                    </div>
                </div><!--end content-->

            </div>
            <!-- END content-page -->

            <footer class="footer">

            </footer>

        </div>
        <!-- END main -->

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

        <script>

                    $(document).ready(function () {
            // data-tables
            $('#example1').DataTable();
                    $('.select2').select2();
            });        </script>
        <script>

                    $(document).ready(function(){
            var i = 1;
                    var j = 1;
                    var sum = '<?php echo $sum ?>'
                    $("#btn1").click(function(){
            $("#tablet").append(function(){
            i++;
                    var tablet = '';
                    tablet += '<div class="col-md-4"><label for="room">' + i + '.ห้อง</label><select name="tab_room[]" class="form-control select2">' + sum + '</select></div><div class="col-md-4"></div><div class="col-md-4 "><label for="value">จำนวน</label><input  class="form-control" type="number" min="0" name = "tab_num[]"></div><!--end room & Value -->';
                    return tablet;
            });
            });
                    $("#btn2").click(function(){
            $("#computer").append(function(){
                 j++;
                                var computer = '';
                                computer += '<div class="col-md-4"><label for="room">' + j + '.ห้อง</label><select name="com_room[]"  class="form-control select2">' + sum + '</select></div><div class="col-md-4"></div><div class="col-md-4 "><label for="value">จำนวน</label><input  class="form-control" type="number" min="0" name = "com_num[]"></div><!--end room & Value -->';
                return computer;
        });
  });

 
  $("#submit").click(function(){
    $("#form1").submit();
  });
});
        </script>

        <!-- END Java Script for this page -->

    </body>
</html>
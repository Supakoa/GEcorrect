<?php
  require 'server.php';
  
  session_start();
  
  $login_id = mysqli_real_escape_string($con,$_POST['text']);
  $login_pw = mysqli_real_escape_string($con,$_POST['password']);

  $sql = "SELECT * FROM student_table WHERE login_username=? AND login_password=?";
  $stmt = mysqli_prepare($con,$sql);
  mysqli_stmt_bind_param($stmt,"ss",$login_id,$login_pw);
  mysqli_execute($stmt);
  $result_user = mysqli_stmt_get_result($stmt);
  $_SESSION['status'] = 0; //online
  if ($result_user->num_rows >=1) {
    $_SESSION['id'] = $login_id;
    header("Location: main.php");
  }else{
    $_SESSION['status'] = 1; //not match
    header("Location: index.php");
  }

  //ReCAPTSHA
  $captcha;//ตัวแปร
  if(isset($_POST['g-recaptcha-response'])){
  $captcha=$_POST['g-recaptcha-response'];
  }
  if(!$captcha){
  echo '<h2>โปรดยืนยันตัวตนของคุณ</h2>';
  exit;
  }
  $secretKey = "6LedMIwUAAAAAB5C2WYf3tRWSNWpvXIOphG7JiVg";
  $ip = $_SERVER['REMOTE_ADDR'];
  $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
  $responseKeys = json_decode($response,true);
  if(intval($responseKeys['success']) !== 1) {
  echo '<h2>โปรดทำการยันยืนให้ถูกต้อง</h2>';
  } else {
  echo '<h2>ขอบคุณสำหรับคอมเม้น</h2>';
  }
 ?>

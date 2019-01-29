<?php
    if (isset($_SESSION['alert'])) {
        switch ($_SESSION['alert']) {
            // กรอกข้อมูลไม่ถูกต้อง
            case '1':
                echo "  <script>
                            Swal({
                                type: 'error',
                                title: 'กรอกข้อมูลผิดพลาด',
                                text: 'กรอกข้อมูลใหม่อีกครั้ง.',
                                // footer: '<a href>Why do I have this issue?</a>'
                            });
                        </script>";
            break;

            case '2':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'กรุณาเข้าสู่ระบบ',
                            text: 'แสดงตัวตนทุกครั้งก่อนเข้าสู่ระบบ.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;
            
            case '3':
                echo "
                    <script>
                        Swal({
                            type: 'success',
                            title: 'เพิ่มข้อมูลสำเร็จ',
                            text: 'ข้อมูลเข้าสู่ระบบเรียบร้อย.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '4':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'เพิ่มข้อมูลไม่สำเร็จ',
                            text: 'เกิดข้อผลิตพลาดในการนำเข้าข้อมูล.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '5':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'ชื่อผู้ตรวจซ้ำกัน',
                            text: 'กรุณาใส่ชื่อผู้ตรวจใหม่อีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '6':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'ยืนยัน password และ email ไม่ตรงกัน',
                            text: 'กรุณากรอกใหม่อีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '7':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'ยืนยัน password ไม่ตรงกัน',
                            text: 'กรุณากรอกใหม่อีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '8':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'ยืนยัน email ไม่ตรงกัน',
                            text: 'กรุณากรอกใหม่อีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '9':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'username นี้ถูกใช้งานไปแล้ว',
                            text: 'กรุณาใช้ชื่อใหม่.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '10':
                echo "
                    <script>
                        Swal({
                            type: 'success',
                            title: 'แก้ไขข้อมูลสำเร็จ',
                            text: 'ข้อมูลเข้าสู่ระบบเรียบร้อย.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '11':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'แก้ไขข้อมูลไม่สำเร็จ',
                            text: 'เกิดข้อผลิตพลาดในการนำเข้าข้อมูล.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '12':
                echo "
                    <script>
                        Swal({
                            type: 'success',
                            title: 'ลบข้อมูลสำเร็จ',
                            text: 'ข้อมูลถูกลบออกจากระบบเรียบร้อย.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '13':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'ลบข้อมูลไม่สำเร็จ',
                            text: 'เกิดข้อผลิตพลาดในการลบข้อมูล.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '14':
                echo "
                    <script>
                        Swal({
                            type: 'question',
                            title: 'ข้อมูลไม่ถูกต้อง',
                            text: 'เข้าสู่ระบบอีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '15':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'ไฟล์ใหญ่เกินไป (มากกว่า 60MB)',
                            text: 'ลองอัพโหลดใหม่อีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '16':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'อัพโหลดได้เฉพาะไฟล์ pdf เท่านั้น',
                            text: 'อัพโหลดใหม่อีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '17':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'อัพโหลดได้เฉพาะไฟล์ jpg,png เท่านั้น',
                            text: 'อัพโหลดใหม่อีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '18':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'ไม่ได้อยู่ในขอบเขตเวลาที่กำหนด',
                            text: 'กรุณารอกำหนดการใหม่.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '19':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'ID นี้ถูกใช้งานไปแล้ว',
                            text: 'กรุณาใช้ชื่อใหม่.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '20':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'พบข้อมูลซ้ำกันในฐานข้อมูล',
                            text: 'กรุณาใช้ชื่อใหม่.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '21':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'จำนวนรวมน้อยกว่าจำนวนนักศึกษาจากไฟล์ที่อัพโหลด',
                            text: 'อัพโหลดใหม่อีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '22':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'จำนวนรวมมากกว่าจำนวนนักศึกษาจากไฟล์ที่อัพโหลด',
                            text: 'อัพโหลดใหม่อีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '23':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'อัพโหลดได้เฉพาะไฟล์ csv เท่านั้น',
                            text: 'อัพโหลดใหม่อีกครั้ง.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '24':
                echo "
                    <script>
                        Swal({
                            type: 'error',
                            title: 'ถูกระงับการใช้งาน',
                            text: 'กรุณารอการอณุมัติการเข้าสู่ระบบ.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            case '25':
                echo "
                    <script>
                        Swal({
                            type: 'warning',
                            title: 'การอัพโหลดเกิดปัญหา',
                            text: 'เกิดการทับซ้อนกันของข้อมูลแต่ข้อมูลเก่ายังอยู่ในฐานข้อมูล.',
                            // footer: '<a href>Why do I have this issue?</a>'
                        });                    
                    </script>";
            break;

            // $_SESSION['alert'] = 0 or null
            default:
                # code...
                break;
        }
    }
    unset($_SESSION['alert']);

    /** 
    * 0,null -> ไม่มีการทำงาน
    * 1 -> กรอกข้อมูลผิดพลาด
    * 2 -> กรุณาเข้าสู่ระบบ
    * 3 -> เพิ่มข้อมูลสำเร็จ
    * 4 -> เพิ่มข้อมูลไม่สำเร็จ
    * 5 -> ใส่ชื่ผู้ตรวจซ้ำกัน
    * 6 -> email , password ไม่ตรงกัน
    * 7 -> email , con-email ไม่ตรงกัน
    * 8 -> pass , con-pass ไม่ตรงกัน
    * 9 -> username ถูกใช้งานไปแล้ว
    * 10 -> แก้ไขข้อมูลสำเร็จ
    * 11 -> แก้ไขข้อมูลไม่สำเร็จ
    * 12 -> ลบข้อมูลสำเร็จ
    * 13 -> ลบข้อมูลไม่สำเร็จ
    * 14 -> กรอกข้อมูลไม่ถูกต้อง (login)
    * 15 -> ไฟล์อัพใหญ่เกิน 60 MB
    * 16 -> อนุญาติเฉพาะไฟล์ PDF
    * 17 -> อนุญาติเฉพาะไฟล์ jpg , png
    * 18 -> ไม่ได้อยู่ในขอบเขตเวลาที่กำหนด
    * 19 -> ID ถูกใช้งานไปแล้ว
    * 20 -> พบข้อมูลที่ซ้ำกันในฐานข้อมูล
    * 21 -> จำนวนรวมมน้อยกว่าจำนวนนักศึกษาจากไฟล์ที่อัพโหลด
    * 22 -> จำนวนรวมมมากกว่าจำนวนนักศึกษาจากไฟล์ที่อัพโหลด
    * 23 -> อัพโหลดได้เฉพาะไฟล์ .csv เท่านั้น
    * 24 -> ถูกระงับการใช้งาน
    * 25 -> การอัพโหลดเกิดปัญหา
     */
?>
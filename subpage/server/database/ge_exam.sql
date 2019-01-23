-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2019 at 02:08 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ge_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(5) NOT NULL,
  `admin_name` text NOT NULL,
  `admin_username` varchar(10) NOT NULL,
  `admin_password` varchar(10) NOT NULL,
  `role` text NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_username`, `admin_password`, `role`, `status`) VALUES
('admin', 'admin_ge_ssru', 'admin', 'gessru', 'Admin', '1'),
('BNK28', 'นายดับบริว เอ็กวายแซท', 'w3school', 'ppzx00', 'Admin', '0');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `detail_id` varchar(18) NOT NULL,
  `term` text NOT NULL,
  `year` text NOT NULL,
  `day` date NOT NULL,
  `time_start` time(1) NOT NULL,
  `time_end` time NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`detail_id`, `term`, `year`, `day`, `time_start`, `time_end`, `type`) VALUES
('DT0J7MQ4TG6L', '1', '2564', '2019-01-22', '13:08:00.0', '12:00:00', 'ปลายภาค'),
('DT16YGYMXY98', '2', '2562', '2019-01-29', '15:15:00.0', '03:30:00', 'กลางภาค'),
('DT48WCCPUZOV', '2', '2565', '2019-01-23', '15:15:00.0', '03:30:00', 'กลางภาค'),
('DTA6CDISXPCD', '2', '2562', '2019-01-29', '15:15:00.0', '03:30:00', 'กลางภาค'),
('DTJUBZWSEPYF', '1', '2564', '2019-01-22', '13:08:00.0', '12:00:00', 'ปลายภาค'),
('DTW4QBV7L0BT', '2', '2562', '2019-01-29', '15:15:00.0', '03:30:00', 'กลางภาค'),
('DTXWFHPUCPQ7', '2', '2562', '2019-01-29', '15:15:00.0', '03:30:00', 'กลางภาค'),
('DTYVRBEDLDBX', '1', '2563', '2019-01-17', '12:00:00.0', '03:30:00', 'กลางภาค');

-- --------------------------------------------------------

--
-- Table structure for table `location_table`
--

CREATE TABLE `location_table` (
  `order` int(5) NOT NULL,
  `name_location` varchar(255) NOT NULL,
  `url_location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location_table`
--

INSERT INTO `location_table` (`order`, `name_location`, `url_location`) VALUES
(1, '1701 หอประชุมสุนันทานุสรณ์', 'https://www.google.co.th/maps/@13.7743279,100.5074971,3a,90y,286.48h,90.44t/data=!3m6!1e1!3m4!1sIa81sEld0ZneyiMk48T-Xg!2e0!7i13312!8i6656?hl=th&authuser=0'),
(2, '1721 หอประชุมสุนันทานุสรณ์', 'https://www.google.co.th/maps/@13.7743279,100.5074971,3a,90y,286.48h,90.44t/data=!3m6!1e1!3m4!1sIa81sEld0ZneyiMk48T-Xg!2e0!7i13312!8i6656?hl=th&authuser=0'),
(3, '1731 หอประชุมสุนันทานุสรณ์', 'https://www.google.co.th/maps/@13.7743279,100.5074971,3a,90y,286.48h,90.44t/data=!3m6!1e1!3m4!1sIa81sEld0ZneyiMk48T-Xg!2e0!7i13312!8i6656?hl=th&authuser=0'),
(4, '1732 หอประชุมสุนันทานุสรณ์', 'https://www.google.co.th/maps/@13.7743279,100.5074971,3a,90y,286.48h,90.44t/data=!3m6!1e1!3m4!1sIa81sEld0ZneyiMk48T-Xg!2e0!7i13312!8i6656?hl=th&authuser=0'),
(5, '29201 สมาคมศิษย์เก่าฯ', 'https://www.google.co.th/maps/@13.7741421,100.5064474,3a,75y,128.06h,104.26t/data=!3m6!1e1!3m4!1sDuWbh6UvrwA5ZZG8ATIp-g!2e0!7i13312!8i6656?hl=th&authuser=0'),
(6, '4701 อาคาร 47 คณะเทคโนโลยีอุตสาหกรรม', 'https://www.google.co.th/maps/@13.7777462,100.508881,3a,75y,270.4h,111.95t/data=!3m6!1e1!3m4!1sBASlhyvnzvm6rb0t7-ucQA!2e0!7i13312!8i6656?hl=th&authuser=0'),
(7, '3111 อาคาร 31', 'https://www.google.co.th/maps/@13.776232,100.5088739,3a,90y,111.14h,119.28t/data=!3m6!1e1!3m4!1sxCtqhIAi83rNYQLZQBZHsw!2e0!7i13312!8i6656?hl=th&authuser=0'),
(8, '3121 อาคาร 31', 'https://www.google.co.th/maps/@13.776232,100.5088739,3a,90y,111.14h,119.28t/data=!3m6!1e1!3m4!1sxCtqhIAi83rNYQLZQBZHsw!2e0!7i13312!8i6656?hl=th&authuser=0'),
(9, '3122 อาคาร 31', 'https://www.google.co.th/maps/@13.776232,100.5088739,3a,90y,111.14h,119.28t/data=!3m6!1e1!3m4!1sxCtqhIAi83rNYQLZQBZHsw!2e0!7i13312!8i6656?hl=th&authuser=0'),
(10, '3123 อาคาร 31', 'https://www.google.co.th/maps/@13.776232,100.5088739,3a,90y,111.14h,119.28t/data=!3m6!1e1!3m4!1sxCtqhIAi83rNYQLZQBZHsw!2e0!7i13312!8i6656?hl=th&authuser=0'),
(11, '3221 ศูนย์วิทยบริการ', 'https://www.google.co.th/maps/@13.7759744,100.508574,3a,90y,150.03h,114.62t/data=!3m6!1e1!3m4!1seFpoOFTBjrda-Kjay1hcLQ!2e0!7i13312!8i6656?hl=th&authuser=0'),
(12, '3142 อาคาร 31', 'https://www.google.co.th/maps/@13.776232,100.5088739,3a,90y,111.14h,119.28t/data=!3m6!1e1!3m4!1sxCtqhIAi83rNYQLZQBZHsw!2e0!7i13312!8i6656?hl=th&authuser=0'),
(13, '3147 อาคาร 31', 'https://www.google.co.th/maps/@13.776232,100.5088739,3a,90y,111.14h,119.28t/data=!3m6!1e1!3m4!1sxCtqhIAi83rNYQLZQBZHsw!2e0!7i13312!8i6656?hl=th&authuser=0'),
(14, '3742 อาคาร 37', 'https://www.google.co.th/maps/@13.7761385,100.5083569,3a,90y,263.78h,106.67t/data=!3m6!1e1!3m4!1sYLCSvyH4-tRQlhTfteeP0w!2e0!7i13312!8i6656?hl=th&authuser=0'),
(15, '3511 อาคาร 35 คณะมนุษยศาสตร์ฯ', 'https://www.google.co.th/maps/@13.7757178,100.5081951,3a,90y,122.33h,101.77t/data=!3m6!1e1!3m4!1sMFvDZuhMLTFrTJx293lwiQ!2e0!7i13312!8i6656?hl=th&authuser=0'),
(16, '3535 อาคาร 35 คณะมนุษยศาสตร์ฯ', 'https://www.google.co.th/maps/@13.7757178,100.5081951,3a,90y,122.33h,101.77t/data=!3m6!1e1!3m4!1sMFvDZuhMLTFrTJx293lwiQ!2e0!7i13312!8i6656?hl=th&authuser=0'),
(17, '1121 คณะครุศาสตร์', 'https://www.google.co.th/maps/@13.7734007,100.5073404,3a,75y,31.82h,103.12t/data=!3m6!1e1!3m4!1sd2mitujd3G6mdF-tuywbZw!2e0!7i13312!8i6656?hl=th&authuser=0'),
(18, '1122 คณะครุศาสตร์', 'https://www.google.co.th/maps/@13.7734007,100.5073404,3a,75y,31.82h,103.12t/data=!3m6!1e1!3m4!1sd2mitujd3G6mdF-tuywbZw!2e0!7i13312!8i6656?hl=th&authuser=0'),
(19, '5711 อาคาร 57', 'https://www.google.co.th/maps/@13.7771359,100.509161,3a,90y,169.98h,102.19t,359.98r/data=!3m6!1e1!3m4!1sBK6MLtkYcffuiurnXuCanA!2e0!7i13312!8i6656?hl=th&authuser=0'),
(20, '5625 อาคาร 56 ', 'https://www.google.co.th/maps/@13.7771359,100.509161,3a,90y,169.98h,102.19t,359.98r/data=!3m6!1e1!3m4!1sBK6MLtkYcffuiurnXuCanA!2e0!7i13312!8i6656?hl=th&authuser=0'),
(21, '5626 อาคาร 56', 'https://www.google.co.th/maps/@13.7770357,100.5093759,3a,90y,161.64h,113.25t/data=!3m6!1e1!3m4!1sYFJndfpS_JcXmwyJWNVJPw!2e0!7i13312!8i6656?hl=th&authuser=0'),
(22, '5633 อาคาร 56', 'https://www.google.co.th/maps/@13.7770357,100.5093759,3a,90y,161.64h,113.25t/data=!3m6!1e1!3m4!1sYFJndfpS_JcXmwyJWNVJPw!2e0!7i13312!8i6656?hl=th&authuser=0'),
(23, '58509 อาคาร 58', 'https://www.google.co.th/maps/@13.7773682,100.509116,3a,90y,31.34h,101.99t/data=!3m6!1e1!3m4!1s3wqoWo5MbMWZptD6Rp_Pww!2e0!7i13312!8i6656?hl=th&authuser=0'),
(24, '58400 อาคาร 58', 'https://www.google.co.th/maps/@13.7773682,100.509116,3a,90y,31.34h,101.99t/data=!3m6!1e1!3m4!1s3wqoWo5MbMWZptD6Rp_Pww!2e0!7i13312!8i6656?hl=th&authuser=0'),
(25, '58M03 อาคาร 58', 'https://www.google.co.th/maps/@13.7773682,100.509116,3a,90y,31.34h,101.99t/data=!3m6!1e1!3m4!1s3wqoWo5MbMWZptD6Rp_Pww!2e0!7i13312!8i6656?hl=th&authuser=0'),
(26, '84201 ศูนย์การศึกษาจังหวัดนครปฐม (ห้อง 84/84201)', 'https://www.google.com/maps/@13.8698195,100.2724503,3a,18y,59.67h,98.53t/data=!3m8!1e1!3m6!1sAF1QipMBIt8Xocez48dd-aO566DjbGz50Cx6L3vKXrlX!2e10!3e11!6shttps:%2F%2Flh5.googleusercontent.com%2Fp%2FAF1QipMBIt8Xocez48dd-aO566DjbGz50Cx6L3vKXrlX%3Dw203-h100-k-no'),
(27, 'นอนนิ่งนิ่งนะน้องนะ', 'Umbrella Run Left');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `order` int(11) NOT NULL,
  `role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`order`, `role`) VALUES
(1, 'Admin'),
(2, 'ผู้ดูแลระบบ'),
(3, 'เจ้าหน้าที่ทั่วไป');

-- --------------------------------------------------------

--
-- Table structure for table `room_detail`
--

CREATE TABLE `room_detail` (
  `room_detail_id` varchar(18) NOT NULL,
  `room_id` varchar(5) NOT NULL,
  `detail_id` varchar(18) NOT NULL,
  `sub_id` varchar(7) NOT NULL,
  `sub_group` text NOT NULL,
  `num` text NOT NULL,
  `tool` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_detail`
--

INSERT INTO `room_detail` (`room_detail_id`, `room_id`, `detail_id`, `sub_id`, `sub_group`, `num`, `tool`) VALUES
('RD1XP7STYSL6', '16', 'DTYVRBEDLDBX', 'GEL0103', '001', '50', 'TABLET'),
('RD50YF1WRXDQ', '13', 'DTJUBZWSEPYF', 'GEH0204', 'ทั้', '40', 'COMPUTER'),
('RDA3VZ8V0VTD', '10', 'DTA6CDISXPCD', 'GEH0205', '520', '50', 'TABLET'),
('RDBII5737834', '3', 'DTJUBZWSEPYF', 'GEH0204', 'ทั้', '60', 'TABLET'),
('RDCKEPZMC3V6', '11', 'DT16YGYMXY98', 'GEH0205', '520', '10', 'COMPUTER'),
('RDIAFQCJK3CB', '12', 'DTYVRBEDLDBX', 'GEL0103', '001', '50', 'COMPUTER'),
('RDIP1CBGIHZM', '11', 'DTW4QBV7L0BT', 'GEH0205', '520', '10', 'COMPUTER'),
('RDKT6D26QEYA', '17', 'DT48WCCPUZOV', 'GEH0204', '123', '50', 'COMPUTER'),
('RDL9HRO7C0QT', '11', 'DTA6CDISXPCD', 'GEH0205', '520', '10', 'COMPUTER'),
('RDMFOW4EAM54', '3', 'DT0J7MQ4TG6L', 'GEH0204', 'ทั้', '60', 'TABLET'),
('RDQ5M4O2IQZ9', '10', 'DTXWFHPUCPQ7', 'GEH0205', '520', '50', 'TABLET'),
('RDQHT4VZZHZI', '10', 'DTW4QBV7L0BT', 'GEH0205', '520', '50', 'TABLET'),
('RDTIOJB8QK78', '10', 'DT16YGYMXY98', 'GEH0205', '520', '50', 'TABLET'),
('RDTKJYXMLBQY', '13', 'DT0J7MQ4TG6L', 'GEH0204', 'ทั้', '40', 'COMPUTER'),
('RDYGZA30H1AT', '11', 'DTXWFHPUCPQ7', 'GEH0205', '520', '10', 'COMPUTER'),
('RDYL2NY9UD66', '16', 'DT48WCCPUZOV', 'GEH0204', '123', '50', 'TABLET');

-- --------------------------------------------------------

--
-- Table structure for table `show_url`
--

CREATE TABLE `show_url` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `real_name` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `group_url` int(11) NOT NULL,
  `hide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `show_url`
--

INSERT INTO `show_url` (`id`, `url`, `real_name`, `text`, `group_url`, `hide`) VALUES
(1, 'http://gen-ed.ssru.ac.th/home', '', 'สำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทรอนิกส์', 1, 0),
(2, 'http://gen-ed.ssru.ac.th/page/gelearning', '', 'ระบบ e-Learning รายวิชาศึกษาทั่วไป', 1, 0),
(3, 'http://www.ge-tss.ssru.ac.th/index.php/Student', '', 'ระบบตรวจสอบผลการเรียน (TSS) รายวิชาศึกษาทั่วไป', 1, 0),
(4, 'https://www.ssru.ac.th/home', '', 'มหาวิทยาลัยราชภัฏสวนสุนันทา', 1, 0),
(5, 'pdf_5b6bb93f9b52c.pdf', 'ข้อปฏิบัติสำหรับนักศึกษาในการสอบรายวิชาศึกษาทั่วไป.pdf', 'ข้อปฏิบัติสำหรับนักศึกษาในการสอบรายวิชาศึกษาทั่วไป', 2, 0),
(6, 'pdf_5b6bba61b4188.pdf', 'คำแนะนำการสอบออนไลน์-Tablet.pdf', 'แนะนำการสอบผ่าน Computer และ Tablet', 2, 0),
(7, 'pdf_5b6bbd6120101.pdf', 'ห้องสอบ-GE.pdf', 'แผนที่ห้องสอบ', 2, 0),
(8, 'pdf_5b6bbd612a369.pdf', 'คู่มือการใช้งานระบบตรวจสอบตารางสอบวัดความรู้รายวิชาศึกษาทั่วไป.pdf', 'คู่มือการใช้งานระบบตรวจสอบตารางสอบวัดความรู้รายวิชาศึกษาทั่วไป', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` varchar(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `name`) VALUES
('59122519010', 'นายธีระยุทธ์ เติมแต้ม'),
('60122519014', 'นาย ทองดี ทองเก');

-- --------------------------------------------------------

--
-- Table structure for table `student_room`
--

CREATE TABLE `student_room` (
  `student_room_id` varchar(18) NOT NULL,
  `std_id` varchar(11) NOT NULL,
  `room_detail_id` varchar(18) NOT NULL,
  `seat` text NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_room`
--

INSERT INTO `student_room` (`student_room_id`, `std_id`, `room_detail_id`, `seat`, `note`) VALUES
('SR01OJORHGWA', '59122519090', 'RDIAFQCJK3CB', '40', ''),
('SR031H4X4NYK', '59122519015', 'RD1XP7STYSL6', '15', ''),
('SR04G3CIIYHE', '59122519094', 'RDKT6D26QEYA', '44', ''),
('SR0AYPAQ6O31', '59122519063', 'RDKT6D26QEYA', '13', ''),
('SR0GJCJIVKB7', '59122519078', 'RDIAFQCJK3CB', '28', ''),
('SR0GOTUNKXDZ', '59122519069', 'RDKT6D26QEYA', '19', ''),
('SR0LGPUTWFZ0', '59122519093', 'RDIAFQCJK3CB', '43', ''),
('SR0NPA0Q780Q', '59122519052', 'RDIAFQCJK3CB', '2', ''),
('SR0VI7IJDUF4', '59122519047', 'RD1XP7STYSL6', '47', ''),
('SR1GW117ARMH', '59122519018', 'RDYL2NY9UD66', '18', ''),
('SR1KBXMBACEB', '59122519001', 'RD1XP7STYSL6', '1', ''),
('SR1Q6N8KGMD4', '59122519056', 'RDIAFQCJK3CB', '6', ''),
('SR1ZZM6BEQ5Z', '59122519043', 'RDYL2NY9UD66', '43', ''),
('SR2F94DNETXU', '59122519026', 'RD1XP7STYSL6', '26', ''),
('SR2RDKPFD7DG', '59122519023', 'RDYL2NY9UD66', '23', ''),
('SR2VIP3PS0OQ', '59122519068', 'RDIAFQCJK3CB', '18', ''),
('SR2XW2Z4ETXF', '59122519066', 'RDIAFQCJK3CB', '16', ''),
('SR38IAW5AMPX', '59122519033', 'RDYL2NY9UD66', '33', ''),
('SR43DBEG6W04', '59122519042', 'RDYL2NY9UD66', '42', ''),
('SR44MWYHOD4N', '59122519044', 'RD1XP7STYSL6', '44', ''),
('SR4EAQK23YON', '59122519049', 'RDYL2NY9UD66', '49', ''),
('SR4JFDQ1IN6B', '59122519064', 'RDKT6D26QEYA', '14', ''),
('SR55VM9C4262', '59122519099', 'RDIAFQCJK3CB', '49', ''),
('SR5LOVXZCHL3', '59122519070', 'RDIAFQCJK3CB', '20', ''),
('SR5MJ0YEG7GI', '59122519050', 'RDYL2NY9UD66', '50', ''),
('SR5QQBPBUK7B', '59122519048', 'RD1XP7STYSL6', '48', ''),
('SR5R9UX8YTX8', '59122519027', 'RD1XP7STYSL6', '27', ''),
('SR5XSXX2SMFZ', '59122519002', 'RDYL2NY9UD66', '2', ''),
('SR61AQ9DTDWY', '59122519092', 'RDKT6D26QEYA', '42', ''),
('SR63N4FWPPOW', '59122519089', 'RDKT6D26QEYA', '39', ''),
('SR64LN3LOSCV', '59122519078', 'RDKT6D26QEYA', '28', ''),
('SR6G57UIAMXG', '59122519086', 'RDKT6D26QEYA', '36', ''),
('SR6GUJ30C9PB', '59122519012', 'RD1XP7STYSL6', '12', ''),
('SR6H3OZB7RQ3', '59122519050', 'RD1XP7STYSL6', '50', ''),
('SR6JEZXJAO3W', '59122519057', 'RDIAFQCJK3CB', '7', ''),
('SR6JL9GA3169', '59122519075', 'RDKT6D26QEYA', '25', ''),
('SR6R16SHJ91A', '59122519059', 'RDKT6D26QEYA', '9', ''),
('SR6S6FOYW8IW', '59122519086', 'RDIAFQCJK3CB', '36', ''),
('SR7DCL7F5T2B', '59122519010', 'RDYL2NY9UD66', '10', ''),
('SR8A61AV6ST1', '59122519056', 'RDKT6D26QEYA', '6', ''),
('SR8CQT4Z07ET', '59122519089', 'RDIAFQCJK3CB', '39', ''),
('SR8E8ZO3G2H5', '59122519067', 'RDKT6D26QEYA', '17', ''),
('SR8EC6LWLHJ3', '59122519054', 'RDKT6D26QEYA', '4', ''),
('SR8IO7S4ACCP', '59122519024', 'RDYL2NY9UD66', '24', ''),
('SR8NO0VD1WAO', '59122519017', 'RD1XP7STYSL6', '17', ''),
('SR8XS0MB4OZR', '59122519014', 'RD1XP7STYSL6', '14', ''),
('SR9E51AEDZBU', '59122519098', 'RDKT6D26QEYA', '48', ''),
('SR9HNH686ZC0', '59122519008', 'RD1XP7STYSL6', '8', ''),
('SR9JROZUHOYY', '59122519083', 'RDKT6D26QEYA', '33', ''),
('SR9PD9517I56', '59122519041', 'RDYL2NY9UD66', '41', ''),
('SRA57DH8K40V', '59122519031', 'RD1XP7STYSL6', '31', ''),
('SRAJDR2CVCOB', '59122519083', 'RDIAFQCJK3CB', '33', ''),
('SRAOTKFE7R7C', '59122519076', 'RDIAFQCJK3CB', '26', ''),
('SRAUU3VHMKJM', '59122519077', 'RDIAFQCJK3CB', '27', ''),
('SRAWKY65SCWZ', '59122519066', 'RDKT6D26QEYA', '16', ''),
('SRAYSR1ZWSBP', '59122519031', 'RDYL2NY9UD66', '31', ''),
('SRB0M6TCICUY', '59122519096', 'RDIAFQCJK3CB', '46', ''),
('SRBAPKMMDTIQ', '59122519060', 'RDIAFQCJK3CB', '10', ''),
('SRBB92LK58XO', '59122519061', 'RDIAFQCJK3CB', '11', ''),
('SRBN0M2GA5NA', '59122519092', 'RDIAFQCJK3CB', '42', ''),
('SRBQ1U0ANBG3', '59122519025', 'RDYL2NY9UD66', '25', ''),
('SRBROM8PG393', '59122519009', 'RDYL2NY9UD66', '9', ''),
('SRC74XAX43EK', '59122519062', 'RDKT6D26QEYA', '12', ''),
('SRCQ4M8L2JZ0', '59122519035', 'RDYL2NY9UD66', '35', ''),
('SRCYE2VWHAQ9', '59122519073', 'RDIAFQCJK3CB', '23', ''),
('SRD24J5HSSZE', '59122519094', 'RDIAFQCJK3CB', '44', ''),
('SRDI26MCIDV1', '59122519014', 'RDYL2NY9UD66', '14', ''),
('SREIZ196UQ6C', '59122519088', 'RDKT6D26QEYA', '38', ''),
('SRF93MZQAMN2', '59122519081', 'RDIAFQCJK3CB', '31', ''),
('SRFEJSSGVFK6', '59122519007', 'RDYL2NY9UD66', '7', ''),
('SRFQ11B42WR5', '59122519028', 'RDYL2NY9UD66', '28', ''),
('SRG1ANEPCZX9', '59122519003', 'RD1XP7STYSL6', '3', ''),
('SRGC32QW7D6I', '59122519065', 'RDKT6D26QEYA', '15', ''),
('SRGFAJ8IIE0B', '59122519034', 'RD1XP7STYSL6', '34', ''),
('SRGG9CT07YNB', '59122519010', 'RD1XP7STYSL6', '10', ''),
('SRGGUR2PT0KZ', '59122519013', 'RD1XP7STYSL6', '13', ''),
('SRGJSUAEYVBP', '59122519051', 'RDIAFQCJK3CB', '1', ''),
('SRGLCP4ZT72Q', '59122519053', 'RDKT6D26QEYA', '3', ''),
('SRGOX0HJ7SJM', '59122519039', 'RDYL2NY9UD66', '39', ''),
('SRGSHA8GSDKI', '59122519099', 'RDKT6D26QEYA', '49', ''),
('SRGSX95GN5JI', '59122519082', 'RDKT6D26QEYA', '32', ''),
('SRGT6TIGSDHK', '59122519080', 'RDIAFQCJK3CB', '30', ''),
('SRGTD4YSF5NN', '59122519019', 'RDYL2NY9UD66', '19', ''),
('SRGWY05AM8NK', '59122519095', 'RDIAFQCJK3CB', '45', ''),
('SRH4T2VMZNRD', '59122519006', 'RD1XP7STYSL6', '6', ''),
('SRHKCTVLH77M', '59122519082', 'RDIAFQCJK3CB', '32', ''),
('SRHVCWZ76X83', '59122519091', 'RDKT6D26QEYA', '41', ''),
('SRIBHC4X59Z2', '59122519071', 'RDIAFQCJK3CB', '21', ''),
('SRIEFUP7219X', '59122519022', 'RD1XP7STYSL6', '22', ''),
('SRIGZIN2PZ0E', '59122519038', 'RDYL2NY9UD66', '38', ''),
('SRINAKZ4VRUN', '59122519093', 'RDKT6D26QEYA', '43', ''),
('SRIPHT64CE0S', '59122519085', 'RDKT6D26QEYA', '35', ''),
('SRIZIJVKDWXN', '59122519023', 'RD1XP7STYSL6', '23', ''),
('SRJ4KL4790N7', '59122519044', 'RDYL2NY9UD66', '44', ''),
('SRK2RFO3RUOG', '59122519019', 'RD1XP7STYSL6', '19', ''),
('SRK2UTL8UK4L', '59122519025', 'RD1XP7STYSL6', '25', ''),
('SRKEM63F7PWV', '59122519090', 'RDKT6D26QEYA', '40', ''),
('SRKG42IYDO2R', '59122519038', 'RD1XP7STYSL6', '38', ''),
('SRKGV894HF2C', '59122519084', 'RDKT6D26QEYA', '34', ''),
('SRKK88VJOFQH', '59122519055', 'RDKT6D26QEYA', '5', ''),
('SRKN4UEE2M6Q', '59122519030', 'RDYL2NY9UD66', '30', ''),
('SRKSJEQPIKML', '59122519060', 'RDKT6D26QEYA', '10', ''),
('SRKTNR91LT4M', '59122519005', 'RDYL2NY9UD66', '5', ''),
('SRKUOWFIFFFX', '59122519088', 'RDIAFQCJK3CB', '38', ''),
('SRKW92WJILXH', '59122519035', 'RD1XP7STYSL6', '35', ''),
('SRL45W8AGV29', '59122519067', 'RDIAFQCJK3CB', '17', ''),
('SRL4OW9IEDFM', '59122519008', 'RDYL2NY9UD66', '8', ''),
('SRLD35TL06EQ', '59122519087', 'RDIAFQCJK3CB', '37', ''),
('SRLV3XFJJC3W', '59122519048', 'RDYL2NY9UD66', '48', ''),
('SRM657KHIATE', '59122519047', 'RDYL2NY9UD66', '47', ''),
('SRMC4ABTZYKI', '59122519029', 'RD1XP7STYSL6', '29', ''),
('SRME1LVH4BN0', '59122519051', 'RDKT6D26QEYA', '1', ''),
('SRMEH8TQKFPA', '59122519004', 'RD1XP7STYSL6', '4', ''),
('SRMHU0MPYLYE', '59122519073', 'RDKT6D26QEYA', '23', ''),
('SRMMTCXPL1FV', '59122519037', 'RD1XP7STYSL6', '37', ''),
('SRMNZ6274PZ0', '59122519021', 'RDYL2NY9UD66', '21', ''),
('SRMYA31RUXYX', '59122519030', 'RD1XP7STYSL6', '30', ''),
('SRN0GK3FKF34', '59122519005', 'RD1XP7STYSL6', '5', ''),
('SRN386NERXAU', '59122519002', 'RD1XP7STYSL6', '2', ''),
('SRN8GV0OGB50', '59122519065', 'RDIAFQCJK3CB', '15', ''),
('SRNAINPORVY8', '59122519040', 'RDYL2NY9UD66', '40', ''),
('SRNEM2P2MA2F', '59122519034', 'RDYL2NY9UD66', '34', ''),
('SRNSRG3FAU5D', '59122519079', 'RDIAFQCJK3CB', '29', ''),
('SRNT5WE7AGT5', '59122519039', 'RD1XP7STYSL6', '39', ''),
('SRNWXRLC83DV', '59122519100', 'RDIAFQCJK3CB', '50', ''),
('SRO5TUUC4S47', '59122519007', 'RD1XP7STYSL6', '7', ''),
('SRO9PY1G7MWX', '59122519058', 'RDIAFQCJK3CB', '8', ''),
('SROJCIL5XIGI', '59122519027', 'RDYL2NY9UD66', '27', ''),
('SRORKVEJORPM', '59122519063', 'RDIAFQCJK3CB', '13', ''),
('SRORTHNN6S3R', '59122519100', 'RDKT6D26QEYA', '50', ''),
('SROTL93PK7NZ', '59122519074', 'RDKT6D26QEYA', '24', ''),
('SRP4A02D2YCN', '59122519011', 'RD1XP7STYSL6', '11', ''),
('SRPEVVF8FX2Q', '59122519012', 'RDYL2NY9UD66', '12', ''),
('SRPM91WRYIZR', '59122519009', 'RD1XP7STYSL6', '9', ''),
('SRPZS0XX35V3', '59122519072', 'RDKT6D26QEYA', '22', ''),
('SRQ03UB18XJK', '59122519032', 'RD1XP7STYSL6', '32', ''),
('SRQ2OM9WM83I', '59122519021', 'RD1XP7STYSL6', '21', ''),
('SRQA6UDV6665', '59122519042', 'RD1XP7STYSL6', '42', ''),
('SRQFNVEQ7EDO', '59122519071', 'RDKT6D26QEYA', '21', ''),
('SRQQCC1I9QFR', '59122519022', 'RDYL2NY9UD66', '22', ''),
('SRQSLYOY8CRU', '59122519085', 'RDIAFQCJK3CB', '35', ''),
('SRQSX0DP1MTT', '59122519015', 'RDYL2NY9UD66', '15', ''),
('SRQSX65IUDVV', '59122519062', 'RDIAFQCJK3CB', '12', ''),
('SRR6K1E66C5Y', '59122519068', 'RDKT6D26QEYA', '18', ''),
('SRRIWG243AIJ', '59122519037', 'RDYL2NY9UD66', '37', ''),
('SRRUJQ9O5X88', '59122519097', 'RDKT6D26QEYA', '47', ''),
('SRRW4U0L0MOG', '59122519041', 'RD1XP7STYSL6', '41', ''),
('SRS3CPV1PXTL', '59122519061', 'RDKT6D26QEYA', '11', ''),
('SRS87BS98Y5H', '59122519087', 'RDKT6D26QEYA', '37', ''),
('SRSLD1QL3XHO', '59122519070', 'RDKT6D26QEYA', '20', ''),
('SRSLO1LR205E', '59122519024', 'RD1XP7STYSL6', '24', ''),
('SRSUVANJWXVK', '59122519052', 'RDKT6D26QEYA', '2', ''),
('SRSWZOE8WLPF', '59122519049', 'RD1XP7STYSL6', '49', ''),
('SRSZI509Z34F', '59122519004', 'RDYL2NY9UD66', '4', ''),
('SRSZV8WS03KH', '59122519028', 'RD1XP7STYSL6', '28', ''),
('SRT1X2TBMZ7H', '59122519020', 'RD1XP7STYSL6', '20', ''),
('SRT6WSUX8WQI', '59122519098', 'RDIAFQCJK3CB', '48', ''),
('SRT9QJ0404LL', '59122519032', 'RDYL2NY9UD66', '32', ''),
('SRTEUBOXZF1V', '59122519080', 'RDKT6D26QEYA', '30', ''),
('SRTN45X61RZX', '59122519026', 'RDYL2NY9UD66', '26', ''),
('SRTNTR8YJOM5', '59122519084', 'RDIAFQCJK3CB', '34', ''),
('SRTV77HHDM6E', '59122519040', 'RD1XP7STYSL6', '40', ''),
('SRUK9N7VS0C7', '59122519077', 'RDKT6D26QEYA', '27', ''),
('SRUKQW1HIKM2', '59122519029', 'RDYL2NY9UD66', '29', ''),
('SRUR81IMZBLG', '59122519072', 'RDIAFQCJK3CB', '22', ''),
('SRUYD3L463Y9', '59122519081', 'RDKT6D26QEYA', '31', ''),
('SRUYP2TNM8Q6', '59122519064', 'RDIAFQCJK3CB', '14', ''),
('SRV7PPOE7K6W', '59122519011', 'RDYL2NY9UD66', '11', ''),
('SRVC4YGHPX60', '59122519059', 'RDIAFQCJK3CB', '9', ''),
('SRVC92QUWLZL', '59122519046', 'RDYL2NY9UD66', '46', ''),
('SRVGAX2V9039', '59122519045', 'RDYL2NY9UD66', '45', ''),
('SRVMESG42ITP', '59122519091', 'RDIAFQCJK3CB', '41', ''),
('SRW94ORSS957', '59122519013', 'RDYL2NY9UD66', '13', ''),
('SRWBA7NEQIR2', '59122519053', 'RDIAFQCJK3CB', '3', ''),
('SRWE4PPGU6U8', '59122519033', 'RD1XP7STYSL6', '33', ''),
('SRWL5PD1I1LM', '59122519055', 'RDIAFQCJK3CB', '5', ''),
('SRX1WO29GRDJ', '59122519016', 'RD1XP7STYSL6', '16', ''),
('SRX85QK5LH4P', '59122519079', 'RDKT6D26QEYA', '29', ''),
('SRXDCDXPFFP0', '59122519020', 'RDYL2NY9UD66', '20', ''),
('SRXEG5G51N74', '59122519016', 'RDYL2NY9UD66', '16', ''),
('SRXNRQKF8YBA', '59122519036', 'RD1XP7STYSL6', '36', ''),
('SRXRU6SOZTUI', '59122519017', 'RDYL2NY9UD66', '17', ''),
('SRXSB500OUML', '59122519096', 'RDKT6D26QEYA', '46', ''),
('SRY66ZZQX09P', '59122519046', 'RD1XP7STYSL6', '46', ''),
('SRYBK3BQSTC6', '59122519095', 'RDKT6D26QEYA', '45', ''),
('SRYGXOWW9BVM', '59122519076', 'RDKT6D26QEYA', '26', ''),
('SRYHN20Q1RB6', '59122519069', 'RDIAFQCJK3CB', '19', ''),
('SRYO545UV1FY', '59122519006', 'RDYL2NY9UD66', '6', ''),
('SRYWHIBTJ1MS', '59122519074', 'RDIAFQCJK3CB', '24', ''),
('SRZ0BLVPYV3N', '59122519001', 'RDYL2NY9UD66', '1', ''),
('SRZ59PA02D1V', '59122519018', 'RD1XP7STYSL6', '18', ''),
('SRZ5F163IUGF', '59122519075', 'RDIAFQCJK3CB', '25', ''),
('SRZ88V3Y3RJJ', '59122519043', 'RD1XP7STYSL6', '43', ''),
('SRZE4SJ690QF', '59122519097', 'RDIAFQCJK3CB', '47', ''),
('SRZJLSOPFY1C', '59122519058', 'RDKT6D26QEYA', '8', ''),
('SRZLWHJZ1BID', '59122519054', 'RDIAFQCJK3CB', '4', ''),
('SRZNFK3IJCU5', '59122519003', 'RDYL2NY9UD66', '3', ''),
('SRZWEBSZWHBJ', '59122519045', 'RD1XP7STYSL6', '45', ''),
('SRZWFLOX0E1F', '59122519036', 'RDYL2NY9UD66', '36', ''),
('SRZWRCLY2LOH', '59122519057', 'RDKT6D26QEYA', '7', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` varchar(7) NOT NULL,
  `subject_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`) VALUES
('GEH0101', 'สุนทรียภาพกับชีวิต'),
('GEH0102', 'สังคมไทยในบริบทโลก'),
('GEH0201', 'การพัฒนาตน'),
('GEH0202', 'ความจริงของชีวิต'),
('GEH0204', 'ความเป็นพลเมือง'),
('GEH0205', 'ทักษะชีวิตเพื่อความเป็นมนุษย์ที่สมบูรณ์'),
('GEH1101', 'สุนทรียภาพกับชีวิต'),
('GEH1102', 'สังคมไทยในบริบทโลก'),
('GEH2201', 'การพัฒนาตน'),
('GEH2202', 'ความจริงของชีวิต'),
('GEH2204', 'ความเป็นพลเมือง'),
('GEH2205', 'ทักษะชีวิตเพื่อความเป็นมนุษย์ที่สมบูรณ์'),
('GEL0101', 'การใช้ภาษาไทย'),
('GEL0102', 'ภาษาอังกฤษเพื่อการสื่อสารและการสืบค้น'),
('GEL0103', 'ภาษาอังกฤษเพื่อการสื่อสารและทักษะการเรียน'),
('GEL0201', 'ภาษาไทยเชิงวิชาการ'),
('GEL0203', 'ภาษาในกลุ่มประชาคมอาเซียน (ภาษาลาว)'),
('GEL1101', 'การใช้ภาษาไทย'),
('GEL1102', 'ภาษาอังกฤษเพื่อการสื่อสารและการสืบค้น'),
('GEL1103', 'ภาษาอังกฤษเพื่อการสื่อสารและทักษะการเรียน'),
('GEL2201', 'ภาษาไทยเชิงวิชาการ'),
('GEL2203', 'ภาษาในกลุ่มประชาคมอาเซียน (ภาษาลาว)'),
('GES0101', 'เทคโนโลยีสารสนเทศเพื่อการสื่อสารและการเรียนรู้'),
('GES0102', 'วิทยาศาสตร์และเทคโนโลยีกับคุณภาพชีวิต'),
('GES0203', 'ความรู้เท่าทันสารสนเทศ'),
('GES0205', 'นันทนาการเพื่อคุณภาพชีวิต'),
('GES0206', 'ชีวิตและสุขภาพ'),
('GES1101', 'เทคโนโลยีสารสนเทศเพื่อการสื่อสารและการเรียนรู้'),
('GES1102', 'วิทยาศาสตร์และเทคโนโลยีกับคุณภาพชีวิต'),
('GES2203', 'ความรู้เท่าทันสารสนเทศ'),
('GES2205', 'นันทนาการเพื่อคุณภาพชีวิต'),
('GES2206', 'ชีวิตและสุขภาพ');

-- --------------------------------------------------------

--
-- Table structure for table `web_show_time`
--

CREATE TABLE `web_show_time` (
  `id` int(11) NOT NULL,
  `web_term` int(11) NOT NULL,
  `web_year` int(11) NOT NULL,
  `banner` text NOT NULL,
  `footer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_show_time`
--

INSERT INTO `web_show_time` (`id`, `web_term`, `web_year`, `banner`, `footer`) VALUES
(1, 1, 2561, '', '<h2 style=\"font-family: Mitr, sans-serif; font-size: 12px; text-align: center;\"><h5 style=\"\"><span style=\"color: rgb(0, 0, 0);\">สำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทรอนิกส์ มหาวิทยาลัยราชภัฎสวนสุนันทา<br></span><span style=\"color: rgb(0, 0, 0);\">เลขที่ 1 อาคาร 34 ชั้น 1 ถนนอู่ทองนอก แขวงวชิระ เขตดุสิต กรุงเทพมหานคร 10300<br></span><span style=\"color: rgb(0, 0, 0);\">โทร. 02-160-1265-70 Fax. 02-160-1268 www.gen-ed.ssru.ac.th</span></h5></h2>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `location_table`
--
ALTER TABLE `location_table`
  ADD PRIMARY KEY (`order`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`order`);

--
-- Indexes for table `room_detail`
--
ALTER TABLE `room_detail`
  ADD PRIMARY KEY (`room_detail_id`);

--
-- Indexes for table `show_url`
--
ALTER TABLE `show_url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `student_room`
--
ALTER TABLE `student_room`
  ADD PRIMARY KEY (`student_room_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `web_show_time`
--
ALTER TABLE `web_show_time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location_table`
--
ALTER TABLE `location_table`
  MODIFY `order` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `show_url`
--
ALTER TABLE `show_url`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `web_show_time`
--
ALTER TABLE `web_show_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

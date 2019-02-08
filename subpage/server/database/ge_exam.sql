-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2019 at 08:34 AM
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
(1, 'http://gen-ed.ssru.ac.th/home5', '', 'สำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทรอนิกส์55', 1, 0),
(2, 'http://gen-ed.ssru.ac.th/page/gelearning', '', 'ระบบ e-Learning รายวิชาศึกษาทั่วไป', 1, 0),
(3, 'http://www.ge-tss.ssru.ac.th/index.php/Student', '', 'ระบบตรวจสอบผลการเรียน (TSS) รายวิชาศึกษาทั่วไป', 1, 0),
(4, 'https://www.ssru.ac.th/home', '', 'มหาวิทยาลัยราชภัฏสวนสุนันทา', 1, 0),
(5, 'pdf_5c520ec7c9b95.pdf', 'check_in_out.pdf', 'ข้อปฏิบัติสำหรับนักศึกษาในการสอบรายวิชาศึกษาทั่วไป', 2, 0),
(6, 'pdf_5c52085beeaf6.pdf', 'mpdf_4.pdf', 'แนะนำการสอบผ่าน Computer และ Tablet', 2, 0),
(7, 'pdf_5b6bbd6120101.pdf', 'ห้องสอบ-GE.pdf', 'แผนที่ห้องสอบ55sss', 2, 0),
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
('59122519001', '1'),
('59122519002', '2'),
('59122519003', '3'),
('59122519004', '4'),
('59122519005', '5'),
('59122519006', '6'),
('59122519007', '7'),
('59122519008', '8'),
('59122519009', '9'),
('59122519010', '10'),
('59122519011', '11'),
('59122519012', '12'),
('59122519013', '13'),
('59122519014', '14'),
('59122519015', '15'),
('59122519016', '16'),
('59122519017', '17'),
('59122519018', '18'),
('59122519019', '19'),
('59122519020', '20'),
('59122519021', '21'),
('59122519022', '22'),
('59122519023', '23'),
('59122519024', '24'),
('59122519025', '25'),
('59122519026', '26'),
('59122519027', '27'),
('59122519028', '28'),
('59122519029', '29'),
('59122519030', '30'),
('59122519031', '31'),
('59122519032', '32'),
('59122519033', '33'),
('59122519034', '34'),
('59122519035', '35'),
('59122519036', '36'),
('59122519037', '37'),
('59122519038', '38'),
('59122519039', '39'),
('59122519040', '40'),
('59122519041', '41'),
('59122519042', '42'),
('59122519043', '43'),
('59122519044', '44'),
('59122519045', '45'),
('59122519046', '46'),
('59122519047', '47'),
('59122519048', '48'),
('59122519049', '49'),
('59122519050', '50'),
('59122519051', '51'),
('59122519052', '52'),
('59122519053', '53'),
('59122519054', '54'),
('59122519055', '55'),
('59122519056', '56'),
('59122519057', '57'),
('59122519058', '58'),
('59122519059', '59'),
('59122519060', '60'),
('59122519061', '61'),
('59122519062', '62'),
('59122519063', '63'),
('59122519064', '64'),
('59122519065', '65'),
('59122519066', '66'),
('59122519067', '67'),
('59122519068', '68'),
('59122519069', '69'),
('59122519070', '70'),
('59122519071', '71'),
('59122519072', '72'),
('59122519073', '73'),
('59122519074', '74'),
('59122519075', '75'),
('59122519076', '76'),
('59122519077', '77'),
('59122519078', '78'),
('59122519079', '79'),
('59122519080', '80'),
('59122519081', '81'),
('59122519082', '82'),
('59122519083', '83'),
('59122519084', '84'),
('59122519085', '85'),
('59122519086', '86'),
('59122519087', '87'),
('59122519088', '88'),
('59122519089', '89'),
('59122519090', '90'),
('59122519091', '91'),
('59122519092', '92'),
('59122519093', '93'),
('59122519094', '94'),
('59122519095', '95'),
('59122519096', '96'),
('59122519097', '97'),
('59122519098', '98'),
('59122519099', '99'),
('59122519100', '100'),
('60122519014', 'นาย ทองดี ทองเก');

-- --------------------------------------------------------

--
-- Table structure for table `student_room`
--

CREATE TABLE `student_room` (
  `student_room_id` varchar(18) NOT NULL,
  `std_id` varchar(11) NOT NULL,
  `room_detail_id` varchar(18) NOT NULL,
  `seat` int(5) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `footer` longtext NOT NULL,
  `signature` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_show_time`
--

INSERT INTO `web_show_time` (`id`, `web_term`, `web_year`, `banner`, `footer`, `signature`) VALUES
(1, 1, 2561, 'banner_5c49c15752d8d.jpg', '<h2 style=\"font-family: Mitr, sans-serif; font-size: 12px; text-align: center;\"><h5 style=\"\"><span style=\"color: rgb(0, 0, 0);\">สำนักวิชาการศึกษาทั่วไปและนวัตกรรมการเรียนรู้อิเล็กทรอนิกส์ มหาวิทยาลัยราชภัฎสวนสุนันทา<br></span><span style=\"color: rgb(0, 0, 0);\">เลขที่ 1 อาคาร 34 ชั้น 1 ถนนอู่ทองนอก แขวงวชิระ เขตดุสิต กรุงเทพมหานคร 10300<br></span><span style=\"color: rgb(0, 0, 0);\">โทร. 02-160-1265-70 Fax. 02-160-1268 www.gen-ed.ssru.ac.th</span></h5></h2>', '');

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

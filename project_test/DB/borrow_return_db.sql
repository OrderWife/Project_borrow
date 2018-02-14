-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2018 at 05:00 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `borrow_return_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `advisor`
--

CREATE TABLE `advisor` (
  `advisorid` int(2) UNSIGNED NOT NULL,
  `titlenameid` char(2) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `majorid` char(2) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advisor`
--

INSERT INTO `advisor` (`advisorid`, `titlenameid`, `fname`, `lname`, `majorid`, `tel`, `email`) VALUES
(44, '9', 'กนกวรรณ', 'กันยะมี', '2', '-', '-'),
(46, '1', 'จำรูญ', 'จันทร์กุญชร', '1', '-', '-'),
(50, '10', 'โสภณ', 'วิริยะรัตนกุล', '1', '-', '-'),
(51, '10', 'พิศิษฐ์', 'นาคใจ', '1', '-', '-'),
(52, '9', 'พีระพล', 'ขุนอาสา', '1', '-', '-'),
(53, '6', 'ราตรี', 'คำโมง', '2', '-', '-'),
(54, '10', 'จุฬาลักษณ์', ' มหาวัน', '2', '-', '-'),
(55, '10', 'นารีวรรณ', 'พวงภาคีศิริ', '1', '-', '-'),
(56, '10', 'อนุชา', 'เรืองศิริวัฒนกุล', '2', '-', '-'),
(57, '10', 'ชนิดา', 'เรืองศิริวัฒนกุล', '2', '-', '-'),
(58, '10', 'เณริสา', 'อ่อนขำ', '2', '-', '-'),
(59, '10', 'สุรพล', 'ชุ่มกลิ่น', '1', '-', '-'),
(60, '10', 'คเชนทร์', 'ซ่อนกลิ่น', '1', '-', '-'),
(61, '10', 'มานิตย์', 'พ่วงบางโพ', '2', '-', '-'),
(62, '10', 'พิชิต', 'พวงภาคีศิริ', '2', '-', '-'),
(63, '10', 'กฤษณ์', 'ชัยวัณคุปต์', '1', '-', '-'),
(64, '6', 'สมคิด', 'ทุ่นใจ', '1', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookid` int(6) UNSIGNED NOT NULL,
  `booknamethai` varchar(200) NOT NULL,
  `booknameeng` varchar(200) NOT NULL,
  `keyword` text NOT NULL,
  `studentid` int(5) NOT NULL,
  `student` varchar(100) NOT NULL,
  `advisorid` char(2) NOT NULL,
  `year` char(4) NOT NULL,
  `booktypeid` char(2) NOT NULL,
  `abstracts` text NOT NULL,
  `bookfilename` varchar(100) NOT NULL,
  `statusbook` char(2) NOT NULL,
  `num` int(6) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookid`, `booknamethai`, `booknameeng`, `keyword`, `studentid`, `student`, `advisorid`, `year`, `booktypeid`, `abstracts`, `bookfilename`, `statusbook`, `num`, `time`) VALUES
(581001, 'แอปพลิเคชั่นการจองคิวร้านอาหารบนอุปกรณ์พกพา', '', '-', 0, 'ชาญฤทธิ์  แก่นตานุ', '52', '2016', '8', '-', '', '1', 0, '2018-01-29 02:52:11'),
(581002, 'การพัฒนาเกมคอมพิวเตอร์เสริมความรู้ประวัติศาสตร์  กรณีศึกษา: เกมตำนานพระยาพิชัยดาบหัก ตอนการผจญภัยของนายทองดีฟันขาว', '-', '-', 0, 'เสาวภา  คำเหมย', '59', '2015', '4', '-', '', '1', 0, '2018-01-03 09:01:21'),
(581003, 'การพัฒนาเกมคอมพิวเตอร์เสริมความรู้การท่องเทียวไทย  กรณีศึกษา เกมส์พิชิดภูสอยดาว', '-', '-', 0, 'นรากร  จรรยาพามี', '59', '2015', '4', '-', '', '1', 1, '2018-01-03 08:37:25'),
(581004, 'การพัฒนาระบบจัดการสารสนเทศศูนย์ความเป็นเลิศทางวิชาการด้านการสร้างเสริมสุขภาพผู้สูงอายุแบบวิถีไทย วิทยาลัยพยาบาลบรมราชชนนี อุตรดิตถ์', '-', '-', 0, 'รุจาภา  ไชยอ่อน , สุรีย์รัตน์  มาอ้อม', '55', '2015', '1', '-', '', '1', 0, '2018-01-03 08:37:25'),
(581005, 'ระบบพาณิชย์อิเล็กทรอนิกส์การขายทุเรียนออนไลน์ ของจังหวัดอุตรดิตถ์ กรณีศึกษา: องค์การบริหารส่วนตำบลแม่พูล', '-', '-', 0, 'ณัฐธิดา  ชอบธรรม', '57', '2015', '1', '-', '', '1', 0, '2018-01-03 08:37:25'),
(581006, 'เครื่องตัดตัวอักษรจากโฟม ควบคุมด้วย Arduino โดย g-code', '-', '-', 0, 'รัตนพล บุญศรี', '51', '2015', '3', '-', '', '1', 0, '2018-01-03 08:37:25'),
(581007, 'เกมหาตัวอักษรในสวนสัตว์ (Hodden Alphabet Game)', '-', '-', 0, 'เกษิณี คะชา', '58', '2015', '4', '-', '', '1', 0, '2017-12-30 03:33:59'),
(581008, 'การพัฒนาเกมคอมพิวเตอร์เพื่อเผยแพร่ตำนานเมื่อลับแล กรณีศึกษา: เกมคำแก้วตะลุยเมืองลับแล', '-', '-', 0, 'อนิรุตติ์  ตุ้ยเล็ก', '59', '2015', '4', '-', '', '1', 0, '2017-12-30 03:33:59'),
(581009, 'สื่อการนำเสนอข้อมูลการแต่งกายประจำชาติอาเชียน (AEC) แบบตัวการ์ตูนสามมิติ', '-', '-', 0, 'รมย์นลิน  กันยะ', '51', '2015', '4', '-', '', '1', 0, '2017-12-30 03:33:59'),
(581010, 'สกอร์บอร์ดแอลอีดีแบบไร้สายสำหรับโรงยิมของมหาวิทยาลัยราชภัฏอุตรดิตถ์', '-', '-', 0, 'ธัญธวัชญ์  ธนะพัฒน์โชติกุล', '51', '2015', '3', '-', '', '1', 0, '2018-01-08 07:42:14'),
(581011, 'ระบบวางแผนและติดตามโครงงาน กรณีศึกษา:  นักศึกษาวิทยาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ', '-', '-', 0, 'ภานุพงศ์  ตรงต่อกิจ', '54', '2015', '1', '-', '', '1', 0, '2018-01-03 08:37:25'),
(581012, 'แผนที่มหาวิทยาลัยราชภัฏอุตรดิตถ์เสมือนจริงแบบสามมิติ', '-', '-', 0, 'ณัฐสรณ์ คำทองสุข', '51', '2015', '3', '-', '', '1', 0, '2018-01-08 07:42:14'),
(581013, 'ระบบแจ้งเหตุขัดข้องสำหรับวงจรเช่า กรณีศึกษา :บริษัท ฟาติมา อาร์. บี. ดี. เอส อินเตอร์เนชั่นแนล จำกัด', '-', '-', 0, 'พันธวัจน์ โพธิ์ศรีรัตน์', '60', '2015', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(581014, 'ระบบเบิก-จ่ายพัสดุ กรณีศึกษา : วิทยาลัยสารพัดช่างอุตรดิตถ์', '-', '-', 0, 'คนึงนิจ ไชยทิง', '58', '2015', '1', '-', '', '1', 0, '2018-01-03 08:37:25'),
(581015, 'ระบบรายงานความเสี่ยง โรงพยาบาลบ้านไผ่', '-', '-', 0, 'สุประวีน์ มีชื่อ', '57', '2015', '1', '-', '', '1', 0, '2018-01-03 08:37:25'),
(581016, 'การพัฒนาเกมคอมพิวเตอร์ กรณีศึกษา : เกมคำศัพท์ภาษาอังกฤษในชีวิตประจำวัน', '-', '-', 0, 'อารีรัตน์ พรมส้มซ่า', '56', '2015', '4', '-', '', '1', 0, '2018-01-03 08:37:25'),
(581017, 'ระบบจัดการห้องพัก กรณีศึกษา: อพาร์ทเม้นท์เสมาทอง', '-', '-', 0, 'สุชาดา โพธิ์ทอง', '58', '2015', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(581018, 'ระบบสั่งกาแฟผ่านอุปกรณ์พกพาบนหน้าจอสัมผัส กรณีศึกษา : ร้านสมายคอฟฟี่', '-', '-', 0, 'สรายุทธ ปั้นกิจวานิชเจริญ', '52', '2015', '8', '-', '', '1', 0, '2017-12-30 03:33:59'),
(581019, 'แอปพลิคชั่นบัญชีครัวเรือนบนวินโดวส์โฟน', '-', '-', 0, 'ประดิพล ปิตุภูมิสวัสดิ์', '52', '2015', '8', '-', '', '1', 0, '2017-12-30 13:03:29'),
(581020, 'ระบบแจ้งซ่อมอุปกรณ์ไฟฟ้า ศูนย์ควบคุมการจ่ายไฟฟ้า (ฝ่ายปฏิบัติการเครือข่าย) เขต1 ภาคเหนือ จังหวัดเชียงใหม่', '-', '-', 0, 'สุดารัตน์ ทิตา', '54', '2015', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(581021, 'ระบบจัดการคิวเข้าใช้บริการ กรณีศึกษา : สำนักจัดหางานจังหวัดอุตรดิตถ์', '-', '-', 0, 'จิตราภรณ์ อิสสระ , มาริสา คล้ายคลึง', '55', '2015', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(581022, 'ระบบจัดการการจองห้องผ่านระบบเครือข่ายอินเทอร์เน็ต กรณีศึกษา:ศูนย์คอมพิวเตอร์มหาวิทยาลัยราชภัฏอุตรดิตถ์ ', '-', '-', 0, 'ธัชพล ฤทธิ์ทวี', '54', '2015', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(581023, 'ระบบจัดการเอกสารการประชุมสภา มหาวิทยาลัยราชภัฏอุตรดิตถ์', '-', '-', 0, 'ศิริทิพย์ เมืองตุ้ม', '54', '2015', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(581024, 'การพัฒนาเกมทางด้านทักษะคำศัพท์ภาษาอังกฤษ กรณีศึกษา: เกมปริศนาคำศัพท์ภาษาอังกฤษ (English Puzzle Game)', '-', '-', 0, 'ภัทราพร ตวรคิด', '56', '2015', '4', '-', '', '1', 0, '2017-12-30 03:33:59'),
(581025, 'ระบบจัดการข่าวสารประชาสัมพันธ์สมาชิกระบบเครือข่ายมหาวิทยาลัยราชภัฏอุตรดิตถ์ กรณีศึกษา:ศูนย์คอมพิวเตอร์ มหาวิทยาลัยราชภัฏอุตรดิตถ์', '-', '-', 0, 'สุภัทศิริ แตงแก้ว', '62', '2015', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(581026, 'ระบบสารสนเทศการจัดการยา กรณีศึกษา: โรงพยาบาลส่งเสริมสุขภาพตำบลชัยจุมพล', '-', '-', 0, 'พนรัตน์ มะโน', '57', '2015', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(581027, 'ระบบยืม-คืนอุปกรณ์ ภาควิชาไฟฟ้า ของคณะเทคโนโลยีอุตสาหกรรม มหาวิทยาลัยราชภัฏอุตรดิตถ์', '-', '-', 0, 'รัชดาพร วันแว่น', '61', '2015', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(582001, 'ระบบฐานข้อมูลสารสนเทศงานวิจัย  กรณีศึกษา: คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏอุตรดิตถ์', '-', '-', 0, 'กฤษรินทร์  ทองคำ', '57', '2015', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(582002, 'ระบบร้านเช่าหนังสือ กรณีศึกษา: ร้านหนังสือลูกชุบ จังหวัดอุตรดิตถ์', '-', '-', 0, 'สุภาวดี คำแสน', '58', '2015', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(582003, 'ระบบสมาชิกศูนย์ออกกำลังกาย มหาวิทยาลัยราชภัฏอุตรดิตถ์', '-', '-', 0, 'ธเนศ ทาอุด', '54', '2015', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(582004, 'ระบบจัดการเว็บไซต์ศูนย์พัฒนาเด็กเล็ก องค์การบริหารส่วนตำบลหาดสองแคว', '-', '-', 0, 'ศิริวรรณ ดวงดัน', '54', '2015', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(591001, 'ระบบสารสนเทศการจัดการยา กรณีศึกษา โรงพยาบาลส่งเสริมสุขภาพตำบลชัยจุมพล', '-', '-', 0, 'พนรัตน์ มะโน', '57', '2016', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(591002, 'ระบบติดตามผลการปฏิบัติงานของบุคลากร กรณีศึกษา ศูนย์คอมพิวเตอร์ มหาวิทยาลัยราชภัฏอุตรดิตถ์', '-', '-', 0, 'ภานุวัฒน์ พลอาสา', '54', '2016', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(591003, 'ระบบจัดการสถาบันกวดวิชา กรณีศึกษา สถาบันกวดวิชาวิชญา', '-', '-', 0, 'คมสัน เชาวน์มาศ', '56', '2016', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(591004, 'ระบบห้องพยาบาล กรณีศึกษา วิทยาลัยอาชีวศึกษาอุตรดิตถ์', '-', '-', 0, 'ศรัณย์ เชื้อโฮม', '57', '2016', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(591005, 'ระบบฐานข้อมูลบุคลากร กรณีศึกษา เทศบาลตำบลบ้านด่านนาขาม', '-', '-', 0, 'อารีษา แก้วเปี้ย', '60', '2016', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(591006, 'ระบบบริหารจัดการงานซ่อมอุปกรณ์คอมพิวเตอร์ กรณีศึกษา ร้านท่าปลาคอมพิวเตอร์', '-', '-', 0, 'วิรัส แก้วสกุลณี', '61', '2016', '1', '-', '', '1', 0, '2018-01-03 06:52:47'),
(591007, 'แอปฯไหว้พระ 9 วัด', '-', '-', 0, 'หนึ่งฤทัย แหยมคง', '52', '2016', '8', '-', '', '1', 0, '2018-01-03 05:40:03'),
(591008, 'ระบบบริหารจัดการจองห้องพัก โรงแรมเรือนต้นสัก', '-', '-', 0, 'อรรถพงษ์ ปัญญา', '59', '2016', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(591009, 'ระบบติดตามโครงการ กรณีศึกษา บ.แพคกอน จำกัด', '-', '-', 0, 'อรรถชัย เสารางทอย', '56', '2016', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(591010, 'ระบบติดตามพฤติกรรมนักเรียน นักศึกษา กรณีศึกษา วิทยาลัยอาชีวศึกษาอุตรดิตถ์', '-', '-', 0, 'อรชา พู่กัน', '57', '2016', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(591011, 'ระบบฐานข้อมูลพรรณไม้ในมหาวิทยาลัยราชภัฏอุตรดิตถ์ ', '-', '-', 0, 'กนก กั้นเกตุ', '62', '2016', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(591012, 'ระบบคำนวณแคลอรี่เพื่อคนรักสุขภาพ', '-', '-', 0, 'ปรายมาศ ขวัญมุข', '61', '2016', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(591013, 'ระบบทะเบียนนักเรียน กรณีศึกษา โรงเรียนอนุบาลดวงใจลูกรัก', '-', '-', 0, 'สิทธิโชค อาษา', '56', '2016', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(591014, 'ระบบจัดการตารางเรียนตารางสอนออนไลน์ กรณีศึกษาโรงเรียนน้ำปาดชนูปถัมภ์', '-', '-', 0, 'ศุภรัตน์ พิใจ', '54', '2016', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(591015, 'แอปพลิเคชันบัญชีครัวเรือนบนระบบปฏิบัติการแอนดรอยด์', '-', '-', 0, 'เจริญรัตน์ จันทร์จร', '52', '2016', '8', '-', '', '1', 0, '2017-12-30 03:33:59'),
(591016, 'ระบบจัดการข้อมูลการฝึกประสบการณ์วิชาชีพ', '-', '-', 0, 'กัญญาวีร์ แซ่จ๊ะ', '51', '2016', '1', '-', '', '1', 0, '2017-12-30 03:33:59'),
(591017, 'แอปพลิเคชัน แค่ขยับเท่ากับการเผาผลาญ บนระบบปฏิบัติการแอนดรอยด์', '-', '-', 0, 'ชฏาพร ศรเทียน', '57', '2016', '8', '-', '', '1', 0, '2018-01-03 05:40:05'),
(592001, 'พัฒนาเกมบนระบบปฏิบัติการแอนดรอยด์ กรณีศึกษา เกมเติมคำภาษาไทย สำหรับเด็กอายุ 7-9 ปี', '-', '-', 0, 'นุชนาถ นวลคำ', '63', '2016', '4', '-', '', '1', 0, '2018-01-29 02:52:01'),
(592002, 'ระบบการจัดการการลาออนไลน์ กรณีศึกษา คณะวิทยาศาสตร์และเทคโนโลยี', '-', '-', 0, 'สริญญา รัตนกาฬ', '58', '2016', '1', '-', '', '1', 0, '2018-01-29 02:52:04'),
(592003, 'ระบบทะเบียนประวัติบุคลากร กรณีศึกษา โรงเรียนเตรียมอุดมศึกษาน้อมเกล้า', '-', '-', 0, 'อัจฉริยา สีหอำไพ', '61', '2016', '1', '-', '', '1', 0, '2018-01-29 02:52:07'),
(592004, 'พัฒนาเกมบนระบบปฏิบัติการแอนดรอยด์ กรณีศึกษา เกมทายเสียงคำศัพท์ภาษาอังกฤษ สำหรับเด็กอายุ 7-9 ปี', '-', '-', 0, 'ณัฐพงศ์ สืบแก้ว', '63', '2016', '4', '-', '', '1', 0, '2018-01-29 02:52:09'),
(592005, 'ระบบบริหารงานครุภัณฑ์ออนไลน์ กรณีศึกษา โรงเรียนเทศบาลท่าอิฐ', '-', '-', 0, 'สรายุทธ มีศรี', '61', '2016', '1', '-', '', '1', 0, '2018-01-28 06:28:17'),
(592006, 'ระบบสารสนเทศร้านอาหารในเขตพื้นที่จังหวัดอุตรดิตถ์', '-', '-', 0, 'พิเชษฐ์ บัวบังขัง', '51', '2016', '1', '-', '', '1', 0, '2018-01-28 06:28:18'),
(592007, 'ระบบการจัดการฐานข้อมูลงานวิจัย คณะวิทยาศาสตร์และเทคโนโลยี มรอ.', '-', '-', 0, 'สุริสา มูลเมือง', '52', '2016', '1', '-', '', '1', 0, '2018-01-28 06:28:18'),
(592008, 'ระบบการจัดการคอร์สเรียนว่ายน้ำ กรณีศึกษา สระว่ายน้ำมหาวิทยาลัยราชภัฏอุตรดิตถ์', '-', '-', 0, 'ฐิติมา สาตร์ทิม', '61', '2016', '1', '-', '', '1', 0, '2018-01-29 02:50:08'),
(592009, 'ระบบสารสนเทศเพื่อการจัดการสวัสดิการผู้สูงอายุเชิงพื้นที่ กรณีศึกษา องค์การบริหารส่วนตำบลวังแดง', '-', '-', 0, 'วันทนีย์ เกตุสุวรรณ', '64', '2016', '1', '-', '', '1', 0, '2018-01-29 02:50:08'),
(592010, 'ระบบสารสนเทศหน่วยป้องกันรักษาป่าที่ สท.8 (ห้วยใคร้)', '-', '-', 0, 'เยาวพา ทิมเที่ยง', '54', '2016', '1', '-', '', '1', 0, '2018-01-29 02:52:16'),
(592011, 'ระบบจัดการเช่าวีซีดี/ดีวีดี ร้านซันเด วีซีดี', '-', '-', 0, 'วรารินทร์ อินดวง', '58', '2016', '1', '-', '', '1', 0, '2018-01-29 02:52:18'),
(592012, 'ระบบการยืม-คืน อุปกรณ์ต่างๆออนไลน์ กรณีศึกษา โรงเรียนวังแดง', '-', '-', 0, 'อาริสา สีเนียม', '44', '2016', '1', '-', '', '1', 0, '2018-01-29 02:50:08'),
(592013, 'เว็บไซต์เพื่อการประชาสัมพันธ์ข่าวสารและกิจกรรม กรณีศึกษา สำนักงานเกษตรอำเภอตรอน', '-', '-', 0, 'นันทิยา ทรัพย์ศรี', '63', '2016', '7', '-', '', '1', 0, '2018-01-26 09:35:35'),
(592014, 'ระบบนัดพบอาจารย์ที่ปรึกษาออนไลน์ กรณีศึกษา คณะวิทยาศาสตร์และเทคโนโลยี มรอ.', '-', '-', 0, 'วนัชพร ม่วงอ่อน', '63', '2016', '1', '-', '', '1', 0, '2018-02-10 19:22:02'),
(592015, 'ระบบแจ้งซ่อมคอมพิวเตอร์ กรณีศึกษาโรงเรียนเตรียมอุดมศึกษาน้อมเกล้าอุตรดิตถ์ ', '-', '-', 0, 'จักรพงษ์ ดีสี', '58', '2016', '1', '-', '', '1', 0, '2018-02-10 19:22:02'),
(592016, 'ระบบสารสนเทศแฟ้มสะสมงานนักศึกษา กรณีศึกษา คณะวิทยาศาสตร์และเทคโนโลยี มรอ.', 'portfolio', '-', 0, 'เพ็ญนภา ฟักถาวร', '62', '2016', '1', '-', '', '1', 0, '2018-02-10 19:22:02'),
(592017, 'ระบบฐานข้อมูลสารสนเทศงานวิจัย  กรณีศึกษา คณะวิทยาศาสตร์และเทคโนโลยี มรอ.', '-', '-', 0, 'กฤษรินทร์ ทองคำ', '57', '2016', '1', '-', '', '1', 0, '2018-02-10 19:22:03'),
(592018, 'ระบบการลา กรณีศึกษา สำนักส่งเสริมอุตสาหกรรมซอฟต์แวร์แห่งชาติ', '', '-', 0, 'กรีกมล แย้มอ้น', '61', '2016', '1', '-', '', '1', 0, '2017-12-30 03:33:59');

-- --------------------------------------------------------

--
-- Table structure for table `bookborrow`
--

CREATE TABLE `bookborrow` (
  `borrowid` int(4) UNSIGNED NOT NULL,
  `bookid` int(6) NOT NULL,
  `borrowerid` int(5) NOT NULL,
  `statusbook` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bookreturn`
--

CREATE TABLE `bookreturn` (
  `returnid` int(2) UNSIGNED NOT NULL,
  `borrowid` char(4) NOT NULL,
  `returndetailid` char(4) NOT NULL,
  `returndatef` datetime NOT NULL,
  `staffid` char(3) NOT NULL,
  `statusbook_re` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bookstatus`
--

CREATE TABLE `bookstatus` (
  `bookstatusid` int(2) UNSIGNED NOT NULL,
  `bookstatus` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookstatus`
--

INSERT INTO `bookstatus` (`bookstatusid`, `bookstatus`) VALUES
(1, 'ยืมได้(ว่าง)'),
(2, 'ถูกยืม(ไม่ว่าง)'),
(3, 'ชำรุด(ห้ามยืม)'),
(4, 'สูญหาย');

-- --------------------------------------------------------

--
-- Table structure for table `booktype`
--

CREATE TABLE `booktype` (
  `booktypeid` int(2) UNSIGNED NOT NULL,
  `booktype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booktype`
--

INSERT INTO `booktype` (`booktypeid`, `booktype`) VALUES
(1, 'เว็ปแอปพลิเคชัน'),
(2, 'เว็ปโมบาย'),
(3, 'IOT'),
(4, 'พัฒนาเกม'),
(5, 'Application on IOS'),
(6, 'Game deverloper'),
(7, 'เว็บไซต์'),
(8, 'แอปพลิเคชันโมบาย');

-- --------------------------------------------------------

--
-- Table structure for table `bookunavailable`
--

CREATE TABLE `bookunavailable` (
  `unavailableid` int(3) UNSIGNED NOT NULL,
  `bookstatusid` char(2) NOT NULL,
  `bookid` char(5) NOT NULL,
  `date` datetime NOT NULL,
  `staffid` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `borrowdetail`
--

CREATE TABLE `borrowdetail` (
  `borrowdetailid` int(4) UNSIGNED NOT NULL,
  `borrowid` char(4) NOT NULL,
  `bookid` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `borrower`
--

CREATE TABLE `borrower` (
  `borrowerid` int(5) NOT NULL,
  `memberid` int(11) NOT NULL,
  `borrowdate` date NOT NULL,
  `returndate` date NOT NULL,
  `returnbook` date NOT NULL,
  `status_member` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `condition`
--

CREATE TABLE `condition` (
  `book_number` int(2) NOT NULL,
  `date_number` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `condition`
--

INSERT INTO `condition` (`book_number`, `date_number`) VALUES
(5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `majorid` int(2) UNSIGNED NOT NULL,
  `major` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`majorid`, `major`) VALUES
(1, 'วิทยาการคอมพิวเตอร์'),
(2, 'เทคโนโลยีสารสนเทศ'),
(3, 'วิทยาการคอมพิวเตอร์ประยุกต์และเทคโนโลยีอินเทอร์เน็ต');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberid` int(11) UNSIGNED NOT NULL,
  `titlenameid` char(2) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `tel` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `majorid` char(2) NOT NULL,
  `username` varchar(30) NOT NULL,
  `userpassword` varchar(30) NOT NULL,
  `typememberid` varchar(2) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `allow` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberid`, `titlenameid`, `fname`, `lname`, `address`, `tel`, `email`, `majorid`, `username`, `userpassword`, `typememberid`, `status`, `allow`) VALUES
(48, '1', 'สัตยา', 'นาครุ้ง', 'บ้านหัวดุม', '-', 'sattaya@gmail.com', '1', 'sattaya', '1234', '2', '0', 2),
(49, '1', 'บุษกร', 'ไข่ทา', '-', '-', 'bussakorn@gmail.com', '1', 'bussakorn', '123456789', '2', '0', 0),
(50, '1', 'สิทธิโชค', 'พวงแก้ว', 'บ้านปากฝาง            ', '-', 'sittichok@gmail.com', '1', 'sittichok', '01234', '2', '0', 0),
(51, '3', 'ทองดี', 'ทองเด่น', 'อุตรดิตถ์', '-', 'aa@aa', '3', 'tong', '147', '1', '0', 0),
(52, '1', 'สุรศักดิ์', 'จิตอารี', 'มหาวิทยาลัยราชภัฏอุตรดิตถ์', '0881372484', 'pao@gmail.com', '1', 'pao', '1234', '2', '0', 2),
(53, '2', 'กนก', 'วันนา', '27 ถนน อินใจมี อุตรดิตถ์ 53000            ', '0817276999', 'kanok@hotmail.com', '2', 'kanok', 'kanok', '2', '0', 0),
(54, '1', 'ภูวดลย์', 'สอนนนฐี', '', '', '', '2', 'poowadon', '1111', '2', '0', 0),
(55, '1', 'วันวิเศษ', 'อภิชาติ', '', '123456789', '', '1', 'wanwiset', '123', '2', '0', 0),
(56, '1', 'วุฒิชัย', 'ใจสุทธิ์', 'บ้านวังยาง', '', '', '1', 'wuttichai', '456', '2', '0', 0),
(57, '9', 'กนกวรรณ', 'กันยะมี', 'มหาวิทยาลัยราชภัฎอุตรดิตถ์', '0817276987', 'ajkanokwan@gmail.com', '2', 'ajkanokwan', '123456', '1', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `returndetail`
--

CREATE TABLE `returndetail` (
  `returndetailid` int(4) UNSIGNED NOT NULL,
  `book` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` int(3) UNSIGNED NOT NULL,
  `titlenameid` char(2) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `userpassword` varchar(30) NOT NULL,
  `status_staff` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `titlenameid`, `fname`, `lname`, `tel`, `email`, `username`, `userpassword`, `status_staff`) VALUES
(1, '1', 'ไพฑูณ', 'สุดหล่อ', '0881234567', 'pitoon@uru.ac.th', 'pi', '1234', '1'),
(2, '1', 'จิรเมธ', 'ยศหล้า', '0881372484', 'jiramet.yodla@gmail.com', 'admin', '54321', '0'),
(3, '1', 'วันวิเศษ', 'อภิชาติ', '01', 'wanwiset@apichat', 'wanwiset', '12345', '1'),
(4, '2', 'ทรรศนีย์', 'แก่งอินทร์', '02', 'tassanee@gangin', 'tassanee', '1111', '1');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` int(5) UNSIGNED NOT NULL,
  `titlenameid` int(2) NOT NULL,
  `fname_stu` varchar(50) NOT NULL,
  `lname_stu` varchar(50) NOT NULL,
  `id_stu` varchar(13) NOT NULL,
  `majorid` varchar(2) CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `titlename`
--

CREATE TABLE `titlename` (
  `titlenameid` int(2) UNSIGNED NOT NULL,
  `titlename` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `titlename`
--

INSERT INTO `titlename` (`titlenameid`, `titlename`) VALUES
(1, 'นาย'),
(2, 'นางสาว'),
(3, 'นาง'),
(4, 'ดร.'),
(5, 'ศาสตราจารย์'),
(6, 'ผู้ช่วยศาสตราจารย์'),
(7, 'ผู้อำนวยการ'),
(8, 'รองศาสตราจารย์'),
(9, 'อาจารย์ ดร.'),
(10, 'อาจารย์'),
(11, 'รองคณะบดี'),
(12, 'คณะบดี');

-- --------------------------------------------------------

--
-- Table structure for table `typemember`
--

CREATE TABLE `typemember` (
  `typememberid` int(2) UNSIGNED NOT NULL,
  `nametype` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `typemember`
--

INSERT INTO `typemember` (`typememberid`, `nametype`) VALUES
(1, 'อาจารย์'),
(2, 'นักศึกษา');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advisor`
--
ALTER TABLE `advisor`
  ADD PRIMARY KEY (`advisorid`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `bookborrow`
--
ALTER TABLE `bookborrow`
  ADD PRIMARY KEY (`borrowid`);

--
-- Indexes for table `bookreturn`
--
ALTER TABLE `bookreturn`
  ADD PRIMARY KEY (`returnid`);

--
-- Indexes for table `bookstatus`
--
ALTER TABLE `bookstatus`
  ADD PRIMARY KEY (`bookstatusid`);

--
-- Indexes for table `booktype`
--
ALTER TABLE `booktype`
  ADD PRIMARY KEY (`booktypeid`);

--
-- Indexes for table `bookunavailable`
--
ALTER TABLE `bookunavailable`
  ADD PRIMARY KEY (`unavailableid`);

--
-- Indexes for table `borrowdetail`
--
ALTER TABLE `borrowdetail`
  ADD PRIMARY KEY (`borrowdetailid`);

--
-- Indexes for table `borrower`
--
ALTER TABLE `borrower`
  ADD PRIMARY KEY (`borrowerid`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`majorid`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `returndetail`
--
ALTER TABLE `returndetail`
  ADD PRIMARY KEY (`returndetailid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `titlename`
--
ALTER TABLE `titlename`
  ADD PRIMARY KEY (`titlenameid`);

--
-- Indexes for table `typemember`
--
ALTER TABLE `typemember`
  ADD PRIMARY KEY (`typememberid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advisor`
--
ALTER TABLE `advisor`
  MODIFY `advisorid` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `bookborrow`
--
ALTER TABLE `bookborrow`
  MODIFY `borrowid` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookreturn`
--
ALTER TABLE `bookreturn`
  MODIFY `returnid` int(2) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookstatus`
--
ALTER TABLE `bookstatus`
  MODIFY `bookstatusid` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booktype`
--
ALTER TABLE `booktype`
  MODIFY `booktypeid` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bookunavailable`
--
ALTER TABLE `bookunavailable`
  MODIFY `unavailableid` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `borrowdetail`
--
ALTER TABLE `borrowdetail`
  MODIFY `borrowdetailid` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `borrower`
--
ALTER TABLE `borrower`
  MODIFY `borrowerid` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `majorid` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `returndetail`
--
ALTER TABLE `returndetail`
  MODIFY `returndetailid` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffid` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentid` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `titlename`
--
ALTER TABLE `titlename`
  MODIFY `titlenameid` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `typemember`
--
ALTER TABLE `typemember`
  MODIFY `typememberid` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

<?php
include 'connect_book.php';

$sql = "SELECT * FROM `book`";
$result = mysqli_query($conn, $sql);


// if(move_uploaded_file($_FILES["bookfilename"]["tmp_name"],"bookfilename/".$_FILES["bookfilename"]["name"]))
//     {
//         $strSQL = "INSERT INTO book ";
//         $strSQL .="(bookfilename) VALUES ('".$_FILES["bookfilename"]["name"]."')";
//         //echo $strSQL;
//         $objQuery = mysqli_query($conn, $strSQL);


// }

$bookid = $_POST['bookid'];
$booknamethai = $_POST['booknamethai'];
$booknameeng = $_POST['booknameeng'];
$keyword = $_POST['keyword'];
$advisorid = $_POST['advisorid'];
$student = $_POST['student'];
$year = $_POST['year'];
$statusbook = $_POST['statusbook'];
$abstracts = $_POST['abstracts'];
$bookfilename = $_FILES["bookfilename"]["name"];
//$bookfilename = $_POST['bookfilename'];
//$bookstatusid = $_POST['bookstatusid'];
//$bookstatusid2 = $_POST['bookstatusid2'];

$sql = "INSERT INTO `book` (`bookid`, `booknamethai`, `booknameeng`, `keyword`, `advisorid` ,  `student` , `year`, `statusbook`, `abstracts`,`bookfilename`, `bookstatusid`) VALUES ('$bookid', '$booknamethai', '$booknameeng', '$keyword', '$advisorid', '$student' , '$year', 1, '$abstracts','$bookfilename')";
 
 $result = mysqli_query($conn, $sql);
 	if ($result) {

 		move_uploaded_file($_FILES["bookfilename"]["tmp_name"],"bookfilename/".$_FILES["bookfilename"]["name"]);
 		echo "<script>";
        	echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'pj_book.php' ";
        echo "</script>";
 		
      // echo "Reccord";
 	} else {
 		echo "Error " .mysqli_error($conn);
 	}

 	?>

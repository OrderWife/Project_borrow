<?php
include 'connect_book.php';

$bookid = $_POST['bookid'];
$booknamethai = $_POST['booknamethai'];
$booknameeng = $_POST['booknameeng'];
$keyword = $_POST['keyword'];
//$studentid = $_POST['studentid'];
$student = $_POST['student'];
$advisorid = $_POST['advisorid'];
$year = $_POST['year'];
$booktypeid = $_POST['booktypeid'];
$abstracts = $_POST['abstracts'];
//$bookfilename = $_POST['bookfilename'];
//$bookstatusid = $_POST['bookstatusid'];


$sql ="UPDATE `book` SET booknamethai='$booknamethai',booknameeng='$booknameeng',keyword='$keyword',
				student='$student',advisorid='$advisorid',year='$year',booktypeid='$booktypeid',abstracts='$abstracts' WHERE bookid='$bookid'";

$result = mysqli_query($conn, $sql);
 	if ($result) {
 		// echo "<script>";
   //      	echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'pj_book.php' ";
   //      echo "</script>";
 		echo "SUCCESS";
 	} else {
 		echo "Error " .mysqli_error($conn);
 }


?>

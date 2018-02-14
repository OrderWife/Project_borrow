<?php
include 'connect_book.php';

$sql = "SELECT * FROM `major`";
$result = mysqli_query($conn, $sql);

//$majorid = $_POST['majorid'];
$major = $_POST['major'];


$sql = "INSERT INTO `major` (`majorid`, `major`) VALUES (NULL, '$major')";
 
$result = mysqli_query($conn, $sql);
 	if ($result) {
 		echo "<script>";
        echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'pj_major.php' ";
        echo "</script>";
 	} else {
 		echo "Error " .mysqli_error($conn);
 	}
?>
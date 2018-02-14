<?php
include 'connect_book.php';

//$booktypeid = $_POST['booktypeid'];
$booktype = $_POST['booktype'];


$sql = "INSERT INTO `booktype` (`booktypeid`, `booktype`) VALUES (NULL, '$booktype')";
 
$result = mysqli_query($conn, $sql);
 	if ($result) {
 		echo "<script>";
        echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'pj_booktype.php' ";
        echo "</script>";
 	} else {
 		echo "Error " .mysqli_error($conn);
 	}
?>
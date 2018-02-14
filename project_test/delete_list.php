<?php 
session_start();
include 'connect_book.php';



$bookid = $_GET['bookid'];
$memberid = $_GET['memberid'];
$borrowdate = $_GET['borrowdate'];
$returndate = $_GET['returndate'];
$borrowerid = $_GET['borrowerid'];

$sql_del ="DELETE FROM `bookborrow` WHERE bookid='$bookid' ";
$result_del = mysqli_query($conn, $sql_del);
 	if ($result_del) {
 		echo "<script>";
        echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'addbook.php' ";
        echo "</script>";
        // echo "SUCCESS";
 	} else {
 		echo "Error " .mysqli_error($conn);
 	}

// unset(var)
?>
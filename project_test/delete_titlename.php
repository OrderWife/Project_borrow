<?php 
session_start();
include 'connect_book.php';

$titlenameid = $_GET['titlenameid'];

$sql_del ="DELETE FROM `titlename` WHERE titlenameid='$titlenameid' ";
$result_del = mysqli_query($conn, $sql_del);
 	if ($result_del) {
 		echo "<script>";
        echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'pj_titlename_admin.php' ";
        echo "</script>";
        // echo "SUCCESS";
 	} else {
 		echo "Error " .mysqli_error($conn);
 	}

// unset(var)
?>
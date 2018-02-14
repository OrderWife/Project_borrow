<?php 
session_start();
include 'connect_book.php';

$majorid = $_GET['majorid'];

$sql_del ="DELETE FROM `major` WHERE majorid='$majorid' ";
$result_del = mysqli_query($conn, $sql_del);
 	if ($result_del) {
 		echo "<script>";
        echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'pj_major_admin.php' ";
        echo "</script>";
        // echo "SUCCESS";
 	} else {
 		echo "Error " .mysqli_error($conn);
 	}

// unset(var)
?>
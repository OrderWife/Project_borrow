<?php 
session_start();
include 'connect_book.php';

$staffid = $_GET['staffid'];

$sql_del ="DELETE FROM `staff` WHERE staffid='$staffid' ";
$result_del = mysqli_query($conn, $sql_del);
 	if ($result_del) {
 		echo "<script>";
        echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'list_admin.php' ";
        echo "</script>";
        // echo "SUCCESS";
 	} else {
 		echo "Error " .mysqli_error($conn);
 	}

// unset(var)
?>
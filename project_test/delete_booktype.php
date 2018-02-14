<?php 
session_start();
include 'connect_book.php';

$booktypeid = $_GET['booktypeid'];

$sql_del ="DELETE FROM `booktype` WHERE booktypeid='$booktypeid' ";
$result_del = mysqli_query($conn, $sql_del);
 	if ($result_del) {
 		echo "<script>";
        echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'pj_booktype_admin.php' ";
        echo "</script>";
        // echo "SUCCESS";
 	} else {
 		echo "Error " .mysqli_error($conn);
 	}

// unset(var)
?>
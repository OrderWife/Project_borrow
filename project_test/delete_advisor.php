<?php 
session_start();
include 'connect_book.php';

$advisorid = $_GET['advisorid'];

$sql_del ="DELETE FROM `advisor` WHERE advisorid='$advisorid' ";
$result_del = mysqli_query($conn, $sql_del);
 	if ($result_del) {
 		echo "<script>";
        echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'pj_advisor_admin.php' ";
        echo "</script>";
        // echo "SUCCESS";
 	} else {
 		echo "Error " .mysqli_error($conn);
 	}

// unset(var)
?>
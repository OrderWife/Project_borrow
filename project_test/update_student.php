<?php
include 'connect_book.php';


$studentid = $_POST['studentid'];
$titlenameid = $_POST['titlenameid'];
$fname_stu = $_POST['fname_stu'];
$lname_stu = $_POST['lname_stu'];
$id_stu = $_POST['id_stu'];
$majorid = $_POST['majorid'];
$tel = $_POST['tel'];
$email = $_POST['email'];


$sql ="UPDATE `student` SET `studentid`='$studentid',`titlenameid`='$titlenameid',`fname_stu`='$fname_stu',`lname_stu`='$lname_stu',`id_stu`='$id_stu',`majorid`='$majorid',`tel`='$tel',`email`='$email' WHERE studentid='$studentid'";

$result = mysqli_query($conn, $sql);
 	if ($result) {
 		header('Location: pj_student.php');
 	} else {
 		echo "Error " .mysqli_error($conn);
 }


?>

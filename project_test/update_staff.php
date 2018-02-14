<?php
include 'connect_book.php';

$staffid = $_POST['staffid'];
$titlenameid = $_POST['titlenameid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$username = $_POST['username'];
$userpassword = $_POST['userpassword'];


$sql ="UPDATE `staff` SET `staffid`='$staffid',`titlenameid`='$titlenameid',`fname`='$fname',`lname`='$lname',`tel`='$tel',`email`='$email',`username`='$username',`userpassword`='$userpassword' WHERE staffid='$staffid'";

$result = mysqli_query($conn, $sql);
 	if ($result) {
 		header('Location: list_staff.php');
 	} else {
 		echo "Error " .mysqli_error($conn);
 }


?>
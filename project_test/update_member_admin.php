<?php
include 'connect_book.php';

$memberid = $_POST['memberid'];
$titlenameid = $_POST['titlenameid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$majorid = $_POST['majorid'];
$username = $_POST['username'];
$userpassword = $_POST['userpassword'];

$sql ="UPDATE `member` SET memberid='$memberid',titlenameid='$titlenameid',fname='$fname',lname='$lname',address='$address',tel='$tel',email='$email',majorid='$majorid',username='$username',userpassword='$userpassword' WHERE memberid='$memberid' ";

$result = mysqli_query($conn, $sql);
 	if ($result) {
 		header('Location: detail_member_admin.php');
 		//echo "YES";
 	} else {
 		echo "Error " .mysqli_error($conn);
 }


?>
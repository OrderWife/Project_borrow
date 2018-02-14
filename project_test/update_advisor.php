<?php
include 'connect_book.php';


$advisorid = $_POST['advisorid'];
$titlenameid = $_POST['titlenameid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$majorid = $_POST['majorid'];
$tel = $_POST['tel'];
$email = $_POST['email'];

$sql ="UPDATE `advisor` SET advisorid='$advisorid',titlenameid='$titlenameid',fname='$fname',lname='$lname',majorid='$majorid',tel='$tel',email='$email' WHERE advisorid='$advisorid'";

$result = mysqli_query($conn, $sql);
 	if ($result) {
 		header('Location: pj_advisor.php');
 	} else {
 		echo "Error " .mysqli_error($conn);
 }


?>

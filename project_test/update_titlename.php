<?php
include 'connect_book.php';


$titlenameid = $_POST['titlenameid'];
$titlename = $_POST['titlename'];


$sql ="UPDATE `titlename` SET  titlename='$titlename' WHERE titlenameid='$titlenameid'";

$result = mysqli_query($conn, $sql);
 	if ($result) {
 		header('Location: pj_titlename.php');
 		//echo "Sucsess";
 	} else {
 		echo "Error " .mysqli_error($conn);
 }


?>

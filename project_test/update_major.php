<?php
include 'connect_book.php';


$majorid = $_POST['majorid'];
$major = $_POST['major'];


$sql ="UPDATE `major` SET majorid='$majorid', major='$major' WHERE majorid='$majorid'";



$result = mysqli_query($conn, $sql);
 	if ($result) {
 		header('Location: pj_major.php');
 		//echo "Sucsess";
 	} else {
 		echo "Error " .mysqli_error($conn);
 }


?>
<?php
include 'connect_book.php';


$booktypeid = $_POST['booktypeid'];
$booktype = $_POST['booktype'];


$sql ="UPDATE `booktype` SET booktypeid='$booktypeid', booktype='$booktype' WHERE booktypeid='$booktypeid'";



$result = mysqli_query($conn, $sql);
 	if ($result) {
 		header('Location: pj_booktype.php');
 	} else {
 		echo "Error " .mysqli_error($conn);
 }


?>

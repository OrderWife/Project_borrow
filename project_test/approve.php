<?php
include 'connect_book.php';

// $sql = "SELECT * FROM `bookborrow`";
// $result = mysqli_query($conn, $sql);

// $bookid = $_GET['bookid'];
 $memberid = $_GET['memberid'];
 $borrowerid = $_GET['borrowerid'];


	$sql3 = "UPDATE `borrower` SET `status_member` = 1 WHERE `borrowerid` = $borrowerid";
	$result3 = mysqli_query($conn, $sql3);
	$conn->query($sql3);

// echo "<pre>";
// print_r($bookid);
// echo "</pre>";
$total = $_GET['total'];
$date = $_GET['date'];
$total = $_GET['total'];
$today = date('Y-m-d');
// $sql = "UPDATE `bookborrow` SET statusbook = '$total' WHERE `borrowerid`= 1";
// $conn->query($sql);
// 	for($i=0;$i<count($bookid);$i++)
// 	{
// 		if($bookid[$i] != "")
// 		{ 
// 			$sql2 = "UPDATE `book` SET statusbook = '$total' WHERE bookid = '$bookid[$i]'";
// 			// $result = mysqli_query($conn, $sql); 
// 			// $result2 = mysqli_query($conn, $sql2);
// 			$conn->query($sql2);
// 		}
// 	} 
	
if ($conn->query($sql3) === TRUE) {
   // echo $_GET['borrowid'];
	header('Location: list_borrowbook.php');
	echo "สำเร็จ";
} else {
     echo "Error: " . $sql3 . "<br>" . $conn->error;
 }

//echo $today;
//echo $_POST['hdnSiteName'];
//echo $sql;
//echo "YES";

//echo $today;
?>
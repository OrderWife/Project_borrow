<?php
include 'connect_book.php';

// $sql = "SELECT * FROM `bookborrow`
// INNER JOIN book ON bookborrow.bookid=book.bookid ";
// $result = mysqli_query($conn, $sql);

 $borrowerid = $_GET['borrowerid'];


echo $sql_borrow = "SELECT * FROM `bookborrow` WHERE `borrowerid` = '$borrowerid'";
$result_borrow = mysqli_query($conn, $sql_borrow);

while ($row = mysqli_fetch_array($result_borrow, MYSQLI_ASSOC)) {
	$bookid[] = $row['bookid'];
}
 // echo  $bookid;
// $borrowid = $_GET['borrowid'];
$member_id = $_GET['member_id'];
$date = $_GET['date'];
$total = $_GET['total'];
//$date_ture = $_GET['date_ture'];
//$count_borrow = $_GET['count_borrow'];
$today = date('Y-m-d');
//$returnbook = $_GET['returnbook'];

// $sql = "UPDATE `bookborrow` SET statusbook = '$total'  , returnbook = '$today' WHERE borrowid = '$borrowid'";

 $sql = "UPDATE `borrower` SET `status_member` = 3 ,returnbook = '$today' WHERE `borrowerid` = $borrowerid";
	

if ($conn->query($sql) === TRUE) {
  for($i=0;$i<count($bookid);$i++)
	{
		if($bookid[$i] != "")
		{

			$sql2 = "UPDATE `book` SET `statusbook`= '$total' WHERE bookid = '$bookid[$i]' ";
			$conn->query($sql2);

		}

	}


}else{
	echo "Error: " . $sql . "<br>" . $conn->error;
}
header('Location: list_returnbook.php');
//echo $today;
//echo $_POST['hdnSiteName'];
//echo $sql;
// echo "<br>";
// echo "YES";

//echo $today;
?>
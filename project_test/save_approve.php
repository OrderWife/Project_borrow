<?php
session_start();
include 'connect_book.php';

 $sql_condition = "SELECT * FROM `condition`";
$result_condition = mysqli_query($conn, $sql_condition);
$row_condition = mysqli_fetch_array($result_condition, MYSQLI_ASSOC);
$date_number = $row_condition['date_number'];
 $book_number = $row_condition['book_number'];

// $bookid = $_SESSION['bookid'];
// echo "<pre>";
// print_r($bookid);
// echo "</pre>";

$bookid = $_POST['bookid'];

$memberid = $_POST['memberid'];
$borrowdate = $_POST['borrowdate'];
$returndate = $_POST['returndate'];
$borrowerid = $_POST['borrowerid'];

$sql = "SELECT * FROM `bookborrow` WHERE borrowerid = '$borrowerid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

////////////////////////////

// $borrowerid_borrow = $row['borrowerid'];

// for($i=0;$i<count($bookid);$i++){
// 		if($bookid[$i] != ""){
// 			echo $bookid[$i];echo "<br>";
// 			echo $_SESSION['bookid'] = $memberid;echo "<br>";
// 			echo $_SESSION['borrowdate'] = $borrowdate;echo "<br>";
// 			echo $_SESSION['returndate'] = $returndate;echo "<br>";
// 			echo $_SESSION['borrowerid'] = $borrowerid;echo "<br>";	
// 		}
// 	}
	
////////////////////////////

	if ($bookid != '') {
		if (count($bookid) > $book_number) {
			$_SESSION['bookid'] = $bookid;
			echo "<script>";
				echo "alert('ผิดพลาด! เนื่องจากจากคุณมีจำนวนเล่มโครงงานไม่ตรงตามจำนวนที่กำหนดไว้'); location.href = 'borrowbook.php' ";
			echo "</script>";
		}

		else {

	$sql_borrower ="INSERT INTO `borrower`(`borrowerid`, `memberid`, `borrowdate`, `returndate`, `status_member`) VALUES (NULL,'$memberid','$borrowdate','$returndate',0)";
	$conn->query($sql_borrower);

	for($i=0;$i<count($bookid);$i++)
	{
		if($bookid[$i] != "")
		{

		$sql = "INSERT INTO `bookborrow`(`borrowid`, `bookid`, `borrowerid`) VALUES (NULL, '$bookid[$i]', '$borrowerid')";

		$sql2 = "UPDATE `book` SET `statusbook`= '2' WHERE bookid = '$bookid[$i]'";

		$conn->query($sql);
		$conn->query($sql2);

		}
	}
          
           	 unset($_SESSION['booktypeid']);
		     unset($_SESSION['advisorid']); 
		     unset($_SESSION['year']); 
		     unset($_SESSION['bookid']);
		     unset($_SESSION['booknamethai']);
		     unset($_SESSION['bookid']);
			echo "<script>";
		        echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'report_borrow_member.php' ";
		    echo "</script>";
		}
	}



	else {
		echo "<script>";
			echo "alert('ผิดพลาด! เนื่องจากจากคุณมีจำนวนเล่มโครงงานไม่ตรงตามจำนวนที่กำหนดไว้'); location.href = 'borrowbook.php' ";
		echo "</script>";
		echo $book_number;

	}

?>
<!-- <!DOCTYPE html>
<html lang="en">

<head></head>
<body>
	<form action="test.php" method="post">
		<button type="submit" value="ตกลง">
	</form>
</body>
</html> -->
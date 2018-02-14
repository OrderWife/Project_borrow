<?php
include 'connect_book.php';

$sql = "SELECT * FROM `bookborrow` 
INNER JOIN book ON bookborrow.bookid=book.bookid ";
$result = mysqli_query($conn, $sql);


$bookid = $_POST['bookid'];
//$bookid1 = $_POST['bookid1'];
//$bookid2 = $_POST['bookid2'];
//$bookid3 = $_POST['bookid3'];
$memberid = $_POST['memberid'];
$borrowdate = $_POST['borrowdate'];
$returndate = $_POST['returndate'];

 print_r($_POST); 

		$sql1= "SELECT * FROM `book` where `bookid` = $bookid";
		$result1 = mysqli_query($conn, $sql1);
		$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);

		$new_num=$row1['num']+1;

		$sq_num = "UPDATE `book` SET `num` = $new_num where `bookid` = $bookid ";
		$result_num = mysqli_query($conn, $sq_num); 

		// $arr = array(
		// 	array('id' => $bookid),
		// 	array('id' => $bookid2),
		// 	array('id' => $bookid3)
		// 			);
		// 	foreach ($arr as $value) {
		// 		echo "Value : $value";
		// 	}


		$sql = "INSERT INTO  `bookborrow`(`borrowid`, `bookid`, `memberid`, `borrowdate`, `returndate`, `statusbook`) VALUES (NULL, '$bookid', '$memberid', '$borrowdate', '$returndate', 0)";

		$sql2 = "UPDATE `book` SET statusbook = '0'";

		// $sql = "INSERT INTO `bookborrow`(`borrowid`,`bookid`,`memberid`,`borrowdate`,`returndate`,`returnbook`,`statusbook`) VALUES (NULL,$bookid1,$memberid,'$borrowdate','$returndate',0,0)";

		// $sql2 = "INSERT INTO `bookborrow`(`borrowid`,`bookid`,`memberid`,`borrowdate`,`returndate`,`returnbook`,`statusbook`) VALUES (NULL,$bookid2,$memberid,'$borrowdate','$returndate',0,0)";

		// $sql3 = "INSERT INTO `bookborrow`(`borrowid`,`bookid`,`memberid`,`borrowdate`,`returndate`,`returnbook`,`statusbook`) VALUES (NULL,$bookid3,$memberid,'$borrowdate','$returndate',0,0)";

		 
		// $result = mysqli_query($conn, $sql);
		// $result2 = mysqli_query($conn, $sql2);
		// $result3 = mysqli_query($conn, $sql3);

		 //if ($result!=="") {
		if ($conn->query($sql) === TRUE) {
			if ($conn->query($sql2) === TRUE) {
			// echo "<script>";
		 //        echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'pj_borrowbook.php' ";
		 //    echo "</script>";
		      echo "Keep Sucsess";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}


		// if ($bookid) {
		// 	foreach ($bookid as $q) {
				
		// 	}

		// }

?>

<!DOCTYPE html>
<html>
<body>
<center><h3><a href="page1.php">กลับสู่หน้าหลัก</a></h3>

<?php
include 'connect_book.php';


//$memberid = $_POST['memberid'];
$titlenameid = $_POST['titlenameid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$address = $_POST['address'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$majorid = $_POST['majorid'];
$username = $_POST['username'];
$userpassword = $_POST['userpassword'];
$typememberid = $_POST['typememberid'];



$sql = "INSERT INTO `member` (`memberid`, `titlenameid`, `fname`, `lname`, `address`, `tel`, `email`, `majorid`, `username`, `userpassword`, `typememberid`, `allow`) VALUES ( NULL, '$titlenameid', '$fname', '$lname', '$address', '$tel', '$email', '$majorid', '$username', '$userpassword', '$typememberid',0)";
 


$result = mysqli_query($conn, $sql);
 	if ($result) {
 		echo "<script>";
        echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'index1.php' ";
        echo "</script>";
 	} else {
 		echo "Error " .mysqli_error($conn);
 	}

?>

</center>
</body>
</html>
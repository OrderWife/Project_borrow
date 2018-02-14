<?php 

include 'connect_book.php';

$username = mysqli_real_escape_string($conn, $_POST['username']);
$userpassword = mysqli_real_escape_string($conn, $_POST['userpassword']);


$sql = "SELECT * FROM staff WHERE username=? AND userpassword=?";
$stmt = mysqli_prepare($conn, $sql);


mysqli_stmt_bind_param($stmt, "ss", $username, $userpassword);
mysqli_execute($stmt);


$result_user = mysqli_stmt_get_result($stmt);

if ($result_user->num_rows == 1) {
	session_start();
	$row_user = mysqli_fetch_array($result_user, MYSQLI_ASSOC);
	//echo$row_user['status_staff'];
	$_SESSION['staffid'] = $row_user['staffid'];
	$_SESSION['status_staff'] = $row_user['status_staff'];
	if($row_user['status_staff'] == 1)
	{
	  	header("Location: index.php");
	}
	else
	{
		header("Location: index_admin.php");
	}
	
} else {

 	echo "<script>";
         echo "alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'); location.href = 'index2.php' ";
     echo "</script>";
 }

?>
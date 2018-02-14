<?php 

include 'connect_book.php';

// $memberid = $_POST['memberid'];
// $bookborrow = $_POST['bookborrow'];

// $sql = "SELECT * FROM `bookborrow` WHERE memberid = '$memberid'";

$username = mysqli_real_escape_string($conn, $_POST['username_log']);
$userpassword = mysqli_real_escape_string($conn, $_POST['userpassword_log']);

if($_POST['acc']=="member"){

		$sql = "SELECT * FROM member WHERE username=? AND userpassword=?";
		$stmt = mysqli_prepare($conn, $sql);


		mysqli_stmt_bind_param($stmt, "ss", $username, $userpassword);
		mysqli_execute($stmt);


			$result_user = mysqli_stmt_get_result($stmt);

			if ($result_user->num_rows == 1) {
					// if ($bookborrow != 0) {
						session_start();
						$row_user = mysqli_fetch_array($result_user, MYSQLI_ASSOC);
						$_SESSION['memberid'] = $row_user['memberid'];
						header("Location: report_borrow_member.php");
					// } else {
						// echo "<script>";
			   //       		echo "alert(คุณยังไม่ได้ทำการคืนหนังสือ); location.href = '.php' ";
			   //   		echo "</script>";
					// }
			} else {
				echo "<script>";
			         echo "alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'); location.href = 'index1.php' ";
			     echo "</script>";
			}


} else {
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
			         echo "alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง'); location.href = 'index1.php' ";
			     echo "</script>";
			 }

}

//$result = mysqli_query($conn, $sql);
//while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {



?>
<?php 
session_start();
include ('connect_book.php');

$username = $_POST['username'];
$userpassword = md5($_POST['userpassword']);

if($username == ''){
	echo "Check Username";
} else if ($userpassword == '') {
	echo "Check Password";
} else {

	$sql ="SELECT * FROM `staff` WHERE username = '$username' AND userpassword = '$userpassword'";

	$num = mysqli_num_rows($sql);
	if ($num <= 0) {
		echo "<meta http-equiiv='refresh' content='1;URL=index2.php'>";
	} else {
		while ($user = mysqli_fetch_array($sql)) {
			if($user['status_staff'] == 1) {
				
				$_SESSION['ses_id']; = session_id();
				$_SESSION['username']; = $user['username'];
				$_SESSION['status_staff'] = 1;
				echo "<meta http-equiiv='refresh' content='1;URL=index.php'>";

			} else ($user['status_staff'] == 0) {				
				$_SESSION['ses_id']; = session_id();
				$_SESSION['username']; = $user['username'];
				$_SESSION['status_staff'] = 0;
				echo "<meta http-equiiv='refresh' content='1;URL=index_admin.php'>";

			} 

		}
	}


}



?>
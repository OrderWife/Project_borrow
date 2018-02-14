<?php
include 'connect_book.php';

$sql = "SELECT * FROM `staff`";
$result = mysqli_query($conn, $sql);

//$memberid = $_POST['memberid'];
//$staffid = $_POST['staffid'];
$titlenameid = $_POST['titlenameid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$username = $_POST['username'];
$userpassword = $_POST['userpassword'];


$sql = "INSERT INTO `staff`(`staffid`, `titlenameid`, `fname`, `lname`, `tel`, `email`, `username`, `userpassword`,`status_staff`) VALUES (NULL , '$titlenameid', '$fname', '$lname', '$tel', '$email', '$username', '$userpassword', 1)";
 


if ($conn->query($sql) === TRUE) {
    echo "<script>";
        echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'list_staff.php' ";
        echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
<?php
include 'connect_book.php';

$sql = "SELECT * FROM `student`
LEFT JOIN titlename 
ON student.titlenameid=titlename.titlenameid
LEFT JOIN major
ON student.majorid=major.majorid";
$result = mysqli_query($conn, $sql);


//$studentid = $_POST['studentid'];
$titlenameid = $_POST['titlenameid'];
$fname_stu = $_POST['fname_stu'];
$lname_stu = $_POST['lname_stu'];
$id_stu = $_POST['id_stu'];
$majorid = $_POST['majorid'];
$tel = $_POST['tel'];
$email = $_POST['email'];


$sql = "INSERT INTO `student`(`studentid`, `titlenameid`, `fname_stu`, `lname_stu`, `id_stu`, `majorid`, `tel`, `email`) VALUES (NULL,'$titlenameid','$fname_stu','$lname_stu','$id_stu','$majorid','$tel','$email')";
 


if ($conn->query($sql) === TRUE) {
    echo "<script>";
        echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'pj_student.php' ";
        echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
<?php
include 'connect_book.php';

$sql = "SELECT * FROM `advisor` 
LEFT JOIN titlename 
ON advisor.titlenameid=titlename.titlenameid 
LEFT JOIN major 
ON advisor.majorid=major.majorid";
$result = mysqli_query($conn, $sql);


//$advisorid = $_POST['advisorid'];
$titlenameid = $_POST['titlenameid'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$majorid = $_POST['majorid'];
$tel = $_POST['tel'];
$email = $_POST['email'];


$sql = "INSERT INTO `advisor` (`advisorid`, `titlenameid`, `fname`, `lname`, `majorid`, `tel`, `email`) VALUES (NULL, '$titlenameid', '$fname', '$lname', '$majorid', '$tel', '$email')";
 

if ($conn->query($sql) === TRUE) {
    echo "<script>";
        echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'pj_advisor_admin.php' ";
    echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
<?php
include 'connect_book.php';

$sql = "SELECT * FROM `condition`";
$result = mysqli_query($conn, $sql);

//$advisorid = $_POST['advisorid'];
$book_number = $_POST['book_number'];
$date_number = $_POST['date_number'];


$sql = "UPDATE `condition` SET `book_number` = '$book_number' , `date_number` = '$date_number'";
 

if ($conn->query($sql) === TRUE) {
    echo "<script>";
        echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'condition.php' ";
        echo "</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
<?php
session_start();
include 'connect_book.php';
$bookid = $_GET['bookid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ระบบการยืม-คืนเล่มโครงงานการศึกษาเอกเทศ</title>
    <?php include('css.php'); ?>
    <?php // include('datatable.php'); ?>
<style type="text/css">

    body{
        padding-left: 30px;
        padding-right: 30px;
        padding-bottom: 15px;
    }
</style>
<style type="text/css" media="print">
#printPreview{
    display:none;
}
</style>
<style> 
@font-face {
    font-family: txt;
    src: url(../THSarabun.ttf);
}
@font-face {
    font-family: txtl;
    src: url(font/b/v.ttf);
}
body {
    font-family: txt;
}
td{
    padding: 7px;
}
</style>

</head>
<center><button  id="printPreview" onclick="myFunction()" style="margin-top: 10px;font-size: 20px;">พิมพ์</button></center>

<body>
<div class="container" style="background-color: #fff; width: 1024px; min-height: 650px;" >
</br>
</br>
   <B style="font-size: 29px;"><center>รายชื่อเล่มโครงงาน</center></B>

        <?php

include 'connect_book.php';

$sql = "SELECT * FROM `book` 

INNER JOIN advisor ON book.advisorid=advisor.advisorid
INNER JOIN booktype ON book.booktypeid=booktype.booktypeid 
WHERE book.bookid='$bookid'";

$result = mysqli_query($conn ,$sql);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {

    ?> 

    <br><label style="font-size: 29px">เลขที่เล่มโครงงาน : <?php echo $row['bookid']; ?></label><br>

    <label style="font-size: 29px">ชื่อโครงงาน(ภาษาไทย) :  <?php echo $row['booknamethai']; ?></label><br>

    <label style="font-size: 29px">ชื่อโครงงาน(ภาษาอังกฤษ) : <?php echo $row['booknameeng']; ?></label><br>

    <label style="font-size: 29px">คำสำคัญ : <?php echo $row['keyword']; ?></label><br>

    <label style="font-size: 29px">ชื่อนักศึกษา : <?php echo $row['student']; ?></label>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <label style="font-size: 29px">อาจารย์ที่ปรึกษา : <?php echo $row['fname']; ?> <?php echo $row['lname']; ?></label>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <label style="font-size: 29px">ปีการศึกษา : <?php echo $row['year']+543; ?></label>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <label style="font-size: 29px">ประเภทเล่มโครงงาน : <?php echo $row['booktype']; ?></label><br>
    

    <?php  } ?>



                            


</div>
    <script>
function myFunction() {
    window.print();
}
</script>

    <?php include ('script.php'); ?>

</body>

</html>
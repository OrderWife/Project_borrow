<?php
session_start();
include 'connect_book.php';


$sql = "SELECT * FROM `bookborrow`
LEFT JOIN book ON bookborrow.bookid=book.bookid
LEFT JOIN member ON bookborrow.memberid=member.memberid ORDER BY borrowid DESC";
$result = mysqli_query($conn, $sql);

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
   <B style="font-size: 29px;"><center>รายการอาจารย์ที่ปรึกษา</center></B>
                            <table border="1">
                                
                                    <tr>
            
                                        <th  width="15%"><center style="margin-top: 20px;font-size: 29px;">คำนำหน้าชื่อ</center></th>
                                        <th ><center style="margin-top: 20px;font-size: 29px;">ชื่อ-นามสกุล</center></th>
                                        <th ><center style="margin-top: 20px;font-size: 29px;">สาขาวิชา</center></th>
                                        <th ><center style="margin-top: 20px;font-size: 29px;">เบอร์โทรศัพท์</center></th>
                                        <th ><center style="margin-top: 20px;font-size: 29px;">อีเมล์</center></th>

                                    </tr>
                                                                          

        <?php

include 'connect_book.php';

$sql = "SELECT * FROM `advisor` 
LEFT JOIN titlename 
ON advisor.titlenameid=titlename.titlenameid 
LEFT JOIN major 
ON advisor.majorid=major.majorid";
$result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
        <tr>
            
            <td style="font-size: 29px;"><?php echo $row['titlename']; ?></td>
            <td style="font-size: 29px;"><?php echo $row['fname']; ?>  <?php echo $row['lname']; ?></td>
            <td style="font-size: 29px;"><?php echo $row['major']; ?></td>
            <td style="font-size: 29px;"><?php echo $row['tel']; ?></td>
            <td style="font-size: 29px;"><?php echo $row['email']; ?></td>

        </tr>

        <?php  
    }

        mysqli_free_result($result) ;
        mysqli_close($conn);

          ?>

                            </tbody>
                            </table>
                            

    
</div>
    <script>
function myFunction() {
    window.print();
}
</script>

    <?php include ('script.php'); ?>

</body>

</html>
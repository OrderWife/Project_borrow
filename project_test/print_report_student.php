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
   <B style="font-size: 29px;"><center>รายการนักศึกษา</center></B>
                            <table border="1">
                                
                                    <tr>
            
                                        <th width="15%"><center style="margin-top: 20px;font-size: 29px;"">คำนำหน้าชื่อ</center></th>
                                        <th><center style="margin-top: 20px;font-size: 29px;"">ชื่อ-นามสกุล</center></th>
                                        <th><center style="margin-top: 20px;font-size: 29px;"">รหัสนักศึกษา</center></th>
                                        <th><center style="margin-top: 20px;font-size: 29px;"">สาขาวิชา</center> </th>
                                        <th><center style="margin-top: 20px;font-size: 29px;"">เบอร์โทรศัพท์</center> </th>
                                        <th><center style="margin-top: 20px;font-size: 29px;"">อีเมล์</center> </th>
                                        <!-- <th class="text">แก้ไข </th -->
                                    </tr>
                                                                          

        <?php

include 'connect_book.php';

$sql = "SELECT * FROM `student`
LEFT JOIN titlename 
ON student.titlenameid=titlename.titlenameid
LEFT JOIN major
ON student.majorid=major.majorid";
$result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
        <tr>
            
            <td valign="top" style="font-size: 29px;"><?php echo $row['titlename']; ?></td>
            <td valign="top" style="font-size: 29px;"><?php echo $row['fname_stu']; ?>  <?php echo $row['lname_stu']; ?></td>
            <td valign="top" style="font-size: 29px;"><?php echo $row['id_stu']; ?></td>
            <!-- <td valign="top" style="font-size: 29px;"><?php // echo $row['id_stu']; ?></td> -->
            <td valign="top" style="font-size: 29px;"><?php echo $row['major']; ?></td>
            <td valign="top" style="font-size: 29px;"><?php echo $row['tel']; ?></td>
            <td valign="top" style="font-size: 29px;"><?php echo $row['email']; ?></td>
            <!-- <td> 
            <center><button class="btn btn-info" style="background-color: #33CC33">
                <a href="edit_student.php?id= <?php // echo $row['studentid']; ?>">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
                </button>
            </center>
            </td> -->
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
<?php
session_start();
include 'connect_book.php';
$advisorid = $_GET['advisorid'];
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
   <B style="font-size: 29px;"><center>รายการเล่มโครงงาน</center></B><br>
                   
<br>

        <?php

include 'connect_book.php';

$sql = "SELECT * FROM `advisor`
INNER JOIN titlename ON advisor.titlenameid=titlename.titlenameid
INNER JOIN major ON advisor.majorid=major.majorid
where advisor.advisorid=$advisorid ";

$result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>

    <!-- <br><label>รหัสสมาชิก :</label> <?php // echo $row['advisorid']; ?> -->


    <br><label style="font-size: 29px">ชื่อ-นามสกุล : <?php echo $row['fname']; ?> <?php echo $row['lname']; ?></label>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

    <label style="font-size: 29px;">สาขาวิชา : <?php echo $row['major']; ?></label>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

    <label style="font-size: 29px;">เบอร์โทรศัพท์ : <?php echo $row['tel']; ?></label>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

    <label style="font-size: 29px;">อีเมล์ : <?php echo $row['email']; ?></label><br><br>


        <?php  
    }

        mysqli_free_result($result) ;
        mysqli_close($conn);

          ?>


                            <table border="1" align="center"   >
                                    <tr class="header">           
                                        <th style="width:200px;padding-right: 10px;padding-left: 10px;height: 30px;font-size: 29px;""><center>นักศึกษา</center> </th>
                                        <th style="px;padding-right: 10px;padding-left: 10px;height: 30px;font-size: 29px;""><center>เล่มโครงงาน</center> </th>
                                        <th style="width:135px; padding-right: 10px;padding-left: 10px;height: 30px;font-size: 29px;""><center>ปีพ.ศ.</center> </th>
                                                                                     
                                    </tr>
                            
                            <?php

include 'connect_book.php';

$sql = "SELECT * FROM `book`
WHERE advisorid='$advisorid'";

$result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>

        <tr>

            <td style="font-size: 29px;"><?php echo $row['student']; ?></td>

            <td style="font-size: 29px;"><?php echo $row['booknamethai']; ?></td> 

            <td style="font-size: 29px;"><?php echo $row['year']; ?></td>      

        </tr>

        <?php  } ?> 
         

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
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
   <B style="font-size: 29px;"><center>รายการการยืม-คืนเล่มโครงงาน</center></B>
                            <table border="1">
                                
                                            <tr>
            
                                                <th width="25%" ><center style="margin-top: 20px;font-size: 29px; ">ผู้ยืม</center></th>
                                                <th><center style="margin-top: 20px;font-size: 29px;">เล่มโครงงาน</center> </th>
                                                
                                                <th width="15%" ><center style="margin-top: 20px;font-size: 29px;">วันที่ยืม</center> </th>
                                                <th width="15%" ><center style="margin-top: 20px;font-size: 29px;">กำหนดส่งคืน</center> </th>
                                                <th width="10%" ><center style="margin-top: 20px;font-size: 29px;">สถานะ</center> </th>
                                                <!-- <th style="width: 30%" class="center">รายละเอียด </th> -->
                                                <!--<th class="center">แก้ไข</th>-->
                                                
                                            </tr>
                                                                          

        <?php

        $today  = date('Y-m-d');


        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
        <tr>

            <?php 
                $theBorrow = date("d-m-",strtotime($row['borrowdate'])).date(date("Y",strtotime($row['borrowdate']))+543);
                $theReturn = date("d-m-",strtotime($row['returndate'])).date(date("Y",strtotime($row['returndate']))+543);
            ?>
            
            <td valign="top" style="font-size: 29px;"><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>
            <td valign="top" style="font-size: 29px;"><?php echo $row['booknamethai']; ?></td>
            
            <td valign="top" style="font-size: 29px;"><?php echo $theBorrow ?></td>
            <td valign="top" style="font-size: 29px;"><?php echo $theReturn ?></td>
            <!-- <td><?php // echo $row['statusbook']; ?></td> -->
            <td valign="top" style="font-size: 29px;"> 
                <center> 
                <?php if($today >= $row['returndate']&&$row["statusbook"]=='0') { ?>
                <a style="color: red">เลยกำหนดส่ง</a>
                <?php } ?>
                
                <?php if($today < $row['returndate']&&$row["statusbook"]=='0') { ?>
                <a style="color: orange">ค้างส่ง</a>     
                <?php } ?>

                <?php if($row["statusbook"]=='1') { ?>
                <a style="color: green">คืนแล้ว</a>     
                <?php } ?>

                <?php if($row["statusbook"]=='2') { ?>
                <a style="color: orange">รอการอนุมัติ</a>     
                <?php } ?>                
                </center>       
            </td>
            
        </tr>

        <?php  
    }

        mysqli_free_result($result) ;
        //mysqli_close($conn);

          ?>

                            </tbody>
                            </table>
                            
                        <!-- </div> -->
                        <!-- /.panel-body -->
                    <!-- </div> -->
                    <!-- /.panel -->
                <!-- </div> -->
                <!-- /.col-lg-12 -->
            <!-- </div> -->
            <!-- /.row -->
            

    <!-- </div> -->
    <!-- /#wrapper -->
    
</div>
    <script>
function myFunction() {
    window.print();
}
</script>

    <?php include ('script.php'); ?>

</body>

</html>
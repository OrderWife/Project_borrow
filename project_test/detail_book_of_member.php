<?php
session_start();
include 'connect_book.php';
$bookid = $_GET['bookid'];
$sql = "SELECT * FROM `book`
WHERE bookid = '$bookid'";
$result = mysqli_query($conn ,$sql);
    
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
    <?php include('css_member.php'); ?>
    <?php include('datatable_member.php'); ?>


</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <!-- /.navbar-header -->

           <?php include ('menu_member.php');?>

        <div id="page-wrapper" style="background-image: url('test-img.png');">
            <div class="row"><br>
                <!-- <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div> -->
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="height: 42px;background-color: #d7efd3">
                            <h4 style="margin-top: 0px;">รายละเอียดเล่มโครงงาน</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="padding-top: 1px;">
                        
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <?php

include 'connect_book.php';

$sql = "SELECT * FROM `book` 
INNER JOIN advisor ON book.advisorid=advisor.advisorid
INNER JOIN booktype ON book.booktypeid=booktype.booktypeid 
WHERE bookid='$bookid'";

$result = mysqli_query($conn ,$sql);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {

    ?> 

    <br><label >เลขที่เล่มโครงงาน :</label> <?php echo $row['bookid']; ?><br>

    <label>ชื่อโครงงาน(ภาษาไทย) : </label> <?php echo $row['booknamethai']; ?><br>

    <label>ชื่อโครงงาน(ภาษาอังกฤษ) :</label> <?php echo $row['booknameeng']; ?><br>

    <label>คำสำคัญ :</label> <?php echo $row['keyword']; ?><br>

    <label>ชื่อนักศึกษา :</label> <?php echo $row['student']; ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <label>อาจารย์ที่ปรึกษา :</label> <?php echo $row['fname']; ?> <?php echo $row['lname']; ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <label>ปีการศึกษา :</label> <?php echo $row['year']+543; ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <label>ประเภทเล่มโครงงาน :</label> <?php echo $row['booktype']; ?><br>
    
    <label>ไฟล์ : </label> &nbsp<a href="bookfilename/<?=$row["bookfilename"];?>"><?=$row["bookfilename"];?></a><br>
    
    <label>บทคัดย่อ :</label><p style="margin: 3px" width="50%"> <?php echo $row['abstracts']; ?></p><br>    

    <?php  } ?>
    
                            </table>

                        <h4 >รายการการยืม-คืนเล่มโครงงาน </h4>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr class="header">           
                                        <th style="padding-right: 10px;padding-left: 10px;height: 30px;"><center>ชื่อผู้ยืม</center> </th>
                                        <th style="padding-right: 10px;padding-left: 10px;height: 30px;"><center>วันที่ยืม</center> </th>
                                        <th style="padding-right: 10px;padding-left: 10px;height: 30px;"><center>กำหนดส่งคืน</center> </th>
                                        <th style="padding-right: 10px;padding-left: 10px;height: 30px;"><center>สถานะ</center></th>
                                                                                     
                                    </tr>
                                </thead>

                        <tbody>
                            
                            <?php

include 'connect_book.php';

$sql = "SELECT * FROM `bookborrow`
INNER JOIN member ON bookborrow.memberid=member.memberid 
WHERE bookid=$bookid ORDER BY borrowid DESC ";

$result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>

        <tr>

            <?php 
                $theBorrow = date("d-m-",strtotime($row['borrowdate'])).date(date("Y",strtotime($row['borrowdate']))+543);
                $theReturn = date("d-m-",strtotime($row['returndate'])).date(date("Y",strtotime($row['returndate']))+543);
            ?>

            <td><?php echo $row['fname']; ?>&nbsp&nbsp&nbsp<?php echo $row['lname']; ?></td>

            <td align="center"><?php echo $theBorrow ?></td>

            <td align="center"><?php echo $theReturn ?></td>

            <td align="center">
                <?php 
                  $sql3 = "SELECT * FROM `bookborrow` WHERE bookid = $bookid ";
                  $result3 = mysqli_query($conn, $sql3);
                  $today  = date('Y-m-d');
                  while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
                ?>

                    <?php if($today >= $row['returndate']&&$row["statusbook"]=='0') { ?>
                    <a style="color: red">เลยกำหนดส่ง</a>
                    <?php } ?>
                    
                    <?php if($today < $row['returndate']&&$row["statusbook"]=='0') { ?>
                    <a style="color: orange">ค้างส่ง</a>     
                    <?php } ?>

                    <?php if($row["statusbook"]=='1') { ?>
                    <a style="color: green">คืนแล้ว</a>     
                    <?php } ?>

                    <!-- <?php // if($row3["statusbook"]=='0') { ?>
                    <a style="color: red">ค้างส่ง</a>
                    <?php } ?>
                    
                    <?php // if($row3["statusbook"]=='1') { ?>
                    <a style="color: green">สามารถยืมได้</a>      
                    <?php //} ?> -->

            </td>

            <!-- <td align="center"> -->
            <?php
                // include 'connect_book.php';
                
                // $bookid = $row['bookid'];
                // $sql2 = "SELECT * FROM `bookborrow` WHERE bookid='$bookid'";
                // $result2 = mysqli_query($conn, $sql2);
                // $rowcount2=mysqli_num_rows($result2);
            ?>
            <?php // echo $row['num']; ?>
            <!-- </td> -->           

        </tr>

        <?php  //}
        ?> 

         <?php   }
        mysqli_free_result($result) ;
        //mysqli_close($conn);
         ?>
                        </tbody>
                        </table>


                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            </div>
        </div>
    </div>
    <!-- /#wrapper -->


    <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog ">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
        </div>
        

    <?php include ('script_member.php'); ?>

</body>

</html>
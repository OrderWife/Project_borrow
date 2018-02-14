<?php
session_start();
include 'connect_book.php';
$bookid = $_GET['bookid'];
$sql = "SELECT * FROM `book` WHERE bookid = '$bookid'";
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
    <?php include('css.php'); ?>
    <?php include('datatable.php'); ?>


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

           <?php include ('menu.php');?>

        <div id="page-wrapper">
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
                        <div class="panel-heading">
                            รายการเล่มโครงงาน
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <?php

include 'connect_book.php';

$sql = "SELECT * FROM `book` 

INNER JOIN advisor ON book.advisorid=advisor.advisorid
INNER JOIN booktype ON book.booktypeid=booktype.booktypeid WHERE bookid='$bookid'";

$result = mysqli_query($conn ,$sql);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
    
    ?> 

    <br><label>เลขที่เล่มโครงงาน :</label> <?php echo $row['bookid']; ?><br><br>

    <label>ชื่อโครงงาน(ภาษาไทย) : </label> <?php echo $row['booknamethai']; ?><br><br>

    <label>ชื่อโครงงาน(ภาษาอังกฤษ) :</label> <?php echo $row['booknameeng']; ?><br><br>

    <label>คำสำคัญ :</label> <?php echo $row['keyword']; ?><br><br>

    <label>ชื่อนักศึกษา :</label> <?php echo $row['student']; ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <label>อาจารย์ที่ปรึกษา :</label> <?php echo $row['fname']; ?> <?php echo $row['lname']; ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <label>ปีการศึกษา :</label> <?php echo $row['year']; ?><br><br>

    <label>ประเภทเล่มโครงงาน :</label> <?php echo $row['booktype']; ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <br><br>

    <label>บทคัดย่อ :</label><p style="margin: 3px" width="50%"> <?php echo $row['abstracts']; ?></p><br>
    <label>ไฟล์ : </label> &nbsp<a href="bookfilename/<?=$row["bookfilename"];?>"><?=$row["bookfilename"];?></a><br>
    <br>


    <?php  }?>
    
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
    <!-- /#wrapper -->

    <?php include ('script.php'); ?>

</body>

</html>
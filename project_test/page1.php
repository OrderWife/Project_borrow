<?php
        session_start();

        if ( !isset($_SESSION['memberid']) ) {
            header("Location:index1.php");
        }

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
                    <span class="sr-only">อยู่ตรงไหนหว่า</span>
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
                            <h4 style="margin-top: 0px;">เล่มโครงงานที่มีการยืมมากที่สุด</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                              <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr class="header">
            
                                        <th hidden "><center>เลขที่เล่มโครงงาน</center> </th>
                                        <th width="45%"><center>ชื่อโครงงาน</center> </th>
                                        <th width="20%"><center>ผู้จัดทำ</center> </th>
                                        <th width="15%"><center>จำนวนที่ยืม(ครั้ง)</center></th>
                                        <th width="13%"><center>สถานะ</center> </th>
                                        <th style="padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 0px;width: 70px;">
                                        <center style="height: 27px;">รายละเอียด</center> </th>           
                                    </tr>
                                </thead>

                        <tbody>
                            
                            <?php

include 'connect_book.php';

$sql = "SELECT * FROM `book`
INNER JOIN advisor ON book.advisorid=advisor.advisorid
INNER JOIN booktype ON book.booktypeid=booktype.booktypeid ORDER BY  `book`.`bookid`,num DESC";

$result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>

        <tr>
            <td hidden><?php // echo $sql1; ?><?php  echo $row['bookid']; ?></td>

            <td>
            <?php echo $row['booknamethai']; ?>
            <input type="hidden" name=""
             value="<?php  echo $row['bookid']; ?>.
             <?php  echo $row['bookid']; ?>.
             <?php  echo $row['student']; ?>.
             <?php  echo $row['fname']; ?>.
             <?php  echo $row['lname']; ?>.
             <?php  echo $row['booktype']; ?>.
             <?php  echo $row['statusbook']; ?>">
            </td>

            <td ><?php  echo $row['student']; ?> </td>

            <td align="center">
            <?php
                include 'connect_book.php';
                
                $bookid = $row['bookid'];
                $sql2 = "SELECT * FROM `bookborrow` WHERE bookid = $bookid  ";
                $result2 = mysqli_query($conn, $sql2);
                $rowcount2=mysqli_num_rows($result2);
            ?>
            <?php  echo $row['num']; ?>
            </td>

            <td align="center">
                <?php 
                  $sql3 = "SELECT * FROM `bookborrow` WHERE bookid = $bookid  ";
                  $result3 = mysqli_query($conn, $sql3);
                  $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
                ?> 

                    <?php if($row3['statusbook']=='0') { ?>
                    <a style="color: red">ค้างส่ง</a>
                    <?php } ?>
                    
                    <?php if($row3['statusbook']=='' || $row3['statusbook']=='1') { ?>
                    <a style="color: green">ยืมได้</a>      
                    <?php } ?>
            </td>         

            <td>
                <center>
                    <!-- <button class="btn btn-info" style="background-color: #FFFF00"> -->
                    <a href="detail_book_of_member.php?bookid=<?php echo $row['bookid']; ?>">
                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                    </a>
                    <!-- </button> -->
                </center>
            </td>            
        </tr>

        <?php } ?> 
        </table> 
         </form>
                        </tbody>
                            <!-- </table> -->
                            </div>
                    </div>
                </div>
            </div>



            
        </div> <!-- end -->

    <?php include ('script_member.php'); ?>

</body>

</html>
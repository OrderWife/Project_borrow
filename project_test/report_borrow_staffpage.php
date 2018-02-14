<?php
session_start();
include 'connect_book.php';
$memberid = $_GET['memberid'];
$sql = "SELECT * FROM `member` WHERE memberid = '$memberid'";
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
    <?php include('datatable.php'); ?>

    <style type="text/css">
   #dataTables-example_filter {
    display: none;
   }
   #dataTables-example_length{
    display: none;
   }
    </style>


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
                            <h4 style="margin-top: 0px;">รายการการยืมโครงงาน</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="padding-top: 1px;">
<br>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                            <tr>
            
                                                <th style="width: 55px;padding-right: 1px;padding-left: 1px;"><center>ลำดับที่</center> </th>
                                                <th><center>เล่มโครงงาน</center> </th>
                                                <!-- <th width="15%" ><center>วันที่ยืม</center> </th> -->
                                                <!-- <th width="15%" ><center>กำหนดส่งคืน</center> </th> -->
                                                <!-- <th width="10%" ><center>สถานะ</center> </th> -->
                                                <!-- <th style="width: 30%" class="center">รายละเอียด </th> -->
                                                <!--<th class="center">แก้ไข</th>-->
                                                
                                            </tr>
                                </thead>
                                <tbody>                    

        <?php

include 'connect_book.php';

        //$session_login_id = $_SESSION['memberid'];
    $borrowerid = $_GET['borrowerid'];

        $qry_user = "SELECT * FROM `bookborrow` 
            
        LEFT JOIN book ON bookborrow.bookid = book.bookid WHERE borrowerid ='$borrowerid'";
        $result_user = mysqli_query($conn,$qry_user);
        $i = 1;

        while($row = mysqli_fetch_array($result_user, MYSQLI_ASSOC))  {
        ?>
        <tr>
            <?php 
                // $theBorrow = date("d-m-",strtotime($row['borrowdate'])).date(date("Y",strtotime($row['borrowdate']))+543);
                // $theReturn = date("d-m-",strtotime($row['returndate'])).date(date("Y",strtotime($row['returndate']))+543);
            ?>
            <td align="center"><?=$i;?></td>
            <td><?php echo $row['booknamethai']; ?></td>
            <!-- <td><?php // echo $row['borrowdate']; ?></td> -->
            <!-- <td><?php // echo $row['returndate'];; ?></td> -->
            <!-- <td><?php // echo $row['statusbook']; ?></td> -->
            <!-- <td> 
                <center> 
                
                <?php //if($row["statusbook"]=='2') {?>
                <a style="color: orange">รอการอนุมัติ</a>                     
                <?php // } ?>


                </center>       
            </td> -->
        </tr>

        <?php  $i++; } 
        //mysqli_free_result($result) ;
        //mysqli_close($conn);
        ?>

                            </tbody>
                            </table>
</div>
</div>
</div>
</div>



                            
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
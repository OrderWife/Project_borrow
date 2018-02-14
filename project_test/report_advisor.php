<?php 
session_start();
include 'connect_book.php';

$sql = "SELECT * FROM `advisor`";
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
                            <h4 style="margin-top: 0px;">รายการอาจารย์ที่ปรึกษา</h4>
                            <a href="print_report_advisor.php">
                            <button class="btn btn-primary"  id="printPreview2" onclick="myFunction()" style="margin-left: 95%;margin-top: -60px">
                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                            </button>
                            </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
                            <table width="100%" class="table table-striped" id="dataTables-example">
                                <thead>
                                    <tr>
            
							            <!-- <th style="width: 15%"><center>คำนำหน้าชื่อ</center></th> -->
                                        <th style="width: 55px;padding-right: 1px;padding-left: 1px;"><center>ลำดับ</center></th>
							            <th>ชื่อ-นามสกุล</th>
							            <th style="width: 30%">สาขาวิชา</th>
							            <!-- <th ><center style="margin-top: 20px;">เบอร์โทรศัพท์</center></th>
							            <th ><center style="margin-top: 20px;">อีเมล์</center></th> -->
                                        <!-- <th style="width: 84px;padding-top: 0px;padding-bottom: 8px;padding-right: 0px;padding-left: 0px;"><center>รายละเอียด</center></th> -->

							        </tr>
                                </thead>
                                <tbody>                    

        <?php

include 'connect_book.php';

$sql = "SELECT * FROM `advisor` 
LEFT JOIN titlename 
ON advisor.titlenameid=titlename.titlenameid 
LEFT JOIN major 
ON advisor.majorid=major.majorid ORDER BY advisorid DESC";
$result = mysqli_query($conn, $sql);
$i = 1 ;

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
        <tr>
            
            <td align="center"><?=$i;?></td>
            <td><a href="detail_advisor.php?advisorid=<?php echo $row['advisorid']?>"> <?php echo $row['titlename']; ?> <?php echo $row['fname']; ?>  <?php echo $row['lname']; ?></td>
            <td><?php echo $row['major']; ?></td>
            <!-- <td><?php // echo $row['tel']; ?></td>
            <td><?php // echo $row['email']; ?></td> -->
            <!-- <td>
                <center>
                    <a href="detail_advisor.php?advisorid=<?php echo $row['advisorid']?>">
                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                    </a>
                </center>
            </td> -->
            <!-- <td>
            <center><button class="btn btn-info" style="background-color: #33CC33">
                <a href="edit_advisor.php?id= <?php // echo $row['advisorid']; ?>">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a></button>
            </center> 
            </td> -->

        </tr>

        <?php  
        $i++; }  
        mysqli_free_result($result) ;
        mysqli_close($conn);
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
    <!-- /#wrapper -->

    <?php include ('script.php'); ?>

</body>

</html>
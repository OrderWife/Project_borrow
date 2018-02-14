<?php 
session_start();
include 'connect_book.php';

$sql = "SELECT * FROM `student`";
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
                        <div class="panel-heading" style="height: 60px;background-color: #d7efd3">
                            <h4>รายการนักศึกษา</h4>
                            <a href="print_report_student.php">
                            <button class="btn btn-primary"  id="printPreview2" onclick="myFunction()" style="margin-left: 950px;margin-top: -60px">
                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                            </button>
                            </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
            
							            <th width="15%"><center style="margin-top: 20px;">คำนำหน้าชื่อ</center></th>
							            <th><center style="margin-top: 20px;">ชื่อ-นามสกุล</center></th>
							            <th><center style="margin-top: 20px;">รหัสนักศึกษา</center></th>
							            <th><center style="margin-top: 20px;">สาขาวิชา</center> </th>
							            <th><center style="margin-top: 20px;">เบอร์โทรศัพท์</center> </th>
							            <th><center style="margin-top: 20px;">อีเมล์</center> </th>
							            <!-- <th class="text">แก้ไข </th -->
							        </tr>
                                </thead>
                                <tbody>                    

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
            
            <td><?php echo $row['titlename']; ?></td>
            <td><?php echo $row['fname_stu']; ?>  <?php echo $row['lname_stu']; ?></td>
            <td><?php echo $row['id_stu']; ?></td>
            <td><?php echo $row['major']; ?></td>
            <td><?php echo $row['tel']; ?></td>
            <td><?php echo $row['email']; ?></td>
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
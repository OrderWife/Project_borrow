<?php
session_start();
include 'connect_book.php';


// $sql = "SELECT * FROM `book`";
// $result = mysqli_query($conn, $sql);

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
                            <h4 style="margin-top: 0px;">รายการเล่มโครงงาน</h4>
                            <a href="print_report_book.php">
                            <button class="btn btn-primary"  id="printPreview2" onclick="myFunction()" style="margin-left: 950px;margin-top: -60px">
                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                            </button>
                            </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
                            <table width="100%" class="table table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
            
							            <th>เล่มโครงงาน </th>
                                        <th width="20%">ผู้จัดทำ </th>
                                        <th width="20%">อาจารย์ที่ปรึกษา </th>
                                        <!-- <th width="10%"><center>ปีพ.ศ.</center> </th> -->
							            <!-- <th style="width: 84px;padding-top: 0px;padding-bottom: 8px;padding-right: 0px;padding-left: 0px;"><center>รายละเอียด</center> </th> -->
							        </tr>
                                </thead>
                                <tbody>                    

        <?php
        include 'connect_book.php';

        $sql = "SELECT * FROM `book`
        LEFT JOIN student ON book.studentid=student.studentid 
        LEFT JOIN advisor ON book.advisorid=advisor.advisorid
        ORDER BY bookid DESC";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
        <tr>
            
            <td><a href="detail_book.php?bookid=<?php echo $row['bookid']; ?>"><?php echo $row['booknamethai']; ?></td>

            <td><?php echo $row['student']; ?> <?php echo $row['lname_stu']; ?></td>

            <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td>

            <!-- <td><?php echo $row['year']+543; ?></td> -->
            
            <!-- <td>
                <center>
                    <a href="detail_book.php?bookid=<?php echo $row['bookid']; ?>">
                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                    </a>
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
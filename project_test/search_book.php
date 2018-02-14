<?php 

include 'connect_book.php';
session_start();
$search_book = @$_POST['search_book'];


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

        <div id="page-wrapper"><br>
            <!-- <div class="row"> -->
                <!-- <div class="col-lg-12">
                    <h1 class="page-header">Tables</h1>
                </div> -->
                <!-- /.col-lg-12 -->
            <!-- </div> -->

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
                                <thead>
                                    <tr class="header">
            
							            <th class="center" width="17%">เลขที่เล่มโครงงาน </th>
							            <th class="center" width="45%">ชื่อโครงงาน </th>
							            <th class="center" width="11%">รายละเอียด </th>
							            <th class="center" width="15%">ยืมเล่มโครงงาน </th>
							            <th class="center" width="11%" hidden>นักศึกษา </th>
							            <th class="center" width="11%" hidden>อาจารย์ที่ปรึกษา </th>            
						        	</tr>
                                </thead>
                                <tbody>                    

        <?php

include 'connect_book.php';

$sql = "SELECT * FROM `book`
INNER JOIN bookstatus ON book.bookstatusid=bookstatus.bookstatusid

INNER JOIN advisor ON book.advisorid=advisor.advisorid  ORDER BY `book`.`bookid` DESC";

$result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {

            $bookid=$row['bookid'];
            $sql1 = "SELECT * FROM `bookborrow` where bookid = $bookid  and statusbook = 0";
            $result1 = mysqli_query($conn, $sql1);
            $rowcount=mysqli_num_rows($result1);
        ?>
        <?php if($rowcount==0) { ?>

        <tr>
            <td><?php // echo $sql1; ?><?php  echo $row['bookid']; ?></td>
            <td><?php echo $row['booknamethai']; ?><input type="hidden" name="" value="<?php  echo $row['bookid']; ?>"></td>
            <td>
                <center><button class="btn btn-info" style="background-color: #FFFF00">
                    <a href="detail_search_book.php?bookid=<?php echo $row["bookid"]?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true" ></span>
                    </a></button>
                </center>
            </td>
            <td>
                <center><button class="btn btn-info" style="background-color: #33CC33">
                    <a href="pj_borrow.php?bookid=<?php echo $row["bookid"]?>"><span class="fa fa-book fa-lg" aria-hidden="true"></span>
                    </a></button>
                </center>
            </td>
            <td hidden><?php  echo $row['student']; ?></td>
            <td hidden><?php  echo $row['fname']; ?></td>
        </tr>

        <?php } } ?>


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
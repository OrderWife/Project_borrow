<?php
session_start();
include 'connect_book.php';

$sql = "SELECT * FROM `borrower`
LEFT JOIN bookborrow ON bookborrow.borrowid = borrower.borrowerid 
LEFT JOIN member ON borrower.memberid = member.memberid ORDER BY status_member ASC";
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
   /*#dataTables-example_filter { display: none; }*/
   #dataTables-example_length { display: none; }
   #dataTables-example_info { display: none; }
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
                            รายการยืมเล่มโครงงาน
                            <a href="print_report_borrow.php">
                            <button class="btn btn-primary btn-xs"  id="printPreview2" onclick="myFunction()" style="float: right;">
                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                            </button>
                            </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                <thead>
                                            <tr>
            
                                                <th style=""><center>ผู้ยืม</center></th>
                                                <!-- <th><center>เล่มโครงงาน</center> </th> -->
                                                <th style="width: 15%"><center>วันที่ยืม</center> </th>
                                                <th style="width: 15%"><center>กำหนดส่งคืน</center> </th>
                                                <th style="width: 15%"><center>สถานะ</center> </th>
                                                <!-- <th style="width: 30%" class="center">รายละเอียด </th> -->
                                                <!--<th class="center">แก้ไข</th>-->
                                                
                                            </tr>
                                </thead>
                                <tbody>                    

        <?php

        $today  = date('Y-m-d');


        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
        <tr>

            <?php 
                $theBorrow = date("d-m-",strtotime($row['borrowdate'])).date(date("Y",strtotime($row['borrowdate']))+543);
                $theReturn = date("d-m-",strtotime($row['returndate'])).date(date("Y",strtotime($row['returndate']))+543);
            ?>
            
            <!-- <td><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></td> -->
            <td><a href="report_borrow_staffpage.php?borrowerid=<?php  echo $row["borrowerid"] ?>&&memberid=<?php  echo $row["memberid"] ?>"><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></a></td>
            <!-- <td><?php // echo $row['booknamethai']; ?></td> -->
            
            <td><?php echo $theBorrow ?></td>
            <td><?php echo $theReturn ?></td>
            <!-- <td><?php // echo $row['statusbook']; ?></td> -->
            <td align="center"> 
                <?php if($today >= $row['returndate']&&$row["status_member"]!='3') { ?>
                <a style="color: red">เลยกำหนดส่ง</a>
                <?php } ?>
                
                <?php if($today < $row['returndate']&&$row["status_member"]=='1') { ?>
                <a style="color: orange">ค้างส่ง</a>     
                <?php } ?>

                <?php if($row["status_member"]=='3') { ?>
                <a style="color: green">คืนแล้ว</a>     
                <?php } ?>

                <?php if($row["status_member"]=='0') { ?>
                <a style="color: blue">รอการอนุมัติ</a>     
                <?php } ?>           
            <!-- </td> 
                <center><button class="btn btn-info" style="background-color: #33CC33">
                <a href="edit_borrow.php?id= <?php // echo $row['bookborrowid']; ?>">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
                </button>    
                </center>       
            </td> -->
            
        </tr>

        <?php  }
        //mysqli_free_result($result) ;
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
    <!-- /#wrapper -->

    <?php include ('script.php'); ?>

    <script>
      $(document).ready(function() {
          $('#dataTables-example1').DataTable( {
             responsive: true,
             ordering: false,
             // searching: false,
             info: false,
             paging:   false,
              "language": {
                  "zeroRecords": "ไม่มีรายการยืม",
                  "info": "แสดง START ถึง END จากทั้งหมด TOTAL รายการ",
                  "infoEmpty": "แสดง 0 ถึง 0 จากทั้งหมด 0 รายการ",
                  "infoFiltered": "(จากทั้งหมด MAX รายการ)",
                  oPaginate: {
                    // 
                    sFirst: 'เริ่มต้น',
                    sLast: 'สุดท้าย',
                    sNext: 'ถัดไป',
                    sPrevious: 'ย้อนกลับ'

                },
                "search": "ค้นหา:"
              }
          });
      });
    </script>


</body>

</html>
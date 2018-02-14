<?php
 session_start();
include 'connect_book.php';

$memberid = $_GET['memberid'];
$sql_borrow = "SELECT * FROM `bookborrow`
";
$result_borrow = mysqli_query($conn ,$sql_borrow);

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
                            รายการการยืมเล่มโครงงาน
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr align="center">
            
							            <th><center style="margin-top: 20px;">รายการผู้ยืมเล่มโครงงาน</center> </th>
							            <!-- <th style="width: 15%" align="center">ผู้ยืม</th> -->
							            <!-- <th style="width: 13%" align="center">วันที่ยืม </th> -->
							            <!-- <th style="width: 13%" align="center">กำหนดส่งคืน </th> -->
							            <!-- <th style="width: 13%" align="center">วันที่คืน </th> -->
							            <!-- <th width="15%"><center style="margin-top: 20px;">รายละเอียด</center> </th> -->
							            <!-- <th style="width: 10%" align="center">สถานะ</th> -->
							            
							        </tr>
                                </thead>
                                <tbody>                    

        <?php
        
        include 'connect_book.php';

$sql = "SELECT * FROM `bookborrow`
INNER JOIN book ON bookborrow.bookid=book.bookid
INNER JOIN member ON bookborrow.memberid=member.memberid WHERE memberid=$memberid
ORDER BY borrowdate DESC";
$result = mysqli_query($conn, $sql);
$today  = date('Y-m-d'); 

        //while(
//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        //)  {

        ?>
          <?php // if($row["statusbook"]=='0') { ?>
        <tr>

            
            <!-- <td><?php // echo $row['booknamethai']; ?></td> -->
            <td><a data-toggle="modal" data-target="#myModal1"><?php echo $memberid; ?></a></td>
            <!-- <td><?php // echo date_format($row['borrowdate'],'d-m-Y') ; ?></td> -->
            <!-- <td><?php // echo $row['returndate']; ?></td> -->
            <!-- <td><?php // echo $row['returnbook']; ?></td> -->
            <!-- <td><?php // echo $row['count_borrow']; ?></td> -->
            <!-- <td><?php // echo $row['borrowdetailid'];?></td> --> 
            <!-- <td>
                <center><button class="btn btn-info" style="background-color: #FFFF00">
                    <a href="detail_search_book.php?bookid=<?php // echo $row["bookid"]?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true" ></span>
                    </a></button>
                </center>
            </td> -->          
        </tr>
       <?php // }  ?>
        <?php  
       // }
        // mysqli_free_result($result) ;
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
    <!-- /#wrapper -->


<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">รายการการยืมเล่มโครงงาน</h4>
        </div>
        <div class="modal-body">

<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr align="center">
            
                                        <th style="width: 30%" align="center">เล่มโครงงาน </th>
                                        <th style="width: 15%" align="center">ผู้ยืม</th>
                                        <th style="width: 13%" align="center">วันที่ยืม </th>
                                        <th style="width: 13%" align="center">กำหนดส่งคืน </th>
                                        <!-- <th style="width: 13%" align="center">วันที่คืน </th> -->
                                        <!-- <th style="width: 20%" class="center">รายละเอียด </th> -->
                                        <th style="width: 10%" align="center">สถานะ</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>                    

        <?php
        
        include 'connect_book.php';

$sql = "SELECT * FROM `bookborrow`
LEFT JOIN book ON bookborrow.bookid=book.bookid
WHERE memberid='52' ORDER BY borrowdate DESC";
$result = mysqli_query($conn, $sql);
$today  = date('Y-m-d');

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
          <?php if($row["statusbook"]=='0') { ?>
        <tr>
            <?php 
                //$theBorrow = date("d-m-Y",strtotime($row['borrowdate']));
                //$theBorrow = strtotime($row['borrowdate']);
                $theBorrow = date("d-m-",strtotime($row['borrowdate'])).date(date("Y",strtotime($row['borrowdate']))+543);
                $theReturn = date("d-m-",strtotime($row['returndate'])).date(date("Y",strtotime($row['returndate']))+543);
                //$theReturn = strtotime($row['returndate']);
                //$theReturn = date('d-m-Y',strtotime($row['returndate']));

            ?>
            <td><?php echo $row['booknamethai']; ?></td>
            <td><?php echo $row['memberid']; ?> <?php // echo $row['lname']; ?></td>
            <td><?php echo $theBorrow; ?></td>
            <td><?php echo $theReturn; ?></td>
            <!-- <td><?php // echo $row['returnbook']; ?></td>
            <!-- <td><?php // echo $row['count_borrow']; ?></td> -->
            <!-- <td><?php // echo $row['borrowdetailid'];?></td> -->
            
            <td> 
                <center> 
                
                <?php 

              if($today >= $row['returndate']){ ?>
                <a href="over.php?borrowid=<?php echo $row['borrowid']; ?>&&member_id=<?php echo $row['memberid']; ?>&&date=<?php echo $row['borrowdate']; ?>&total=1&&returnbook=<?php echo $today ;?>" style="color: white;font-size:12px" >
                    <button class="btn btn-susses" style="background-color: #FF0033 ;padding-left: 10px;padding-right: 10px;"" name="hdnSiteName" onclick="return confirm('ยืนยันการคืน ?')" >
                   เลยกำหนดส่ง
                   </button>
                </a>
                    

        <?php }else{ ?>
                <a href="update_status_borrow.php?borrowid=<?php echo $row['borrowid']; ?>&&member_id=<?php echo $row['memberid']; ?>&&date=<?php echo $row['borrowdate']; ?>&total=1" style="color: white" >
                   <button class="btn btn-susses" style="background-color: #FFCC00" name="hdnSiteName" onclick="return confirm('ยืนยันการคืน ?')" >
                    ค้างส่ง
                    </button>
                </a>
        
        <?php } ?>        
                </center>          
         <?php // if($row["statusbook"]=='1') { ?>
               <!--  <button class="btn btn-susses" style="color: white" >คืนแล้ว --> 
                <!-- <a  style="color: white"></a> -->
            <!--     </button> -->
                 
        <?php // } ?>
                 
            </td>
           
        </tr>
       <?php }  ?>
        <?php  
        }
         mysqli_free_result($result) ;
        //mysqli_close($conn);

          ?>


                            </tbody>
                            </table>

        </div>
        <div class="modal-footer">
          <!-- <button type="submit" class="btn btn-success">บันทึก</button>
          </form> -->
        </div>
      </div>
      
    </div>
  </div>





    <?php include ('script.php'); ?>

</body>

</html>
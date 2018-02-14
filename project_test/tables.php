<?php
 session_start();
// include 'connect_book.php';

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
            <!-- /.navbar-header -->

           <?php include ('menu.php');?>

        <div id="page-wrapper" style="background-image: url('test-img.png');">
            <div class="row"><br>

            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="height: 42px;background-color: #d7efd3">
                             <h4 style="margin-top: 0px;">รายการการยืมเล่มโครงงาน</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr align="center">
            
                                        <!-- <th ><center>เล่มโครงงาน</center> </th> -->
                                        <th ><center>ผู้ยืม</center></th>
                                        <th style="width: 20%"><center>วันที่ยืม</center> </th>
                                        <th style="width: 20%"><center>กำหนดส่งคืน </center></th>
                                        <th style="width: 10%" hidden=""><center>สถานะ</center></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>                    

        <?php
        
        include 'connect_book.php';

$sql = "SELECT * FROM `bookborrow`
LEFT JOIN member ON bookborrow.memberid = member.memberid 
LEFT JOIN titlename ON bookborrow.memberid = member.titlenameid 
GROUP BY fname,lname ";
$result = mysqli_query($conn, $sql);
$today  = date('Y-m-d');

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
          <?php  if($row["statusbook"]=='2') { ?>
        <tr>
            <?php 

                // $theBorrow = date("d-m-",strtotime($row['borrowdate'])).date(date("Y",strtotime($row['borrowdate']))+543);
                // $theReturn = date("d-m-",strtotime($row['returndate'])).date(date("Y",strtotime($row['returndate']))+543);

            ?>
            <td hidden=""><?php echo $row['memberid']; ?></td>
            <td><a href="report_borrow_staffpage.php?borrowid=<?php  echo $row["borrowid"] ?>&&memberid=<?php  echo $row["memberid"] ?>">
                <?php echo $row['fname']; ?> <?php echo $row['lname']; ?></a></td>
            <td><?php  echo $row['borrowdate']; ?></td>
            <td><?php  echo $row['returndate']; ?></td>

            
            <td hidden=""> 
                <center>                    
        <?php { ?>
                <a href="approve.php?borrowid=<?php echo $row['borrowid']; ?>&&member_id=<?php echo $row['memberid']; ?>&&date=<?php echo $row['borrowdate']; ?>&total=0&&returnbook=<?php echo $today ;?>"" style="color: white" >
                   <button class="btn btn-outline btn-success btn-xs" name="hdnSiteName" onclick="return confirm('ยืนยันการอนุมัติ ?')" >
                    อนุมัติ
                    </button>
                </a>
        <?php } ?>        
                </center>                                            
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
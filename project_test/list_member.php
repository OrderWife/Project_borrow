<?php
session_start();
include 'connect_book.php';


$sql = "SELECT * FROM `member`
LEFT JOIN titlename
ON member.titlenameid=titlename.titlenameid
LEFT JOIN major
ON member.majorid=major.majorid 
LEFT JOIN typemember
ON member.typememberid = typemember.typememberid ORDER BY memberid DESC ";
$result = mysqli_query($conn, $sql);
$i = 1;
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
                    <span class="sr-only">อยู่ตรงไหนหว่า</span>
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
                            <h4 style="margin-top: 0px;">รายการสมาชิก</h4>
                            <a href="print_list_member.php">
                            <button class="btn btn-primary"  id="printPreview2" onclick="myFunction()" style="font-size: 16px;margin-left: 95%;margin-top: -60px">
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
                                        <th style="width: 20%">ประเภทสมาชิก</th>
                                        <th style="width: 35%">สาขาวิชา </th>
                                        <!-- <th style="width: 84px;padding-top: 0px;padding-bottom: 8px;padding-right: 0px;padding-left: 0px;"><center>รายละเอียด</center></th> -->
                                    </tr>
                                </thead>
                                <tbody>                    

        <?php
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
        <tr>
            <td align="center"><?=$i;?></td>
            <!-- <td class="center"><?php echo $row['titlename']; ?></td> -->
            <td><a href="detail_member.php?memberid=<?php echo $row['memberid']?>"> <?php echo $row['titlename']; ?> <?php echo $row['fname']; ?> &nbsp&nbsp <?php echo $row['lname']; ?>
            <input type="hidden" name="" value="<?php  echo $row['titlename'].$row['major'].$row; ?>">         
            </td>
            
<!--             <td>
                <center>
                    <a href="detail_member.php?memberid=<?php echo $row['memberid']?>">
                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                    </a>
                </center>
            </td> -->
            <td class="center"><?php echo $row['nametype']; ?></td>
            <td class="center"><?php echo $row['major']; ?></td>
        </tr>

        <?php  $i++; } 
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
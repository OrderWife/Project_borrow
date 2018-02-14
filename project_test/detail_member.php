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
                            <h4 style="margin-top: 0px;">ข้อมูลสมาชิก</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="padding-top: 1px;">
                        
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <?php

include 'connect_book.php';

$sql = "SELECT * FROM `member`
INNER JOIN titlename ON member.titlenameid=titlename.titlenameid
INNER JOIN major ON member.majorid=major.majorid
INNER JOIN typemember ON member.typememberid=typemember.typememberid WHERE memberid='$memberid'";

$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
		?>

	<br><label hidden="">รหัสสมาชิก :</label> <?php // echo $row['memberid']; ?>

    <label>ชื่อ-นามสกุล : </label> <?php echo $row['titlename']; ?> <?php echo $row['fname']; ?> <?php echo $row['lname']; ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>

    <label>สาขาวิชา :</label> <?php echo $row['major']; ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>

    <label>ประเภทสมาชิก :</label> <?php echo $row['nametype']; ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>

    <label>เบอร์โทรศัพท์ :</label> <?php echo $row['tel']; ?><br>

    <label>อีเมล์ :</label> <?php echo $row['email']; ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>

    <label>ที่อยู่ :</label> <?php echo $row['address']; ?></p>


		<?php  
	}

		mysqli_free_result($result)	;
		mysqli_close($conn);

		  ?>
                            </table>


            <!-- ส่วนรายงาน -->
            <!-- /.row -->
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4>รายการการยืม-คืนเล่มโครงงาน </h4>
                        </div> -->
                        <!-- /.panel-heading -->
                        <!-- <div class="panel-body"> -->
<h5>รายการการยืม-คืนเล่มโครงงาน </h5>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                            <tr>
            
                                                <th><center>เล่มโครงงาน</center> </th>
                                                <th width="15%" ><center>วันที่ยืม</center> </th>
                                                <th width="15%" ><center>วันที่คืน</center> </th>
                                                <th width="10%" ><center>สถานะ</center> </th>
                                                <!-- <th style="width: 30%" class="center">รายละเอียด </th> -->
                                                <!--<th class="center">แก้ไข</th>-->
                                                
                                            </tr>
                                </thead>
                                <tbody>                    

        <?php

include 'connect_book.php';

        //$session_login_id = $_SESSION['memberid'];

        $qry_user = "SELECT * FROM `bookborrow` 
            LEFT JOIN borrower ON bookborrow.borrowerid = borrower.borrowerid
            LEFT JOIN book ON bookborrow.bookid = book.bookid WHERE memberid='$memberid'";
        $result_user = mysqli_query($conn,$qry_user);

        while($row = mysqli_fetch_array($result_user, MYSQLI_ASSOC))  {
            
        ?>
        <tr>
            <?php 
                $theBorrow = date("d-m-",strtotime($row['borrowdate'])).date(date("Y",strtotime($row['borrowdate']))+543);
                $theReturn = date("d-m-",strtotime($row['returndate'])).date(date("Y",strtotime($row['returndate']))+543);
            ?>
            <td><?php echo $row['booknamethai']; ?></td>
            <td><?php echo $theBorrow; ?></td>
            <td><?php echo $theReturn; ?></td>
            <!-- <td><?php // echo $row['statusbook']; ?></td> -->
            <td> 
                <center> 
                <?php if($row["statusbook"]=='0') { ?>
                <!-- <button class="btn btn-danger" name="hdnSiteName"> -->
                <a style="color: red">ค้างส่ง</a>
                <?php } ?>

                <?php if($row["statusbook"]=='2') { ?>
                <!-- <button class="btn btn-danger" name="hdnSiteName"> -->
                <a style="color: orange">รอการอนุมัติ</a>
                <?php } ?>
                
                <?php if($row["statusbook"]=='1') {

                ?>
                <!-- <button class="btn btn-susses" name="hdnSiteName" > -->
                <a style="color: green">คืนแล้ว</a>
                     
                <?php } ?>
                </center>       
            </td>
        </tr>

        <?php  
    }

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
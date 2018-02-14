<?php
session_start();
include 'connect_book.php';
$advisorid = $_GET['advisorid'];
$sql = "SELECT * FROM `advisor` WHERE advisorid = '$advisorid'";
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
                            <h4 style="margin-top: 0px;">ข้อมูลอาจารย์ที่ปรึกษา</h4>
                            <a href="print_report_advisor_book.php?advisorid=<?php echo $_GET['advisorid']; ?>">
                            <button class="btn btn-primary"  id="printPreview2" onclick="myFunction()" style="margin-left: 95%;margin-top: -60px">
                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                            </button>
                            </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="padding-top: 1px;">
                        
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
        <?php

include 'connect_book.php';

$sql = "SELECT * FROM `advisor`
INNER JOIN titlename ON advisor.titlenameid=titlename.titlenameid
INNER JOIN major ON advisor.majorid=major.majorid
WHERE advisorid='$advisorid'";

$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
		?>

	<!-- <br><label>รหัสสมาชิก :</label> <?php // echo $row['advisorid']; ?> -->


    <br><label>ชื่อ-นามสกุล : </label> <?php echo $row['titlename']; ?> <?php echo $row['fname']; ?> <?php echo $row['lname']; ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

    <label>สาขาวิชา :</label> <?php echo $row['major']; ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

    <label>เบอร์โทรศัพท์ :</label> <?php echo $row['tel']; ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp

    <label>อีเมล์ :</label> <?php echo $row['email']; ?><br><br>


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
                        <div class="panel-heading" style="height: 40px;">
                            <h5 style="margin-top: 3px;">เป็นที่ปรึกษา</h5>
                        </div> -->
                        <!-- /.panel-heading -->
                        <!-- <div class="panel-body"> -->
                        <h4>เป็นที่ปรึกษา</h4>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr class="header">           
                                        <th style="width:200px;padding-right: 10px;padding-left: 10px;height: 30px;"><center>นักศึกษา</center> </th>
                                        <th style="px;padding-right: 10px;padding-left: 10px;height: 30px;"><center>เล่มโครงงาน</center> </th>
                                        <th style="width:135px; padding-right: 10px;padding-left: 10px;height: 30px;"><center>ปีพ.ศ.</center> </th>
                                                                                     
                                    </tr>
                                </thead>

                        <tbody>
                            
                            <?php

include 'connect_book.php';

$sql = "SELECT * FROM `book`
-- INNER JOIN student ON book.studentid=student.studentid 
WHERE advisorid='$advisorid'";

$result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>

        <tr>

            <td><?php echo $row['student']; ?></td>

            <td><?php echo $row['booknamethai']; ?></td> 

            <td><?php echo $row['year']+543; ?></td>      

        </tr>

        <?php  } ?> 
         
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
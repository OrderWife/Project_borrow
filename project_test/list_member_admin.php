<?php
session_start();
include 'connect_book.php';


$sql = "SELECT * FROM `member`
LEFT JOIN titlename
ON member.titlenameid=titlename.titlenameid
LEFT JOIN major
ON member.majorid=major.majorid ORDER BY memberid DESC ";
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
    <?php include('css_admin.php'); ?>
    <?php include('datatable.php'); ?>

</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <!-- <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">อยู่ตรงไหนหว่า</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> -->
            <!-- /.navbar-header -->

           <?php include ('menu_admin.php');?>

        <div id="page-wrapper">
            <div class="row"><br>
                <div class="col-lg-12">
                    <h4 class="page-header">รายการสมาชิกในระบบ</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #d7efd3">
                            รายการสมาชิก
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <!-- <th class="center" width="13%" >คำนำหน้าชื่อ</th> -->
                                        <th class="center" width="25%">ชื่อ-นามสกุล</th>
                                        <th class="center" width="20%">ที่อยู่</th>
                                        <th class="center" width="15%">เบอร์โทรสัพท์</th>
                                        <th class="center">อีเมล</th>
                                        <th class="center">สาขาวิชา </th>
                                        <!-- <th class="center" width="13%">รายละเอียด</th> -->
                                    </tr>
                                </thead>
                                <tbody>                    

        <?php
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
        <tr>

            <!-- <td class="center"></td> -->
            <td><?php echo $row['titlename']; ?> <?php echo $row['fname']; ?> &nbsp&nbsp <?php echo $row['lname']; ?>
            <input type="hidden" name="" value="<?php  echo $row['titlename'].$row['major'].$row; ?>">         
            </td>
            <td class="center"><?php echo $row['address']; ?></td>
            <td class="center"><?php echo $row['tel']; ?></td>
            <td class="center"><?php echo $row['email']; ?></td>
            <td class="center"><?php echo $row['major']; ?></td>            
            <!-- <td>
                <center><button class="btn btn-info" style="background-color: #FFFF00">
                    <a href="detail_member_admin.php?memberid=<?php // echo $row['memberid']?>">
                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                    </a></button>
                </center>
            </td> -->
            
        </tr>

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

    <?php include ('script_admin.php'); ?>

</body>

</html>
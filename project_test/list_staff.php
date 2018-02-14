
<?php
session_start();
include 'connect_book.php';


$sql = "SELECT * FROM `staff`
LEFT JOIN titlename
ON staff.titlenameid=titlename.titlenameid
ORDER BY staffid DESC ";
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
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">อยู่ตรงไหนหว่า</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- /.navbar-header -->

           <?php include ('menu_admin.php');?>

        <div id="page-wrapper">
            <div class="row"><br>
                <div class="col-lg-12">
                    <h4 class="page-header">รายการเจ้าหน้าที่ในระบบ</h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="height: 42px;background-color: #d7efd3">
                            รายการเจ้าหน้าที่
                             <button class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#myModal1">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"> เพิ่มข้อมูล</span></button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <center>
                                    <tr align="center">
                                        <!-- <th width="15%" >คำนำหน้าชื่อ</th> -->
                                        <th><center>ชื่อ-นามสกุล</center></th>
                                        <th width="15%"><center>เบอร์โทรศัทพ์</center></th>
                                        <th width="25%"><center>อีเมล</center></th>
                                        <th width="15%"><center>แก้ไข / ลบ</center></th>
                                        <!-- <th width="8%"><center></center></th> -->
                                    </tr>
                                    </center>
                                </thead>
                                <tbody>                    

        <?php

// include 'connect_book.php';

// $sql = "SELECT * FROM `staff` 
// LEFT JOIN titlename 
// ON advisor.titlenameid=titlename.titlenameid ";
// $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
        <tr>
            
            <!-- <td></td> -->
            <td><?php echo $row['titlename']; ?> <?php echo $row['fname']; ?>  <?php echo $row['lname']; ?></td>
            <td><?php echo $row['tel']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
            <center>
                <a class="edit-staffid" 
                data-staffid="<?php echo $row['staffid']; ?>" 
                data-titlenameid="<?php echo $row['titlenameid']; ?>" 
                data-fname="<?php echo $row['fname']; ?>"
                data-lname="<?php echo $row['lname']; ?>"
                data-tel="<?php echo $row['tel']; ?>"
                data-email="<?php echo $row['email']; ?>"
                data-username="<?php echo $row['username']; ?>"
                data-userpassword="<?php echo $row['userpassword']; ?>"
                 >
                    <!-- <button class="btn btn-info" style="background-color: #33CC33"> -->
                        <!-- <a href="edit_advisor.php?id= <?php // echo $row['advisorid']; ?>"> -->
                            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>                        
                    <!-- </button> -->
                    </a>  /  
                            <a href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            </center> 
            </td>

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
    </div>
    <!-- /#wrapper -->


    <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">แก้ไขข้อมูลเจ้าหน้าที่</h4>
        </div>
        <div class="modal-body">

<form action="update_staff.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
      <h3><a href="index.php"></a></h3>

<?php 
include 'connect_book.php';
$data = array();
if (isset($_GET['id'])) {
      $sql = "SELECT * FROM `member` WHERE memberid =".$_GET['id'];
      $result = mysqli_query($conn, $sql);
      $data = mysqli_fetch_assoc($result);
}

?>
    
            <input type="hidden" name="staffid" id="staffid" >

            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">    
            <label>คำนำหน้าชื่อ : </label>
                  <?php 
                  $sql = "SELECT * FROM `titlename`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select name="titlenameid" id="titlenameid" class="form-control" >
            <option value="">---คำนำหน้าชื่อ---</option> 
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        if ($row[0] == $data['titlenameid']) {
                            echo "<option value='$row[0]' selected >$row[1]</option>";
                        } else {
                            echo "<option value='$row[0]'>$row[1]</option>";
                        }
                  }
            ?>
            </select></div>
            
            <div class="col-lg-4">
            <label>ชื่อ : </label>
            <input type="text" name="fname" id="fname" class="form-control" />
            </div>
            
            <div class="col-lg-4">
            <label>นามสกุล : </label>
            <input type="text" name="lname" id="lname" class="form-control" />
            </div>
            </div>            
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">    
            <label>เบอร์โทรศัพท์ : </label>
            <input type="text" name="tel" id="tel" class="form-control" />
            </div>
            
            <div class="col-lg-4">
            <label>อีเมล์ : </label>
            <input type="text" name="email" id="email" class="form-control"/>
            </div>
            </div>


            <hr width="95%" style="border-top: 1px solid black">

            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>ชื่อผู้ใช้งาน : </label>
            <input type="text" name="username" id="username" class="form-control" />
            </div>
            
            <div class="col-lg-4">
            <label>รหัสผ่าน : </label>
            <input type="password" name="userpassword" id="userpassword" class="form-control" />
            </div>
            </div>


            <?php
            if (isset($_GET['id'])) {
                   echo '<input type="hidden" name="memberid" value="'.$_GET['id'].' "/>';
             } 
             mysqli_free_result($result) ;
             mysqli_close($conn);
            ?>


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">บันทึก</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>

<!-- ส่วนการเพิ่ม -->
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">เพิมข้อมูลเจ้าหน้าที่</h4>
        </div>
        <div class="modal-body">

<form action="insert_staff.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
      <h3><a href="index.php"></a></h3>

<?php 
include 'connect_book.php';
$data = array();
if (isset($_GET['id'])) {
      $sql = "SELECT * FROM `member` WHERE memberid =".$_GET['id'];
      $result = mysqli_query($conn, $sql);
      $data = mysqli_fetch_assoc($result);
}

?>
    
            <input type="hidden" name="staffid" id="staffid" >

            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">    
            <label>คำนำหน้าชื่อ : </label>
                  <?php 
                  $sql = "SELECT * FROM `titlename`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select name="titlenameid" id="titlenameid" class="form-control" >
            <option value="">---คำนำหน้าชื่อ---</option> 
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        if ($row[0] == $data['titlenameid']) {
                            echo "<option value='$row[0]' selected >$row[1]</option>";
                        } else {
                            echo "<option value='$row[0]'>$row[1]</option>";
                        }
                  }
            ?>
            </select></div>
            
            <div class="col-lg-4">
            <label>ชื่อ : </label>
            <input type="text" name="fname" id="fname" class="form-control" />
            </div>
            
            <div class="col-lg-4">
            <label>นามสกุล : </label>
            <input type="text" name="lname" id="lname" class="form-control" />
            </div>
            </div>            
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">    
            <label>เบอร์โทรศัพท์ : </label>
            <input type="text" name="tel" id="tel" class="form-control" />
            </div>
            
            <div class="col-lg-4">
            <label>อีเมล์ : </label>
            <input type="text" name="email" id="email" class="form-control"/>
            </div>
            </div>


            <hr width="95%" style="border-top: 1px solid black">

            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>ชื่อผู้ใช้งาน : </label>
            <input type="text" name="username" id="username" class="form-control" />
            </div>
            
            <div class="col-lg-4">
            <label>รหัสผ่าน : </label>
            <input type="password" name="userpassword" id="userpassword" class="form-control" />
            </div>
            </div>


            <?php
            if (isset($_GET['id'])) {
                   echo '<input type="hidden" name="memberid" value="'.$_GET['id'].' "/>';
             } 
             mysqli_free_result($result) ;
             mysqli_close($conn);
            ?>


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">บันทึก</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>


    <?php include ('script_admin.php'); ?>


    <script type="text/javascript">
        $('.edit-staffid').click(function() { 
            var staffid = $(this).attr('data-staffid');
            var titlenameid = $(this).attr('data-titlenameid');
            var fname = $(this).attr('data-fname');
            var lname = $(this).attr('data-lname');
            var tel = $(this).attr('data-tel');
            var email = $(this).attr('data-email');
            var username = $(this).attr('data-username');
            var userpassword = $(this).attr('data-userpassword');

            $("#staffid").val(staffid);
            $("#titlenameid").val(titlenameid);
            $("#fname").val(fname);
            $("#lname").val(lname);
            $("#tel").val(tel);
            $("#email").val(email);
            $("#username").val(username);
            $("#userpassword").val(userpassword);
            $("#myModal2").modal('show');

        });

    </script>

</body>

</html>

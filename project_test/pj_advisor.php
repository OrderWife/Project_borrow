<?php 
session_start();

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
   #dataTables-example_length{
    display: none;
   }
 </style>

</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">อยู่ตรงไหนหว่า</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> -->
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
                            รายการอาจารย์ที่ปรึกษา
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal1">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"> เพิ่มข้อมูลอาจารย์ที่ปรึกษา</span></button>

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
            
							            <th ><center>คำนำหน้าชื่อ</center></th>
							            <th ><center>ชื่อ-นามสกุล</center></th>
							            <th ><center>สาขาวิชา</center></th>
							            <th ><center>เบอร์โทรศัพท์</center></th>
							            <th ><center>อีเมล์</center></th>
							            <th style="width: 84px;padding-top: 0px;padding-bottom: 8px;padding-right: 0px;padding-left: 0px;"><center>แก้ไข</center></th>
							        </tr>
                                </thead>
                                <tbody>                    

<?php

include 'connect_book.php';

$sql = "SELECT * FROM `advisor` 
LEFT JOIN titlename 
ON advisor.titlenameid=titlename.titlenameid 
LEFT JOIN major 
ON advisor.majorid=major.majorid ORDER BY `advisor`.`advisorid` DESC";
$result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
        <tr>
            
            <td><?php echo $row['titlename']; ?></td>
            <td><?php echo $row['fname']; ?>  <?php echo $row['lname']; ?></td>
            <td><?php echo $row['major']; ?></td>
            <td><?php echo $row['tel']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td>
            <center>
                <a class="edit-advisorid" 
                data-advisorid="<?php echo $row['advisorid']; ?>" 
                data-titlenameid="<?php echo $row['titlenameid']; ?>" 
                data-fname="<?php echo $row['fname']; ?>"
                data-lname="<?php echo $row['lname']; ?>"
                data-majorid="<?php echo $row['majorid']; ?>"
                data-tel="<?php echo $row['tel']; ?>"
                data-email="<?php echo $row['email']; ?>" >
                <!-- <button class="btn btn-info" style="background-color: #33CC33"> -->
                    <!-- <a href="edit_advisor.php?id= <?php // echo $row['advisorid']; ?>"> -->
                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>                   
                <!-- </button> -->
                </a>
            </center> 
            </td>

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
    </div>
    <!-- /#wrapper -->


<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">แก้ไขข้อมูลอาจารย์ที่ปรึกษา</h4>
        </div>
        <div class="modal-body">

<form action="update_advisor.php" method="post" >

<?php 
include 'connect_book.php';

$sql = "SELECT * FROM `advisor`";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
 ?>

            <input type="hidden" name="advisorid" id="advisorid" >


            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>คำนำหน้าชื่อ : </label>
            <?php 
                  $sql = "SELECT * FROM `titlename`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select name="titlenameid" id="titlenameid" class="form-control" required autofocus >
            <option value="">---คำนำหน้าชื่อ---</option> 
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                  }
            ?>
            </select>
            </div>
            
            
            <div class="col-lg-4">
            <label>ชื่อ : </label>
            <input type="text" name="fname" id="fname" class="form-control" required autofocus /></div>

            <div class="col-lg-4">
            <label>นามสกุล : </label>
            <input type="text" name="lname" id="lname" class="form-control" required autofocus />
            </div>
            </div> 
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>สาขาวิชา : </label>
            <?php 
                  $sql = "SELECT * FROM `major`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select name="majorid" id="majorid" class="form-control" required autofocus >
            <option value="">---สาขาวิชา---</option></div>  
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                  }
            ?>
            </select></div>
            
            
            <div class="col-lg-4">
            <label>เบอร์โทรศัพท์ : </label>
            <input type="text" name="tel" id="tel" class="form-control" required autofocus /></div>
            
            <div class="col-lg-4">
            <label>อีเมล์ : </label>
            <input type="text1" name="email" id="email" class="form-control" required autofocus />
            </div>
            </div>

           <?php  
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





    <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">เพิ่มข้อมูลอาจารย์ที่ปรึกษา</h4>
        </div>
        <div class="modal-body">

<form action="insert_advisor.php" method="post" >

<?php 
include 'connect_book.php';

$sql = "SELECT * FROM `advisor`";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
 ?>

 
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>คำนำหน้าชื่อ : </label>
            <?php 
                  $sql = "SELECT * FROM `titlename`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select type="text" name="titlenameid" id="titlenameid" class="form-control" required autofocus >
            <option value="">---คำนำหน้าชื่อ---</option> 
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                  }
            ?>
            </select>
            </div>
            
            <div class="col-lg-4">
            <label>ชื่อ : </label>
            <input type="text" name="fname" id="fname" class="form-control" required autofocus /></div>

            <div class="col-lg-4">
            <label>นามสกุล : </label>
            <input type="text" name="lname" id="lname" class="form-control" required autofocus />
            </div>
            </div> 
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>สาขาวิชา : </label>
            <?php 
                  $sql = "SELECT * FROM `major`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select name="majorid" id="majorid" class="form-control" required autofocus >
            <option value="">---สาขาวิชา---</option></div>  
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                  }
            ?>
            </select></div>
            
            
            <div class="col-lg-4">
            <label>เบอร์โทรศัพท์ : </label>
            <input type="text" name="tel" id="tel" class="form-control" required autofocus /></div>
            
            <div class="col-lg-4">
            <label>อีเมล์ : </label>
            <input type="text1" name="email" id="email" class="form-control" required autofocus />
            </div>
            </div>

           <?php  
    }

        mysqli_free_result($result) ;
        mysqli_close($conn);

          ?>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" ">บันทึก</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>
  

    <?php include ('script.php'); ?>

    <script type="text/javascript">
        $('.edit-advisorid').click(function() { 
            var advisorid = $(this).attr('data-advisorid');
            var titlenameid = $(this).attr('data-titlenameid');
            var fname = $(this).attr('data-fname');
            var lname = $(this).attr('data-lname');
            var majorid = $(this).attr('data-majorid');
            var tel = $(this).attr('data-tel');
            var email = $(this).attr('data-email');
            
            $("#advisorid").val(advisorid);
            $("#titlenameid").val(titlenameid);
            $("#fname").val(fname);
            $("#lname").val(lname);
            $("#majorid").val(majorid);
            $("#tel").val(tel);
            $("#email").val(email);
            $("#myModal2").modal('show');
        });

    </script>

               
</body>

</html>
<!--  -->
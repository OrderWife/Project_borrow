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


</head>
<body>
<script language="javascript">

function fncSubmit() {
  if(document.form1.titlenameid.value == "") {
alert('กรุณากรอกคำนำหน้าชื่อ');
document.form1.titlenameid.focus();
return false;
}  
  if(document.form1.fname_stu.value == "") {
alert('กรุณากรอกชื่อ');
document.form1.fname_stu.focus();
return false;
}  
  if(document.form1.lname_stu.value == "") {
alert('กรุณากรอกนามสกุล');
document.form1.lname_stu.focus();
return false;
} 
    if(document.form1.id_stu.value == "") {
alert('กรุณากรอกเลขที่นักศึกษา');
document.form1.id_stu.focus();
return false;
}   
  if(document.form1.majorid.value == "") {
alert('กรุณากรอกสาขาวิชา');
document.form1.majorid.focus();
return false;
}    
  if(document.form1.tel.value == "") {
alert('กรุณากรอกเบอร์โทรศัพท์');
document.form1.tel.focus();
return false;
}  
  if(document.form1.email.value == "") {
alert('กรุณากรอกอีเมล์');
document.form1.email.focus();
return false;
}  
document.form1.submit();
}

</script>


<script language="javascript">

function fncSubmit() {
  if(document.form2.titlenameid.value == "") {
alert('กรุณากรอกคำนำหน้าชื่อ');
document.form2.titlenameid.focus();
return false;
}  
  if(document.form2.fname_stu.value == "") {
alert('กรุณากรอกชื่อ');
document.form1.fname_stu.focus();
return false;
}  
  if(document.form2.lname_stu.value == "") {
alert('กรุณากรอกนามสกุล');
document.form1.lname_stu.focus();
return false;
} 
    if(document.form2.id_stu.value == "") {
alert('กรุณากรอกเลขที่นักศึกษา');
document.form1.id_stu.focus();
return false;
}   
  if(document.form2.majorid.value == "") {
alert('กรุณากรอกสาขาวิชา');
document.form1.majorid.focus();
return false;
}    
  if(document.form2.tel.value == "") {
alert('กรุณากรอกเบอร์โทรศัพท์');
document.form1.tel.focus();
return false;
}  
  if(document.form2.email.value == "") {
alert('กรุณากรอกอีเมล์');
document.form1.email.focus();
return false;
}  
document.form1.submit();
}

</script>



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
                            รายการอาจารย์ที่ปรึกษา
                            <button class="btn btn-primary" style="margin-left: 740px;" data-toggle="modal" data-target="#myModal1">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"> เพิ่มข้อมูล</span></button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
            
                                        <th width="15%"><center style="margin-top: 20px;">คำนำหน้าชื่อ</center></th>
                                        <th><center style="margin-top: 20px;">ชื่อ-นามสกุล</center></th>
                                        <th><center style="margin-top: 20px;">รหัสนักศึกษา</center></th>
                                        <th><center style="margin-top: 20px;">สาขาวิชา</center></th>
                                        <th><center style="margin-top: 20px;">เบอร์โทรศัพท์</center></th>
                                        <th><center style="margin-top: 20px;">อีเมล์</center></th>
                                        <th><center style="margin-top: 20px;">แก้ไข</center></th>
                                    </tr>
                                </thead>
                                <tbody>                     

        <?php

include 'connect_book.php';

$sql = "SELECT * FROM `student`
LEFT JOIN titlename 
ON student.titlenameid=titlename.titlenameid
LEFT JOIN major
ON student.majorid=major.majorid ORDER BY studentid DESC";
$result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
        <tr>
            
            <td><?php echo $row['titlename']; ?></td>
            <td><?php echo $row['fname_stu']; ?>  <?php echo $row['lname_stu']; ?></td>
            <td><?php echo $row['id_stu']; ?></td>
            <td><?php echo $row['major']; ?></td>
            <td><?php echo $row['tel']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td> 
            <center>
                <a class="edit-studentid" 
                data-studentid="<?php echo $row['studentid']; ?>"
                data-titlenameid="<?php echo $row['titlenameid']; ?>"
                data-fname_stu="<?php echo $row['fname_stu']; ?>"
                data-lname_stu="<?php echo $row['lname_stu']; ?>"
                data-id_stu="<?php echo $row['id_stu']; ?>"
                data-majorid="<?php echo $row['majorid']; ?>"
                data-tel="<?php echo $row['tel']; ?>"
                data-email="<?php echo $row['email']; ?>" >
                <button class="btn btn-info" style="background-color: #33CC33">
                <!-- <a href="edit_student.php?id=<?php // echo $row['studentid']; ?>"> -->
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </button>
                </a>
            </center>
            </td>
        </tr>

        <?php  
    }

        mysqli_free_result($result) ;
       // mysqli_close($conn);

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
          <h4 class="modal-title">แก้ไขข้อมูลคำนำหน้าชื่อ</h4>
        </div>
        <div class="modal-body">


<form action="update_student.php" method="post" name="form2" onSubmit="JavaScript:return fncSubmit();">

<?php 
include 'connect_book.php';

$sql = "SELECT * FROM `student`";
$result = mysqli_query($conn, $sql);


 while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
 ?>

            <input type="hidden" name="studentid" id="studentid" >
           
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label >คำนำหน้าชื่อ : </label>
            <?php 
                  $sql = "SELECT * FROM `titlename`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select name="titlenameid" id="titlenameid" class="form-control" >
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
            <input type="text" name="fname_stu" id="fname_stu" class="form-control" />
            </div>
            
            <div class="col-lg-4">
            <label>นามสกุล : </label>
            <input type="text" name="lname_stu" id="lname_stu" class="form-control"/>
            </div>
            </div>
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>รหัสนักศึกษา : </label>
            <input type="text" name="id_stu" id="id_stu" class="form-control"/></div>
            
            <div class="col-lg-4">
            <label>สาขาวิชา : </label>
            <?php 
                  $sql = "SELECT * FROM `major`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select name="majorid" id="majorid" class="form-control" >
            <option value="">---สาขาวิชา---</option> 
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                  }
            ?>
            </select>
            </div>
            
            <div class="col-lg-4">
            <label>เบอร์โทรศัพท์ : </label>
            <input type="text" name="tel" id="tel" class="form-control"/>
            </div>
            </div>
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>อีเมล์ : </label>
            <input type="text1" name="email" id="email" class="form-control"/>
            </div>
            </div>

           <?php  
    }

        mysqli_free_result($result) ;
        mysqli_close($conn);

          ?>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" >บันทึก</button>
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
          <h4 class="modal-title">เพิ่มข้อมูลคำนำหน้าชื่อ</h4>
        </div>
        <div class="modal-body">

<form action="insert_student.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">

<?php 
include 'connect_book.php';

$sql = "SELECT * FROM `student`";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
 ?>

           
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label >คำนำหน้าชื่อ : </label>
            <?php 
                  $sql = "SELECT * FROM `titlename`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select type="text" name="titlenameid" id="titlenameid" class="form-control" >
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
            <input type="text" name="fname_stu" id="fname_stu" class="form-control" /></div>
            
            <div class="col-lg-4">
            <label>นามสกุล : </label>
            <input type="text" name="lname_stu" id="lname_stu" class="form-control"/></div></div>
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>รหัสนักศึกษา : </label>
            <input type="text" name="id_stu" id="id_stu" class="form-control"/></div>
            
            <div class="col-lg-4">
            <label>สาขาวิชา : </label>
            <?php 
                  $sql = "SELECT * FROM `major`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select name="majorid" id="majorid" class="form-control" >
            <option value="">---สาขาวิชา---</option> 
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                  }
            ?>
            </select>
            </div>
            
            <div class="col-lg-4">
            <label>เบอร์โทรศัพท์ : </label>
            <input type="text" name="tel" id="tel" class="form-control"/></div></div>
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>อีเมล์ : </label>
            <input type="text1" name="email" id="email" class="form-control"/></div></div>
           <?php  
    }

        mysqli_free_result($result) ;
        mysqli_close($conn);

          ?>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" >บันทึก</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>



    <?php include ('script.php'); ?>

    <script type="text/javascript">
        $('.edit-studentid').click(function() { 
            var studentid = $(this).attr('data-studentid');
            var titlenameid = $(this).attr('data-titlenameid');
            var fname_stu = $(this).attr('data-fname_stu');
            var lname_stu = $(this).attr('data-lname_stu');
            var id_stu = $(this).attr('data-id_stu');
            var majorid = $(this).attr('data-majorid');
            var tel = $(this).attr('data-tel');
            var email = $(this).attr('data-email');

            $("#studentid").val(studentid);
            $("#titlenameid").val(titlenameid);
            $("#fname_stu").val(fname_stu);
            $("#lname_stu").val(lname_stu);
            $("#id_stu").val(id_stu);
            $("#majorid").val(majorid);
            $("#tel").val(tel);
            $("#email").val(email);
            $("#myModal2").modal('show');
        });

    </script>


</body>

</html>



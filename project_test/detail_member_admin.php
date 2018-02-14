<?php
session_start();
// include 'connect_book.php';
// $memberid = $_GET['memberid'];
// $sql = "SELECT * FROM `member` WHERE memberid = '$memberid'";
// $result = mysqli_query($conn, $sql);

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
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <!-- /.navbar-header -->
           <?php include ('menu_admin.php');?>


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
                            รายการเล่มโครงงาน
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
                            <!-- <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> -->
                                <?php

include 'connect_book.php';

$sql = "SELECT * FROM `member`
INNER JOIN titlename ON member.titlenameid=titlename.titlenameid
INNER JOIN major ON member.majorid=major.majorid
INNER JOIN typemember ON member.typememberid=typemember.typememberid ";

$result = mysqli_query($conn, $sql);

		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
		?>

	<br><label>รหัสสมาชิก :</label> <?php echo $row['memberid']; ?><br><br>

    <label>ชื่อ-นามสกุล : </label> <?php echo $row['titlename']; ?> <?php echo $row['fname']; ?> <?php echo $row['lname']; ?><br><br>

    <label>สาขาวิชา :</label> <?php echo $row['major']; ?><br><br>

    <label>ประเภทสมาชิก :</label> <?php echo $row['nametype']; ?><br><br>

    <label>เบอร์โทรศัพท์ :</label> <?php echo $row['tel']; ?><br><br>

    <label>อีเมล์ :</label> <?php echo $row['email']; ?><br><br>

    <label>ที่อยู่ :</label><p style="margin: 3px" width="50%"> <?php echo $row['address']; ?></p><br>

    <a class="edit-memberid" 
                data-memberid="<?php echo $row['memberid']; ?>" 
                data-titlenameid="<?php echo $row['titlenameid']; ?>" 
                data-fname="<?php echo $row['fname']; ?>"
                data-lname="<?php echo $row['lname']; ?>"
                data-major="<?php echo $row['major']; ?>"
                data-nametype="<?php echo $row['nametype']; ?>"
                data-tel="<?php echo $row['tel']; ?>"
                data-email="<?php echo $row['email']; ?>"
                data-address="<?php echo $row['address']; ?>"
                data-username="<?php echo $row['username']; ?>"
                data-userpassword="<?php echo $row['userpassword']; ?>"
                 >
        <button type="submit" class="btn btn-success" >
        <!-- <a href="edit_member.php?id= <?php // echo $row['memberid']; ?>" style="color: white"> -->
        แก้ไขข้อมูลสมาชิก     
        </button>
        </a>


		<?php  
	}

		mysqli_free_result($result)	;
		mysqli_close($conn);

		  ?>
                            <!-- </table> -->
                            
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
          <h4 class="modal-title">แก้ไขข้อมูลส่วนตัว</h4>
        </div>
        <div class="modal-body">

<form action="update_member_admin.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
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
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>รหัสสมาชิก : </label>
            <input name="memberid" id="memberid" class="form-control" />
            </div>
            </div>

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
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px;width: 100%">
            <div class="col-lg-4">
            <label>ที่อยู่ : </label><br>
            <textarea type="text" name="address" id="address" class="form-control" style="width: 850px;height: 100px">
            </textarea>
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
                        if ($row[0] == $data['majorid']) {
                            echo "<option value='$row[0]' selected >$row[1]</option>";
                        } else {
                            echo "<option value='$row[0]'>$row[1]</option>";
                        }
                  }
            ?>
            </select>
            </div>
            </div>
            <br>

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
        $('.edit-memberid').click(function() { 
            var memberid = $(this).attr('data-memberid');
            var titlenameid = $(this).attr('data-titlenameid');
            var fname = $(this).attr('data-fname');
            var lname = $(this).attr('data-lname');
            var major = $(this).attr('data-major');
            var nametype = $(this).attr('data-nametype');
            var tel = $(this).attr('data-tel');
            var email = $(this).attr('data-email');
            var address = $(this).attr('data-address');
            var username = $(this).attr('data-username');
            var userpassword = $(this).attr('data-userpassword');

            $("#memberid").val(memberid);
            $("#titlenameid").val(titlenameid);
            $("#fname").val(fname);
            $("#lname").val(lname);
            $("#major").val(major);
            $("#nametype").val(nametype);
            $("#tel").val(tel);
            $("#email").val(email);
            $("#address").val(address);
            $("#username").val(username);
            $("#userpassword").val(userpassword);

            $("#myModal2").modal('show');

        });

    </script>
    
</body>

</html>

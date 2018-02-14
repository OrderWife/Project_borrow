<?php
session_start();
include 'connect_book.php';
$sql = "SELECT * FROM `member`
LEFT JOIN major ON member.majorid=major.majorid
LEFT JOIN titlename ON member.titlenameid=titlename.titlenameid ";
$result = mysqli_query($conn ,$sql);
//$memberid = $_GET['memberid'];
//$sql = "SELECT * FROM `member` WHERE memberid = '$memberid'";
//$result = mysqli_query($conn ,$sql);

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
    <?php include('css_member.php'); ?>
    <?php include('datatable_member.php'); ?>

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

           <?php include ('menu_member.php');?>

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
                            <h4 style="margin-top: 0px;">ข้อมูลส่วนตัว</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <?php

include 'connect_book.php';

        $session_login_id = $_SESSION['memberid'];

        $qry_user = "SELECT * FROM `member` 
        LEFT JOIN major ON member.majorid=major.majorid
        LEFT JOIN titlename ON member.titlenameid=titlename.titlenameid 
        WHERE memberid='$session_login_id'";
        $result_user = mysqli_query($conn,$qry_user);
        // if ($result_user) {
        //    $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
        //    $s_login_username = $row_user['titlename'];
        //    $s_login_username1 = $row_user['fname'];
        //    $s_login_username2 = $row_user['lname'];
        //    $s_login_username3 = $row_user['address'];
        //    $s_login_username4 = $row_user['tel'];
        //    $s_login_username5 = $row_user['email'];
        //    $s_login_username6 = $row_user['major'];
        //    $s_login_username7 = $row_user['username'];
        //    $s_login_username8 = $row_user['userpassword'];
        //    mysqli_free_result($result_user);
        //}


		while($row = mysqli_fetch_array($result_user, MYSQLI_ASSOC))  {
		?>
		
<!-- 
        <label>คำนำหน้าชื่อ : </label> <?php // echo "$s_login_username" ?><br><br>

        <label>ชื่อ :</label> <?php //echo "$s_login_username1" ?><br><br>

        <label>นามสกุล :</label> <?php// echo "$s_login_username2" ?><br><br>

        <label>ที่อยู่ :</label> <?php// echo "$s_login_username3" ?><br><br>

        <label>เบอร์โทรศัพท์ :</label> <?php //echo "$s_login_username4" ?><br><br>

        <label>อีเมล์ :</label> <?php //echo "$s_login_username5" ?><br><br>

        <label>สาขาวิชา :</label> <?php //echo "$s_login_username6" ?><br><br>

        <label>ชื่อผู้ใช้งาน :</label> <?php// echo "$s_login_username7" ?><br><br>

        <label>รหัสผ่าน :</label> <?php //echo "$s_login_username8" ?><br><br> -->
        

        <label>คำนำหน้าชื่อ : </label> <?php echo $row['titlename']; ?> 
        <label>ชื่อ : </label > <?php echo $row['fname']; ?> &nbsp&nbsp&nbsp&nbsp 
        <label>นามสกุล : </label> <?php echo $row['lname']; ?><br><br>
        <label>ที่อยู่ : </label> <?php echo $row['address']; ?><br><br>
        <label>เบอร์โทรศัพท์ : </label> <?php echo $row['tel']; ?> <br><br>
        <label>อีเมล์ : &nbsp</label> <?php echo $row['email']; ?>&nbsp&nbsp&nbsp&nbsp
        <label>สาขาวิชา : &nbsp</label> <?php echo $row['major']; ?><br><br>
        <!-- <label>ชื่อผู้ใช้งาน : &nbsp</label> <?php // echo $row['username']; ?>&nbsp&nbsp&nbsp&nbsp
        <label>รหัสผ่าน : &nbsp</label> <?php // echo $row['userpassword']; ?><br><br> -->
        
        <a class="edit-memberid" 
                data-memberid="<?php echo $row['memberid']; ?>" 
                data-titlenameid="<?php echo $row['titlenameid']; ?>" 
                data-fname="<?php echo $row['fname']; ?>"
                data-lname="<?php echo $row['lname']; ?>"
                data-address="<?php echo $row['address']; ?>"
                data-tel="<?php echo $row['tel']; ?>"
                data-email="<?php echo $row['email']; ?>"
                data-majorid="<?php echo $row['majorid']; ?>"
                data-username="<?php echo $row['username']; ?>"
                data-userpassword="<?php echo $row['userpassword']; ?>"
                 >
        <button type="submit" class="btn btn-success" >
        <!-- <a href="edit_member.php?id= <?php // echo $row['memberid']; ?>" style="color: white"> -->
            <span class="glyphicon glyphicon-edit" aria-hidden="true">
        แก้ไขข้อมูลส่วนตัว</span>
        </button>
        </a>

        

		<?php  }
	//}

		mysqli_free_result($result)	;
//		mysqli_close($conn);

		  ?>
                            
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

<form action="update_member.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
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

            <input type="hidden" name="memberid" id="memberid" >

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

            <hr width="95%" style="border-top: 1px solid gray">

            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>ชื่อผู้ใช้งาน : </label>
            <input type="text" name="username" id="username" class="form-control" readonly="" />
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



    <?php include ('script_member.php'); ?>


    <script type="text/javascript">
        $('.edit-memberid').click(function() { 
            var memberid = $(this).attr('data-memberid');
            var titlenameid = $(this).attr('data-titlenameid');
            var fname = $(this).attr('data-fname');
            var lname = $(this).attr('data-lname');
            var address = $(this).attr('data-address');
            var tel = $(this).attr('data-tel');
            var email = $(this).attr('data-email');
            var majorid = $(this).attr('data-majorid');
            var username = $(this).attr('data-username');
            var userpassword = $(this).attr('data-userpassword');

            $("#memberid").val(memberid);
            $("#titlenameid").val(titlenameid);
            $("#fname").val(fname);
            $("#lname").val(lname);
            $("#address").val(address);
            $("#tel").val(tel);
            $("#email").val(email);
            $("#majorid").val(majorid);
            $("#username").val(username);
            $("#userpassword").val(userpassword);
            $("#myModal2").modal('show');

        });

    </script>
    

</body>

</html>
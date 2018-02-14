<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <?php include ('css.php'); ?>
    <link href="https://fonts.googleapis.com/css?family=Kanit:300" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap-3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../vendor/font-awesome-4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/csss.css">
    <script type="text/javascript" src="../js/jquery-1.12.4.min.js"></script>
    <meta charset="utf-8">
    
    <style type="text/css">
        .navbar-default .navbar-nav>li>a {
    color: #861c20;
}
.navbar-default .navbar-nav>li>a:hover {
    color: #fff;
    background-color:#861c20;
    border-radius: 50px;
}
.box {
  box-shadow: 3px 5px 17px -2px #cecece;
  height: 90px;
}
.x5 ul {
    text-align: right;
    padding: 11px;
}

    </style>
</head>
<body>

<!-- <div class="container-fluid" > -->
    <div class="row" style="background-color:#006600;">
        <div class="container">
            <div class="row">
                <div class="x1 text-center" >
                    <p style="color: white; padding-top: 20px; font-size: 30px; margin-top: -16px;">ระบบยืม-คืมเล่มโครงงานการศึกษาเอกเทศ</p>
                    <p style="color: white; font-size: 20px; margin-top: -15px;">หลักสูตรสาขาวิทยาการคอมพิวเตอร์ และหลักสูตรสาขาวิชาเทคโนโลยีสารสนเทศ</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row box" style="background-color: #FFFF33;height: 60px" >
    <br>
    <marquee direction="left">
    <img src = "uru.gif" width="25px" height="30px" border="1">&nbsp;
    ระบบยืม-คืมเล่มโครงงานการศึกษาเอกเทศ หลักสูตรสาขาวิทยาการคอมพิวเตอร์ และหลักสูตรสาขาวิชาเทคโนโลยีสารสนเทศ
    &nbsp;<img src = "uru.gif" width="25px" height="30px" border="1">
    </marquee>
        <div class="container re">
            <div class="row">
            <!-- <nav class="navbar navbar-default"> -->
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button> 
                 <!--  <a class="navbar-brand" href="#">  --><!-- เเก้ไข logo -->
                    <!-- <img src="logo8.png" style="position: static; margin-top: -102px; margin-left: 137px;"> -->
                  <!-- </a> -->
                </div>

    <!-- เมนู -->
    <!-- <div class="collapse navbar-collapse x1" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right" style="margin-top: -57px;">
        <li><a href="index.php" style="font-size: 18px; left: -457px; padding-top: 10px; padding-bottom: 10px; top: 76px;"><i class="glyphicon glyphicon-home"></i> หน้าแรก</a></li> -->

            <!-- <li><a href="index6.php" style="font-size: 18px; left: -365px; padding-top: 10px; padding-bottom: 10px; top: 76px;">ปฏิทินกิจกรรมชุมนุม</a></li> -->
      </ul>
    </div>
  </div>
<!-- </nav> -->
            </div>
        </div>
    </div>

<div class="container">
    <div class="" style="margin-top:30px;">
        <div class="col-lg-9"><!-- เนื้อหา-->
        
<!-- ตาราง -->
  <!-- <div class="row"> -->
                

                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                          
                          <center><b>  สุดยอดเล่มโครงงาน </b></center>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                   <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr class="header">
            
                                        <th hidden class="center" width="17%">เลขที่เล่มโครงงาน </th>
                                        <th class="center" width="45%">ชื่อโครงงาน </th>
                                        <th class="center" width="20%">ผู้จัดทำ </th>
                                        <th class="center" width="11%">รายละเอียด </th>
                                        <!-- <th class="center" width="15%">ยืมเล่มโครงงาน </th> -->
                                        
                                        <th class="center" width="11%" hidden>อาจารย์ที่ปรึกษา </th>            
                                    </tr>
                                </thead>

                        <tbody>
                            
                            <?php

include 'connect_book.php';

$sql = "SELECT * FROM `book`
INNER JOIN bookstatus ON book.bookstatusid=bookstatus.bookstatusid
INNER JOIN student ON book.studentid=student.studentid
INNER JOIN advisor ON book.advisorid=advisor.advisorid ORDER BY bookid DESC";

$result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {

            // $bookid=$row['bookid'];
            // $sql1 = "SELECT * FROM `bookborrow` where bookid = $bookid  and statusbook = 0";
            // $result1 = mysqli_query($conn, $sql1);
            // $rowcount=mysqli_num_rows($result1);
        ?>
        <!-- <?php // if($rowcount==0) { ?> -->

        <tr>
            <td hidden><?php // echo $sql1; ?><?php  echo $row['bookid']; ?></td>
            <td><?php echo $row['booknamethai']; ?><input type="hidden" name="" value="<?php  echo $row['bookid']; ?>"></td>
            <td ><?php  echo $row['fname_stu']; ?> <?php  echo $row['lname_stu']; ?></td>
            <td>
                <center><button class="btn btn-info" style="background-color: #FFFF00">
                    <a href="detail_book_first_page.php?bookid=<?php echo $row["bookid"]?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true" ></span>
                    </a></button>
                </center>
            </td>
            <!-- <td>
                <center><button class="btn btn-info" style="background-color: #33CC33">
                    <a href="pj_borrow.php?bookid=<?php // echo $row["bookid"]?>"><span class="fa fa-book fa-lg" aria-hidden="true"></span>
                    </a></button>
                </center>
            </td> -->
            
            <td hidden><?php  echo $row['fname']; ?></td>
        </tr>

        <?php  }
        ?> 
         
                        </tbody>

                            </table>
                            </div>
                    </div>
                </div>
            </div>



            
        </div> <!-- end -->
        <div class="col-lg-3" style="background-color: #F7F7F7;   padding: 0px 20px 10px;
    margin: 0 auto 20px;

    /* shadows and rounded borders */
    /*-moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);*/
    "><!-- เมนู-->

<div class="panel panel-success">
        <div class="panel-heading">
                <div class="panel-body">

        <!-- login -->
        <div class="col-xs-12 text-center " >
                                <p style="color: #882023;font-size: 16px;">เข้าสู่ระบบ</p>
                            
                            <hr style="margin-top: 10px; "> 
                                
                            </div>
                                <form action="insert_login_staff.php" style="display: block;" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
                                    <div class="form-group">
                                        <input type="text" placeholder="ชื่อผู้ใช้งาน" class="form-control" name="username" id="username" size="15" maxlength="15">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="รหัสผ่าน" class="form-control" name="userpassword" id="userpassword" size="30" maxlength="30">
                                    </div>
                                        <script language="javascript">

                                        function fncSubmit() {
                                          if(document.form1.username.value == "") {
                                        alert('กรุณากรอกชื่อผู้ใช้งาน');
                                        document.form1.username.focus();
                                        return false;
                                        }  
                                          if(document.form1.userpassword.value == "") {
                                        alert('กรุณากรอกรหัสผ่าน');
                                        document.form1.userpassword.focus();       
                                        return false;
                                        }  
                                        document.form1.submit();
                                        }

                                        </script>
                                <!--    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Remember Me</label>
                                    </div> -->
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3 text-center">
                                                <button type="submit" class="btn btn-success" >เข้าสู่ระบบ</button>

                                            </div><br><br><br>
                                            <center>
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
                                                data-typememberid="<?php echo $row['typememberid']; ?>" >
                                            <!-- <a href="pj_signup.php"> -->ลงทะเบียน</a> | <a href="index1.php">สมาชิก</a>
                                            </center>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="" tabindex="5" class="forgot-password">ลืมรหัสผ่าน?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                </form>
        
                </div>
        </div>
</div>


<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ลงทะเบียน</h4>
        </div>
        <div class="modal-body">

<form  action="insert_signup.php" method="post" name="form2" onSubmit="JavaScript:return fncSubmit();" >

            
            <label >ข้อมูลส่วนตัว</label><br>
            
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>คำนำหน้าชื่อ : </label>
            <?php 
                  $sql = "SELECT * FROM `titlename`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select name="titlenameid" id="titlenameid" class="form-control" >
            <option value="">คำนำหน้าชื่อ</option> 
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                  }
            ?>
            </select>
            </div>

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
            <label>สาขาวิชา : </label>
            <?php 
                  $sql = "SELECT * FROM `major`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select name="majorid" id="majorid" class="form-control" >
            <option value="">สาขาวิชา</option> 
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                  }
            ?>
            </select>
            </div>
            
            <div class="col-lg-4">
            <label>ประเภทสมาชิก : </label>
            <?php 
                  $sql = "SELECT * FROM `typemember`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select name="typememberid" id="typememberid" class="form-control" >
            <option value="">ประเภทสมาชิก</option> 
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                  }
            ?>
            </select>
            </div>
            </div>

            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>ที่อยู่ : </label><br>
            <textarea type="text" name="address" id="address" class="form-control" style="width: 850px;height: 80px"></textarea>
            </div>
            </div>                 
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>เบอร์โทรศัพท์ : </label>
            <input type="text1" name="tel" id="tel" class="form-control" />
            </div>
            
            <div class="col-lg-4">
            <label>อีเมล์ : </label>
            <input type="email" name="email" id="email" class="form-control" />
            </div>
            </div>
            <br>

            <hr width="95%" size="20" color="black">

            <label>กรอกชื่อผู้ใช้และรหัสผ่านเพื่อเข้าใช้งานระบบ</label><br>
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>ชื่อผู้ใช้งาน : </label>
            <input type="text1" name="username" id="username" class="form-control" />
            </div>
            
            <div class="col-lg-4">
            <label>รหัสผ่าน : </label>
            <input type="password" name="userpassword" id="userpassword" class="form-control" />
            </div>
            </div>

            </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" >บันทึก</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>

   <!-- </div> -->
            

        </div>
    </div>

<br><br>
<!-- footer -->
<!-- <div class="row s wrapper footer" style="background-color:#006600;padding-bottom: 20px;margin-bottom: -10px;position:relative;">
        <div class="container">
         <div class="row">
            <div class="footer" style="margin-top:5px;">
            <div class="col-lg-12">
                    <ul>
                        <li style="color: white">โรงเรียนแม่จริม 28 หมู่ 4 ถนนน่าน-แม่จริม ตำบลหนองแดง อำเภอแม่จริม จังหวัดน่าน 55170 โทรศัพท์: 054-769-057</li>

                    </ul>
                        </div>
                </div>
                </div>
        </div>
                
</div> -->          
<script type="text/javascript" src="../vendor/bootstrap-3.3.6/js/bootstrap.min.js"></script>
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
            var typememberid = $(this).attr('data-typememberid');

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
            $("#typememberid").val(typememberid);
            $("#myModal2").modal('show');
        });

    </script>

<!-- <script language="javascript">

function fncSubmit() {
  if(document.form2.titlenameid.value == "") {
alert('กรุณากรอกคำนำหน้าชื่อ');
document.form2.titlenameid.focus();
return false;
}  

  if(document.form2.fname.value == "") {
alert('กรุณากรอกชื่อ');
document.form2.fname.focus();
return false;
}  

  if(document.form2.lname.value == "") {
alert('กรุณากรอกนามสกุล');
document.form2.lname.focus();
return false;
}  

  if(document.form2.majorid.value == "") {
alert('กรุณากรอกสาขาวิชา');
document.form2.majorid.focus();
return false;
}  

  if(document.form2.typememberid.value == "") {
alert('กรุณากรอกประเภทสมาชิก');
document.form2.typememberid.focus();
return false;
}

  if(document.form2.address.value == "") {
alert('กรุณากรอกที่อยู่');
document.form2.address.focus();
return false;
}   

  if(document.form2.tel.value == "") {
alert('กรุณากรอกเบอร์โทรศัพท์');
document.form2.tel.focus();
return false;
}  

  if(document.form2.email.value == "") {
alert('กรุณากรอกอีเมล์');
document.form2.email.focus();
return false;
}  

  if(document.form2.username.value == "") {
alert('กรุณากรอกชื่อผู้ใช้งาน');
document.form2.username.focus();
return false;
}  
  if(document.form2.userpassword.value == "") {
alert('กรุณากรอกรหัสผ่าน');
document.form2.userpassword.focus();       
return false;
}  
document.form2.submit();
}

</script> -->


</body>
</html>
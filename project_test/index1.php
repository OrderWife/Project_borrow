<?php 
session_start();
include 'connect_book.php';

$sql3 = "SELECT * FROM `bookborrow`
LEFT JOIN book ON bookborrow.bookid=book.bookid
LEFT JOIN member ON bookborrow.memberid=member.memberid";
$result3 = mysqli_query($conn, $sql3);


?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <?php include ('css.php'); ?>
    <?php include ('datatable_member.php') ?>
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
div[class=img]{
    background-image: url("PUM2.png");
}
#dataTables-example_filter {
    display: none;
}
#dataTables-example_length{
    display: none;
}
    </style>




</head>
<body>

<!-- <div class="container-fluid" > -->
    <div class="row" style="background-color:#006600;">
        <div class="container">
            <div class="row">
                <div class="x1 text-center" >
                    <p style="color: white; padding-top: 20px; font-size: 30px; margin-top: -16px;"><img src = "uru.gif" "PUM2.jpg" width="25px" height="30px" border="1">&nbsp;ระบบยืม-คืมเล่มโครงงานการศึกษาเอกเทศ&nbsp;<img src = "uru.gif" "PUM2.jpg" width="25px" height="30px" border="1"></p>
                    <p style="color: white; font-size: 20px; margin-top: -15px;">หลักสูตรสาขาวิทยาการคอมพิวเตอร์ และหลักสูตรสาขาวิชาเทคโนโลยีสารสนเทศ</p>
                </div>
            </div>
        </div>
    </div>

<!--     <div class="row box" style="background-color: #FFFF33;height: 60px" >
    <br>
    <marquee direction="left">
    <img src = "uru.gif" "PUM2.jpg" width="25px" height="30px" border="1">&nbsp;
    ระบบยืม-คืมเล่มโครงงานการศึกษาเอกเทศ หลักสูตรสาขาวิทยาการคอมพิวเตอร์ และหลักสูตรสาขาวิชาเทคโนโลยีสารสนเทศ
    &nbsp;<img src = "uru.gif" width="25px" height="30px" border="1">
    </marquee>
        <div class="container re">
            <div class="row"> -->
            <!-- <nav class="navbar navbar-default"> -->
              <!-- <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>  -->

<!--                 </div>

      </ul>
    </div>
  </div> -->
<!-- </nav> -->
            </div>
        </div>
    </div>
<div class="img" >
<div class="container">
    <div class="" style="margin-top:30px;">
        <div class="col-lg-9"><!-- เนื้อหา-->
        
<!-- ตาราง -->
  <!-- <div class="row"> -->
                
                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                          
                          <center><b>  รายการเล่มโครงงานล่าสุด </b></center>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="padding-top: 0px;">

                <form action="index1.php" method="post" ">
                <!-- <br><input type="text" id="myInput" onkeyup="myFunction()"  placeholder="ค้นหาเล่มโครงงาน.." title="Type in a name"> -->
                <!-- </form> -->
                <!-- <br> --><br>
                

                   <table width="100%" class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr class="header">
            
                                        <th hidden "><center>เลขที่เล่มโครงงาน</center> </th>
                                        <th><center>ชื่อโครงงาน</center> </th>
                                        <th style="width: 25%"><center>อาจารย์ที่ปรึกษา</center> </th>
                                        <th style="width: 20%"><center>เพิ่มเมื่อ</center> </th>
                                        <!-- <th style="padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 0px;width: 70px;"><center>ปี พ.ศ.</center> </th> -->
                                        <!-- <th style="padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 0px;width: 70px;"><center>การยืม(ครั้ง)</center></th>
                                        <th style="padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 0px;width: 70px;"><center>สถานะ</center> </th> -->
                                        <!-- <th style="padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 0px;width: 70px;"><center>รายละเอียด</center> </th>   -->         
                                    </tr>
                                </thead>

                        <tbody>
                            
                            <?php

include 'connect_book.php';

$sql = "SELECT * FROM `book`
INNER JOIN advisor ON book.advisorid=advisor.advisorid
INNER JOIN booktype ON book.booktypeid=booktype.booktypeid 
INNER JOIN titlename ON advisor.titlenameid=titlename.titlenameid 
ORDER BY  `book`.`time` DESC LIMIT 5";

$result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>

        <tr>
            <?php 

                // $theBorrow = date("d-m-",strtotime($row['borrowdate'])).date(date("Y",strtotime($row['borrowdate']))+543);
                // $theReturn = date("d-m-",strtotime($row['returndate'])).date(date("Y",strtotime($row['returndate']))+543);
            $time = date("d-m-",strtotime($row['time'])).date(date("Y",strtotime($row['time'])));

            ?>

            <td hidden><?php // echo $sql1; ?><?php  echo $row['bookid']; ?></td>

            <td><a href="detail_book_first_page.php?bookid=<?php echo $row["bookid"]?>">
            <?php echo $row['booknamethai']; ?>
            <input type="hidden" name=""
             value="<?php  echo $row['bookid']; ?>.
             <?php  echo $row['bookid']; ?>.
             <?php  echo $row['student']; ?>.
             <?php  echo $row['fname']; ?>.
             <?php  echo $row['lname']; ?>.
             <?php  echo $row['booktype']; ?>.
             <?php  echo $row['statusbook']; ?>">
            </td>

            <td ><?php  echo $row['titlename']; ?> <?php  echo $row['fname']; ?> <?php  echo $row['lname']; ?></td>

            <td align="center"><?php  echo DateThai($time); ?></td>

            <!-- <td ><?php // echo $row['year']+543; ?> </td> -->
<!-- 
            <td align="center">
            <?php
                // include 'connect_book.php';
                
                // $bookid = $row['bookid'];
                // $sql2 = "SELECT * FROM `bookborrow` WHERE bookid = $bookid  ";
                // $result2 = mysqli_query($conn, $sql2);
                // $rowcount2=mysqli_num_rows($result2);
            ?>
            <?php // echo $row['num']; ?>
            </td> -->

            <!-- <td align="center">
                <?php 
                  $sql3 = "SELECT * FROM `bookborrow` WHERE bookid = $bookid  ";
                  $result3 = mysqli_query($conn, $sql3);
                  $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
                ?> 

                    <?php if($row3['statusbook']=='0') { ?>
                    <a style="color: red">ค้างส่ง</a>
                    <?php } ?>
                    
                    <?php if($row3['statusbook']=='' || $row3['statusbook']=='1') { ?>
                    <a style="color: green">ยืมได้</a>      
                    <?php } ?>
            </td>  -->        

          <!--   <td>
                <center>
                        <a href="detail_book_first_page.php?bookid=<?php echo $row["bookid"]?>">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true" ></span>
                        </a>
                </center>
            </td> -->            
        </tr>

        <?php } ?> 
        </table> 
         </form>
                        </tbody>
                            <!-- </table> -->
                            </div>
                    </div>
                </div>
            </div>



            
        </div> <!-- end -->
        <div class="col-lg-3" style="background-color: #F7F7F7;   padding: 0px 20px 10px;
    margin: 0 auto 20px;">

    <!-- เมนู-->
<div class="panel panel-success">
        <div class="panel-heading">
                <div class="panel-body">

        <!-- login -->
        <div class="col-xs-12 text-center " >
                                <p style="color: #882023;font-size: 14px;">เข้าสู่ระบบ | 
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
                                สมัครสมาชิก</a>
                                </p>
                            
                            <hr style="margin-top: 10px; "> 
                                
                            </div>
                                <form action="insert_login.php" style="display: block;" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
                                    <div class="form-group">
                                        <input type="text" placeholder="ชื่อผู้ใช้งาน" class="form-control" name="username_log" id="username_log" size="15" required=""  >
                                    </div>
                                    <div class="form-group">
                                        <input type="password" placeholder="รหัสผ่าน" class="form-control" name="userpassword_log" id="userpassword_log" size="30" maxlength="30" required="">
                                    </div>

                                    <label for="t1"><input type="radio" checked="" id="t1" name="acc" value="member"> &nbspสมาชิก</label> 
                                    <br>
                                    
                                    <label for="t2"><input type="radio" name="acc" id="t2" value="staff"> &nbspเจ้าหน้าที่</label>
                                    <br><br>
                                      
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3 text-center">
                                                <button type="submit" class="btn btn-success" >เข้าสู่ระบบ</button>

                                            </div><br>
                                            

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
          <h4 class="modal-title">สมัครสมาชิก</h4>
        </div>
        <div class="modal-body">

<form  action="insert_signup.php" method="post" name="form2" onSubmit="return chkString();"  >

            
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
            <input type="text" name="fname" id="fname" class="form-control fmsfname" onKeyPress="return bannedKey(event,this.value)" required="" autocomplete="off" />
            <label class="label label-danger fname" style="font-size:11px;visibility:hidden;"></label>
            </div>

            <div class="col-lg-4">
            <label>นามสกุล : </label>
            <input type="text" name="lname" id="lname" class="form-control fmslname" onKeyPress="return bannedKey(event,this.value)" required="" autocomplete="off" />
            <label class="label label-danger lname" style="font-size:11px;visibility:hidden;"></label>
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
            <select name="typememberid" id="typememberid" class="form-control" required="" >
            <option value="">ประเภทสมาชิก</option> 
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                  }
            ?>
            </select>
            </div>
            <!-- </div> -->

            <!-- <div class="row" style="margin-left: 0px;margin-bottom: 15px"> -->
            <div class="col-lg-4">
            <label>ที่อยู่ : </label><br>
            <textarea type="text" name="address" id="address" class="form-control" autocomplete="off" ></textarea>
            </div>
            </div>                 
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>เบอร์โทรศัพท์ : </label>
            <input type="text" name="tel" id="tel" class="form-control" onkeyup="autoTab2(this,2)" onKeyPress="return bannedKey2(event,this.value)" autocomplete="off" />
            </div>
            
            <div class="col-lg-4">
            <!-- <label>อีเมล์ : </label>
            <input type="email" name="email" id="email" class="form-control" /> -->


                        <label>อีเมล</label>
                        <input class="form-control fmsemail" type="email" name="email" autocomplete="off" >
                        <label class="label label-danger erremail" style="font-size:11px;visibility:hidden;"></label>


            </div>
            </div>

            <hr width="95%" size="20" color="black">

            <label>กรอกชื่อผู้ใช้และรหัสผ่านเพื่อเข้าใช้งานระบบ</label><br>
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4">
            <label>ชื่อผู้ใช้งาน : </label>
            <input type="text" name="username" id="username" class="form-control fmsusername" onKeyPress="return bannedKey1(event,this.value)" required="" autocomplete="off"/>
            <label class="label label-danger username" style="font-size:11px;visibility:hidden;"></label>
            <span id="sUser"></span>
            </div>
            
            <div class="col-lg-4">
            <label>รหัสผ่าน : </label>
            <input type="password" name="userpassword" id="userpassword" class="form-control fmsuserpassword" minlength="6" onKeyPress="return bannedKey1(event,this.value)" required="" />
            <label class="label label-danger userpassword" style="font-size:11px;visibility:hidden;"></label>
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
<div class="row s wrapper footer" style="background-color:#006600;padding-bottom: 20px;margin-bottom: -10px;position:relative;">
        <div class="container">
         <div class="row">
            <div class="footer" style="margin-top:5px;">
            <div class="col-lg-12">
                    <ul>
                        <br>
                        <li  style="color: white">
                        <img src = "uru.gif" width="30px" height="40px" border="1">&nbsp&nbsp
                        <img src = "uru80th.png" width="30px" height="40px" border="1">&nbsp&nbsp&nbsp
                        คณะวิทยาศาสตร์และเทคโนโลยี มหาวิทยาลัยราชภัฏอุตรดิตถ์ ตำบลท่าอิฐ อำเภอเมืองอุตรดิตถ์ จังหวัดอุตรดิตถ์ 53000 โทรศัพท์ : 055-416-601
                        </li>

                    </ul>
                        </div>
                </div>
                </div>
        </div>
                
</div>          
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


<!-- เช็คความยาวของรหัสผ่าน -->
<script language="JavaScript">
    function chkString()
    {
         if(document.form2.userpassword.value.length < 6 )
         {
            alert('กรุณาใส่รหัสผ่านอย่างน้อย 6 ตัวอักษร .');
            return false;
         }
    }
</script>


<script type="text/javascript"> //กำหนดตัวอักษร
function bannedKey(evt,str)
{
    var allowedEng = false; //อนุญาตให้คีย์อังกฤษ
    var allowedThai = true; //อนุญาตให้คีย์ไทย
    var allowedNum = false; //อนุญาตให้คีย์ตัวเลข
    
    var k;
    if (window.event) k = window.event.keyCode; // ใช้กับ IE
    else if (evt) k = evt.which; // ใช้กับ Firefox
    
    /* เช็คตัวเลข 0-9 */
    if (k>=48 && k<=57) { return allowedNum; }
    
    /* เช็คคีย์อังกฤษ a-z, A-Z */
    if ((k>=65 && k<=90) || (k>=97 && k<=122)) { return allowedEng; }
    
    /* เช็คคีย์ไทย ทั้งแบบ non-unicode และ unicode */
    if ((k>=161 && k<=255) || (k>=3585 && k<=3675)) { return allowedThai; }
    
    /* เช็ค "." กรณีอนุญาติให้กรอกเฉพาะตัวเลข ให้สามารถใส่ . ได้ 1 ตัวเท่าันั้น */
    if (!allowedEng && !allowedThai && allowedNum){
    for(i=0;i<str.length;i++){
        if(str[i]=="."){ if(k!=46){return true}else{return false} }
    }
    }
}
</script>


<script type="text/javascript"> //กำหนดตัวอักษร
function bannedKey1(evt,str)
{
    var allowedEng = true; //อนุญาตให้คีย์อังกฤษ
    var allowedThai = false; //อนุญาตให้คีย์ไทย
    var allowedNum = true; //อนุญาตให้คีย์ตัวเลข
    
    var k;
    if (window.event) k = window.event.keyCode; // ใช้กับ IE
    else if (evt) k = evt.which; // ใช้กับ Firefox
    
    /* เช็คตัวเลข 0-9 */
    if (k>=48 && k<=57) { return allowedNum; }
    
    /* เช็คคีย์อังกฤษ a-z, A-Z */
    if ((k>=65 && k<=90) || (k>=97 && k<=122)) { return allowedEng; }
    
    /* เช็คคีย์ไทย ทั้งแบบ non-unicode และ unicode */
    if ((k>=161 && k<=255) || (k>=3585 && k<=3675)) { return allowedThai; }
    
    /* เช็ค "." กรณีอนุญาติให้กรอกเฉพาะตัวเลข ให้สามารถใส่ . ได้ 1 ตัวเท่าันั้น */
    if (!allowedEng && !allowedThai && allowedNum){
    for(i=0;i<str.length;i++){
        if(str[i]=="."){ if(k!=46){return true}else{return false} }
    }
    }
}
</script>


<script type="text/javascript"> //กำหนดตัวอักษร
function bannedKey2(evt,str)
{
    var allowedEng = false; //อนุญาตให้คีย์อังกฤษ
    var allowedThai = false; //อนุญาตให้คีย์ไทย
    var allowedNum = true; //อนุญาตให้คีย์ตัวเลข
    
    var k;
    if (window.event) k = window.event.keyCode; // ใช้กับ IE
    else if (evt) k = evt.which; // ใช้กับ Firefox
    
    /* เช็คตัวเลข 0-9 */
    if (k>=48 && k<=57) { return allowedNum; }
    
    /* เช็คคีย์อังกฤษ a-z, A-Z */
    if ((k>=65 && k<=90) || (k>=97 && k<=122)) { return allowedEng; }
    
    /* เช็คคีย์ไทย ทั้งแบบ non-unicode และ unicode */
    if ((k>=161 && k<=255) || (k>=3585 && k<=3675)) { return allowedThai; }
    
    /* เช็ค "." กรณีอนุญาติให้กรอกเฉพาะตัวเลข ให้สามารถใส่ . ได้ 1 ตัวเท่าันั้น */
    if (!allowedEng && !allowedThai && allowedNum){
    for(i=0;i<str.length;i++){
        if(str[i]=="."){ if(k!=46){return true}else{return false} }
    }
    }
}
</script>


<script type="text/javascript">
                      $(document).ready(function() {
                        var letters_email = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                        var chkUs_email = 0
                        $('#insertstd').submit(function(e) {
                            if (chkUs_email == 0) {
                                e.preventDefault()
                            }
                        })
                        $('.fmsemail').on('keyup',function(){
                          chkUs_email = 0;
                          if($(this).val()!=""){

                              if(letters_email.test($(this).val())===true){
                                chkUs_email = 1;
                                $('.erremail').css('visibility','hidden');
                              }else{
                                $('.erremail').css('visibility','visible');
                                $('.erremail').html('กรุณากรอกอีเมลตามรูปแบบ xxx@xxx.xxx เท่านั้น');
                              }
                          }else{
                            $('.erremail').css('visibility','visible');
                            $('.erremail').html('กรุณากรอกข้อมูล');
                          }
                        });
                      });
                      </script>

<script type="text/javascript">
                      $(document).ready(function() {
                        var letters_fname = /^[A-Za-z]$/;
                        var chkUs_fname = 0
                        $('#insertstd').submit(function(e) {
                            if (chkUs_fname == 0) {
                                e.preventDefault()
                            }
                        })
                        $('.fmsfname').on('keyup',function(){
                          chkUs_fname = 0;
                          if($(this).val()!=""){

                            $('.fname').css('visibility','hidden');
                          }else{
                            $('.fname').css('visibility','visible');
                            $('.fname').html('กรุณากรอกข้อมูล');
                          }
                        });
                      });
                      </script>


<script type="text/javascript">
                      $(document).ready(function() {
                        var letters_lname = /^[A-Za-z]$/;
                        var chkUs_lname = 0
                        $('#insertstd').submit(function(e) {
                            if (chkUs_lname == 0) {
                                e.preventDefault()
                            }
                        })
                        $('.fmslname').on('keyup',function(){
                          chkUs_lname = 0;
                          if($(this).val()!=""){

                            $('.lname').css('visibility','hidden');
                          }else{
                            $('.lname').css('visibility','visible');
                            $('.lname').html('กรุณากรอกข้อมูล');
                          }
                        });
                      });
                      </script>


<script type="text/javascript">
                      $(document).ready(function() {
                        var letters_username = /^[A-Za-z]$/;
                        var chkUs_username = 0
                        $('#insertstd').submit(function(e) {
                            if (chkUs_username == 0) {
                                e.preventDefault()
                            }
                        })
                        $('.fmsusername').on('keyup',function(){
                          chkUs_username = 0;
                          if($(this).val()!=""){

                            $('.username').css('visibility','hidden');
                          }else{
                            $('.username').css('visibility','visible');
                            $('.username').html('กรุณากรอกข้อมูล');
                          }
                        });
                      });
                      </script>


<script type="text/javascript">
                      $(document).ready(function() {
                        var letters_userpassword = /^[A-Za-z]$/;
                        var chkUs_userpassword = 0
                        $('#insertstd').submit(function(e) {
                            if (chkUs_userpassword == 0) {
                                e.preventDefault()
                            }
                        })
                        $('.fmsuserpassword').on('keyup',function(){
                          chkUs_userpassword = 0;
                          if($(this).val()!=""){

                            $('.userpassword').css('visibility','hidden');
                          }else{
                            $('.userpassword').css('visibility','visible');
                            $('.userpassword').html('กรุณากรอกรหัสผ่านอย่างน้อย 6 ตัวอักษร');
                          }
                        });
                      });
                      </script>

<!-- CHECK TEL -->
<script type="text/javascript">
function autoTab2(obj,typeCheck){    
            var pattern=new String("___-___-____"); // กำหนดรูปแบบในนี้
            var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้                 
        var returnText=new String("");
        var obj_l=obj.value.length;
        var obj_l2=obj_l-1;
        for(i=0;i<pattern.length;i++){           
            if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
                returnText+=obj.value+pattern_ex;
                obj.value=returnText;
            }
        }
        if(obj_l>=pattern.length){
            obj.value=obj.value.substr(0,pattern.length);           
        }
}
</script>

    <script type="text/javascript">
$(document).ready(function(){

   $("#username,#email").change(function(){

         $("#sUser").empty();
         $("#sEmail").empty();

         $.ajax({ 
            url: "check_username.php" ,
            type: "POST",
            data: 'sUser=' +$("#username").val()+'&eMail='+$("#email").val()
         })
         .success(function(result) { 

               var obj = jQuery.parseJSON(result);

               if(obj != '')
               {
                    $.each(obj, function(key, inval) {

                           if($("#username").val() == inval["username"])
                          {
                              $("#sUser").html(" <font color='red'>ชื่อมีอยู่แล้ว</font>");
                          }

                           if($("#email").val() == inval["email"])
                          {
                              $("#sEmail").html(" <font color='red'>อีเมล์นี้มีอยู่แล้ว</font>");
                          }

                    });
               }

         });

      });
   });
</script>




    <?php
                function DateThai($strDate)
                {
                    $strYear = date("Y",strtotime($strDate))+543;
                    $strMonth= date("n",strtotime($strDate));
                    $strDay= date("j",strtotime($strDate));
                    $strHour= date("H",strtotime($strDate));
                    $strMinute= date("i",strtotime($strDate));
                    $strSeconds= date("s",strtotime($strDate));
                    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                    $strMonthThai=$strMonthCut[$strMonth];
                    return "$strDay $strMonthThai $strYear";
                }

                $time = $row['time'];
                $theReturn = $row['returndate'];
                // echo "ThaiCreate.Com Time now : ".DateThai($strDate);
            ?>


</body>
</html>
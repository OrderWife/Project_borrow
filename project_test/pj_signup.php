<?php 
include 'connect_book.php';

?>	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>ระบบการยืม-คืนเล่มโครงงานการศึกษาเอกเทศ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
body {
    margin: 0 auto;
    width: 60%;

}

.w3-example {

    background-color: #DCDCDC;
    padding: 0.01em 16px;
    margin: 20px 0;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
}

.w3-code {
    width: auto;
    background-color: #fff;
    padding: 8px 12px;
    word-wrap: break-word;
}

.w3-section, .w3-code {
    margin-top: 16px!important;
    margin-bottom: 16px!important;
}

h3,h2 {
    font-family: "Segoe UI",Arial,sans-serif;
    font-weight: 400;
    margin: 10px 0;
}

input[type=text],input[type=email]{
    width: 27%;
    padding: 6px 6px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

select,input[type=text1],input[type=email],input[type=password]{
    width: 30%;
    padding: 6px 6px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

select[name=titlenameid]{
    width: 27%;
    padding: 6px 6px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}


 textarea {
    width: 97%;
    height: 70px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #FFF;
    font-size: 16px;
    resize: none;
}
.B{
    font-size: 16px;
    font-weight:bold;
}

hr{
    height: 1px;
}
button[type=submit]{
    width: 10%;
}
</style>

</head>
<body>
<script language="javascript">

function fncSubmit() {
  if(document.form1.titlenameid.value == "") {
alert('กรุณากรอกคำนำหน้าชื่อ');
document.form1.titlenameid.focus();
return false;
}  

  if(document.form1.fname.value == "") {
alert('กรุณากรอกชื่อ');
document.form1.fname.focus();
return false;
}  

  if(document.form1.lname.value == "") {
alert('กรุณากรอกนามสกุล');
document.form1.lname.focus();
return false;
}  

  if(document.form1.majorid.value == "") {
alert('กรุณากรอกสาขาวิชา');
document.form1.majorid.focus();
return false;
}  

  if(document.form1.typememberid.value == "") {
alert('กรุณากรอกประเภทสมาชิก');
document.form1.typememberid.focus();
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

<div class="w3-example">
<h3 align="center">ลงทะเบียนเข้าใช้งาน</h3>
  <div class="w3-code notranslate htmlHigh">
	<form  action="insert_signup.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();" >

            <center>
			<label class="B" >ข้อมูลส่วนตัว</label><br>
            </center>

            <?php 
                  $sql = "SELECT * FROM `titlename`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select name="titlenameid" id="titlenameid" >
            <option value="">คำนำหน้าชื่อ</option> 
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                  }
            ?>
            </select>&nbsp &nbsp

		
            <label>ชื่อ : </label>
            <input type="text" name="fname" id="fname" />&nbsp &nbsp

            <label>นามสกุล : </label>
            <input type="text" name="lname" id="lname" /><br>            

            <label>สาขาวิชา : </label>
            <?php 
                  $sql = "SELECT * FROM `major`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select name="majorid" id="majorid" >
            <option value="">สาขาวิชา</option> 
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                  }
            ?>
            </select>&nbsp &nbsp
            
            <label>ประเภทสมาชิก : </label>
            <?php 
                  $sql = "SELECT * FROM `typemember`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select name="typememberid" id="typememberid" >
            <option value="">ประเภทสมาชิก</option> 
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                  }
            ?>
            </select><br>


            <label>ที่อยู่ : </label><br>
            <textarea type="text" name="address" id="address"></textarea><br>                 
            
            <label>เบอร์โทรศัพท์ : </label>
            <input type="text1" name="tel" id="tel" />&nbsp &nbsp

            <label>อีเมล์ : </label>
            <input type="email" name="email" id="email" /><br>
<center>
            <hr width="95%" size="20" color="black">

            <label class="B">กรอกชื่อผู้ใช้และรหัสผ่านเพื่อเข้าใช้งานระบบ</label><br>

            <label>ชื่อผู้ใช้งาน : </label>
            <input type="text1" name="username" id="username" />&nbsp &nbsp<br>

            <label>รหัสผ่าน : </label>
            <input type="password" name="userpassword" id="userpassword" /><br><br><br>
</center>

            
		    <center><button type="submit" class="btn btn-success"  >บันทึก</button><br><br>
            <a href="pj_login.php">กลับสู่หน้าหลัก</a></center>
<!--            <a class="btt-save" type="button" onclick="window.location='pj_member.php';" >Cancel</a> -->
	</form>
  </div>
</div>

</body>
</html>
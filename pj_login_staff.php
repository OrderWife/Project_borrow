<?php 
session_start();
include 'connect_book.php';

?>	
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>ระบบการยืม-คืนเล่มโครงงานการศึกษาเอกเทศ</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  <?php include('css_login.css'); ?>
</style>
<br><br>
</head>
<body>

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


<div class="w3-example">
<h3 align="center">เข้าสู่ระบบ(สำหรับเจ้าหน้าที่)</h3>
  <div class="w3-code notranslate htmlHigh">
	<form  action="insert_login_staff.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();" >
                  		
            <label>ชื่อผู้ใช้งาน : </label><br>
            <input type="text1" name="username" id="username" /><br><br>

            <label>รหัสผ่าน : </label><br>
            <input type="password" name="userpassword" id="userpassword" /><br><br><br>            
                        
		    <center>
            <button type="submit" class="btn btn-success" >เข้าสู่ระบบ</button><br><br>
            <a href="pj_login.php">ย้อนกลับ</a>
            </center>

	</form>
  </div>
</div>

</body>
</html>
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

<div class="container-fluid" >
  <div class="row" style="background-color:#861c20;">
    <div class="container">
      <div class="row">
          <div class="x1 text-center" >
          <p style="color: #fff; padding-top: 20px; font-size: 30px; margin-top: -16px;">ระบบกิจกรรมชุมนุมออนไลน์</p>
          <p style="color: #fff; font-size: 20px; margin-top: -15px;"> โรงเรียนแม่จริม อำเภอแม่จริม จังหวัดน่าน</p>
        </div>
        </div>
    </div>
  </div>

  <div class="row box" >
    <div class="container re">
      <div class="row">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button> 
            <a class="navbar-brand" href="#"> <!-- เเก้ไข logo -->
              <img src="logo8.png" style="position: static; margin-top: -102px; margin-left: 137px;">
            </a>
          </div>

    <!-- เมนู -->
    <div class="collapse navbar-collapse x1" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right" style="margin-top: -57px;">
        <li><a href="index.php" style="font-size: 18px; left: -457px; padding-top: 10px; padding-bottom: 10px; top: 76px;"><i class="glyphicon glyphicon-home"></i> หน้าแรก</a></li>

            <li><a href="index6.php" style="font-size: 18px; left: -365px; padding-top: 10px; padding-bottom: 10px; top: 76px;">ปฏิทินกิจกรรมชุมนุม</a></li>
      </ul>
    </div>
  </div>
</nav>
        </div>
    </div>
  </div>

<div class="container">
  <div class="" style="margin-top:30px;">
    <div class="col-lg-9"><!-- เนื้อหา-->
        
<!-- ตาราง -->
  <div class="row">
                

                <div class="col-lg-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                          
                          <b>  555555
                           </b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                   <table width="100%" class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr>
                                        <th style=" width:5%"><center style="margin-top: 0px;">ลำดับ</center></th>
                                        <th><center style="margin-top: 0px;">กิจกรรมชุมนุม</center></th>
                                        <th><center>ครูที่ปรึกษากิจกรรมชุมนุม</center></th>

                                        <th><center style="margin-top: 0px;">เงื่อนไข</center></th>
                                        <th><center style="margin-top: 0px;">จำนวน</center></th>
                                    </tr>
                                </thead>

                        <tbody>

                            <tr >
                                <td align="center" style="height: 0px;padding-bottom: 0px;"></td>
                                <td style="height: 0px;padding-bottom: 0px;"><font style="font-size: 14px;"></font></td>
                                <td style="height: 0px;padding-bottom: 0px;">
                                        <table>
                                            <tr>
                                                <td style="width: 100px;">
                                                   
                                                </td>
                                                <td>
                                                </td>
                                            </tr>
                                        </table> </td>
                               
                                <td align="center" style="height: 0px;padding-bottom: 0px;"></td>
                                <td align="center" style="height: 0px;padding-bottom: 0px;">
                                

                                  
                                </td>
                               
                            </tr> 
                            <!-- <?php $i++; //} ?> -->         
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
    /*-moz-border-radius: 2px;*/
    /*-webkit-border-radius: 2px;*/
   /* border-radius: 2px;*/
    /*-moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);*/
    /*-webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);*/
    /*box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3); */">
    <!-- เมนู-->
    <!-- login -->
    <div class="panel panel-success">
          <div class="panel-heading">
                <div class="panel-body">

    <div class="col-xs-12 text-center " >
                <p style="color: #882023;font-size: 16px;">เข้าสู่ระบบ</p>
              
              <hr style="margin-top: 10px; "> 
                
              </div>
                <form method="POST" action="login_a.php" style="display: block;">
                  <div class="form-group">
                    <input type="text" placeholder="ชื่อผู้ใช้งาน" class="form-control" name="username" size="15" maxlength="15">
                  </div>
                  <div class="form-group">
                    <input type="password" placeholder="รหัสผ่าน" class="form-control" name="password" size="30" maxlength="30">
                  </div>
                <!--  <div class="form-group text-center">
                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                    <label for="remember"> Remember Me</label>
                  </div> -->
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3 text-center">
                        <button type="submit" class="btn btn-danger" >เข้าสู่ระบบ</button>
                      </div>
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

   </div>
      

    </div>
  </div>

<br><br>
<!-- footer -->
<div class="row s wrapper footer" style="background-color:#861c20;padding-bottom: 20px;margin-bottom: -10px;position:relative;">
    <div class="container">
     <div class="row">
      <div class="footer" style="margin-top:5px;">
      <div class="col-lg-12">
            <ul>
            <li>โรงเรียนแม่จริม 28 หมู่ 4 ถนนน่าน-แม่จริม ตำบลหนองแดง อำเภอแม่จริม จังหวัดน่าน 55170 โทรศัพท์: 054-769-057</li>

          </ul>
              </div>
          </div>
          </div>
    </div>
          
</div>      
<script type="text/javascript" src="../vendor/bootstrap-3.3.6/js/bootstrap.min.js"></script>
<?php include ('script_member.php'); ?>
</body>
</html>
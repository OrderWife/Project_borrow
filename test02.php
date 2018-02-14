<html lang="en">
 <haed>
  <meta charset="utf-8">
  <title>ระบบยืม-คืนอุปกรณ์การเรียนการสอน</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">       <!-- คำสั่งครวจสอบหน้าจอ -->
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
  <script type="text/javascript" src="./js/jquery.js"></script>
  <script type="text/javascript" src="./js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

     <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

 <style>
 body,html{
    height: 100%;
  }

  nav.sidebar, .main{
    -webkit-transition: margin 200ms ease-out;
      -moz-transition: margin 200ms ease-out;
      -o-transition: margin 200ms ease-out;
      transition: margin 200ms ease-out;
  }

  .main{
    padding: 10px 10px 0 10px;
  }

 @media (min-width: 765px) {

    .main{
      position: absolute;
      width: calc(100% - 40px); 
      margin-left: 40px;
      float: right;
    }

    nav.sidebar:hover + .main{
      margin-left: 200px;
    }

    nav.sidebar.navbar.sidebar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
      margin-left: 0px;
    }

    nav.sidebar .navbar-brand, nav.sidebar .navbar-header{
      text-align: center;
      width: 100%;
      margin-left: 0px;
    }
    
    nav.sidebar a{
      padding-right: 13px;
    }

    nav.sidebar .navbar-nav > li:first-child{
      border-top: 1px #e5e5e5 solid;
    }

    nav.sidebar .navbar-nav > li{
      border-bottom: 1px #e5e5e5 solid;
    }

    nav.sidebar .navbar-nav .open .dropdown-menu {
      position: static;
      float: none;
      width: auto;
      margin-top: 0;
      background-color: transparent;
      border: 0;
      -webkit-box-shadow: none;
      box-shadow: none;
    }

    nav.sidebar .navbar-collapse, nav.sidebar .container-fluid{
      padding: 0 0px 0 0px;
    }

    .navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
      color: #777;
    }

    nav.sidebar{
      width: 200px;
      height: 100%;
      margin-left: -160px;
      float: left;
      margin-bottom: 0px;
    }

    nav.sidebar li {
      width: 100%;
    }

    nav.sidebar:hover{
      margin-left: 0px;
    }

    .forAnimate{
      opacity: 0;
    }
  }
   
  @media (min-width: 1330px) {

    .main{
      width: calc(100% - 200px);
      margin-left: 200px;
    }

    nav.sidebar{
      margin-left: 0px;
      float: left;
    }

    nav.sidebar .forAnimate{
      opacity: 1;
    }
  }

  nav.sidebar .navbar-nav .open .dropdown-menu>li>a:hover, nav.sidebar .navbar-nav .open .dropdown-menu>li>a:focus {
    color: #CCC;
    background-color: transparent;
  }

  nav:hover .forAnimate{
    opacity: 1;
  }
  section{
    padding-left: 15px;
  }

body {
    margin: 0;
}

.w3-example {
    background-color: rgba(206, 194, 177, 0.65);
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

h3 {
    font-family: "Segoe UI",Arial,sans-serif;
    font-weight: 400;
    margin: 10px 0;
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #E6E6FA;
}

</style>
 </haed>
<body>
 
<!--  แทบบาข้างบน -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" >ระบบยืม-คืนอุปกรณ์การเรียนการสอน</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"></li>
        <li class="dropdown"></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> ชื่อผู้เข้าใช้ระบบ</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> ออกจากระบบ</a></li>
      </ul>
    </div>
  </div> 
</nav>



<!--แถบเมียงู-->

<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">หน้าหลัก<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">จัดการข้อมูลทั้วไป <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="#">ข้อมูลผู้ใช้</a></li>
            <li class="divider"></li>
            <li><a href="#">ประเภทผู้ใช้งาน</a></li>
            <li class="divider"></li>
            <li><a href="#">สถานะผู้ใช้งาน</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">จัดการทะเบียนอุปกรณ์ <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-pencil"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="#">อุปกรณ์</a></li>
            <li class="divider"></li>
            <li><a href="#">ประเภทอุปกรณ์</a></li>
            <li class="divider"></li>
            <li><a href="#">สถานะอุปกรณ์</a></li>
            <li class="divider"></li>
            <li><a href="#">การส่งซ่อม</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">รายงาน<span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list-alt"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="#">การยืม</a></li>
            <li class="divider"></li>
            <li><a href="#">การคืน</a></li>
            <li class="divider"></li>
            <li><a href="#">การส่งซ่อม</a></li>
          </ul>
        </li>                
      </ul>
    </div>
  </div>
</nav>



<nav>
 <div style="margin-left:16%;padding:-1px 16px;">
 <div class="w3-example">
 <h3>หัวเรื่อง</h3>
  <div class="w3-code notranslate htmlHigh">

  test ่สวนเนื้อหาฒฬ<br>

  test ่สวนเนื้อหา<br>
  test ่สวนเนื้อหา<br>
  test ่สวนเนื้อหา<br>
  test ่สวนเนื้อหา<br>
  test ่สวนเนื้อหา<br>
  อ<br>
  test ่สวนเนื้อหา<br>
  test ่สวนเนื้อหาtest ่สวนเนื้อหา<br>
  test ่สวนเนื้อหา<br>






  </div>
  </div>
  </div>
 </nav>




 </body>

</html>
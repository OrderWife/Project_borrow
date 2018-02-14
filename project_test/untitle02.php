<?php
require_once 'connect_book.php';
$p="";
if(isset($_POST['pro_search'])){
$pro_search = $_POST['pro_search'];
$p = "WHERE equipment.equipment_name LIKE '%".$pro_search."%'";
}
$sql = "SELECT * FROM equipment 
            LEFT JOIN equipment_type on equipment.equipment_type_id = equipment_type.equipment_type_id 
            LEFT JOIN status_equipment on equipment.status_id = status_equipment.status_id
            $p";

$result = mysql_query($sql);
$number_of_rows = mysql_num_rows($result); 
$data = array();

              if(isset($_GET['id'])){

                $sql1 = "SELECT * FROM equipment where equipment_id = ".$_GET['id'];
                $result1 = mysql_query($sql1);
                $data1 = array();
                $data1 = mysql_fetch_assoc($result1); 
                $path = _DIR_.DIRECTORY_SEPARATOR.'image1'.DIRECTORY_SEPARATOR.$data1['image'];

                // ตรวจสอบว่าไฟล์มีอยุ่หรือป่าว
                if (file_exists($path) && !empty($data1['image1'])){
                     unlink($path);
                }

                $sql2 = ("DELETE FROM equipment WHERE equipment_id = ".$_GET["id"]);
               $result2 = mysql_query($sql2);
               if(!$result2){
                echo "Delete Error [".mysql_error()."]";
               }else{
                //echo '<script type="text/javascript">window.location="staff_edit_device.php";</script>';
               }
              }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>form</title>

    <?php 
    include "css.php"; 
    ?>


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
                <a class="navbar-brand" href="index.html">ระบบยืม-คืนอุปกรณ์การเรียนการสอน</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> ชื่อผู้เข้าใช้ระบบ <span class="badge" style="background-color:#443cbd">0</span></a></li>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="page.php"><i class="fa fa-dashboard fa-fw"></i> หน้าหลัก</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> จัดการข้อมูลทั่วไป<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="flot.html">อนุมัติผู้ใช้</a>
                                </li>
                                <li>
                                    <a href="staff_status_user.php">ข้อมูลผู้ใช้งาน</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> จัดการทะเบียนอุปกรณ์<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="staff_form_equipment.php">เพิ่มอุปกรณ์</a>
                                </li>
                                <li>
                                    <a href="buttons.html">เพิ่มประเภทอุปกรณ์</a>
                                </li>
                                <li>
                                    <a href="staff_status_equipment.php">บันทึกสถานะอุปกรณ์</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> รายงาน<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">รายงานการยืม</a>
                                </li>
                                <li>
                                    <a href="#">รายงานการคืน</a>
                                </li>
                                <li>
                                    <a href="show_repair.php">รายงานอุปกรณ์</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <!--  -->
                    <div class="w3-code notranslate htmlHigh">
                          <br>
                        <div class="container-fluid">
                          <div class="row">
                          <div class="col-sm-2"></div>
                            <div class="col-sm-8">
                            <div class="row" style="margin-bottom: 10px;">
                            <div class="col-sm-4" style="font-size: 25px; width: 190px;"><b>ค้นหาอุปกรณ์</b></div>
                         <div class="col-sm-8">
                         <form action="page.php" method="POST">
                          <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="pro_search">
                            <div class="input-group-btn">
                              <button class="btn btn-default" type="submit" value="ค้นข้อมูล">
                                <i class="glyphicon glyphicon-search"></i>
                              </button>
                            </div>
                          </div>
                        </form>
                        </div>
                        </div>
                            </div>

                            <div class="col-sm-2">

                        </div>
                          </div>
                        </div>
                    <!--  -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Equipment
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่ออุปกรณ์</th>
                                        <th>ประเภทอุปกรณ์</th>
                                        <th>จำนวนทั้งหมด</th>
                                        <th>รูปภาพ</th>
                                        <th>วันที่นำเข้า-เวลา ล่าสุด</th>
                                        <th>สถานะ</th>
                                        <th>จำนวนที่สามารถยืมได้</th>
                                    </tr>
                                </thead>
                                <tbody>
                 

                                <?php

                                if($number_of_rows>0){
                                $i = 1; 
                                while ($fetch = mysql_fetch_assoc($result)) {
                                     ?>
                                <tr>
                                  <td align="center"><?php echo $i; ?></td>
                                  <td><?php echo $fetch['equipment_name']; ?></td>
                                  <td><?php echo $fetch['equipment_type_name']; ?></td>
                                  <td><?php echo $fetch['equipment_unit']; ?></td>                  
                                  <td>
                                      <?php
                                       if(isset($fetch['image'])){ ?>
                                      <center>
                                        <img src="image/<?php  echo $fetch['image']; ?>" width="50px" >
                                      </center>
                                        <?php  }
                                      ?>                        
                                  </td>

                                  <td><?php echo $fetch['date_input']?></td>

                                  <td align="center">
                                    <button type="button" class="btn btn-outline btn-success btn-xs"><?php echo $fetch['status_equipment']; ?>                                        
                                    </button>
                                  </td>

                                  <td>  </td>
                                </tr>
                            <?php $i++; } } ?>
                        <tbody>


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
                        <!-- /#page-wrapper -->

                    </div>
                    <!-- /#wrapper -->

                    <script>
                    $(document).ready(function() {
                        $('#dataTables-example').DataTable({
                            responsive: true
                        });
                    });
                    </script>

                    <?php 
                    include "script.php"; 
                    ?>

                </body>

                </html>
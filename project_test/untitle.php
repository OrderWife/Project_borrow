<?php
require_once 'connect_book.php';
session_start();

////////////////////////////////////////////////////////////////////////
$h = $_SESSION['memberid'];
$sql22 = "SELECT * FROM user 
        LEFT JOIN group_user on user.group_user_id = group_user.group_user_id
        where name_id = '$h' ";

$result22 = $conn->query($sql22);
// $fetch22 = $result22->fetch_assoc();
$num_row22 = $result22->num_rows;
// echo $num_row22;

if ($num_row22 > 0) { 
    do{
    $_SESSION['user_id'] = $fetch22['user_id'];
    // $_SESSION['group_user_id'] = $fetch22['group_user_id'];


}while($fetch22 = $result22->fetch_assoc()); } 
////////////////////////////////////////////////////////////////////////

if ($_SESSION['group_user_id'] && $_SESSION['status_userid'] != 1) {

     header('location: home.php');

}else{ ?>

<?php

$p="";
if(isset($_POST['pro_search'])){
$pro_search = $_POST['pro_search'];
$p = "WHERE equipment.equipment_name LIKE '%".$pro_search."%'";
}

 $perpage = 20;
 if (isset($_GET['page'])) {
 $page = $_GET['page'];
 } else {
 $page = 1;
 }
 
 $start = ($page - 1) * $perpage;
 $li = "limit {$start} , {$perpage}";

$sql = "SELECT * FROM equipment 
            LEFT JOIN equipment_type on equipment.equipment_type_id = equipment_type.equipment_type_id
            -- LEFT JOIN record_status on equipment.record_status_id = record_status.record_status_id
            $p $li";

// $sql = "SELECT * FROM record_status 
//             LEFT JOIN equipment on record_status.equipment_id = equipment.equipment_id 
//             LEFT JOIN equipment_type on equipment.equipment_type_id = equipment_type.equipment_type_id
//             LEFT JOIN user on record_status.user_id = user.user_id
//             LEFT JOIN status_equipment on record_status.status_id = status_equipment.status_id
//             $p";

$result = $conn->query($sql);
$num_row = $result->num_rows;

if(isset($_POST["add_equipment"])){
      if(isset($_SESSION["shopping_cart"]))
      {
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
           if(!in_array($_GET["id"], $item_array_id))
           {
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                     'item_id'               =>     $_GET["id"],
                     'item_name'               =>     $_POST["add_equipment_name"],
                     'item_type_name'               =>     $_POST["add_equipment_type_name"],
                     'item_unit'          =>     $_POST["add_unit"],
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
           }
           else
           {
                echo '<script>alert("สินค้าถูกเพิ่มแล้ว")</script>';
                echo '<script>window.location="page_user.php"</script>';
           }
      }
      else
      { 
           $item_array = array(
                'item_id'               =>     $_GET["id"],
                'item_name'               =>     $_POST["add_equipment_name"],
                'item_type_name'               =>     $_POST["add_equipment_type_name"],
                'item_unit'          =>     $_POST["add_unit"],
           );
           $_SESSION["shopping_cart"][0] = $item_array;
      }
 }

     // if(!empty($_SESSION["shopping_cart"])){
     //        $n1 = 1;
     //        $n2 = 1;
     //      foreach ($_SESSION['shopping_cart'] as $key1 => $value1) {                        
     //            echo $value1['item_name']; echo $n1; echo "<br>"; 
     //           $n2 = $n1++;
     //          }echo $n2; 
     //        }  
             

 if(isset($_GET['action'])){
  if($_GET['action']=="delete"){
  foreach ($_SESSION['shopping_cart'] as $key => $value) {
    if($value['item_id']==$_GET['id']){
        unset($_SESSION['shopping_cart'][$key]);
        echo '<script>alert("ลบเรียบร้อย")</script>';
        echo '<script>window.location="page_user.php"</script>';
      }
    }
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

    <?php include "css.php"; ?>
  
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
                <a class="navbar-brand" >ระบบยืม-คืนอุปกรณ์การเรียนการสอน</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <?php 
                    if(!empty($_SESSION["shopping_cart"])){
                        $n1 = 1;
                        $n2 = 1;
                      foreach ($_SESSION['shopping_cart'] as $key1 => $value1) {                        
                            $value1['item_name'];  
                           $n2 = $n1++; }?>
                        <!--  แสดงจำนวนยืม -->
                    <?php if($n2>0){ ?>

                    <li data-toggle="modal" data-target="#model" ><a href="#">
                      <span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['name_id'] ?> 
                      <span class="badge" style="background-color:#FF0000"> <?php echo $n2; ?>
                    </span></a>
                  </li>

                    <?php }  ?>
                        <!--  แสดงจำนวนยืมเป็น 0 -->
                    <?php } else{ ?>
                    <li><a><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['name_id'] ?> </a></li>
                    <?php } ?>
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
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <a href="page_user.php"><i class="fa fa-dashboard fa-fw"></i> หน้าหลัก</a>
                        </li>
                        <li>
                            <a href="data_user.php"><i class="fa fa-bar-chart-o fa-fw"></i> ข้อมูลผู้ใช้</a>     
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> รายงาน<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="user_borrow.php">รายงานการยืม</a>
                                </li>
                                <li>
                                    <a href="user_return.php">รายงานการคืน</a>
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
                         <form action="page_user.php" method="POST">
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
                        
                      <!--  <?php 
                      if (isset($_SESSION['shopping_cart'])) {


                        foreach ($_SESSION['shopping_cart'] as $key => $value) {
                          $aa1 = $value['item_id'];

                        $sql34 = "SELECT * FROM equipment 
                        LEFT JOIN equipment_type on equipment.equipment_type_id = equipment_type.equipment_type_id
                        -- LEFT JOIN record_status on equipment.record_status_id = record_status.record_status_id
                        ";

                        $result34 = $conn->query($sql34);
                        $fetch34 = $result34->fetch_assoc(); 
                        $num_row34 = $result34->num_rows;    
                           

                        do{
                          
                        }while($fetch34 = $result34->fetch_assoc()); 

                          }
                        }
                        ?>  -->
                               
                        
                        <?php 
                        $fetch = $result->fetch_assoc();
                         if ($num_row>0) {
                          $a = 1;           
                          do {
                  
                        ?>                                
                        <div class="col-md-3">
                        <form method="POST" enctype="multipart/form-data" action="page_user.php?action=add&id=<?php echo $fetch['equipment_id'];?>">  
                            <div style="border: 1px solid #333;background-color:white;border-radius: 10px;padding: 1px;margin: 5px"> 
                                <?php 
                                if(isset($fetch['image'])){ ?>
                                  <center> <img style="margin: 10px" src="image1/<?php echo $fetch['image']; ?>" class="img-responsive" width="50px" >
                                <?php } ?>                                      
                                <h5 color="#000000"; style="margin: 6px"><font class="text-info" >ชื่ออุปกรณ์: </font><?php echo $fetch['equipment_name']; ?></h5>
                                <h5 color="#000000"; style="margin: 6px"><font class="text-info" >ประเภทอุปกรณ์: </font><?php echo $fetch['equipment_type_name']; ?></h5> 
                                <h5 color="#000000"; style="margin: 6px"><font class="text-info" >จำนวนอุปกรณ์ทั้งหมด: </font><?php echo $fetch['equipment_unit']; ?></h5>
                                <label><h5 style="margin: 6px">จำนวน : </h5></label>

                                <!-- ผู้ใช้ -->
                                <input style="width: 27px;" name="add_user_id" required autofocus type="hidden" value="<?php echo $_SESSION['name_id'] ?>">

                                <!-- อุปกรณ์ -->
                                <input style="width: 27px;" name="add_equipment_name" required autofocus type="hidden" value="<?php echo $fetch['equipment_name']; ?>">
                                
                                <!-- ประเภทอุปกรณ์ -->
                                <input style="width: 27px;" name="add_equipment_type_name" required autofocus type="hidden" value="<?php echo $fetch['equipment_type_name']; ?>">

                                <!-- จำนวน -->
                                <input type="number" style="width: 40px;" maxlength="3" required autofocus name="add_unit" min="1" max="<?php echo $fetch['equipment_unit']; ?>"/>

                                <!-- เพิ่มจำนวน -->
                                <button style="margin: 5px;" type="submit" name="add_equipment" class="btn btn-success btn-xs" >
                                <span class="glyphicon glyphicon-plus-sign" > เพิ่ม</span>              
                                </button></center>

                            </form>


                                                    <!-- Modal 2 -->
                                                    <div class="container">
                                                      <!-- Modal -->
                                                      <div class="modal fade" id="model" role="dialog">
                                                        <div class="modal-dialog">
                                                        
                                                          <!-- Modal content-->
                                                          <div class="modal-content">
                                                            <div class="modal-header">
                                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                              <h4 class="modal-title">บันทึกรายการยืม </h4>
                                                            </div>
                                                            <div class="modal-body">
                                                              <div class="panel-body">

                                                                    <div class="row">              
                                                                            
                                                                    <div style="clear:both;"></div>                             
                                                                      <div class="table-responsive">
                                                                    <form name="frm" method="post" action="save_borrow.php" >
                                                                      <table class="table table-bordered">
                                                                        <tr>
                                                                          <th>ลำดับ</th>
                                                                          <th>สินค้า</th>
                                                                          <th>ประเภทอุปกรณ์</th>
                                                                          <th>จำนวน</th>
                                                                          <th>การดำเนินการ</th>
                                                                        </tr>
                                                                        <?php
                                                                          if(!empty($_SESSION["shopping_cart"])){
                                                                              $v=1;
                                                                              $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"]);
                                                                              foreach ($_SESSION['shopping_cart'] as $key => $value) { ?>
                                                                              <tr>
                                                                                <td><?php echo $v; ?></td>
                                                                                <td><?php echo $value['item_name'];?><input type="hidden" name='articles[]' value="<?php echo $value['item_id'];?>"></td>
                                                                                <td><?php echo $value['item_type_name'];?></td>
                                                                                <td><?php echo $value['item_unit'];?><input type="hidden" name='unit1[]' value="<?php echo $value['item_unit'];?>"></td>
                                                                                <td>
                                                                                  <?php 
                                                                                    $a1 = $_SESSION['name_id'];
                                                                                    $sql1 = "SELECT * FROM user 
                                                                                        LEFT JOIN group_user on user.group_user_id = group_user.group_user_id
                                                                                    WHERE user_name = '$a1' "; 

                                                                                        $result1 = $conn->query($sql1); 
                                                                                        $num_row1 = $result1->num_rows;
                                                                                        $fetch1 = $result1->fetch_assoc();

                                                                                        if ($num_row1 > 0) {
                                                                                            do{ ?>
                                                                                            <input type="hidden" name='nameuser[]' value="<?php echo $fetch1['user_id'];?>">
                                                                                            <input type="hidden" name="status1[]" value="7">
                                                                                            <input type="hidden" name="group_user1[]" value="<?php echo $fetch1['group_user_id'];?>">
                                                                                            <input type="hidden"  name="date1[]"  id="date" value="<?=date('Y-m-d')?>"/>
                                                                                            
                                                                                        <?php 
                                                                                        }while ($fetch1 = $result1->fetch_assoc());
                                                                                  ?>

                                                                                    <a href="page_user.php?action=delete&id=<?php echo $value['item_id'];?>">ลบสินค้า
                                                                                    </a></td>
                                                                              </tr>
                                                                              
                                                                          <?php $v++;} } } ?>

                                                                      </table>
                                                                      <!-- <?php //echo '<pre>' .print_r($_SESSION, TRUE). '</pre>'; ?> -->
                                                                      
                                                                      <br>
                                                                        
                                                                          <div class="col-xs-5"><label>อาจารย์กำกับ</label>
                                                                            <textarea class="form-control" type="text" name="professor1" placeholder="อาจารย์กำกับ" required autofocus></textarea>
                                                                          </div>
                                                                          <div class="col-xs-4"><label>วันที่คืน </label>
                                                    <input class="form-control" type="text" name="default_datetimepicker" id="default_datetimepicker" required autofocus autocomplete="off"/>
                                                                          </div>

                                                                          <input type="hidden" name="borrow_num1" value="<?php echo uniqid(); ?>">
                                                                          
                                                                                                          
                                                            </div>                          
                                                             <!-- /.col-lg-6 (nested) -->                         
                                                        </div>                          
                                                     <!-- /.row (nested) -->                             
                                                  </div>                            
                                                </div>                              
                                              <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" value="submits" > บันทึก</button> 
                                            </form>                       
                                            </div>                                                     
                                          </div>                                  
                                                                            
                                      </div>                                    
                                    </div>                                    
                                  </div>                                    
                               <!-- Modal 2 --> 
                                                                   
                               
                            </div>       
                           </form>   
                        </div> 
                        <?php $a++; }while($fetch = $result->fetch_assoc()); } else{ echo "<center>"; echo "' ไม่พบข้อมูล '"; "</center>";} ?>



                                
                                        </div>
                                        <!-- /.panel-body -->

                                    </div>
                                    <!-- /.panel -->

                                    <?php
                                     $sql2 = "select * from equipment ";
                                     $query2 = $conn->query($sql2);
                                     $total_record = $query2->num_rows;
                                     $total_page = ceil($total_record / $perpage);
                                     ?>

                                    <nav>
                                     <ul class="pagination">
                                     <li>
                                     <a href="page_user.php?page=1" aria-label="Previous">
                                     <span aria-hidden="true">&laquo;</span>
                                     </a>
                                     </li>
                                     <?php for($i=1;$i<=$total_page;$i++){ ?>
                                     <li><a href="page_user.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                     <?php } ?>
                                     <li>
                                     <a href="page_user.php?page=<?php echo $total_page;?>" aria-label="Next">
                                     <span aria-hidden="true">&raquo;</span>
                                     </a>
                                     </li>
                                     </ul>
                                     </nav>

                                </div>
                                <!-- /.col-lg-12 -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /#page-wrapper -->

                    </div>
                    <!-- /#wrapper -->

                    <?php include "script.php"; ?>
                    <link rel="stylesheet" type="text/css" href="../date/jquery.datetimepicker.css"/>
                    <script src="../date/jquery.datetimepicker.full.min.js"></script>
                    
                        <script>
                        $.datetimepicker.setLocale('th'); 

                            var minDate = $("#startDate").html();
                            var maxDate = $("#endDate").html()
                        $(function(){  
                            var thaiYear = function (ct) {  
                                                  
                            };
                            function noWeekends(date) {
                            var day = date.getDay();
                            // ถ้าวันเป็นวันอาทิตย์ (0) หรือวันเสาร์ (6)
                            if (day === 0 || day === 6) {
                                // เลือกไม่ได้
                                return [false, "", "วันนี้เป็นวันหยุด"];
                            }
                            // เลือกได้ตามปกติ
                            return [true, "", ""];
                        };     

                              
                            $("#default_datetimepicker").datetimepicker({     
                                timepicker:false,
                                format:'Y-m-d',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000    
                                lang:'th',  // แสดงภาษาไทย
                                onChangeMonth:thaiYear,          
                                onShow:thaiYear,                 
                                //yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
                                closeOnDateSelect:true,
                                //startDate:'<?php // echo $text_date; ?>',//or 1986/12/08,
                                minDate:'<?php // echo $text_date1; ?>',//yesterday is minimum date(for today use 0 or -1970/01/01)
                                beforeShowDay: noWeekends,
                                //minDate:'2556/12/03',
                                //maxDate:'<?php // echo $text_date; ?>'//tomorrow is maximum date calendar
                                 
                            });     
                        });  
                        </script>
                        <script>

                    $(document).ready(function() {
                        $('#dataTables-example').DataTable({
                            responsive: true
                        });
                    });
                    </script>

                    
                
                </body>

                </html>
                <?php } ?>
    
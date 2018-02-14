<?php
session_start();
include 'connect_book.php';


$sql = "SELECT * FROM `bookborrow`
LEFT JOIN book ON bookborrow.bookid=book.bookid
LEFT JOIN member ON bookborrow.memberid=member.memberid ";
$result = mysqli_query($conn, $sql);

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

    <style type="text/css">
   #dataTables-example_filter {
    display: none;
   }
   #dataTables-example_length{
    display: none;
   }
   #dataTables-example3_info {
    display: none;
   }
    </style>


</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <!-- <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">อยู่ตรงไหนหว่า</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> -->
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
                            <h4 style="margin-top: 0px;">รายการยืมเล่มโครงงาน</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

            <!-- <div class="col-lg-2" >
            <label style="font-size: 20px" >กำหนดส่งคืน     :</label>
            </div>
           
            <div class="col-lg-4">
            <input readonly="readonly" type="text" id="returndate" name="returndate" class="datepicker form-control"
            value="<?=date('d-m-y',strtotime("+7 day"))?>" >
            </div>
            </div> -->
          


                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example3">
                                <thead>
                                            <tr>
                                                <th style="width: 55px;padding-right: 1px;padding-left: 1px;"><center >ลำดับที่</center> </th>
									            <th><center>เล่มโครงงาน</center> </th>
									            <th width="15%" ><center>วันที่ยืม</center> </th>
									            <th width="15%" ><center>กำหนดส่งคืน</center> </th>
                                                <th width="10%" ><center>สถานะ</center> </th>
									            <!-- <th style="width: 30%" class="center">รายละเอียด </th> -->
									            <!--<th class="center">แก้ไข</th>-->
									            
									        </tr>
                                </thead>
                                <tbody>                    

        <?php

include 'connect_book.php';

        $session_login_id = $_SESSION['memberid'];

        $qry_user = "SELECT * FROM `bookborrow` 
            LEFT JOIN borrower ON bookborrow.borrowerid = borrower.borrowerid
            LEFT JOIN book ON bookborrow.bookid = book.bookid
        WHERE memberid='$session_login_id' ORDER BY borrowid DESC";
        $result_user = mysqli_query($conn,$qry_user);
        $i = 1;

        while($row = mysqli_fetch_array($result_user, MYSQLI_ASSOC))  {
        ?>
        <?php if($row["status_member"]!='3') { ?>
        <tr>
            <?php 
                $theBorrow = date("d-m-",strtotime($row['borrowdate'])).date(date("Y",strtotime($row['borrowdate'])));
                $theReturn = date("d-m-",strtotime($row['returndate'])).date(date("Y",strtotime($row['returndate'])));
            ?>
            <td align="center"><?=$i;?></td>
            <td><?php echo $row['booknamethai']; ?></td>
            <td><?php echo DateThai($theBorrow); ?></td>
            <td><?php echo DateThai($theReturn); ?></td>
            <!-- <td><?php // echo $row['statusbook']; ?></td> -->
            <td> 
                <center> 
                <?php if($row["status_member"]=='1') { ?>
                <!-- <p style="color: red"> -->
                    <label style="color: red">
                ค้างส่ง
                    </label>
                <!-- </p> -->
                <?php } ?>
                
                <?php //if($row["statusbook"]=='1') {  ?>
                <!-- <p style="color: green">คืนแล้ว</p>      -->
                <?php // } ?>

                <?php if($row["status_member"]=='0') {  ?>
                <!-- <a style="color: orange"> -->
                    <label style="color: orange">
                รอการอนุมัติ
                    </label>
                <!-- </a>      -->
                <?php } ?>
                </center>       
            </td>
            <!-- <td><?php // echo $row['borrowdetailid']; ?></td> -->
            <!--
            <td> 
                <center><button class="btn btn-info" style="background-color: #33CC33">
                <a href="edit_borrow.php?id= <?php // echo $row['bookborrowid']; ?>">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
                </button>    
                </center>       
            </td>
            -->
        </tr>

        <?php  } $i++; }
        //mysqli_free_result($result) ;
        //mysqli_close($conn);
        ?>

                            </tbody>
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
    <!-- /#wrapper -->

    <?php include ('script_member.php'); ?>


<script>
      $(document).ready(function() {
          $('#dataTables-example3').DataTable( {
             responsive: true,
             ordering: false,
             searching: false,
             // info: false,
             paging:   false,
              "language": {
                  "zeroRecords": "ไม่มีรายการยืม",
                  // "info": "แสดง START ถึง END จากทั้งหมด TOTAL รายการ",
                  "infoEmpty": "แสดง 0 ถึง 0 จากทั้งหมด 0 รายการ",
                  "infoFiltered": "(จากทั้งหมด MAX รายการ)",
                  oPaginate: {
                    // 
                    sFirst: 'เริ่มต้น',
                    sLast: 'สุดท้าย',
                    sNext: 'ถัดไป',
                    sPrevious: 'ย้อนกลับ'

                },
                "search": "ค้นหา:"
              }
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

                $theBorrow = $row['borrowdate'];
                $theReturn = $row['returndate'];
                // echo "ThaiCreate.Com Time now : ".DateThai($strDate);
            ?>



</body>

</html>
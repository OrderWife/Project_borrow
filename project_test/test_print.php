<?php 
session_start();

        if ( !isset($_SESSION['memberid']) ) {
            header("Location:index1.php");
        }

include 'connect_book.php';
?>

<?php 
     @$booktypeid=$_GET['booktypeid'];
     @$advisorid = $_GET['advisorid']; 
     @$year = $_GET['year']; 
     @$bookid=$_GET['bookid'];
     // echo $booktypeid;
     // echo $advisorid;
     // echo $year;
     if($_GET){
      if($booktypeid == "all"){
      // echo "1";
      
      if ($advisorid == "all") {
        // echo "1 and 2";
        
        if ($year == "all") {

          if ($bookid == "") {
            $sqlq = "SELECT * FROM book left join advisor on book.advisorid = advisor.advisorid";
          }else{
            $sqlq = "SELECT * FROM book left join advisor on book.advisorid = advisor.advisorid WHERE bookid LIKE '%".$bookid."%' ";
          } 
        }else{
          // echo $year;
          $sqlq = "SELECT * FROM book left join advisor on book.advisorid = advisor.advisorid where year = $year ";
        }
      }else{
        // echo $advisorid;
         $sqlq = "SELECT * FROM book left join advisor on book.advisorid = advisor.advisorid where advisor.advisorid = $advisorid ";
        if ($year != "all") {
         // echo $year;
         $sqlq.= "and year = $year";
         // echo $sqlq;
       }
      }
     }else{
      // echo $booktypeid;
       $sqlq = "SELECT * FROM book left join advisor on book.advisorid = advisor.advisorid where booktypeid = $booktypeid ";
       if ($advisorid != "all") {
         // echo $advisorid;
         $sqlq.= "and advisor.advisorid = $advisorid ";
         // echo $sqlq;
       }
       if ($year != "all") {
         // echo $year;
         $sqlq.= "and year = $year";
         // echo $sqlq;
       }
     }
          // echo $sqlq;
          $resultq = mysqli_query($conn, $sqlq);
          // $row2 = $resultq->fetch_assoc();

     }

     

    // if (@($_GET['booktypeid']!="")){ 
    //      $sqlq = "SELECT * FROM book
    //     left join advisor on book.advisorid = advisor.advisorid where book.booktypeid = $booktypeid ";
        
    //     if (($_GET['advisorid']!="")){
    //        $sqlq.=" and advisor.advisorid = $advisorid";
    //       if (($_GET['year']!="")){
    //          $sqlq.=" and book.year = $year";
    //       }
    //     }
    //     if (($_GET['year']!="")){
    //          $sqlq.=" and book.year = $year";
    //       }
    //       // echo $sqlq;
    //     $resultq = mysqli_query($conn, $sqlq);

    //     /////////////////////////////////////
      
    // }else if (@($_GET['advisorid']!="")){ 
    //      $sqlq = "SELECT * FROM book
    //     left join booktype on book.booktypeid = booktype.booktypeid
    //     left join advisor on book.advisorid = advisor.advisorid
    //     where book.advisorid = $advisorid ";
        
    //     if (($_GET['booktypeid']!="")){
    //        $sqlq.=" and booktype.booktypeid = $booktypeid";
    //       if (($_GET['year']!="")){
    //          $sqlq.=" and book.year = $year";
    //       }
    //     }
    //     if (($_GET['year']!="")){
    //          $sqlq.=" and book.year = $year";
    //       }
    //       // echo $sqlq;
    //     $resultq = mysqli_query($conn, $sqlq);
      
    // }else{
    //     $sqlq = "SELECT * FROM book
    //     left join advisor on book.advisorid = advisor.advisorid";
    //     $resultq = mysqli_query($conn, $sqlq);
    //     $row2 = $resultq->fetch_assoc();
    // } 
    // echo $sqlq;
?>

<?php  
      $sql2 = "SELECT * FROM `booktype` ";
      $result2 = mysqli_query($conn, $sql2);
      $sqltest = "SELECT * FROM `advisor` ";
      $resulttest = mysqli_query($conn, $sqltest);
      
?>


<?php
  // ini_set('display_errors', 1);
  // error_reporting(~0);

  // $strKeyword = null;

  // if(isset($_GET["txtKeyword"]))
  // {
  //   $strKeyword = $_GET["txtKeyword"];
  // }
?>





<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet"> 


    <title>ระบบการยืม-คืนเล่มโครงงานการศึกษาเอกเทศ</title>
    <?php include('css_member.php'); ?>
    <?php include('datatable_member.php'); ?>

 <style type="text/css">
   #dataTables-example_filter{
    display: none;
   }
   #dataTables-example_length{
    display: none;
   }
 </style>

<script language="JavaScript">
$(document).ready(function(){
var date = new Date();
 
$('#borrowdate').datepicker({
  dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
  monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
dateFormat: 'yy-mm-dd', minDate:0, maxDate:0,
inline: true,
onSelect: function(dateText, inst) {
date = $(this).datepicker('getDate'),
$("#returndate").datepicker("setDate", new Date(date.getFullYear(), date.getMonth(), date.getDate() + 7))
}
});

$("#returndate").datepicker({
  dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
  monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
dateFormat:'yy-mm-dd',minDate:1, maxDate:7,
});
});
</script>

</head>
<body>

    <div id="wrapper">
<?php include ('menu_member.php');?>

        <!-- Page Content -->
        <div id="page-wrapper" style="background-image: url('test-img.png');">
            <div class="row">

                <?php 
                  include 'connect_book.php';

                  $session_login_id = $_SESSION['memberid'];
                  //$borrowid = $row['borrowid'];                  

                  $qry_user = "SELECT * FROM `bookborrow`
                  LEFT JOIN book ON bookborrow.bookid=book.bookid 
                  where memberid = '$session_login_id'";

                  $result_user = mysqli_query($conn,$qry_user);
                  $row = mysqli_fetch_array($result_user, MYSQLI_ASSOC);

                  $today  = date('Y-m-d');
                  $returndate = $row['returndate']; //วันที่กำหนดคืน
                  $todayRe = $row['returnbook']; //วันที่ส่งคืน

                  $DateStart = $returndate[8] .+ $returndate[9];  //วันเริ่มต้น
                  $MonthStart = $returndate[5] .+ $returndate[6]; //เดือนเริ่มต้น
                  $YearStart = $returndate[0] .+ $returndate[1] .+$returndate[2] .+ $returndate[3];  //ปีเริ่มต้น

                  $DateEnd = $todayRe[8] .+ $todayRe[9];  //วันสิ้นสุด
                  $MonthEnd = $todayRe[5] .+ $todayRe[6]; //เดือนสิ้นสุด
                  $YearEnd = $todayRe[0] .+ $todayRe[1] .+$todayRe[2] .+ $todayRe[3];  //ปีสิ้นสุด

                  $End = mktime(0,0,0,$MonthEnd,$DateEnd,$YearEnd);
                  $Start = mktime(0,0,0,$MonthStart ,$DateStart ,$YearStart);


                  ($End/86400). "<br>";
                  ($Start/86400). "<br>";

                  $DateNum=ceil(($End -$Start)/86400); 
                  // echo "<br>"."จำนวนวันที่เลยส่ง : ". $DateNum ."<br>";

                  $DateNum *= 2;
                  // echo "จำนวนวันที่จะโดนแบน : ".+ $DateNum ."<br>";

                  $onDate = date("Y-m-d",strtotime("+$DateNum days",strtotime($todayRe)));
                  // echo "วันที่ปลดแบน : ". $onDate ."<br>";



                    if ($row['statusbook']=='0' && $today >= $row['returndate']) { ?>


                              <div class="alert alert-danger alert-dismissible" role="alert">

                                <button type="button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="close" data-dismiss="alert">
                                  <span aria-hidden="true">×</span>
                                  <span class="sr-only">Close</span>
                                </button>

                                <strong><i class="fa fa-warning"></i> โปรดทราบ!</strong> 
                                <marquee>
                                  <p style="font-family: Impact; font-size: 18pt">
                                คุณยังไม่ได้ทำการคืนเล่มโครงงาน กรุณาคืนเล่มโครงงานและทำรายการใหม่อีกครั้งในภายหลัง!
                                </p>
                                </marquee>
                              </div>


                <?php }  
                    elseif ($row['statusbook']=='1' || $row['statusbook']=='2' || $row['statusbook']=='' || $row['statusbook']=='0') { 
                      if ($today >= $row['returndate'] && $today <= $onDate) {
                ?>

                  <div class="alert alert-danger alert-dismissible" role="alert">

                  <button type="button" onclick="this.parentNode.parentNode.removeChild(this.parentNode);" class="close" data-dismiss="alert">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                  </button>

                  <strong><i class="fa fa-warning"></i> โปรดทราบ!</strong> 
                  <marquee>
                    <p style="font-family: Impact; font-size: 16pt">
                      <?php $onDate = date("d-m-",strtotime($onDate)).date(date("Y",strtotime($onDate))+543); ?>
                  ขออภัย!  ไม่สามารถทำการยืมเล่มโคงงงานได้ สามารถยืมเล่มโครงงานได้อีกครั้งหลังจากวันที่ <?php echo $onDate; ?>
                  </p>
                </marquee>
                </div>

                <?php } else { ?>
                

                <div class="col-lg-12" style="margin-top: 20px;">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="height: 42px;background-color: #d7efd3">
                          <h4 style="margin-top: 0px;">ค้นหาเล่มโครงงาน...</h4>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="padding-top: 0px;">
                            
                               
<div>
                <?php  if(isset($_GET['booktype'])){ 
                      $_GET['booktype']=$booktype;

                     } ?>

                      <?php  if(isset($_GET['booktypeid'])){ 
                      $booktypeid=$_GET['booktypeid'];

                     } ?>

                     <?php  if(isset($_GET['advisorid'])){ 
                      $advisorid=$_GET['advisorid'];

                     } ?>


                   <form action="test_print.php" method="GET">
                    <div class="row" style="margin-left: 0px;margin-bottom: 15px;width: 1107px;height: 73px;"><br>

                        <!-- <h4>ค้นหาเล่มโครงงาน...</h4> -->
                        <div class="col-lg-3" style="height: 33px;">
                        <select name="booktypeid" class="form-control" style="width: 260px;">
                              <option value="all" <?php if(@$_GET['booktypeid']==''){ ?> selected <?php  } ?>>ประเภทเล่มทั้งหมด</option>
                                <?php  while($row2 = $result2->fetch_assoc()){ ?>

                              <option <?php if(@$_GET['booktypeid']==$row2['booktypeid']){ ?> selected <?php  } ?> value="<?php echo $row2['booktypeid']; ?>"><?php echo $row2['booktype']; ?></option>
                                <?php } ?>

                        </select><br>
                            </div>

                            <div class="col-lg-3">
                        <select name="advisorid" class="form-control" style="width: 260px;">
                              <option value="all" <?php if(@$_GET['advisorid']==''){ ?> selected <?php  } ?>>อาจารย์ที่ปรึกษาทั้งหมด</option>
                                <?php  while($rowtest = $resulttest->fetch_assoc()){ ?>

                              <option <?php if(@$_GET['advisorid']==$rowtest['advisorid']){ ?> selected <?php  } ?> value="<?php echo $rowtest['advisorid']; ?>"><?php echo $rowtest['fname'];echo" "; echo $rowtest['lname']; ?></option>
                                <?php } ?>
                        </select>
                            </div>

                            <div class="col-lg-3">
                              <?php $max_date=date('Y'); ?>
                              <?php $min_date=date('Y')-2; ?>
                        <select name="year" class="form-control" style="width: 260px;">
                          <option value="all" <?php if(@$i==''){ ?> selected <?php   ?>>ปี พ.ศ. ทั้งหมด</option>                          

                              <?php for($i=$max_date; $i>=$min_date; $i--){?>
                          <option value="<?php echo $i; ?>"><?php echo $i+543; ?></option>
                <?php } } ?>
                        </select><br>
                            </div>
                            <?php// echo $i; ?>
                            <div class="col-lg-9">
                              <input class="form-control" name="bookid" type="text" id="bookid" style="width: 814px;" value="<?php // echo $_GET["bookid"];?>">
                            </div>
                            <div class="col-lg-2">
                       <input type="hidden" name="submit" value="y"> 
                        <button type="submit" class="btn btn-success" style="padding-right: 15px;padding-left: 15px; ">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        ค้นหาเล่มโครงงาน
                        </button>
                        </div>
                        </div>

                       <!--  <div class="col-lg-10">
                        <input class="form-control" name="bookid" type="text" id="bookid" value="<?php // echo $_GET["bookid"];?>">
                        </div> -->
                        <!-- <div class="col-lg-2">
                        <input class="form-control" name="search" type="submit" value="Search"></th>
                        </div> -->

                    </form>

                    </div>
                    <form name="frmMain" action="save_approve.php" method="post" OnSubmit="return onSave();">
                    <?php if($_GET){ ?>

                      <table width="100%" class="table table-striped table-bordered table-hover display" id="dataTables-example" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th style="width: 55px;padding-right: 1px;padding-left: 10px;">ลำดับที่</th>
                                        <th ><center>ชื่อเรื่อง</center></th>
                                        <th style="width: 15%"><center>ผู้จัดทำ</center></th>
                                        <th style="width: 15%"><center>อาจารย์ที่ปรึกษา</center></th>
                                        <th ><center>ปีพ.ศ.</center></th>
                                        <th style="width: 10%">เลือกยืม</th>
                                    </tr>
                                </thead>

                        <tbody>

                          <?php
                          include 'connect_book.php';

                          // $sql_borrow = "SELECT * FROM `bookborrow`
                          // LEFT JOIN book ON bookborrow.bookid = book.bookid
                          // ";
                          // $resultq = mysqli_query($conn, $sql_borrow);
                          $i = 1;
                          while($rowta = $resultq->fetch_assoc()) { 
                          // while($rowta = mysqli_fetch_array($resultq, MYSQLI_ASSOC))  {
                          ?>

                            <?php  if ($rowta["statusbook"]=='1') { ?>
                    
        <tr>
            <!-- <td><?php // echo $rowta['bookid']; ?></td> -->
            <td><div align="center"><?=$i;?></div></td>
             <!-- <td><a href="datagrower.php?GROWER_ID=<?php //  echo $row1["GROWER_ID"] ?>"><?php // echo $row1["FULLNAME"] ?></a></td>  -->
            <td><a href="detail_book_member.php?bookid=<?php  echo $rowta["bookid"] ?>"><?php echo $rowta['booknamethai']; ?></a></td>
            <td><?php echo $rowta['student']; ?></td>
            <td><?php echo $rowta['fname']; ?> <?php echo $rowta['lname']; ?></td>
            <td><?php echo $rowta['year']+543; ?></td>
            <td align="center">
              <label>
                <div class="checkbox" style="width: 85px;">
                  <input type="checkbox" name="bookid[]" value="<?php echo $rowta["bookid"];?>">                  
                </div>
              </label>
            </td>

        </tr>

        <?php  
       $i++; } } 
        //mysqli_free_result($result) ;
        
        ?>
            
                        </tbody>

                            </table>
                            <div class="col-sm-6 col-sm-offset-3 text-center">
                              <button type="submit" class="btn btn-primary" style="padding-right: 40px;padding-left: 40px;">บันทึกการยืม</button>
                              <p style="color: red;text-align: center;">***ผู้ยืมจะต้องคืนเล่มโครงงานภายในวันเวลาที่กำหนดไว้ </p>
                            </div>
                            

              <?php } ?>
            <div class="row" style="margin-left: 0px;margin-bottom: 15px;">

            <input type="hidden" name="memberid">
            
            <div class="col-lg-4" hidden="">
            <input readonly="readonly" type="text" id="borrowdate" name="borrowdate" class="datepicker form-control" 
            value="<?=date('Y-m-d')?>">
            </div>
            
            <!-- <div class="col-lg-2" > -->
            <!-- <label style="font-size: 20px">กำหนดส่งคืน : </label> -->
            <!-- </div> -->
           
            <div class="col-lg-3" hidden="">
            <input readonly="readonly" type="text" id="returndate" name="returndate" class="datepicker form-control"
            value="<?=date('Y-m-d',strtotime("+7 day"))?>" >
            </div>
            </div>

            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4" style="width: 94px;">
            <!-- <button type="submit" class="btn btn-primary" style="padding-right: 40px;padding-left: 40px;">บันทึกการยืม</button> -->
            </div>
            </div>
             <input type="hidden" name="memberid" value="<?php echo $_SESSION['memberid'];?>">
             <br>
             
          </form>


                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->

<?php // }  elseif ($row['statusbook']=='1') { ?>





<?php } } ?>

            </div>
            <!-- /.row -->
            
        </div>
    </div>
    <!-- /#wrapper -->
    
    <?php  include ('script_test.php'); ?>

<!-- </div> -->

</body>

</html>
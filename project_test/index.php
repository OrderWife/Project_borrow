 <?php
        session_start();
        include 'connect_book.php';

         if ( !isset($_SESSION['staffid']) ) {
            header("Location:index1.php");
        }
        if ( !isset($_SESSION['status_staff']) ) {
            header("Location:index1.php");
        }


// $sql = "SELECT * FROM `bookborrow`
// LEFT JOIN book ON bookborrow.bookid=book.bookid
// LEFT JOIN member ON bookborrow.memberid=member.memberid ";
// $result = mysqli_query($conn, $sql);

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
    <?php include('css.php'); ?>
    <?php include('datatable.php'); ?>

<!-- <style>
    div[id=page]{
    background-image: url("1360141979_2309.png");
}
</style> -->

    <style type="text/css">
   #dataTables-example_filter {
    display: none;
   }
   #dataTables-example_length{
    display: none;
   }
    </style>


</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <!-- /.navbar-header -->

           <?php include ('menu.php');?>

        <div id="page-wrapper" style="background-image: url('test-img.png');">
            <div class="row">
                <div class="col-lg-12" style="height: 60px;">
                        <p style="font-style: normal;font-size: 20px;margin-top: 10px;margin-bottom: 10px;padding-bottom: 0px;" class="page-header">รายการการยืมเล่มโครงงานการศึกษาเอกเทศ</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="height: 42px;background-color: #d7efd3">
                            รายการการยืม
                            <!-- <button class="btn btn-primary btn-xs" style="float: right;" data-toggle="modal" data-target="#myModal1">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"> เพิ่มข้อมูลเล่มโครงงาน
                                </span>
                            </button> -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal1">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"> เพิ่มข้อมูลเล่มโครงงาน
                                </span>
                            </button>

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                <thead>
                                            <tr>
            
                                                <th style="width: 55px;padding-right: 1px;padding-left: 1px;"><center >ลำดับที่</center> </th>
                                                <!-- <th style="width: 110px;padding-right: 1px;padding-left: 1px;"><center >เลขที่</center> </th> -->
                                                <th>รายการผู้ยืมเล่มโครงงาน</th>
                                                <th style="width: 15%" ><center style="">วันที่ยืม</center> </th>
                                                <th style="width: 15%"><center style="">กำหนดส่งคืน</center> </th>
                                                <th style="width: 12%"><center>สถานะ</center> </th>
                                                <!-- <th style="width: 30%" class="center">รายละเอียด </th> -->
                                                <!--<th class="center">แก้ไข</th>-->
                                                
                                            </tr>
                                </thead>
                                <tbody>                    

        <?php
        
        include 'connect_book.php';

$sql = "SELECT *  FROM `borrower`
LEFT JOIN member ON borrower.memberid = member.memberid ORDER BY borrowerid DESC ";
$result = mysqli_query($conn, $sql);
$today  = date('Y-m-d');
$i = 1;
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
          <?php // if($row["statusbook"]!='1') { ?>
        <tr>
            <?php 

                $theBorrow = date("d-m-",strtotime($row['borrowdate'])).date(date("Y",strtotime($row['borrowdate'])));
                $theReturn = date("d-m-",strtotime($row['returndate'])).date(date("Y",strtotime($row['returndate'])));

            ?>
            
            
            <td align="center"><?=$i;?></td>
            <!-- <td align="center"><?php // echo $row['borrowerid']; ?></td> -->
            <td><a href="report_borrow_staffpage.php?borrowerid=<?php  echo $row["borrowerid"] ?>&&memberid=<?php  echo $row["memberid"] ?>"><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></a></td>
            <td><?php echo DateThai($theBorrow); ?></td>
            <td><?php echo DateThai($theReturn); ?></td>

            
            <td> 
                <center>                    
        <?php {
            if ($row['status_member'] == 0 && $row['status_member'] != 3) { ?>
                <a href="approve.php?borrowerid=<?php echo $row['borrowerid']; ?>&&memberid=<?php echo $row['memberid']; ?>&&date=<?php echo $row['borrowdate']; ?>&total=0&&returnbook=<?php echo $today ;?>" style="color: white" >

                   <button class="btn btn-outline btn-success btn-xs" name="hdnSiteName" onclick="return confirm('ยืนยันการอนุมัติ ?')" >
                    รออนุมัติ
                    </button>
                   
                    <?php } else if ($row['status_member'] == 1){ 
                            if($today >= $row['returndate']){ ?>
                                    <a href="over.php?borrowerid=<?php echo $row['borrowerid']; ?>&&member_id=<?php echo $row['memberid']; ?>&&bookid=<?php echo $row['bookid']; ?>&&date=<?php echo $row['borrowdate']; ?>&total=1&&returnbook=<?php echo $today ;?>&&returndate=<?php echo $row['returndate']; ?>" style="color: white;font-size:12px" >
                                        <button class="btn btn-outline btn-danger btn-xs" style="padding-left: 10px;padding-right: 10px;"" name="hdnSiteName" onclick="return confirm('ยืนยันการคืน ?')" >
                                       เลยกำหนดส่ง
                                       </button>
                                    </a>
                    

                            <?php }else{ ?>
                                    <a href="update_status_borrow.php?borrowerid=<?php echo $row['borrowerid']; ?>&&member_id=<?php echo $row['memberid']; ?>&&bookid=<?php echo $row['bookid']; ?>&&date=<?php echo $row['borrowdate']; ?>&total=1&&returnbook=<?php echo $today ;?>"" style="color: white" >
                                       <button class="btn btn-outline btn-warning btn-xs" name="hdnSiteName" onclick="return confirm('ยืนยันการคืน ?')" >
                                        ค้างส่ง <?php // echo $row['statusbook'];?>
                                        </button>
                                    </a>
                            <?php } } ?>
            <?php if ($row['status_member'] == 3){ ?>                        
                        <p style="color: green" >
                            คืนแล้ว
                        </p>
            <?php } ?>
                </center>                                            
            </td>
           
        </tr>
        <?php  } $i++; } ?>
        <?php  
        //}
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
    </div>
    <!-- /#wrapper -->


    <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog ">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">เพิ่มข้อมูลเล่มโครงงาน</h4>
        </div>
        <div class="modal-body">


<form action="insert_book.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();" enctype="multipart/form-data">
<script>
    var yearOut=null;
    var mjIDOut=null;
    function getYear(theValue)
    {
        yearOut = theValue;
        if(mjIDOut != null && yearOut !=null)
            {
                genID(yearOut,mjIDOut);
            }
    }
    function getmjID(theValue)
    {
        mjIDOut = theValue;
        if(mjIDOut != null && yearOut !=null)
        {
            genID(yearOut,mjIDOut);
        }
    }
    function genID(year,mjID) {
      var xhttp;  
      var test = <?php echo"test"; ?>;  
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
           document.getElementById("booktest").innerHTML = this.responseText;
           // document.getElementById("booktest").value = this.resposivetext;
           // document.getElementById("mytext").value = "My value";
            // var sa = a.text;
           // document.getElementById("booktest").value = test ;
         }

       };
        xhttp.open("GET", "testGen.php?dateY="+year+"&&mjID="+mjID, true);
        xhttp.send();      
    }
    

</script>

<?php 

include 'connect_book.php';
$new_year=$row['year'];
$sql = "SELECT * FROM `book`";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
 ?>

            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-3">
                <?php $max_date=date('Y'); ?>
                <?php $min_date=date('Y')-2; ?>
                <label>ปีการศึกษา</label>
            <select class="form-control" name="year" id="year" onchange="getYear(this.value)">
                <option value="">--เลือกปีพ.ศ.--</option>
                <?php for($i=$max_date; $i>=$min_date; $i--){ ?>
                    <option<?php if($new_year==$i){ ?>selected="selected"<?php } ?> value="<?php echo $i+543; ?> "><?php echo $i+543; ?></option>
                <?php } ?>
            </select>
            </div>
            
            <div class="col-lg-5">
            <label>สาขาวิชา : </label>
            <?php 
                  $sql = "SELECT * FROM `major`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select name="majorid" id="majorid" class="form-control" onchange="getmjID(this.value)" >
            <option value="">--เลือกสาขาวิชา--</option>
            </div>  
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                  }
            ?>
            </select>
            </div>



            <div class="col-lg-4">
            <label >เลขที่เล่มโครงงาน : </label>
            <div id="booktest">
                <input type="text" name="bookid" id="bookid" class="form-control" value="">
            </div>
            </div>
            </div>
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-12">
            <label>ชื่อภาษาไทย : </label>
            <input type="text1" name="booknamethai" id="booknamethai" class="form-control" required="" />
            </div>
            </div>            
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-12">
            <label>ชื่อภาษาอังกฤษ : </label>
            <input type="text1" name="booknameeng" id="booknameeng" class="form-control" />
            </div>
            </div>
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-12">
            <label>คำสำคัญ : </label>
            <input type="text1" name="keyword" id="keyword" class="form-control" />
            </div>
            </div>

<!-- aa -->
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-6">           
            <label>นักศึกษา : </label>
            <input type="text" name="student" id="student" class="form-control" required="" />
            </div>
<!-- aa -->
            <div class="col-lg-6">
            <label>อาจารย์ที่ปรึกษา : </label>
            <?php
                  $sql = "SELECT * FROM `advisor`";
                  $result = mysqli_query($conn, $sql); 
            ?>
            <select class="form-control" name="advisorid" id="advisorid" required="">
            <option value="">---อาจารย์ที่ปรึกษา---</option> 
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[2] $row[3]</option>";
                  }
            ?>
            </select>
            </div>
            </div>
 <!-- zz -->
            <!-- <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-6">           
            <label>ปีพุทธศักราช : </label>
            <input type="text" name="year" id="year" class="form-control"  /> -->

            <!-- <select type="text2" name="year" id="year" class="form-control">
            <option value=" ">ปีการศึกษา</option>
              <?PHP // for($i=0; $i<=2; $i++) {?>
                <option ><?PHP // echo date("Y")-$i+543?></option>
              <?PHP //} ?>
            </select> -->
            <!-- </div> -->

            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-6">
                <?php $max_date=date('Y'); ?>
                <?php $min_date=date('Y')-2; ?>
                <label>ปีการศึกษา</label>
            <select class="form-control" name="year" id="year">
                <?php for($i=$max_date; $i>=$min_date; $i--){ ?>
                    <option<?php if($new_year==$i){ ?>selected="selected"<?php } ?> value="<?php echo $i; ?>"><?php echo $i+543; ?></option>
                <?php } } ?>
            </select>
            </div>

            <div class="col-lg-6"> 
            <label>ประเภทเล่มโครงงาน : </label>
            <?php 
                  $sql = "SELECT * FROM `booktype`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select type="text2" name="booktypeid" id="booktypeid" class="form-control" >
            <option value="">---ประเภทเล่มโครงงาน---</option> 
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                  }
            ?>
            </select>
            </div>
            </div>
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-12">
            <label>บทคัดย่อ : </label><br>
            <textarea type="text1" name="abstracts" id="abstracts" class="form-control" style="height: 100px"></textarea>
            </div>
            </div>
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-12">
            <label>ไฟล์ : </label>
            <input type="File" name="bookfilename" id="bookfilename" /></input>
            </div>
            </div>

<?php 
        mysqli_free_result($result) ;
        mysqli_close($conn);
 ?>

        </div>
        <div class="modal-footer">

          <button type="submit" class="btn btn-success" ">บันทึก</button>
          </form>
        </div>
      </div>
      
    </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<!--   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
  
  
<!--   <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
  <script src="../chosen/chosen.jquery.js" type="text/javascript"></script>
  <script src="../chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  <script src="../chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>

    <script type="text/javascript">
         $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"}); 
    </script> -->

<!--     <script>
      
      $(function(){
        
        //เรียกใช้งาน Select2
        $(".select2-single").select2();
        
        //ดึงข้อมูล province จากไฟล์ get_data.php
        $.ajax({
          url:"get_data_stu.php",
          dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
          data:{show_member:'show_member'}, //ส่งค่าตัวแปร show_province เพื่อดึงข้อมูล จังหวัด
          success:function(data){
            
            //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data
            $.each(data, function( index, value ) {
              //แทรก Elements ใน id province  ด้วยคำสั่ง append
                $("#studentid").append("<option value='"+ value.id +"'> " + value.name + value.surname +  "</option>");
            });
          }
        });
      });
      </script> -->

     <!--  <script>
      
      $(function(){
        
        //เรียกใช้งาน Select2
        $(".select2-single").select2();
        
        //ดึงข้อมูล province จากไฟล์ get_data.php
        $.ajax({
          url:"get_data_adv.php",
          dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
          data:{show_member:'show_member'}, //ส่งค่าตัวแปร show_province เพื่อดึงข้อมูล จังหวัด
          success:function(data){
            
            //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data
            $.each(data, function( index, value ) {
              //แทรก Elements ใน id province  ด้วยคำสั่ง append
                $("#advisorid").append("<option value='"+ value.id +"'> " + value.name + value.surname +  "</option>");
            });
          }
        });
      });
      </script> -->
  </div>

    <?php include ('script.php'); ?>

    <script>
      $(document).ready(function() {
          $('#dataTables-example1').DataTable( {
             responsive: true,
             ordering: false,
             // searching: false,
             info: false,
             paging:   false,
              "language": {
                  "zeroRecords": "ไม่มีรายการยืม",
                  "info": "แสดง START ถึง END จากทั้งหมด TOTAL รายการ",
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

<?php
session_start();
include 'connect_book.php';
$bookid = $_GET['bookid'];
$sql = "SELECT * FROM `book`
WHERE bookid = '$bookid'";
$result = mysqli_query($conn ,$sql);
    
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

            </div>
            <!-- /.navbar-header -->

           <?php include ('menu.php');?>

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
                            <h4 style="margin-top: 0px;">รายละเอียดเล่มโครงงาน</h4>
                            <a href="print_report_book_member.php?bookid=<?php echo $_GET['bookid']; ?>">
                            <button class="btn btn-primary"  id="printPreview2" onclick="myFunction()" style="margin-left: 95%;margin-top: -60px">
                            <span class="glyphicon glyphicon-print" aria-hidden="true"></span>
                            </button>
                            </a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="padding-top: 1px;">
                        
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <?php

include 'connect_book.php';

$sql = "SELECT * FROM `book` 
INNER JOIN advisor ON book.advisorid=advisor.advisorid
INNER JOIN booktype ON book.booktypeid=booktype.booktypeid 
WHERE bookid='$bookid'";

$result = mysqli_query($conn ,$sql);

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {

    ?>
    <br>
        <a class="edit-bookid" 
                data-bookid="<?php echo $row['bookid']; ?>" 
                data-booknamethai="<?php echo $row['booknamethai']; ?>"
                data-booknameeng="<?php echo $row['booknameeng']; ?>"
                data-keyword="<?php echo $row['keyword']; ?>"
                data-student="<?php echo $row['student']; ?>"
                data-advisorid="<?php echo $row['advisorid']; ?>"
                data-year="<?php echo $row['year']; ?>"
                data-booktypeid="<?php echo $row['booktypeid']; ?>"
                data-abstracts="<?php echo $row['abstracts']; ?>"
    >
    <button class="btn btn-primary btn-xs"  id="printPreview2" onclick="myFunction()"">
    <span class="glyphicon glyphicon-edit" aria-hidden="true"> แก้ไขข้อมูลเล่มโครงงาน</span>
    </button>
    </a>
    <br> 

    <br><label >เลขที่เล่มโครงงาน :</label> <?php echo $row['bookid']; ?><br>

    <label>ชื่อโครงงาน(ภาษาไทย) : </label> <?php echo $row['booknamethai']; ?><br>

    <label>ชื่อโครงงาน(ภาษาอังกฤษ) :</label> <?php echo $row['booknameeng']; ?><br>

    <label>คำสำคัญ :</label> <?php echo $row['keyword']; ?><br>

    <label>ชื่อนักศึกษา :</label> <?php echo $row['student']; ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
    <label>อาจารย์ที่ปรึกษา :</label> <?php echo $row['fname']; ?> <?php echo $row['lname']; ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>
    <label>ปีการศึกษา :</label> <?php echo $row['year']+543; ?>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<br>  
    <label>ประเภทเล่มโครงงาน :</label> <?php echo $row['booktype']; ?><br>
    
    <label>ไฟล์ : </label> &nbsp<a href="bookfilename/<?=$row["bookfilename"];?>"><?=$row["bookfilename"];?></a><br>
    
    <label>บทคัดย่อ :</label><p style="margin: 3px" width="50%"> <?php echo $row['abstracts']; ?></p><br>



    

    <?php  } ?>
    
                            </table>



            <!-- ส่วนรายงาน -->
            <!-- /.row -->
            <!-- <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="height: 40px;">
                            <h5 style="margin-top: 3px;">รายการการยืม-คืนเล่มโครงงาน </h5>
                        </div> -->
                        <!-- /.panel-heading -->
                        


                            
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
    </div>
    <!-- /#wrapper -->


    <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog ">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">แก้ไขข้อมูลเล่มโครงงาน</h4>
        </div>
        <div class="modal-body">


<form action="update_book.php" method="post" name="form2" onSubmit="JavaScript:return fncSubmit();" enctype="multipart/form-data">

<?php 

include 'connect_book.php';

$sql = "SELECT * FROM `book`";
$result = mysqli_query($conn, $sql);
$new_year1=$row['year'];
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
 ?>
        <!-- <label>เลขที่เล่มโครงงาน : </label> -->
            <input type="hidden" name="bookid" id="bookid" />

            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-12">
            <label>ชื่อภาษาไทย : </label>
            <input type="text1" name="booknamethai" id="booknamethai" class="form-control" />
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
            <input type="text" name="student" id="student" class="form-control"  />
            </div>


      <!--       <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-6">
            <label>นักศึกษา : </label>
            <?php
                  // $sql = "SELECT * FROM `student`";
                  // $result = mysqli_query($conn, $sql); 
            ?>
            <select class="form-control" name="studentid" id="studentid" >
            <option value="">---นักศึกษา---</option> 
            <?php 
                  // while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                  //       echo "<option value='$row[0]'>$row[2] $row[3]</option>";
                  // }
            ?>
            </select>
            </div> -->
<!-- aa -->
            <div class="col-lg-6">
            <label>อาจารย์ที่ปรึกษา : </label>
            <?php
                  $sql = "SELECT * FROM `advisor`";
                  $result = mysqli_query($conn, $sql); 
            ?>
            <select class="form-control" name="advisorid" id="advisorid" >
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
            <input type="text" name="year" id="year" class="form-control"  />   -->          
            <!-- <select type="text2" name="year" id="year" class="form-control">
            <option value=" ">ปีการศึกษา</option>
              <?PHP // for($i=0; $i<=2; $i++) {?>
                <option ><?PHP // echo date("Y")-$i+543?></option>
              <?PHP } ?>
            </select> -->
            <!-- </div> -->

            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-6">
                <?php $max_date=date('Y'); ?>
                <?php $min_date=date('Y')-2; ?>
                <label>ปีการศึกษา</label>
            <select class="form-control" name="year" id="year">
                <?php for($i=$max_date; $i>=$min_date; $i--){ ?>
                    <option<?php if($new_year1==$i){ ?>selected="selected"<?php } ?> value="<?php echo $i; ?>"><?php echo $i+543; ?></option>
                <?php  } ?>
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
            
            <!-- <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-12">
            <label>ไฟล์ : </label>
            <input type="File" name="bookfilename" id="bookfilename" /></input>
            </div>
            </div>
 -->

           <!--  <label>สถานะเล่มโครงงาน : </label>
            <?php 
       //           $sql = "SELECT * FROM `bookstatus`";
       //          $result = mysqli_query($conn, $sql);
            ?>
            <select name="bookstatusid" id="bookstatusid">
            <option value="">-สถานะเล่มโครงงาน-</option> 
            <?php 
       //           while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
       //                 echo "<option value='$row[0]'>$row[1]</option>";
                //  }
            ?>
            </select><br><br> -->


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
</div>
  

    <?php include ('script.php'); ?>

    <script type="text/javascript">
        $('.edit-bookid').click(function() { 
            var bookid = $(this).attr('data-bookid');
            var booknamethai = $(this).attr('data-booknamethai');
            var booknameeng = $(this).attr('data-booknameeng');
            var keyword = $(this).attr('data-keyword');
            var student = $(this).attr('data-student');
            var advisorid = $(this).attr('data-advisorid');
            var year = $(this).attr('data-year');
            var booktypeid = $(this).attr('data-booktypeid');
            var abstracts = $(this).attr('data-abstracts');
            //var bookfilename = $(this).attr('data-bookfilename');

            $("#bookid").val(bookid);
            $("#booknamethai").val(booknamethai);
            $("#booknameeng").val(booknameeng);
            $("#keyword").val(keyword);
            $("#student").val(student);
            $("#advisorid").val(advisorid);
            $("#year").val(year);
            $("#booktypeid").val(booktypeid);
            $("#abstracts").val(  abstracts);
            //$("#bookfilename").val(bookfilename);
            $("#myModal2").modal('show');
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
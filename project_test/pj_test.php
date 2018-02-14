<?php 
session_start();
include 'connect_book.php';

$sql = "SELECT * FROM `book`";
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
    <?php include('css.php'); ?>
    <?php include('datatable.php'); ?>

</head>
<body>
<!-- <script language="javascript">

function fncSubmit() {
  if(document.form1.booknamethai.value == "") {
alert('กรุณากรอกชื่อเล่มโครงงาน');
document.form1.booknamethai.focus();       
return false;
}  

  if(document.form1.booknameeng.value == "") {
alert('กรุณากรอกชื่อเล่มโครงงานภาษาอังกฤษ');
document.form1.booknameeng.focus();       
return false;
}  

 if(document.form1.keyword.value == "") {
alert('กรุณากรอกคำสำคัญ');
document.form1.keyword.focus();       
return false;
}  

 if(document.form1.advisorid.value == "") {
alert('กรุณากรอกชื่ออาจารย์ที่ปรึกษา');
document.form1.advisorid.focus();       
return false;
}  

 if(document.form1.student.value == "") {
alert('กรุณากรอกชื่อนักศึกษา');
document.form1.student.focus();       
return false;
}

 if(document.form1.year.value == "") {
alert('กรุณากรอกปีการศึกษา');
document.form1.year.focus();       
return false;
}

 if(document.form1.booktypeid.value == "") {
alert('กรุณากรอกปรเภทเล่มโครงงาน');
document.form1.booktypeid.focus();       
return false;
}

 if(document.form1.abstracts.value == "") {
alert('กรุณากรอกบทคัดย่อ');
document.form1.abstracts.focus();       
return false;
}
 
document.form1.submit();
}
</script> -->

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">อยู่ตรงไหนหว่า</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- /.navbar-header -->

           <?php include ('menu.php');?>

        <div id="page-wrapper">
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
                            <h4  style="margin-top: 0px;">รายการเล่มโครงงาน</h4>
                            <button class="btn btn-primary" style="margin-left: 80%;margin-top: -60px" 
                            data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-plus" aria-hidden="true"> เพิ่มข้อมูลเล่มโครงงาน</span></button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
            
                                        <th><center>เล่มโครงงาน</center> </th>
                                        <th style="width: 20%"><center>ผู้จัดทำ</center> </th>
                                        <th style="width: 10%"><center>ปีพ.ศ.</center> </th>
                                        <th style="width: 84px;padding-top: 0px;padding-bottom: 8px;padding-right: 0px;padding-left: 0px;"><center>รายละเอียด</center> </th>
                                        <th style="width: 84px;padding-top: 0px;padding-bottom: 8px;padding-right: 0px;padding-left: 0px;"><center>แก้ไข</center></th>
                                    </tr>
                                </thead>
                                <tbody>                    

<?php
        include 'connect_book.php';

        $sql = "SELECT * FROM `book` ORDER BY bookid DESC";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
        <tr>
            
            <td><?php echo $row['booknamethai']; ?></td>

            <td><?php echo $row['student']; ?></td>

            <td><?php echo $row['year']+543; ?></td>
            
            <td>
                <center>
                    <!-- <button class="btn btn-info" style="background-color: #FFFF00"> -->
                    <a href="detail_book.php?bookid=<?php echo $row['bookid']; ?>">
                        <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                    </a>
                    <!-- </button> -->
                </center>
            </td>
            <td>
            <center>
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
                <!-- <button class="btn btn-info" style="background-color: #33CC33">  -->
                <!-- <a href="edit_book.php?id= <?php // echo $row['bookid']; ?>"> -->
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>                
                <!-- </button> -->
                </a>
            </center>
            </td>
        </tr>

        <?php  
    }

        mysqli_free_result($result) ;
        mysqli_close($conn);

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
            <input type="text" name="year" id="year" class="form-control"  />  -->           
            <!-- <select type="text2" name="year" id="year" class="form-control">
            <option value=" ">ปีการศึกษา</option>
              <?PHP // for($i=0; $i<=2; $i++) {?>
                <option ><?PHP // echo date("Y")-$i+543?></option>
              <?PHP // } ?>
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

<?php 

include 'connect_book.php';

$sql = "SELECT * FROM `book`";
$result = mysqli_query($conn, $sql);
$new_year=$row['year'];

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
?>
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-3">
                <?php $max_date=date('Y'); ?>
                <?php $min_date=date('Y')-2; ?>
                <label>ปีการศึกษา</label>
            <select class="form-control" name="year" id="year">
                <?php for($i=$max_date; $i>=$min_date; $i--){ ?>
                    <option<?php if($new_year==$i){ ?>selected="selected"<?php } ?> value="<?php echo $i; ?>"><?php echo $i+543; ?></option>
                <?php }  ?>
            </select>
            </div>

<!-- ajax -->
            <label type="" name="" id="txtHint"><i>Person info will be listed here.</i></label>
     <!--  <div id="txtHint"></div> -->
          <script>
            function showUser(str) {
              if (str=="") {
                document.getElementById("txtHint").innerHTML="";
                return;
              } 
              if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
              } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                  document.getElementById("txtHint").innerHTML=this.responseText;
                }
              }
              xmlhttp.open("GET","ajax_test.php?q="+str,true);
              xmlhttp.send();
            }
            </script>


            
            <div class="col-lg-3">
            <label>สาขาวิชา : </label>
            <?php 
                  $sql = "SELECT * FROM `major`";
                  $result = mysqli_query($conn, $sql);
            ?>
            <select name="majorid" id="majorid" class="form-control" >
            <option value="">---สาขาวิชา---</option></div>  
            <?php 
                  while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
                        echo "<option value='$row[0]'>$row[1]</option>";
                  }
            ?>
            </select>
            </div>



            <div class="col-lg-6">
            <label>เลขที่เล่มโครงงาน : </label>
            <input type="text" name="bookid" id="txtHint" class="form-control" />
            </div>
            </div>
            
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

               
</body>

</html>
<!--  -->
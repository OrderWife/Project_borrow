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
    if (@($_GET['booktypeid']!="")){ 
        echo $sqlq = "SELECT * FROM book
        left join advisor on book.advisorid = advisor.advisorid where book.booktypeid = $booktypeid ";
        
        if (($_GET['advisorid']!="")){
          echo $sqlq.=" and advisor.advisorid = $advisorid";
          if (($_GET['year']!="")){
            echo $sqlq.=" and book.year = $year";
          }
        }
        if (($_GET['year']!="")){
            echo $sqlq.=" and book.year = $year";
          }
        $resultq = mysqli_query($conn, $sqlq);
      
    }else{
        $sqlq = "SELECT * FROM book
        left join advisor on book.advisorid = advisor.advisorid";
        $resultq = mysqli_query($conn, $sqlq);
        $row2 = $resultq->fetch_assoc();
    }
?>

<?php  
      $sql2 = "SELECT * FROM `booktype` ";
      $result2 = mysqli_query($conn, $sql2);
      $sqltest = "SELECT * FROM `advisor` ";
      $resulttest = mysqli_query($conn, $sqltest);
      
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

    <title>ระบบการยืม-คืนเล่มโครงงานการศึกษาเอกเทศ</title>
<?php include ('css_member.php'); ?>
<?php include('datatable_member.php'); ?>

</head>

<body> 

    <div id="wrapper">
<?php include ('menu_member.php'); ?>
        <!-- Page Content -->
        <div id="page-wrapper" style="background-image: url('test-img.png');">
            <div class="row">
                <!-- <div class="col-lg-12"> -->
                
                    <!-- <h4>ค้นหาเล่มโครงงาน..</h4> -->
                <!-- </div> -->
                

                <div class="col-lg-12" style="margin-top: 20px;">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="height: 42px;background-color: #d7efd3">
                          <h4 style="margin-top: 0px;">รายการยืมเล่มโครงงาน</h4>

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="padding-top: 0px;">
                   <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">


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

                    <form action="testSelect.php" method="GET">
                    <div class="row" style="margin-left: 0px;margin-bottom: 15px">
                    <!-- <div class="row"> -->
                        <!-- <div class="col-lg-4">

                        <select name="semester" class="form-control" style="width: 100px;" required>
                            <option value="" <?php // if(@$_GET['booktype']==''){ ?> selected <?php // } ?>>
                                ประเภทเล่มโครงงาน
                            </option>
                            <option value="1" <?php // if(@$_GET['semester']=='1'){ ?> selected <?php // } ?>>
                               1
                            </option>
                            <option value="2" <?php // if(@$_GET['semester']=='2'){ ?> selected <?php // } ?>>
                                2
                            </option>
                        </select>
                        </div>
 -->
                        <h4>ค้นหาเล่มโครงงาน...</h4>
                        <div class="col-lg-3">
                        <select name="booktypeid" class="form-control" style="width: 180px;">

                              <option value="" <?php if(@$_GET['booktypeid']==''){ ?> selected <?php  } ?>>ทั้งหมด</option>
                                <?php  while($row2 = $result2->fetch_assoc()){ ?>

                              <option <?php if(@$_GET['booktypeid']==$row2['booktypeid']){ ?> selected <?php  } ?> value="<?php echo $row2['booktypeid']; ?>"><?php echo $row2['booktype']; ?></option>
                                <?php } ?>

                        </select><br>
                            </div>

                            <div class="col-lg-3">

                        <select name="advisorid" class="form-control" style="width: 180px;">
                              <option value="" <?php if(@$_GET['advisorid']==''){ ?> selected <?php  } ?>>อาจารย์ที่ปรึกษา</option>
                                <?php  while($rowtest = $resulttest->fetch_assoc()){ ?>

                              <option <?php if(@$_GET['advisorid']==$rowtest['advisorid']){ ?> selected <?php  } ?> value="<?php echo $rowtest['advisorid']; ?>"><?php echo $rowtest['fname'];echo" "; echo $rowtest['lname']; ?></option>
                                <?php } ?>

                        </select>
                            </div>

                            <div class="col-lg-3">
                              <?php $max_date=date('Y'); ?>
                              <?php $min_date=date('Y')-2; ?>
                        <select name="year" class="form-control" style="width: 180px;">
                              <?php for($i=$max_date; $i>=$min_date; $i--){?>
                          <option value="<?php echo $i; ?>"><?php echo $i+543; ?></option>
                <?php  } ?>

                        </select>
                            </div>
                            
                            <div class="col-lg-2">
                       <input type="hidden" name="submit" value="y"> 
                        <button type="submit" class="btn btn-success" style=" width: 55px; margin-left: 9px;">ค้นหา</button>
                        </div>
                        </div>
                    </form>
                    </div>

                                <thead>
                                    <tr>
                                        <th ><center>ชื่อเรื่อง</center></th>
                                        <th ><center>ผู้จัดทำ</center></th>
                                        <th style="width: 15%"><center>อาจารย์ที่ปรึกษา</center></th>
                                        <th ><center>ปีพ.ศ.</center></th>
                                        <th style="width: 10%"></th>
                                    </tr>
                                </thead>

                        <tbody>
                          <?php while($rowta = $resultq->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $rowta['booknamethai']; ?></td>
            <td><?php echo $rowta['student']; ?></td>
            <td><?php echo $rowta['fname']; ?> <?php echo $rowta['lname']; ?></td>
            <td><?php echo $rowta['year']+543; ?></td>
            <td><center><input name="select_all" value="1" id="example-select-all" type="checkbox" /></center></td>

        </tr>

        <?php  
        }
        //mysqli_free_result($result) ;
        
        ?>
            

                        </tbody>

                            </table>
<!-- <h4>กำหนดส่งคืน</h4> -->

            <div class="row" style="margin-left: 0px;margin-bottom: 15px;">
            
            <div class="col-lg-4" hidden="">
            <input readonly="readonly" type="text" id="borrowdate" name="borrowdate" class="datepicker form-control" 
            value="<?=date('Y-m-d')?>">
            </div>
            
            <div class="col-lg-2" >
            <label style="font-size: 20px">กำหนดส่งคืน : </label>
            </div>
           
            <div class="col-lg-3" style="width: 250px;padding-left: 0px;">
            <input readonly="readonly" type="text" id="returndate" name="returndate" class="datepicker form-control"
            value="<?=date('Y-m-d',strtotime("+7 day"))?>" >
            </div>
            </div>

            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-4" style="width: 94px;">
            <button type="submit" class="btn btn-primary" style="padding-right: 40px;padding-left: 40px;">บันทึก</button>
            </div>
            </div>


                            </div>
                    </div>
                </div>
            </div>
            
        </div><?php include ('script.php'); ?>
</div>
    <!-- jQuery -->
    

</body>

</html>

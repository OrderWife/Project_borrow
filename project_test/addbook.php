<?php
session_start();
include 'connect_book.php';

$sql = "SELECT * FROM `bookborrow` 
INNER JOIN book ON bookborrow.bookid=book.bookid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

              $sql_condit = "SELECT * FROM `condition`";
              $result_condit = mysqli_query($conn, $sql_condit);
              $row_condit = mysqli_fetch_array($result_condit, MYSQLI_ASSOC);
              $date_number = $row_condit['date_number'];
              $book_number = $row_condit['book_number'];

$bookid = $_POST['bookid'];
 $_SESSION['bookid'] = $_POST['bookid'];
// echo "<pre>";
// print_r($bookid);
// echo "</pre>";
$booknamethai = $_POST['booknamethai'];
$memberid = $_POST['memberid'];
$borrowdate = $_POST['borrowdate'];
$returndate = $_POST['returndate'];
$borrowerid = $_POST['borrowerid'];

for($i=0;$i<count($bookid);$i++){
        if($bookid[$i] != ""){
             $bookid[$i];
             $_SESSION['memberid'] = $memberid;
             $_SESSION['borrowdate'] = $borrowdate;
             $_SESSION['returndate'] = $returndate;
             $_SESSION['borrowerid'] = $borrowerid;
             $_SESSION['booknamethai'] = $booknamethai;
        }
    }
//echo count($bookid);  
//echo $date_number;

?>



<?php if (count($bookid) > $book_number) { include'no_borrow.php'; ?>



<?php } else { ?>

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

</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

           <?php include ('menu_member.php');?>

        <div id="page-wrapper" style="background-image: url('test-img.png');">
            <div class="row"><br>
            </div>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="height: 42px;background-color: #d7efd3">
                            <?php 

                            ?>
                            <h4 style="margin-top: 0px;">รายการเล่มโครงงาน </h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

<form name="frmMain" action="save_approve.php" method="post" OnSubmit="return onSave();">

                            <table width="100%" class="table table-striped table-bordered table-hover" >
                               
                                <thead>
                                            <tr>
                                                <th style="width: 55px;padding-right: 1px;padding-left: 10px;">ลำดับที่</th>
                                                <th>เล่มโครงงาน</th>
                                                <th width="15%"><center>นำรายการออก</center></th>
                                            </tr>
                                </thead>
                                <tbody>
                   
                                     <?php 
                                     $a = 1;
                                        for($i=0;$i<count($bookid);$i++) {
                                            if($bookid[$i] != "") { ?>

                                            <tr>
                                                <td ><center><?=$a;?></center></td>
                                                <td><?php echo $bookid[$i]; ?><?php  echo $row['bookid']; ?></td>
                                                <td>
                                                    <center>
                                                        <a href="remove_listbook.php?bookid=<?php echo $bookid[$i];?>">
                                                            <span class="text-danger">
                                                            Remove
                                                            </span>
                                                        </center>
                                                    </a>
                                                <button class="btn btn-default" type="button" data-toggle="tooltip" data-placement="top" title="ลบ" onclick="delUser('<?=$row["bookid[$i]"];?>', '<?=$row["booknamethai"];?>')">
                                                <i class="fa fa-trash"></i>
                                                </button>
                                                </td>
                                                <input type="hidden" name="bookid[]" value="<?php echo $row["bookid"];?>">

                                                <input type="hidden" name="memberid">

                                                <input type="hidden" name="borrowerid">
                                                
                                                <input type="hidden" readonly="readonly" type="text" id="borrowdate" name="borrowdate" class="datepicker form-control" 
                                                value="<?=date('Y-m-d')?>">
                                                </div>                                                                                    
                                               
                                                <input type="hidden" readonly="readonly" type="text" id="returndate" name="returndate" class="datepicker form-control"
                                                value="<?=date('Y-m-d',strtotime("+$date_number day"))?>" >

                                                 <input type="hidden" name="memberid" value="<?php echo $_SESSION['memberid'];?>">

                                                 <input type="hidden" name="booknamethai" value="">
                                                 
                                                <input type="hidden" name="borrowerid" value="<?php echo $row_borrower['borrowerid']+1; ?>">
                                            </tr>

                                    <?php  } $a++; } ?>

                            </tbody>
                            </table>
                            <div class="col-sm-6 col-sm-offset-3 text-center">
                              <button type="submit" class="btn btn-primary" style="padding-right: 40px;padding-left: 40px;">บันทึกการยืม</button>
                              <p style="color: red;text-align: center;">***ผู้ยืมจะต้องคืนเล่มโครงงานภายในวันเวลาที่กำหนดไว้ </p>
                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

</form>
    </div>
    <!-- /#wrapper -->
    <?php } ?>

    <?php include ('script_member.php'); ?>


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

                // $theBorrow = $row['borrowdate'];
                // $theReturn = $row['returndate'];
                // echo "ThaiCreate.Com Time now : ".DateThai($strDate);
            ?>



</body>

</html>


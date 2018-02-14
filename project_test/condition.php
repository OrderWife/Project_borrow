<?php 
session_start();
 include 'connect_book.php';


$sql = "SELECT * FROM `condition`";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    

    <title>ระบบการยืม-คืนเล่มโครงงานการศึกษาเอกเทศ</title>
    <?php   include('css.php'); ?>
    <?php   include('datatable.php'); ?>



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
                            <h4 style="margin-top: 0px;">
                            เงื่อนไขในการยืมเล่มโครงงาน
                            </h4>
                            <!-- <button class="btn btn-primary" style="margin-left: 80%;margin-top: -60px" data-toggle="modal" data-target="#myModal1">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"> เพิ่มข้อมูลคำนำหน้าชื่อ</span>
                            </button> -->
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                        <!-- <form action="insert_titlename.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();"> -->
                            <!-- <h3><a href="index.php"></a></h3> -->
                            <!-- <label>คำนำหน้าชื่อ : </label>
                            <input type="text" name="titlename" id="titlename" />
                            <button type="submit" class="btn btn-success" ">บันทึก</button> </form> -->


    <form action="insert_condition.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();" >
       <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-6">
            <label>จำนวนเล่มโครงงานที่ยืมได้(ต่อครั้ง) : </label>
            <input type="text" name="book_number" id="book_number" class="form-control" onKeyPress="return bannedKey(event,this.value)" required autofocus />
             จำนวนเล่มปัจจุบัน <?php echo $row['book_number']; ?> เล่ม
            </div>
            </div>            
            
            <div class="row" style="margin-left: 0px;margin-bottom: 15px">
            <div class="col-lg-6">
            <label>จำนวนวันที่สามารถยืมได้(ต่อครั้ง) : </label>
            <input type="text1" name="date_number" id="date_number" class="form-control" onKeyPress="return bannedKey(event,this.value)" required autofocus />
             จำนวนวันที่ปัจจุบัน <?php echo $row['date_number']; ?> วัน
            </div>
            </div>
        
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" ">บันทึก</button>
          </form>
        </div>
                            
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


      <!-- Modal -->
    
  <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">แก้ไขข้อมูลคำนำหน้าชื่อ</h4>
        </div>
        <div class="modal-body">


<form action="update_titlename.php" method="post" >

    <input type="hidden" name="titlenameid" id="titlenameid" >

    <label>คำนำหน้าชื่อ : </label>
    <input type="text" name="titlename" id="titlename" style="
    width: 35%;
    padding: 5px 20px;
    margin: -5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;" required autofocus />


        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" ">บันทึก</button>
          </form>
        </div>
      </div>
      
    </div>
  </div>



 
    <!-- Modal -->
    
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">เพิ่มข้อมูลคำนำหน้าชื่อ</h4>
        </div>
        <div class="modal-body">


<form action="insert_titlename.php" method="post" ">
    <h3><a href="index.php"></a></h3>

    <label>คำนำหน้าชื่อ : </label>
    <input type="text" name="titlename"  style="
    width: 35%;
    padding: 5px 20px;
    margin: -5px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;" required autofocus/>

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
        $('.edit-titlename').click(function() { 
            var titlename = $(this).attr('data-titlename');
            var titlenameid = $(this).attr('data-titlenameid');
            $("#titlename").val(titlename);
            $("#titlenameid").val(titlenameid);
            $("#myModal2").modal('show');
        });

    </script>


    <script type="text/javascript"> //กำหนดตัวอักษร
function bannedKey(evt,str)
{
    var allowedEng = false; //อนุญาตให้คีย์อังกฤษ
    var allowedThai = false; //อนุญาตให้คีย์ไทย
    var allowedNum = true; //อนุญาตให้คีย์ตัวเลข
    
    var k;
    if (window.event) k = window.event.keyCode; // ใช้กับ IE
    else if (evt) k = evt.which; // ใช้กับ Firefox
    
    /* เช็คตัวเลข 0-9 */
    if (k>=48 && k<=57) { return allowedNum; }
    
    /* เช็คคีย์อังกฤษ a-z, A-Z */
    if ((k>=65 && k<=90) || (k>=97 && k<=122)) { return allowedEng; }
    
    /* เช็คคีย์ไทย ทั้งแบบ non-unicode และ unicode */
    if ((k>=161 && k<=255) || (k>=3585 && k<=3675)) { return allowedThai; }
    
    /* เช็ค "." กรณีอนุญาติให้กรอกเฉพาะตัวเลข ให้สามารถใส่ . ได้ 1 ตัวเท่าันั้น */
    if (!allowedEng && !allowedThai && allowedNum){
    for(i=0;i<str.length;i++){
        if(str[i]=="."){ if(k!=46){return true}else{return false} }
    }
    }
}
</script>



</body>

</html>
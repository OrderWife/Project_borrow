<?php 
session_start();
include 'connect_book.php';

$sql = "SELECT * FROM `bookborrow`";
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
    <?php include('css.php'); ?>
    <?php include('datatable.php'); ?>

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
dateFormat:'yy-mm-dd',minDate:1,maxDate:7,
});
});
</script>

<style>
body {
    margin: 0;
}


h3 {
    font-family: "Segoe UI",Arial,sans-serif;
    font-weight: 400;
    margin: 10px 0;
}

input[type=text] {
    width: 25%;
    padding: 3px 6px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

select{
    width: 25%;
    
    padding: 6px 6px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;    
}

 textarea {
    width: 85%;
    height: 120px;
    padding: 6px 6px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    font-size: 16px;
    resize: none;
}

</style>



</head>
<body>

<script language="javascript">

function fncSubmit() {
  if(document.form1.memberid.value == "") {
alert('กรุณากรอกชื่อสมาชิก');
document.form1.memberid.focus();
return false;
}  
  if(document.form1.borrowdate.value == "") {
alert('กรุณากรอกรข้อมูลวันที่ยืม');
document.form1.borrowdate.focus();       
return false;
}  
  if(document.form1.returndate.value == "") {
alert('กรุณากรอกข้อมูลวันที่คืน');
document.form1.returndate.focus();       
return false;
}  
document.form1.submit();
}

</script>


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
                        <div class="panel-heading">
                            <h4>ยืมเล่มโครงงาน</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
                        <form action="insert_borrow.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();"><br>

    <?php

    include 'connect_book.php';
    $bookid = $_GET['bookid'];
    $sql_book = "SELECT * FROM `book`

    INNER JOIN advisor ON book.advisorid=advisor.advisorid WHERE bookid = '$bookid'";
    $result_book = mysqli_query($conn, $sql_book);

        while($row = mysqli_fetch_array($result_book, MYSQLI_ASSOC))  
        {
        ?>
            <label>ชื่อโครงงาน(ภาษาไทย) : <br></label> <?php echo $row['booknamethai']; ?><br>
            <label>ชื่อโครงงาน(ภาษาอังกฤษ) : <br></label> <?php echo $row['booknameeng']; ?><br>
            <label>ผู้จัดทำ : <br></label> <?php echo $row['student']; ?>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <label>อาจารย์ที่ปรึกษา : <br></label> <?php echo $row['fname']; ?> <?php echo $row['lname']; ?>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp             
            <label>ปีพ.ศ. : <br></label> <?php echo $row['year']; ?>
            <input type="hidden" id="bookid" name="bookid" value="<?php echo $row['bookid']; ?>" ><br>
                          
            
            ชื่อผู้ยืม : 
            <?php 
                   $sql2 = "SELECT * FROM `member`";
                   $result2 = mysqli_query($conn, $sql2);
             ?>
            <select class="select2-single" id="memberid" name="memberid" onchange="showUser(this.value)" >
            <option value=""> -- ผู้ยืม --</option>
<?php 
                   while ($row = mysqli_fetch_array($result2, MYSQLI_NUM)) {
                         echo "<option value='$row[0]'>$row[2] $row[3]</option>";
                   }
           ?>
        
            </select>&nbsp&nbsp

            <!-- ajax -->
            <label id="txtHint"><i>Person info will be listed here.</i></label>
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
            <!-- <?php 
            //       $sql2 = "SELECT * FROM `member`";
            //       $result2 = mysqli_query($conn, $sql2);
            // ?>
            //         <select name="memberid" id="memberid">
            //         <option value="">ผู้ยืม</option> 
             <?php 
            //       while ($row = mysqli_fetch_array($result2, MYSQLI_NUM)) {
            //             echo "<option value='$row[0]'>$row[2] $row[3]</option>";
            //       }
           ?>
            </select>&nbsp &nbsp-->
 

<?php  
        }
        mysqli_free_result($result_book) ;

        ?> 

            <br>

             <?php 
                $theBorrow = date("d-m-",strtotime($row['borrowdate'])).date(date("Y",strtotime($row['borrowdate']))+543);
                $theReturn = date("d-m-",strtotime($row['returndate'])).date(date("Y",strtotime($row['returndate']))+543);
            ?>

            วันที่ยืม : <input disabled type="text" id="borrowdate" name="borrowdate" class="datepicker" 
            style="margin-top: 15px; margin-bottom:6px; " value="<?=date('Y-m-d')?>">&nbsp&nbsp<br>

            วันที่คืน : <input type="text" id="returndate" name="returndate" class="datepicker"
            value="<?=date('Y-m-d',strtotime("+7 day"))?>">
 
        <br><br>            
        <button style="margin-left: 230px" type="submit" class="btn btn-success" >บันทึก</button><br>

    </form>
     </div>
   </div>
  </div>


                            

    </div>
    <!-- /#wrapper -->

    <?php  include ('script_test.php'); ?>
     <!-- นำเข้า Javascript jQuery -->
<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
  
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
  <script src="../chosen/chosen.jquery.js" type="text/javascript"></script>
  <script src="../chosen/docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  <script src="../chosen/docsupport/init.js" type="text/javascript" charset="utf-8"></script>

    <script type="text/javascript">
         $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"}); 
    </script>

    <script>
      
      $(function(){
        
        //เรียกใช้งาน Select2
        $(".select2-single").select2();
        
        //ดึงข้อมูล province จากไฟล์ get_data.php
        $.ajax({
          url:"get_data.php",
          dataType: "json", //กำหนดให้มีรูปแบบเป็น Json
          data:{show_member:'show_member'}, //ส่งค่าตัวแปร show_province เพื่อดึงข้อมูล จังหวัด
          success:function(data){
            
            //วนลูปแสดงข้อมูล ที่ได้จาก ตัวแปร data
            $.each(data, function( index, value ) {
              //แทรก Elements ใน id province  ด้วยคำสั่ง append
                $("#memberid").append("<option value='"+ value.id +"'> " + value.name + value.surname +  "</option>");
            });
          }
        });
      });
      </script>
</div>
</body>

</html>
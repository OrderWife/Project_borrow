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
dateFormat:'yy-mm-dd',minDate:1, maxDate:7,
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
  if(document.form1.bookid1.value == "") {
alert('กรุณาเลือกเล่มโครงงาน');
document.form1.bookid1.focus();
return false;
}

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
                        <div class="panel-heading" style="height: 42px;background-color: #d7efd3" >
                            <h4 style="margin-top: 0px;">ยืมเล่มโครงงาน</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        
                        <form action="insert_borrow.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();"><br>

   <?php

    include 'connect_book.php';
    //$bookid = $_GET['bookid'];
    $sql_book = "SELECT * FROM `book`

    INNER JOIN advisor ON book.advisorid=advisor.advisorid ";
    $result_book = mysqli_query($conn, $sql_book);

        ?>
        
            เล่มที่ 1 : 
            <?php 
                $sql1 = "SELECT * FROM `book`";
                $sqlBookid = "SELECT bookid,statusbook FROM `bookborrow` where statusbook = 0 ORDER BY bookid DESC ";
                $result1 = mysqli_query($conn, $sql1);
                $resultBookid = mysqli_query($conn, $sqlBookid);
             ?>
            <select multiple="multiple" style="width: 800px;" class="select2-single" id="bookid1" name="bookid1" >
            <option value=""> -- เล่มโครงงาน --</option>

            <?php 
                $arrayBookid = array();
                $arrayBookid[0] = 0;
                $arKey=0;
                while ($rowBookid = mysqli_fetch_array($resultBookid, MYSQLI_NUM)) 
                  {
                    $arrayBookid[$arKey]= $rowBookid[0];
                    $arKey+=1;
                  }
                  $maxArr=sizeof($arrayBookid);
                
                while ($row1 = mysqli_fetch_array($result1, MYSQLI_NUM)) 
                {
                  $check=0;
                  for($arlength =0;$arlength < $maxArr;$arlength++)
                  {
                    if($row1[0] == $arrayBookid[$arlength])
                    {
                        $check+=1;
                        continue;
                    }

                    if($check == 0 && $arlength == ($maxArr -1))
                    {
                      echo "<option value='$row1[0]'>$row1[1]</option>";
                      break;
                    }

                  }
                  
                }

           ?>        
            </select><br><br>
                          
            
            ชื่อผู้ยืม : <!-- <P><strike>55555555</strike></P> -->
            <?php 
                   $sql2 = "SELECT * FROM `member`";
                   $sqlCheckMember = "SELECT memberid,COUNT(statusbook) as countBook 
                   FROM `bookborrow` 
                   WHERE statusbook=0 
                   GROUP BY memberid";
                   $result2 = mysqli_query($conn, $sql2);
                   $resultBlackList = mysqli_query($conn, $sqlCheckMember);
             ?>
            <select class="select2-single" id="memberid" name="memberid" onchange="showUser(this.value)" >
            <option value="">-- ผู้ยืม --</option>

            <?php 
            #StartBlackListMember
                  $blackList = array();
                  $blackList[0] = 0;
                  $blKey=0;
                  while ($rowBL = mysqli_fetch_array($resultBlackList, MYSQLI_NUM)) {
                   // echo "<option value='$rowBL[0]'>$rowBL[0] $rowBL[1]</option>";
                     if($rowBL[1]>=3)
                     {
                        $blackList[$blKey]=$rowBL[0];
                        $blKey+=1;
                     }
                  }
            #EndBlackListMember
            #StartCheckMember_in_BlackList
                  
                  $maxMemberBL=sizeof($blackList);
                  // for($Loop_blKey=0;$Loop_blKey < $maxMemberBL; $Loop_blKey++) //check mdmberid
                  // {
                  //    echo "<option value='$rowBL[0]'>$blackList[$Loop_blKey]</option>";
                  // }
                  while ($row = mysqli_fetch_array($result2, MYSQLI_NUM)) {
                        $memberBl=false;
                         for($Loop_blKey=0;$Loop_blKey < $maxMemberBL; $Loop_blKey++)
                         {
                            if($row[0]==$blackList[$Loop_blKey])
                            {
                              $memberBl=true;
                              continue;
                            }

                            if(!$memberBl && $Loop_blKey == ($maxMemberBL-1))
                            {
                              echo "<option value='$row[0]'>$row[2] $row[3]</option>";
                              break;
                            }

                         }

                  }
            #EndCheckMember_in_BlackList
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
              xmlhttp.open("GET","ajax_brand.php?q="+str,true);
              xmlhttp.send();
            }
            </script>
              

        <?php  
          //}
        mysqli_free_result($result_book) ;
          //}
        ?> 

            <br>

            <?php 
                $theBorrow = date("d-m-",strtotime($row['borrowdate'])).date(date("Y",strtotime($row['borrowdate']))+543);
                $theReturn = date("d-m-",strtotime($row['returndate'])).date(date("Y",strtotime($row['returndate']))+543);
            ?>
            
            วันที่ยืม : <input readonly="readonly" type="text" id="borrowdate" name="borrowdate" class="datepicker" 
            style="margin-top: 15px; margin-bottom:6px; " value="<?=date('Y-m-d')?>">

            <br>

            วันที่คืน : <input readonly="readonly" type="text" id="returndate" name="returndate" class="datepicker"
            value="<?=date('Y-m-d',strtotime("+7 day"))?>">

        <br><br>
        <button style="margin-left: 230px" type="submit" class="btn btn-success" >บันทึก</button><br>
<!--         <?php // if($a == true) {?>
          <button style="margin-left: 230px" type="submit" class="btn btn-success" >บันทึก</button><br>
          <?php // }else{ ?>
          <button disabled="" style="margin-left: 230px" type="submit" class="btn btn-success" >บันทึก</button><br>
          <?php //} ?>
 -->
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
     <!-- <script type="text/javascript">
        $(function(){ 
        $("#bookid1").change(function() {
          var bookid1 = $("#bookid1").val();
          var bookid2 = $('#bookid2').attr(option : );
          
          
          alert(bookid2);
          });
        });
     </script>
 -->

     <!-- <script type="text/javascript">
  $(document).ready(function(){
  $("bookid1").change(function(){
    var bookid2 = $(this).attr("for")-1,
      bookid1 = $("option:selected",this).val();
    $("bookid1").each(function(index,value){
      if(bookid2 != index){
        $("option[value='"+bookid1+"']",this)
        .attr("disabled","disabled");
      }
    });
  });
  });
  </script> -->

  
     <!-- <script type="text/javascript">
  $(document).ready(function(){
    $("select.nodup").change(function(){
    var curSelection = $(this).attr("for")-1,
      curOption = $("option:selected",this).val();
    $("select.nodup").each(function(index,value){
      if(curSelection != index){
        $("option[value='"+curOption+"']",this)
        .attr("disabled","disabled");
      }
    });
  });
  });
  </script> -->

</div>
</body>

</html>
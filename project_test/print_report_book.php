<?php
session_start();
include 'connect_book.php';
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
    <?php // include('datatable.php'); ?>
<style type="text/css">

    body{
        padding-left: 30px;
        padding-right: 30px;
        padding-bottom: 15px;
    }
</style>
<style type="text/css" media="print">
#printPreview{
    display:none;
}
</style>
<style> 
@font-face {
    font-family: txt;
    src: url(../THSarabun.ttf);
}
@font-face {
    font-family: txtl;
    src: url(font/b/v.ttf);
}
body {
    font-family: txt;
}
td{
    padding: 7px;
}
</style>

</head>
<center><button  id="printPreview" onclick="myFunction()" style="margin-top: 10px;font-size: 20px;">พิมพ์</button></center>

<body>
<div class="container" style="background-color: #fff; width: 1024px; min-height: 650px;" >
</br>
</br>
   <B style="font-size: 29px;"><center>รายการเล่มโครงงาน</center></B>
                            <table border="1">
                                
                                    <tr>
                                        <th style="width: 60px;padding-right: 1px;padding-left: 1px;font-size: 20px;"><center>ลำดับที่</center></th>            
                                        <th><center style="margin-top: 20px;font-size: 20px;">เล่มโครงงาน</center> </th>
                                        <th width="20%"><center style="margin-top: 20px;font-size: 20px;">ผู้จัดทำ</center> </th>
                                        <th width="13%"><center style="margin-top: 20px;font-size: 20px;">ปีพ.ศ.</center> </th>
                                       <!--  <th width="13%"><center style="margin-top: 20px;font-size: 29px;">รายละเอียด</center> </th> -->
                                    </tr>
                                                                          

        <?php
        include 'connect_book.php';

        $sql = "SELECT * FROM `book`
        LEFT JOIN student ON book.studentid=student.studentid ORDER BY bookid DESC";
        $result = mysqli_query($conn, $sql);
        $i = 1;

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
        <tr>
            <td align="center" style="font-size: 20px;"><?=$i;?></td>

            <td style="font-size: 20px;"><?php echo $row['booknamethai']; ?></td>

            <td style="font-size: 20px;"><?php echo $row['student']; ?> <?php echo $row['lname_stu']; ?></td>

            <td style="font-size: 20px;"><?php echo $row['year']+543; ?></td>
            
            <!-- <td>
                <center><button class="btn btn-info" style="background-color: #FFFF00">
                    <a href="detail_book.php?bookid=<?php // echo $row['bookid']; ?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                    </a>
                    </button>
                </center>
            </td> -->
            <!-- <td>
            <center><button class="btn btn-info" style="background-color: #33CC33"> 
                <a href="edit_book.php?id= <?php // echo $row['bookid']; ?>">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
                </button>
            </center>
            </td -->
        </tr>

        <?php $i++; } 
        mysqli_free_result($result) ;
        mysqli_close($conn);
        ?>

                            </table>

</div>
    <script>
function myFunction() {
    window.print();
}
</script>

    <?php include ('script.php'); ?>

</body>

</html>
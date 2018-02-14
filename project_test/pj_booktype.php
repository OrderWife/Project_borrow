<?php 
session_start();
include 'connect_book.php';

$sql = "SELECT * FROM `booktype` ORDER BY booktypeid DESC";
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

     <style type="text/css">
   #dataTables-example_length{
    display: none;
   }
 </style>


</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">อยู่ตรงไหนหว่า</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> -->
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
                            รายการประเภทเล่มโครงงาน
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-cog" aria-hidden="true"> เพิ่มประเภทเล่มโครงงาน</span></button>

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                   <tr>
           
                                        <th ><center>ประเภทเล่มโครงงาน</center></th>
                                        <th style="width: 84px;padding-top: 0px;padding-bottom: 8px;padding-right: 0px;padding-left: 0px;"><center>แก้ไข</center></th>
                                    </tr>
                                </thead>
                                <tbody>                    

        <?php
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
        <tr>
            
            <td><?php echo $row['booktype']; ?></td>
            <td>
            <center>
                <!-- <a class="edit-booktypeid" data-booktypeid="<?php // echo $row['booktypeid']; ?>" > -->
                        <a class="edit-booktypeid" data-booktypeid="<?php echo $row['booktypeid']; ?>" data-booktype="<?php echo $row['booktype']; ?>"  >
                <!-- <button class="btn btn-info" style="background-color: #33CC33">  -->
                    <!-- <a href="edit_booktype.php?id= <?php // echo $row['booktypeid']; ?>"> -->
                        <i class="glyphicon glyphicon-edit" aria-hidden="true"></i>                    
                <!-- </button> -->
                </a>
            </center>
            </td>
        </tr>

        <?php  
    }

        mysqli_free_result($result) ;
        ///mysqli_close($conn);

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
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">แก้ไขข้อมูลคำนำหน้าชื่อ</h4>
        </div>
        <div class="modal-body">


<form action="update_booktype.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">

        <input type="hidden" name="booktypeid" id="booktypeid">
        <label>ประเภทเล่มโครงงาน : </label>
    <input type="text" name="booktype" id="booktype" style="
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




<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">เพิ่มข้อมูลประเภทเล่มโครงงาน</h4>
        </div>
        <div class="modal-body">


<form action="insert_booktype.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">

        <label>ประเภทเล่มโครงงาน : </label>
    <input type="text" name="booktype" id="booktype" style="
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
  


    <?php include ('script.php'); ?>

    <script type="text/javascript">
        $('.edit-booktypeid').click(function() { 
            var booktypeid = $(this).attr('data-booktypeid');
            var booktype = $(this).attr('data-booktype');
            $("#booktypeid").val(booktypeid);
            $("#booktype").val(booktype);
            $("#myModal2").modal('show');
        });

    </script>

</body>

</html>
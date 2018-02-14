<?php 
session_start();
 include 'connect_book.php';


$sql = "SELECT * FROM `titlename` ORDER BY `titlename`.`titlenameid` DESC";
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

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    

    <title>ระบบการยืม-คืนเล่มโครงงานการศึกษาเอกเทศ</title>
    <?php   include('css.php'); ?>
    <?php   include('datatable.php'); ?>

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
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
 -->
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
                            รายการคำนำหน้าชื่อ
                            <!-- <button class="btn btn-primary btn-xs" style="float: right;" data-toggle="modal" data-target="#myModal1">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"> เพิ่มข้อมูลคำนำหน้าชื่อ</span>
                            </button> -->
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal1">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"> เพิ่มข้อมูลคำนำหน้าชื่อ</span>
                            </button>

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            
                                <thead>
                                    <tr>
                
                                        <th><center>คำนำหน้าชื่อ</center></th>
                                        <th style="width: 84px;padding-top: 0px;padding-bottom: 8px;padding-right: 0px;padding-left: 0px;"><center>แก้ไข</center></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>                    

        <?php
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
            ?>
            <tr>
            
                <td><?php echo $row['titlename']; ?></td>
                <td> 
                    <center>
                        <!-- <a class="edit-titlename" href="edit_titlename.php?id= <?php // echo $row['titlenameid']; ?>"> -->
                                <a class="edit-titlename" data-titlename="<?php echo $row['titlename']; ?>" 
                                    data-titlenameid="<?php echo $row['titlenameid']; ?>"  > 
                            <!-- <button class="btn btn-info" style="background-color: #33CC33" > -->
                                <i class="glyphicon glyphicon-edit" aria-hidden="true"></i>                            
                            <!-- </button> -->
                        </a>

                    </center>
                </td>
            </tr>

            <?php  
        }

            mysqli_free_result($result) ;
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


</body>

</html>
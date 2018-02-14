<?php 
session_start();
include 'connect_book.php';


$sql = "SELECT * FROM `major` ORDER BY majorid DESC";
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
    <?php include('css_admin.php'); ?>
    <?php include('datatable.php'); ?>


</head>
<body> 

</script>

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

           <?php include ('menu_admin.php');?>

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
                        <div class="panel-heading"  style="height: 42px;background-color: #d7efd3">
                            <h4  style="margin-top: 0px;">รายการหลักสูตรสาขาวิชา</h4>
                            <button class="btn btn-primary" style="margin-left: 85%;margin-top: -60px" 
                            data-toggle="modal" data-target="#myModal1"><span class="glyphicon glyphicon-plus" aria-hidden="true"> เพิ่มข้อมูลสาขาวิชา</span></button>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
           
                                    <th><center>ชื่อสาขาวิชา</center> </th>
                                    <th width="15%"><center>แก้ไข / ลบ</center></th>
                                </tr>
                                </thead>
                                <tbody>                    

        <?php
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
        <tr>
            
            <td><?php echo $row['major']; ?></td>
            <td> 
            <center>
                <a class="edit-major" data-major="<?php echo $row['major']; ?>" data-majorid="<?php echo $row['majorid']; ?>" >
                <!-- <button class="btn btn-info" style="background-color: #33CC33"> -->
                <!-- <a href="edit_major.php?id= <?php // echo $row['majorid']; ?>"> -->
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                <!-- </button> -->
                </a>  /  
                <a href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
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

<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">แก้ไขข้อมูลสาขาิชา</h4>
        </div>
        <div class="modal-body">


<form action="update_major.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
        
        <input type="hidden" name="majorid" id="majorid">

        <label>ชื่อสาขา : </label>
        <input type="text" name="major" id="major" style="    
    width: 85%;
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
          <h4 class="modal-title">เพิ่มข้อมูลสาขาวิชา</h4>
        </div>
        <div class="modal-body">


<form action="insert_major.php" method="post" name="form1" onSubmit="JavaScript:return fncSubmit();">
        <h3><a href="index.php"></a></h3>
        <label>ชื่อสาขา : </label>
        <input type="text" name="major" id="major" style="    
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

    <?php include ('script_admin.php'); ?>

    <script type="text/javascript">
        $('.edit-major').click(function() { 
            var major = $(this).attr('data-major');
            var majorid = $(this).attr('data-majorid');
            $("#major").val(major);
            $("#majorid").val(majorid);
            $("#myModal2").modal('show');
        });

    </script>

</body>

</html>
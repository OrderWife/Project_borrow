<?php
        session_start();

        if ( !isset($_SESSION['memberid']) ) {
            header("Location:pj_login.php");
        }


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
    <?php include('css_member.php'); ?>
    <?php include('datatable_member.php'); ?>

</head>
<body>

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

           <?php include ('menu_member.php');?>

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
                            รายการเล่มโครงงาน
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
							            <th class="center">เล่มโครงงาน </th>
                                        <th class="center" width="13%">รายละเอียด </th>

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
            
            <td>
                <center><button class="btn btn-info" style="background-color: #FFFF00">
                    <a href="detail_book.php?bookid=<?php echo $row['bookid']; ?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                    </a>
                    </button>
                </center>
            </td>
            <!-- <td>
            <center><button class="btn btn-info" style="background-color: #33CC33"> 
                <a href="edit_book.php?id= <?php // echo $row['bookid']; ?>">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                </a>
                </button>
            </center>
            </td -->
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
    <!-- /#wrapper -->

    <?php include ('script_member.php'); ?>

</body>

</html>
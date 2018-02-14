
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
                                include'connect_book.php';
                                // $memberid = $_GET['memberid'];

                                $sql = "SELECT * FROM member WHERE memberid = '$memberid'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            ?>
                            <h4 style="margin-top: 0px;">รายการเล่มโครงงาน <?php echo $row['fname']; ?> <?php echo $row['lname']; ?></h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="alert alert-danger alert-dismissible" role="alert">
                            <!-- <div class="col-sm-6 col-sm-offset-3 text-center"> -->
                              <!-- <p style="color: red;text-align: center;">หหหหหห</p> -->
                              <strong><i class="fa fa-warning"></i> ขออภัย!</strong> 
                                <!-- <marquee> -->
                                  <p style="font-family: Impact; font-size: 16pt" >
                                <p style="font-family: Impact; font-size: 14pt">คุณไม่ทำการยืมเล่มโครงงานได้</p>
                                <p style="font-family: Impact; font-size: 14pt">เนื่องจากจากคุณมีจำนวนเล่มโครงงานไม่ตรงตามจำนวนที่กำหนดไว้ !</p>
                                </p>
                                <!-- </marquee> --><br>
                              <a href="borrowbook.php">
                                <button type="submit" class="btn btn-primary" style="padding-right: 40px;padding-left: 40px;">ยืมเล่มโครงงาน</button>
                              </a>
                              </div>
                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
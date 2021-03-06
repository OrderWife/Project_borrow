<?php

    if ( !isset($_SESSION['staffid']) ) {
            header("Location:index1.php");
        }

        include 'connect_book.php';
        $session_login_id = $_SESSION['staffid'];

        $qry_user = "SELECT * FROM staff WHERE staffid='$session_login_id'";
        $result_user = mysqli_query($conn,$qry_user);
        if ($result_user) {
           $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
           $s_login_username = $row_user['fname'];
           mysqli_free_result($result_user);
        }
    mysqli_close($conn);
?>

<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color: rgba(255, 255, 0, 0.56);">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">ระบบการยืม-คืนเล่มโครงงานการศึกษาเอกเทศ</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right" style="height: 30px">
                
                <!-- /.dropdown -->
                                    
                        <li><i class="fa fa-user fa-fw"></i>
                        <?php echo "$s_login_username" ?>
                        <?php echo $row_user['lname']; ?>
                        </li>                       
                        <li class="divider">: เจ้าหน้าที่</li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> ออกจากระบบ</a>
                        </li>
                    
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation" >
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> หน้าหลัก</a>
                        </li>
                        
                        <li>
                            <a href="#"><span class="glyphicon glyphicon-book"></span> การยืม-คืน<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="list_borrowbook.php">การยืม</a>
                                </li>
                                <li>
                                    <a href="list_returnbook.php">การคืน</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="glyphicon glyphicon-user"></span> จัดการข้อมูล<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="pj_titlename.php">คำนำหน้าชื่อ</a>
                                </li>
                                <li>
                                    <a href="pj_major.php">สาขาวิชา</a>
                                </li>
                                <li>
                                    <a href="pj_advisor.php">อาจารย์ที่ปรึกษา</a>
                                </li>
                                <!-- <li>
                                    <a href="pj_student.php">นักศึกษา</a>
                                </li> -->
                                <li>
                                    <a href="pj_booktype.php">ประเภทเล่มโครงงาน</a>
                                </li>
                                <li>
                                    <a href="pj_book.php">เล่มโครงงาน</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><span class="glyphicon glyphicon-list-alt"></span> รายงาน<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="report_borrow.php">รายงานการยืม</a>
                                </li>
                                <li>
                                    <a href="report_book.php">เล่มโครงงาน</a>
                                </li>
                                <li>
                                    <a href="report_advisor.php">อาจารย์ที่ปรึกษา</a>
                                </li>
                               <!--  <li>
                                    <a href="report_student.php">นักศึกษา</a>
                                </li> -->
                            </ul>
                        </li>
                                                
                        <li>
                            <a href="list_member.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> รายการสมาชิก</a>
                        </li>

                        <li>
                            <a href="condition.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> เงื่อนไขการยืมเล่มโครงงาน</a>
                        </li>
                                                
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
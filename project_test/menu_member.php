<?php

        //session_start();

        if ( !isset($_SESSION['memberid']) ) {
            header("Location:index1.php");
        }

        include 'connect_book.php';
        $session_login_id = $_SESSION['memberid'];

        $qry_user = "SELECT * FROM member WHERE memberid='$session_login_id'";
        $result_user = mysqli_query($conn,$qry_user);
        if ($result_user) {
           $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
           $s_login_username = $row_user['fname'];
           mysqli_free_result($result_user);
        }
    mysqli_close($conn);
?>

<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;margin-bottom: 0;background-color: rgba(255, 255, 0, 0.56);">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="report_borrow_member.php">ระบบการยืม-คืนเล่มโครงงานการศึกษาเอกเทศ</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="detail_of_member.php" style="padding-right: 5px;padding-left: 5px;">
                            <i class="glyphicon glyphicon-user"></i>
                                <?php echo "$s_login_username" ?>
                                <?php echo $row_user['lname']; ?>
                        </a>
                    </li>: สมาชิก    

                    <!-- <li class="divider"></li> -->

                    <li>
                        <a href="logout.php" style="padding-right: 5px;padding-left: 8px;">
                            <i class="fa fa-sign-out fa-fw">
                            </i> ออกจากระบบ
                        </a>
                    </li>
               
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="report_borrow_member.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> หน้าหลัก</a>
                        </li>
                        <!-- <li>
                            <a href="#"><span class="glyphicon glyphicon-list"></span> รายการการยืม-คืน<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="borrowbook.php">การยืม</a>
                                </li>
                                <li>
                                    <a href="pj_return.php">การคืน</a>
                                </li>
                            </ul>
                        </li> -->
                        <li>
                            <a href="borrowbook.php?unset=ture"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> ยืมเล่มโครงงาน</a>
                        </li>
                        <li>
                            <!-- <a href="page1.php"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> รายการเล่มโครงงาน</a> -->
                        </li>
                        <li>
                            <!-- <a href="detail_of_member.php"><span class="glyphicon glyphicon glyphicon-user" aria-hidden="true"></span> ข้อมูลส่วนตัว</a> -->
                        </li>
                        
                                                
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
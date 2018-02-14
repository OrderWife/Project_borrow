<?php 
include 'connect_book.php';
session_start();

 $bookid=$_GET['qq'];
// $today = date('Y-m-d');

$sql = "SELECT * FROM  book
INNER JOIN student ON book.studentid=student.studentid
INNER JOIN advisor ON book.advisorid=advisor.advisorid
INNER JOIN booktype ON book.booktypeid=booktype.booktypeid where bookid = '$bookid' ";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
//$row = mysqli_fetch_array($result, MYSQLI_ASSOC); {

// if($row['statusbook']==1){
//     if($row['date_ture']>=$today){
//     echo "สมารถยืมได้";
//     }else{
//     	echo "ไม่สามารถให้ยืมได้เป็นเวลา";
//     }
// }else{
	//echo "...";

	//echo "คุณยังไม่ได้คืน";
//}
	//echo $sql;
	//echo $_GET['q'];
	


	

?>
<br>
<div class="col-lg-12">
<div class="row" style="margin-left: 0px;margin-bottom: 15px">
    <div class="col-lg-12">
	<label>เลขที่เล่มโครงงาน :</label> <?php echo $row['bookid']; ?><br>
	</div>
	</div>
	
	<div class="row" style="margin-left: 0px;margin-bottom: 15px">
    <div class="col-lg-12">
    <label>ชื่อโครงงาน : </label> <?php echo $row['booknamethai']; ?>
    </div>
    </div>
	
	<!-- <div class="row" style="margin-left: 0px;margin-bottom: 15px">
    <div class="col-lg-12">
    <label>ชื่อโครงงาน(ภาษาอังกฤษ) :</label> <?php // echo $row['booknameeng']; ?>
    </div>
    </div> -->

	<!-- <div class="row" style="margin-left: 0px;margin-bottom: 15px">
    <div class="col-lg-12">
    <label>คำสำคัญ :</label> <?php // echo $row['keyword']; ?>
    </div>
    </div> -->
&nbsp&nbsp&nbsp
    <label>ชื่อนักศึกษา :</label> <?php echo $row['fname_stu']; ?> <?php echo $row['lname_stu']; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp


    <label>อาจารย์ที่ปรึกษา :</label> <?php echo $row['fname']; ?> <?php echo $row['lname']; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp


    <label>ปีการศึกษา :</label> <?php echo $row['year']; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp


    <label>ประเภทเล่มโครงงาน :</label> <?php echo $row['booktype']; ?>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp


    </div>

    <!-- <div class="col-lg-6">
	<label>ไฟล์ : </label> &nbsp<a href="bookfilename/<? // =$row["bookfilename"];?>"><? // =$row["bookfilename"];?></a>
	</div>
	</div> -->

	<!-- <div class="row" style="margin-left: 0px;margin-bottom: 15px">
    <div class="col-lg-12">
    <label>บทคัดย่อ :</label><p style="margin: 3px" width="50%"> <?php // echo $row['abstracts']; ?></p><br>
    </div>
    </div> -->

    <?php } ?>	
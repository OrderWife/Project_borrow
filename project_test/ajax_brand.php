<?php 
include 'connect_book.php';
session_start();

if($_GET['q']!=null){

	$memberid=$_GET['q'];
	$sql = "SELECT * FROM  bookborrow";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

}
$today = date('Y-m-d');
$pageBook = "pj_borrowbook.php";

// $testNull="NotNull";
// if($row['statusbook']==null)
// {
// 	$testNull="Null";
// }
// echo $testNull;
$dis;
if($row['statusbook']==null)
{
	echo "สมารถยืมได้";
	$dis = true;
}
else
{
	if($row['statusbook']==1)
	{
    	echo "สมารถยืมได้";
    	$dis = true;
	}
	else
	{
		if($row['returnbook']<=$today) //ยังไม่ถึงกำหนดส่ง
		{
			echo "ค้างส่ง สามารถยืมได้";
			$dis = true;
		}
		else //
		{
	    	echo "ยังไม่ได้ทำกรส่งคืน ไม่สามารถยืมได้";
	    	$dis = false;
	    	?>
	    	<!-- <input class="form-control" type="text" name="bookid" value="disable"> -->
	    	<?php 
	    }
		//echo "คุณยังไม่ได้คืน";
	}

}
	//echo $sql;
	//echo $_GET['q'];
	
	

?>
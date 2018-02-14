		<?php
include 'connect_book.php';

$sql = "SELECT * FROM `titlename`";
$result = mysqli_query($conn, $sql);


//$titlenameid = $_POST['titlenameid'];
$titlename = $_POST['titlename'];


$sql = "INSERT INTO `titlename` (`titlenameid`, `titlename`) VALUES (null, '$titlename')";
 


$result = mysqli_query($conn, $sql);
 	if ($result) {
 		echo "<script>";
        echo "alert('บันทึกข้อมูลเรียบร้อย'); location.href = 'pj_titlename.php' ";
        echo "</script>";
 	} else {
 		echo "Error " .mysqli_error($conn);
 	}
        ?>
	</form>	
    </div>
  </div>

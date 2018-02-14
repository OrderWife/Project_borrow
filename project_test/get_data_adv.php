<?php
	include 'connect_book.php';

	//ตรวจสอบว่า มีค่า ตัวแปร $_GET['show_province'] เข้ามาหรือไม่  	//แสดงรายชื่อจังหวัด
	if(isset($_GET['show_member'])){
		
		//คำสั่ง SQL เลือก id และ  ชื่อจังหวัด
		//$sql = "SELECT * memberid,fname FROM member";
		

                   $sql2 = "SELECT * FROM `advisor`";
                   $result = mysqli_query($conn, $sql2);
        

		//ประมวณผลคำสั่ง SQL
		//$result = $conn->query($sql);

		//ตรวจสอบ จำนวนข้อมูลที่ได้ มีค่ามากกว่า  0 หรือไม่
		if ($result->num_rows > 0) {
			
			//วนลูปแสดงข้อมูลที่ได้ เก็บไว้ในตัวแปร $row
			while($row = $result->fetch_assoc()) {
				
				//เก็บข้อมูลที่ได้ไว้ในตัวแปร Array 
			// 	$json_result[] = [
			// 		'id'=>$row['memberid'],
			// 		'name'=>$row['fname'],
			// 		'surname'=>$row['lname'],
			// 	];
			// }
			
			//ใช้ Function json_encode แปลงข้อมูลในตัวแปร $json_result ให้เป็นรูปแบบ Json
			echo json_encode($json_result);
			
		} 
	}

	
?>
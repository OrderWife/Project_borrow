<?php 
/*
include 'connect_book.php';
$sql = "SELECT * FROM `bookborrow`";
$result = mysqli_query($conn, $sql);
*/
include 'connect_book.php';

$search_book = @$_POST['search_book'];

$p = '%'.$search_book.'%';

$sql = "SELECT * FROM book WHERE bookid LIKE '$p' OR booknamethai LIKE '$p' OR year LIKE '$p'";

$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<title>ระบบการยืม-คืนเล่มโครงงานการศึกษาเอกเทศ</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#borrowdate" ).datepicker();
  } );
  </script>

  <script>
  $( function() {
    $( "#returndate" ).datepicker();
  } );
  </script>

	<style>
body {
    margin: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 25%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: #4CAF50;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}

.w3-example {
    background-color: #f1f1f1;
    padding: 0.01em 16px;
    margin: 20px 0;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)!important;
}

.w3-code {
    width: auto;
    background-color: #fff;
    padding: 8px 12px;
    word-wrap: break-word;
}

.w3-section, .w3-code {
    margin-top: 16px!important;
    margin-bottom: 16px!important;
}

h3 {
    font-family: "Segoe UI",Arial,sans-serif;
    font-weight: 400;
    margin: 10px 0;
}

input[type=text] {
    width: 25%;
    padding: 6px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

select,input[name=search_book]{
    width: 100%;
    padding: 6px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

select[name=memberid],select[name=staffid]{
    width: 30%;
    padding: 6px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;    
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #E6E6FA;
}

.edit {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 30%;

}

.test {
    text-align: center;
}

 textarea {
    width: 100%;
    height: 150px;
    padding: 6px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #fff;
    font-size: 16px;
    resize: none;
}

.btt-save{
    background-color: #5F9EA0; /* Green */
    border: none;
    color: black;
    padding: 5px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
      }
.center {
    text-align: center;
}
<?php include ('menu_css.php'); ?>
</style>
</head>
<body>

<?php include('menu.php'); ?>

<div style="margin-left:25%;padding:1px 16px;height:1000px;">
<div class="w3-example">
<h3>ค้นหาเล่มโครงงานที่ต้องการยืม</h3>
  <div class="w3-code notranslate htmlHigh">
<!--
  <form action="search_book.php" method="post">
        <h3><a href="index.php"></a>fg</h3>

            start search form-->
<form action="search_book.php" method="post">
    <input type="text" name="search_book" placeholder="ค้นหาเล่มโครงงาน"/><br>
    <input type="submit" name="submit" id="submit" value="ค้นหา"/>
</form><br>
</div>
</div>
            <!--end search form-->

<div class="w3-example">
<h3>รายการเล่มโครงงาน</h3>
  <div class="w3-code notranslate htmlHigh">
    <table style="width: 100%" class="table table-striped" >
        <tr>
            
            <th width="17%">เลขที่เล่มโครงงาน </th>
            <th class="center" width="45%">ชื่อโครงงาน </th>
            <th class="center" width="13%">สถานะ </th>
            <th class="center" width="11%">รายละเอียด </th>
            <th class="center" width="15%">ยืมเล่มโครงงาน </th>
            
        </tr>

        <?php
/*
include 'connect_book.php';

$sql = "SELECT * FROM `book`
LEFT JOIN bookstatus ON book.bookstatusid=bookstatus.bookstatusid";
*/
$result = mysqli_query($conn, $sql);



        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))  {
        ?>
        <tr>
            <td><?php echo $row['bookid']; ?></td>
            <td><?php echo $row['booknamethai']; ?></td>
            <td class="center"><?php echo $row['bookstatusid']; ?></td>
            <td>
                <center>
                    <a href="detail_search_book.php?bookid=<?php echo $row["bookid"]?>"><span class="glyphicon glyphicon-list-alt" aria-hidden="true" ></span>
                    </a>
                </center>
            </td>
            <td>
                <center>
                    <a href="pj_borrow.php"><span class="fa fa-book fa-lg" aria-hidden="true"></span>
                    </a>
                </center>
            </td>
        </tr>

        <?php  
    }

        mysqli_free_result($result) ;
        mysqli_close($conn);

          ?>
    </table>
    </div>
  </div>

  </div>
  </body>
  </html>
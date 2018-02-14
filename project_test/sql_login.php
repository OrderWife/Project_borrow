<?php
  session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "borrow&return_db";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die('Connection failed'. mysqli_connect_error());
//echo "Connected successfully";
  mysqli_set_charset($conn, 'utf8');
  
  $strSQL = "SELECT * FROM member WHERE username = '".mysql_real_escape_string($_POST['username'])."' 
  and userpassword = '".mysql_real_escape_string($_POST['userpassword'])."'";
  $objQuery = mysql_query($strSQL);
  $objResult = mysql_fetch_array($objQuery);
  if(!$objResult)
  {
      echo "Username and Password Incorrect!";
  }
  else
  {
      $_SESSION["memberid"] = $objResult["memberid"];
      $_SESSION["status"] = $objResult["status"];

      session_write_close();
      
      if($objResult["Status"] == "1")
      {
        header("location:index.php");
      }
      else
      {
        header("location:page1.php");
      }
  }
  mysql_close();
?>
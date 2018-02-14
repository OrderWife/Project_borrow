<?php

$bookid = $_GET['bookid'];
$booknamethai = $_GET['booknamethai'];


unset($_GET['bookid']);  
echo '<script>alert("Item Removed")</script>';  
echo '<script>window.location="addbook.php"</script>';


?>
<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "borrow_return_db";

/*
mysqli_connect($servername, $username, $password) or die('Connect Failed');
mysqli_query('set names utf8');
mysqli_select_db($dbname) or die('Select DB Failed');
*/

$conn = mysqli_connect($servername, $username, $password, $dbname) or die('Connection failed'. mysqli_connect_error());
//echo "Connected successfully";
	mysqli_set_charset($conn, 'utf8');


/*

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


/*
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
*/


?>
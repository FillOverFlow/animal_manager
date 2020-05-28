<?php

require_once('MysqliDb.php');

$servername = 'localhost';
$Username = 'root';
$password = '';
$dbname = 'project';

$conn = new mysqli ($servername, $Username, $password ,$dbname) or die('MySQL_connect failed.'. mysql_error());
mysqli_set_charset($conn, "utf8");
error_reporting(E_ALL ^ E_NOTICE);
if ($conn ->connect_error){
	header("location:server.html");
	die("connect failed: " . $conn->connect_error);
}

//$db = new MysqliDb($servername,$Username,$password,$dbname);


?>

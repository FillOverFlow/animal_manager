<?php
session_start();
require_once "connect.php";
$ID_Teacher = $_POST["Username"];
$Password = $_POST["Password"];

$sql = "SELECT * FROM authorities WHERE Username = '".$_POST["Username"]."' 
AND Password = '".md5($_POST["Password"])."'";
$result = $conn->query($sql);
// $test = mysqli_num_rows($result);
// echo $test;
if (mysqli_num_rows($result) > 0) 
{
	$row = mysqli_fetch_array($result);
	$_SESSION["Username"] = $row['Username'];
	$_SESSION["authorities"] = $row;
			// $_SESSION["name_teacher"] = $row['name_teacher'] ;
			// $_SESSION["usertype_teacher"] = $row["usertype_teacher"];

			// if ($_SESSION['usertype_teacher'] == '1') 
			// {
			// 	$row = $result->fetch_assoc();			
			// 	header('location:teacher/t_index.php');
			// 	exit();
			// }
			// else if ($_SESSION['usertype_teacher'] == '0') 
			// {
			// 	$row = $result->fetch_assoc();
			// 	header('location:admin/ad_index.php');
			// 	exit();
			// }
	header('location:../mannageuser.php');
} 
else
{
	echo "<script>alert('ข้อมูลไม่ถูกต้อง');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
	exit();
}
?>
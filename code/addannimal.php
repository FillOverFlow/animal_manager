<?php
include 'connect.php';
$nameannimal = $_POST['annimal_name'];

$select = "SELECT * FROM Animal_Type WHERE Animal_Type_Name = '".$nameannimal."' and status = '1'";

$result = $conn->query($select);
$row = $result->fetch_assoc();
if($row['Animal_Type_Name'] != ""){
	echo "<script>alert('มีข้อมูลชื่อนี้แล้ว');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../addannimal.php'>";
}else{
	$sql_tqf = "INSERT INTO `Animal_Type`(`Animal_Type_Name`,status) VALUES ('".$nameannimal."','1')";
	if ($conn->query($sql_tqf) === TRUE) {
		echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../addannimal.php'>";
	}else{
		echo "<script>alert('ข้อมูลผิดพลาด');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../addannimal.php'>";
	}
}
?>
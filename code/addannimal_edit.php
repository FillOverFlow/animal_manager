<?php
include 'connect.php';
$nameannimal = $_POST['nameannimal_edit'];
$nameold = $_POST['nameannimal_old'];

$select = "SELECT * FROM Animal_Type WHERE Animal_Type_Name = '".$nameannimal."' and status = '1'";
$result = $conn->query($select);
$row = $result->fetch_assoc();
if($row['Animal_Type_Name'] != ""){
	echo "<script>alert('มีชื่อนี้แล้ว');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../addannimal.php'>";
}else{
	$sql_tqf = "UPDATE Animal_Type SET Animal_Type_Name = '".$nameannimal."' WHERE Animal_Type_Name = '".$nameold."' and status = '1'";

	if ($conn->query($sql_tqf) === TRUE) {
		echo "<script>alert('แก้ไขข้อมูลสำเร็จ');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../addannimal.php'>";
	}else{
		echo "<script>alert('ข้อมูลผิดพลาด');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../addannimal.php'>";
	}
}
?>
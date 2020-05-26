<?php
include 'connect.php';
$Deliver_Department = $_POST['Deliver_Department'];

$select = "SELECT * FROM deliver_department WHERE Deliver_Department = '".$Deliver_Department."' and status = '1'";

$result = $conn->query($select);
$row = $result->fetch_assoc();
if($row['Deliver_Department'] != ""){
	echo "<script>alert('มีข้อมูลชื่อนี้แล้ว');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny1.php'>";
}else{
	$sql_tqf = "INSERT INTO `deliver_department`(`Deliver_Department`,status) VALUES ('".$Deliver_Department."','1')";
	if ($conn->query($sql_tqf) === TRUE) {
		echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny1.php'>";
	}else{
		echo "<script>alert('ข้อมูลผิดพลาด');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny1.php'>";
	}
}
?>
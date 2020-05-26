<?php
include 'connect.php';
$Arrest_Deparment = $_POST['Arrest_Deparment'];

$select = "SELECT * FROM arrest_deparment WHERE arrest_deparment = '".$Arrest_Deparment."' and status = '1'";

$result = $conn->query($select);
$row = $result->fetch_assoc();
if($row['Arrest_Deparment'] != ""){
	echo "<script>alert('มีข้อมูลชื่อนี้แล้ว');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny.php'>";
}else{
	$sql_tqf = "INSERT INTO `arrest_deparment`(`arrest_deparment`,status) VALUES ('".$Arrest_Deparment."','1')";
	if ($conn->query($sql_tqf) === TRUE) {
		echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny.php'>";
	}else{
		echo "<script>alert('ข้อมูลผิดพลาด');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny.php'>";
	}
}
?>
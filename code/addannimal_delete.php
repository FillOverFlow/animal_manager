<?php
include 'connect.php';
$idupdate = $_POST['idupdate'];

$select = "SELECT * FROM Animal_Type WHERE Animal_Type_ID = '".$idupdate."'";

$result = $conn->query($select);
$row = $result->fetch_assoc();
if($row['Animal_Type_Name'] == ""){
	echo "<script>alert('ไม่พบข้อมูล');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../addannimal.php'>";
}else{
	$sql_tqf = "UPDATE Animal_Type SET status = '0' WHERE Animal_Type_ID = '".$idupdate."'";
	if ($conn->query($sql_tqf) === TRUE) {
		echo "<meta http-equiv='refresh' content='0;url=../addannimal.php'>";
	}else{
		echo "<script>alert('ข้อมูลผิดพลาด');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../addannimal.php'>";
	}
}
?>
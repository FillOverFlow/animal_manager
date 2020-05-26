<?php
include 'connect.php';
$ID_Deliver_Department = $_POST['ID_Deliver_Department'];

$select = "SELECT * FROM deliver_department WHERE ID_Deliver_Department = '".$ID_Deliver_Department."'";

$result = $conn->query($select);
$row = $result->fetch_assoc();
if($row['ID_Deliver_Department'] == ""){
	echo "<script>alert('ไม่พบข้อมูล');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny1.php'>";
}else{
	$sql_tqf = "UPDATE deliver_department SET status = '0' WHERE ID_Deliver_Department = '".$ID_Deliver_Department."'";
	if ($conn->query($sql_tqf) === TRUE) {
		echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny1.php'>";
	}else{
		echo "<script>alert('ข้อมูลผิดพลาด');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny1.php'>";
	}
}
?>
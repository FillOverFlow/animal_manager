<?php
include 'connect.php';
$idupdate = $_POST['idupdate'];

$select = "SELECT * FROM animal WHERE Animal_ID = '".$idupdate."'";

$result = $conn->query($select);
$row = $result->fetch_assoc();
if($row['Animal_ID'] == ""){
	echo "<script>alert('ไม่พบข้อมูล');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../annimalmannage.php'>";
}else{
	$sql_tqf = "UPDATE animal SET status = '0' WHERE Animal_ID = '".$idupdate."'";
	if ($conn->query($sql_tqf) === TRUE) {
		echo "<meta http-equiv='refresh' content='0;url=../annimalmannage.php'>";
	}else{
		echo "<script>alert('ข้อมูลผิดพลาด');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../annimalmannage.php'>";
	}
}
?>
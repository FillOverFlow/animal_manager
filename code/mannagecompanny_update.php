<?php
include 'connect.php';

$compannyname = $_POST['compannyname'];
$compannynameold = $_POST['compannynameold'];

$select = "SELECT * FROM arrest_deparment WHERE arrest_deparment = '".$compannynameold."' and status = '1'";
$result = $conn->query($select);
$row = $result->fetch_assoc();
if($row['Animal_Type_Name'] != ""){
	echo "<script>alert('มีชื่อนี้แล้ว');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny.php'>";
}else{
	$sql_tqf = "UPDATE arrest_deparment SET arrest_deparment = '".$compannyname."' WHERE arrest_deparment = '".$compannynameold."' and status = '1'";
	if ($conn->query($sql_tqf) === TRUE) {
		echo "<script>alert('แก้ไขข้อมูลสำเร็จ');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny.php'>";
	}else{
		echo "<script>alert('ข้อมูลผิดพลาด');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny.php'>";
	}
}
?>
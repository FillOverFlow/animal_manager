<?php
include 'connect.php';
$idupdate = $_POST['idupdate'];

$select = "SELECT * FROM arrest_deparment WHERE ID_Arrest_Deparment = '".$idupdate."'";

$result = $conn->query($select);
$row = $result->fetch_assoc();
if($row['ID_Arrest_Deparment'] == ""){
	echo "<script>alert('ไม่พบข้อมูล');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny.php'>";
}else{
	$sql_tqf = "UPDATE arrest_deparment SET status = '0' WHERE ID_Arrest_Deparment = '".$idupdate."'";
	if ($conn->query($sql_tqf) === TRUE) {
		echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny.php'>";
	}else{
		echo "<script>alert('ข้อมูลผิดพลาด');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny.php'>";
	}
}
?>
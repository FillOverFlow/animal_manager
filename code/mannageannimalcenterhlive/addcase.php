<?php
$caseid = $_POST['idcase'];
$animalid = $_POST['idanimal'];
include '../utils/basic_include.php';
$id = $_GET['id'];
$var = array();
$sql_insert = "INSERT INTO wild_animal_exhibits (Case_Animal_ID,Animal_ID,status) VALUES ('".$caseid."','".$animalid."','1')";
if ($conn->query($sql_insert) === TRUE) {
	echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenter.php'>";
}else{
	echo "<script>alert('ข้อมูลผิดพลาด');</script>";
	echo ($conn -> error);
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenter.php'>";
}
?>
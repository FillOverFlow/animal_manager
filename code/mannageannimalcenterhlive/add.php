<?php
include '../utils/basic_include.php';
$id = $_GET['id'];
$var = array();
$sql_insert = "INSERT INTO wild_animal_exhibits (Animal_ID,status) VALUES ('".$id."','1')";
if ($conn->query($sql_insert) === TRUE) {
	echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenterhlive.php'>";
}else{
	echo "<script>alert('ข้อมูลผิดพลาด');</script>";
	echo ($conn -> error);
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenterhlive.php'>";
}
?>
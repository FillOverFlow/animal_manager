<?php
include 'class.php';
$insert = [];
$tbl = 'animal_case_correction';
$data = [];
foreach ($_POST['Animal_ID'] as  $value) {
	$data['Animal_ID'] = $value;
	$data['status'] = 1;
	$insert[] = insert($tbl,$data);
}
if (!empty($insert)) {
	echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimaledit.php'>";
}else{
	echo "<script>alert('ข้อมูลผิดพลาด');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimaledit.php'>";
}
?>
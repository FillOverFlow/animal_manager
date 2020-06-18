<?php
include '../utils/basic_include.php';
$id = array('Animal_Case_Correction_ID'=>$_GET['Animal_Case_Correction_ID']);
$delete = deletehave('Animal_Case_Correction',$id);
if ($conn->query($delete)) {
	echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimaledit.php'>";
}else{
	echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimaledit.php'>";
}
?>
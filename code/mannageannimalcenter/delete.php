<?php
include '../utils/basic_include.php';
$id = array('Case_Animal_ID'=>$_GET['id']);
$delete = delete('case_animal',$id);
if ($conn->query($delete)) {
	echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenter.php'>";
}else{
	echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenter.php'>";
}

?>
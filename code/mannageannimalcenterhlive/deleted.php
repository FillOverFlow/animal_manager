<?php
include '../utils/basic_include.php';
$id = array('Animal_ID'=>$_GET['id'],'Animal_Dead_ID'=>$_GET['type']);
$delete = delete('wild_animal_exhibits',$id);
// var_dump($delete);
if ($conn->query($delete)) {
	echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenterhdead.php'>";
}else{
	echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenterhdead.php'>";
}

?>
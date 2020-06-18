<?php
include '../utils/basic_include.php';
$id = array('Wild_Animal_Exhibits_ID'=>$_GET['Wild_Animal_Exhibits_ID']);
$delete = deletedead('wild_animal_exhibits',$id);
// var_dump($delete);
if ($conn->query($delete)) {
	echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenterhdead1.php'>";
}else{
	echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenterhdead1.php'>";
}

?>
<?php
require_once('class.php');
$id = $_POST['Animal_Case_Correction_ID'];
$field = 'Animal_Case_Correction_ID';
$data = array('status' => 0);
$tbl = 'animal_case_correction';
$update = updatestatus($tbl,$id,$field,$data);
if($update == 1){
	echo "<script>alert('ลบข้อมูลสำเร็จ');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimaleditdead1.php'>";
}else{
	echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimaleditdead1.php'>";
}
?>
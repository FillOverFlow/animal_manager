<?php
require_once('class.php');
$chkfield = ['Animal_ID','oldnumber','Animal_Case_Correction_ID','A_C_C_Date_of_Admission','A_C_C_month_of_Admission','A_C_C_year_of_Admission','A_C_C_Date_Pin_Number','A_C_C_month_Pin_Number','A_C_C_year_Pin_Number'];
$number = $_POST['Animal_number'];
$oldnumber = $_POST['oldnumber'];
$animal_id = $_POST['Animal_ID'];
$Animal_Case_Correction_ID = $_POST['Animal_Case_Correction_ID'];
$A_C_C_Date_of_Admission = $_POST['A_C_C_Date_of_Admission'].':'.$_POST['A_C_C_month_of_Admission'].':'.$_POST['A_C_C_year_of_Admission'];
$A_C_C_Date_Pin_Number = $_POST['A_C_C_Date_Pin_Number'].':'.$_POST['A_C_C_month_Pin_Number'].':'.$_POST['A_C_C_year_Pin_Number'];
$tbl = 'animal_case_correction';
$chkanimalnumber = chkanimalnum($oldnumber,$number,$animal_id);
$field = ['A_C_C_Photo_1','A_C_C_Photo_2','A_C_C_Photo_3','A_C_C_Photo_4','A_C_C_Photo_5',];
$files = getnamefile($_FILES,$field);
$data = [];
if($chkanimalnumber == 'No'){
	foreach ($_POST as $key => $value) {
		if(in_array($key,$chkfield)){
			if($key == 'A_C_C_Date_of_Admission')
			{
				$data[$key] = $A_C_C_Date_of_Admission;
			}else if($key == 'A_C_C_Date_Pin_Number'){
				$data[$key] = $A_C_C_Date_Pin_Number;
			}
		}else{
			$data[$key] = $value;
		}
	}
	// echo "<pre>";
	// var_dump($data);
	// echo "</pre>";
	// updatedt($data,$tbl,$id,$field);
	$up = updatedt($data,$tbl,$Animal_Case_Correction_ID,'Animal_Case_Correction_ID');
	$up1 = updatedt($files,$tbl,$Animal_Case_Correction_ID,'Animal_Case_Correction_ID');
	// echo $up;echo "<br>";echo $up1;
	if($up == 1){
		echo "<script>alert('แก้ไขข้อมูลสำเร็จ');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../../mannageannimaledit1.php'>";
	}
	
}else{
	echo "<script>alert('หมายเลขสัตว์ถูกใช้งานแล้ว');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../addedit.php?Animal_Case_Correction_ID=".$Animal_Case_Correction_ID."'>";
	// echo $chkanimalnumber;echo "<br>";
	// echo ($oldnumber.$number.$animal_id);
}

?>
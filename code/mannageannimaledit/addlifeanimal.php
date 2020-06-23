<?php
include 'class.php';

$chkdate = ['A_C_C_Date_of_Admission','A_C_C_month_of_Admission','A_C_C_year_of_Admission','A_C_C_Date_Pin_Number','A_C_C_month_Pin_Number','A_C_C_year_Pin_Number'];
$data=[];
$A_C_C_Date_of_Admission = $_POST['A_C_C_Date_of_Admission'].":".$_POST['A_C_C_month_of_Admission'].":".$_POST['A_C_C_year_of_Admission'];
$A_C_C_Date_Pin_Number = $_POST['A_C_C_Date_of_Admission'].":".$_POST['A_C_C_month_Pin_Number'].":".$_POST['A_C_C_year_Pin_Number'];
$namefiles = [];
$path = "files"; 
$pathpic = "picture";
$fieldPhoto = ['A_C_C_Photo_1','A_C_C_Photo_2','A_C_C_Photo_3','A_C_C_Photo_4','A_C_C_Photo_5'];
$i = 0;
foreach ($_FILES as $key => $value) {
	if ($key == 'annimalimg') {
		foreach ($value['name'] as $val) {
			$data[$fieldPhoto[$i]] = $val;
			copy($value['tmp_name'][$i],$pathpic.'/'.$val);
			$i++;
		}
	}else{
		$data[$key] = $value['name'];
		copy($value['tmp_name'],$path.'/'.$value['name']);
	}
	
}
foreach ($_POST as $key => $value) {
	if (in_array($key,$chkdate)) {
		if($key == 'A_C_C_Date_of_Admission'){
			$data['A_C_C_Date_of_Admission'] = $A_C_C_Date_of_Admission;
		}else if($key == 'A_C_C_Date_Pin_Number'){
			$data['A_C_C_Date_Pin_Number'] = $A_C_C_Date_Pin_Number;
			$data['status'] = 1;
		}
	}else{
		$data[$key] = $value;

	}
}
// echo "<pre>";
// var_dump($data);
// echo "</pre>";
$tbl = 'animal_case_correction';
$insert = insert($tbl,$data);

if (!empty($insert)) {
	echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimaledit.php'>";
}else{
	echo "<script>alert('ข้อมูลผิดพลาด');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimaledit.php'>";
}
?>
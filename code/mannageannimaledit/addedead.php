<?php
include 'class.php';
$chkdate = ['Autopsy_date','Autopsy_month','Autopsy_year','Animal_Dead_Date_of_Admission','Animal_Dead_month_of_Admission','Animal_Dead_year_of_Admission','Animal_Dead_Date','Animal_Dead_month','Animal_Dead_year','Animal_number','Animal_Case_Correction_ID'];
$data = [];
$Animal_Case_Correction_ID = $_POST['Animal_Case_Correction_ID'];
$Animal_Dead_Consignee = $_POST['Animal_Dead_Consignee'];
$Animal_ID = $_POST['Animal_ID'];
$pathpic = "picture";
$fieldPhoto = ['Animal_Dead_Photo_1','Animal_Dead_Photo_2','Animal_Dead_Photo_3','Animal_Dead_Photo_4','Animal_Dead_Photo_5'];
$Autopsy_date = $_POST['Autopsy_date'].":".$_POST['Autopsy_month'].":".$_POST['Autopsy_year'];
$Animal_Dead_Date_of_Admission = $_POST['Animal_Dead_Date_of_Admission'].":".$_POST['Animal_Dead_month_of_Admission'].":".$_POST['Animal_Dead_year_of_Admission'];
$Animal_Dead_Date = $_POST['Animal_Dead_Date'].":".$_POST['Animal_Dead_month'].":".$_POST['Animal_Dead_year'];
// QR_Code_Animal_Dead
//---------------------- files -------------------//
$i = 0;
foreach ($_FILES as $key => $value) {
	if ($key == 'annimalimg') {
		foreach ($value['name'] as $val) {
			$data[$fieldPhoto[$i]] = $val;
			copy($value['tmp_name'][$i],$pathpic.'/'.$val);
			$i++;
		}
	}
}

// --------------------- data --------------------//
foreach ($_POST as $key => $value) {
	if (in_array($key, $chkdate)) {
		$data['Autopsy_date'] = $Autopsy_date;
		$data['Animal_Dead_Date_of_Admission'] = $Animal_Dead_Date_of_Admission;
		$data['Animal_Dead_Date'] = $Animal_Dead_Date;
	}else{
		$data[$key] = $value;
		$data['Authorities_ID'] = $Animal_Dead_Consignee;
		$data['Animal_ID'] = $Animal_ID;
	}

}

$tbl = 'animal_dead';
$insert = insert($tbl,$data);

$tblupdate = 'animal_case_correction';
$idupdate = array('Animal_Case_Correction_ID' => $Animal_Case_Correction_ID);
$dataupdate = array('Animal_Dead_ID' => $insert);
$updatedead = update($tblupdate,$dataupdate,$idupdate);
// var_dump($updatedead);
if ($updatedead = true) {
	echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimaledit.php'>";
}else{
	echo "<script>alert('ข้อมูลผิดพลาด');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimaledit.php'>";
}
?>
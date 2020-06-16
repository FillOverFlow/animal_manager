<?php
include '../utils/basic_include.php';

$tbl = "wild_animal_exhibits";
$id = array('Wild_Animal_Exhibits_ID'=>$_POST['Wild_Animal_Exhibits_ID']); 

$annimalimg = $_FILES['annimalimg'];
$img = $annimalimg['name'][0];
$img1 = $annimalimg['name'][1];
$img2 = $annimalimg['name'][2];
$img3 = $annimalimg['name'][3];
$img4 = $annimalimg['name'][4];
$W_A_E_DNA_File = $_FILES['W_A_E_DNA_File'];
$W_A_E_File_Ulilization_Status = $_FILES['W_A_E_File_Ulilization_Status'];

$W_A_E_Date_of_admission = $_POST['day'].":".$_POST['month'].":".$_POST['year'];
$wild_animal_exhibits = $_POST['day1'].":".$_POST['month1'].":".$_POST['year1'];
$W_A_E_Date = $_POST['day3'].":".$_POST['month3'].":".$_POST['year3'];

$data = array(
	'W_A_E_number'=> $_POST['W_A_E_number'],
	'Case_Animal_ID' =>$_POST['Case_Animal_ID'],
	'Animal_ID'=>$_POST['Animal_ID'],
	'Authorities_ID'=>$_POST['Authorities_ID'],
	'W_A_E_DNA_File'=>$W_A_E_DNA_File['name'],
	'W_A_E_Sex'=>$_POST['W_A_E_Sex'],
	'W_A_E_Location'=>$_POST['W_A_E_Location'],
	'W_A_E_Weight'=>$_POST['W_A_E_Weight'],
	'W_A_E_Date_of_admission'=>$W_A_E_Date_of_admission,
	'W_A_E_Time'=>$_POST['W_A_E_Time'],
	'W_A_E_Pin_Number'=>$_POST['W_A_E_Pin_Number'],
	'wild_animal_exhibits_date'=>$wild_animal_exhibits,
	'W_A_E_Cage'=>$_POST['W_A_E_Cage'],
	'W_A_E_Photo_1'=>$img,
	'W_A_E_Photo_2'=>$img1,
	'W_A_E_Photo_3'=>$img2,
	'W_A_E_Photo_4'=>$img3,
	'W_A_E_Photo_5'=>$img4,
	'W_A_E_Fillers'=>$_POST['W_A_E_Fillers'],
	'W_A_E_Legal_Status'=>$_POST['W_A_E_Legal_Status'],
	'Utilization_Status'=>$_POST['Utilization_Status'],
	'W_A_E_Fillers'=>$_POST['W_A_E_Fillers'],
	'W_A_E_Animal_Health_Status'=>$_POST['W_A_E_Animal_Health_Status'],
	'W_A_E_File_Ulilization_Status'=>$W_A_E_File_Ulilization_Status['name'],
	'W_A_E_Daily_No'=>$_POST['W_A_E_Daily_No'],
	'W_A_E_Date'=>$W_A_E_Date,
	'W_A_E_Date_time'=>$_POST['W_A_E_Date_time'],
	'W_A_E_Arrest_Deparment'=>$_POST['W_A_E_Arrest_Deparment'],
	'W_A_E_Deliver_Deparment'=>$_POST['W_A_E_Deliver_Deparment'],
	'status'=>'1'
);

$field = array_keys($data);
$set = array();
$i = 0;
foreach ($data as $values) {
	if ($values =="") {
		$i++;
	}else{
		$set[$field[$i]] = $values;
		$i++;
	}
}
$ud = update($tbl,$set,$id);


// var_dump($annimalimg);
if ($conn->query($ud)){
	$targetfile = "../picturemannageannimalcenterhlive/";
	$file = [];
	for ($i=0; $i <=5 ; $i++) { 
		if (!empty($annimalimg['name'][$i])) {
			$path =  $targetfile.$annimalimg['name'][$i];
			$temp =  $annimalimg['tmp_name'][$i];
			copy($temp,$path);
		}
		
	}
	echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenterhlive1.php'>";
}else{
	echo "<script>alert('ผิดพลาด');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenterhlive1.php'>";
}
?>


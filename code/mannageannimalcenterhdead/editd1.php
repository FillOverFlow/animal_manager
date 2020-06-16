<?php
include '../utils/basic_include.php';
$date = array('day','month','year','day1','month1','year1','day3','month3','year3','Wild_Animal_Exhibits_ID');
$data = [];

$annimalimg = $_FILES['annimalimg'];
$img = $annimalimg['name'][0];
$img1 = $annimalimg['name'][1];
$img2 = $annimalimg['name'][2];
$img3 = $annimalimg['name'][3];
$img4 = $annimalimg['name'][4];
$arrayfiles = ['W_A_E_DNA_File','W_A_E_File_Ulilization_Status'];
$picarr = [$img,$img1,$img2,$img3,$img4];
$fieldpic = ['W_A_E_Photo_1','W_A_E_Photo_2','W_A_E_Photo_3','W_A_E_Photo_4','W_A_E_Photo_5'];
$W_A_E_DNA_File = $_FILES['W_A_E_DNA_File'];
$W_A_E_File_Ulilization_Status = $_FILES['W_A_E_File_Ulilization_Status'];
$filesdata = [$W_A_E_DNA_File,$W_A_E_File_Ulilization_Status];
$datafield = array(
	'W_A_E_DNA_File' => $W_A_E_DNA_File['name'],
	'W_A_E_File_Ulilization_Status' => $W_A_E_File_Ulilization_Status['name']
);

$W_A_E_Date_of_admission = $_POST['day'].":".$_POST['month'].":".$_POST['year'];
$wild_animal_exhibits = $_POST['day1'].":".$_POST['month1'].":".$_POST['year1'];
$W_A_E_Date = $_POST['day3'].":".$_POST['month3'].":".$_POST['year3'];

$tbl = "wild_animal_exhibits";
$id = array('Wild_Animal_Exhibits_ID'=>$_POST['Wild_Animal_Exhibits_ID']); 
$field = getfield($tbl);
$picnameupdate = [];
$p = 0;
foreach ($_POST as $key => $value) {
	if(in_array($key,$date))
	{

	}else if(in_array($key,$field)){
		$data[$key] = $value;
		if($picarr[$p] != ""){
			$picnameupdate[$fieldpic[$p]] = $picarr[$p];
			$p++;

		}
	}
	else{
	}
}
$updatedata = update($tbl,$picnameupdate,$id);
if ($conn->query($updatedata)){
	if(!empty($_FILES)){
		$targetfile = "picture";
		$file = [];
		for ($i=0; $i <=5 ; $i++) { 
			if (!empty($annimalimg['name'][$i])) {
				$path =  $targetfile.$annimalimg['name'][$i];
				$temp =  $annimalimg['tmp_name'][$i];
				copy($temp,$path);
			}
		}
		$updatepic = update($tbl,$data,$id);
		$updatefiles = update($tbl,$datafield,$id);
		if($conn->query($updatepic)){
			$pic = true;
		}
		if($conn->query($updatefiles)){
			$targetfile = "FilesAndPiture";
			for ($i=0; $i < 3; $i++) { 
				$path =  $targetfile.$filesdata['name'][$i];
				$temp =  $filesdata['tmp_name'][$i];
				copy($temp,$path);
			}
			$files = true;
		}

		// echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>";
		// echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenterhdead1.php'>";
	}

}else{
	echo "<script>alert('ผิดพลาด');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenterhdead1.php'>";
}
?>
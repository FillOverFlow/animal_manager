<?php 
require_once('MysqliDb.php');
$db = new MysqliDb('localhost','root','','project');

function getdata(){
	global $db;
	$data = $db->rawQuery('SELECT * FROM wild_animal_exhibits LEFT JOIN animal on wild_animal_exhibits.Animal_ID =animal.Animal_ID JOIN animal_type on animal.Animal_Type_ID = animal_type.Animal_Type_ID  WHERE wild_animal_exhibits.status = 1 and wild_animal_exhibits.Animal_Dead_ID = 0 GROUP BY wild_animal_exhibits.Animal_ID');
	return $data;
}
function getdataedit(){
	global $db;
	$data = $db->rawQuery('SELECT * FROM animal_case_correction LEFT JOIN animal on animal_case_correction.Animal_ID =animal.Animal_ID JOIN animal_type on animal.Animal_Type_ID = animal_type.Animal_Type_ID  WHERE animal_case_correction.status = 1 and animal_case_correction.Animal_Dead_ID = 0 GROUP BY animal_case_correction.Animal_ID');
	return $data;
}
function gettypeanimal(){
	global $db;
	$db->where("status",'1');
	$animals = $db->get('animal_type');
	if($db->count == 0){
		echo "<p> No animal </ps>";
	}
	return $animals;
}
function getcount($Animal_ID,$Utilization_Status){
	global $db;
	$sqlcount = "SELECT * FROM wild_animal_exhibits WHERE Animal_ID = '".$Animal_ID."' AND status ='1' AND Animal_Dead_ID = '0' AND Utilization_Status = '".$Utilization_Status."'";
	$result = $db->query($sqlcount);
	$count = count($result);
	if($count<0){
		$count = '-';
		return $count;
	}else{
		return $count;
	}
	
}
function getcount1($Animal_ID,$Utilization_Status){
	global $db;
	$sqlcount = "SELECT * FROM animal_case_correction WHERE Animal_ID = '".$Animal_ID."' AND status ='1' AND Animal_Dead_ID = '0' AND A_C_C_Utilization_Status = '".$Utilization_Status."'";
	$result = $db->query($sqlcount);
	$count = count($result);
	if($count<0){
		$count = '-';
		return $count;
	}else{
		return $count;
	}
	
}
function getcountall($Animal_ID,$Utilization_Status){
	global $db;
	$sqlcount = "SELECT * FROM wild_animal_exhibits JOIN animal on wild_animal_exhibits.Animal_ID =animal.Animal_ID JOIN animal_type on animal.Animal_Type_ID = animal_type.Animal_Type_ID  WHERE animal_type.Animal_Type_ID = '".$Animal_ID."' AND wild_animal_exhibits.status ='1' AND wild_animal_exhibits.Animal_Dead_ID = '0' AND Utilization_Status = '".$Utilization_Status."'";
	$result = $db->query($sqlcount);
	$count = count($result);
	if($count<0){
		$count = '-';
		return $count;
	}else{
		return $count;
	}
}

function getcountall1($Animal_ID,$Utilization_Status){
	global $db;
	$sqlcount = "SELECT * FROM animal_case_correction JOIN animal on animal_case_correction.Animal_ID =animal.Animal_ID JOIN animal_type on animal.Animal_Type_ID = animal_type.Animal_Type_ID  WHERE animal_type.Animal_Type_ID = '".$Animal_ID."' AND animal_case_correction.status ='1' AND animal_case_correction.Animal_Dead_ID = '0' AND A_C_C_Utilization_Status = '".$Utilization_Status."'";
	$result = $db->query($sqlcount);
	$count = count($result);
	if($count<0){
		$count = '-';
		return $count;
	}else{
		return $count;
	}
}
?>
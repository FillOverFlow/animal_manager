<?php 
require_once('MysqliDb.php');
$db = new MysqliDb('localhost','root','','project');

function getdata(){
	global $db;
	$data = $db->rawQuery('SELECT * FROM wild_animal_exhibits LEFT JOIN animal on wild_animal_exhibits.Animal_ID =animal.Animal_ID JOIN animal_type on animal.Animal_Type_ID = animal_type.Animal_Type_ID  WHERE wild_animal_exhibits.status = 1 and wild_animal_exhibits.Animal_Dead_ID = 0 GROUP BY wild_animal_exhibits.Animal_ID');
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
?>
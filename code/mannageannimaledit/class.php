 <?php 
 require_once('MysqliDb.php');
 

 $db = new MysqliDb('localhost','root','','project');

 function listanimal(){
 	global $db;
 	$tbl = "animal";
 	$db->where("status",'1');
 	$animals = $db->get($tbl);
 	if($db->count == 0){
 		echo "<p> No animal </ps>";
 	}
 	return $animals;

 }
 function showcorrection($search){
 	global $db;
 	if($search != ''){
 		$correction =  $db->rawQuery('SELECT * from animal_case_correction 
 			JOIN animal on animal_case_correction.Animal_ID = animal.Animal_ID 
 			JOIN animal_type on animal.Animal_Type_ID = animal_type.Animal_Type_ID 
 			where animal_case_correction.status = 1 and animal.Thai_Common_Name LIKE "%'.$search.'%" ');
 	}else{
 		$correction =  $db->rawQuery('SELECT * from animal_case_correction 
 			JOIN animal on animal_case_correction.Animal_ID = animal.Animal_ID 
 			JOIN animal_type on animal.Animal_Type_ID = animal_type.Animal_Type_ID 
 			where animal_case_correction.status = 1');
 	}
 	
 	return $correction;
 }
 function showcorrectionrow($id){
 	global $db;
 	$correction =  $db->rawQuery('SELECT * from animal_case_correction 
 		JOIN animal on animal_case_correction.Animal_ID = animal.Animal_ID 
 		JOIN animal_type on animal.Animal_Type_ID = animal_type.Animal_Type_ID 
 		where animal_case_correction.status = 1 and animal_case_correction.Animal_Case_Correction_ID ='.$id.'');
 	return $correction;
 }
 function insert($tbl,$data){
 	global $db;
 	$query = $db->insert($tbl,$data);
 	return $query;
 }
 function countlife($Animal_ID){
 	global $db;
 	$tbl = "animal_case_correction";
 	$db->where("Animal_ID", $Animal_ID);
 	$db->where("Animal_Dead_ID", 0);
 	$animals = $db->get($tbl);
 	$sum = count($animals);
 	return $sum;
 }
 function countdie($Animal_ID){
 	global $db;
 	$tbl = "animal_case_correction";
 	$db->where("Animal_ID", $Animal_ID);
 	$db->where("Animal_Dead_ID",0,">");
 	$animals = $db->get($tbl);
 	$sum = count($animals);
 	return $sum;
 }

 function delete($tbl,$id){ 
 	$field = array_keys($id);
 	$sql = "UPDATE ".$tbl." SET status = '0' WHERE ".$field[0]." = ".$id[$field[0]];
 	return $sql;
 }
 function update($tbl,$data,$id){
 	global $db;
 	$fieldwhere = array_keys($id);
 	$valwhere = array_values($id);
 	$update = $db->where($fieldwhere[0], $valwhere[0])->update($tbl, $data);
 	return $update;
 }
 
 // function showAnimalData($tbl,$type){
 // 	global $db;

 // 	if($tbl == "authorities"){
 // 		$db->where("Authorities_Status",'1');
 // 		$animals = $db->get("$tbl");
 // 		if($db->count == 0){
 // 		// echo "<p> No animal </ps>";
 // 		}

 // 	}
 // 	else if ($tbl == "wild_animal_exhibits" AND $type == "0") {
 // 		$db->where("status",'1');
 // 		$db->where("Animal_Dead_ID",'0');
 // 		$animals = $db->get("$tbl");
 // 		if($db->count == 0){
 // 		// echo "<p> No animal </ps>";
 // 		}

 // 	}
 // 	else if ($tbl == "wild_animal_exhibits" AND $type == "1") {
 // 		$db->where("status",'1');
 // 		$db->where("Animal_Dead_ID !=",'0');
 // 		$animals = $db->get("$tbl");
 // 		if($db->count == 0){
 // 		// echo "<p> No animal </ps>";
 // 		}

 // 	}
 // 	else if($type == 'no'){
 // 		$db->where("status",'1');
 // 		$animals = $db->get("$tbl");
 // 		if($db->count == 0){
 // 		// echo "<p> No animal </ps>";
 // 		}
 // 	}
 // 	else{
 // 		$db->where("status",'1');
 // 		$animals = $db->get("$tbl");
 // 		if($db->count == 0){
 // 		// echo "<p> No animal </ps>";
 // 		}

 // 	}

 // 	return $animals;
 // }
 // function showAnimalDeadData(){

 // 	global $db;

 // 	$dataanimal =  $db->rawQuery('SELECT * from wild_animal_exhibits JOIN animal on wild_animal_exhibits.Animal_ID = animal.Animal_ID JOIN animal_type on animal.Animal_Type_ID = animal_type.Animal_Type_ID JOIN case_animal on wild_animal_exhibits.Case_Animal_ID = case_animal.Case_Animal_ID  where wild_animal_exhibits.status = 1 and wild_animal_exhibits.Animal_Dead_ID = 0');

 // 	return $dataanimal;
 // }

 // function joinshowwild($id){
 // 	global $db;

 // 	$dataanimal =  $db->rawQuery('SELECT * from wild_animal_exhibits JOIN animal on wild_animal_exhibits.Animal_ID = animal.Animal_ID JOIN animal_type on animal.Animal_Type_ID = animal_type.Animal_Type_ID JOIN case_animal on wild_animal_exhibits.Case_Animal_ID = case_animal.Case_Animal_ID  where wild_animal_exhibits.status = 1 and wild_animal_exhibits.Wild_Animal_Exhibits_ID = '.$id.'');

 // 	return $dataanimal;
 // }
 // function joinshow($type){
 // 	global $db;

 // 	if ($type == 0) {
 // 		$dataanimal =  $db->rawQuery('SELECT * from wild_animal_exhibits JOIN animal on wild_animal_exhibits.Animal_ID = animal.Animal_ID  where wild_animal_exhibits.status >= 1 and wild_animal_exhibits.Animal_Dead_ID = 0 GROUP BY wild_animal_exhibits.Animal_ID');
 // 	}else{
 // 		$dataanimal =  $db->rawQuery('SELECT * from wild_animal_exhibits JOIN animal on wild_animal_exhibits.Animal_ID = animal.Animal_ID  where wild_animal_exhibits.status >= 1 and wild_animal_exhibits.Animal_Dead_ID != 0 GROUP BY wild_animal_exhibits.Animal_ID');
 // 	}

 // 	return $dataanimal;
 // }

 // function joinshowliverow($id){
 // 	global $db;
 // 	$dataanimal =  $db->rawQuery('SELECT * from wild_animal_exhibits JOIN animal on wild_animal_exhibits.Animal_ID = animal.Animal_ID JOIN animal_type on animal.Animal_Type_ID = animal_type.Animal_Type_ID JOIN arrest_deparment on wild_animal_exhibits.W_A_E_Arrest_Deparment = arrest_deparment.ID_Arrest_Deparment JOIN deliver_department on wild_animal_exhibits.W_A_E_Deliver_Deparment =  deliver_department.ID_Deliver_Department JOIN authorities on wild_animal_exhibits.Authorities_ID = authorities.Authorities_ID  
 // 		JOIN case_animal on wild_animal_exhibits.Case_Animal_ID = case_animal.Case_Animal_ID where wild_animal_exhibits.Wild_Animal_Exhibits_ID = '.$id.'');
 // 	if (empty($dataanimal)){
 // 		$dataanimalfirst =  $db->rawQuery('SELECT * from wild_animal_exhibits JOIN animal on wild_animal_exhibits.Animal_ID = animal.Animal_ID JOIN animal_type on animal.Animal_Type_ID = animal_type.Animal_Type_ID  JOIN case_animal on wild_animal_exhibits.Case_Animal_ID = case_animal.Case_Animal_ID where wild_animal_exhibits.Wild_Animal_Exhibits_ID = '.$id.'');
 // 		return $dataanimalfirst;
 // 	}else{
 // 		return $dataanimal;
 // 	}

 // }
 // function joinshowdeadrow($id){
 // 	global $db;
 // 	$dataanimal =  $db->rawQuery('SELECT * from wild_animal_exhibits JOIN animal on wild_animal_exhibits.Animal_ID = animal.Animal_ID JOIN animal_type on animal.Animal_Type_ID = animal_type.Animal_Type_ID JOIN arrest_deparment on wild_animal_exhibits.W_A_E_Arrest_Deparment = arrest_deparment.ID_Arrest_Deparment JOIN deliver_department on wild_animal_exhibits.W_A_E_Deliver_Deparment =  deliver_department.ID_Deliver_Department JOIN authorities on wild_animal_exhibits.Authorities_ID = authorities.Authorities_ID  
 // 		JOIN case_animal on wild_animal_exhibits.Case_Animal_ID = case_animal.Case_Animal_ID where wild_animal_exhibits.Wild_Animal_Exhibits_ID = '.$id.'');
 // 	if (empty($dataanimal)){
 // 		$dataanimalfirst =  $db->rawQuery('SELECT * from wild_animal_exhibits JOIN animal on wild_animal_exhibits.Animal_ID = animal.Animal_ID JOIN animal_type on animal.Animal_Type_ID = animal_type.Animal_Type_ID  JOIN case_animal on wild_animal_exhibits.Case_Animal_ID = case_animal.Case_Animal_ID where wild_animal_exhibits.Wild_Animal_Exhibits_ID = '.$id.'');
 // 		return $dataanimalfirst;
 // 	}else{
 // 		return $dataanimal;
 // 	}
 // }
 // function joinshowlive(){
 // 	global $db;

 // 	$dataanimal =  $db->rawQuery('SELECT * from wild_animal_exhibits JOIN animal on wild_animal_exhibits.Animal_ID = animal.Animal_ID JOIN case_animal on wild_animal_exhibits.Case_Animal_ID = case_animal.Case_Animal_ID   where wild_animal_exhibits.status >= 1 and wild_animal_exhibits.Animal_Dead_ID = 0');
 // 	return $dataanimal;
 // }
 // function joinshowdead(){
 // 	global $db;

 // 	$dataanimal =  $db->rawQuery('SELECT * from wild_animal_exhibits JOIN animal on wild_animal_exhibits.Animal_ID = animal.Animal_ID JOIN case_animal on wild_animal_exhibits.Case_Animal_ID = case_animal.Case_Animal_ID   where wild_animal_exhibits.status >= 1 and wild_animal_exhibits.Animal_Dead_ID != 0');
 // 	return $dataanimal;
 // }


 // function delete($tbl,$id,$location){

 // 	global $db;
 // 	$location = "../../../".$location;
 // 	$field = array_keys($id);
 // 	$idval = array_values($id);
 // 	$data = array('status' => '0',);

 // 	$db->where ($field[0], $id[0]);
 // 	$db->update ($tbl, $data);

 // 	header ("Location: ".$location."");
 // 	exit;
 // }
 // function getlocation($location){

 // 	$data = explode('/', $location);
 // 	$datareturn = array_pop($data);

 // 	return $datareturn;

 // }
 // function getfield($tbl){
 // 	global $db;
 // 	$animals = $db->get($tbl);
 // 	$field = array_keys($animals[0]);
 // 	$fieldselect = $field[0];

 // 	return $fieldselect;
 // }





 ?>
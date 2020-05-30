 <?php 
 require_once('MysqliDb.php');
 $db = new MysqliDb('localhost','root','','project');

 function showAnimalData($tbl){
 	global $db;
 	$db->where("status",'1');
 	$animals = $db->get("$tbl");
 	if($db->count == 0){
 		// echo "<p> No animal </ps>";
 	}

 	return $animals;
 }
 function joinshow(){
 	global $db;

 	$db->join("wild_animal_exhibits", "wild_animal_exhibits.Animal_ID=animal.Animal_ID", "LEFT");
 	$db->where("wild_animal_exhibits.status",1);
 	$products = $db->get("wild_animal_exhibits");

 	if($db->count == 0){
 		echo "<p> No animal </ps>";
 	}

 	// $db->rawQueryValue ('select password from users where id=? limit 1', Array(10));
 	$db->rawQuery('SELECT * from users where id >= ?');


 	return $products;
 }
 ?>
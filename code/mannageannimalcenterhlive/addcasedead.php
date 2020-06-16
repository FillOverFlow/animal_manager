<?php
$caseid = $_POST['idcasedead'];
$animalid = $_POST['idanimaldead'];
$Wild_Animal_Exhibits_ID = $_POST['Wild_Animal_Exhibits_ID'];
include '../utils/basic_include.php';
$id = $_GET['id'];
$var = array();
$sql_insert_dead = "INSERT INTO animal_dead (Animal_ID,status) VALUES ('".$animalid."','1')";
$insert = $conn->query($sql_insert_dead);
if($insert === TRUE) {
	$lastsql = "SELECT max(Animal_Dead_ID) FROM animal_dead";
	$last_id = $conn->query($lastsql);
	$idinsert = $last_id->fetch_assoc();
	$update_sql = "UPDATE wild_animal_exhibits set Case_Animal_ID = '".$caseid."' ,Animal_Dead_ID = '".$idinsert['max(Animal_Dead_ID)']."',Animal_ID = '".$animalid."',status =  '1' WHERE Wild_Animal_Exhibits_ID = '".$Wild_Animal_Exhibits_ID."'";
	// $sql_insert = "INSERT INTO wild_animal_exhibits (Case_Animal_ID,Animal_Dead_ID,Animal_ID,status) VALUES ('".$caseid."','".$idinsert['max(Animal_Dead_ID)']."','".$animalid."','1')";

	if ($conn->query($update_sql) === TRUE) {
		echo "<script>alert('เพิ่มข้อมูลสำเร็จ');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenter.php'>";
	}else{
		echo "<script>alert('ข้อมูลผิดพลาด');</script>";
		echo ($db -> error);
		echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenter.php'>";
	}
}else{

	echo "<script>alert('ข้อมูลผิดพลาด');</script>";
	echo ($db -> error);
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenter.php'>";

}




?>

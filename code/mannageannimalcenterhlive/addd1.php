<?php 
include '../utils/basic_include.php';
$array = [];
$arraydate = [];
$id = [];
$img = $_FILES['annimalimg'];
$imgname = $img['name'];
$idAnimal_dead = array('Animal_Dead_ID'=>$_POST['Animal_Dead_ID']);
$fieldWild = getfield('Wild_Animal_Exhibits');
$fieldAnimal_dead = getfield('animal_dead');
foreach ($_POST as $key => $value) {
	if($key == 'AutopsyDate' or $key == 'AutopsyMount' or $key == 'AutopsyYear' or $key == 'DeliveryDate' or $key == 'DeliveryMount' or $key == 'DeliveryYear' or $key == 'Animal_Dead_Date' or $key == 'Animal_Dead_Mount' or $key == 'Animal_Dead_Year'){
		$arraydate[$key] = $value;
	}else if ($key == 'Wild_Animal_Exhibits_ID'){
		$id[$key] = $value;
	}
	else{
		$array[$key] = $value;

	}
}

$updateAnimal_dead = [];
foreach ($array as $key => $value) {
	foreach ($fieldAnimal_dead as $val) {
		if($key == $val and $key != 'Animal_Dead_ID')
		{
			$updateAnimal_dead[$key] = $value;
		}else{

		}
	}
}

$updateWild = [];
foreach ($array as $key => $value) {
	foreach ($fieldWild as $val) {
		if($key == $val)
		{
			$updateWild[$key] = $value;
		}else{
		}
	}
}
$arrayfield = array(
	'Animal_Dead_Photo_1' => $imgname[0],
	'Animal_Dead_Photo_2' => $imgname[1],
	'Animal_Dead_Photo_3' => $imgname[2],
	'Animal_Dead_Photo_4' => $imgname[3],
	'Animal_Dead_Photo_5' => $imgname[4],
);
$Animal_Dead_Date_of_Admission = $arraydate['DeliveryDate'].":".$arraydate['DeliveryMount'].":".$arraydate['DeliveryYear'];
$Animal_Dead_Date = $arraydate['Animal_Dead_Date'].":".$arraydate['Animal_Dead_Mount'].":".$arraydate['Animal_Dead_Year'];
$Autopsy_date = $arraydate['AutopsyDate'].":".$arraydate['AutopsyMount'].":".$arraydate['AutopsyYear'];
$dateup = array(
	'Animal_Dead_Date_of_Admission' => $Animal_Dead_Date_of_Admission,
	'Animal_Dead_Date' => $Animal_Dead_Date, 
	'Autopsy_date' => $Autopsy_date, 
);

$datadate = update('animal_dead',$dateup ,$idAnimal_dead);
$dataAnimal_dead =  update('animal_dead',$updateAnimal_dead ,$idAnimal_dead);
$dataWild =  update('Wild_Animal_Exhibits',$updateWild,$id);
$dataAnimal_deadimg =  update('animal_dead',$arrayfield,$idAnimal_dead);

if($conn->query($dataAnimal_dead)){
	if($conn->query($dataWild)){
		if ($conn->query($dataAnimal_deadimg)){
			if($conn->query($datadate)){
				echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>";
				echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenterhdead.php'>";
			}
		}else{
			echo "<script>alert('ผิดพลาด3');</script>";
			echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenterhdead.php'>";
		}
	}else{
		echo "<script>alert('ผิดพลาด2');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenterhdead.php'>";
	}
}else{
	echo "<script>alert('ผิดพลาด1');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenterhdead.php'>";
}
?>








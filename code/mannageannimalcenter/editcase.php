<?php 
include '../utils/basic_include.php';
$id = array('Case_Animal_ID'=>$_POST['Case_Animal_ID']);
$date = $_POST['day'].':'.$_POST['month'].':'.$_POST['year'];
$date1 = $_POST['day1'].':'.$_POST['month1'].':'.$_POST['year1'];

// files
$Recording_Document = $_FILES['Recording_Document'];
$Arrest_Document = $_FILES['Arrest_Document'];
$Deliver_Document = $_FILES['Deliver_Document'];

$var  = array(
	'Criminal_Case_No'=>$_POST['Criminal_Case_No'],
	'Confiscation_Case_No' => $_POST['Confiscation_Case_No'],
	'Date_Case_Animal' => $date,
	'Daily_No' => $_POST['Daily_No'],
	'Description_exhibit' => $_POST['Description_exhibit'],
	'Time_Case_Animal'   => $_POST['Time_Case_Animal'],
	'Suspect' => $_POST['Suspect'],
	'Department_Case_Animal' => $_POST['Department_Case_Animal'],
	'Status_Case_Animal' => $_POST['Status_Case_Animal'],
	'Judged_by' => $_POST['Judged_by'],
	'Injunction' => $_POST['Injunction'],
	'Undecided_Case_No' => $_POST['Undecided_Case_No'],
	'Dong_Case_No'=> $_POST['Dong_Case_No'],
	'Date_Judged' => $date1,
	'Recording_Document'=>$Recording_Document['name'],
	'Arrest_Document' =>$Arrest_Document['name'],
	'Deliver_Document' =>$Deliver_Document['name'],
	'status' => '1'
);

$data =  update('case_animal',$var,$id);
if ($conn->query($data)){
	echo "<script>alert('แก้ไขข้อมูลเรียบร้อย');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenter.php'>";
}else{
	echo "<script>alert('ผิดพลาด');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenter.php'>";
}

?>





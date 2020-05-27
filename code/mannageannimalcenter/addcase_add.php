<?php 
include '../utils/basic_include.php';

$Recording_Document = $_FILES['Recording_Document'];
$Arrest_Document = $_FILES['Arrest_Document'];
$Deliver_Document = $_FILES['Deliver_Document'];
$Date_Case_Animal = $_POST['day'].':'.$_POST['month'].':'.$_POST['year'];
$var  = array(
	'Criminal_Case_No'=>$_POST['Criminal_Case_No'],
	'Confiscation_Case_No' => $_POST['Confiscation_Case_No'],
	'day' => $_POST['day'],
	'Daily_No' => $_POST['Daily_No'],
	'month' => $_POST['month'],
	'year' => $_POST['year'],
	'Description_exhibit' => $_POST['Description_exhibit'],
	'Time_Case_Animal'   => $_POST['Time_Case_Animal'],
	'Suspect' => $_POST['Suspect'],
	'Department_Case_Animal' => $_POST['Department_Case_Animal'],
	'Status_Case_Animal' => $_POST['Status_Case_Animal'],
	'Judged_by' => $_POST['Judged_by'],
	'Injunction' => $_POST['Injunction'],
	'day1' => $_POST['day1'],
	'mont1' => $_POST['mont1'],
	'year1' => $_POST['year1'],
	'Undecided_Case_No' => $_POST['Undecided_Case_No'],
	'Dong_Case_No' => $_POST['Dong_Case_No']
);



$Date_Judged = $_POST['day1'].':'.$_POST['mont1'].':'.$_POST['year1'];
$pathfiles = $Recording_Document['tmp_name'][0];
$path = "files/".$Recording_Document['name'][0];
$pathArrest_Document = "files/".$Arrest_Document['name'][0];
$pathDeliver_Document = "files/".$Deliver_Document['name'][0];
copy($Recording_Document['tmp_name'][0],$path);
copy($Arrest_Document['tmp_name'][0],$pathArrest_Document);
copy($Deliver_Document['tmp_name'][0],$pathDeliver_Document);
$sql_insert = "INSERT INTO case_animal (Daily_No,Date_Case_Animal,Time_Case_Animal,Suspect,Department_Case_Animal,Description_exhibit,Status_Case_Animal,Criminal_Case_No,Confiscation_Case_No,Undecided_Case_No,Dong_Case_No,Judged_by,Date_Judged,Injunction,Recording_Document,Arrest_Document,Deliver_Document) VALUES (

'".$var['Daily_No']."',
'".$Date_Case_Animal."',
'".$var['Time_Case_Animal']."',
'".$var['Suspect']."',
'".$var['Department_Case_Animal']."',
'".$var['Description_exhibit']."',
'".$var['Status_Case_Animal']."',
'".$var['Criminal_Case_No']."',
'".$var['Confiscation_Case_No']."',
'".$var['Undecided_Case_No']."',
'".$var['Dong_Case_No']."',
'".$var['Judged_by']."',
'".$Date_Judged."',
'".$var['Injunction']."',
'".$Recording_Document['name'][0]."',
'".$Arrest_Document['name'][0]."',
'".$Deliver_Document['name'][0]."'
)";
// echo $sql_insert;
if ($conn->query($sql_insert) === TRUE) {
	echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenter.php'>";
}else{
	echo "<script>alert('ข้อมูลผิดพลาด');</script>";
	echo ($conn -> error);
	echo "<meta http-equiv='refresh' content='0;url=../../mannageannimalcenter.php'>";
}

?>
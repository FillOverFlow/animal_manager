
<?php
include 'connect.php';

$Deliver_Department = $_POST['Deliver_Department'];
$Deliver_Departmentold = $_POST['Deliver_Departmentold'];

$select = "SELECT * FROM deliver_department WHERE Deliver_Department = '".$Deliver_Departmentold."' and status = '1'";
$result = $conn->query($select);
$row = $result->fetch_assoc();
if($row['Animal_Type_Name'] != ""){
	echo "<script>alert('มีชื่อนี้แล้ว');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny1.php'>";
}else{
	$sql_tqf = "UPDATE deliver_department SET Deliver_Department = '".$Deliver_Department."' WHERE Deliver_Department = '".$Deliver_Departmentold."' and status = '1'";
	if ($conn->query($sql_tqf) === TRUE) {
		echo "<script>alert('แก้ไขข้อมูลสำเร็จ');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny1.php'>";
	}else{
		echo "<script>alert('ข้อมูลผิดพลาด');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../mannagecompanny1.php'>";
	}
}
?>
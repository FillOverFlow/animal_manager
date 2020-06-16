<?php
include 'connect.php';
include "phpqrcode/qrlib.php";
$annimal_type_id = $_POST['Animal_Type'];
$thname = $_POST['thname'];
$engname = $_POST['engname'];
$sciname = $_POST['sciname'];
$detail = $_POST['detail'];
$annimalimg = $_FILES['annimalimg'];

$path = "pictureannimal/".$annimalimg['name'][0];
$pathinsert = "code/pictureannimal/".$annimalimg['name'][0];
if ($annimal_type_id == "") {
	echo "<script>alert('กรุณาเลือกชนิดสัตว์');</script>";
	echo "<meta http-equiv='refresh' content='0;url=../addannimal2.php'>";
}else{

	$sql = "INSERT INTO `animal`(`Animal_Type_ID`,Thai_Common_Name,English_Common_Name,Scientific_Name,Animal_Photo,General_Characteristics,QR_Code_Name,status)
	VALUES ('".$annimal_type_id."','".$thname."','".$engname."','".$sciname."','".$pathinsert."','".$detail."','QR','1')";
	if ($conn->query($sql) === TRUE) {
		copy($annimalimg['tmp_name'][0],$path);
		$last_id = $conn->insert_id;
		$prod_id = $last_id; //รหัสสินค้า
		$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'annimalqr'.DIRECTORY_SEPARATOR; //กำหนด Path Temp
		$PNG_WEB_DIR = 'annimalqr/'; //กำหนด Path รูป Qr Code
		$filename = "";
		$errorCorrectionLevel = 'H'; 
		$matrixPointSize = 10; //ขนาด QR Code
		$filename = $PNG_TEMP_DIR.$engname.$prod_id.'.png'; //ไฟล์
		$detailqr = "annimal_id :".$prod_id.",".
		"animal_nameThai :".$thname.",".
		"animal_nameEnglish :".$thname.",".
		"animal_Scientific :".$sciname.",".
		"detail :".$detail;
		QRcode::png($detailqr,$filename, $errorCorrectionLevel, $matrixPointSize, 2);
		$img = $PNG_WEB_DIR.basename($filename);  
		$sql = "UPDATE animal SET QR_Code_Name = '"."code/".$img."' WHERE Animal_ID = '".$prod_id."'";
		$conn->query($sql);
		echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../annimalmannage.php'>";
		
		
	}else{
		echo "<script>alert('ข้อมูลผิดพลาด');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../addannimal2.php'>";
	}
}

?>
<?php

include 'connect.php';
include "phpqrcode/qrlib.php";
$Animal_ID = $_POST['Animal_ID'];
$annimal_type_id = $_POST['Animal_Type'];
$thname = $_POST['Thai_Common_Name'];
$engname = $_POST['English_Common_Name'];
$sciname = $_POST['Scientific_Name'];
$detail = $_POST['General_Characteristics'];
$annimalimg = $_FILES['annimalimg'];

if ($annimalimg['tmp_name'][0] != "") {

	$path = "pictureannimal/".$annimalimg['name'][0];
	$pathinsert = "code/pictureannimal/".$annimalimg['name'][0];
	if(copy($annimalimg['tmp_name'][0],$path)){
		copy($annimalimg['tmp_name'][0],$path);
	}
	
	$sql = "UPDATE `animal` SET 
	`Animal_Type_ID` = '".$annimal_type_id."',
	Thai_Common_Name = '".$thname."',
	English_Common_Name = '".$engname."',
	Scientific_Name = '".$sciname."',
	Animal_Photo = '".$pathinsert."',
	General_Characteristics = '".$detail."' WHERE Animal_ID = '".$Animal_ID."' ";
	if ($conn->query($sql) === TRUE) {
		$prod_id = $last_id; //รหัสสินค้า
		$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'annimalqr'.DIRECTORY_SEPARATOR; //กำหนด Path Temp
		$PNG_WEB_DIR = 'annimalqr/'; //กำหนด Path รูป Qr Code
		$filename = "";
		$errorCorrectionLevel = 'H'; 
		$matrixPointSize = 10; //ขนาด QR Code
		$filename = $PNG_TEMP_DIR.$engname.$prod_id.'.png'; //ไฟล์
		$detailqr = "annimal_id :".$prod_id.",".
		"animal_nameThai :".$thname.",".
		"annimal_type_id :".$annimal_type_id.",".
		"animal_nameEnglish :".$thname.",".
		"animal_Scientific :".$sciname.",".
		"detail :".$detail;

		QRcode::png($detailqr,$filename, $errorCorrectionLevel, $matrixPointSize, 2);
		$img = $PNG_WEB_DIR.basename($filename);  
		$sql = "UPDATE animal SET QR_Code_Name = '"."code/".$img."' WHERE Animal_ID = '".$Animal_ID."'";
		$conn->query($sql);
		echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../annimalmannage.php'>";


	}else{
		echo "<script>alert('ข้อมูลผิดพลาด');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../addannimal2.php'>";
	}
}else{

	$sql = "UPDATE `animal` SET 
	`Animal_Type_ID` = '".$annimal_type_id."',
	Thai_Common_Name = '".$thname."',
	English_Common_Name = '".$engname."',
	Scientific_Name = '".$sciname."',
	General_Characteristics = '".$detail."',
	status = '1'
	 WHERE Animal_ID = '".$Animal_ID."' ";
	if ($conn->query($sql) === TRUE) {
		$prod_id = $Animal_ID; //รหัสสินค้า
		$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'annimalqr'.DIRECTORY_SEPARATOR; //กำหนด Path Temp
		$PNG_WEB_DIR = 'annimalqr/'; //กำหนด Path รูป Qr Code
		$filename = "";
		$errorCorrectionLevel = 'H'; 
		$matrixPointSize = 10; //ขนาด QR Code
		$filename = $PNG_TEMP_DIR.$engname."test".$prod_id.'.png'; //ไฟล์
		$detailqr = "annimal_id :".$prod_id.",".
		"animal_nameThai :".$thname.",".
		"annimal_type_id :".$annimal_type_id.",".
		"animal_nameEnglish :".$thname.",".
		"animal_Scientific :".$sciname.",".
		"detail :".$detail;

		QRcode::png($detailqr,$filename, $errorCorrectionLevel, $matrixPointSize, 2);
		$img = $PNG_WEB_DIR.basename($filename);  
		$sql = "UPDATE animal SET QR_Code_Name = '"."code/".$img."' WHERE Animal_ID = '".$Animal_ID."'";
		$conn->query($sql);
		echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../annimalmannage.php'>";


	}else{
		echo "<script>alert('ข้อมูลผิดพลาด');</script>";
		echo "<meta http-equiv='refresh' content='0;url=../addannimal2.php'>";
	}

}





?>
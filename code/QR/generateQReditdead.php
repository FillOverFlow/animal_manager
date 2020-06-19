<?php 
		include "../phpqrcode/qrlib.php";
		$name = "deadanimal";
		$Animal_Case_Correction_ID = $_POST['Animal_Case_Correction_ID'];
		$nameEng = $_POST['nameEng'];
		$number = $_POST['number'];
		$nameTH = $_POST['nameTH'];
		$typeanimal = $_POST['typeanimal'];
		$nameSci = $_POST['nameSci'];
		$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'editdeadQR'.DIRECTORY_SEPARATOR; //กำหนด Path Temp
		$PNG_WEB_DIR = 'editdeadQR/'; //กำหนด Path รูป Qr Code
		$filename = "";
		$errorCorrectionLevel = 'H'; 
		$matrixPointSize = 10; //ขนาด QR Code
		$filename = $PNG_TEMP_DIR.$name.$Animal_Case_Correction_ID.'.png'; //ไฟล์
		$detailqr = "Animal_Case_Correction_ID :".$Animal_Case_Correction_ID.","."NumberAnimal :".$number.","."TypeAnimal :".$typeanimal.","."nameEng :".$nameEng.","."nameTH :".$nameTH.","."nameSci :".$nameSci;
		QRcode::png($detailqr,$filename, $errorCorrectionLevel, $matrixPointSize, 2);
		$img = $PNG_WEB_DIR.basename($filename);
		$data['namefile'] = $name.$Animal_Case_Correction_ID.'.png';
		echo json_encode($data);
?>
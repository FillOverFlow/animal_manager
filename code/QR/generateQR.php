

<?php 
		include "../phpqrcode/qrlib.php";
		$name = "deadanimal";
		$Wild_Animal_Exhibits_ID = $_POST['Wild_Animal_Exhibits_ID'];
		$nameEng = $_POST['nameEng'];
		$nameTH = $_POST['nameTH'];
		$nameSci = $_POST['nameSci'];
		$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'deadQR'.DIRECTORY_SEPARATOR; //กำหนด Path Temp
		$PNG_WEB_DIR = 'deadQR/'; //กำหนด Path รูป Qr Code
		$filename = "";
		$errorCorrectionLevel = 'H'; 
		$matrixPointSize = 10; //ขนาด QR Code
		$filename = $PNG_TEMP_DIR.$name.$Wild_Animal_Exhibits_ID.'.png'; //ไฟล์
		$detailqr = "Wild_Animal_Exhibits_ID :".$Wild_Animal_Exhibits_ID.","."nameEng :".$nameEng.","."nameTH :".$nameTH.","."nameSci :".$nameSci;
		QRcode::png($detailqr,$filename, $errorCorrectionLevel, $matrixPointSize, 2);
			$img = $PNG_WEB_DIR.basename($filename);
			$data['namefile'] = $name.$Wild_Animal_Exhibits_ID.'.png';
			echo json_encode($data);
		
		
		
		
?>
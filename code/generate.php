<?php

$link = mysqli_connect("localhost", "root", "", "zooqrcode");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

	echo $_GET['id'];

	include "phpqrcode/qrlib.php"; 
	$prod_id = $_GET['id']; //รหัสสินค้า
	$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'img_qrcode'.DIRECTORY_SEPARATOR; //กำหนด Path Temp
	$PNG_WEB_DIR = 'img_qrcode/'; //กำหนด Path รูป Qr Code
	$filename = "";
	$errorCorrectionLevel = 'H'; 
	$matrixPointSize = 10; //ขนาด QR Code
	$filename = $PNG_TEMP_DIR.$prod_id.'.png'; //ไฟล์
	QRcode::png($_GET['id'],$filename, $errorCorrectionLevel, $matrixPointSize, 2);
	echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';
	$img = $PNG_WEB_DIR.basename($filename);  
	//echo $filename;
	
	$sql = "UPDATE info_zoo SET qrcode_zoo = '".$img."' WHERE id_zoo = '".$_GET['id']."'";
	echo $sql;
	mysqli_query($link, $sql);
	header('Location: index2.php?id='.$_GET['id'].'');

mysqli_close($link);
?>
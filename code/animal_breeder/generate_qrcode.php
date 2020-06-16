<?php
require_once '../utils/basic_include.php';
include '../phpqrcode/qrlib.php';

/** generate qr code for animal_breeder_dead **/
//* work by revice animal_id
//* Gen Qrcode and return image



function generateQrcode($animal_id){
  global $db;
  //get animal data from animal ID
  echo 'check '.$animal_id;
  $db->where("Animal_ID",$animal_id);
  $animal = $db->get('animal');



  //** variable for qrcode lib
  $PNG_WEB_DIR = '../annimalqr/'; //กำหนด Path รูป Qr Code
  $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.$PNG_WEB_DIR.DIRECTORY_SEPARATOR; //กำหนด Path Temp
  $dateTime = date("Y-m-d H:i:s");
  $errorCorrectionLevel = 'H';
  $matrixPointSize = 10; //size for QR code
  $filename  = $PNG_TEMP_DIR.'qrcode'.'.png'; //name file qrcode
  $detailQr  = "animal_id:".$animal_id.",".
               "animal_nameThai :".$animal['Thai_Common_Name'].",".
               "animal_nameEnglish :".$animal['English_Common_Name'].",".
               "animal_Scientific :".$animal['Scientific_Name'].",".
               "detail :".$animal['General_Characteristics'];

  //use qrcode lib
  QRcode::png($detailqr,$filename, $errorCorrectionLevel, $matrixPointSize, 2);


  //** have imageQR code now !!
  $img = $PNG_WEB_DIR.basename($filename);

  return $img;
}


?>

<?php

function checkValueExport($var){
  echo "call fucntion";
  echo "numberVar => ".count($var);
  echo "<br>";
  print_r($var);
}

function checkUploadImage($target_dir,$file_image){
    //target dir format : "../pictureAuthorities/"
    //file_image format : "$_FILES['photo']"
  echo "<br>==============  target_dir ===================<br>";
  echo $target_dir;
  echo "<br>==============  file_image ===================<br>";
  echo "<br>";
  echo $file_image['name'];
  echo "<br>";
  echo $file_image['tmp_name'];


  $uploadOK = 1;
  $target_file = $target_dir.basename($file_image['name']);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    //get image size
  $check = getimagesize($file_image['tmp_name']);
  if($check !== false){
    echo "<br>File is an image -".$check["mine"].". ";
    $uploadOK = 1;
  }else{
    echo "File is not an image.";
    $uploadOK = 0;
  }

    //check if file already exists
    //crate target file

  if(file_exists($target_file)){
    echo "Sorry, you file is exists.";
    $uploadOK = 0;
  }

    //Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOK = 0;
}

    // Check if $uploadOk is set to 0 by an error
if ($uploadOK == 0) {
  echo "Sorry, your file was not uploaded. => $uploadOK";
    // if everything is ok, try to upload file
} else {
  if (move_uploaded_file($file_image["tmp_name"], $target_file)) {
    echo "The file ". basename( $file_image["name"]). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

}
function update($tbl,$var,$id){
    //ตัวอย่างไฟล์ updatse code/mannageannimalcenter/editcase.php
  $field = array_keys($var);
  $idfield = array_keys($id);
  $set = [];
  $i = 0;
  foreach ($var as $values) {
    if ($values =="") {
      $i++;
    }else{
      $set[] = $field[$i].'='."'".$values."'";
      $i++;
    }
  }
  $data = implode(',',$set);
  $sql = "UPDATE ".$tbl." SET ".$data." WHERE ".$idfield[0]." = ".$id[$idfield[0]];
  return $sql;
}
function delete($tbl,$id){
  $field = array_keys($id);
  $sql = "UPDATE ".$tbl." SET status = '0' WHERE ".$field[0]." = ".$id[$field[0]];
  return $sql;
}

  return $uploadOK;


?>

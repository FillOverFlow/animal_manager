<?php

  include '../utils/basic_include.php';

  $var  = array(
  'idcard'=>$_POST['idcard'],
  'id_deparment' => $_POST['id_deparment'],
  'username' => $_POST['username'],
  'password' => $_POST['password'],
  'position' => $_POST['position'],
  'gender'   => $_POST['gender'],
  'first_name' => $_POST['first_name'],
  'last_name' => $_POST['last_name'],
  'birth_day' => $_POST['birth_day'],
  'birth_month' => $_POST['birth_month'],
  'birth_year' => $_POST['birth_year'],
  'phone' => $_POST['phone'],
  'address' => $_POST['address'],
  'status' => $_POST['status'],
  'photo' =>  $_FILES['photo']
);


  $birth_day = $var['birth_day'].$var['birth_month'].$var['birth_year'];
  $target_dir = "../pictureAuthorities/";
  $target_file = $target_dir.basename($_FILES['photo']['name']);




  checkValueExport($var); //call from helper.php
  //creat sql
  $sql_insert = "INSERT INTO authorities VALUES (
  0,
  '".$var['idcard']."',
  'aresst_deparment',
  '".$var['id_deparment']."',
  '".$var['username']."',
  '".md5($var['password'])."',
  'Noun_prefix',
  '".$var['first_name']."',
  '".$var['last_name']."',
  '".$var['gender']."',
  '".$var['address']."',
  '".$var['position']."',
  'email',
  '".$birth_day."',
  '".$var['phone']."',
  '".$_FILES['photo']['name']."',
  '".$var['status']."'
  )";
  echo "<br> show sql $sql_insert";
  echo "<br>";
  echo "<br> path tempath".$var['photo']['tmp_name'];
  echo "<br> path_insert: $path_insert";

   //query
  if ($conn->query($sql_insert) === TRUE) {
    //copy file to photo_path
    checkUploadImage($target_dir,$var['photo']);
    echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../../authorities.php'>";
  }else{
    echo "<script>alert('ข้อมูลผิดพลาด ชื่อรหัสหน่วยงานอาจจะซ่่้ำกัน');</script>";
    echo ($conn -> error);
    echo "<meta http-equiv='refresh' content='0;url=../../authorities.php'>";
  }







 ?>

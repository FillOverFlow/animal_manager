<?php
  //update authorities
include '../utils/basic_include.php';



$data = Array(
  'Authorities_ID' => $_POST['id'],
  'ID_card'        => $_POST['idcard'],
  'Username'       => $_POST['username'],
  'Password'       => $_POST['password'],
  'Position'       => $_POST['position'],
  'Authorities_Sex'  => $_POST['gender'],
  'Authorities_First_Name'  => $_POST['first_name'],
  'Authorities_Last_Name'   => $_POST['last_name'],
  'Birthday'                => $_POST['birth_day'].$_POST['birth_month'].$_POST['birth_year'],
  'Telephone_Number'        => $_POST['phone'],
  'Authorities_Status'      => $_POST['status'],
  'Authorities_Address'     => $_POST['address'],
  'Authorities_Photo'       => $_FILES['photo']['name']
);

$target_dir =  "../pictureAuthorities/";
// echo "show $target_dir";
function UpdateUser($data){
  global $db;
  $db->where("Authorities_ID",$data['Authorities_ID']);
  $result = $db->update("authorities",$data);
  if($result){
    $target_dir =  "../pictureAuthorities/";
    // var_dump($target_dir.$_FILES['photo']['name']);
    copy($_FILES['photo']['tmp_name'],$target_dir.$_FILES['photo']['name']);
    echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
    echo "<meta http-equiv='refresh' content='0;url=../../usermanage.php?id=".$data['Authorities_ID']."'>";
  }else{
    echo "<script>alert('ข้อมูลผิดพลาด ไม่สามารถเพิ่มข้อมูลได้');</script>";
    echo ($db-> error);
  }
}

UpdateUser($data);
// print_r($data);



?>

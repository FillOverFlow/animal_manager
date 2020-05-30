<?php
  include '../utils/basic_include.php';

  $id  =  $_GET['id'];
  $sql = "UPDATE authorities SET Authorities_Status = '0' WHERE Authorities_ID = ".$id;
  $result = $conn->query($sql);

  if($result){
      echo "<script>alert('ลบข้อมูลร้อยเรียบ');</script>";
      echo "<meta http-equiv='refresh' content='0;url=../../authorities.php'>";
    }else{
      echo "<script>alert('ลบไม่สำเร็จ');</script>";
  }

?>

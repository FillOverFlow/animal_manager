<?php
  include '../utils/basic_include.php';
  $data = Array(
   'Animal_Dead_ID' => 0,
   'Authorities_ID' => 0,
   'Animal_ID'=> (int)$_POST["animal_id"],
   'Animal_Pairing_ID' => 0,
   'Animal_Name'=> $_POST['animal_name'],
   'Animal_Breeder_F_M_Name' => '',
   'Animal_Breeder_F_ID' => 0,
   'Animal_Breeder_M_ID' => 0,
   'Animal_Breeder_Consignee' => '',
   'Animal_Breeder_Location'=> $_POST['address'],
   'Animal_Breeder_Pin_Number'=> $_POST['pincode'],
   'Animal_Breeder_DNA_File' => $_FILES['dna']['name'],
   'Animal_Breeder_Sex' => $_POST['gender'],
   'Animal_Breeder_Age' => $_POST['age'],
   'Animal_Breeder_Age_Range' => $_POST['age_range'],
   'Animal_Breeder_Animal_Status' => $_POST['status'],
   'Animal_Breeder_Source' => $_POST['source'],
   'Animal_Breeder_Date_of_Admission' => $_POST['birth_day'].$_POST['birth_month'].$_POST['birth_year'],
   'Animal_Breeder_Note' => $_POST['note'],
   'Authorities_ID' => $_POST['authoritie_id'],
   'Animal_Breeder_Fillers' => "filer",
   'Animal_Breeder_Authorities_Deliver' => '',
  );

  print_r($data);
  $target_dir = "../dna";
  insertBreederHaveLife($data);

  function  insertBreederHaveLife($data){
    global $db;
    echo "<br>";
    //$db->where("Animal_ID",$data['Animal_ID']);
    $result = $db->insert("animal_breeder",$data);
     if($result){
         checkUploadImage($target_dir,$_FILES['dna']);
         echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
         echo "<meta http-equiv='refresh' content='0;url=../../mannageBreeder.php'>";
      }else{
        echo "<script>alert('ข้อมูลผิดพลาด ไม่สามารถเพิ่มข้อมูลได้');</script>";
        echo ($db-> error);
        echo "<br>";
        echo ($db->getLastError());
    }
  }


?>

<?php
  //add to animal_dead
  //update animal_dead_id in AnimalBreeder
  include '../utils/basic_include.php';
  require_once 'generate_qrcode.php';


  //generate Qrcode
  echo $_POST['animal_id'];
  $qrcode = generateQrcode($_POST['animal_id']);
  echo 'qrcode '.$qrcode;

  $data = Array(
   'Animal_ID'            => $_POST['animal_id'],
   'Authorities_ID'       => $_POST['dead_deliver'],
   'Animal_Dead_Date'     => $_POST['dead_day'].$_POST['dead_month'].$_POST['dead_year'],
   'Attachment'           => $_POST['atteachment'],
   'Animal_Dead_Age'      => $_POST['age'],
   'Animal_Dead_Date_of_Admission'     => $_POST['day_addmission'].$_POST['month_addmission'].$_POST['year_addmission'],
   'Environment_information'           => $_POST['env_info'],
   'Treatment_History'    => $_POST['history'],
   'Basic_Diagnosis'      => $_POST['basic_diagonosis'],
   'Body_Integrity_Score' => $_POST['Body_Integrity_Score'],
   'Death_Period'         => $_POST['dead_period'],
   'Condition_Carcass'    => $_POST['condition_carcass'],
   'Animal_Dead_Weight'   => $_POST['weight'],
   'Additional_Observations'   => $_POST['additional'],
   'Autopsy_Results'      => $_POST['autopsy_result'],
   'Laboratory_Sample'    => $_POST['sample'],
   'Test_Result'          => $_POST['test_result'],
   'Basic_Cause'          => $_POST['basic_cause'],
   'Lead_Factor'          => $_POST['lead_factor'],
   'Animal_Dead_Consignee'   => $_POST['dead_consignee'],
   'Animal_Dead_Authorities_Deliver'   => $_POST['dead_deliver'],
   'Animal_Dead_Fillers'   => 'some user',
   'Animal_Dead_Sex'      => $_POST['gender'],
   'Destroy_The_Remains_Status'    => $_POST['destory_status'],
   'Cause_of_Death'       => $_POST['case_of_death'],
   'Destroy_The_Remains_File' => 'destroy_file',
   'Animal_Dead_Photo_1' => $_FILES['animalDeadPic']['name'][0],
   'Animal_Dead_Photo_2' => 'photo',
   'Animal_Dead_Photo_3' => 'photo',
   'Animal_Dead_Photo_4' => 'photo',
   'Animal_Dead_Photo_5' => 'photo',
   'QR_Code_Animal_Dead' => 'qrcode',
  );

  print_r($data);
  insertAnimalDead($data);
  updateAnimalDeadID($data['Animal_ID']);

  //upload muti Image
  // Count # of uploaded files in array
  $total = count($_FILES['animalDeadPic']['name']);

  // Loop through each file
  for( $i=0 ; $i < $total ; $i++ ) {

    //Get the temp file path
    $tmpFilePath = $_FILES['animalDeadPic']['tmp_name'][$i];

    //Make sure we have a file path
    if ($tmpFilePath != ""){
      //Setup our new file path
      $newFilePath = "../pictureannimal/" . $_FILES['animalDeadPic']['name'][$i];

      //Upload the file into the temp dir
      if(move_uploaded_file($tmpFilePath, $newFilePath)) {

        //Handle other code here

      }
    }
}

  function insertAnimalDead($data){
    global $db;
    $result = $db->insert('animal_dead',$data);
    if($result){
       echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
       echo "<meta http-equiv='refresh' content='0;url=../../mannageBreeder.php'>";
    }else{
       echo "<script>alert('ข้อมูลผิดพลาด ไม่สามารถเพิ่มข้อมูลได้');</script>";
       echo $db->getLastError();
    }
  }

  function updateAnimalDeadID($animal_id){
    //update animal DeadID in animal_breeder
    global $db;
    //get lastQuery()
    $lastRecordSQL = "SELECT Animal_Dead_ID FROM animal_dead ORDER BY Animal_Dead_ID DESC LIMIT 1";
    $animal = $db->rawQuery($lastRecordSQL);


    $animal_dead_id = $animal[0]['Animal_Dead_ID']; //last animal_dead_id


    $data_breeder = Array("Animal_Dead_ID" => $animal_dead_id);
    $db->where('Animal_ID',$animal_id);
    //$db->where('Animal_Breeder_ID',$) try to and animal_breeder
    $db->update('animal_breeder',$data_breeder);

    // echo "check lastQuery debug";
    // echo $db->getLastQuery();
  }


?>

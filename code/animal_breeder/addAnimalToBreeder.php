<?php
  include '../utils/basic_include.php';


  $animals_id = $_POST['animal']; //recive animalID from modal

  //create  animalBreederData and Insert
  //create data
  foreach ($animals_id as $animal ) {
    echo "<br>";
    echo "show ID $animal";
    echo "<br>";
    $data = Array(
       "Animal_Dead_ID" => 0,
       "Authorities_ID" => 0,
       "Animal_ID" => (int)$animal,
       "Animal_Pairing_ID" => 0,
       "Animal_Breeder_F_M_Name" => '',
       "Animal_Breeder_Pin_Number"=>0,
       "Animal_Breeder_F_ID" => 0,
       "Animal_Breeder_M_ID" => 0,
       "Animal_Name" => '',
       "Animal_Breeder_Age" => 0,
       "Animal_Breeder_Sex" => 0,
       "Animal_Breeder_Age_Range" => 0,
       "Animal_Breeder_Location" => '',
       "Animal_Breeder_DNA_File" => '',
       "Animal_Breeder_Note" => '',
       "Animal_Breeder_Date_of_Admission" =>0,
       "Animal_Breeder_Consignee" => '',
       "Animal_Breeder_Authorities_Deliver" => '',
       "Animal_Breeder_Fillers" => '',
       "Animal_Breeder_Source" => '',
       "Animal_Breeder_Animal_Status"=>1,
    );
    insertInfoAnimalBreeder($data);

  }
  echo "<meta http-equiv='refresh' content='0;url=../../mannageBreeder.php'>";

  function insertInfoAnimalBreeder($data){
    global $db;
    $result = $db->insert('animal_breeder',$data);
    if($result){
      echo "insert ... ";
    }else{
      echo "<br> error";
      echo "<br>";
      echo($db-> getLastError());
    }
  }

 ?>

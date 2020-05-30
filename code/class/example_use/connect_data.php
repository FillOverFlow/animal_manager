<?php
    require_once('../MysqliDb.php');

    $db = new MysqliDb('localhost','root','','project');


    function showAnimalData(){
        global $db;

        $animals = $db->get("animal");
        if($db->count == 0){
          echo "<p> No animal </p>";
        }

        foreach ($animals as $animal) {
          echo "<br>";
          echo $animal['Thai_Common_Name'];
          echo $animal['English_Common_Name'];
        }
    }

    function showAuthorData(){
      global $db;
      $db->where("Authorities_ID",16);
      $user = $db->getOne("authorities");
      echo $user['Username'];

    }

    function action_moddb () {
      global $db;

      $data = Array(
          'login' => $_POST['login'],
          'customerId' => 1,
          'firstName' => $_POST['firstName'],
          'lastName' => $_POST['lastName'],
      );
      $id = (int)$_POST['id'];
      $db->where ("customerId",1);
      $db->where ("id", $id);
      $db->update ('users', $data);
      header ("Location: index.php");
    exit;

    }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
   <title>Test Example</title>
 </head>
 <body>
  <p>Show All Animal Data</p>
  <?php echo showAuthorData(); ?>

 </body>
 </html>

<?php 
session_start();
if (empty($_SESSION["authorities"])) {
 header ("Location: index.php");
}
require_once('code/mannageannimalcenter/class.php');
error_reporting (E_ALL ^ E_NOTICE);
$tblanimal = 'animal';
$dataanimal = showAnimalData($tblanimal,'no');
$dataanimaldead = showAnimalDeadData();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/css.css">

  <title>ระบบจัดการข้อมูลสัตว์ สถานีเพาะเลี้ยงนกน้ำบางพระระบบจัดการข้อมูลสัตว์ สถานีเพาะเลี้ยงนกน้ำบางพระ จังหวัดชลบุรี</title>
</head>
<body>
  <div class="row m-5">
    <div class="col-2">
      <img src="picture/logo.jpg" width="100px" class="float-right">
    </div>
    <div class="col-10">
      <div class="float-left">
        <h4>ระบบจัดการข้อมูลสัตว์ สถานีเพาะเลี้ยงนกน้ำบางพระ จังหวัดชลบุรี</h4>
      </div>
      <div class="float-right">
        <a class="text-dark" href="#">ผู้ใช้งาน</a>&nbsp;<b>|</b>&nbsp;<a class="text-dark" href="code/login/logout.php">ออกจากระบบ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <hr class="float-left" width="94%" size="20" color="black">

    </div>
    
  </div>

  <?php include('menu.php');  ?>

  <div id="display-2" class="col-sm p-5 border border-dark rounded h-80 w-100"> 

    <div class="row mt-5">
      <div class="col-sm">

        <center>
          <form action="mannageannimalcenter.php" method="GET"><a href="addcase.php" class="btn btn-light">เพิ่มคดี</a>&nbsp;&nbsp;<label>ค้นหา :&nbsp;&nbsp;</label><input type="text" name="annimal_name_search" class="form">&nbsp;&nbsp;<input type="submit" class="btn btn-light" value="ค้นหา"></form>
        </center>


        <table class="table mt-5">
          <thead>
            <tr>
              <th scope="col">ลำดับที่</th>
              <th scope="col">คดีอาญาที่</th>
              <th scope="col">ยึดทรัพท์ที่</th>
              <th scope="col">สถานะคดี</th>
              <th scope="col">ดูข้อมูลคดี</th>
              <th scope="col">จำนวน</th>
              <th scope="col">เพิ่มสัตว์มีชีวิต</th>
              <th scope="col">จำนวน</th>
              <th scope="col">เพิ่มสัตว์ตาย</th>
              <th scope="col">จำนวน</th>
              <th scope="col">แก้ไข</th>
              <th scope="col">ลบ</th>
            </tr>
          </thead>
          <tbody>
            <tr>

              <?php
              $search = $_GET['annimal_name_search'];
              if ($search) {

               if ($search  =='ระหว่างดำเนินคดี') {
                 $sear = 1;
               }else if($search  =='ถึงที่สุดแล้ว'){
                 $sear = 2;
               }
               $sql = "SELECT * FROM case_animal WHERE  Status_Case_Animal LIKE '%".$sear."%'";
             }else{
              $sql = "SELECT * FROM case_animal  WHERE status = '1'";
            }

            $result = $db->query($sql);
            $i = 1;
            foreach($result as $key =>$row) {
              ?>
              <tr>
                <th><?php echo $i;?></th>
                <td><?php echo $row['Criminal_Case_No']?></td>
                <td><?php echo $row['Confiscation_Case_No']?></td>
                <td>
                  <?php if($row['Status_Case_Animal'] =='1'){echo "ระหว่างดำเนินคดี";}?>
                  <?php if($row['Status_Case_Animal'] =='2'){echo "ถึงที่สุดแล้ว";}?>
                </td>
                <td><a class="btn btn-light" href="showcase.php?id=<?php echo $row['Case_Animal_ID'];?>"><img src="picture/magnifyingglass.png" width="25px" ></a></td>
                <th>
                  <?php
                  $sqlcount = "SELECT * FROM wild_animal_exhibits WHERE Case_Animal_ID = '".$row['Case_Animal_ID']."' AND status ='1' AND Animal_Dead_ID = '0'";
                  $result = $db->query($sqlcount);
                  $count = count($result);
                  echo $count;
                  // var_dump($count);
                  ?>

                </th>
                <td><button class="btn btn-light addhlive" href="#" data-id="<?php echo $row['Case_Animal_ID']?>"><img src="picture/plus.png" width="25px" ></button></td>
                <th>
                  <?php
                  $sqlcountd = "SELECT * FROM wild_animal_exhibits WHERE Case_Animal_ID = '".$row['Case_Animal_ID']."' AND status ='1' AND Animal_Dead_ID != '0'";
                  $resultd = $db->query($sqlcountd);
                  $countd = count($resultd);
                  echo $countd;
                  // var_dump($count);
                  ?>
                  
                </th>
                <td><button class="btn btn-light adddead" href="#" data-id="<?php echo $row['Case_Animal_ID']?>"><img src="picture/plus.png" width="25px" ></button></td>
                <th>
                 <?php
                 $sqlcountd = "SELECT * FROM wild_animal_exhibits WHERE  status ='1' AND Case_Animal_ID = '".$row['Case_Animal_ID']."'";
                 $resultd = $db->query($sqlcountd);
                 $countd = count($resultd);
                 echo $countd;
                  // var_dump($count);
                 ?>
               </th>
               <td><a class="btn btn-light" href="editcase.php?id=<?php echo $row['Case_Animal_ID']; ?>"><img src="picture/gg.png" width="20px" ></a></td>
               <td><button class="btn btn-light deleteannimal" data-id="<?php echo $row['Case_Animal_ID']; ?>"><img src="picture/delete.png" width="20px" ></button></td>
             </tr>
             <?php $i++; } ?>
           </tr>
         </tbody>
       </table>

     </div>
   </div>

   <button class="btn btn-light float-left back">ย้อนกลับ</button>
   <button class='btn btn-light float-right'>รายงานการนำไปใช้ประโชยน์<br>ของสัตว์กรณีแก้ไข</button>

 </div>
 <div class="col-1 p-5">
 </div>





 <div class="modal fade" id="showeditannimal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5 class="modal-title float-left" id="exampleModalCenterTitle">แก้ไขชนิดสัตว์</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <input type="text" name="nameannimal_edit" class="form-control">
        </form>
      </div>
      <div class="mt-2">
        <center><button type="button" class="btn btn-light">บันทึก</button></center>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteannimal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5 class="modal-title float-left" id="exampleModalCenterTitle">ลบ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code/mannageannimalcenter/delete.php" method="GET">
        <div class="modal-body">
          <center><img src="picture/unnamed.png" width="100px" height="100px">
            <input type="hidden" name="id" id="iddelete">
            <h1>ต้องการลบ<br>ข้อมูลหรือไม่</h1></center>
          </div>
          <div class="mt-2">
            <button type="submit" class="btn btn-light float-left">ยืนยัน</button><button type="button" class="btn btn-light float-right" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addhlive" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content p-3">
        <div class="modal-header">
          <h5 class="modal-title float-left" id="exampleModalCenterTitle">เพิ่มชื่อสามัญ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="code/mannageannimalcenterhlive/addcase.php" method="POST">
            <input type="hidden" name="idcase" id="idcase">
            <input type="hidden" name="idanimal" id="idanimal">
            <table class="table">
              <thead>
                <tr>
                  <th>ลำดับ</th>
                  <th>ชื่อสามัญไทย</th>
                  <th>ชื่อสามัญอังกฤษ</th>
                  <th>เลือก</th>
                </tr>

              </thead>
              <tbody>
                <?php 
                $i = 1;
                foreach($dataanimal as $key => $value){?>
                  <tr>
                   <td><?php echo $i;?></td>
                   <td><?php echo $value['Thai_Common_Name'];?></td>
                   <td><?php echo $value['English_Common_Name'];?></td>
                   <td><button class="btn btn-primary animal" type="submit" data-id="<?php echo $value['Animal_ID'];?>">เพิ่ม</button></td>
                 </tr>
                 <?php  $i++;  }?>
               </tbody>

             </table>
           </form>
         </div>
         <div class="mt-2">
         </div>
       </div>
     </div>
   </div>

   <div class="modal fade" id="addhdead" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content p-3">
        <div class="modal-header">
          <h5 class="modal-title float-left" id="exampleModalCenterTitle">เพิ่มชื่อสามัญ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="code/mannageannimalcenterhlive/addcasedead.php" method="POST">
            <input type="hidden" name="idcasedead" id="idcasedead">
            <input type="hidden" name="idanimaldead" id="idanimaldead">
            <input type="hidden" name="Wild_Animal_Exhibits_ID" id="Wild_Animal_Exhibits_ID">
            <table class="table">
              <thead>
                <tr>
                  <th>หมายเลข</th>
                  <th>ชื่อสามัญไทย</th>
                  <th>ชื่อสามัญอังกฤษ</th>
                  <th>เลือก</th>
                </tr>

              </thead>
              <tbody>
                <?php 
                if(empty($dataanimaldead)){
                  echo "ไม่มีสัตว์มีชีวิต";
                }else{

                 $i = 1;
                 foreach($dataanimaldead as $key => $value){?>
                  <tr>
                   <td><?php echo $value['W_A_E_number'];?></td>
                   <td><?php echo $value['Thai_Common_Name'];?></td>
                   <td><?php echo $value['English_Common_Name'];?></td>
                   <td><button class="btn btn-primary animaldead" type="btn" data-id="[<?php echo $value['Wild_Animal_Exhibits_ID'];?>,<?php echo $value['Animal_ID'];?>]">เพิ่ม</button></td>
                 </tr>
                 <?php  $i++;  }

               }
               ?>
             </tbody>

           </table>
         </form>
       </div>
       <div class="mt-2">
       </div>
     </div>
   </div>
 </div>


 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script type="text/javascript">

  $(document).ready(function() {

    $('.back').on('click', function (e) {
      e.preventDefault()
      window.location.replace("http://localhost/animal_manager/mannageuser.php");

    })

    $('#myTab a').on('click', function (e) {
      e.preventDefault()
      $(this).tab('show')
    })

    $('.deleteannimal').on('click', function () {
      var id = $(this).data('id');
      $('#iddelete').val(id);
      $('#deleteannimal').modal('show');

    })

    $('.showeditannimal').on('click', function () {
      $('#showeditannimal').modal('show');
    })

    $('.showqr1').on('click', function () {
      $('#showqr1').modal('show');
    })

    $('.addhlive').on('click', function () {
      var id = $(this).data('id');
      $('#idcase').val(id);
      $('#addhlive').modal('show');
    })
    $('.adddead').on('click', function () {
      var id = $(this).data('id');
      $('#idcasedead').val(id);
      $('#addhdead').modal('show');
    })
    $('.animal').on('click',function() {
      var id = $(this).data('id');
      $('#idanimal').val(id);
    });

    $('.animaldead').on('click',function() {
      var id = $(this).data('id');
      $('#Wild_Animal_Exhibits_ID').val(id[0]);
      $('#idanimaldead').val(id[1]);
    });

    $('.mnl').click(function(event) {

      var page = 0;
      var id = $(this).data('id');
      var dism = document.getElementById("display-m");
      var dis1 = document.getElementById("display-1");
      var dis2 = document.getElementById("display-2");



      if (id==1) {
        dis1.style.display = 'block';
        dism.style.display = 'none';
        dis2.style.display = 'none';
        page == 1 ;
      }
      if (id==2) {
        dism.style.display = 'none';
        dis1.style.display = 'none';
        dis2.style.display = 'block';
      }
      else{

      }

    });
  });

</script>
</body>
</html>


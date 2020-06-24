<?php 
require_once('code/mannageannimalcenter/class.php');
error_reporting (E_ALL ^ E_NOTICE);
$tblanimal = 'animal';
$type = '0';
$tblwild_animal_exhibits = 'wild_animal_exhibits';
$dataanimal = showAnimalData($tblanimal,$type);

if($_GET['annimal_name_search']){

  $name = $_GET['annimal_name_search'];
  $sql = "SELECT * from wild_animal_exhibits JOIN animal on wild_animal_exhibits.Animal_ID = animal.Animal_ID  where wild_animal_exhibits.status = 1 
  and animal.Thai_Common_Name LIKE '%".$name."%' GROUP BY wild_animal_exhibits.Animal_ID OR wild_animal_exhibits.Case_Animal_ID and wild_animal_exhibits.Animal_Dead_ID = '0'";
  $datajoin = $db->query($sql);

}else{
  $datajoin = joinshow(0);
}

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


  <div id="display-2" class="col-9 p-5 border border-dark rounded h-80 w-100"> 

    <div class="row mt-5">
      <div class="col-1"></div>
      <div class="col-10">
 <!-- <a><button type="button" class="btn btn-light addhlive">เพิ่มชื่อสามัญ</button></a> -->
        <center>
          <form action="mannageannimalcenterhlive.php" method="GET">
           &nbsp;&nbsp;<label>ค้นหา :&nbsp;&nbsp;</label><input type="text" name="annimal_name_search" class="form">&nbsp;&nbsp;<input type="submit" class="btn btn-light" value="ค้นหา"></center>
          </form>

          <p>ค้นหาข้อมูลสัตว์ป่ากลางมีชีวิต</p>
          <table class="table mt-2">
            <thead>
              <tr>
                <th scope="col">ลำดับที่</th>
                <th scope="col">ชื่อสามัญไทย</th>
                <th scope="col">ชื่อสามัญอังกฤษ</th>
                <th scope="col">จำนวน</th>
                <th scope="col">เพิ่ม</th>
                <th scope="col">ลบ</th>
              </tr>
            </thead>
            <tbody>

              <?php   $i =1;foreach ($datajoin as $key => $value) {?>
                <tr>
                 <th><?php echo $i; ?></th>
                 <td><?php echo $value['Thai_Common_Name']; ?></td>
                 <td><?php echo $value['English_Common_Name']; ?></td>
                 <td>
                   <?php
                   $sqlcount = "SELECT * FROM wild_animal_exhibits WHERE Case_Animal_ID = '".$value['Case_Animal_ID']."' AND wild_animal_exhibits.Animal_ID = '".$value['Animal_ID']."'   AND status ='1' AND Animal_Dead_ID = '0'";
                   $result = $db->query($sqlcount);
                   $count = count($result);
                   echo $count;
                  // var_dump($count);
                   ?>
                 </td>
                 <td><a href="addh1.php?id=<?php echo $value['Wild_Animal_Exhibits_ID']; ?>" class="btn btn-light" href="#"><img src="picture/plus.png" width="25px" height="20px"></a></td>
                 <td><button class="btn btn-light deleteannimal" data-id="<?php echo $value['Animal_ID']; ?>"><img src="picture/delete.png" width="20px" height="20px"></button></td>
               </tr>
               <?php $i++;} ?>
               
             </tbody>
           </table>

         </div>
         <div class="col-1"></div>
       </div>

       <button class="btn btn-light float-left back">ย้อนกลับ</button>

     </div>
     <div class="col-1 p-5">
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
                   <td><a href="code/mannageannimalcenterhlive/add.php?id=<?php echo $value['Animal_ID'];?>">เพิ่ม</td>
                   </tr>
                   <?php  $i++;  }?>
                 </tbody>

               </table>
             </div>
             <div class="mt-2">
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
            <form action="code/mannageannimalcenterhlive/delete.php" method="GET">
              <div class="modal-body">
                <center><img src="picture/unnamed.png" width="100px" height="100px">
                  <h1>ต้องการลบ<br>ข้อมูลหรือไม่</h1></center>
                  <input id="idupdate" type="hidden" name="id" value="">
                  <input type="hidden" name="type" value="0">
                </div>
                <div class="mt-2">
                  <button type="submit" class="btn btn-light float-left">ยืนยัน</button><button type="button" class="btn btn-light float-right" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
                </div>
              </form>
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
            $('#idupdate').val(id);
            $('#deleteannimal').modal('show');
          })

          $('.showeditannimal').on('click', function () {
            $('#showeditannimal').modal('show');
          })

          $('.addhlive').on('click', function () {
            $('#addhlive').modal('show');
          })

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
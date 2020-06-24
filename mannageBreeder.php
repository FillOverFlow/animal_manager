<?php
  require_once 'code/connect.php';
 ?>
<!DOCTYPE html>
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
      <?php
        $search ="";
        if(isset($_POST['annimal_name_search'])){
          $search = $_POST['annimal_name_search'];
        }




       ?>

        <div class="row" align="center">
           <button class="btn btn-light addhlive">เพิ่มชื่อสามัญ</button>  &nbsp;&nbsp;<label>ค้นหา :&nbsp;&nbsp;</label>
            <form action="mannageBreeder.php" method="post">
              <input type="text" name="annimal_name_search" class="form" value="<?php echo $search; ?>">&nbsp;&nbsp;
              <input type="submit" class="btn btn-light" value="ค้นหา">
            </form>
        </div>


      <p class="mt-5">ค้นหาข้อมูลสัตว์พ่อ-แม่พันธ์</p>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ลำดับที่</th>
            <th scope="col">ชื่อสามัญไทย</th>
            <th scope="col">ชื่อสามัญภาษาอังกฤษ</th>
            <th scope="col">จำนวนมีชีวิต</th>
            <th scope="col">เพิ่มสัตว์มีชีวิต</th>
            <th scope="col">จำนวนตาย</th>
            <th scope="col">เพิ่มสัตว์ตาย</th>
            <th scope="col">ลบ</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $db->where('status',1);
            $db->getLastError();
            $animal_breeder = $db->get('animal');

            $i=1;
            foreach ($animal_breeder as $animal ) {

           ?>
          <tr>
            <?php
               $db->where("Animal_ID",$animal['Animal_ID']);
               $data = $db->getOne("animal");
             ?>
            <th><?php echo $i; ?></th>
            <td><?php echo $data['Thai_Common_Name']; ?></td>
            <td><?php echo $data['English_Common_Name']; ?></td>
            <?php
              //count animal have life
              $db->where("Animal_ID",$animal['Animal_ID']);
              $db->where("Animal_Dead_ID",0);
              $db->get('animal_breeder');
              $countLife = $db->count;
             ?>
            <td><?php echo $countLife; ?></td>
            <td><a href="addsbhave.php?animal_id=<?php echo $data['Animal_ID']; ?>&&animal_type=<?php echo $data['Animal_Type_ID']; ?>" class="btn btn-light "><img src="picture/plus.png" width="25px" height="20px"></a></td>
            <?php
              //count animal  dead
              $db->where("Animal_ID",$animal['Animal_ID']);
              $db->where("Animal_Dead_ID",!0);
              $db->get('animal_breeder');
              $countDead = $db->count;
             ?>
            <td><?php echo $countDead; ?></td>
            <td><a href="addsbdead.php?animal_id=<?php echo $data['Animal_ID']; ?>&&animal_type=<?php echo $data['Animal_Type_ID']; ?>" class="btn btn-light " href="#"><img src="picture/plus.png" width="25px" height="20px"></a></td>
            <td><button class="btn btn-light deleteannimal"><img src="picture/delete.png" width="20px" height="20px"></button></td>
          </tr>
        <?php $i++;} ?>
        </tbody>
      </table>

    </div>
    <div class="col-1"></div>
  </div>

  <button class="btn btn-light float-left back">ย้อนกลับ</button>
  <button class='btn btn-light float-right'>รายงานการนำไปใช้ประโชยน์<br>ของสัตว์กรณีแก้ไข</button>

</div>
<div class="col-1 p-5">
</div>

<!-- modal -->
<div class="modal fade" id="addhlive" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5 class="modal-title float-left" id="exampleModalCenterTitle">เพิ่มชื่อสามัญ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code/animal_breeder/addAnimalToBreeder.php" method="post">
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
                $animals = $db->get("animal");
                foreach ($animals as $animal ) {
               ?>
              <tr>
                <td><?php echo $animal['Animal_ID']; ?></td>
                <td><?php echo $animal['Thai_Common_Name']; ?></td>
                <td><?php echo $animal['English_Common_Name']; ?></td>
                <td><input type="checkbox" name="animal[]" value="<?php echo $animal['Animal_ID']; ?>"></td>
              </tr>
            <?php } ?>
            </tbody>

          </table>
        </div>
        <div class="mt-2">
          <button type="submit" class="btn btn-light float-right">เพิ่มลงในตาราง</button>
        </div>
      </div>
    </form>
  </div>
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
      <div class="modal-body">
        <center><img src="picture/unnamed.png" width="100px" height="100px">
          <h1>ต้องการลบ<br>ข้อมูลหรือไม่</h1></center>
        </div>
        <div class="mt-2">
          <button type="button" class="btn btn-light float-left">ยืนยัน</button><button type="button" class="btn btn-light float-right" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
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

          $('.addhlive').on('click', function () {
            $('#addhlive').modal('show');
          })

          $('.deleteannimal').on('click', function () {
            $('#deleteannimal').modal('show');
          })

           $('.showeditannimal').on('click', function () {
            $('#showeditannimal').modal('show');
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

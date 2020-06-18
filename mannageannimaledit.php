<?php
require_once('code/mannageannimaledit/class.php');
error_reporting (E_ALL ^ E_NOTICE);
$listanimal = listanimal();
if($_GET['annimal_name_search'] != ''){
$data = showcorrection($_GET['annimal_name_search']);
}else{
$search = '';
$data = showcorrection($search);
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
        <a class="text-dark" href="#">ผู้ใช้งาน</a>&nbsp;<b>|</b>&nbsp;<a class="text-dark" href="#">ออกจากระบบ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <hr class="float-left" width="94%" size="20" color="black">

    </div>
    
  </div>

  <?php include('menu.php');  ?>


  <div id="display-2" class="col-9 p-5 border border-dark rounded h-80 w-100"> 

    <div class="row mt-5">
      <div class="col-1"></div>
      <div class="col-10">
        <form action="mannageannimaledit.php" method="GET">
        <center> <a><button class="btn btn-light addhlive">เพิ่มชื่อสามัญ</button></a>&nbsp;&nbsp;<label>ค้นหา :&nbsp;&nbsp;</label><input type="text" name="annimal_name_search" class="form">&nbsp;&nbsp;<input type="submit" class="btn btn-light" value="ค้นหา"></center></form>

        <p class="mt-5">ค้นหาสัตว์กรณีแก้ไข</p>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ลำดับที่</th>
              <th scope="col">ชื่อสามัญไทย</th>
              <th scope="col">ชื่อสามัญภาษาอังกฤษ</th>
              <th scope="col">วันรับเข้า</th>
              <th scope="col">จำนวนมีชีวิต</th>
              <th scope="col">เพิ่มสัตว์มีชีวิต</th>
              <th scope="col">จำนวนตาย</th>
              <th scope="col">เพิ่มสัตว์ตาย</th>
              <th scope="col">ลบ</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; foreach ($data as $key => $value) { ?>
              <tr>
                <th><?php echo $i; ?></th>
                <td><?php echo $value['Thai_Common_Name']; ?></td>
                <td><?php echo $value['English_Common_Name']; ?></td>
                <td>-</td>
                <td>
                  <?php
                  $Animal_ID = $value['Animal_ID'];
                  $datacounthavelife = countlife($Animal_ID);
                  echo $datacounthavelife; 
                  ?>
                </td>
                <td><a href="addehave.php" class="btn btn-light addhlive" href="#"><img src="picture/plus.png" width="25px" height="20px"></a></td>
                <td>
                  <?php
                  $Animal_ID = $value['Animal_ID'];
                  $datacountdie = countdie($Animal_ID);
                   echo $datacountdie;
                    ?>
                  
                </td>
                <td><a href="addedead.php" class="btn btn-light addhlive" href="#"><img src="picture/plus.png" width="25px" height="20px"></a></td>
                <td><button class="btn btn-light deleteannimal" data-id=" <?php echo  $value['Animal_Case_Correction_ID'];?>"> <img src="picture/delete.png" width="20px" height="20px"></button></td>
              </tr>
            <?php } $i++;?>
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
        <form action="code/mannageannimaledit/addanimal.php" method="POST">
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
                foreach ($listanimal as $key => $value) { 
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $value['Thai_Common_Name'];?></td>
                    <td><?php echo $value['English_Common_Name'];?></td>
                    <td><input type="checkbox" name="Animal_ID[]" value="<?php echo $value['Animal_ID'];?>"></td>
                  </tr>
                  <?php $i++; } ?>
                </tbody>

              </table>
            </div>
            <div class="mt-2">
              <button type="submit" class="btn btn-light float-right">เพิ่มลงในตาราง</button>
            </div>
          </form>
        </div>
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
          <form action="code/mannageannimaledit/delete.php" method="GET">
          <div class="modal-body">
            <input type="hidden" name="Animal_Case_Correction_ID" id="Animal_Case_Correction_ID">
            <center><img src="picture/unnamed.png" width="100px" height="100px">
              <h1>ต้องการลบ<br>ข้อมูลหรือไม่</h1></center>
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
          $('#deleteannimal').modal('show');
          var id = $(this).data('id');
          $('#Animal_Case_Correction_ID').val(id);
        })

        $('.addhlive').on('click', function () {
          $('#addhlive').modal('show');
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
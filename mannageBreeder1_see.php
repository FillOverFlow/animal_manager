<?php
require_once 'code/connect.php';
session_start();
if (empty($_SESSION["authorities"])) {
 header ("Location: index.php");
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
        <a class="text-dark" href="usermanage.php">ผู้ใช้งาน</a>&nbsp;<b>|</b>&nbsp;<a class="text-dark" href="code/login/logout.php">ออกจากระบบ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <hr class="float-left" width="94%" size="20" color="black">

    </div>
    
  </div>
  <?php include('menu.php');  ?>

  <div id="display-2" class="col-9 p-5 border border-dark rounded h-80 w-100"> 

    <div class="row">
      <div class="col-4"><label>&nbsp;&nbsp;แก้ไขข้อมูลสัตว์ป่าของกลาง-มีชีวิต</label></div>
      <div class="col-4">
      </div>
      <div class="col-4"></div>
    </div>

    <div class="row p-5">
      <div class="col-4">


        <table>
          <thead>
            <tr>

            </tr>
          </thead>
          <tbody>
            <tr>
              <th width="50%"><label class="float-right">เลือกพ่อขแม่พันธ์ :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">หมายเลขสัตว์ :</label>
              </th>
              <td><label>001</label></td>
            </tr>

            <tr>
              <th><label class="float-right">ชื่อสัตว์ :</label>
              </th>
              <td><label>-</label></td>
            </tr>
            <tr>
              <th><label class="float-right">ชนิดสัตว์ :</label>
              </th>
              <td><label>สัตว์เลี้ยงลูกด้วยนม</label></td>
            </tr>
            <tr>
              <th><label class="float-right">ชื่อสามัญไทย :</label>
              </th>
              <td><label>-</label></td>
            </tr>
            <tr>
              <th><label class="float-right">ชื่อสามัญอังกฤษ :</label>
              </th>
              <td><label>-</label></td>
            </tr>
            <tr>
              <th><label class="float-right" disabled="">ชื่อวิทยาศาสตร์ :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">สถานที่ :</label>
              </th>
              <td><label>-</label></td>
            </tr>
            <tr>
              <th><label class="float-right">เลขที่ห่วงขา :</label>
              </th>
              <td><label>12</label></td>
            </tr>

            <tr>
              <th><label class="float-right">DNA :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">เพศ :</label>
              </th>
              <td><label>เพศผู้</label></td>
            </tr>

            <tr>
              <th><label class="float-right">อายุ :</label>
              </th>
              <td><label>2</label>&nbsp;&nbsp;ปี&nbsp;&nbsp;<label>4</label>&nbsp;&nbsp;เดือน&nbsp;&nbsp;</td>
            </tr>

            <tr>
              <th><label class="float-right">ช่วงวัย :</label>
              </th>
              <td><label>โตเต็มวัย</label></td>
            </tr>
          </tbody>
        </table>


      </div>

      <div class="col-4">
        <table>
          <thead>
            <tr>

            </tr>
          </thead>
          <tbody>
           <tr>
            <th><label class="float-right">สถานะ :</label>
            </th>
            <td><label>ตัวผู้โตเต็มวัย</label></td>
          </tr>
          <tr>
            <th><label class="float-right">แหล่งที่มา :</label>
            </th>
            <td><label>-</label></td>
          </tr>

          <tr>
            <th><label class="float-right">วันที่รับมา :</label>
            </th>
            <td><label>10 กันยายน 2563</label></td>
          </tr>

          <tr>
            <th><label class="float-right">หมายเหตุ :</label>
            </th>
            <td><label>-</label></td>
          </tr>

          <tr>
            <th><label class="float-right">ผู้ที่รับมอบ :</label>
            </th>
            <td><label>-</label></td>
          </tr>
          <tr>
            <th><label class="float-right">ผู้กรอกข้อมูล :</label>
            </th>
            <td><label>-</label></td>
          </tr>

        </tbody>
      </table>
    </div>




    <div class="col-4">

      <div class="row m-10 ">
        <center><tr>
          <th><img src="picture/logo.png" width="200px" height="200px" class="border border-dark">
          </th>
        </tr></center>

      </div>
      <div class="row mt-2">

        <tr>
          <th><button class="btn btn-light float-right">แก้ไข</button>&nbsp;&nbsp;<button style="margin-left: 80px;" class="btn btn-light float-right">ลบ</button>
          </th>
        </tr>
      </div>
    </div>

  </div>

  

  <div class="mt-5 row">
    <div class="col float-left"><button class="btn btn-light back">ย้อนกลับ</button></div>
    <div class="col float-right" align="right"><img class="" src="picture/prin.png" width="50" height="50">  </div>
  </div>

</div>
<div class="col-1 p-5">
</div>






<div class="modal fade" id="showqr1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content p-3">
      <div class="modal-header">
        <h5 class="modal-title float-left" id="exampleModalCenterTitle">สร้าง QR-code</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="picture/logo.png" width="100%" height="100%" class="border border-dark">
      </div>
      <div class="mt-2">
        <center><button type="button" class="btn btn-light">ยืนยัน</button></center>
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
      window.location.replace("http://localhost/animal_manager/mannageBreeder1.php");
    })
    

  });


</script>

</body>
</html>
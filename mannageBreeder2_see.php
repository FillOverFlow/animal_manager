<?php 
require_once 'code/connect.php';
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
      <div class="col-4"><label>&nbsp;&nbsp;ดูข้อมูลสัตว์พ่อ-แม่พันธุ์ตาย</label></div>
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
              <th><label class="float-right">หมายเลขสัตว์ :</label>
              </th>
              <td><label>001</label></td>
            </tr>

            <tr>
              <th><label class="float-right">วัน/เดือน/ปี<br>การชันสูตรศพ :</label>
              </th>
              <td><label>10 ตุลาคม 2563</label></td>
            </tr>

            <tr>
              <th><label class="float-right">ชนิดสัตว์ :</label>
              </th>
              <td><label>-</label></td>
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
              <th><label class="float-right" disabled="">สิ่งที่แนบมา :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">เพศ :</label>
              </th>
              <td><label>เมีย</label></td>
            </tr>
            <tr>
              <th><label class="float-right" disabled="">อายุ :</label>
              </th>
              <td><label>10 ปี</label></td>
            </tr>
            <tr>
              <th><label class="float-right">วันรับมอบ :</label>
              </th>
              <td><label>10 ตุลาคม 2563</label></td>
            </tr>

            <tr>
              <th><label class="float-right">วันที่ตาย :</label>
              </th>
              <td><label>10 ตุลาคม 2563</label></td>
            </tr>

            <tr>
              <th><label class="float-right" disabled="">ข้อมูลแวดล้อม :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right" disabled="">ประวัติรักษา :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">การวินิฉัยเบื้องต้น :</label>
              </th>
              <td><label>-</label></td>
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
              <th><label class="float-right">ระยะเวลาป่วยตาย :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">สภาพซาก :</label>
              </th>
              <td><label>-</label></td>
            </tr>
            <tr>
              <th><label class="float-right">คะแนนความสมบูรณ์ของร่างกาย :</label>
              </th>
              <td><label>-</label></td>
            </tr>
            <tr>
              <th><label class="float-right">น้ำหนักตัว :</label>
              </th>
              <td><label>5 กก.</label></td>
            </tr>
            <tr>
              <th><label class="float-right">ข้อสังเกตุเพิ่มเติม :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">ผลการชันสูตร :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">ตัวอย่างห้องปฎิบัติการ :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">ผลการทดสอบ :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">สาเหตุเบื้องต้น :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">ปัจจัยโน้มนำ :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">ผู้รับมอบ :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">เจ้าหน้าที่นำส่ง :</label>
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




      <div class="col-4 ">







        <table>
          <thead>
            <tr>

            </tr>
          </thead>
          <tbody>

            <tr>
              <th><label class="float-right">สะถานะการทำลายซาก :</label>
              </th>
              <td><select class="form-control">
                <option selected>กรุณาเลือก</option>
              </select></td>
            </tr>

            <tr>
              <th><label class="float-right">สาเหตุการตาย :</label>
              </th>
              <td><textarea></textarea></td>
            </tr>

          </tbody>
        </table>


        <div class="row m-10 " align="center" style="padding-left: 90px;
        margin-top: 62px;">
        <img src="picture/logo.png" width="200px" height="200px" class="border border-dark">
      </div>
      <div class="row mt-2" style="padding-left: 90px;">
        <button class="btn btn-light float-right">แก้ไข</button>&nbsp;&nbsp;<button style="margin-left: 80px;" class="btn btn-light float-right">ลบ</button>
      </div>
    </div>





    <button class="btn btn-light float-left back">ย้อนกลับ</button>

  </div>
  <div class="col-1">
  </div>

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
          window.location.replace("http://localhost/animal_manager/mannageBreeder2.php");
        })
      $('#myTab a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
      })

      $('.deleteannimal').on('click', function () {
        $('#deleteannimal').modal('show');
      })

      $('.showqr1').on('click', function () {
        $('#showqr1').modal('show');
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
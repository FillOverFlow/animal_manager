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

  <?php include('menu.php');?>


  <div id="display-2" class="col-9 p-2 border border-dark rounded h-80 w-100"> 

    <div class="row">
      <div class="col-sm"><label>&nbsp;&nbsp;เพิ่มข้อมูลเจ้าหน้าที่</label></div>
      <div class="col-sm">
      </div>
      <div class="col-sm"></div>
    </div>

    <div class="row p-2">
      <div class="col-sm">
        <table>
          <thead>
          </thead>
          <tbody>
            <tr>
              <th><label class="float-right">รหัสเจ้าหน้าที่ :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">รหัสบัตรประชาชน :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">ชื่อผู้ใช้ :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">รหัสผ่าน :</label>
              </th>
             <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">ตำแหน่ง :</label>
              </th>
             <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">เพศ :</label>
              </th>
              <td><label>-</label></td>
            </tr>
            <tr>
              <th><label class="float-right" disabled="">ชื่อ :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right" disabled="">นามสกุล :</label>
              </th>
              <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">ว/ด/ป เกิด :</label>
              </th>
             <td><label>-</label></td>
            </tr>
          </tbody>
        </table>


      </div>

      <div class="col-sm">

        <table>
          <thead>
          </thead>
          <tbody>
            <tr>
              <th><label class="float-right">เบอร์โทร :</label>
              </th>
            <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">สถานะการทำงาน :</label>
              </th>
             <td><label>-</label></td>
            </tr>

            <tr>
              <th><label class="float-right">ที่อยู่ :</label>
              </th>
              <td><textarea>--</textarea></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-sm" align="center">
        <table>
          <thead>
          </thead>
          <tbody>
            <tr>
              <th><img src="picture/logo.png" width="200px" class="border border-dark">
              </th>
            </tr>
          </tbody>
        </table>

        <button class="btn btn-light" style="margin-top: 10px;">แก้ไข</button>&nbsp;<button class="btn btn-light" style="margin-top: 10px;">ลบ</button>

      </div>

      <div class="row container-fluid mt-5">
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4" align="center">
          <button class="btn btn-light" >กลับ</button>&nbsp;
          <button class="btn btn-light" >ถัดไป</button>
        </div>
        <div class="col-sm-4"></div>
      </div>
      <div class="row container-fluid mt-5">
        <div class="col-sm-4">
          <button class="btn btn-light float-left back">ย้อนกลับ</button>
        </div>
        <div class="col-sm-4" align="center">
        </div>
        <div class="col-sm-4"></div>
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
      <div class="modal fade" id="addbreeder" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content p-3">
            <div class="modal-header">
              <h5 class="modal-title float-left" id="exampleModalCenterTitle">เพิ่มชื่อพ่อ-แม่พันธ์</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อสัตว์</th>
                    <th>ดูข้อมูล</th>
                    <th>เลือก</th>
                  </tr>

                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>เสือกำ</td>
                    <td><a href="#"><img src="picture/magnifyingglass.png" width="20px"></a></td>
                    <td><input type="checkbox" name="เสือดำ" value=""></td>
                  </tr>
                </tbody>

              </table>
            </div>
            <div class="mt-2" align="center">
              <button type="button" class="btn btn-light">ตกลง</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="addbreederedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content p-3">
            <div class="modal-header">
              <h5 class="modal-title float-left" id="exampleModalCenterTitle">เลือกสัตว์พ่อแม่พันธ์-กรณีแก้ไข</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table">
                <thead>
                  <tr>
                    <th>ลำดับที่</th>
                    <th>หมายเลขสัตว์</th>
                    <th>ดูข้อมูล</th>
                    <th>เลือก</th>
                  </tr>

                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>เสือกำ</td>
                    <td><a href="#"><img src="picture/magnifyingglass.png" width="20px"></a></td>
                    <td><input type="checkbox" name="เสือดำ" value=""></td>
                  </tr>
                </tbody>

              </table>
            </div>
            <div class="mt-2" align="center">
              <button type="button" class="btn btn-light">ตกลง</button>
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
                window.location.replace("http://localhost/animal_manager/authorities.php");
              })

          $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
          })

          $('.addbreeder').on('click',function (){
            $('#addbreeder').modal('show');
          })

          $('.addbreederedit').on('click',function (){
            $('#addbreederedit').modal('show');
          })

          $('.showqr1').on('click', function () {
            $('#showqr1').modal('show');
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
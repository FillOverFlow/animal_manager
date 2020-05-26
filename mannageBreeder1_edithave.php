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
              <td><input type="text"   placeholder="" ><a href="#"><img class="addbreeder"  src="picture/plus.png" width="30px"></a></td>
            </tr>

            <tr>
              <th><label class="float-right">หมายเลขสัตว์ :</label>
              </th>
              <td><input type="text"   placeholder="" value="-"><a href="#"><img class="addbreederedit"  src="picture/plus.png" width="30px"></td>
              </tr>

              <tr>
                <th><label class="float-right">ชื่อสัตว์ :</label>
                </th>
                <td><input type="text"   placeholder="" ></td>
              </tr>
              <tr>
                <th><label class="float-right">ชนิดสัตว์ :</label>
                </th>
                <td><input type="text"   placeholder="" disabled=""></td>
              </tr>
              <tr>
                <th><label class="float-right">ชื่อสามัญไทย :</label>
                </th>
                <td><input type="text"   placeholder="" disabled=""></td>
              </tr>
              <tr>
                <th><label class="float-right">ชื่อสามัญอังกฤษ :</label>
                </th>
                <td><input type="text"   placeholder="" disabled=""></td>
              </tr>
              <tr>
                <th><label class="float-right" disabled="">ชื่อวิทยาศาสตร์ :</label>
                </th>
                <td><input type="text"   placeholder="" disabled=""></td>
              </tr>

              <tr>
                <th><label class="float-right">สถานที่ :</label>
                </th>
                <td><input type="text"   placeholder="" value="สถานที่"></td>
              </tr>
              <tr>
                <th><label class="float-right">เลขที่ห่วงขา :</label>
                </th>
                <td><input type="text"   placeholder="" value="12"></td>
              </tr>

              <tr>
                <th><label class="float-right">DNA :</label>
                </th>
                <td><input type="text"   placeholder="" ><img class="float-right" src="picture/+file.png" width="20px" height="20px"></td>
              </tr>

              <tr>
                <th><label class="float-right">เพศ :</label>
                </th>
                <td><select class="form-control">
                  <option selected>กรุณาเลือก</option>
                  <option selected>เพศผู้</option>
                  <option selected>เพศเมีย</option>
                </select></td>
              </tr>

              <tr>
                <th><label class="float-right">อายุ :</label>
                </th>
                <td><input style="width: 50px;" type="text"   placeholder="" value="2">&nbsp;&nbsp;ปี&nbsp;&nbsp;<input style="width: 50px;" type="text"   placeholder="" value="2">&nbsp;&nbsp;เดือน&nbsp;&nbsp;</td>
              </tr>

              <tr>
                <th><label class="float-right">ช่วงวัย :</label>
                </th>
                <td><select class="form-control">
                  <option selected>กรุณาเลือก</option>
                  <option selected>1</option>
                  <option selected>2</option>
                </select></td>
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
              <td><select class="form-control">
                <option selected>กรุณาเลือก</option>
              </select></td>
            </tr>
            <tr>
              <th><label class="float-right">แหล่งที่มา :</label>
              </th>
              <td><input type="" name="" value="-"></td>
            </tr>

            <tr>
              <th><label class="float-right">วันที่รับมา :</label>
              </th>
              <td><select class="form-control">
                <option selected>วันเดือนปี</option>
              </select></td>
            </tr>

            <tr>
              <th><label class="float-right">หมายเหตุ :</label>
              </th>
              <td><textarea name="">-</textarea></td>
            </tr>

            <tr>
              <th><label class="float-right">ผู้ที่รับมอบ :</label>
              </th>
              <td><select class="form-control">
                <option selected>กรุณาเลิกชื่อเจ้าหน้าที่</option>
              </select></td>
            </tr>
            <tr>
              <th><label class="float-right">ผู้กรอกข้อมูล :</label>
              </th>
              <td><input type="text"   placeholder=""  value="" disabled="disabled"></td>
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
            <th><button style="margin-left: 65px;" class="btn btn-light float-right">เพิ่มรูป</button>
            </th>
          </tr>
        </div>
      </div>

    </div>

    <center><button class="btn btn-light">บันทึก</button>&nbsp;&nbsp;<button class="btn btn-light">ยกเลิก</button></center>
    <button class="btn btn-light float-left back">ย้อนกลับ</button>

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
              window.location.replace("http://localhost/animal_manager/mannageBreeder1.php");
            })
        $('#myTab a').on('click', function (e) {
          e.preventDefault()
          $(this).tab('show')
        })

        $('.deleteannimal').on('click', function () {
          $('#deleteannimal').modal('show');
        })

        $('.showeditannimal').on('click', function () {
          $('#showeditannimal').modal('show');
        })

        $('.showqr1').on('click', function () {
          $('#showqr1').modal('show');
        })
        $('.addbreeder').on('click',function (){
          $('#addbreeder').modal('show');
        })

        $('.addbreederedit').on('click',function (){
          $('#addbreederedit').modal('show');
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
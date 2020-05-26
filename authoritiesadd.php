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
    <form action="code/authorities/add_authorities.php" method="post">
      <div class="row p-2">
        <div class="col-sm">
          <table>
            <thead>
            </thead>
            <tbody>
              <tr>
                <th><label class="float-right"><font size="2px">รหัสเจ้าหน้าที่ :</label>
                </th>
                <td><input type="text" name="id"></td>
              </tr>

              <tr>
                <th><label class="float-right"><font size="2px">รหัสบัตรประชาชน :</font></label>
                </th>
                <td><input type="text" name="idcard"></td>
              </tr>

              <tr>
                <th><label class="float-right">ชื่อผู้ใช้ :</label>
                </th>
                <td><input type="text"   name="username"></td>
              </tr>

              <tr>
                <th><label class="float-right">รหัสผ่าน :</label>
                </th>
                <td><input type="text"   name="password"></td>
              </tr>

              <tr>
                <th><label class="float-right" style="witdh:100%;">ตำแหน่ง :</label>
                </th>
                <td>
                  <select name="gender">
                    <option >กรุณาเลือกเพศ</option>
                    <option value="1">ชาย</option>
                    <option value="2">หญิง</option>
                </select>
              </td>
              </tr>
              <tr>
                <th><label class="float-right" style="witdh:100%;">เพศ :</label>
                </th>
                <td>
                  <select name="position">
                    <option >กรุณาเลือกตำแหน่ง</option>
                    <option value="1">เจ้าหน้าที่</option>
                    <option value="2">แพทย์</option>
                </select>
              </td>

              </tr>
              <tr>
                <th><label class="float-right" disabled="">ชื่อ :</label>
                </th>
                <td><input type="text" name="first_name"></td>
              </tr>

              <tr>
                <th><label class="float-right" disabled="">นามสกุล :</label>
                </th>
                <td><input type="text" name="last_name"></td>
              </tr>

             <tr>
                  <th><label class="float-right">วันที่ :</label>
                  </th>
                  <td>

                    <span>
                      <select name="birth_day" >
                        <?php
                        $start_date = 1;
                        $end_date   = 31;
                        for( $j=$start_date; $j<=$end_date; $j++ ) {
                          echo '<option value='.$j.'>'.$j.'</option>';
                        }
                        ?>
                      </select>
                    </span>
                    <span>
                     <select name="birth_month" >
                      <?php
                      $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                      for($i=0; $i<=11; $i++) {
                        ?>
                        <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
                      <?php } ?>
                    </select>
                  </span>
                  <span>
                    <select name="birth_year" >
                      <?php
                      $year = date('Y')+543;
                      $min = $year - 60;
                      $max = $year;
                      for( $i=$max; $i>=$min; $i-- ) {
                        echo '<option value='.$i.'>'.$i.'</option>';
                      }
                      ?>
                    </select>
                  </span>

                </td>
              </tr>

          </tbody>
        </table>
      </div>
    </form>


    <div class="col-sm">

      <table>
        <thead>
        </thead>
        <tbody>
          <tr>
            <th><label class="float-right">เบอร์โทร :</label>
            </th>
            <td><input type="text" name="phone"></td>
          </tr>

          <tr>
            <th><label class="float-right" style="witdh:100%;"><font size="2px">สถานะการทำงาน :</font></label>
            </th>
            <td><select name ="status">
              <option selected>เลือกสถานะ</option>
              <option value="1">ทำงานอยู่</option>

              <option value="2">ลาออก</option>
            </select></td>
          </tr>

          <tr>
            <th><label class="float-right">ที่อยู่ :</label>
            </th>
            <td><textarea name="address">--</textarea></td>
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
            <th> <img id="img" height="200px" src="picture/nopicture.jpg" alt="">
            </th>
          </tr>
          <tr>
           <!--  <th> <input width="100px" OnChange="Preview(this)" required class="form-control" required="เพิ่มรูป"   type="file" name="annimalimg[]" accept="image/*">
            </th> -->
          </tr>
        </tbody>
      </table>
    </div>

    <div class="row container-fluid mt-5">
      <div class="col-sm-4">
      </div>
      <div class="col-sm-4" align="center">
        <button class="btn btn-light" >บันทึก</button>
        <button class="btn btn-light" >ยกเลิก</button>
      </div>
      <div class="col-sm-4"></div>
    </div>
    <div class="row container-fluid mt-5">
      <div class="col-sm-4">
        <button class="btn btn-light float-left">ย้อนกลับ</button>
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

      function Preview(ele) {
        $('#img').attr('src', ele.value);
        if (ele.files && ele.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $('#img').attr('src', e.target.result);
          }
          reader.readAsDataURL(ele.files[0]);
        }
      }


    </script>
  </body>
  </html>

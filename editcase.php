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
    <div class="col-4"><label>&nbsp;&nbsp;แก้ไขข้อมูลคดี</label></div>
    <div class="col-4">
    </div>
    <div class="col-4"></div>
  </div>

  <div class="row p-5">
    <div class="col-6">


      <table>
        <thead>
          <tr>

          </tr>
        </thead>
        <tbody>

          <tr>
            <th><label class="float-right">รหัสคดี :</label>
            </th>
            <td><input type="text"   placeholder=""></td>
          </tr>

          <tr>
            <th><label class="float-right">คดีอาญาที่ :</label>
            </th>
            <td><input type="text"   placeholder=""></td>
          </tr>

          <tr>
            <th><label class="float-right">ยึดทรัพท์ที่ :</label>
            </th>
            <td><input type="text"   placeholder=""></td>
          </tr>

          <tr>
            <th><label class="float-right">ปวจ.ข้อที่ :</label>
            </th>
            <td><input type="text"   placeholder=""></td>
          </tr>

          <tr>
            <th><label class="float-right">วันที่ :</label>
            </th>
            <td>
              <span>
                <select name="birth_month">
                  <?php for( $m=1; $m<=12; ++$m ) { 
                    $month_label = date('F', mktime(0, 0, 0, $m, 1));
                    ?>
                    <option value="<?php echo $month_label; ?>"><?php echo $month_label; ?></option>
                  <?php } ?>
                </select> 
              </span>
              <span>
                <select name="birth_day">
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
                <select name="birth_year">
                  <?php 
                  $year = date('Y');
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

          <tr>
            <th><label class="float-right">เวลา :</label>
            </th>
            <td><input type="text"   placeholder=""></td>
          </tr>

          <tr>
            <th><label class="float-right">ผู้ต้องหา :</label>
            </th>
            <td><input type="text"   placeholder=""></td>
          </tr>

          <tr>
            <th><label class="float-right">หน่วยงานเจ้าของคดี :</label>
            </th>
            <td><select >
              <option selected>เลือกหน่วยงานเจ้าของคดี</option>
              <option value="1">A</option>
              <option value="2">B</option>
              <option value="3">C</option>
            </select></td>
          </tr>

          <tr>
            <th><label class="float-right">รายละเอียดของกลางที่รับมอบ :</label>
            </th>
            <td><textarea></textarea></td>
          </tr>
        </tbody>
      </table>


    </div>




    <div class="col-6">

      <table>
        <thead>
          <tr>

          </tr>
        </thead>
        <tbody>

          <tr>
            <th><label class="float-right">สะถานะคดี :</label>
            </th>
            <td><select >
              <option selected>เลือกสะถานะคดี</option>
              <option value="1">A</option>
              <option value="2">B</option>
              <option value="3">C</option>
            </select></td>
          </tr>

          <tr>
            <th><label class="float-right">พิพากษาโดย :</label>
            </th>
            <td><input type="text"   placeholder=""></td>
          </tr>

          <tr>
            <th><label class="float-right">เมื่อวันที่ :</label>
            </th>
            <td>
              <span>
                <select name="birth_month">
                  <?php for( $m=1; $m<=12; ++$m ) { 
                    $month_label = date('F', mktime(0, 0, 0, $m, 1));
                    ?>
                    <option value="<?php echo $month_label; ?>"><?php echo $month_label; ?></option>
                  <?php } ?>
                </select> 
              </span>
              <span>
                <select name="birth_day">
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
                <select name="birth_year">
                  <?php 
                  $year = date('Y');
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

          <tr>
            <th><label class="float-right">คดีดำที่ :</label>
            </th>
            <td><input type="text"   placeholder=""></td>
          </tr>

          <tr>
            <th><label class="float-right">คดีแดงที่ :</label>
            </th>
            <td><input type="text"   placeholder=""></td>
          </tr>

          <tr>
            <th><label class="float-right">คำสั่งศาล :</label>
            </th>
            <td><input type="text"   placeholder=""></td>
          </tr>

          <tr>
            <th><label class="float-right">ผู้ต้องหา :</label>
            </th>
            <td><input type="text"   placeholder=""></td>
          </tr>

          <tr class="mt-2">
            <th><label class="float-right">เอกสารบันทึกประจำวัน :</label>
            </th>
            <td><img class="float-right" src="picture/+file.png" width="20px" height="20px"><hr></td>
          </tr>
          <tr>
            <th>
            </th>
            <td><img class="float-right" src="picture/+file.png" width="20px" height="20px"><hr></td>
          </tr>
          <tr>
            <th>
            </th>
            <td><img class="float-right" src="picture/+file.png" width="20px" height="20px"><hr></td>
          </tr>
        </tbody>
      </table>



    </div>


  </div>


  <center><button class="btn btn-dark">บันทึก</button></center>
  <button class="btn btn-dark float-left">ย้อนกลับ</button>

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

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script type="text/javascript">


     $(document).ready(function() {

          
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
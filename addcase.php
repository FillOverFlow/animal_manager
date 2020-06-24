<?php 
include 'code/connect.php';
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
        <a class="text-dark" href="#">ผู้ใช้งาน</a>&nbsp;<b>|</b>&nbsp;<a class="text-dark" href="code/login/logout.php">ออกจากระบบ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <hr class="float-left" width="94%" size="20" color="black">

    </div>
    
  </div>

  <?php include('menu.php');  ?>

  <div id="display-2" class="col-9 p-5 border border-dark rounded h-80 w-100"> 

    <div class="row">
      <div class="col-4"><label>&nbsp;&nbsp;เพิ่มข้อมูลคดี</label></div>
      <div class="col-4">
      </div>
      <div class="col-4"></div>
    </div>
    <form action="code/mannageannimalcenter/addcase_add.php" method="POST" enctype="multipart/form-data">
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
                <td><input type="text" disabled   placeholder="" style="width: 100%;"></td>
              </tr>

              <tr>
                <th><label class="float-right">คดีอาญาที่ :</label>
                </th>
                <td><input type="text" name="Criminal_Case_No"   placeholder="" style="width: 100%;"></td>
              </tr>

              <tr>
                <th><label class="float-right">ยึดทรัพท์ที่ :</label>
                </th>
                <td><input type="text" name="Confiscation_Case_No"   placeholder="" style="width: 100%;"></td>
              </tr>

              <tr>
                <th><label class="float-right">ปวจ.ข้อที่ :</label>
                </th>
                <td><input type="text" name="Daily_No"   placeholder="" style="width: 100%;"></td>
              </tr>

              <tr>
                <th><label class="float-right">วันที่ :</label>
                </th>
                <td>

                  <span>
                    <select name="day" >
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
                   <select name="month" >
                    <?php 
                    $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                    for($i=0; $i<=11; $i++) { 
                      ?>
                      <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
                    <?php } ?>
                  </select> 
                </span>
                <span>
                  <select name="year" >
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

            <tr>
              <th><label class="float-right">เวลา :</label>
              </th>
              <td><input type="text" name="Time_Case_Animal"   placeholder="" style="width: 100%;"></td>
            </tr>

            <tr>
              <th><label class="float-right">ผู้ต้องหา :</label>
              </th>
              <td><input type="text" name="Suspect"   placeholder="" style="width: 100%;"></td>
            </tr>

            <tr>
              <th><label class="float-right">หน่วยงานเจ้าของคดี :</label>
              </th>
              <td>
               <?php
               $sql = "SELECT * FROM deliver_department WHERE status = '1'"; 
               $query = $conn->query($sql);?>
               <select style="width: 100%;" name="Department_Case_Animal">
                 <?php  while($row = $query->fetch_assoc()) { ?>
                   <option value="<?php echo $row['ID_Deliver_Department']; ?>"><?php echo $row['Deliver_Department']; ?></option> 
                 <?php   } ?>
               </select></td>
             </tr>

             <tr>
              <th><label class="float-right">รายละเอียดของกลางที่รับมอบ :</label>
              </th>
              <td><textarea style="width: 100%;" name="Description_exhibit"></textarea></td>
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
              <td><select style="width: 210px;" name="Status_Case_Animal">
                <option value="0" selected >เลือกสะถานะคดี</option>
                <option value="1">ระหว่างดำเนินคดี</option>
                <option value="2">ถึงที่สุดแล้ว</option>
              </select></td>
            </tr>

            <tr>
              <th><label class="float-right">พิพากษาโดย :</label>
              </th>
              <td><input type="text" name="Judged_by" placeholder="" style="width: 210px;"></td>
            </tr>

            <tr>
              <th><label class="float-right">เมื่อวันที่ :</label>
              </th>
              <td>
                <!-- $thaiweek=array("วันอาทิตย์","วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัส","วันศุกร์","วันเสาร์"); -->

                <span>
                  <select name="day1" >
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
                  <select name="mont1" >
                    <?php 
                    $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                    for($i=0; $i<=11; $i++) { 
                      ?>
                      <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
                    <?php } ?>
                  </select> 
                </span>
                <span>
                  <select name="year1" >
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

            <tr>
              <th><label class="float-right">คดีดำที่ :</label>
              </th>
              <td><input type="text" name="Undecided_Case_No"   placeholder="" style="width: 210px;"></td>
            </tr>

            <tr>
              <th><label class="float-right" >คดีแดงที่ :</label>
              </th>
              <td><input type="text" name="Dong_Case_No"   placeholder="" style="width: 210px;"></td>
            </tr>

            <tr>
              <th><label class="float-right">คำสั่งศาล :</label>
              </th>
              <td><input type="text" name="Injunction"   placeholder="" style="width: 210px;"></td>
            </tr>

            <tr class="mt-2">
              <th><label class="float-right">เอกสารบันทึกประจำวัน :</label>
              </th>
              <td><input  OnChange="Preview(this)" class="form-control"  type="file" name="Recording_Document[]" style="width: 210px;"></td>
            </tr>
            <tr class="mt-2">
              <th><label class="float-right"></label>
              </th>
              <td><input  OnChange="Preview(this)" class="form-control"  type="file" name="Arrest_Document[]" style="width: 210px;"></td>
            </tr>
            <tr class="mt-2">
              <th><label class="float-right"></label>
              </th>
              <td><input  OnChange="Preview(this)" class="form-control"  type="file" name="Deliver_Document[]" style="width: 210px;"></td>
            </tr>
          </tbody>
        </table>



      </div>


    </div>


    <center><button class="btn btn-light">บันทึก</button></center>

  </form>
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

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script type="text/javascript">


   $(document).ready(function() {

    $('.back').on('click', function (e) {
      e.preventDefault()
      window.location.replace("http://localhost/animal_manager/mannageannimalcenter.php");

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
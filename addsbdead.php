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
      <div class="col-4"><label>&nbsp;&nbsp;เพิ่มข้อมูลสัตว์พ่อ-แม่พันธุ์ตาย</label></div>
      <div class="col-4">
      </div>
      <div class="col-4"></div>
    </div>

    <div class="row p-5">
      <div class="col-4">
        <?php
        $animal_id="";
        $animal_type="";
        if(isset($_GET['animal_id']) && isset($_GET['animal_type'])){
          $animal_id = $_GET['animal_id'];
          $animal_type = $_GET['animal_type'];
        }

        $db->where("Animal_Type_ID",$animal_type);
        $type = $db->getOne("animal_type");

        $db->where("Animal_ID",$animal_id);
        $data = $db->getOne("animal");

        //genereate qrcode
        // $qrcode = generateQrcode('$animal_id');


        ?>

        <table>
          <thead>
            <tr>

            </tr>
          </thead>
          <form action="code/animal_breeder/addBreederDead.php" method="post">
            <tbody>
              <tr>
                <th><label class="float-right">หมายเลขสัตว์ :</label>
                </th>
                <td><input type="text" name="animal_id" placeholder="" value="<?php echo $animal_id; ?>" required></td>
              </tr>
              <tr>
                <th><label class="float-right">วัน/เดือน/ปี<br>การชันสูตรศพ :</label>
                </th>
                <td>

                  <span>
                    <select name="dead_day" >
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
                   <select name="dead_month" >
                    <?php
                    $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                    for($i=0; $i<=11; $i++) {
                      ?>
                      <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
                    <?php } ?>
                  </select>
                </span>
                <span>
                  <select name="dead_year" >
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
              <th><label class="float-right">ชนิดสัตว์ :</label>
              </th>
              <td><input type="text"   value="<?php echo $type['Animal_Type_Name']; ?>" placeholder="" disabled=""></td>
            </tr>

            <tr>
              <th><label class="float-right">ชื่อสามัญไทย :</label>
              </th>
              <td><input type="text"   value="<?php echo $data['Thai_Common_Name']; ?>" placeholder="" disabled=""></td>
            </tr>
            <tr>
              <th><label class="float-right">ชื่อสามัญอังกฤษ :</label>
              </th>
              <td><input type="text"   value="<?php echo $data['English_Common_Name']; ?>" placeholder="" disabled=""></td>
            </tr>

            <tr>
              <th><label class="float-right" disabled="">ชื่อวิทยาศาสตร์ :</label>
              </th>
              <td><input type="text"   value="<?php echo $data['Scientific_Name']; ?>" placeholder="" disabled=""></td>
            </tr>

            <tr>
              <th><label class="float-right" disabled="">สิ่งที่แนบมา :</label>
              </th>
              <td><input type="text" name="atteachment"  required></td>
            </tr>

            <tr>
              <th><label class="float-right">เพศ :</label>
              </th>
              <td><select name="gender" style="width:100%;">
                <option value="0">กรุณาเลือกเพศ</option>
                <option value="1">ชาย</option>
                <option value="2">หญิง</option>
              </select></td>
            </tr>
            <tr>
              <th><label class="float-right" disabled="">อายุ :</label>
              </th>
              <td><input type="number" name="age"  placeholder="" required></td>
            </tr>
            <tr>
             <tr>
              <th><label class="float-right">วันที่ตาย :</label> </th>
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

          <th><label class="float-right">วันรับมอบ :</label> </th>
          <td>
            <span>
              <select name="day_addmission" >
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
             <select name="month_addmission" >
              <?php
              $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
              for($i=0; $i<=11; $i++) {
                ?>
                <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
              <?php } ?>
            </select>
          </span>
          <span>
            <select name="year_addmission" >
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
        <th><label class="float-right" disabled="">ข้อมูลแวดล้อม :</label>
        </th>
        <td><input type="text"  name="env_info" placeholder="" required></td>
      </tr>

      <tr>
        <th><label class="float-right" disabled="">ประวัติรักษา :</label>
        </th>
        <td><input  name="history"  placeholder="" required></td>
      </tr>

      <tr>
        <th><label class="float-right">การวินิฉัยเบื้องต้น :</label>
        </th>
        <td><input name="basic_diagonosis"   placeholder="" required></td>
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
        <td><input type="text" name="dead_period"  placeholder="" required></td>
      </tr>

      <tr>
        <th><label class="float-right">สภาพซาก :</label>
        </th>
        <td><input type="text" name="condition_carcass"   placeholder="" required></td>
      </tr>
      <tr>
        <th><label class="float-right">คะแนนความสมบูรณ์ของร่างกาย :</label>
        </th>
        <td><select class="form-control" name="Body_Integrity_Score">
          <option value="0">ใส่คะแนน</option>
          <option value="5">ดีมาก</option>
          <option value="4">ดี</option>
          <option value="3">ปานกลาง</option>
          <option value="2">แย่</option>
          <option value="1">แย่มาก</option>
        </select></td>
      </tr>
      <tr>
        <th><label class="float-right">น้ำหนักตัว :</label>
        </th>
        <td><input type="number" name="weight" placeholder="" required></td>
      </tr>
      <tr>
        <th><label class="float-right">ข้อสังเกตุเพิ่มเติม :</label>
        </th>
        <td><input type="text" name="additional"   placeholder="" required></td>
      </tr>

      <tr>
        <th><label class="float-right">ผลการชันสูตร :</label>
        </th>
        <td><input type="text" name="autopsy_result"  placeholder="" required></td>
      </tr>

      <tr>
        <th><label class="float-right">ตัวอย่างห้องปฎิบัติการ :</label>
        </th>
        <td><input type="text" name="sample"  placeholder="" required></td>
      </tr>

      <tr>
        <th><label class="float-right">ผลการทดสอบ :</label>
        </th>
        <td><input type="text" name="test_result" placeholder="" required></td>
      </tr>

      <tr>
        <th><label class="float-right">สาเหตุเบื้องต้น :</label>
        </th>
        <td><input type="text" name="basic_cause"  placeholder="" required></td>
      </tr>

      <tr>
        <th><label class="float-right">ปัจจัยโน้มนำ :</label>
        </th>
        <td><input type="text" name="lead_factor"  placeholder="" required></td>
      </tr>

      <tr>
        <th><label class="float-right">ผู้รับมอบ :</label>
        </th>
        <td><select class="form-control" name="dead_consignee">
         <?php
         $db->where("Authorities_Status",1);
         $authorities = $db->get("authorities");
         foreach ($authorities as $authoritie) {
           ?>
           <option value="<?php echo $authoritie['Authorities_ID']; ?>"><?php echo $authoritie['Authorities_First_Name']; ?> <?php echo $authoritie['Authorities_Last_Name']; ?></option>
         <?php } ?>
       </select></td>
     </tr>

     <tr>
      <th><label class="float-right">เจ้าหน้าที่นำส่ง :</label>
      </th>
      <td><select class="form-control" name="dead_deliver">
       <?php
       $db->where("Authorities_Status",1);
       $authorities = $db->get("authorities");
       foreach ($authorities as $authoritie) {
         ?>
         <option value="<?php echo $authoritie['Authorities_ID']; ?>"><?php echo $authoritie['Authorities_First_Name']; ?> <?php echo $authoritie['Authorities_Last_Name']; ?></option>
       <?php } ?>
     </select></td>
   </tr>

   <tr>
    <th><label class="float-right">ผู้กรอกข้อมูล :</label>
    </th>
    <td><input type="text" name="fillter"  placeholder="" disabled="" value="some user"></td>
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
        <td><select class="form-control" name="destory_status">
          <option value="0">กรุณาเลือก</option>
          <option value="1">ทำลายแล้ว</option>
          <option value="2">ยังไม่ทำลาย</option>
        </select></td>
      </tr>

      <tr>
        <th><label class="float-right">สาเหตุการตาย :</label>
        </th>
        <td><textarea name="case_of_death" required></textarea></td>
      </tr>

      <tr>
        <td><label class="float-left">เพิ่มรูป :</label>
        </td>
        <td><label class="float-left">สร้าง QR-code :</label></td>
      </tr>

      <tr align="center">
        <th><img id="img" src="picture/logo.png" width="150px" height="150px" class="border border-dark">
        </th>
        <td><img src="picture/logo.png" width="150px" height="150px" class="border border-dark"></td>
      </tr>

      <tr align="center">
        <th>
          <input  OnChange="Preview(this)" name="animalDeadPic[]" id="fileInput" type="file" style="display:none;" multiple="multiple"/>
          <input  class="btn btn-light" type="button" value="เพิ่มรูป" onclick="document.getElementById('fileInput').click();" />
          <!-- <input type="file" name="" class="btn btn-light"> -->
          <!--  <button class="btn btn-light">เพิ่มรูป</button> -->
        </th>
        <td><button class="btn btn-light showqr1">สร้าง QR-code</button>
        </tr>
        <tr align="center">
          <th>
          </th>
          <td><button class="btn btn-light" >พิมพ์ QR-code</button>
          </tr>
          <tr class="mt-5">
            <td></td>
          </tr>
          <tr class="mt-5">
            <td></td>

          </tr>
          <tr class="mt-5">
            <td></td>

          </tr>






        </tbody>
      </table>
      <center><button class="btn btn-light mt-5 m-5" >บันทึก</button></center>
    </div>



    <button class="btn btn-light float-left back">ย้อนกลับ</button>

  </div>
</form>
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
        <h1>Qr code จะสร้าง อัติโนมัติ หลังจากที่เพื่มสัตว์ตายเรียบร้อยแล้ว</h1>
        <!-- <img src="picture/logo.png" width="100%" height="100%" class="border border-dark"> -->
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


    $(document).ready(function() {

      $('.back').on('click', function (e) {
        e.preventDefault()
        window.location.replace("http://localhost/animal_manager/mannageBreeder.php");
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

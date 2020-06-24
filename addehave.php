<?php
session_start();
require_once('code/mannageannimalcenter/class.php');
$id = $_GET['Animal_id'];
// $tbldeliver_department = "deliver_department";
// $tblarrest_deparment = "arrest_deparment";
$tblauthorities = "authorities";
$animaldata = animalshow($id);
// $deliver_department = showAnimalData($tbldeliver_department,'no');
// $arrest_deparment = showAnimalData($tblarrest_deparment,'no');
$authorities = showAnimalData($tblauthorities,'no');
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

  <style type="text/css">
    .fullinput{
      width: 100%;
    }
  </style>

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
      <div class="col-4"><label>&nbsp;&nbsp;เพิ่มสัตว์กรณีแก้ไขมีชีวิต</label></div>
      <div class="col-4">
      </div>
      <div class="col-4"></div>
    </div> 
    <form action="code/mannageannimaledit/addlifeanimal.php" method="POST" enctype="multipart/form-data">
      <div class="row p-5">
        <div class="col-4">


          <table>
            <thead>
            </thead>
            <tbody>
              <tr>
                <th><label class="float-right">หมายเลขสัตว์ :</label>
                </th>
                <td><input class="fullinput" type="text"   placeholder="" name="Animal_number" required>
                  <input class="fullinput" type="text" value="<?php echo $id; ?>"  placeholder="" name="Animal_ID" style="display: none;"></td>
              </tr>

              <tr>
                <th><label class="float-right">สถานที่ :</label>
                </th>
                <td><input class="fullinput" type="text" name="A_C_C_Place"   placeholder="" required></td>
              </tr>

              <tr>
                <th><label class="float-right">ชนิดของสัตว์ :</label>
                </th>
                <td><input class="fullinput" type="text" value="<?php echo $animaldata[0]['Animal_Type_Name'] ?>" name="Animal_Type_Name"   placeholder="" disabled="" required></td>
              </tr>

              <tr>
                <th><label class="float-right">ชื่อสามัญไทย :</label>
                </th>
                <td><input class="fullinput" type="text" value="<?php echo $animaldata[0]['Thai_Common_Name'] ?>" name="Thai_Common_Name"   placeholder="" disabled="" required></td>
              </tr>
              <tr>
                <th><label class="float-right">ชื่อสามัญอังกฤษ :</label>
                </th>
                <td><input class="fullinput" type="text" value="<?php echo $animaldata[0]['English_Common_Name'] ?>" name="English_Common_Name"   placeholder="" disabled="" required></td>
              </tr>

              <tr>
                <th><label class="float-right" disabled="">ชื่อวิทยาศาสตร์ :</label>
                </th>
                <td><input class="fullinput" type="text" value="<?php echo $animaldata[0]['Scientific_Name'] ?>" name="Scientific_Name"   placeholder="" disabled="" required></td>
              </tr>

              <tr>
                <th><label class="float-right" disabled="">แหล่งที่มา :</label>
                </th>
                <td><input class="fullinput" name="A_C_C_Source" type="text"   placeholder="" required></td>
              </tr>

<!--             <tr>
              <th><label class="float-right">วันรับเข้า :</label>
              </th>
              <td><select name="A_C_C_Date_of_Admission" class="form-control">
                <option selected>วัน/เดือน/ปี</option>
              </select></td>
            </tr> -->

            <tr>
              <th><label class="float-right">วันรับเข้า :</label>
              </th>
              <td>

                <span>
                  <select required name="A_C_C_Date_of_Admission">
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
                 <select required name="A_C_C_month_of_Admission" >
                  <?php 
                  $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                  for($i=0; $i<=11; $i++) { 
                    ?>
                    <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
                  <?php } ?>
                </select> 
              </span>
              <span>
                <select required name="A_C_C_year_of_Admission" >
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
            <th><label class="float-right">ตรวจสุขภาพเบื่องต้น :</label>
            </th>
            <td>
<!--                 <select name="Basic_Health_Examination" class="fullinput" class="form-control">
                <option selected>กรุณาเลือก</option>
              </select> -->
              <input class="fullinput" name="Basic_Health_Examination" type="text" required>
            </td>
          </tr>

          <tr>
            <th><label class="float-right" disabled="">หมายเหตุ :</label>
            </th>
            <td><textarea name="A_C_C_Note" class="fullinput" required></textarea></td>
          </tr>

          <tr>
            <th><label class="float-right">สถานะนำไปใช้<br>ประโยชน์ :</label>
            </th>
            <!-- สถานะการใช้ประโยชน์ 0 = กรุณาเลือก 1 = พ่อ-แม่พันธุ์ 2 = ปล่อยคืนสู่ธรรมชาติ 3 = นำไปใช้ทางวิชาการ 4 = ยังไม่ได้จำแนกสถานะ -->
            <td><select name="A_C_C_Utilization_Status" class="form-control fullinput">
              <option selected>กรุณาเลือก</option>
              <option value="1">พ่อ-แม่พันธุ์</option>
              <option value="2">ปล่อยคืนสู่ธรรมชาติ</option>
              <option value="3">นำไปใช้ทางวิชาการ</optหion>
              <option value="4">ยังไม่ได้จำแนกสถานะ</option>
            </select></td>
          </tr>

        </tbody>
      </table>


    </div>

    <div class="col-4">


      <table>
        <thead>
        </thead>
        <tbody>
          <tr>
            <th><label class="float-right">ประเภทการรับเข้า :</label>
            </th>
            <!-- ประเภทการรับเข้า 0 = กรุณาเลือก 1 = บุคคลธรรมดา 2 = หน่วยงาน 3 = อื่น ๆ -->
            <td><select name="Category_Admission" class="form-control fullinput">
              <option selected>กรุณาเลือก</option>
              <option value="1">บุคคลธรรมดา</option>
              <option value="2">หน่วยงาน</option>
              <option value="3">อื่นๆ</option>
            </select></td>
          </tr>

          <!-- <tr>
            <th><label class="float-right">หมายเหตุ :</label>
            </th>
            <td><textarea class="fullinput"></textarea><img class="float-right" src="picture/+file.png" width="20px" height="20px"><hr></td>
          </tr> -->

          <tr>
            <th><label class="float-right">เลขที่ห่วงขา :</label>
            </th>
            <td><input name="A_C_C_Pin_Number" class="fullinput" type="text"   placeholder="" required></td>
          </tr>
<!--           <tr>
            <th><label class="float-right">วันที่ติดห่วงขา :</label>
            </th>
            <td><select name="A_C_C_Date_Pin_Number"  class="form-control fullinput">
              <option selected>วัน/เดือน/ปี</option>
            </select></td>
          </tr> -->

          <tr>
            <th><label class="float-right">วันที่ติดห่วงขา :</label>
            </th>
            <td>

              <span>
                <select required name="A_C_C_Date_Pin_Number">
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
               <select required name="A_C_C_month_Pin_Number" >
                <?php 
                $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                for($i=0; $i<=11; $i++) { 
                  ?>
                  <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
                <?php } ?>
              </select> 
            </span>
            <span>
              <select required name="A_C_C_year_Pin_Number" >
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
          <th><label class="float-right">DNA :</label>
          </th>
          <!-- name="A_C_C_DNA_File" -->
          <td>
           <input type="text"  disabled id="A_C_C_DNA_File">
           <input type="file" required id="filea" style="display:none ;" name="A_C_C_DNA_File">
           <a href="#" class="btn" value="Upload" onclick="thisFileUpload('a');"><img class="float-right" src="picture/+file.png" width="20px" height="20px"></a>
         </td>
       </tr>

<!--           <tr>
            <th><label class="float-right">เพศ :</label>
            </th> -->
            <!-- เพศสัตว์กรณีแก้ไข 0 = กรุณาเลือก 1 = เพศผู้ 2 = เพศเมีย 3 = อื่น ๆ -->
<!--             <td><select name="A_C_C_Sex" class="form-control fullinput">
              <option selected>กรุณาเลือกเพศ</option>
            </select></td>
          </tr> -->

          <tr>
            <th><label class="float-right">เพศ :</label>
            </th>
            <td><select required  name="A_C_C_Sex" style="width: 100%;" class="form-control">
              <option value="0" selected>กรุณาเลือก</option>
              <option value="1">เพศผู้</option>
              <option value="2">เพศเมีย</option>
              <option value="3">อื่นๆ</option>
            </select></td>
          </tr>

          <tr>
            <th><label class="float-right">อายุ :</label>
            </th>
            <td><input name="A_C_C_Age" type="text" class="fullinput"   placeholder="" required></td>
          </tr>

          <tr>
            <th><label class="float-right">ช่วงวัย :</label>
            </th>
            <!-- ช่วงวัย 0 = กรุณาเลือก 1 = วัยเด็ก 2 = โตเต็มวัย -->
            <td><select name="A_C_C_Age_Range" class="form-control fullinput">
              <option selected>กรุณาเลือกช่วงวัย</option>
              <option value="1">วัยเด็ก</option>
              <option value="2">โตเต็มวัย</option>
            </select></td>
          </tr>

          <tr>
            <th><label class="float-right">น้ำหนัก :</label>
            </th>
            <td><input name="A_C_C_Weight" type="text" class="fullinput"  placeholder="" required></td>
          </tr>

<!--         <tr>
          <th><label class="float-right">ผู้รับมอบ :</label>
          </th>
          <td><select name="A_C_C_Consignee" class="form-control fullinput">
            <option selected>กรุณาเลือกชื่อเจ้าหน้าที่</option>
          </select></td>
        </tr> -->
        <tr>
          <th><label class="float-right">ผู้ที่รับมอบ :</label>
          </th>
          <td>
            <!-- Authorities_ID -->
            <select required name="A_C_C_Consignee" style="width: 100%;" class="form-control">
              <option selected>กรุณาเลิกชื่อเจ้าหน้าที่</option>
              <?php foreach ($authorities  as $key => $val) { ?>
               <option value="<?php echo $val['Authorities_ID']; ?>" selected><?php echo $val['Authorities_First_Name']; ?></option>
             <?php  } ?>
           </select></td>
         </tr>


       </tbody>
     </table>


   </div>




   <div class="col-4 " align="center">




    <div class="row m-10 ">
      <center>
        <tr>
          <th>
            <img id="img" src="picture/nopicture.jpg" alt="" style="width: 200px;"/>
          </th>
        </tr>
      </center>

    </div>
    <div class="row mt-2">

     <tr>
      <!-- multiple -->
      <th><input width="100px" OnChange="Preview(this)" required class="form-control" required="เพิ่มรูป"   type="file" name="annimalimg[]" accept="image/*" multiple></th>
    </tr>

  </div>

  <div style="margin-top: 160px;" class="col-sm" align="center" position="relative" top="100px">
    <label class="float-left">ผู้กรอกข้อมูล :</label>
    <input type="text" value="ผู้กรอกข้อมูล"   placeholder="" disabled="disabled">
    <input type="text" value="ผู้กรอกข้อมูล" name="A_C_C_Fillers"   placeholder="" style="display: none;">
  </div>

</div>


<div class="row container-fluid mt-5">
  <div class="col-sm-4">
    <button class="btn btn-light float-left back">ย้อนกลับ</button>
  </div>
  <div class="col-sm-4" align="center">
    <button type="submit" class="btn btn-light" >บันทึก</button>
    <button class="btn btn-light" >ยกเลิก</button>
  </div>
  <div class="col-auto"></div>
</div>


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
        window.location.replace("http://localhost/animal_manager/mannageannimaledit.php");

      })
      $('#myTab a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
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
  <script>
    function thisFileUpload(a) {
      if (a=="a") {
        var name = 'havefiles';
        $('#A_C_C_DNA_File').val(name);
        document.getElementById("filea").click();
        var files = $('#file').val();
        $('#Recording_Document').html(files);
      }
      if (a=="b") {
        var name = 'havefiles';
        $('#W_A_E_File_Ulilization_Status').val(name);
        document.getElementById("fileb").click();
        var filesb = $('#fileb').val();
        $('#Arrest_Document').html(filesb);
      }
    }
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
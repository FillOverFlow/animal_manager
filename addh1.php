<?php
session_start();
if (empty($_SESSION["authorities"])) {
 header ("Location: index.php");
}
require_once('code/mannageannimalcenter/class.php');
$id = $_GET['id'];
$tbldeliver_department = "deliver_department";
$tblarrest_deparment = "arrest_deparment";
$tblauthorities = "authorities";
$dataanimal = joinshowwild($id);
$deliver_department = showAnimalData($tbldeliver_department,'no');
$arrest_deparment = showAnimalData($tblarrest_deparment,'no');
$authorities = showAnimalData($tblauthorities,'no');

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
    <div class="col-4"><label>&nbsp;&nbsp;เพิ่มข้อมูลสัตว์ป่าของกลางมีชีวิต</label></div>
    <div class="col-4">
    </div>
    <div class="col-4"></div>
  </div>
  <?php foreach ($dataanimal as $key => $value) { ?>
    <form action="code/mannageannimalcenterhlive/addh1.php" method="POST" enctype="multipart/form-data">
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
                <td><input style="width: 100%;" type="text" name="W_A_E_number" required  placeholder="" value="">
                  <input style="width: 100%;" type="hidden" name="Wild_Animal_Exhibits_ID"   placeholder=""  value="<?php echo $value['Wild_Animal_Exhibits_ID'];  ?>"></td>
                </tr>



                <tr>
                  <th><label class="float-right">ชนิดสัตว์ :</label>
                  </th>
                  <td><input style="width: 100%;" type="text" name=""  placeholder="" disabled="" value="<?php echo $value['Animal_Type_Name']; ?>"><input style="width: 100%;" type="hidden" name="Animal_Type_Name"  placeholder="" value="<?php echo $value['Animal_Type_Name']; ?>"></td>
                </tr>

                <tr>
                  <th><label  class="float-right">ชื่อสามัญไทย :</label>
                  </th>
                  <td><input style="width: 100%;" type="text"   placeholder="" disabled="" value="<?php echo $value['Thai_Common_Name']; ?>">
                    <input style="width: 100%;" type="hidden" name="Thai_Common_Name"   placeholder=""  value="<?php echo $value['Thai_Common_Name']; ?>"></td>
                  </tr>
                  <tr>
                    <th><label class="float-right">ชื่อสามัญอังกฤษ :</label>
                    </th>
                    <td><input style="width: 100%;" type="text"    placeholder="" disabled="" value="<?php echo $value['English_Common_Name']; ?>">
                      <input style="width: 100%;" type="hidden" name="English_Common_Name"   placeholder=""  value="<?php echo $value['English_Common_Name']; ?>"></td>
                    </tr>
                    <tr>
                      <th><label class="float-right">ชื่อวิทยาศาสตร์ :</label>
                      </th>
                      <td><input style="width: 100%;" type="text"    placeholder="" disabled="" value="<?php echo $value['Scientific_Name']; ?>">
                        <input style="width: 100%;" type="hidden" name="Scientific_Name"   placeholder=""  value="<?php echo $value['Scientific_Name']; ?>"></td>
                      </tr> 

                      <tr>
                        <th>
                          <label class="float-right">สถานที่ :</label>
                        </th>
                        <td><select required name="W_A_E_Location" style="width: 100%;" class="form-control">
                          <option selected>เลือกสถานที่</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                        </select>
                      </td>
                    </tr>

                    <tr>
                      <th><label class="float-right">วันที่ :</label>
                      </th>
                      <td>

                        <span>
                          <select required name="day" >
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
                         <select required name="month" >
                          <?php 
                          $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                          for($i=0; $i<=11; $i++) { 
                            ?>
                            <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
                          <?php } ?>
                        </select> 
                      </span>
                      <span>
                        <select required name="year" >
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
                    <td><input name="W_A_E_Time" style="width: 100%;" type="text" required   placeholder=""></td>
                  </tr>

                  <tr>
                    <th><label class="float-right">กรงที่ :</label>
                    </th>
                    <td><input name="W_A_E_Cage" style="width: 100%;" type="text" required   placeholder=""></td>
                  </tr>

                  <tr>
                    <th><label class="float-right">วันที่รับเข้า :</label>
                    </th>
                    <td>

                      <span>
                        <select required name="day1" >
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
                       <select required name="month1" >
                        <?php 
                        $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                        for($i=0; $i<=11; $i++) { 
                          ?>
                          <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
                        <?php } ?>
                      </select> 
                    </span>
                    <span>
                      <select required name="year1" >
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
                  <th><label class="float-right">น้ำหนัก :</label>
                  </th>
                  <td><input name="W_A_E_Weight" required style="width: 100%;" type="text"    placeholder="" ></td>
                </tr>

                <tr>
                  <th><label class="float-right">เพศ :</label>
                  </th>
                  <td><select required  name="W_A_E_Sex" style="width: 100%;" class="form-control">
                    <option value="0" selected>กรุณาเลือก</option>
                    <option value="1">เพศผู้</option>
                    <option value="2">เพศเมีย</option>
                    <option value="3">อื่นๆ</option>
                  </select></td>
                </tr>
                <tr>
                  <th><label class="float-right">สะถานะสุขถาพสัตว์ :</label>
                  </th>
                  <td><select required name="W_A_E_Animal_Health_Status" style="width: 100%;" class="form-control">
                    <option value="0" selected>เลือกสะถานะสัตว์</option>
                    <option value="1">สมบูรณ์</option>
                    <option value="2">อื่น ๆ</option>
                  </select></td>
                </tr>

              </tbody>
            </table>


          </div>

          <div class="col-5">


            <table>
              <thead>
                <tr>

                </tr>
              </thead>
              <tbody>
                <tr>
                  <th><label class="float-right">คดีอาญาที่ :</label>
                  </th>
                  <!-- <?php echo $value['Criminal_Case_No']; ?> -->
                  <td><input  style="width: 100%;" type="text"   placeholder="" disabled="" value="<?php echo $value['Criminal_Case_No']; ?>">
                    <input name="Criminal_Case_No" style="width: 100%;" type="hidden" value="<?php echo $value['Criminal_Case_No']; ?>"></td>
                  </tr>

                  <tr>
                    <th><label class="float-right">ยึดทรัพย์ที่ :</label>
                    </th>
                    <!-- <?php echo $value['Confiscation_Case_No']; ?> -->
                    <td><input style="width: 100%;" type="text"   placeholder="" disabled="" value="<?php echo $value['Confiscation_Case_No']; ?>">
                      <input name="Confiscation_Case_No" style="width: 100%;" type="hidden" value="<?php echo $value['Confiscation_Case_No']; ?>"></td>
                    </tr>

                    <tr>
                      <th><label class="float-right">เลขห่วงขา :</label>
                      </th>
                      <td><input style="width: 100%;"  type="text"   placeholder="" disabled="" value="<?php echo $value['W_A_E_Pin_Number']; ?>"><input name="W_A_E_Pin_Number" style="width: 100%;"  type="hidden"   placeholder="" value="<?php echo $value['W_A_E_Pin_Number']; ?>"></td>
                    </tr>
                    <tr>
                      <th><label class="float-right">DNA :</label>
                      </th>
                      <td>
                       <input type="text"  disabled id="W_A_E_DNA_File">
                       <input type="file" required id="filea" style="display:none ;" name="W_A_E_DNA_File">
                       <a href="#" class="btn" name="button" value="Upload" onclick="thisFileUpload('a');"><img class="float-right" src="picture/+file.png" width="20px" height="20px"></a>
                     </td>
                   </tr>
                   <tr>
                    <th><label class="float-right" disabled="">ปวจ. ข้อที่ :</label>
                    </th>
                    <td><input name="W_A_E_Daily_No" required style="width: 100%;" type="text" ></td>
                  </tr>

                  <tr>
                    <th><label class="float-right" disabled="">เวลา :</label>
                    </th>
                    <td><input name="W_A_E_Date_time" style="width: 100%;" type="text"  required></td>
                  </tr>

                  <tr>
                    <th><label class="float-right">ลงวันที่ :</label>
                    </th>
                    <td>

                      <span>
                        <select required name="day3">
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
                       <select required name="month3">
                        <?php 
                        $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                        for($i=0; $i<=11; $i++) { 
                          ?>
                          <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
                        <?php } ?>
                      </select> 
                    </span>
                    <span>
                      <select required name="year3">
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
                  <th><label class="float-right">หน่วยงานที่จับกุม :</label>
                  </th>
                  <td>

                    <select  required name="W_A_E_Deliver_Deparment" style="width: 100%;" class="form-control">
                      <option value="0" selected>เลือกหน่วยงาน</option>
                      <?php foreach ($deliver_department as $key => $val) { ?>
                        <option value="<?php echo $val['ID_Deliver_Department']; ?>" selected><?php echo $val['Deliver_Department']; ?></option>
                      <?php } ?>

                    </select></td>
                  </tr>

                  <tr>
                    <th><label class="float-right">หน่วยงานนำส่ง :</label>
                    </th>
                    <td><select required name="W_A_E_Arrest_Deparment" style="width: 100%;" class="form-control">
                      <option value="0" selected>เลือกหน่วยงาน</option>
                      <?php foreach ($arrest_deparment as $key => $val) { ?>
                        <option value="<?php echo $val['ID_Arrest_Deparment']; ?>" selected><?php echo $val['Arrest_Deparment']; ?></option>
                      <?php  } ?>
                    </select></td>
                  </tr>

                  <tr>
                    <th><label class="float-right">ผู้ที่รับมอบ :</label>
                    </th>
                    <td>
                      <select required name="Authorities_ID" style="width: 100%;" class="form-control">
                        <option selected>กรุณาเลิกชื่อเจ้าหน้าที่</option>
                        <?php foreach ($authorities  as $key => $val) { ?>
                         <option value="<?php echo $val['Authorities_ID']; ?>" selected><?php echo $val['Authorities_First_Name']; ?></option>
                       <?php  } ?>
                     </select></td>
                   </tr>

                   <tr>
                    <th><label class="float-right">สถานะตามกฎหมาย :</label>
                    </th>
                    <td><select required name="W_A_E_Legal_Status" style="width: 100%;" class="form-control">
                      <option value="0" selected>กรุณาเลือก</option>
                      <option value="1">CITES Appendix I</option>
                      <option value="2">CITES Appendix II</option>
                      <option value="3">CITES Appendix III</option>
                      <option value="4">สัตว์ป่าคุ้มครอง</option>
                      <option value="5">สัตว์ป่านอกบัญชี</option>
                    </select></td>
                  </tr>

                  <tr>
                    <th><label class="float-right">สถานะนำไปใช้ประโยชน์ :</label>
                    </th>
                    <td><select required name="Utilization_Status" style="width: 100%;" class="form-control">
                      <option value="0" selected>กรุณาเลือก</option>
                      <option value="1">สัตว์พ่อ-แม่พันธุ์</option>
                      <option value="2">ปล่อยคืนสู่ธรรมชาติ</option>
                      <option value="3">นำไปใช้ทางวิชาการ</option>
                      <option value="4">อื่น ๆ</option>
                    </select></td>
                  </tr>

                  <tr>
                    <th><label class="float-right"></label>
                    </th>
                    <td>
                     <input type="text" disabled id="W_A_E_File_Ulilization_Status">
                     <input required type="file" id="fileb" style="display:none ;" name="W_A_E_File_Ulilization_Status">
                     <a href="#" class="btn" name="button" value="Upload" onclick="thisFileUpload('b');"><img class="float-right" src="picture/+file.png" width="20px" height="20px"></a>
                   </td>
                 </tr>


               </tbody>
             </table>


           </div>




           <div class="col-3">

            <div class="row m-10 ">
              <center>
                <tr>
                  <th>
                    <img id="img" src="picture/nopicture.jpg" alt="" style="width: 120px;"/>
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



        </div>


      </div>

      <div class="float-right">
        <label class="" disabled="">ผู้กรอกข้อมูล :</label>

        <input type="text" name="W_A_E_Fillers"   placeholder="" disabled="" value="<?php echo $_SESSION['authorities']['Authorities_First_Name']; ?>">
        <input type="hidden" name="W_A_E_Fillers" value="<?php echo $_SESSION['authorities']['Authorities_First_Name']; ?>">
      </div>
      <center><button type="submit" class="btn btn-light">บันทึก</button></center>

      <input type="hidden" name="Case_Animal_ID" value="<?php echo $value['Case_Animal_ID']; ?>">
      <input type="hidden" name="Animal_ID" value="<?php echo $value['Animal_ID']; ?>">
    </form>
  <?php   }  ?>
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
      window.location.replace("http://localhost/animal_manager/mannageannimalcenterhlive.php");

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
      $('#W_A_E_DNA_File').val(name);
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
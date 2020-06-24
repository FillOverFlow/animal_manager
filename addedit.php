<?php
session_start();
require_once('code/mannageannimaledit/class.php');
error_reporting (E_ALL ^ E_NOTICE);
$listanimal = listanimal();
$Animal_Case_Correction_ID = $_GET['Animal_Case_Correction_ID'];
$data = showcorrectionrow($Animal_Case_Correction_ID);
$authorities = getdb('authorities');
if (empty($_SESSION["authorities"])) {
 header ("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
  <style type="text/css">
    .fullinput{
      width: 100%;
    }
  </style>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' integrity='sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh' crossorigin='anonymous'>
  <title>ระบบจัดการข้อมูลสัตว์ สถานีเพาะเลี้ยงนกน้ำบางพระระบบจัดการข้อมูลสัตว์ สถานีเพาะเลี้ยงนกน้ำบางพระ จังหวัดชลบุรี</title>
</head>
<body>
  <div class='row m-5'>
    <div class='col-2'>
      <img src="picture/logo.jpg" width="100px" class="float-right">
    </div>
    <div class='col-10'>
      <div class='float-left'>
        <h4>ระบบจัดการข้อมูลสัตว์ สถานีเพาะเลี้ยงนกน้ำบางพระ จังหวัดชลบุรี</h4>
      </div>
      <div class='float-right'>
        <a class='text-dark' href='#'>ผู้ใช้งาน</a>&nbsp;<b>|</b>&nbsp;<a class='text-dark' href="code/login/logout.php">ออกจากระบบ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <hr class='float-left' width='94%' size='20' color='black'>

    </div>
    
  </div>
  <?php include('menu.php');  ?>
  <div id='display-2' class='col-9 p-5 border border-dark rounded h-80 w-100'> 

    <div class='row'>
      <div class='col-4'><label>&nbsp;&nbsp;แก้ไขข้อมูลสัตว์กรณีแก้ไขมีชีวิต</label></div>
      <div class='col-4'>
      </div>
      <div class='col-4'></div>
    </div>
    <form action="code/mannageannimaledit/addedit.php" method="POST" enctype="multipart/form-data">
      <div class='row p-5'>
        <div class='col-4'>
          <table>
            <thead>
            </thead>
            <tbody>
              <tr>
                <th><label class='float-right'>หมายเลขสัตว์ :</label>
                </th>
                <td>
                  <input type='text' required class="fullinput" name="Animal_number" value="<?php echo $data[0]['Animal_number']; ?>">
                  <input type="hidden" name="Animal_ID" value="<?php echo $data[0]['Animal_ID']; ?>">
                  <input type="hidden" name="oldnumber" value="<?php echo $data[0]['Animal_number']; ?>">
                  <input type="hidden" name="Animal_Case_Correction_ID" value="<?php echo $_GET['Animal_Case_Correction_ID']; ?>">
                </td>
              </tr>

              <tr>
                <th><label class='float-right'>สถานที่ :</label>
                </th>
                <td><input type='text'   required class="fullinput" name="A_C_C_Place" value="<?php echo $data[0]['A_C_C_Place']; ?>"></td>
              </tr>

              <tr>
                <th><label class='float-right'>ชนิดของสัตว์ :</label>
                </th>
                <td><input type='text'   class="fullinput" disabled='' value="<?php echo $data[0]['Animal_Type_Name']; ?>"></td>
              </tr>

              <tr>
                <th><label class='float-right'>ชื่อสามัญไทย :</label>
                </th>
                <td><input type='text'   class="fullinput" disabled='' value="<?php echo $data[0]['Thai_Common_Name']; ?>"></td>
              </tr>
              <tr>
                <th><label class='float-right'>ชื่อสามัญอังกฤษ :</label>
                </th>
                <td><input type='text'   class="fullinput" disabled='' value="<?php echo $data[0]['English_Common_Name']; ?>"></td>
              </tr>

              <tr>
                <th><label class='float-right' >ชื่อวิทยาศาสตร์ :</label>
                </th>
                <td><input type='text'  class="fullinput" disabled='' value="<?php echo $data[0]['Scientific_Name']; ?>"></td>
              </tr>

              <tr>
                <th><label class='float-right'>แหล่งที่มา :</label>
                </th>
                <td><input type='text' requiredclass="fullinput" name="A_C_C_Source" class="fullinput" value="<?php echo $data[0]['A_C_C_Source']; ?>"></td>
              </tr>
              <!-- A_C_C_Date_of_Admission -->
              <?php
              $A_C_C_Date_of_Admission = $data[0]['A_C_C_Date_of_Admission'];
              $date = explode(':', $A_C_C_Date_of_Admission);
              $day = $date[0];
              $month = $date[1];
              $year1 = $date[2];
              ?>

              <tr>
                <th><label class="float-right">วันที่รับเข้า :</label>
                </th>
                <td>
                  <span>
                    <select required name="A_C_C_Date_of_Admission">
                      <?php 
                      $start_date = 1;
                      $end_date   = 31;
                      for( $j=$start_date; $j<=$end_date; $j++ ) {
                        if ($j == $day) {
                         echo '<option value='.$j.' selected>'.$j.'</option>';
                       }else{
                        echo '<option value='.$j.'>'.$j.'</option>';
                      }
                    }
                    ?>
                  </select>
                </span>
                <span>
                 <select required name="A_C_C_month_of_Admission">
                  <?php 
                  $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                  for($i=0; $i<=11; $i++) { 
                    if($thaimonth[$i] == $month){ ?>
                      <option value="<?php echo $thaimonth[$i]; ?>" selected><?php echo $thaimonth[$i]; ?></option>
                    <?php }else{ ?>
                      <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
                    <?php } } ?>
                  </select> 
                </span>
                <span>
                  <select required name="A_C_C_year_of_Admission">
                    <?php 
                    $year = date('Y')+543;
                    $min = $year - 60;
                    $max = $year;
                    for( $i=$max; $i>=$min; $i-- ) {
                      if ($i == $year1) {
                        echo '<option value='.$i.' selected>'.$i.'</option>';
                      }else{
                        echo '<option value='.$i.'>'.$i.'</option>';
                      }
                    }
                    ?>
                  </select>
                </span>
              </td>
            </tr>

            <tr>
              <th><label class='float-right'>ตรวจสุขภาพเบื่องต้น :</label>
              </th>
              <td><input type="" class="fullinput" name="Basic_Health_Examination" value="<?php echo $data[0]['Basic_Health_Examination']; ?>"></td>
            </tr>



            <tr>
              <th><label class='float-right'>สะถานะนำไปใช้<br>ประโยชน์ :</label>
              </th>
              <!-- สถานะการใช้ประโยชน์ 0 = กรุณาเลือก 1 = พ่อ-แม่พันธุ์ 2 = ปล่อยคืนสู่ธรรมชาติ 3 = นำไปใช้ทางวิชาการ 4 = ยังไม่ได้จำแนกสถานะ -->
              <?php
              $list = ['กรุณาเลือก','พ่อ-แม่พันธุ์','ปล่อยคืนสู่ธรรมชาติ','นำไปใช้ทางวิชาการ','ยังไม่ได้จำแนกสถานะ'];
              $A_C_C_Utilization_Status = $data[0]['A_C_C_Utilization_Status'];
              $var = 1;
              ?>
              <td>
                <select class='form-control fullinput' name="A_C_C_Utilization_Status">
                  <?php
                  for ($i=0; $i < 5; $i++) {
                    if($i == $A_C_C_Utilization_Status){ ?>
                      <option  value="<?php echo $var; ?>" selected><?php echo $list[$i]; ?></option>
                    <?php } else {?>
                      <option  value="<?php echo $var; ?>"><?php echo $list[$i]; ?></option>
                      <?php $var++; } 
                    } ?>
                  </select>
                </td>
              </tr>

            </tbody>
          </table>


        </div>

        <div class='col-4'>


          <table>
            <thead>
            </thead>
            <tbody>
              <!-- Category_Admission  int(10)     No  None  ประเภทการรับเข้า 0 = กรุณาเลือก 1 = บุคคลธรรมดา 2 = หน่วยงาน 3 = อื่น ๆ -->
              <?php 
              $list = ['กรุณาเลือก','บุคคลธรรมดา','หน่วยงาน','อื่น ๆ'];
              $var = 1;
              $Category_Admission = $data[0]['Category_Admission'];
              ?>
              <tr>
                <th><label class='float-right'>ประเภทการรับเข้า :</label>
                </th>
                <td><select class='form-control fullinput' name="Category_Admission">
                  <?php
                  for ($i=0; $i < 4; $i++) {
                    if($i == $Category_Admission){ ?>
                      <option  value="<?php echo $var; ?>" selected><?php echo $list[$i]; ?></option>
                    <?php $var++; }else{?>
                      <option  value="<?php echo $var; ?>"><?php echo $list[$i]; ?></option>
                      <?php $var++; } }?>
                    </select></td>
                  </tr>

                <!-- <tr>
                  <th><label class='float-right' disabled=''>หมายเหตุ :</label>
                  </th>
                  <td><textarea class="fullinput" required name="A_C_C_Note" value="<?php echo $data[0]['A_C_C_Note']; ?>"></textarea></td>
                </tr> -->

                <tr>
                  <th><label class='float-right'>หมายเหตุ :</label>
                  </th>
                  <td><textarea class="fullinput" name="A_C_C_Note" required ><?php echo $data[0]['A_C_C_Note']; ?></textarea><br>
                    <input type="text" disabled id="A_C_C_Note_File" value="<?php echo $data[0]['A_C_C_Note_File']; ?>">
                    <a href="#" class="btn float-right" name="button" value="Upload" onclick="thisFileUpload('a');"><img class='float-right' src='picture/+file.png' width='20px' height='20px'></a>


                    <input type="file" id="filea" style="display:none;" name="A_C_C_Note_File">
                    <!-- <img class="float-right" src="picture/+file.png" width="20px" height="20px"> -->
                  </td>
                </tr>

                <tr>
                  <th><label class='float-right'>เลขที่ห่วงขา :</label>
                  </th>
                  <td><input type='text' name="A_C_C_Pin_Number" required value="<?php echo $data[0]['A_C_C_Pin_Number']; ?>"  class="fullinput" ></td>
                </tr>
<!--                 <tr>
                  <th><label class='float-right'>วันที่ติดห่วงขา :</label>
                  </th>
                  
                  <td><select class='form-control'>
                    <option selected>วัน/เดือน/ปี</option>
                  </select></td>
                </tr> -->
                <?php
                $A_C_C_Date_Pin_Number = $data[0]['A_C_C_Date_Pin_Number'];
                $date = explode(':', $A_C_C_Date_Pin_Number);
                $day = $date[0];
                $month = $date[1];
                $year1 = $date[2];
                ?>
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
                          if ($j == $day) {
                            echo '<option value='.$j.' selected>'.$j.'</option>';
                          }else{
                            echo '<option value='.$j.'>'.$j.'</option>';
                          }
                          
                        }
                        ?>
                      </select>
                    </span>
                    <span>
                      <select required name="A_C_C_month_Pin_Number">
                        <?php 
                        $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                        for($i=0; $i<=11; $i++) {
                          if ($thaimonth[$i] == $month) { ?>
                           <option value="<?php echo $thaimonth[$i]; ?>" selected><?php echo $thaimonth[$i]; ?></option>
                         <?php   } ?>
                         <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
                       <?php } ?>
                     </select> 
                   </span>
                   <span>
                    <select required name="A_C_C_year_Pin_Number">
                      <?php 
                      $year = date('Y')+543;
                      $min = $year - 60;
                      $max = $year;
                      for( $i=$max; $i>=$min; $i-- ) {
                        if ($i == $year1) {
                          echo '<option value='.$i.' selected>'.$i.'</option>';
                        }else{
                         echo '<option value='.$i.'>'.$i.'</option>';
                       }
                       
                     }
                     ?>
                   </select>
                 </span>
               </td>
             </tr>

             <tr>
              <th><label class='float-right'>DNA :</label>
              </th>
<!--               <td>
                <input type="file" name="A_C_C_DNA_File" id="A_C_C_DNA_File" style="display: none;">
                <img class='float-right' src='picture/+file.png' width='20px' height='20px'><hr>
              </td> -->
              <td>
               <input type="text" disabled id="A_C_C_DNA_File" value="<?php echo $data[0]['A_C_C_DNA_File']; ?>">
               <input  type="file" id="fileb" style="display:none;" name="A_C_C_DNA_File">
               <a href="#" class="btn" value="Upload" onclick="thisFileUpload('b');"><img class="float-right" src="picture/+file.png" width="20px" height="20px"></a>
             </td>
           </tr>
           <!-- A_C_C_Sex int(10)     No  None  เพศสัตว์กรณีแก้ไข 0 = กรุณาเลือก 1 = เพศผู้ 2 = เพศเมีย 3 = อื่น ๆ -->
           <?php
           $list = ['กรุณาเลือก','เพศผู้','เพศเมีย','อื่น ๆ']; 
           $A_C_C_Sex = $data[0]['A_C_C_Sex'];
           ?>
           <tr>
            <th><label class="float-right">เพศ :</label>
            </th>
            <td><select required  name="A_C_C_Sex" style="width: 100%;" class="form-control">
             <?php
             for ($i=0; $i < 4; $i++) {
              if($i == $A_C_C_Sex){ ?>
                <option  value="<?php echo $i; ?>" selected><?php echo $list[$i]; ?></option>
              <?php }else{?>
                <option  value="<?php echo $i; ?>"><?php echo $list[$i]; ?></option>
              <?php } 
            } ?>
          </select></td>
        </tr>

        <tr>
          <th><label class='float-right'>อายุ :</label>
          </th>
          <td><input type='text' name="A_C_C_Age" required  value="<?php echo $data[0]['A_C_C_Age']; ?>" class="fullinput" ></td>
        </tr>
        <!-- A_C_C_Age_Range int(10)     No  None  ช่วงวัย 0 = กรุณาเลือก 1 = วัยเด็ก 2 = โตเต็มวัย -->
        <?php 
        $list = ['กรุณาเลือก','วัยเด็ก','โตเต็มวัย'];
        $A_C_C_Age_Range = $data[0]['A_C_C_Age_Range'];
        ?>
        <tr>
          <th><label class='float-right'>ช่วงวัย :</label>
          </th>
          <td><select name="A_C_C_Age_Range" class='form-control fullinput'>
           <?php
           for ($i=0; $i < 3; $i++) {
            if($i == $A_C_C_Age_Range){ ?>
              <option  value="<?php echo $i; ?>" selected><?php echo $list[$i]; ?></option>
            <?php }else{?>
              <option  value="<?php echo $i; ?>"><?php echo $list[$i]; ?></option>
            <?php } }?>
          </select></td>
        </tr>

        <tr>
          <th><label class='float-right'>น้ำหนัก :</label>
          </th>
          <td><input type='text' name="A_C_C_Weight"  value="<?php echo $data[0]['A_C_C_Weight']; ?>"  required class="fullinput"></td>
        </tr>

        <tr>
          <th><label class='float-right'>ผู้รับมอบ :</label>
          </th>
          <td><select class='form-control fullinput' name="A_C_C_Consignee">
            <option selected>กรุณาเลิกชื่อเจ้าหน้าที่</option>
            <?php foreach ($authorities  as $key => $val) { 
              if ($data[0]['A_C_C_Consignee'] == $val['Authorities_ID']){?>
                <option value="<?php echo $val['Authorities_ID']; ?>" selected><?php echo $val['Authorities_First_Name']; ?></option>
              <?php  }else{?>
                <option value="<?php echo $val['Authorities_ID']; ?>"><?php echo $val['Authorities_First_Name']; ?></option>
              <?php  } 
            }?>
          </select></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class='col-4 ' align='center'>
    <table>
      <thead>
      </thead>
      <tbody>
        <tr>
          <th><img id="img" src='picture/nopicture.jpg' width='200px' class='border border-dark'>
          </th>
        </tr>
      </tbody>
    </table><br>
    <tr>
      <th><input width="100px" OnChange="Preview(this)" required class="form-control" required="เพิ่มรูป"   type="file" name="annimalimg[]" accept="image/*" multiple></th>
    </tr>
    <div style='margin-top: 160px;' class='col-sm' align='center' position='relative' top='100px'>
      <label class='float-left'>ผู้กรอกข้อมูล :</label>
      <input type='text'  value="ผู้กรอกข้อมูล"  placeholder='' disabled='disabled'>
      <input type='hidden' value="ผู้กรอกข้อมูล" name="A_C_C_Fillers">
    </div>
  </div>
  <div class='row container-fluid mt-5'>
    <div class='col-sm-4'>
      <button type="button" class='btn btn-light float-left back'>ย้อนกลับ</button>
    </div>
    <div class='col-sm-4' align='center'>
      <button type="submit" class='btn btn-light'>บันทึก</button>
      <button type="button" class='btn btn-light'>ยกเลิก</button>
    </div>
    <div class='col-auto'></div>
  </div>


</div>
</form>
<div class='col-1'>
</div>

</div>







<div class='modal fade' id='showqr1' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content p-3'>
      <div class='modal-header'>
        <h5 class='modal-title float-left' id='exampleModalCenterTitle'>สร้าง QR-code</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <img src='picture/logo.png' width='100%' height='100%' class='border border-dark'>
      </div>
      <div class='mt-2'>
        <center><button type='button' class='btn btn-light'>ยืนยัน</button></center>
      </div>
    </div>
  </div>
</div>


<div class='modal fade' id='deleteannimal' tabindex='-1' role='dialog' aria-labelledby='exampleModalCenterTitle' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content p-3'>
      <div class='modal-header'>
        <h5 class='modal-title float-left' id='exampleModalCenterTitle'>ลบ</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <center><img src='picture/unnamed.png' width='100px' height='100px'>
          <h1>ต้องการลบ<br>ข้อมูลหรือไม่</h1></center>
        </div>
        <div class='mt-2'>
          <button type='button' class='btn btn-light float-left'>ยืนยัน</button><button type='button' class='btn btn-light float-right' data-dismiss='modal' aria-label='Close'>ยกเลิก</button>
        </div>
      </div>
    </div>
  </div>

  <script src='https://code.jquery.com/jquery-3.4.1.slim.min.js' integrity='sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n' crossorigin='anonymous'></script>
  <script src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' integrity='sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo' crossorigin='anonymous'></script>
  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' integrity='sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6' crossorigin='anonymous'></script>
  <script type='text/javascript'>


    $(document).ready(function() {
      $('.back').on('click', function (e) {
        e.preventDefault()
        window.location.replace("http://localhost/animal_manager/mannageannimaledit1.php");

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
      
      $('.submit').on('click', function () {
        var $fileUpload = $("input[type='file']");
        if (parseInt($fileUpload.get(0).files.length) > 3){
          alert("อัปโหลดรูปภาพได้ไม่เกิน 5 ไฟล์");
        }
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
        $('#A_C_C_Note_File').val(name);
        document.getElementById("filea").click();
        var files = $('#filea').val();
        $('#Recording_Document').html(files);
      }
      if (a=="b") {
        var name = 'havefiles';
        $('#A_C_C_DNA_File').val(name);
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
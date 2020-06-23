<?php
require_once('code/mannageannimaledit/class.php');
$id = $_GET['Animal_ID'];
$Animal_number = $_GET['Animal_number'];
// $tbldeliver_department = "deliver_department";
// $tblarrest_deparment = "arrest_deparment";
$tblarrest_deparment = "arrest_deparment";
$tblauthorities = "authorities";
// $data = animalshow($id);
$Animal_Case_Correction_ID = $_GET['Animal_Case_Correction_ID'];
// $deliver_department = showAnimalData($tbldeliver_department,'no');
$arrest_deparment = showAnimalData($tblarrest_deparment,'no');
$authorities = showAnimalData($tblauthorities,'no');
// $arrest_deparment = showAnimalData($tblarrest_deparment,'no');
$data = showcorrectionrowdead($Animal_Case_Correction_ID);

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
        <a class="text-dark" href="#">ผู้ใช้งาน</a>&nbsp;<b>|</b>&nbsp;<a class="text-dark" href="#">ออกจากระบบ</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </div>
      <hr class="float-left" width="94%" size="20" color="black">

    </div>
    
  </div>

  <?php include('menu.php');  ?>

  <div id="display-2" class="col-9 p-5 border border-dark rounded h-80 w-100"> 

    <div class="row">
      <div class="col-4"><label>&nbsp;&nbsp;แก้ไขข้อมูลสัตว์กรณีแก้ไขตาย</label></div>
      <div class="col-4">
      </div>
      <div class="col-4"></div>
    </div>

    <form action="code/mannageannimaledit/addedead.php" method="POST" enctype="multipart/form-data" >
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
                <td><input class="w-100" type="text" class="fullinput" required   placeholder="" name="Animal_number" id="Animal_number" value="<?php echo $Animal_number ?>">
                  <input type="hidden" class="fullinput" id="Animal_Case_Correction_ID" name="Animal_Case_Correction_ID" value="<?php echo $_GET['Animal_Case_Correction_ID'] ?>">
                  <input type="hidden" value="<?php echo $id;?>" name="Animal_ID">
                </td>
              </tr>

              <tr>
                <th><label class="float-right">วัน/เดือน/ปี<br>การชันสูตรศพ :</label>
                </th>
                <td>
                 <?php
                 $date = explode(':', $data[0]['Autopsy_date']);
                 $day = $date[0];
                 $month = $date[1];
                 $year = $date[2];
                 ?>

                 <span>
                  <select required name="Autopsy_date">
                    <?php 
                    $start_date = 1;
                    $end_date   = 31;
                    for( $j=$start_date; $j<=$end_date; $j++ ) {
                      if ($day == $j) {
                        echo '<option value='.$j.' selected>'.$j.'</option>';
                      }else{
                        echo '<option value='.$j.'>'.$j.'</option>';
                      }
                      
                    }
                    ?>
                  </select>
                </span>
                <span>
                 <select required name="Autopsy_month" >
                  <?php 
                  $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
                  for($i=0; $i<=11; $i++) { 
                    if($month == $thaimonth[$i]){ ?>
                      <option value="<?php echo $thaimonth[$i]; ?>" selected><?php echo $thaimonth[$i]; ?></option>
                    <?php   }else{
                      ?>
                      <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
                    <?php } 
                  } ?>
                </select> 
              </span>
              <span>
                <select required name="Autopsy_year" >
                  <?php 
                  $year = date('Y')+543;
                  $min = $year - 60;
                  $max = $year;
                  for( $i=$max; $i>=$min; $i-- ) {
                    if ($year == $i) {
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
            <th><label class="float-right">ชนิดของสัตว์ :</label>
            </th>
            <td><input class="w-100"  type="text" value="<?php echo $data[0]['Animal_Type_Name'] ?>" name="Animal_Type_Name"  id="Animal_Type_Name"  placeholder="" disabled="" required></td>
          </tr>

          <tr>
            <th><label class="float-right">ชื่อสามัญไทย :</label>
            </th>
            <td><input class="w-100"  type="text" value="<?php echo $data[0]['Thai_Common_Name'] ?>" name="Thai_Common_Name" id="Thai_Common_Name"   placeholder="" disabled="" required></td>
          </tr>
          <tr>
            <th><label class="float-right">ชื่อสามัญอังกฤษ :</label>
            </th>
            <td><input class="w-100"  type="text" value="<?php echo $data[0]['English_Common_Name'] ?>" name="English_Common_Name" id="English_Common_Name"   placeholder="" disabled="" required></td>
          </tr>

          <tr>
            <th><label class="float-right" disabled="">ชื่อวิทยาศาสตร์ :</label>
            </th>
            <td><input class="w-100" type="text" value="<?php echo $data[0]['Scientific_Name'] ?>" name="Scientific_Name" id="Scientific_Name"   placeholder="" disabled="" required></td>
          </tr>


          <tr>
            <th><label class="float-right" disabled="">สิ่งที่แนบมา :</label>
            </th>
            <td><input required type="text" class="w-100" value="<?php echo $data[0]['Attachment']; ?>" name="Attachment"  placeholder=""></td>
          </tr>

          <tr>
            <th><label class="float-right">เพศ :</label>
            </th>
            <?php 
            $list = ['กรุณาเลือก','เพศผู้','เพศเมีย'];
            $Animal_Dead_Sex = $data[0]['Animal_Dead_Sex'];
            $show = $list[$Animal_Dead_Sex];
            ?>
            <td><select required  name="Animal_Dead_Sex" style="width: 100%;" class="form-control">
              <?php 
              for ($i=0; $i < 3; $i++) {
                if ($Animal_Dead_Sex == $i) { ?>
                 <option value="<?php echo $i; ?>" selected><?php echo $show; ?></option>
               <?php }else{ ?>
                <option value="<?php echo $i; ?>"><?php echo $list[$i]; ?></option>
                <?php
              } 
            }
            ?>
          </select></td>
        </tr>
        <tr>
          <th><label class="float-right" disabled="">อายุ :</label>
          </th>
          <td><input required type="text" class="w-100" name="Animal_Dead_Age" value="<?php echo $data[0]['Animal_Dead_Age']; ?>"  placeholder=""></td>
        </tr>
        <tr>
          <th><label class="float-right">วันที่รับมอบ :</label>
          </th>
          <td>

           <?php
           $date = explode(':', $data[0]['Animal_Dead_Date_of_Admission']);
           $day = $date[0];
           $month = $date[1];
           $yearAdmission = $date[2];
           ?>

           <span>
            <select required name="Animal_Dead_Date_of_Admission">
              <?php 
              $start_date = 1;
              $end_date   = 31;
              for( $j=$start_date; $j<=$end_date; $j++ ) {
                if ($day == $j) {
                 echo '<option value='.$j.' selected>'.$j.'</option>';
               }else{
                echo '<option value='.$j.'>'.$j.'</option>';          
              }

            }
            ?>
          </select>
        </span>
        <span>
         <select required name="Animal_Dead_month_of_Admission" >
          <?php 
          $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
          for($i=0; $i<=11; $i++) { 
            if ($month == $thaimonth[$i]) { ?>
              <option value="<?php echo $thaimonth[$i]; ?>" selected> <?php echo $thaimonth[$i]; ?></option>
            <?php  } else{?>
              <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
            <?php } 
          }?>
        </select> 
      </span>
      <span>
        <select required name="Animal_Dead_year_of_Admission" >
          <?php 
          $year = date('Y')+543;
          $min = $year - 60;
          $max = $year;
          for( $i=$max; $i>=$min; $i-- ) {
            if ($yearAdmission == $i) {
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
    <th><label class="float-right">วันที่ตาย :</label>
    </th>
    <td>
      <?php
      $date = explode(':', $data[0]['Animal_Dead_Date']);
      $daydead = $date[0];
      $monthdead = $date[1];
      $yeardead = $date[2];
      ?>
      <span>
        <select required name="Animal_Dead_Date">
          <?php 
          $start_date = 1;
          $end_date   = 31;
          for( $j=$start_date; $j<=$end_date; $j++ ) {
            if ($daydead == $j) {
              echo '<option value='.$j.' selected>'.$j.'</option>';
            }else{
              echo '<option value='.$j.'>'.$j.'</option>';
            }

          }
          ?>
        </select>
      </span>
      <span>
       <select required name="Animal_Dead_month" >
        <?php 
        $thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
        for($i=0; $i<=11; $i++) { 
          if ($monthdead == $thaimonth[$i]) { ?>
            <option value="<?php echo $thaimonth[$i]; ?>" selected><?php echo $thaimonth[$i]; ?></option>
          <?php }else{
            ?>
            <option value="<?php echo $thaimonth[$i]; ?>"><?php echo $thaimonth[$i]; ?></option>
          <?php }
        }?>
      </select> 
    </span>
    <span>
      <select required name="Animal_Dead_year" >
        <?php 
        $year = date('Y')+543;
        $min = $year - 60;
        $max = $year;
        for( $i=$max; $i>=$min; $i-- ) {
          if ($yeardead == $i) {
            echo '<option value='.$i.' selected> '.$i.'</option>';
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
  <th><label class="float-right" disabled="">ข้อมูลแวดล้อม :</label>
  </th>
  <td><input type="text" required class="w-100" name="Environment_information" value="<?php echo $data[0]['Environment_information']; ?>"   placeholder=""></td>
</tr>

<tr>
  <th><label class="float-right" disabled="">ประวัติการรักษา :</label>
  </th>
  <td><input type="text" value="<?php echo $data[0]['Treatment_History']; ?>" required class="w-100" name="Treatment_History"  placeholder=""></td>
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
        <th><label class="float-right">การวินิจฉัยเบื้องต้น :</label>
        </th>
        <td><input type="text" value="<?php echo $data[0]['Basic_Diagnosis']; ?>" required class="w-100" name="Treatment_History" required class="w-100" name="Basic_Diagnosis"   placeholder="" ></td>
      </tr>

      <tr>
        <th><label class="float-right">ระยะเวลาป่วยตาย :</label>
        </th>
        <td><input type="text" value="<?php echo $data[0]['Death_Period']; ?>" required class="w-100" name="Treatment_History" required class="w-100" name="Death_Period"   placeholder="" ></td>
      </tr>

      <tr>
        <th><label class="float-right">สภาพซาก :</label>
        </th>
        <td><input type="text" required value="<?php echo $data[0]['Condition_Carcass']; ?>" required class="w-100" name="Treatment_History" class="w-100" name="Condition_Carcass"   placeholder="" ></td>
      </tr>
      <tr>
        <th><label class="float-right">คะแนนความสมบูรณ์ของร่างกาย :</label>
        </th>
        <!-- 0 = กรุณาเลือก 1 = 1 (แย่มาก) 2 = 2 (แย่) 3 = 3 (ปานกลาง) 4 = 4 (ดี) 5 = 5 (ดีมาก)   -->
        <?php 
        $list = ['กรุณาเลือก','(แย่มาก)','(แย่)','(ปานกลาง)','(ดี)','(ดีมาก)'];
        $Body_Integrity_Score = $list[$data[0]['Body_Integrity_Score']];
        ?>
        <td><select class="form-control w-100" name="Body_Integrity_Score" required>
<!--           <option value="0" selected>ใส่คะแนน</option>
          <option value="1">(แย่มาก)</option>
          <option value="2">(แย่)</option>
          <option value="3">(ปานกลาง)</option>
          <option value="4">(ดี)</option>
          <option value="5">(ดีมาก)</option> -->
          <?php 
          for ($i=0; $i < 6; $i++) { 
            if ($data[0]['Body_Integrity_Score'] == $i) {
              echo '<option value='.$i.' selected> '.$Body_Integrity_Score.'</option>';
            }else{
             echo '<option value='.$i.'>'.$Body_Integrity_Score.'</option>';
           }
         }
         ?>
       </select></td>
     </tr>
     <tr>
      <th><label class="float-right">น้ำหนักตัว :</label>
      </th>
      <td><input required value="<?php echo $data[0]['Animal_Dead_Weight']; ?>" required class="w-100" name="Treatment_History" type="text" class="w-100" name="Animal_Dead_Weight"  placeholder="" ></td>
    </tr>
    <tr>
      <th><label class="float-right">ข้อสังเกตุเพิ่มเติม :</label>
      </th>
      <td><input required value="<?php echo $data[0]['Additional_Observations']; ?>" required class="w-100" name="Treatment_History" type="text" class="w-100" name="Additional_Observations"   placeholder="" ></td>
    </tr>

    <tr>
      <th><label class="float-right">ผลการชันสูตร :</label>
      </th>
      <td><input required value="<?php echo $data[0]['Autopsy_Results']; ?>" required class="w-100" name="Treatment_History" type="text" class="w-100" name="Autopsy_Results"  placeholder="" ></td>
    </tr>

    <tr>
      <th><label class="float-right">ตัวอย่างห้องปฎิบัติการ :</label>
      </th>
      <td><input required value="<?php echo $data[0]['Laboratory_Sample']; ?>" required class="w-100" name="Treatment_History" type="text"  class="w-100" name="Laboratory_Sample"  placeholder="" ></td>
    </tr>

    <tr>
      <th><label class="float-right">ผลการทดสอบ :</label>
      </th>
      <td><input required value="<?php echo $data[0]['Test_Result']; ?>" required class="w-100" name="Treatment_History" type="text" class="w-100" name="Test_Result"   placeholder="" ></td>
    </tr>

    <tr>
      <th><label class="float-right">สาเหตุเบื้องต้น :</label>
      </th>
      <td><input required value="<?php echo $data[0]['Basic_Cause']; ?>" required class="w-100" name="Treatment_History" type="text" class="w-100" name="Basic_Cause"   placeholder="" ></td>
    </tr>

    <tr>
      <th><label class="float-right">ปัจจัยโน้มนำ :</label>
      </th>
      <td><input required value="<?php echo $data[0]['Lead_Factor']; ?>" required class="w-100" name="Treatment_History" type="text" class="w-100" name="Lead_Factor"   placeholder="" ></td>
    </tr>

    <tr>
      <th><label class="float-right">ผู้รับมอบ :</label>
      </th>
      <?php 
      $consignee = $data[0]['Animal_Dead_Consignee'];
      ?>
      <td>
        <select required name="Animal_Dead_Consignee"  class="form-control w-100">
          <!-- <option selected>กรุณาเลิกชื่อเจ้าหน้าที่</option> -->
          <?php foreach ($authorities  as $key => $val) { 
            if($consignee == $val['Authorities_ID'] ){ ?>
              <option value="<?php echo $val['Authorities_ID']; ?>" selected><?php echo $val['Authorities_First_Name']; ?></option>
            <?php  } else{?>
              <option value="<?php echo $val['Authorities_ID']; ?>"><?php echo $val['Authorities_First_Name']; ?></option>
            <?php  } 
          }?>
        </select></td>
      </tr>

      <tr>
        <th><label class="float-right">หน่วยงานเจ้าหน้าที่นำส่ง :</label>
        </th>
        <?php
        $Animal_Dead_Authorities_Deliver = $data[0]['Animal_Dead_Authorities_Deliver'];
        ?>
        <td><select required name="Animal_Dead_Authorities_Deliver"  class="form-control w-100">
          <?php foreach ($arrest_deparment as $key => $val) {
            if ($Animal_Dead_Authorities_Deliver == $val['ID_Arrest_Deparment']) { ?>
             <option value="<?php echo $val['ID_Arrest_Deparment']; ?>" selected><?php echo $val['Arrest_Deparment']; ?></option>
           <?php  }else{
            ?>
            <option value="<?php echo $val['ID_Arrest_Deparment']; ?>"><?php echo $val['Arrest_Deparment']; ?></option>
          <?php  } 
        }?>
      </select></td>
    </tr>

    <tr>
      <th><label class="float-right">ผู้กรอกข้อมูล :</label>
      </th>
      <td><input required value="<?php echo $data[0]['Animal_Dead_Fillers']; ?>" type="text" class="w-100" name="" value="ผู้กรอกข้อมูล"  placeholder="" disabled=""><input required type="hidden" class="fullinput" name="Animal_Dead_Fillers" value="<?php echo $data[0]['Animal_Dead_Fillers']; ?>"  placeholder="" ></td>
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
        <?php
        $list = ['กรุณาเลือก','ทำลายแล้ว','ยังไม่ทำลาย'];
        $Destroy_The_Remains_Status = $data[0]['Destroy_The_Remains_Status'];

        ?>
        <!-- 0 = กรุณาเลือก 1 = ทำลายแล้ว 2 = ยังไม่ทำลาย -->
        <td><select class="form-control fullinput" name="Destroy_The_Remains_Status">
<!--           <option value="0" selected>กรุณาเลือก</option>
          <option value="1" >ทำลายแล้ว</option>
          <option value="2" >ยังไม่ทำลาย</option> -->
          <?php  
          for ($i=0; $i < 3; $i++) { 
            if($Destroy_The_Remains_Status == $i){
              echo '<option value='.$i.' selected> '.$list[$i].'</option>';
            }
            echo '<option value='.$i.'> '.$list[$i].'</option>';
          }
          ?>
        </select></td>
      </tr>

      <tr>
        <th><label class="float-right">สาเหตุการตาย :</label>
        </th>
        <td><textarea required class="fullinput" name="Cause_of_Death"><?php echo $data[0]['Cause_of_Death']; ?></textarea></td>
      </tr>

      <tr>
        <td><label class="float-left">เพิ่มรูป :</label>
        </td>
        <td><label class="float-left">สร้าง QR-code :</label></td>
      </tr>

      <tr align="center">
        <th><img id="img" src="picture/nopicture.jpg" width="150px"  class="border border-dark">
        </th>
        <td>
          <input  id="nameqr" type="hidden" name="QR_Code_Animal_Dead">
          <img id="imgQR" src="picture/nopicture.jpg" width="150px"  class="border border-dark">
        </td>
      </tr>

      <tr align="center">
        <th><input style="width: 150px;" OnChange="Preview(this)" required class="form-control" required="เพิ่มรูป"   type="file" name="annimalimg[]" accept="image/*" multiple></th>
      </th>
      <td><button type="button" class="btn btn-light showqr1">สร้าง QR-code</button>
      </tr>
      <tr align="center">
        <th>
        </th>
        <td><button type="button" class="btn btn-light" onclick="PrintDiv();">พิมพ์ QR-code</button>
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
    <center><button type="submit" class="btn btn-light mt-5 m-5" >บันทึก</button></center>
  </div>

</form>



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
        window.location.replace("http://localhost/animal_manager/mannageannimaleditdead1.php");

      })
      $('#myTab a').on('click', function (e) {
        e.preventDefault()
        $(this).tab('show')
      })

      $('.deleteannimal').on('click', function () {
        $('#deleteannimal').modal('show');
      })

      $('.showqr1').on('click', function () {

        var number = $('#Animal_number').val();
        var typeanimal = $('#Animal_Type_Name').val();
        var nameEng = $('#English_Common_Name').val();
        var nameTH = $('#Thai_Common_Name').val();
        var nameSci = $('#Scientific_Name').val();
        var Animal_Case_Correction_ID = $('#Animal_Case_Correction_ID').val();
        $.ajax({
          type: 'POST',
          url: 'code/QR/generateQReditdead.php',
          data: {Animal_Case_Correction_ID:Animal_Case_Correction_ID,nameEng:nameEng,nameTH:nameTH,nameSci:nameSci,typeanimal:typeanimal,number:number},
        })
        .done(function(rs) {
          var obj = JSON.parse(rs);
          var src1 = 'code/QR/editdeadQR/'+obj.namefile;
          $("#nameqr").attr("value", obj.namefile);
          $("#imgQR").attr("src", src1);
          $("#imgQRmodel").attr("src", src1);
          $('#showqr1').modal('show');
        })
        .fail(function() {
          console.log("error");
        });

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
    function PrintDiv() {
        var divToPrint = document.getElementById('printimg'); // เลือก div id ที่เราต้องการพิมพ์
        var html =  '<html>'+ // 
        '<head>'+
        '<link href="css/print.css" rel="stylesheet" type="text/css">'+
        '</head>'+
        '<body onload="window.print(); window.close();">'
        + divToPrint.innerHTML + 
        '</body>'+
        '</html>';

        var popupWin = window.open();
        popupWin.document.open();
        popupWin.document.write(html); //โหลด print.css ให้ทำงานก่อนสั่งพิมพ์
        popupWin.document.close();  
      }
    </script>
  </body>
  </html>